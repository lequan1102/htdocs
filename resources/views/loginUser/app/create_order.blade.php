@extends('layouts.app')

@section('content')
    <link href="{{ asset('public/templates/libs/dropify/css/dropify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/templates/libs/select2/select2.min.css') }}" rel="stylesheet">
    <style>
        .select2-container {
            width: 100% !important;
        }
        .form-group {
            margin-bottom: 5px;
        }
        .dropify-wrapper {
            height: 121px;
            border-radius: 4px;
        }
        textarea {
            height: 121px !important;
            margin-bottom: 5px;
        }
        .qty-input {
            display: flex;
            float: left;
            margin-right: 5px;
        }
        .qty-input input[type="button"] {
            border: 1px solid #bbbbbb;
            border-radius: 3px 0 0 3px;
            width: 25px;
            outline: none;
        }
        .qty-input input[type="button"].v2 {
            border-radius: 0 3px 3px 0;
        }
        .qty-input input[type="text"] {
            border-radius: 0px;
            border-top: 1px solid #bbbbbb;
            border-bottom: 1px solid #bbbbbb;
            border-left: 0px;
            border-right: 0px;
            width: 72px;
            text-align: center;
            height: 37px;
        }
        input.kg {
            width: 30%;
            float: left;
            margin-right: 5px;
        }
        .total-price {
            width: 60%;
        }
    </style>
    <div class="col col-md-9 col-12" style="margin-bottom: 30px">
        <div class="card">
            <form action="{{ route('customer.create.order.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 250v12c0 6.6-5.4 12-12 12h-98v98c0 6.6-5.4 12-12 12h-12c-6.6 0-12-5.4-12-12v-98h-98c-6.6 0-12-5.4-12-12v-12c0-6.6 5.4-12 12-12h98v-98c0-6.6 5.4-12 12-12h12c6.6 0 12 5.4 12 12v98h98c6.6 0 12 5.4 12 12zm120 6c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-32 0c0-119.9-97.3-216-216-216-119.9 0-216 97.3-216 216 0 119.9 97.3 216 216 216 119.9 0 216-97.3 216-216z"></path></svg>
                <svg viewBox="0 0 448 512"><path fill="currentColor" d="M447.9 176c0-10.6-2.6-21-7.6-30.3l-49.1-91.9c-4.3-13-16.5-21.8-30.3-21.8H87.1c-13.8 0-26 8.8-30.4 21.9L7.6 145.8c-5 9.3-7.6 19.7-7.6 30.3C.1 236.6 0 448 0 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32 0 0-.1-211.4-.1-272zm-87-112l50.8 96H286.1l-12-96h86.8zM192 192h64v64h-64v-64zm49.9-128l12 96h-59.8l12-96h35.8zM87.1 64h86.8l-12 96H36.3l50.8-96zM32 448s.1-181.1.1-256H160v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-64h127.9c0 74.9.1 256 .1 256H32z"></path></svg>
                Tạo mới đơn hàng</div>
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
                    <div class="form-row">
                        <div class="col col-md-2 col-12">
                            <div class="form-group">
                                <input type="file" class="dropify" id="image" name="image">
                            </div>
                        </div>
                        <div class="col col-md-5 col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Tên đơn hàng" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('link') }}" name="link" placeholder="Link sản phẩm" required>
                            </div>
                            <div class="qty-input">
                                <input type="button" onclick="decrementValue()" value="-" />
                                <input type="text" name="qty" value="{{ old('qty') }}" maxlength="10" max="9999999999" size="1" id="number" placeholder="Số lượng" required>
                                <input type="button" class="v2" onclick="incrementValue()" value="+" />
                            </div>
                            <input type="text" class="form-control total-price" value="{{ old('money') }}" name="money" placeholder="Đơn giá" required>
                        </div>
                        <div class="col col-md-5 col-12">
                            <div class="form-group">
                                <textarea type="text" class="form-control" value="{{ old('note') }}" name="note" placeholder="Ghi chú thêm, màu sắc..."></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-header">Loại vận chuyển</div>
            <div class="card-body">
                <div class="form-group">
                    <div style="display: flex;">
                        <div class="thanhpho" style="margin-right: 50px; width: 200px;">
                            <label for="" style="margin-bottom: 0px;">Chọn tỉnh thành</label>
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
                            @error('location')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="vanchuyen" style="margin-right: 50px">
                            <label style="display: block"><input type="radio" name="transport" value="Thường" checked style="margin-right: 5px">Thường</label>
                            <label><input type="radio" name="transport" value="Nhanh" style="margin-right: 5px">Nhanh</label>
                        </div>
                        <div>
                            <label for="dong-go" style="display: block;">
                                <input id="dong-go" style="margin-right: 5px" type="checkbox" name="box[]" value="Đóng gỗ.">
                                Đóng gỗ
                            </label>
                            <label for="bao-hiem">
                                <input id="bao-hiem" style="margin-right: 5px" type="checkbox" name="box[]" value="Bảo hiểm.">
                                Bảo hiểm
                            </label>
                            <label for="kiem-dem">
                                <input id="kiem-dem" style="margin-right: 5px" type="checkbox" name="box[]" value="Kiểm đếm.">
                                Kiểm đếm
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tạo đơn hàng</button>
            </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('public/templates/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/templates/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('public/frontend/templates/libs/select2/select2.full.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Ảnh đơn hàng',
                'replace': 'Kéo và thả hoặc nhấp để thay thế',
                'remove':  'Xóa bỏ',
                'error':   'Rất tiếc, đã xảy ra lỗi.'
            }
        });
        $('#js-select2-location').select2();
    </script>
    <script>
        function incrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                    document.getElementById('number').value = value;
            }
        }
        function decrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                    document.getElementById('number').value = value;
            }

        }
        </script>
@endsection
