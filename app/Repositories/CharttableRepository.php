<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Invoice;
// use App\Product;
use App\Product;
use DB;
class CharttableRepository
{
    public function __construct()
    {

        $this->year_now=now()->year;
        $this->month_now=now()->month;
        $this->dateS = now()->startOfMonth()->subMonth(12);
        $this->dateE = now();
    }

    public function getDatatablesyear()
    {
        $query = Invoice::where('invoices.status_order','!=',3)
                         ->whereYear( 'invoices.created_at', $this->year_now)
                        ->join('orders', 'invoices.id', '=', 'orders.invoice_id')
                        ->join('products', 'orders.product_id', '=', 'products.id')
                        ->select('products.name',
                               DB::raw('sum(orders.qty*orders.price) as total ,sum(orders.qty) as qty'))
                           ->take(10)

                         ->groupBy('products.name')
                         ->orderBy( 'total', 'DESC' )
                         ->get();
        return $query;
    }
    public function getDatatablesmonth()
    {
        $query = Invoice::where('invoices.status_order','!=',3)
                         ->whereYear( 'invoices.created_at', $this->year_now)
                         ->whereMonth( 'invoices.created_at', $this->month_now)
                        ->join('orders', 'invoices.id', '=', 'orders.invoice_id')
                        ->join('products', 'orders.product_id', '=', 'products.id')
                        ->select('products.name',
                               DB::raw('sum(orders.qty*orders.price) as total ,sum(orders.qty) as qty'))
                           ->take(10)

                         ->groupBy('products.name')
                         ->orderBy( 'total', 'DESC' )
                         ->get();
        return $query;
    }
    public function getDatatableslastmonth()
    {
        $query = Invoice::where('invoices.status_order','!=',3)
                   ->whereBetween( 'invoices.created_at',[$this->dateS,$this->dateE])
                        ->join('orders', 'invoices.id', '=', 'orders.invoice_id')
                        ->join('products', 'orders.product_id', '=', 'products.id')
                        ->select('products.name',
                               DB::raw('sum(orders.qty*orders.price) as total ,sum(orders.qty) as qty'))
                           ->take(10)

                         ->groupBy('products.name')
                         ->orderBy( 'total', 'DESC' )
                         ->get();
        return $query;
    }
}
