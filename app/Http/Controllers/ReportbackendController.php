<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Product;
use App\Repositories\ChartyearnowRepository;
use App\Repositories\ChartmonthnowRepository;
use App\Repositories\ChartovermonthRepository;
use App\Repositories\ChartpayyearRepository;
use App\Repositories\ChartpaymonthRepository;
use App\Repositories\ChartpaylastmonthRepository;

use App\Repositories\CharttopyearRepository;
use App\Repositories\CharttopmonthRepository;
use App\Repositories\CharttoplastmonthRepository;

use App\Repositories\CharttableRepository;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
class ReportbackendController extends Controller
{
    public function index()
    {
        return view('backend.report.index');
    }

    public function getchartYearNow(ChartyearnowRepository $yearnow)
    {
        return $yearnow->getMonthlyPostData();
    }

    public function getchartMonthNow(ChartmonthnowRepository $monthnow)
    {

        return $monthnow->getMonthlyPostData();

    }
    public function getchartMonthOver(ChartovermonthRepository $monthover)
    {
       
        return $monthover->getMonthlyPostData();
    }

    public function getchartPayYear(ChartpayyearRepository $payyear)
    {

        return $payyear->getMonthlyPostData();
    }
    public function getchartPayMonth(ChartpaymonthRepository $paymonth)
    {

        return $paymonth->getMonthlyPostData();
    }

    public function  getchartPayLastMonth(ChartpaylastmonthRepository $paylastmonth)
    {

        return $paylastmonth->getMonthlyPostData();
    }

    public function  getchartTopYear(CharttopyearRepository $topyear)
    {

        return $topyear->getMonthlyPostData();
    }

    public function  getchartTopMonth(CharttopmonthRepository $topmonth)
    {

        return $topmonth->getMonthlyPostData();
    }


    public function  getchartTopLastMonth(CharttoplastmonthRepository $toplastmonth)
    {

        return $toplastmonth->getMonthlyPostData();
    }


    public function  getTable(CharttableRepository $tableyear,Request $request,$status)
    {

        if($status==1){
            $data = $tableyear->getDatatablesyear();
            return DataTables::of($data)->blacklist(['id'])->make(true);

         }else if($status==2){
            $data = $tableyear->getDatatablesmonth();
            return DataTables::of($data)->blacklist(['id'])->make(true);
         }
         else{
            $data = $tableyear->getDatatableslastmonth();
            return DataTables::of($data)->blacklist(['id'])->make(true);

         }

    }
}
