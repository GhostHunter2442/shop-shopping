<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Invoice;
use App\Product;
use Carbon\Carbon;
class ChartovermonthRepository
{
    public function __construct()
    {

        $this->dateS = now()->startOfMonth()->subMonth(12);
        $this->dateE = now();
    }


    function getAllMonths(){
        $month_array = array();
        $posts_dates = Invoice::where('status_order','!=',3)->whereBetween('created_at',[$this->dateS,$this->dateE])
        ->orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$posts_dates = json_decode( $posts_dates );

		if ( ! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {

                $date = new \DateTime( $unformatted_date->date );
                $month_no = $date->format( 'mY' );
                $month_name = $date->format( 'Y' );
                $month_array[ $month_no ] = $month_name;


			}
        }

        return  $month_array ;

    }
    function getMonthlyPostCount( $month_no,$month_name) {
		$dayly_post_count = Invoice::whereMonth( 'created_at',$month_no)->whereYear( 'created_at', $month_name )->get()->sum('price');
		return $dayly_post_count;
    }

    function getMontesumPrice() {

		$sum_price =  Invoice::where('status_order','!=',3)->whereBetween( 'created_at',[$this->dateS,$this->dateE])->get()->sum('price');
		return $sum_price;
    }
    function getOrderPrice() {

		$c_price =  Invoice::whereBetween( 'created_at',[$this->dateS,$this->dateE])->where('status_order',4)->get()->count();
		return $c_price;
    }
    function getOrderCancel() {

		$cancel_order =  Invoice::whereBetween( 'created_at',[$this->dateS,$this->dateE])->where('status_order',3)->get()->count();
		return $cancel_order;
    }
    function getProductNow() {

		$product =  Product::whereMonth( 'created_at', $this->dateE)->whereYear( 'created_at', $this->dateE)->where('status','normal')->get()->count();
		return $product;
    }
    function getProductAll() {

		$product =  Product::whereBetween( 'created_at',[$this->dateS,$this->dateE])->where('status','normal')->get()->count();
		return $product;
    }

    function getMonthlyPostData() {

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

		$monthly_post_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
                $monthly_post_count = $this->getMonthlyPostCount(substr($month_no,0,-4),$month_name);
				array_push( $monthly_post_count_array, $monthly_post_count );
                array_push( $month_name_array,$month_arr[substr($month_no,0,-4)].' '.substr($month_name,2));

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
