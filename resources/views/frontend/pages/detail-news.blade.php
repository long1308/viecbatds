@extends('frontend.master')
@section('title', $post->title_seo ?? '')
@section('keywords', $post->keyword_seo ?? '')
@section('description', $post->description_seo ?? '')
@section('image', asset($post->avatar_path) ?? '')
@section('schema', $post->schema_code ?? '')
@section('content')

@include('frontend.partials.slide')

@if(isset($post))
<div class="box__detailnew">
    <div class="ctnr">
        <div class="inner__detailnew">
            <div class="title_heading">
                <h2><strong>{{$post->name}}</strong></h2>
            </div>

            <div class="row">
                <div class="clm" style="--w-lg:12; --w-md:12; --w-sm:12; --w-xs:12">
                    <div class="row main_news_details">
                        <div class="clm" style="--w-lg:8; --w-md:12; --w-sm:12; --w-xs:12">
                            <div class="news_details">
                                {!!$post->content!!}
                            </div>

                        </div>
                        @if(isset($post_lq))
                        <div class="clm" style="--w-lg:4; --w-md:12; --w-sm:12; --w-xs:12">
                            <div class="news_related">
                                <div class="title">
                                    Bài viết liên quan
                                </div>
                                <div class="box_news_related">
                                    @foreach($post_lq as $item)
                                    <div class="item">
                                        <div class="image">
                                            <a href="">
                                                <img src="{{$item->avatar_path}}" alt="{{$item->name}}">
                                            </a>
                                        </div>
                                        <div class="info_news_related_item">
                                            <h3>
                                                <a href="{{$item->key->slug}}">{{$item->name}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection