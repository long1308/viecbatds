@extends('frontend.master')
@section('title', $post->name)
@section('keywords', $post->keyword_seo ??'')
@section('description', $post->description_seo ??'')
@section('image', asset($post->avatar_path) ??'')
@section('schema', $post->schema_code ?? '')
@section('content')
<style>
  .item-tr {
    display: flex;
    padding: 5px 0;
    width: 100%;
    gap: 10px;
  }

  .item-tr label {
    margin-bottom: 0;
    width: 20%;
    text-align: center
  }

  .vote.hovervote {
    width: 80%;
    display: flex;
  }

  .item-tr label svg {
    font-size: 20px;
  }

  .vote svg {
    cursor: pointer;
  }

  i.fa-star {
    color: #999;
  }

  .checked {
    fill: #ffa53f;
  }

  .box__star__feedback .vote input {
    display: none;
  }

  .star__end__feedback {
    margin-bottom: 20px;
  }

  .box__star__feedback {
    margin-bottom: 20px;
  }
</style>
@if (isset($post))
<main class="articles1 ctnr">
    <section class="articles1-main">
      <article class="ar1__post">
        <div class="ar1-post__inside">
          <h1>
            {{ $post->name }}
          </h1>
          <div class="star__end__feedback" style="margin-top: 10px;">
            @php
                $countStar = App\Models\Comment::where('post_id', $post->id)->where('active', 1)->count();
                $totalStar = App\Models\Comment::where('post_id', $post->id)->where('active', 1)->sum('star');

                if ($countStar == 0) {
                  $averageStar = 0;
                } else {
                  $averageStar = round($totalStar/$countStar);
                }
            @endphp
            <div class="vote">
              @for ($i = 0; $i < $averageStar; $i++)
              <svg class="checked" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                <path
                  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
              </svg>
              @endfor
              @for ($i = 0; $i < 5 - $averageStar; $i++)
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                <path
                  d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
              </svg>
              @endfor 
            </div>
            @if ($averageStar == 0)
                (Chưa có đánh giá)
            @endif
          </div>
          <div class="ar1-inside__citation">
            <span>
              Viết bởi
              <a href="">{{ $post->admin->name }}</a>
            </span>
            <span>|</span>
            <span>
              <time
                >Đăng vào 
                <span>{{ $post->created_at->format('d-m-Y') }}</span>
              </time>
            </span>
          </div>
          <div class="ar1-inside__content">
            <p class="h5 line">
              {!! $post->content !!}
            </p>
            @php
            function listParagragh($post, $parentId)
            {
              return $post->paragraph->where('parent_id', $parentId)->sortBy('order');
            }
            @endphp
            <div class="ar1-inside__table">
              <p class="h5 line ta-center">Table of Contents</p>
              <ul class="ar1-table__list">
                @foreach (listParagragh($post, 0) as $item)
                <li>
                  <a
                    href=""
                    onclick="scrollToDiv(event, 'paragraph-{{ $item->id }}')"
                    >{{ $item->name }}</a
                  >
                  @if (count(listParagragh($post, $item->id)) > 0)
                    <ul>
                        @foreach (listParagragh($post, $item->id) as $itemChild)
                      <li>
                        <a
                          href=""
                          onclick="scrollToDiv(event, 'paragraph-{{ $itemChild->id }}')"
                          >{{ $itemChild->name }}</a
                        >
                      </li> 
                      @endforeach
                    </ul>
                  @endif
                </li>
                @endforeach
                {{-- <li>
                  <a
                    href=""
                    onclick="scrollToDiv(event, 'how-does-cloud-hosting-work')"
                    >How Does Cloud Hosting Work?</a
                  >
                </li>
                <li>
                  <a
                    href=""
                    onclick="scrollToDiv(event, 'types-of-cloud-hosting')"
                  >
                    Types of Cloud Hosting
                    <ul>
                      <li>
                        <a
                          href=""
                          onclick="scrollToDiv(event, 'cloud-deployment-models')"
                          >Cloud Deployment Models</a
                        >
                      </li>
                      <li>
                        <a
                          href=""
                          onclick="scrollToDiv(event, 'cloud-service-models')"
                          >Cloud Service Models</a
                        >
                      </li>
                    </ul>
                  </a>
                </li>
                <li>
                  <a
                    href=""
                    onclick="scrollToDiv(event, 'benefits-of-cloud-hostingnbsp')"
                    >Benefits of Cloud Hosting</a
                  >
                </li>
                <li>
                  <a
                    href=""
                    onclick="scrollToDiv(event, 'pros-and-cons-of-cloud-hostingnbsp')"
                  >
                    Pros and Cons of Cloud Hosting
                    <ul>
                      <li>
                        <a href="" onclick="scrollToDiv(event, 'props')"
                          >Pros</a
                        >
                      </li>
                      <li>
                        <a href="" onclick="scrollToDiv(event, 'cons')"
                          >Cons</a
                        >
                      </li>
                    </ul>
                  </a>
                </li>
                <li>
                  <a
                    href=""
                    onclick="scrollToDiv(event, 'examples-of-cloud-hosting')"
                    >Examples of Cloud Hosting
                    <ul>
                      <li>
                        <a
                          href=""
                          onclick="scrollToDiv(event, '1-aws-amazon-web-services')"
                          >1. AWS (Amazon Web Services)</a
                        >
                      </li>
                      <li>
                        <a
                          href=""
                          onclick="scrollToDiv(event, '2-google-cloud-platform-gcp')"
                          >2. Google Cloud Platform (GCP)</a
                        >
                      </li>
                    </ul>
                  </a>
                </li>
                <li>
                  <a
                    href=""
                    onclick="scrollToDiv(event, 'who-should-go-for-cloud-hosting')"
                    >Who Should Go for Cloud Hosting?</a
                  >
                </li> --}}
              </ul>
            </div>
            @foreach (listParagragh($post, 0) as $item)
            <hr class="seperate" />
            <h2
              class="ar1-h2__title"
              id="paragraph-{{ $item->id }}"
              data-name="paragraph-{{ $item->id }}"
            >
              {{ $item->name }}
            </h2>
            <p class="h5 line">
              {!! $item->content !!}
            </p>
            @if (count(listParagragh($post, $item->id)) > 0)
                @foreach (listParagragh($post, $item->id) as $itemChild)
                <h3
                  class="h2 ar1-h2__title"
                  id="paragraph-{{ $itemChild->id }}"
                  data-name="paragraph-{{ $itemChild->id }}"
                  style="font-size: 26px;"
                >
                {{ $itemChild->name }}
                </h3>
                <p class="h5 line">
                  {!! $itemChild->content !!}
                </p>
                @endforeach
            @endif
            @endforeach
          </div>
        </div>
      </article>
      {{-- <div class="ar1__share">
        <div class="ar1-share__inside d-inline-flex ai-center w-100">
          <div
            class="ar1-share__count d-inline-flex ta-center ai-center fs-0"
          >
            <span class="ta-center">
              <span class="d-block">0</span>
              <span class="d-block">Shares</span>
            </span>
          </div>
          <ul class="d-flex fd-row fw-wrap js-between flex-1">
            <li class="ar1-share__list p-relative flex-1">
              <a href="">
                <span class="d-inline-flex ai-center fd-row fw-nowrap w-100">
                  <i class="ar1-share__icon d-flex js-center ai-center h-100">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      height="0.875em"
                      viewBox="0 0 512 512"
                    >
                      <path
                        d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
                      />
                    </svg>
                  </i>
                  <span>Facebook</span>
                  <span>0</span>
                </span>
              </a>
            </li>
            <li class="ar1-share__list p-relative flex-1">
              <a href="">
                <span class="d-inline-flex ai-center fd-row fw-nowrap">
                  <i class="ar1-share__icon d-flex js-center ai-center h-100">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      height="0.875em"
                      viewBox="0 0 512 512"
                    >
                      <path
                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                      />
                    </svg>
                  </i>
                  <span>Twitter</span>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div> --}}
      <div class="ar1__authorbox d-flex ai-center fd-column">
        <div class="ar1-authorbox__img">
          <img src="{{ asset($home['about-us']->avatar_path) }}" alt="$home['about-us']->name" />
        </div>
        <div class="ar1-authorbox__intro">
          <p class="h5 line ta-center">Về chúng tôi</p>
          <p class="h5 line">
            {!! $home['about-us']->content !!}
          </p>
          <div class="ar1-authorbox__social d-flex ai-flex-start fw-wrap">
            <p class="h5 line">Kết nối với tôi bằng:</p>
            <ul class="ar1-authorbox-social__list d-flex">
              @foreach ($home['follow-us'] as $item)
              <li>
                <a href="{{ $item->link }}"
                  >{!! $item->description !!}
                </a>
              </li>
              @endforeach
              {{-- <li>
                <a href=""
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="0.875em"
                    viewBox="0 0 512 512"
                  >
                    <path
                      d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                    />
                  </svg>
                </a>
              </li>
              <li>
                <a href=""
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="0.875em"
                    viewBox="0 0 448 512"
                  >
                    <path
                      d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                    />
                  </svg>
                </a>
              </li>
              <li>
                <a href=""
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="0.875em"
                    viewBox="0 0 576 512"
                  >
                    <path
                      d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"
                    />
                  </svg>
                </a>
              </li> --}}
            </ul>
          </div>
        </div>
      </div>
      <div class="ar1__relatedposts ar1-post__inside">
        <h2>Có thể bạn thích</h2>
        <div
          class="ar1-relatedposts_inside d-flex fw-wrap js-between fd-column"
        >
        @foreach (App\Models\Post::orderBy('created_at', 'desc')->take(4)->get() as $item)
        <div class="ar1-relatedposts__post">
          <img src="{{ asset($item->avatar_path) }}" alt="{{ $item->name }}" />
          <a href="{{ route('post.checkDetailOrCategory', ['slug' => $item->key->slug]) }}">
            <h4>
              {{ $item->name }}
            </h4>
          </a>
        </div>
        @endforeach
        </div>
      </div>
      <div class="ar1__comment ar1__feedback">
        <h3 class="h2 ar1-h3__title">Bình luận ({{ App\Models\Comment::where('active', 1)->where('post_id', $post->id)->count() }})</h3>

        @foreach (App\Models\Comment::where('active', 1)->where('post_id', $post->id)->get() as $item)
        <p><strong>{{ $item->name }}</strong></p>
        <p>{{ $item->email }}</p>
        <div class="star__end__feedback">
          <div class="vote">
            @for ($i = 0; $i < $item->star; $i++)
            <svg class="checked" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
              <path
                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
            </svg>
            @endfor
            @for ($i = 0; $i < 5 - $item->star; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
              <path
                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
            </svg>
            @endfor 
          </div>
        </div>
        <div class="ar1-comment__box">
          <p>{{ $item->content }}</p>
        </div>
        <br>
        @endforeach

      </div>
      <div class="ar1__feedback">
        <h3 class="h2 ar1-h3__title">Để lại bình luận</h3>
        <form action="" class="ar1-feedback__form">
          <textarea name="contentComment" id="contentComment" cols="30" rows="10"></textarea>
          <div class="box__star__feedback">
            <div class=" item-tr">
              <label>Bạn cảm thấy bài viết như thế nào?</label>
              <div class="vote hovervote">
                <label for="star1" title="text" id="star1"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                    viewBox="0 0 576 512" onclick="localStorage.setItem('star', 1)">
                    <path
                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                  </svg><br>Rất tệ</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star2" title="text" id="star2"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                    viewBox="0 0 576 512" onclick="localStorage.setItem('star', 2)">
                    <path
                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                  </svg><br>Không tệ</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star3" title="text" id="star3"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                    viewBox="0 0 576 512" onclick="localStorage.setItem('star', 3)">
                    <path
                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                  </svg><br>Trung bình</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star4" title="text" id="star4"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                    viewBox="0 0 576 512" onclick="localStorage.setItem('star', 4)">
                    <path
                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                  </svg><br>Tốt</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star5" title="text" id="star5"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                    viewBox="0 0 576 512" onclick="localStorage.setItem('star', 5)">
                    <path
                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                  </svg><br>Tuyệt vời</label>
                <input type="radio" id="star5" name="rating" value="5" checked>
              </div>
            </div>
          </div>
          <input type="text" name="nameComment" id="" placeholder="Tên *" required />
          <input type="text" name="emailComment" id="" placeholder="Email *" required />
          <button type="button" onclick="addComment()">Gửi</button>
        </form>
      </div>
    </section>
    @if (count(listParagragh($post, 0)) > 0)
    <aside class="articles1-sidebar">
      <div class="ar1-sidebar__content">
        <h4>Mục lục</h4>
        <ul class="ar1-sidebar__list">
          @foreach (listParagragh($post, 0) as $item)
          <li>
            <a
              href="#paragraph-{{ $item->id }}"
              onclick="scrollToDiv(event, 'paragraph-{{ $item->id }}')"
              >{{ $item->name }}</a
            >
            @if (count(listParagragh($post, $item->id)) > 0)
            <ul>
              @foreach (listParagragh($post, $item->id) as $itemChild)
              <li>
                <a
                  href="#paragraph-{{ $itemChild->id }}"
                  onclick="scrollToDiv(event, 'paragraph-{{ $itemChild->id }}')"
                  >{{ $itemChild->name }}</a
                >
              </li>
              @endforeach
            </ul>
            @endif
          </li>
          @endforeach
        </ul>
      </div>
    </aside>
    @endif
</main>
@endif
  <script>
  function addComment(){
    let formData = new FormData();
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('postId', {{ $post->id }});
    formData.append('content', $('#contentComment').val());
    formData.append('name', $('input[name="nameComment"]').val());
    formData.append('email', $('input[name="emailComment"]').val());
    formData.append('star', localStorage.getItem('star'));
    formData.append('active', 0);

    jQuery.ajax({
        url: `{{ route('createComment') }}`, 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
          alert('Gửi bình luận thành công!');
            localStorage.removeItem('star');
            window.location.reload();
        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
  }
  </script>
  <script>
    let offset = 82; // Khoảng cách 82px từ trên cùng của màn hình
    let offset2 = 150;
    let links = document.querySelectorAll("a[href^='#']");
    let linkArr = [];
    let activeLink = null;

    document.addEventListener("DOMContentLoaded", function () {});
    function scrollToDiv(event, targetDiv) {
      event.preventDefault();
      let div = document.querySelector('[data-name="' + targetDiv + '"]');
      let topPos = div.getBoundingClientRect().top + window.scrollY - offset;

      window.scrollTo({
        top: topPos,
        behavior: "smooth",
      });
    }

    // Duyệt qua từng phần tử <a> và xử lý
    for (let i = 0; i < links.length; i++) {
      let link = links[i];
      let targetId = link.getAttribute("href").substring(1);
      linkArr.push(targetId);
    }

    linkArr.forEach(function (link, index) {
      let targetDiv = document.querySelector('[data-name="' + link + '"]');
      const topPos =
        targetDiv.getBoundingClientRect().top + window.scrollY - offset2;

      window.addEventListener("scroll", function () {
        let scrollPosition = window.scrollY;
        let linkElement = document.querySelector('a[href="#' + link + '"]');

        if (scrollPosition >= topPos) {
          if (activeLink && activeLink !== linkElement) {
            activeLink.classList.remove("active"); // Xóa lớp "active" của linkElement cũ
          }
          linkElement.classList.add("active");
          activeLink = linkElement;
        } else if (index === 0 && scrollPosition < topPos) {
          // Nếu là phần tử đầu tiên và scroll lên trên topPos
          if (activeLink) {
            activeLink.classList.remove("active");
          }
          activeLink = null;
        }
      });
    });
  </script>
  <script>
    const stars = document.querySelectorAll('label[for^="star"]');

    stars.forEach(star => {
      star.addEventListener('click', () => {
        const selectedStar = parseInt(star.getAttribute('for').replace('star', ''));
        for (let i = 1; i <= 5; i++) {
          const starElement = document.getElementById(`star${i}`);
          if (i <= selectedStar) {
            starElement.querySelector('svg').classList.add('checked');
          } else {
            starElement.querySelector('svg').classList.remove('checked');
          }
        }
      });
    });

  </script>
@endsection