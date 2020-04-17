<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
        'customer' => [
            'driver' => 'session',
            'provider' => 'customer',
        ],
        'customer-api' => [
            'driver' => 'token',
            'provider' => 'customer',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Nhà cung cấp người dùng
    | ------------------------------------------------- -------------------------
    |
    | Tất cả các trình điều khiển xác thực có một nhà cung cấp người dùng. Điều này định nghĩa như thế nào
    | Người dùng thực sự được lấy ra khỏi cơ sở dữ liệu của bạn hoặc bộ lưu trữ khác
    | các cơ chế được sử dụng bởi ứng dụng này để duy trì dữ liệu người dùng của bạn.
    |
    | Nếu bạn có nhiều bảng hoặc mô hình người dùng, bạn có thể định cấu hình nhiều bảng
    | nguồn đại diện cho mỗi mô hình / bảng. Những nguồn này sau đó có thể
    | được chỉ định cho bất kỳ bảo vệ xác thực bổ sung mà bạn đã xác định.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        'customer' => [
            'driver' => 'eloquent',
            'model' => Modules\User\Entities\Customer::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Đặt lại mật khẩu
    | ------------------------------------------------- -------------------------
    |
    | Bạn có thể chỉ định nhiều cấu hình đặt lại mật khẩu nếu bạn có nhiều hơn
    | hơn một bảng người dùng hoặc mô hình trong ứng dụng và bạn muốn có
    | cài đặt đặt lại mật khẩu riêng dựa trên các loại người dùng cụ thể.
    |
    | Thời gian hết hạn là số phút mà mã thông báo đặt lại phải là
    | coi là hợp lệ. Tính năng bảo mật này giúp mã thông báo tồn tại trong thời gian ngắn
    | họ có ít thời gian hơn để đoán. Bạn có thể thay đổi điều này khi cần thiết.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'customer' => [
            'provider' => 'customer',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Hết giờ xác nhận mật khẩu
    | ------------------------------------------------- -------------------------
    |
    | Tại đây bạn có thể xác định số giây trước khi xác nhận mật khẩu
    | hết thời gian và người dùng được nhắc nhập lại mật khẩu của họ thông qua
    | màn hình xác nhận. Theo mặc định, thời gian chờ kéo dài trong ba giờ.
    |
    */

    'password_timeout' => 5010800,

];
