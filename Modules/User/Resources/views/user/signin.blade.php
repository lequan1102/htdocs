@extends('customer.layouts')

@section('title')
Đăng nhập thành viên
@endsection

@section('layout')
<!-- Form đăng nhập -->
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{ asset('/public/templates/libs/authenlicate/images/signin-image.jpg') }}" alt="sing up image"></figure>
                <a href="{{ route('login.signup') }}" class="signup-image-link">Tạo một tài khoản</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Đăng nhập</h2>
                @if (session()->has('error'))
                    {!! session()->get('error') !!}
                @endif
                <form method="POST" action="{{ route('login.submit') }}" class="register-form" id="login-form">
                    @csrf
                    <div class="form-group">
                        <div class="fiedset">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="your_name" placeholder="Địa chỉ email">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="fiedset">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Mật khẩu">
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_token" id="remember-me" class="agree-term" >
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Nhớ tôi</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" id="signin" class="form-submit" value="Đăng nhập">
                    </div>
                </form>
                {{-- <div class="social-login">
                    <span class="social-label">Hoặc đăng nhập với</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection
