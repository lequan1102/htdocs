@extends('layouts.app')

@section('content')
    <div class="col col-md-9 col-12" style="margin-bottom: 30px">
        <div class="card">
            <div class="card-header">
                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M329.37 137.37c-12.49 12.5-12.49 32.76 0 45.26 12.5 12.5 32.76 12.5 45.26 0 12.49-12.5 12.49-32.76 0-45.26-12.5-12.49-32.76-12.49-45.26 0zm64-64c-12.49 12.5-12.49 32.76 0 45.26 12.5 12.5 32.76 12.5 45.26 0s12.5-32.76 0-45.26c-12.5-12.49-32.76-12.49-45.26 0zM448 0H320c-35.35 0-64 28.65-64 64v128c0 11.85 3.44 22.8 9.05 32.32L2.34 487.03c-3.12 3.12-3.12 8.19 0 11.31l11.31 11.31c3.12 3.12 8.19 3.12 11.31 0l48.7-48.7 46.4 46.4c6.16 6.16 16.2 6.22 22.43 0l44.86-44.86c6.19-6.19 6.19-16.23 0-22.43l-46.4-46.4 28.71-28.72 46.4 46.4c6.16 6.16 16.2 6.22 22.43 0l44.86-44.86c6.19-6.19 6.19-16.23 0-22.43l-46.4-46.4 50.72-50.72c9.52 5.61 20.47 9.05 32.32 9.05h128c35.35 0 64-28.65 64-64V64C512 28.65 483.35 0 448 0zM153.71 451.28l-22.43 22.43-35.18-35.18 22.43-22.43 35.18 35.18zm96-96l-22.43 22.43-35.19-35.19 22.43-22.43 35.19 35.19zM480 192c0 17.64-14.36 32-32 32H320c-17.64 0-32-14.36-32-32V64c0-17.64 14.36-32 32-32h128c17.64 0 32 14.36 32 32v128z"></path></svg>
                Thay đổi mật khẩu</div>
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
                <form action="{{ route('post.repassword') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current-password">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control @error('current-password') is-invalid @enderror" id="current-password" name="current-password" value="{{ old('current-password') }}" placeholder="Mật khẩu cũ">
                        @error('current-password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu mới</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="Mật khẩu mới">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Nhập lại mật khẩu mới">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
@endsection