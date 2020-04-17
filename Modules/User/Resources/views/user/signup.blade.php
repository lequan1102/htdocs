@extends('customer.layouts')

@section('title')
Đăng ký thành viên
@endsection

@section('layout')
    <!-- Form đăng ký -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Đăng ký</h2>
                    <form method="POST" action="{{ route('customer.create') }}"  class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <div class="fiedset">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Họ và tên">
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="fiedset">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" value="{{ old('email') }}" name="email" id="email" placeholder="Địa chỉ email của bạn">
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="fiedset">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Số điện thoại của bạn">
                            </div>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="fiedset">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" value="{{ old('password') }}" name="password" id="pass" placeholder="Mật khẩu">
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="fiedset">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" id="re_pass" placeholder="Nhập lại mật khẩu">
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agreeterm" id="agreeterm" class="agreeterm" />
                            <label for="agreeterm" class="label-agree-term">
                                <span><span></span></span>
                                Tôi đồng ý tất cả các tuyên bố trong
                                <a href="#" class="term-service">Điều khoản dịch vụ</a>
                            </label>
                            @error('agreeterm')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" id="signup" class="form-submit" value="Đăng ký">
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{ asset('/public/templates/libs/authenlicate/images/signup-image.jpg') }}" alt="sing up image"></figure>
                    <a href="{{ route('customer.signin') }}" class="signup-image-link">Tôi đã là thành viên</a>
                </div>
            </div>
        </div>
    </section>
@endsection



