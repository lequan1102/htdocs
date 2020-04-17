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
        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px)  {
            .card-body {
                padding: 0px;
            }
            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            td {
                /* Behave  like a "row" */
                padding: 6px 0;
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }
            td:last-child {
                border-bottom: 1px solid transparent;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 50%;
                transform: translateY(-50%);
                left: 19px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            /*
            Label the data
            */
            td:nth-of-type(1):before { content: "Tên hàng, mã đơn"; }
            td:nth-of-type(2):before { content: "Cân nặng, số tiền"; }
            td:nth-of-type(3):before { content: "Anh / Chị, Số điện thoại"; }
            td:nth-of-type(4):before { content: "Tình trạng đơn hàng"; }
            td:nth-of-type(5):before { content: "Ngày ký gửi"; }
        }
        #search {
            width: calc(100% - 94px);
            float: left;
            margin-right: 8px;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col col-md-9 col-12">
            <form action="{{ route('waybill.post') }}" method="GET">
                @csrf
                <label class="sr-only" for="inlineFormInputGroup">Tìm kiếm mã vận chuyển</label>
                <div class="input-group mb-2" id="search">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><svg style="width: 13px" viewBox="0 0 512 512"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"></path></svg></div>
                    </div>
                    <input type="text" class="form-control" name="key_search" placeholder="Tìm kiếm mã vận chuyển">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
            </form>
        </div>
        <div class="col col-md-9 col-12" style="margin-bottom: 30px">
            <div class="card">
                <div class="card-header">Kết quả tìm kiếm cho {{ $key_search }}
                </div>
                <div class="card-body">
                    @if (isset($result) && ($result != null))
                    <table>
                        <thead>
                        <tr>
                            <th>Tên hàng, mã đơn</th>
                            <th>Cân nặng, số tiền</th>
                            <th>Anh / Chị, Số điện thoại</th>
                            <th>Tình trạng đơn hàng</th>
                            <th>Ngày ký gửi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $result->name }} <br>
                                    {{ $result->code }}
                                </td>
                                <td>
                                    @if($result->kg == null)
                                        cân nặng: '' <br>
                                        @else
                                        {{ $result->kg }} <br>
                                    @endif
                                    @if($result->money == null)
                                        số tiền: '' <br>
                                        @else
                                        {{ $result->money }} <br>
                                    @endif
                                </td>
                                <td>
                                    {{ $result->full_name }} <br>
                                    {{ $result->phone }}
                                </td>
                                <td>
                                    @if($result->status == '')
                                        Chưa có trạng thái
                                    @else
                                        {{ $result->status }}
                                    @endif
                                </td>
                                <td>
                                    {{ $result->created_at }}<br>
                                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($result->created_at))->diffForHumans() }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                            Không tìm thấy mã vận chuyển nào mà bạn cần, hãy thử lại.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
