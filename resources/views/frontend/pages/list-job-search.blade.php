@extends('frontend.master')
@section('title', '')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')

@include('frontend.partials.slide')


<div class="jobs__list">
    <div class="ctnr">
        <div class="row">
            <div class="clm" style="--w-lg:12; --w-md:12; --w-xs:12">
                <div class="title_heading">
                    <h2>Kết quả lọc</h2>
                </div>
            </div>
            @if(isset($listJob))
            @if(count($listJob) == 0)
                <p>Không có kết quả nào!</p>
            @else
                <div class="clm" style="--w-lg:12; --w-md:12; --w-xs:12">
                    <div class="row">
                        <div class="list_jobs">
                            @foreach ($listJob as $item)
                            <div class="item">
                                <div class="box_job">
                                    <div class="name_company"><a
                                            href="{{ route('postRecruitmentDetail', ['slug' => $item->slug]) }}"
                                            title="{{$item->name}}">{{$item->name}}</a></div>
                                    <div class="desc">
                                        {{$item->company->name}}
                                    </div>
                                    <div class="adress_company">
                                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 384 512">
                                                <path
                                                    d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z" />
                                            </svg></div>
                                        <div class="value">{{$item->address_detail}},
                                            {{$item->address->name}}, Việt Nam.</div>
                                    </div>
                                    <div class="salary_company">
                                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                viewBox="0 0 288 512">
                                                <path
                                                    d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z" />
                                            </svg></div>
                                        <div class="value"><span style="color: #333;">Mức lương:</span> {{$item->min_salary}}-{{$item->max_salary}}  triệu</div>
                                    </div>
                                    <div class="group_logo_company">
                                        <div class="logo_company">
                                            <a href="{{ route('postRecruitmentDetail', ['slug' => $item->slug]) }}"
                                                title="{{$item->name}}">
                                                <img src="{{$item->company->avatar_path}}"
                                                    alt="{{$item->company->name}}">
                                            </a>
                                        </div>
                                        <a href="{{ route('postRecruitmentDetail', ['slug' => $item->slug]) }}"
                                            title="{{$item->name}}"> <button fdprocessedid="d862uf">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z" />
                                                </svg>Xem thêm
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        

                        </div>
                        <div class="clm" style="--w-lg:12; --w-md:12; --w-xs:12">
                            <div class="pagination" style="justify-content: center;">


                            </div>
                        </div>


                    </div>
                </div>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection