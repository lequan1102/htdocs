@extends('layouts.master')
@section('layout')
  <!--OWL News-->
  <section class="container news  detail">
    <div class="row">
      @if (isset($cate))
        @foreach ($cate as $item)
          <div class="col col-md-4 col-6">
            <a href="{{ route('article.news',['slug' => $item->slug]) }}" class="item">
              <div class="box-thumbnail">
                <div class="thumbnail-lazy loaded"><img src="{{ Voyager::image($item->image) }}"></div>
              </div>
              <div class="des">
                  <span>{{ $item->title }}</span>
                  <p>{!! $item->excerpt !!}</p>
                  <b>Xem thêm<svg viewBox="0 0 448 512"><path fill="currentColor" d="M340.485 366l99.03-99.029c4.686-4.686 4.686-12.284 0-16.971l-99.03-99.029c-7.56-7.56-20.485-2.206-20.485 8.485v71.03H12c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h308v71.03c0 10.689 12.926 16.043 20.485 8.484z"></path></svg></b>
              </div>
            </a>
          </div>
        @endforeach
      @endif
    </div>
  </section>
  {{ $cate->links('vendor.pagination.default') }}
@endsection
