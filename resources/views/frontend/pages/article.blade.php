@extends('frontend.master')
@section('title', $content->title_seo ?? '')
@section('keywords', $content->keyword_seo ?? '')
@section('description', $content->description_seo ?? '')
@section('image', asset($content->avatar_path) ?? '')
@section('schema', $content->schema_code ?? '')
@section('content')

@include('frontend.partials.slide')

@if(isset($content))
<div class="title_heading">
    <div class="ctnr">
        <h2><strong>{{$content->name}}</strong></h2>
    </div>
</div>
<div class="content__article">
    <div class="ctnr">
        <div class="box__content__article">
            {!!$content->content!!}
        </div>
    </div>
</div>
@endif
@endsection