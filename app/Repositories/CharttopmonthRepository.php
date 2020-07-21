<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Invoice;
use App\Product;
use App\Order;
use DB;
class CharttopmonthRepository
{
    public function __construct()
    {

        $this->year_now=now()->year;
        $this->month_now=now()->month;
    }

    function getAllMonths(){

        $topyear_array = array();
                        $posts_data = Invoice::where('invoices.status_order','!=',3)
                        ->whereYear( 'invoices.created_at', $this->year_now)
                        ->whereMonth( 'invoices.created_at', $this->month_now)
                        ->join('orders', 'invoices.id', '=', 'orders.invoice_id')
                        ->join('products', 'orders.product_id', '=', 'products.id')
                        ->select('orders.product_id', DB::raw('sum(orders.qty) as totalqty'))
                        ->take(5)
                        ->groupBy('orders.product_id')
                        ->orderBy( 'totalqty', 'DESC' )
                        ->pluck( 'orders.product_id');

		$posts_data = json_decode( $posts_data );
		if ( ! empty( $posts_data ) ) {
			foreach ( $posts_data as $topprice ) {
                $top_no = $topprice;
                $product_name = Product::where('id',$topprice)->pluck('name');
				$topyear_array[ $top_no ] = $product_name[0];
			}
		}
		return $topyear_array;
    }

    function getMonthlyPostCount( $top_no ) {
        $top_post_count = Invoice::where('invoices.status_order','!=',3)
                        ->join('orders', 'invoices.id', '=', 'orders.invoice_id')
                        ->where( 'orders.product_id', $top_no )
                        ->whereYear('orders.created_at', $this->year_now)
                        ->whereMonth( 'orders.created_at', $this->month_now)
                                 ->get()
                                 ->sum('qty');
		return $top_post_count;
    }
    function getMonthlyPostData() {

		$top_post_count_array = array();
		$top_array = $this->getAllMonths();
		$top_name_array = array();
		if ( ! empty( $top_array ) ) {
            asort($top_array);
			foreach ( $top_array as $top_no => $product_name ){
				$monthly_post_count = $this->getMonthlyPostCount( $top_no );
				array_push( $top_post_count_array, $monthly_post_count );
				array_push( $top_name_array, $product_name );
			}
		}


		$topyear_post_data_array = array(
            'topname' => $top_name_array,
            'top_count_data' => $top_post_count_array,
        );
        return $topyear_post_data_array;
    }


}
