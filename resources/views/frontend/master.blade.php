<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta name="abstract" content="@yield('keywords')" />
    <meta name="ROBOTS" content="Metaflow" />
    <meta name="ROBOTS" content="noindex, nofollow, all" />
    <meta name="AUTHOR" content="@yield('title') " />
    <meta name="revisit-after" content="1 days" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:image:alt" content="@yield('image')" />

    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="article">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <link rel="canonical" href="{{ url()->full() }}" />
    @if (isset($header['icon-website']))
    <link rel="shortcut icon" href="{{ asset($header['icon-website']) }}">
    @endif

    <meta name="copyright" content="Copyright (c) by {{ url()->full() }}" />
    <meta name="author" content="@yield('title') " />
    <meta http-equiv="audience" content="General" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="revisit-after" content="1 days" />
    <meta name="GENERATOR" content="{{ url()->full() }}" />
    <meta name="application-name" content="@yield('title')" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" content="#fff" />
    <link rel="alternate" href="{{ url()->full() }}" hreflang="vi-vn" />
    <link rel="canonical" href="{{ url()->full() }}" />
    <!-- facebook -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:site_name" content="@yield('title')" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="@yield('title')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:image:width" content="900" />
    <meta property="og:image:height" content="420" />

    <link rel="stylesheet" href="{{ asset('frontend/css/utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css"
        integrity="sha512-W/zrbCncQnky/EzL+/AYwTtosvrM+YG/V6piQLSe2HuKS6cmbw89kjYkp3tWFn1dkWV7L1ruvJyKbLz73Vlgfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/joblist.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/employer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/employDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/recruitmentDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/recruiter.css') }}">


    <!-- select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"
        integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">

    <!-- select2-bootstrap4-theme -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    @yield('schema_code')
    {!! $home['code']['header']->description !!}
</head>

<body>
    {!! $home['code']['body']->description !!}
    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')

    <!-- library -->
    <script>
    new WOW().init();
    </script>
    <script src="{{ asset('frontend/js/index.js') }}"></script>

    <!-- endlibrary -->
    {!! $home['code']['footer']->description !!}
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"
        integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>
    <script>
    $(function() {
        $('select').each(function() {
            $(this).select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                    'w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
        });
    });
    </script>
</body>

</html>