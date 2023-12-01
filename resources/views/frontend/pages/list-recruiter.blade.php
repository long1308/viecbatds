@extends('frontend.master')
@section('title', $header['seo-home']->name ??'')
@section('keywords', $header['seo-home']->link ??'')
@section('description', $header['seo-home']->description ??'')
@section('image', asset($header['seo-home']->avatar_path) ??'')
@section('content')
<main>
    @include('frontend.partials.slide')

    <!-- //employer -->
    <div class="clear__fix">
        <div class="ctnr">
            <div class="row">
                <div class="clm" style="--w-lg:12; --w-md:12; --w-sm:12; --w-xs:12">
                    <ul class="directional d-flex ai-center">
                        <li class="directional__item ">
                            <a href="{{ route('home') }}" class="d-flex ai-center p-relative">
                                Trang chủ
                            </a>
                        </li>
                        <li class="directional__item ">
                            <a href="" class="d-flex ai-center p-relative">
                                Nhà tuyển dụng
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="form__in">
        <div class="ctnr">
            <div class="box__bg__form">
                <div class="search_company">
                    <div class="box_search_company">
                        <span>Tìm kiếm công ty</span>
                        <form name="nhatuyendung" action=""
                            method="post" autocomplete="off">
                            <input type="hidden" name="search" value="1">

                            <span class="from_search">
                                <input class="form-control" type="text" name="name_company"
                                    placeholder="Tên Công ty..." value="" autocomplete="off" fdprocessedid="egjw1d">
                                <button class="form-control timkiem" type="button" onclick="filterCompany()"
                                    fdprocessedid="9ngkkd"><svg viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                            stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                                                stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg> Tìm
                                    kiếm</button>
                            </span>
                        </form>

                        <form name="nhatuyendung" action=""
                            method="post" autocomplete="off">
                            <input type="hidden" name="search" value="1">
                            <input class="form-control" type="hidden" name="name_company">
                            <button class="form-control lammoi" type="button" name="search" fdprocessedid="lx2hx" onclick="window.location.href= '{{ route('listRecruiter') }}'">
                                Làm
                                mới</button>
                        </form>

                    </div>
                    
                    @if (isset($danh_sach))
                    <div class="list_company result_search">
                        @foreach($danh_sach as $item)
                        <div class="item">
                            <div class="box_company">
                                <div class="image">
                                    @if(empty($item->avatar_path))
                                    <a href="{{ route('detailRecruiter', ['username' => $item->username]) }}"
                                        title="{{$item->name}}"> <img
                                            src="https://akm-img-a-in.tosshub.com/businesstoday/resource/market/company-logo/default-company-logo.png?size=40:40"
                                            alt="{{$item->name}}"></a>
                                            @else
                                            <a href="{{ route('detailRecruiter', ['username' => $item->username]) }}"
                                                title="{{$item->name}}"> <img
                                                    src="{{$item->avatar_path}}"
                                                    alt="{{$item->name}}"></a>
                                            @endif
                                </div>
                                <div class="box_info_company">
                                    <div class="cty"><a
                                            href="{{ route('detailRecruiter', ['username' => $item->username]) }}"
                                            title="{{$item->name}}">{{$item->name}}</a></div>
                                    <div class="desc">
                                        <div><strong>Địa chỉ:</strong> {{$item->address}}</div>
                                        <div><strong>Email:</strong> {{$item->email}}</div>
                                        <div><strong>Giới thiệu:</strong> {{$item->description}} </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                    </div>
                    <div class="pagination">
                        <a>Trang:</a> <a href="" class=" page active">1</a>
                        <a href="#" class="page">2</a> 
                        <a href="#"class="page">3</a>
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    var urlParams = new URLSearchParams(window.location.search);

    function filterCompany() {
        urlParams.delete('name_company');
        if ($('input[name="name_company"]').val() != '') {
            urlParams.set('name_company', $('input[name="name_company"]').val());
        }
        var newURL = '{{ route('listRecruiter') }}' + '?' + urlParams.toString();

        window.location.href = newURL;
    }
</script>
@endsection