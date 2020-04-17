@extends('layouts.app')

@section('content')

    <link href="{{ asset('public/templates/libs/dropify/css/dropify.min.css') }}" rel="stylesheet">
    <div class="col col-md-9 col-12" style="margin-bottom: 30px">
        <div class="card">
            <div class="card-header">
                <svg viewBox="0 0 448 512"><path fill="currentColor" d="M313.6 288c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"></path></svg>
                Chỉnh sửa thông tin cá nhân của bạn</div>
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
                <form action="{{ route('customer.aboutme.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Họ và tên" value="{{ $aboutme->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Địa chỉ email</label>
                        <input type="text" name="email" disabled class="form-control" id="email" value="{{ $aboutme->email }}">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Ảnh đại diện</label>
                        <input type="file" class="dropify" id="avatar" @if ($aboutme->avatar) data-default-file="{{ url('public/uploads/customer/'.$aboutme->avatar) }}" @endif value="{{ $aboutme->avatar }}" name="avatar">
                    </div>
                    
                    <div class="form-row">
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="gender">Giới tính</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="nam" @if ($aboutme->gender == 'nam') selected @endif>Nam</option>
                                    <option value="nữ" @if ($aboutme->gender == 'nữ') selected @endif>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="date">Ngày sinh</label>
                                <input type="date" name="date" class="form-control" id="date" value="{{ $aboutme->date }}" placeholder="Ngày sinh">
                            </div>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="city">Tỉnh/Thành phố</label>
                                <input type="text" name="city" class="form-control" id="city" value="{{ $aboutme->city }}" placeholder="Thành phố">
                            </div>
                        </div>
                        <div class="col col-md-6 col-12">
                            <div class="form-group">
                                <label for="location">Địa chỉ</label>
                                <input type="text" name="location" class="form-control" id="location" value="{{ $aboutme->location }}" placeholder="Địa chỉ cụ thể: tòa nhà, số nhà">
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/templates/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/templates/libs/dropify/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Kéo và thả tệp vào đây hoặc nhấp',
                'replace': 'Kéo và thả hoặc nhấp để thay thế',
                'remove':  'Xóa bỏ',
                'error':   'Rất tiếc, đã xảy ra lỗi.'
            }
        });
    </script>
@endsection