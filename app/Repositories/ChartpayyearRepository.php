<?php

namespace App\Repositories;
use App\Invoice;
use App\Product;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class ChartpayyearRepository
{
    public function __construct()
    {

        $this->year_now=now()->year;
    }

    function getAllMonths(){
        $pay_arr=array(
            "1"=>"โอนผ่านธนาคาร",
            "2"=>"เก็บเงินปลายทาง",
            "3"=>"ผ่านบัตรเครดิต",
        );
        $payyear_array = array();
        $posts_data = Invoice::where('status_order','!=',3)
                      ->whereYear( 'created_at', $this->year_now)
                      ->orderBy( 'created_at', 'ASC' )->pluck( 'paymentid');
		$posts_data = json_decode( $posts_data );

		if ( ! empty( $posts_data ) ) {
			foreach ( $posts_data as $payment ) {

				$pay_no = $payment;
				$pay_name =   $pay_arr[$payment];
				$payyear_array[ $pay_no ] = $pay_name;
			}
		}
		return $payyear_array;
    }
    function getMonthlyPostCount( $pay_no ) {
        $pay_post_count = Invoice::where('status_order','!=',3)
                          ->where( 'paymentid', $pay_no )
                          ->whereYear( 'created_at', $this->year_now)->get()->sum('price');
		return $pay_post_count;
    }
    function getMonthlyPostData() {

		$pay_post_count_array = array();
		$pay_array = $this->getAllMonths();
		$pay_name_array = array();
		if ( ! empty( $pay_array ) ) {
			foreach ( $pay_array as $pay_no => $pay_name ){
				$monthly_post_count = $this->getMonthlyPostCount( $pay_no );
				array_push( $pay_post_count_array, $monthly_post_count );
				array_push( $pay_name_array, $pay_name );
			}
		}

		$monthly_post_data_array = array(
			'payname' => $pay_name_array,
			'pay_count_data' => $pay_post_count_array,

		);

		return $monthly_post_data_array;

    }

}
