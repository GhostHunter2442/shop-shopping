<?php

namespace App\Repositories;

use App\Invoice;
use App\Order;
use App\Address;
use App\Bank;
use App\User;

use Naxon\AfterShip\Facades\Couriers;
use Naxon\AfterShip\Facades\LastCheckPoint;
use Naxon\AfterShip\Facades\Notifications;
use Naxon\AfterShip\Facades\Trackings;

class InvoicebackendRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'user_id' => null,
            'address_id'=> null,
            'bank_id'=> null,
            'paymentid'=> null,
            'status_order'=> null,
            'track_code'=> null,
            'paypic'=> null,
            'price'=> null,
            'lastaccount'=> null,
            'payment_id'=> null,
            'distcode'=> null,
            'created_at'=> null,
            'updated_at'=> null,
        ];
        return (object) $data;
    }
    public function getAll()
    {
        $invoice = Invoice::all();
        return $invoice;
    }
    public function getById($id)
    {
        $invoice = Invoice::find($id);

        $products = Order::where('invoice_id', $id)
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->select('products.name','products.picture','orders.product_id', 'orders.qty', 'orders.total', 'orders.price')
        ->get();

        $addresseorder = Address::find($invoice->address_id);
        $bank = Bank::find($invoice->bank_id);
        $user= User::find($invoice->user_id);

         return  [
            'invoice' => $invoice,
            'products' => $products,
            'addresseorder' => $addresseorder,
            'bank' => $bank,
            'user' => $user
        ];

    }
    public function getfindById($id)
    {
        $invoice = Invoice::find($id);
        return $invoice;
    }

    public function getDatatables()
    {
        $query = Invoice::select('id', 'user_id','paymentid', 'status_order','price', 'track_code', 'paypic', 'lastaccount', 'payment_id','bank_id')
        ->where('status_order',1)
        ->orWhere('status_order',3)
        ->latest('id');
        return $query;
    }
    public function getPreordertables()
    {
        $query = Invoice::select('id', 'user_id','paymentid', 'status_order','price', 'track_code', 'paypic', 'lastaccount', 'payment_id','bank_id')
        ->where('status_order',2)
        ->latest('id');
        return $query;
    }
    public function getOrdertables()
    {
        $query = Invoice::select('id', 'user_id','paymentid', 'status_order','price', 'track_code', 'paypic', 'lastaccount','address_id')
        ->where('status_order',4)
        ->latest('id');
        return $query;
    }
    public function update($request, $id)
    {

        $invoice = $this->getfindById($id);
        // dd($invoice);
        if(empty($invoice)) return false;

        $invoice->status_order =2;
        $invoice->update();
        return true;
    }
    public function update_export_get($request, $id)
    {

        $invoice = $this->getfindById($id);
        // dd($invoice);
        if(empty($invoice)) return false;

        $invoice->status_order =4;
        $invoice->update();
        return true;
    }

    public function update_export_all($request)
    {

        $affected = Invoice::where('status_order', '=',2)->update(array('status_order' => 4));
        return  true;
    }
    public function action_track($request)
    {
        // PTTK000139938

        if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
                $tracking_info = [
                            'slug'    => 'kerry-logistics',
                            'title'   => 'My Title',
                        ];
                        if($request->track_code!='-' && $request->track_code!=''){
                            $trackCount =  Invoice::where('track_code', '=', $request->track_code)->count();
                           if($trackCount==0){
                               $response =  Trackings::create($request->track_code, $tracking_info);

                               $invoice = Invoice::find($request->id);
                               if(empty($invoice)) return false;

                              $invoice->track_code =$request->track_code;
                              $invoice->update();
                              return  true;
                           }

                        }


    		}

    	}

    }
}
