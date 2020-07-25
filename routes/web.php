<?php
use Illuminate\Http\Request;

use \AfterShip\AfterShipException;


// Route::get('/keyry', function (Request $request) {

    // $key = config('aftership.api_key');


    // $trackings = new AfterShip\Trackings($key);
    // // $tracking_number='SSCT000230576';
    // $tracking_number='SNBN000240462';
    // // $response = $trackings->retrack('kerry-logistics','SSCT000230576');
    // // $tracking_number = $createtrack['data']['tracking']['tracking_number'];
    // // dd($responses['data']['tracking']['tracking_number']);

    //  if(!empty($tracking_number)){
    //        try {
    //              $responses= $trackings->get('kerry-logistics', $tracking_number,array('title' => 'title,order_id'));
    //          } catch (AfterShipException $e) {
    //              $responses = $e->getMessage();

    //  }
    // }

    // // return response()->json($datatrack);

    // // $tracking_info = [
    // //             'slug'    => 'kerry-logistics',
    // //             'title'   => 'My Title',
    // //         ];
    // //         $responses= $trackings->create($tracking_number, $tracking_info);
    //         dd($responses);


// })->name('keyry.index');


Route::get('/','WelcomeController@index')->name('welcome');
//->middleware('permission:viewSales');
Route::get('/category/{id}','WelcomeController@show')->name('welcome.show');
Route::any('/showall','WelcomeController@showall')->name('welcome.showall');
Route::any('/show/discount','WelcomeController@showdiscount')->name('welcome.discount');
Route::get('/show/autocomplate', 'WelcomeController@getautocomplate')->name('welcome.getautocomplate');
Route::get('/show/category', 'WelcomeController@getcategory')->name('welcome.getcategory');



Route::get('/shop/{id}', 'ShopController@index')->name('shop.index');
Route::any('/shop/shopdetail/{id}', 'ShopController@getshop')->name('shop.shopdetail');


Route::prefix('login')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.provider.callback');
});

Route::get('contact','ContactController@index')->name('contact.index');

Auth::routes(); // ถ้า rout ไหนอยู่หลัง Auth rout ต้อง login ถึงจะเข้าได้

Route::get('/home', 'HomeController@index')->name('home');
// ->middleware('role:admin|employee');
// ->middleware('role:admin');

Route::group(['middleware' => ['auth']],function(){


    Route::prefix('backend/category')->group(function () {
        Route::get('', 'CategoryController@index')->name('category.index')->middleware('permission:viewCategory');
        Route::post('', 'CategoryController@store');
        Route::patch('{id}', 'CategoryController@update');
        Route::delete('{id}', 'CategoryController@delete');
        Route::get('datatables', 'CategoryController@getDatatables');
        Route::get('form/{id}', 'CategoryController@renderForm');
    });


    Route::prefix('backend/product')->group(function () {
        Route::get('', 'ProductController@index')->name('product.index')->middleware('permission:viewProduct');
        Route::post('', 'ProductController@store');
        Route::post('{id}', 'ProductController@update');
        Route::delete('{id}', 'ProductController@delete');
        Route::get('datatables', 'ProductController@getDatatables');
        Route::get('form/{id}', 'ProductController@renderForm');
        // Route::post('uploadfile', 'ProductController@uploadfile');
    });
    Route::prefix('backend/invoice')->group(function () {
        Route::get('', 'InvoicebackendController@index')->name('invoice.index')->middleware('permission:viewAcceptOrder');
        Route::get('preorder', 'InvoicebackendController@preorder')->name('invoice.preorder')->middleware('permission:viewPreOrder');
        Route::get('order', 'InvoicebackendController@order')->name('invoice.order')->middleware('permission:viewSentOrder');
        Route::post('{id}', 'InvoicebackendController@update');
        Route::delete('{id}', 'InvoicebackendController@delete');
        Route::get('datatables', 'InvoicebackendController@getDatatables');
        Route::get('preorder/datatables', 'InvoicebackendController@getPreordertables');
        Route::get('order/datatables', 'InvoicebackendController@getOrdertables');
        Route::get('view/{id}', 'InvoicebackendController@view');
        Route::get('form/{id}', 'InvoicebackendController@renderForm');
        Route::get('order_file/export', 'InvoicebackendController@order_export')->name('invoice.export');
        Route::post('order_file/import', 'InvoicebackendController@order_import')->name('invoice.import');
        Route::get('order_file/trackexport', 'InvoicebackendController@track_export')->name('invoice.trackexport');
        Route::post('order_file/export/all', 'InvoicebackendController@order_export_all');
        Route::get('order_file/getexport/{id}', 'InvoicebackendController@order_export_get');
        Route::post('order_file/action', 'InvoicebackendController@action')->name('invoice.action');

    });

    Route::prefix('backend/bank')->group(function () {
        Route::get('', 'BankController@index')->name('bank.index');
        Route::post('', 'BankController@store');
        Route::post('{id}', 'BankController@update');
        Route::delete('{id}', 'BankController@delete');
        Route::get('datatables', 'BankController@getDatatables');
        Route::get('form/{id}', 'BankController@renderForm');
    });


    Route::prefix('backend/report')->group(function () {
        Route::get('', 'ReportbackendController@index')->name('report.index')->middleware('permission:viewDashboardReport');
        Route::get('chartyear', 'ReportbackendController@getchartYearNow');
        Route::get('chartmont', 'ReportbackendController@getchartMonthNow');
        Route::get('chartmontover', 'ReportbackendController@getchartMonthOver');
        Route::get('chartpayyear', 'ReportbackendController@getchartPayYear');
        Route::get('chartpaymonth', 'ReportbackendController@getchartPayMonth');
        Route::get('chartpaylastmonth', 'ReportbackendController@getchartPayLastMonth');
        Route::get('charttopyear', 'ReportbackendController@getchartTopYear');
        Route::get('charttopmonth', 'ReportbackendController@getchartTopMonth');
        Route::get('charttoplastmonth', 'ReportbackendController@getchartTopLastMonth');
        Route::get('charttable/year/{status}', 'ReportbackendController@getTable');

    });

    Route::prefix('backend/reportdetail')->group(function () {
        Route::get('', 'ReportdetailController@index')->name('reportdetail.index');
        Route::get('datatables/{year}/{month}', 'ReportdetailController@gettopdata');

    });

    Route::prefix('backend/general')->group(function () {
        Route::post('', 'GeneralController@update')->name('updateForm.index');
        Route::get('form', 'GeneralController@renderForm')->name('renderForm.index');

    });


    Route::prefix('backend/user')->group(function () {
        Route::get('', 'UserController@index')->name('user.index')->middleware('role:admin');
        Route::post('', 'UserController@store');
        Route::patch('{id}', 'UserController@update');
        Route::delete('{id}', 'UserController@delete');
        Route::get('datatables', 'UserController@getDatatables');
        Route::get('form/{id}', 'UserController@renderForm');
        Route::get('username_check', 'UserController@usernameCheck');
        Route::get('password_check', 'UserController@passwordCheck');
    });

    Route::prefix('cart')->group(function () {
        Route::get('', 'CartController@index')->name('cart.index');
        Route::get('{product_id}', 'CartController@store')->name('cart.store');
        Route::get('{product_id}/delete', 'CartController@delete')->name('cart.delete');
        Route::get('update/cart/{product_id}', 'CartController@updateQtr')->name('cart.updateqtr');
    });

    //checkout
    Route::prefix('cart/checkout')->group(function () {
        Route::get('cartcheckout', 'CheckoutController@index')->name('cart.cartcheckout');
        Route::get('address', 'CheckoutController@getaddress')->name('cart.getaddress');
        Route::get('banks', 'CheckoutController@getbank')->name('cart.getbank');
        Route::get('addressid/{address_id}', 'CheckoutController@getaddressid')->name('cart.getaddressid');
        Route::post('address/adddata', 'CheckoutController@addaddress')->name('cart.addaddress');
        Route::get('track/{address_id}', 'CheckoutController@trackout')->name('cart.trackout');
        Route::get('payment/{address_id}/{payment_id}', 'CheckoutController@checkpayment')->name('cart.checkpayment');
        Route::get('paymentomise/{address_id?}/{payment_id?}/{bank_id?}', 'CheckoutController@checkpaymentomise')->name('cart.omise');
        Route::get('checkoutpament/{address_id?}/{payment_id?}/{bank_id?}', 'CheckoutController@checkoutpament')->name('cart.checkoutpament');
        Route::post('confirm', 'CheckoutController@confirm')->name('cart.confirm');
        Route::post('confirmcard', 'CheckoutController@confirmomise')->name('cart.confirmomise');
    });

    //getorder
    Route::prefix('order/orderdetail')->group(function () {
        Route::get('myorder/{any?}', 'InvoiceController@index')->name('order.index')->where('any', '.*');
        Route::get('datamyorder', 'InvoiceController@myorder')->name('order.datamyorder');
        Route::get('profile', 'ProfileController@getprofile')->name('order.getprofile');
        Route::post('profile/update', 'ProfileController@updateprofile')->name('order.updateprofile');
        Route::get('profile/getorder', 'InvoiceController@getorder')->name('order.getorder');

        //track
        Route::get('track', 'InvoiceController@gettrack')->name('order.track');
        //address
        Route::post('myorder/address/add', 'AddressController@addaddress')->name('order.addaddress');
        Route::get('address', 'AddressController@getdataaddress')->name('order.getdataaddress');
        Route::post('myorder/address/edit', 'AddressController@editaddress')->name('order.editaddress');
        Route::get('del', 'AddressController@deleteaddress')->name('order.deleteaddress');
        Route::get('checkmark', 'AddressController@checkmark')->name('order.checkmark');
        Route::post('modifypass', 'AddressController@modifypass')->name('order.modifypass');
    });



    // controller vue
    Route::prefix('cartdetail')->group(function () {
        Route::get('', 'Cartdetailcontroller@cartdetail')->name('cart.cartdetail');
        Route::get('detail', 'Cartdetailcontroller@getcartdetail')->name('cartdetail.get');
        Route::get('adddetail/{product_id}/{valueqtr}', 'Cartdetailcontroller@addcartdetail')->name('cartdetail.add')->middleware('permission:viewSales');
        Route::get('downdetail/{product_id}/{valueqtr}', 'Cartdetailcontroller@downcartdetail')->name('downdetail.down')->middleware('permission:viewSales');
        Route::get('favorite/{product_id}', 'Cartdetailcontroller@addfavorite')->name('cartdetail.addfavorite');
        Route::get('deldetail/{product_id}', 'Cartdetailcontroller@delcartdetail')->name('cartdetail.del');
        Route::get('confirm', 'Cartdetailcontroller@confirm')->name('cartdetail.confirm');
        Route::get('getitemcount', 'Cartdetailcontroller@getitemcount')->name('cartdetail.getitemcount');
    });


    //Favorite
    Route::prefix('favorite/detail')->group(function () {
        Route::get('', 'Favoritecontroller@index')->name('favorite.index');
        Route::get('getdata', 'Favoritecontroller@getfavorite')->name('favorite.getfavorite');
        Route::get('getdata/delfavorite/{product_id}', 'Favoritecontroller@delfavorite')->name('favorite.delfavorite');
    });

});



