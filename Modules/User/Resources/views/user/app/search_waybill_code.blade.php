<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tìm kiếm theo mã vận đơn</title>
    <link rel="shortcut icon" href="{{ asset('public/templates/img/logo.png') }}" type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <style>
        a {
            padding: 10px;
            display: inline-block;
            background-color: #f7f7f7;
            border: 1px solid #dfdfdf;
            margin-bottom: 3px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col col-12 offset-2">
                <a href="{{ LaravelLocalization::getLocalizedURL('vi') }}">Tiếng việt</a>
                <a href="{{ LaravelLocalization::getLocalizedURL('zh') }}">中国</a>
            </div>
        </div>
        <div class="row">
            <div class="col col-7 offset-2" style="margin-bottom: 30px">
                <div class="card">
                    <div class="card-header">
                        <svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 250v12c0 6.6-5.4 12-12 12h-98v98c0 6.6-5.4 12-12 12h-12c-6.6 0-12-5.4-12-12v-98h-98c-6.6 0-12-5.4-12-12v-12c0-6.6 5.4-12 12-12h98v-98c0-6.6 5.4-12 12-12h12c6.6 0 12 5.4 12 12v98h98c6.6 0 12 5.4 12 12zm120 6c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-32 0c0-119.9-97.3-216-216-216-119.9 0-216 97.3-216 216 0 119.9 97.3 216 216 216 119.9 0 216-97.3 216-216z"></path></svg>
                        <svg viewBox="0 0 448 512"><path fill="currentColor" d="M447.9 176c0-10.6-2.6-21-7.6-30.3l-49.1-91.9c-4.3-13-16.5-21.8-30.3-21.8H87.1c-13.8 0-26 8.8-30.4 21.9L7.6 145.8c-5 9.3-7.6 19.7-7.6 30.3C.1 236.6 0 448 0 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32 0 0-.1-211.4-.1-272zm-87-112l50.8 96H286.1l-12-96h86.8zM192 192h64v64h-64v-64zm49.9-128l12 96h-59.8l12-96h35.8zM87.1 64h86.8l-12 96H36.3l50.8-96zM32 448s.1-181.1.1-256H160v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-64h127.9c0 74.9.1 256 .1 256H32z"></path></svg>
                        @lang('bluid.taomavandon')</div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @elseif (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('customer.waybill.code.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="code">@lang('bluid.mavandon')</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="@lang('bluid.nhapmavandon')">
                            </div>
                            <div class="form-group">
                                <label for="kg">@lang('bluid.cannang')</label>
                                <input type="text" class="form-control" id="kg" name="kg" placeholder="kg">
                            </div>
                            <button type="submit" class="btn btn-primary">@lang('bluid.taomoi')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
