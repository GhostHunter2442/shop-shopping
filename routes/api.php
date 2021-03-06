<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();


// });
// Route::middleware('auth:api')->get('/cartdetail/detail', 'Api\ShopdetailController@getsumitem');

// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/cartdetail/detail', 'Api\ShopdetailController@getsumitem');
// });
Route::get('/cartdetail/detail', 'Api\ShopdetailController@getsumitem');
Route::get('/cartdetail/getallfavorite', 'Api\ShopdetailController@getallfavorite');
 Route::get('/cartdetail/getfavorite/{product_id}', 'Api\ShopdetailController@getfavorite')->name('cartdetail.getfavorite');
 Route::get('/cartdetail/rating', 'Api\ShopdetailController@setrating')->name('setrating');
 Route::get('/cartdetail/rating/{id}', 'Api\ShopdetailController@getrating')->name('getrating');
 Route::get('/cartdetail/getinvoice/', 'Api\ShopdetailController@getinvoice')->name('getinvoice');

