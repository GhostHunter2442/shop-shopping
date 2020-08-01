<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Product;
use App\Bank;
use App\Order;
use App\Invoice;
use  App\Http\Requests\FormRequest; // Vailadasion
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

use ox01code\Omise\process\OmiseCharge;
use ox01code\Omise\process\OmiseSource;


class CheckoutController extends Controller
{
    public function index($discount){
        return view('checkout',compact('discount'));
    }
    public function getaddress(){
        $listaddress =  auth()->user()->addresses()->orderBy('stdefalse','desc')->get();
        return response()->json($listaddress);
    }
    public function getbank(){
        $listbank =  Bank::where('status','normal')->get();
        return response()->json($listbank);
    }
    public function getaddressid($id){
          $listaddressid =  Address::find($id);
         return response()->json($listaddressid);
    }
    public function trackout($addressid,$discount){
        return view('trackout',compact('addressid','discount'));
    }
    public function checkpayment($addressid,$paymentid,$discount){
        return view('checkpayment',compact('addressid','paymentid','discount'));
    }

    public function checkoutpament($paymentid=0,$addressid=0,$bankid=0,$discount){
        return view('checkoutpament',compact('paymentid','addressid','bankid','discount'));
    }
    public function checkpaymentomise($paymentid=0,$addressid=0,$bankid=0,$discount){
        return view('paymentomise',compact('paymentid','addressid','bankid','discount'));
    }
    public function addaddress(Request $request){

        if(!empty($request->addressID)){
            $addressid = array('id' => $request->addressID);
        }else{
            $this->validate($request,[
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phonenumber' => 'required',
                'adress1' => 'required',
                'adress2' => 'required',
            ],[
                'firstname.required' => 'กรุณากรอกชื่อ',
                'lastname.required' => 'กรุณาณากรอกนามสกุล',
                'email.required' => 'กรุณากรอกตัวเลขเท่านั้น',
                'phonenumber.required' => 'กรุณากรอกเบอร์โทรศัพท์',
                'adress1.required' => 'กรุณาเลือกที่อยู่',
                'adress2.required' => 'กรุณาเลือกบ้านเลขที่'
            ]);
                $address = new Address();
                $address->firstname = $request->get('firstname');
                $address->lastname = $request->get('lastname');
                $address->email = $request->get('email');
                $address->phonenumber = $request->get('phonenumber');
                $address->adress1 = $request->get('adress1');
                $address->adress2 = $request->get('adress2');
                $address->adress3 = $request->get('adress3');
                $address->other = $request->get('other');
                $address->stdefalse = 1; //เช็คสถานะ defalse address
                $address->user_id = auth()->user()->id;
                $address->save();
                $addressid=  auth()->user()->addresses()->select('id')->first();
        }

        return response()->json([
           'addressid' => $addressid,
        //    'addressid'=> $alladdress
            ]);

    }
    public function confirm(Request $request)
    {
        if($request->get('paymentid')==1){
            $this->validate($request,[
                'picturepay' => 'required|image|mimes:jpeg,jpg,png',
                'pricepay' => 'required|numeric',
                'accoutnpay' => 'required|digits:4|numeric',

            ],[
                'picturepay.required' => 'กรุณาเลือกรูปภาพ',
                'picturepay.image' => 'กรุณาเลือกไฟล์ที่เป็นรูปภภาพเท่านั้น',
                'picturepay.mimes' => 'กรุณาเลือกไฟล์นามสุกุล jpeg,jpg,png',
                'pricepay.required' => 'กรุณาณากรอกยอดเงินที่โอน',
                'pricepay.numeric' => 'กรุณากรอกตัวเลขเท่านั้น',
                'accoutnpay.required' => 'กรุณาณากรอกรหัสบัตร 4 ตัวสุท้าย',
                'accoutnpay.digits' => 'กรุณาณากรอกรหัสบัตร 4 ตัว',
                'accoutnpay.numeric' => 'กรุณากรอกตัวเลขเท่านั้น',
            ]);

        }
        $listCart = auth()->user()->products()->latest()->get();
        $latest = Invoice::latest()->first();
        if ($latest==null) {
            $expNum = 'SPV'.date('Y').'00001';

        }
        else{
            $string = preg_replace("/[^0-9\.]/",'', $latest->id);
            $string_date =  preg_replace("/^[0-9]{4}/",'',$string);
            $expNum = 'SPV'.date('Y').sprintf('%05d', $string_date+1);
        }
         if($request->get('paymentid')==1){
            $bankid=$request->get('bankid');
         }else{
            $bankid=null;
         }

            $invoice = new Invoice();
            if($request->hasFile('picturepay')){
                $newFileName = uniqid().'.'.$request->picturepay->extension();
                //upload file
                $request->picturepay->storeAs('images/slipbank',$newFileName,'public');
                $invoice->paypic = $newFileName;
            }
            else{
                $invoice->paypic = 'nopic.png';
            }

            $invoice->id=$expNum;
            $invoice->user_id = auth()->user()->id;
            $invoice->address_id=$request->get('addressid');
            $invoice->bank_id=$bankid;
            $invoice->paymentid=$request->get('paymentid');

            if($request->get('paymentid')==1){
               $invoice->price=$request->get('pricepay');
            }
            if($request->get('paymentid')==2){
                $invoice->price=$request->get('totalPrice');
             }

            $invoice->lastaccount=$request->get('accoutnpay');
            $invoice->payment_id= null;
            $invoice->distcode='WE203';
            $invoice->save();

            foreach ($listCart  as $p) { // save
                $order = new Order();
                $order->user_id = auth()->user()->id;
                $order->invoice_id = $expNum;
                $order->product_id = $p->id;
                $order->qty = $p->pivot->qty;
                $order->price = $p->price;
                $order->total = ($p->pivot->qty*$p->price);
                $order->save();

                 // delete
                auth()->user()->products()->detach($p->id);

                $product = Product::find($p->id);//ตัด stok
                $product->stock -=($p->pivot->qty);
                $product->update();

                }
    }

    public function confirmomise(Request $request){

    $charge = OmiseCharge::create([
        'amount' => $request->get('pricetotal'),
        'currency' => 'thb',
        'card' => $request->get('omiseToken'),
    ]);

    if ($charge['status'] === 'successful') {


        $listCart = auth()->user()->products()->latest()->get();
        $latest = Invoice::latest()->first();
        if ($latest==null) {
            $expNum = 'SPV'.date('Y').'00001';

        }
        else{
            $string = preg_replace("/[^0-9\.]/",'', $latest->id);
            $string_date =  preg_replace("/^[0-9]{4}/",'',$string);
            $expNum = 'SPV'.date('Y').sprintf('%05d', $string_date+1);
        }

            $invoice = new Invoice();

            $invoice->id=$expNum;
            $invoice->user_id = auth()->user()->id;
            $invoice->address_id=$request->get('addressid');
            $invoice->bank_id=null;
            $invoice->price=$request->get('pricetotal')/100;
            $invoice->paymentid=$request->get('paymentid');
            $invoice->payment_id= $charge['id'];
            $invoice->distcode='WE203';
            $invoice->save();

            foreach ($listCart  as $p) { // save
                $order = new Order();
                $order->user_id = auth()->user()->id;
                $order->invoice_id = $expNum;
                $order->product_id = $p->id;
                $order->qty = $p->pivot->qty;
                $order->price = $p->price;
                $order->total = ($p->pivot->qty*$p->price);
                $order->save();

                 // delete
                auth()->user()->products()->detach($p->id);

                $product = Product::find($p->id);//ตัด stok
                $product->stock -=($p->pivot->qty);
                $product->update();
                }
                return response()->json([
                    'status' => 'success'
                     ]);

     }
    else{
        return response()->json([
            'status' => 'fail'
             ]);
    }
    }
    public function cancelOrder(Request $request){


          $invoice = Invoice::find($request->invoice_id);
          $invoice->status_order=5;
          $invoice->update();

          $order=Order::where('invoice_id',$request->invoice_id)->get();

          foreach ($order  as $p) {
            $product = Product::find($p->product_id);//คืน stok
            $product->stock +=($p->qty);
            $product->update();
          }

          return response()->json([
            'status' => 'success'
             ]);
    }
}
