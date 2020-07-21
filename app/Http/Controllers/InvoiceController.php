<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Address;
use App\Order;
use App\Product;
use DB;
use Illuminate\Http\Request;



use Naxon\AfterShip\Facades\Couriers;
use Naxon\AfterShip\Facades\LastCheckPoint;
use Naxon\AfterShip\Facades\Notifications;
use Naxon\AfterShip\Facades\Trackings;

use \AfterShip\AfterShipException;
class InvoiceController extends Controller
{

    public function index()
    {
        return view('myorder');
    }
    public function myorder()
    {


        $order =  Invoice::where('user_id', auth()->user()->id)->select(
            'id',
            'status_order',
            'track_code',
            'created_at',
            'updated_at'
        )->latest()->paginate(10);

        return response()->json([
            'order' => $order
        ]);
    }

    public function getorder(Request $request)
    {
        // $id = 'SPV202000001';
        $id = $request->invoice_id;

        $invoiceorder = Invoice::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->get();

        $products = Order::where('invoice_id', $id)
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('products.name','products.picture','orders.product_id', 'orders.qty', 'orders.total', 'orders.price')
            ->get();

        foreach ($invoiceorder  as $p) {
            $address_id = $p->address_id;
        }
        $addresseorder = Address::where('id', $address_id)->get();

        return response()->json([
            'invoice' => $invoiceorder,
            'product' => $products,
            'address' => $addresseorder

        ]);
    }

    public function gettrack(Request $request){
        // $key = config('aftership.api_key');
        // $key = 'f9d7cfa1-60ff-4739-82c3-88d37506c7cd';


        // $trackings = new AfterShip\Trackings($key);
        // $tracking_number='SSCT000230576';
        // $tracking_number='RBS006647511';
        // $response = $trackings->retrack('kerry-logistics','SSCT000230576');
        // $tracking_number = $createtrack['data']['tracking']['tracking_number'];
        // dd($responses['data']['tracking']['tracking_number']);

         if(!empty($request->track_number)){
               try {
                     $datatrack= Trackings::get('kerry-logistics', $request->track_number,array('title' => 'title,order_id'));
                 } catch (\Exception $e) {
                     $datatrack =  $e->getMessage();

         }
        }

        return response()->json($datatrack);

        // if($datatrack =='NotFound: 4004 - Tracking does not exist.'){
        //     $tracking_info = [
        //         'slug'    => 'kerry-logistics',
        //         'title'   => 'My Title',
        //     ];
        //     $trackings->create('SSCT000230576', $tracking_info);

        // }else{
        //     dd($datatrack);
        // }
        //  $trackings->delete('kerry-logistics', $tracking_number);


    }
}
