@extends('user::layouts.master')

@section('content')
    <h1>Đã đăng nhập thành công</h1>
    <?php if (Auth::guard('customer')->check()): ?>
      ok
    <?php endif; ?>
    <a class="items" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
