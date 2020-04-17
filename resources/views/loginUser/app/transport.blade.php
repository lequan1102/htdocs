@extends('layouts.app')

@section('content')
    <style>
        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px)  {
            .order table tr td:first-child {
                background-color: #b6dcfd;
                padding-top: 6px;
                padding-bottom: 6px;
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
            td:nth-of-type(1):before { content: "STT"; text-align: left;}
            td:nth-of-type(2):before { content: "Tên hàng, mã đơn"; }
            td:nth-of-type(3):before { content: "Cân nặng (kg)"; }
            td:nth-of-type(4):before { content: "Số tiền đơn hàng"; }
            td:nth-of-type(5):before { content: "Trạng thái"; }
            td:nth-of-type(6):before { content: "Ngày ký gửi"; }
        }
    </style>
    <div class="col col-md-9 col-12" style="margin-bottom: 30px">
        <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between">
                <div>
                    <svg viewBox="0 0 448 512"><path fill="currentColor" d="M447.9 176c0-10.6-2.6-21-7.6-30.3l-49.1-91.9c-4.3-13-16.5-21.8-30.3-21.8H87.1c-13.8 0-26 8.8-30.4 21.9L7.6 145.8c-5 9.3-7.6 19.7-7.6 30.3C.1 236.6 0 448 0 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32 0 0-.1-211.4-.1-272zm-87-112l50.8 96H286.1l-12-96h86.8zM192 192h64v64h-64v-64zm49.9-128l12 96h-59.8l12-96h35.8zM87.1 64h86.8l-12 96H36.3l50.8-96zM32 448s.1-181.1.1-256H160v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-64h127.9c0 74.9.1 256 .1 256H32z"></path></svg>Tất cả ký gửi vận chuyển
                </div>
                <a href="{{ route('transport.export.id') }}" class="button_export"><svg viewBox="0 0 384 512"><path fill="currentColor" d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zm-22.6 22.7c2.1 2.1 3.5 4.6 4.2 7.4H256V32.5c2.8.7 5.3 2.1 7.4 4.2l83.9 83.9zM336 480H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h176v104c0 13.3 10.7 24 24 24h104v304c0 8.8-7.2 16-16 16zM211.7 308l50.5-81.8c4.8-8-.9-18.2-10.3-18.2h-4.1c-4.1 0-7.9 2.1-10.1 5.5-31 48.5-36.4 53.5-45.7 74.5-17.2-32.2-8.4-16-45.8-74.5-2.2-3.4-6-5.5-10.1-5.5H132c-9.4 0-15.1 10.3-10.2 18.2L173 308l-59.1 89.5c-5.1 8 .6 18.5 10.1 18.5h3.5c4.1 0 7.9-2.1 10.1-5.5 37.2-58 45.3-62.5 54.4-82.5 31.5 56.7 44.3 67.2 54.4 82.6 2.2 3.4 6 5.4 10 5.4h3.6c9.5 0 15.2-10.4 10.1-18.4L211.7 308z"></path></svg>Xuất excel</a>
            </div>
            <div class="card-body order">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên hàng, mã đơn</th>
                            <th>Cân nặng (kg)</th>
                            <th>Số tiền đơn hàng</th>
                            <th>Trạng thái</th>
                            <th>Ngày ký gửi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($transport))
                            @foreach ($transport as $index => $item)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>
                                       <a href="">{{ $item->name }}</a><br>
                                       {{ $item->code }}
                                    </td>
                                    <td>
                                        @if ($item->kg == null)
                                            Đợi phản hồi
                                            @else
                                            {{ $item->kg }} kg
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->money == null)
                                            Đợi phản hồi
                                            @else
                                            {{ $item->money }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == null)
                                            Đợi phản hồi
                                            @else
                                            {{ $item->status }}
                                        @endif
                                    </td>
                                    <td>
                                       {{ $item->created_at }}<br>
                                       {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                Không có dữ liệu
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $transport->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
@endsection
