<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị khách hàng</title>
    <link rel="shortcut icon" href="{{ asset('public/templates/img/logo.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            background-image: url('{{ asset('public/templates/img/bg.webp') }}');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Alipayviet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('customer')->user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('get.repassword') }}">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Đăng xuất</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid wrapper-info">
        <div class="container">
            <div class="info">
                <div class="hotline">
                    <img src="{{ asset('public/templates/img/phone.png') }}">
                    <div class="hotline-c">
                        <span>HOTLINE</span>
                        <p>{{ setting('contact.number_phone') }}</p>
                    </div>
                </div>
                <div class="search-customer">
                    <form action="{{ route('customer.waybill.customer') }}" method="GET">
                        @csrf
                        <input type="text" name="key_search" placeholder="Tìm kiếm tên đơn hàng hoặc mã vận đơn.">
                        <button type="submit"><svg viewBox="0 0 512 512"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"></path></svg></button>
                    </form>
                </div>
                <div class="tygia">
                    <img src="{{ asset('public/templates/img/tygia.png') }}">
                    TỶ GIÁ : {{ setting('ty-gia.nhandante') }}
                </div>
            </div>
        </div>
    </div>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <!--Tạo mới đơn hàng và ký gửi vận chuyển-->
                <div class="button-create">
                    <a href="{{ route('customer.create.order') }}">
                        <svg viewBox="0 0 448 512"><path fill="currentColor" d="M447.9 176c0-10.6-2.6-21-7.6-30.3l-49.1-91.9c-4.3-13-16.5-21.8-30.3-21.8H87.1c-13.8 0-26 8.8-30.4 21.9L7.6 145.8c-5 9.3-7.6 19.7-7.6 30.3C.1 236.6 0 448 0 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32 0 0-.1-211.4-.1-272zm-87-112l50.8 96H286.1l-12-96h86.8zM192 192h64v64h-64v-64zm49.9-128l12 96h-59.8l12-96h35.8zM87.1 64h86.8l-12 96H36.3l50.8-96zM32 448s.1-181.1.1-256H160v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-64h127.9c0 74.9.1 256 .1 256H32z"></path></svg>
                        Tạo mới đơn hàng
                    </a>
                    <a href="{{ route('customer.create.transport') }}">
                        <svg viewBox="0 0 640 512"><path fill="currentColor" d="M32 320h336c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H32C14.3 32 0 46.3 0 64v224c0 17.7 14.3 32 32 32zm0-256h336v224H32V64zm589.3 141.3l-58.5-58.5c-12-12-28.3-18.7-45.3-18.7H448c-8.8 0-16 7.2-16 16v208H228.7c-12.3-9.9-27.7-16-44.7-16-22.8 0-42.8 10.8-56 27.3-13.2-16.6-33.2-27.4-56-27.4-39.8 0-72 32.2-72 72s32.2 72 72 72c22.8 0 42.8-10.8 56-27.3 13.2 16.5 33.2 27.3 56 27.3 39.8 0 72-32.2 72-72 0-8.5-1.7-16.5-4.4-24h198c-2.7 13.2-2.2 27.6 2.8 42.4 8.4 25.1 29.9 44.9 55.6 51.1 52.8 12.8 100-26.9 100-77.6 0-5.5-.6-10.8-1.6-16H624c8.8 0 16-7.2 16-16V250.5c0-17-6.7-33.2-18.7-45.2zM72 448c-22.1 0-40-17.9-40-40s17.9-40 40-40 40 17.9 40 40-17.9 40-40 40zm112 0c-22.1 0-40-17.9-40-40s17.9-40 40-40 40 17.9 40 40-17.9 40-40 40zm280-288h53.5c8.5 0 16.6 3.3 22.6 9.4l54.6 54.6H464v-64zm64 288c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-96h-16.4c-14.6-19.3-37.5-32-63.6-32s-49 12.7-63.6 32h-.4v-96h144v96zm-504-96h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v144c0 4.4 3.6 8 8 8zm96 0h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v144c0 4.4 3.6 8 8 8zm96 0h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v144c0 4.4 3.6 8 8 8z"></path></svg>
                        Tạo mới ký gửi vận chuyển
                    </a>
                </div>
                <!--Contentd-->
            @yield('content')
                <!--Sidebar-->
                <div class="col col-md-3 col-12">
                    <div class="row">
                        <!--Tutorial-->
                        <div class="col-12" style="margin-bottom: 30px">
                            <div class="card">
                                <div class="card-header"><svg viewBox="0 0 384 512"><path fill="currentColor" d="M200.343 0C124.032 0 69.761 31.599 28.195 93.302c-14.213 21.099-9.458 49.674 10.825 65.054l42.034 31.872c20.709 15.703 50.346 12.165 66.679-8.51 21.473-27.181 28.371-31.96 46.132-31.96 10.218 0 25.289 6.999 25.289 18.242 0 25.731-109.3 20.744-109.3 122.251V304c0 16.007 7.883 30.199 19.963 38.924C109.139 360.547 96 386.766 96 416c0 52.935 43.065 96 96 96s96-43.065 96-96c0-29.234-13.139-55.453-33.817-73.076 12.08-8.726 19.963-22.917 19.963-38.924v-4.705c25.386-18.99 104.286-44.504 104.286-139.423C378.432 68.793 288.351 0 200.343 0zM192 480c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64zm50.146-186.406V304c0 8.837-7.163 16-16 16h-68.292c-8.836 0-16-7.163-16-16v-13.749c0-86.782 109.3-57.326 109.3-122.251 0-32-31.679-50.242-57.289-50.242-33.783 0-49.167 16.18-71.242 44.123-5.403 6.84-15.284 8.119-22.235 2.848l-42.034-31.872c-6.757-5.124-8.357-14.644-3.62-21.677C88.876 60.499 132.358 32 200.343 32c70.663 0 146.089 55.158 146.089 127.872 0 96.555-104.286 98.041-104.286 133.722z"></path></svg>Hướng dẫn</div>
                                <div class="card-body">
                                    @foreach ($tutorial as $item)
                                        <div>
                                            <a href="{{ route('customer.tutorial',['slug' => $item->slug]) }}">
                                                <svg style="width: 5px; margin-right: 0px; color: #000;" viewBox="0 0 192 512"><path fill="currentColor" d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z"></path></svg>
                                                {{ $item->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--Manage Order-->
                        <div class="col-12" style="margin-bottom: 30px">
                            <div class="card">
                                <div class="card-header"><svg viewBox="0 0 448 512"><path fill="currentColor" d="M447.9 176c0-10.6-2.6-21-7.6-30.3l-49.1-91.9c-4.3-13-16.5-21.8-30.3-21.8H87.1c-13.8 0-26 8.8-30.4 21.9L7.6 145.8c-5 9.3-7.6 19.7-7.6 30.3C.1 236.6 0 448 0 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32 0 0-.1-211.4-.1-272zm-87-112l50.8 96H286.1l-12-96h86.8zM192 192h64v64h-64v-64zm49.9-128l12 96h-59.8l12-96h35.8zM87.1 64h86.8l-12 96H36.3l50.8-96zM32 448s.1-181.1.1-256H160v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-64h127.9c0 74.9.1 256 .1 256H32z"></path></svg>Quản lý đơn hàng</div>
                                <div class="card-body">
                                    <div>
                                        <svg viewBox="0 0 448 512"><path fill="currentColor" d="M447.9 176c0-10.6-2.6-21-7.6-30.3l-49.1-91.9c-4.3-13-16.5-21.8-30.3-21.8H87.1c-13.8 0-26 8.8-30.4 21.9L7.6 145.8c-5 9.3-7.6 19.7-7.6 30.3C.1 236.6 0 448 0 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32 0 0-.1-211.4-.1-272zm-87-112l50.8 96H286.1l-12-96h86.8zM192 192h64v64h-64v-64zm49.9-128l12 96h-59.8l12-96h35.8zM87.1 64h86.8l-12 96H36.3l50.8-96zM32 448s.1-181.1.1-256H160v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-64h127.9c0 74.9.1 256 .1 256H32z"></path></svg>
                                        <a href="{{ route('customer.order') }}">Tất cả đơn hàng</a>
                                    </div>
                                    <div>
                                        <svg viewBox="0 0 640 512"><path fill="currentColor" d="M32 320h336c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H32C14.3 32 0 46.3 0 64v224c0 17.7 14.3 32 32 32zm0-256h336v224H32V64zm589.3 141.3l-58.5-58.5c-12-12-28.3-18.7-45.3-18.7H448c-8.8 0-16 7.2-16 16v208H228.7c-12.3-9.9-27.7-16-44.7-16-22.8 0-42.8 10.8-56 27.3-13.2-16.6-33.2-27.4-56-27.4-39.8 0-72 32.2-72 72s32.2 72 72 72c22.8 0 42.8-10.8 56-27.3 13.2 16.5 33.2 27.3 56 27.3 39.8 0 72-32.2 72-72 0-8.5-1.7-16.5-4.4-24h198c-2.7 13.2-2.2 27.6 2.8 42.4 8.4 25.1 29.9 44.9 55.6 51.1 52.8 12.8 100-26.9 100-77.6 0-5.5-.6-10.8-1.6-16H624c8.8 0 16-7.2 16-16V250.5c0-17-6.7-33.2-18.7-45.2zM72 448c-22.1 0-40-17.9-40-40s17.9-40 40-40 40 17.9 40 40-17.9 40-40 40zm112 0c-22.1 0-40-17.9-40-40s17.9-40 40-40 40 17.9 40 40-17.9 40-40 40zm280-288h53.5c8.5 0 16.6 3.3 22.6 9.4l54.6 54.6H464v-64zm64 288c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-96h-16.4c-14.6-19.3-37.5-32-63.6-32s-49 12.7-63.6 32h-.4v-96h144v96zm-504-96h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v144c0 4.4 3.6 8 8 8zm96 0h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v144c0 4.4 3.6 8 8 8zm96 0h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v144c0 4.4 3.6 8 8 8z"></path></svg>
                                        <a href="{{ route('customer.transport') }}">Tất cả đơn ký gửi vận chuyển</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Info-->
                        <div class="col-12" style="margin-bottom: 30px">
                            <div class="card">
                                <div class="card-header"><svg viewBox="0 0 448 512"><path fill="currentColor" d="M313.6 288c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"></path></svg>Thông tin cá nhân</div>
                                <div class="card-body">
                                    <div>
                                        <svg viewBox="0 0 448 512"><path fill="currentColor" d="M313.6 288c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"></path></svg>
                                        <a href="{{ route('customer.aboutme',['id' => Auth::guard('customer')->user()->id ]) }}">Thông tin</a>
                                    </div>
                                    <div>
                                        <svg viewBox="0 0 512 512"><path fill="currentColor" d="M329.37 137.37c-12.49 12.5-12.49 32.76 0 45.26 12.5 12.5 32.76 12.5 45.26 0 12.49-12.5 12.49-32.76 0-45.26-12.5-12.49-32.76-12.49-45.26 0zm64-64c-12.49 12.5-12.49 32.76 0 45.26 12.5 12.5 32.76 12.5 45.26 0s12.5-32.76 0-45.26c-12.5-12.49-32.76-12.49-45.26 0zM448 0H320c-35.35 0-64 28.65-64 64v128c0 11.85 3.44 22.8 9.05 32.32L2.34 487.03c-3.12 3.12-3.12 8.19 0 11.31l11.31 11.31c3.12 3.12 8.19 3.12 11.31 0l48.7-48.7 46.4 46.4c6.16 6.16 16.2 6.22 22.43 0l44.86-44.86c6.19-6.19 6.19-16.23 0-22.43l-46.4-46.4 28.71-28.72 46.4 46.4c6.16 6.16 16.2 6.22 22.43 0l44.86-44.86c6.19-6.19 6.19-16.23 0-22.43l-46.4-46.4 50.72-50.72c9.52 5.61 20.47 9.05 32.32 9.05h128c35.35 0 64-28.65 64-64V64C512 28.65 483.35 0 448 0zM153.71 451.28l-22.43 22.43-35.18-35.18 22.43-22.43 35.18 35.18zm96-96l-22.43 22.43-35.19-35.19 22.43-22.43 35.19 35.19zM480 192c0 17.64-14.36 32-32 32H320c-17.64 0-32-14.36-32-32V64c0-17.64 14.36-32 32-32h128c17.64 0 32 14.36 32 32v128z"></path></svg>
                                        <a href="{{ route('get.repassword') }}">Đổi mật khẩu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! setting('site.custom') !!}
        </div>
    </main>
</div>
</body>
</html>
