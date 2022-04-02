<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Admin
Route::group(['middleware' => ['sessions']], function () {
    Route::prefix('/')-> namespace ('App\\Http\\Controllers\\Api\\Admin')-> group (function(){
        Route::get('homes','AdminController@home')->name('homes.home');
        Route::get('admin','AdminController@login')->name('admin.login');
        Route::post('admins','AdminController@check')->name('admins.check');
        Route::get('adminss/{id}','AdminController@logout')->name('adminss.logout');

        Route::get('loadadmin','AdminController@loadAdmin')->name('loadadmin.loadAdmin');
        Route::post('changerole','AdminController@addRole')->name('changerole.addRole');

        Route::get('get-role/{id}','AdminController@getRole')->name('get-role.getRole');
        
        Route::post('export-excel','ProductController@export_Excel')->name('export-excel.export_Excel');
        Route::post('import-excel','ProductController@import_Excel')->name('import-excel.import_Excel');
        Route::post('product-type/{id}','product_TypeController@staType')->name('product-type.staType');
        Route::resource('customer','CustomerController');
        Route::resource('product-type','product_TypeController');
        Route::resource('product-size','product_SizeController');
        Route::resource('product-brand','product_BrandController');
        Route::resource('product-sale','product_SaleController');
        Route::resource('product','ProductController');
        Route::resource('news','NewsController');
        Route::resource('details-new','details_NewsController');
        Route::resource('discounts','DiscountController');
        Route::resource('details-discount','details_DiscountController');
        Route::resource('admin-authen','AuthenticationController');
        Route::resource('slide','SlideController');

        //Bill
        Route::get('bill-waiting','BillController@showBillwai')->name('bill-waiting.showBillwai');
        Route::post('status/{id}','BillController@statusBill')->name('status.statusBill');
        Route::post('status-sc/{id}','BillController@statusBillsc')->name('status-sc.statusBillsc');

        Route::get('load-customer','BillController@loadCustomer')->name('load-customer.loadCustomer');

        Route::get('details-bill/{id}','BillController@detailBill')->name('details-bill.detailBill');

        Route::get('bill-transport','BillController@showBilltransport')->name('bill-transport.showBilltransport');
        Route::post('status-transport/{id}','BillController@statusBilltr')->name('status.statusBilltr');

        Route::get('bill-success','BillController@showBillsuccess')->name('bill-success.showBillsuccess');

        Route::get('bill-cancel','BillController@showBillcancel')->name('bill-cancel.showBillcancel');

        Route::get('print-bill/{id}','BillController@billPDF')->name('print-bill.billPDF');

        Route::post('statusproduct/{id}','BillController@staProduct')->name('statusproduct.staProduct');


        // Exel
        Route::post('export-bill-success','BillController@export_Bill_Success')->name('export-bill-success.export_Bill_Success');
        Route::post('export-bill-waiting','BillController@export_Bill_Waiting')->name('export-bill-waiting.export_Bill_Waiting');
        Route::post('export-bill-cancel','BillController@export_Bill_Cancel')->name('export-bill-cancel.export_Bill_Cancel');
        Route::post('export-bill-trport','BillController@export_Bill_Trport')->name('export-bill-trport.export_Bill_Trport');
        //THong kê
        Route::get('statistical','StatisticalController@getStatistical')->name('statistical.getStatistical');
        Route::post('date','StatisticalController@getDate')->name('date.getDate');
        Route::post('week','StatisticalController@getWeek')->name('week.getWeek');

        //Vận chuyển
        Route::get('delivery','DeliveryController@add_Delivery')->name('delivery.add_Delivery');
        Route::post('select-delivery','DeliveryController@select_Delivery')->name('select-delivery.select_Delivery');
        Route::post('insert-delivery','DeliveryController@insert_Delivery')->name('insert-delivery.insert_Delivery');
     });
//Home
    Route::prefix('/')-> namespace ('App\\Http\\Controllers\\Api\\Home')-> group (function(){
        Route::resource('home','HomeController');
        Route::resource('product-detalis','ProductController');
        Route::resource('brand','BrandController');
        Route::resource('sale','SaleController');

        //Sap xep
        Route::get('high-price/{id}','SearchController@highPrice')->name('high-price.highPrice');
        Route::get('low-price/{id}','SearchController@lowPrice')->name('low-price.lowPrice');
        Route::get('popular-product/{id}','SearchController@popularPro')->name('popular-product.popularPro');

        Route::post('search-price/{id}','SearchController@searchPrice')->name('search-price.searchPrice');
        Route::post('rating-product','SearchController@ratingProduct')->name('rating-product.ratingProduct');
        Route::post('search-detail','SearchController@searchDetail')->name('search-detail.searchDetail');
       
       
        // Cart
        Route::post('cart','CartController@addCart')->name('cart.addCart');
        Route::get('carts','CartController@showCart')->name('carts.showCart');
        Route::post('/search-product','SearchController@ajaxSearch')->name('search-product.ajaxSearch');
        Route::get('/pay','CartController@deliveryCart')->name('pay.deliveryCart');
        Route::get('/payment','CartController@paymentCart')->name('payment.paymentCart');
        Route::get('/delete/{id}','CartController@deleteCart')->name('delete.deleteCart');
        Route::post('/update','CartController@updateCart')->name('update.updateCart');
        Route::get('/addBill','CartController@addBill')->name('addBill.addBill');

        Route::post('/discount','CartController@addDiscount')->name('discount.addDiscount');

        Route::post('/addressdiff','CartController@addAddress')->name('addressdiff.addAddress');
        Route::get('/addressdefau','CartController@addDefaut')->name('addressdefau.addDefaut');

        //User 
        Route::get('login-user','UserController@login')->name('login-user.login');
        Route::get('regis-user','UserController@regis')->name('regis-user.regis');
        Route::post('users','UserController@check')->name('users.check');
        Route::post('regis-users','UserController@registerUser')->name('regis-users.registerUser');
        Route::get('logout-out','UserController@logoutUser')->name('logout-out.logoutUser');
        Route::post('updateaddress','UserController@updateAddress')->name('updateaddress.updateAddress');

        Route::get('judge-product/{id}','UserController@judgeProduct')->name('judge-product.judgeProduct');
        Route::post('update-comment/{id}','UserController@updateComment')->name('update-comment.updateComment');
        Route::get('bill-detailuser/{id}','UserController@billdetailUser')->name('bill-detailuser.billdetailUser');


        //.
        Route::get('info-user/{id}','UserController@infoUser')->name('info-user.infoUser');
        Route::get('addr-user/{id}','UserController@addrUser')->name('addr-user.addrUser');
        Route::get('cpuser/{id}','UserController@changepassUser')->name('cpuser.changepassUser');
        Route::post('newpassuser/{id}','UserController@updatepass')->name('newpassuser.updatepass');
        Route::get('contact-home','HomeController@contact')->name('contact-home.contact');
        Route::get('control-bill/{id}','UserController@billUser')->name('control-bill.billUser');
        Route::get('success-bill/{id}','UserController@successbillUser')->name('success-bill.successbillUser');
        Route::get('waiting-bill/{id}','UserController@waitingbillUser')->name('waiting-bill.waitingbillUser');
        Route::get('transport-bill/{id}','UserController@transportbillUser')->name('transport-bill.transportbillUser');
        Route::get('cancel-bill/{id}','UserController@cancelbillUser')->name('cancel-bill.cancelbillUser');

        Route::post('status-cancer/{id}','UserController@statusBillscan')->name('status-cancer.statusBillscan');

        Route::get('discount-user/{id}','UserController@discountUsser')->name('discount-user.discountUsser');

        //
        Route::get('news-home','NewsController@news')->name('news-home.news');
        Route::get('detail-news/{id}','NewsController@detailnews')->name('detail-news.detailnews');

        // google
        Route::get('login-google','UserController@loginGoogle')->name('login-google.loginGoogle');
        Route::get('CusGG/callback','UserController@callback_GG')->name('CusGG/callback.callback_GG');

        Route::get('contact-home','HomeController@contactHome')->name('contact-home.contactHome');
     });
    
});






