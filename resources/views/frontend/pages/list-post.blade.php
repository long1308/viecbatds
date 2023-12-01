@extends('frontend.master')
@section('title', 'Danh sách '.strtolower(App\Models\Category::where('id', $categoryId)->first()->name))
@section('content')
<style>
  .title-section {
    font-size: 24px;
    color: #254083;
    margin-bottom: 30px;
  }

  .s-listblog__content a {
    font-size: 18px;
    text-align: left;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    overflow: hidden;
    -webkit-box-orient: vertical;
    min-height: 50px;
    padding: 0 15px;
    color: #333;
    margin-top: 5px;
  }

  .s-listblog__img img {
    max-height: 230px;
    width: 100%;
  }

  .s-listblog__box {
    margin-bottom: 30px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    padding-bottom: 20px;
  }

  .s-listblog__content span {
    margin-top: 10px;
  }

  .s-listblog__content a:hover {
    color: #cc0001;
  }

  .section-temp-post {
    margin: 30px 0px;
  }
</style>
<main class="template-post">
  <section class="section-temp-post pd-section">
    <div class="ctnr">
      @if (isset($categoryId))
      <div style="margin-top: 20px; margin-bottom: 20px;">
        {!! App\Models\Category::where('id', $categoryId)->first()->description !!}
      </div>
      @endif

      @if (isset($categoryId))
      <h2 class="title-section ta-center">Danh sách {{ strtolower(App\Models\Category::where('id', $categoryId)->first()->name) }}</h2>
      @endif
      <div class="row">
        @if (count($listPost) == 0)
        <p style="margin: 0 auto;">Không có kết quả</p>
        @endif
        @if (count($listPost) > 0)
        @foreach ($listPost as $item)
        <div class="clm" style="--w-xl:4; --w-lg:4; --w-sm:6; --w-xs:12;">
          <div class="s-listblog__box">
            <div class="s-listblog__img">
              <a href="{{ route('post.checkDetailOrCategory', ['slug' => $item->key->slug]) }}">
                <img src="{{ asset($item->avatar_path) }}" alt="{{ $item->name }}" />
              </a>
            </div>
            <div class="s-listblog__content">
              <h3 class="h5 ta-center">
                <a href="{{ route('post.checkDetailOrCategory', ['slug' => $item->key->slug]) }}">{{ $item->name }}</a>
              </h3>
              <p>{{ $item->description }}</p>
              <span class="time-up ta-center d-block h6">
                Đăng vào {{ $item->created_at->format('H:i d-m-Y') }}
              </span>
            </div>
            </a>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </section>
</main>
@endsection