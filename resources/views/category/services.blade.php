@extends('layouts.master')
@section('layout')
    <!--Breacurmb-->
    <div class="container-fluid breadcrumb_wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item" aria-current="page">Dịch vụ</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--OWL News-->
    <section class="container news detail">
        <div class="row">
            @if ($categories)
                @foreach ($categories as $item)
                    <div class="col col-md-4 col-6">
                        <a href="{{ route('article.services',['slug' => $item->slug]) }}" class="item">
                            <div class="box-thumbnail">
                                <div class="thumbnail-lazy loaded"><img src="{{ Voyager::image($item->image) }}"></div>
                            </div>
                            <div class="des">
                                <span>{{ $item->name }}</span>
                                <p>{!! $item->excerpt !!}</p>
                                <b>Xem thêm<svg viewBox="0 0 448 512"><path fill="currentColor" d="M340.485 366l99.03-99.029c4.686-4.686 4.686-12.284 0-16.971l-99.03-99.029c-7.56-7.56-20.485-2.206-20.485 8.485v71.03H12c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h308v71.03c0 10.689 12.926 16.043 20.485 8.484z"></path></svg></b>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    {{ $categories->links('vendor.pagination.default') }}
@endsection
