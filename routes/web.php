<?php

/*
| --------------------------------------------------------------------------
| Các tuyến đường web           Frontend  view::
| --------------------------------------------------------------------------
|
| Đây là nơi bạn có thể đăng ký các tuyến web cho ứng dụng của bạn. Những
| tuyến đường này được tải bởi RouteServiceProvider trong một nhóm chứa
| các nhóm phần mềm trung gian "web". Bây giờ tạo ra một cái gì đó tuyệt vời!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /**********************************************
     ********* Thiết lập cho đa ngôn ngữ **********
     **********************************************/
    Route::get('locale', function () {
        return \App::getLocale();
    });
    Route::get('locale/{locale}', function ($locale) {
        Session::put('locale', $locale);
        $parts = parse_url(URL::previous());
        return redirect($locale.substr($parts['path'],3));
    });
    /**********************************************
     ********* Thiết lập đăng nhập user  **********
     **********************************************/
    Route::get('login', 'LoginUserController@signin')->name('login');
    Route::post('login', 'LoginUserController@login_submit')->name('login.submit');
    Route::get('signup', 'LoginUserController@signup')->name('login.signup');
    Route::post('signup', 'LoginUserController@signup_submit')->name('login.signup.submit');

    Route::post('logout', 'LoginUserController@logout')->name('logout');
    /**********************************************
     ********* Thiết lập cho giao diện   **********
     **********************************************/
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'san-pham'], function() {
        Route::get('/','HomeController@cate_product')->name('cate_product');
        Route::get('{slug}.html','HomeController@article_product')->name('article_product');
    });

    /**********************************************
     *********       Cart Giỏ hàng       **********
     **********************************************/

     Route::group(['prefix' => 'cart'], function() {
         Route::get('/', 'CartController@index')->name('cart');
         Route::post('add-cart', 'CartController@store')->name('add.cart');
         Route::get('remove-cart', 'CartController@remove')->name('remove.cart');
     });
















    /*
     * Tìm kiếm
     * customer.waybill.code       $GET  | link người Trung quốc có thể nhập mã vận đơn
     * customer.waybill.code.post  $POST | link người Trung quốc có thể nhập mã vận đơn và thêm kho hoặc cập nhật kho
     */
});


/*
 * Route Export Excel
 *
 * ::excel download get all Order By Id Customer
 * ::excel download get all Transport By Id Customer
 * ::excel download get all Order               -- In route on Voyager 'prefix' => 'admin'
 * ::excel download get all Transport           -- In route on Voyager 'prefix' => 'admin'
 */

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    // Route::get('/excel-order', 'ExcelController@export_order_all')->name('order.export');
    // Route::get('/excel-transport', 'ExcelController@export_transport_all')->name('transport.export');
});
