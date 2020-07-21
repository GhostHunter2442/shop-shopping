<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InvoicebackendRepository;
use App\Exports\CsvExport;
use App\Exports\getExport;
use App\Imports\CsvImport;
use App\Exports\trackExport;
use Maatwebsite\Excel\Facades\Excel;

use Naxon\AfterShip\Facades\Couriers;
use Naxon\AfterShip\Facades\LastCheckPoint;
use Naxon\AfterShip\Facades\Notifications;
use Naxon\AfterShip\Facades\Trackings;
use Illuminate\Support\Facades\Validator;
use App\Invoice;


class InvoicebackendController extends Controller
{

    public function index()
    {
        return view('backend.invoice.index');
    }
    public function preorder()
    {
        return view('backend.invoice.preorder');
    }
    public function order()

    {    return view('backend.invoice.order');

    }
    public function getDatatables(InvoicebackendRepository $invoice)
    {

        $data = $invoice->getDatatables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->addColumn('bank_name', function ($value) {
                if (!empty($value->bank->bankpic)) {
                    return $value->bank->bankpic;
                } else {
                    return "";
                }
            })
            ->addColumn('user_name', function ($value) {
                return $value->user->name;
            })

            ->make(true);
    }
    function action(InvoicebackendRepository $invoice, Request $request)
    {
        $result = $invoice->action_track($request);
       $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
       $status = $result ? 'success' : 'error';
       return response()->json([
           'message' => $message,
           'status' => $status,
       ], 200);
    }
    public function getPreordertables(InvoicebackendRepository $invoice)
    {

        $data = $invoice->getPreordertables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->addColumn('bank_name', function ($value) {
                if (!empty($value->bank->bankpic)) {
                    return $value->bank->bankpic;
                } else {
                    return "";
                }
            })
            ->addColumn('user_name', function ($value) {
                return $value->user->name;
            })
            ->make(true);
    }

    public function getOrdertables(InvoicebackendRepository $invoice)
    {

        $data = $invoice->getOrdertables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->addColumn('name_sent', function ($value) {
                return $value->address->firstname . ' ' . $value->address->lastname;
            })->make(true);
    }
    public function view(InvoicebackendRepository $invoice, $id)
    {
        $cate = $invoice->getById($id);
        $cate['title'] = $cate['invoice']['id'];
        return view('backend.invoice.partials.view', $cate);
    }
    public function update(InvoicebackendRepository $invoice, Request $request, $id)
    {


        $result = $invoice->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาดนะจะ!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function order_export()
    {

        ob_end_clean();
        ob_start();
        return Excel::download(new CsvExport, 'All_Order.xlsx');

    }
    public function order_export_all(InvoicebackendRepository $invoice, Request $request){

        if($request->id==1){
              $invoice->update_export_all($request);
        }

    }

    public function order_export_get(InvoicebackendRepository $invoice, Request $request,$id)
    {
        $result = $invoice->update_export_get($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาดนะจะ!';
        $status = $result ? 'success' : 'error';
        $filename = $id . '.xlsx';
        ob_end_clean();
        ob_start();
        return  Excel::download(new getExport($id), $filename);



    //     $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาดนะจะ!';
    //     $status = $result ? 'success' : 'error';
    //    return response()->json([
    //         'message' => $message,
    //         'status' => $status,
    //     ], 200);
    }

    public function track_export(){
        // dd('export');
        ob_end_clean();
        ob_start();
        return Excel::download(new trackExport, 'order_track.xlsx');
    }

    public function order_import(Request $request){

        $validator = Validator::make($request->all(), ['select_file' => 'required|mimes:xlsx|max:10240'],
        [
            'select_file.required' =>'เลือกไฟล์ก่อนอัพโหลด',
            'select_file.mimes' =>'เลือกไฟล์ xlsx',
            'select_file.max' => 'ขนาดไฟล์ใหญ่เกินไป ห้ามเกิน 10 MB.'
        ]);
        $status = 'success';
        $message = 'อัพโหลดเสร็จสมบูรณ์';
        $data = null;
        if ($validator->fails()) {
            $status = 'warning';
            $message = $validator->errors();
        } else {
            $data_file = Excel::toArray(new CsvImport,$request->file('select_file'))[0];

        foreach($data_file as $key => $value)
        {
            $data[] = array(
            'id'  => $value[0],
            'track_code'   => $value[1],
            );
         }

        //  return response()->json($data);
        $j = 0;
        $count = count($data);
        while($j < $count){

            Invoice::where('id',$data[$j]['id'])
                    ->update(array('track_code' => $data[$j]['track_code']));
                    $tracking_info = [
                        'slug'    => 'kerry-logistics',
                        'title'   => 'My Title',
                    ];
             Trackings::create($data[$j]['track_code'], $tracking_info);

            //    Invoice::where('id',$data[$j]['id'])
            //         ->update(array('track_code' => '-'));
            //    Trackings::delete('kerry-logistics',$data[$j]['track_code']);

            $j++;
        }

        }

        return response()->json([
            'message' => $message,
            'status' => $status,
            'data'=> $data
        ], 200);
    }
}
