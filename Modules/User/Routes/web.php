<?php

/*
| --------------------------------------------------------------------------
| Các tuyến đường web         User View::
| --------------------------------------------------------------------------
|
| Đây là nơi bạn có thể đăng ký các tuyến web cho ứng dụng của bạn. Những
| tuyến đường này được tải bởi RouteServiceProvider trong một nhóm chứa
| các nhóm phần mềm trung gian "web". Bây giờ tạo ra một cái gì đó tuyệt vời!
|
*/



Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
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
     ********* Thiết lập cho giao diện   **********
     **********************************************/
    Route::prefix('user')->group(function() {
       /*
       * Đã xác thực thành công
       */
       Route::get('/', 'UserController@index')->name('index.user');

    });
});
