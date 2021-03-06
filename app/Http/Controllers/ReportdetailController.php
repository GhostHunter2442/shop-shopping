<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Repositories\ReportdetailRepository;
class ReportdetailController extends Controller
{
    public function index(ReportdetailRepository $topbank)
    {

        $data['months'] = $topbank->getMonth();
        $data['years'] = $topbank->getYear();
        return view('backend.reportdetail.topbank',$data);
    }

    public function gettopdata(ReportdetailRepository $topbank,$year,$month){

        // dd($request->year);
        $data = $topbank->getDatatabsort($year,$month);
        $datatables = app('datatables');
        return $datatables->eloquent($data)
             ->make(true);


    }
}
