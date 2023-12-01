@extends('frontend.master')
@section('title', $thong_tin->name ?? '')
@section('keywords', $thong_tin->name ?? '')
@section('description', $thong_tin->description ?? '')
@section('image', asset($thong_tin->avatar_path) ?? '')
@section('schema', $thong_tin->schema_code ?? '')

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
                            <a class="d-flex ai-center p-relative">
                                {{$thong_tin->name}}
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
                                <button class="form-control timkiem" type="button" onclick="filterCompany()" name="search"
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

                        <form name="nhatuyendung" action="https://noibo.viecbatdongsan.com.vn/nha-tuyen-dung.html"
                            method="post" autocomplete="off">
                            <input type="hidden" name="search" value="1">
                            <input class="form-control" type="hidden" name="name_company">
                        </form>

                    </div>
                    <div class="list_company result_search">
                        <div class="item">
                            <div class="box_company">
                                <div class="image">
                                    <a 
                                        title="{{$thong_tin->name}}"> <img
                                            src="{{$thong_tin->avatar_path}}"
                                            alt="{{$thong_tin->name}}"></a>
                                </div>
                                <div class="box_info_company">
                                    <div class="cty"><a title="{{$thong_tin->name}}">{{$thong_tin->name}}</a></div>
                                    <div class="desc">
                                        <div><strong>Địa chỉ:</strong> {{$thong_tin->address}}</div>
                                        <div><strong>Email:</strong> {{$thong_tin->email}}</div>
                                        @if($thong_tin->website)
                                        <div><strong>Website:</strong> <a onclick="redirectCompanyWeb()" style="cursor: pointer; color: #194983; font-weight: bold;">{{$thong_tin->website}}</a></div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="company_details">
                        <div class="company_detail_left">
                            <div class="title_button">Thông tin nhà tuyển dụng</div>
                            <div class="about_company_detail">
                                <div class="title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Giới thiệu
                                    ngắn</div>
                                <div class="description">
                                    {{$thong_tin->description}}
                                </div>
                            </div>

                            {{-- <div class="product_company_detail">
                                <div class="title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Thông tin
                                    sản phẩm</div>

                                <div class="list_product_in">


                                </div>
                            </div>

                            <div class="list_news_company">
                                <div class="title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Tin tức và
                                    sự kiện</div>

                                <div class="list_news_rows2">

                                </div>
                            </div> --}}

                        </div>
                        
                        <div class="company_detail_right">
                            <div class="title_button">Danh sách tin tuyển dụng</div>
                            <div class="list_of_job">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 38px;">STT</th>
                                            <th>Tin tuyển dụng</th>
                                            <th style="width: 77px;">Số lượng tuyển</th>
                                            <th>
                                                <div class="titlehanhoso">Hạn nộp hồ sơ</div>
                                            </th>
                                            <th style="width: 104px;">Trạng thái</th>
                                        </tr>
                                    </thead>
                                   @php
                                       $i = 0;
                                   @endphp
                                   
                                   @foreach ($thong_tin->postRecruitments()->where('active', 1)->get() as $key => $item)
                                   <tbody>
                                        @if (!App\Helper\Common::checkOutdate($item->expiry_date))
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td><a href="{{ route('postRecruitmentDetail', ['slug' => $item->slug]) }}">{{$item->name}}</a></td>
                                            <td>{{$item->number_people}}</td>
                                            <td>{{ Carbon\Carbon::parse($item->expiry_date)->format('d-m-Y') }}</td>
                                            @if ($item->active == 1)
                                                <td>Đang tuyển</td>
                                            @elseif($item->active == 0)
                                                <td>Hết hạn</td>
                                            @endif
                                            
                                        </tr>
                                        @endif                      
                                    </tbody>
                                   @endforeach   
                                </table>
                            </div>
                        </div>
                    </div>
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

    function redirectCompanyWeb() {
        if (!'{{$thong_tin->website}}'.includes('https://')) {
            window.open('https://' + '{{$thong_tin->website}}', '_blank');
        } else {
            window.open('{{$thong_tin->website}}', '_blank');
        }
    }
</script>

@endsection