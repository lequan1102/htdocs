@extends('layouts.app')

@section('content')
    <link href="{{ asset('public/frontend/templates/libs/select2/select2.min.css') }}" rel="stylesheet">
    <style>
        .select2-container {
            width: 100% !important;
        }
        .select2-container .select2-selection--single {
            height: 37px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 37px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 37px;
        }
    </style>
    <div class="col col-md-9 col-12" style="margin-bottom: 30px">
        <div class="card">
            <div class="card-header">
                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 250v12c0 6.6-5.4 12-12 12h-98v98c0 6.6-5.4 12-12 12h-12c-6.6 0-12-5.4-12-12v-98h-98c-6.6 0-12-5.4-12-12v-12c0-6.6 5.4-12 12-12h98v-98c0-6.6 5.4-12 12-12h12c6.6 0 12 5.4 12 12v98h98c6.6 0 12 5.4 12 12zm120 6c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-32 0c0-119.9-97.3-216-216-216-119.9 0-216 97.3-216 216 0 119.9 97.3 216 216 216 119.9 0 216-97.3 216-216z"></path></svg>
                <svg viewBox="0 0 448 512"><path fill="currentColor" d="M447.9 176c0-10.6-2.6-21-7.6-30.3l-49.1-91.9c-4.3-13-16.5-21.8-30.3-21.8H87.1c-13.8 0-26 8.8-30.4 21.9L7.6 145.8c-5 9.3-7.6 19.7-7.6 30.3C.1 236.6 0 448 0 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32 0 0-.1-211.4-.1-272zm-87-112l50.8 96H286.1l-12-96h86.8zM192 192h64v64h-64v-64zm49.9-128l12 96h-59.8l12-96h35.8zM87.1 64h86.8l-12 96H36.3l50.8-96zM32 448s.1-181.1.1-256H160v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-64h127.9c0 74.9.1 256 .1 256H32z"></path></svg>
                Tạo mới ký gửi vận chuyển</div>
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
                <form action="{{ route('customer.create.transport.post') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm ký gửi</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm ký gửi" required>
                            </div>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="code">Mã vận đơn</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã vận đơn" required>
                            </div>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="full_name">Họ và tên</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Tên người nhận" required>
                            </div>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                            </div>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="js-select2-location">Địa chỉ nhận</label>
                                <select name="location" id="js-select2-location">
                                    <option value="Hà Nội">Hà Nội</option>
                                    <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                                    <option value="An Giang">An Giang</option>
                                    <option value="Bắc Giang">Bắc Giang</option>
                                    <option value="Bắc Kạn">Bắc Kạn</option>
                                    <option value="Bạc Liêu">Bạc Liêu</option>
                                    <option value="Bắc Ninh">Bắc Ninh</option>
                                    <option value="Bến Tre">Bến Tre</option>
                                    <option value="Bình Định">Bình Định</option>
                                    <option value="Bình Dương">Bình Dương</option>
                                    <option value="Bình Thuận">Bình Thuận</option>
                                    <option value="Cà Mau">Cà Mau</option>
                                    <option value="Cao Bằng">Cao Bằng</option>
                                    <option value="Đắk Lắk">Đắk Lắk</option>
                                    <option value="Đắk Nông">Đắk Nông</option>
                                    <option value="Điện Biên">Điện Biên</option>
                                    <option value="Đồng Nai">Đồng Nai</option>
                                    <option value="Đồng Tháp">Đồng Tháp</option>
                                    <option value="Gia Lai">Gia Lai</option>
                                    <option value="Hà Giang">Hà Giang</option>
                                    <option value="Hà Nam">Hà Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label>Loại vận chuyển</label>
                                <div style="display: flex;">
                                    <div style="margin-right: 50px">
                                        <label style="display: block"><input type="radio" name="transport" checked value="Thường" style="margin-right: 5px">Thường</label>
                                        <label><input type="radio" name="transport" value="Nhanh" style="margin-right: 5px">Nhanh</label>
                                    </div>
                                    <div>
                                        <label for="dong-go" style="display: block;">
                                            <input id="dong-go" style="margin-right: 5px" type="checkbox" name="box[]" value="Đóng gỗ">
                                            Đóng gỗ
                                        </label>
                                        <label for="bao-hiem">
                                            <input id="bao-hiem" style="margin-right: 5px" type="checkbox" name="box[]" value="Bảo hiểm">
                                            Bảo hiểm
                                        </label>
                                        <label for="kiem-dem">
                                            <input id="kiem-dem" style="margin-right: 5px" type="checkbox" name="box[]" value="Kiểm đếm">
                                            Kiểm đếm
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12" style="margin-bottom: 20px">
                            <div class="form-group">
                                <label for="note">Ghi chú ký gửi vận chuyển</label>
                                <textarea style="height: 100px" name="note" id="note" class="form-control" placeholder="Ghi chú ký gửi vận chuyển chi tiết."></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo vận đơn</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/templates/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/frontend/templates/libs/select2/select2.full.min.js') }}"></script>
    <script>
        $('#js-select2-location').select2();
    </script>
@endsection
