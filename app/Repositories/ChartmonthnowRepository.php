<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Invoice;
use App\Product;
class ChartmonthnowRepository
{
    public function __construct()
    {
        // $this->invoice_id = $id;
        $this->year_now=now()->year;
        $this->month_now=now()->month;
        $this->day_now=now()->day;
    }


    function getAllMonths(){
        $month_array = array();
        $posts_dates = Invoice::where('status_order','!=',3)->whereYear( 'created_at', $this->year_now)
        ->whereMonth( 'created_at',$this->month_now)->orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$posts_dates = json_decode( $posts_dates );

		if ( ! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date->date );
				$month_no = $date->format( 'd' );
                $month_name = $date->format( 'm' );
				$month_array[ $month_no ] = $month_name;
			}
		}
		return $month_array;
    }
       function getMonthlyPostCount( $month_no,$month_name ) {
        $dayly_post_count = Invoice::whereMonth( 'created_at',$month_name)
                         ->whereYear( 'created_at', $this->year_now)
                         ->whereDay( 'created_at', $month_no )->get()->sum('price');
		return $dayly_post_count;
    }

    function getMontesumPrice() {

		$sum_price = Invoice::whereMonth( 'created_at', $this->month_now)->get()->sum('price');
		return $sum_price;
    }
    function getOrderPrice() {

		$c_price = Invoice::whereMonth( 'created_at', $this->month_now)->where('status_order',4)->get()->count();
		return $c_price;
    }
    function getOrderCancel() {

		$cancel_order = Invoice::whereMonth( 'created_at', $this->month_now)->where('status_order',3)->get()->count();
		return $cancel_order;
    }
    function getProductNow() {

		$product = Product::whereMonth( 'created_at', $this->month_now)->whereDay( 'created_at', $this->day_now)->where('status','normal')->get()->count();
		return $product;
    }
    function getProductAll() {

		$product = Product::whereMonth( 'created_at', $this->month_now)->where('status','normal')->get()->count();
		return $product;
    }


    function getMonthlyPostData() {

		$monthly_post_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
                $monthly_post_count = $this->getMonthlyPostCount( $month_no, $month_name);
				array_push( $monthly_post_count_array, $monthly_post_count );
                array_push( $month_name_array, $month_no.'-'.$month_name );

			}
		}


        $sum_price = $this->getMontesumPrice();
        $order_price = $this->getOrderPrice();
        $order_cancel = $this->getOrderCancel();
        $total_order= $order_price+$order_cancel;

        $product_all = $this->getProductAll();
        $product_now = $this->getProductNow();

		$monthly_post_data_array = array(
			'months' => $month_name_array,
			'post_count_data' => $monthly_post_count_array,
            'price' => $sum_price ,
            'total_order' => $total_order ,
            'order_success' => $order_price ,
            'product_all' => $product_all ,
            'product_now' => $product_now ,
		);

        return $monthly_post_data_array;

    }
}
