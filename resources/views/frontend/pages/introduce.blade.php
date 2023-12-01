@extends('frontend.master')
@php
    $post = $home['introduce'];
@endphp
@section('title', $post->name)
@section('keywords', $post->keyword_seo ??'')
@section('description', $post->description_seo ??'')
@section('image', asset($post->avatar_path) ??'')
@section('content')
<main class="articles1 ctnr">
    <section class="articles1-main">
      <article class="ar1__post">
        <div class="ar1-post__inside">
          <h1>{{ $post->name }}</h1>
          <div class="ar1-inside__content">
            <p class="h5 line">
              {!! $post->content !!}
            </p>
          </div>
        </div>
      </article>
    </section>
  </main>
@endsection