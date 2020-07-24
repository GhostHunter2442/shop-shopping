<?php

namespace App\Repositories;

use App\Invoice;
use App\Bank;
use DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;


class ReportdetailRepository
{
    public function __construct()
    {

        $this->year_now = now()->year;
        $this->month_now = now()->month;
        $this->dateS = now()->startOfMonth()->subMonth(12);
        $this->dateE = now();
    }

    public function getDatatabsort($year,$month)
    {
        if($year==0 && $month==0){
            $query = Invoice::where('invoices.status_order', '!=', 3)
            ->join('banks', 'invoices.bank_id', '=', 'banks.id')
            ->select(
                'banks.detail',
                DB::raw('sum(invoices.price) as total')
            )
            ->groupBy('banks.detail')
            ->orderBy('total', 'DESC')
            ->latest('invoices.id');
             return $query;
        }else if($year !=0  && $month==0){
            $query = Invoice::where('invoices.status_order', '!=', 3)
            ->whereYear('invoices.created_at', $year)
            ->join('banks', 'invoices.bank_id', '=', 'banks.id')
            ->select(
                'banks.detail',
                DB::raw('sum(invoices.price) as total')
            )
            ->groupBy('banks.detail')
            ->orderBy('total', 'DESC')
            ->latest('invoices.id');
             return $query;
        }
        else if($year ==0  && $month !=0){
            $query = Invoice::where('invoices.status_order', '!=', 3)
            ->whereMonth('invoices.created_at', $month)
            ->join('banks', 'invoices.bank_id', '=', 'banks.id')
            ->select(
                'banks.detail',
                DB::raw('sum(invoices.price) as total')
            )
            ->groupBy('banks.detail')
            ->orderBy('total', 'DESC')
            ->latest('invoices.id');
             return $query;
        }else{
            $query = Invoice::where('invoices.status_order', '!=', 3)
            ->whereYear('invoices.created_at', $year)
            ->whereMonth('invoices.created_at', $month)
            ->join('banks', 'invoices.bank_id', '=', 'banks.id')
            ->select(
                'banks.detail',
                DB::raw('sum(invoices.price) as total')
            )
            ->groupBy('banks.detail')
            ->orderBy('total', 'DESC')
            ->latest('invoices.id');
             return $query;
        }


    }
    public function getMonth()
    {
        $month_arr=array(
            "01"=>"ม.ค.",
            "02"=>"ก.พ.",
            "03"=>"มี.ค.",
            "04"=>"เม.ย.",
            "05"=>"พ.ค.",
            "06"=>"มิ.ย.",
            "07"=>"ก.ค.",
            "08"=>"ส.ค.",
            "09"=>"ก.ย.",
            "10"=>"ต.ค.",
            "11"=>"พ.ย.",
            "12"=>"ธ.ค."
        );
        return $month_arr;
    }
    public function getYear()
    {
        $query = Invoice::where('status_order', '!=', 3)
        ->select(DB::raw('YEAR(created_at) year'))
        ->groupBy('year')
        ->orderBy('year', 'DESC')
        ->pluck('year')
        ->toArray();
    return $query;
    }
}
