<link rel="stylesheet" href="{{ asset('frontend/css/recruitment.css') }}">@extends('frontend.master')
@section('title', '')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
<section>
    <div class="ctnr">
        <div class="list-candidate">
            <div class="row">
                <div class="candidate-box clm" style="--w-md:9;--w-xs:12">
                    <div class="candidate-left ">
                        <div class="candidate-top">
                            <div class="row ai-center">
                                <div style="--w-md:5; --w-xs:12" class="clm search__content d-flex ai-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z">
                                        </path>
                                    </svg>
                                    <b> Tìm thấy 850 việc làm</b>
                                </div>
                                <div style="--w-md:7; --w-xs:12" class="clm d-flex js-right search-tap ai-center">
                                    <span>Sắp xếp:</span>
                                    <div class="tab-toggle d-flex">
                                        <a class="candidate__tablink active">Mới nhất</a>
                                        <a class="candidate__tablink">HOT nhất</a>
                                        <a class="candidate__tablink">Phù hợp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-filter d-flex ai-center cs-pointer p-relative" onclick="toggleDropdown(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="6" viewBox="0 0 192 512">

                                <path
                                    d="M176 432c0 44.1-35.9 80-80 80s-80-35.9-80-80 35.9-80 80-80 80 35.9 80 80zM25.3 25.2l13.6 272C39.5 310 50 320 62.8 320h66.3c12.8 0 23.3-10 24-22.8l13.6-272C167.4 11.5 156.5 0 142.8 0H49.2C35.5 0 24.6 11.5 25.3 25.2z" />
                            </svg>
                            <span>Tin mới cập nhật</span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512">

                                <path
                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z" />
                            </svg>
                            <div class="dropdown-content d-none p-absolute">
                                <div class="arrow-up p-absolute"></div>
                                <span class="d-block">Dropdown Item 1</span>
                                <span class="d-block">Dropdown Item 2</span>
                                <span class="d-block">Dropdown Item 3</span>
                            </div>
                        </div>
                        <div class="wrapper_tabcontent">
                            <div class="candidate-tabcontent">
                                <div class="list-jobs">
                                    <div class="job-item">
                                        <div class="row">
                                            <div style="--w-md:2" class="clm">
                                                <div class="job__image">
                                                    <a href="">
                                                        <img src="https://vieclamdanang.edu.vn/public/upload/nhatuyendung/showroom-honda-oto-da-nang-cam-le8071642499440.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="--w-md:10" class="clm d-flex fd-column js-center">
                                                <div class="job-content d-flex fd-column">
                                                    <a class="job__name fw-700">Nhân viên hành chính dịch vụ.</a>
                                                    <a class="job__address tt-up d-flex fw-400 " href="">Công ty TNHH
                                                        Ôtô
                                                        Tiến Thu Đà Nẵng
                                                        <svg style="margin-left: auto;"
                                                            xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                                        </svg>
                                                    </a>
                                                    <div class="job-desc d-flex js-between ai-center">
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                                width="9" viewBox="0 0 288 512">

                                                                <path
                                                                    d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7 .5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z" />
                                                            </svg>
                                                            Thỏa thuận
                                                        </div>
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                viewBox="0 0 384 512">
                                                                <path
                                                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z">
                                                                </path>
                                                            </svg>
                                                            Đà Nẵng
                                                        </div>
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                viewBox="0 0 512 512">
                                                                <path
                                                                    d="M142.9 142.9c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5c0 0 0 0 0 0H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5c7.7-21.8 20.2-42.3 37.8-59.8zM16 312v7.6 .7V440c0 9.7 5.8 18.5 14.8 22.2s19.3 1.7 26.2-5.2l41.6-41.6c87.6 86.5 228.7 86.2 315.8-1c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.2 62.2-162.7 62.5-225.3 1L185 329c6.9-6.9 8.9-17.2 5.2-26.2s-12.5-14.8-22.2-14.8H48.4h-.7H40c-13.3 0-24 10.7-24 24z">
                                                                </path>
                                                            </svg>
                                                            5 ngày trước
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-item">
                                        <div class="row">
                                            <div style="--w-md:2" class="clm">
                                                <div class="job__image">
                                                    <a href="">
                                                        <img src="https://vieclamdanang.edu.vn/public/upload/nhatuyendung/showroom-honda-oto-da-nang-cam-le8071642499440.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="--w-md:10" class="clm  d-flex fd-column js-center">
                                                <div class="job-content d-flex fd-column">
                                                    <a class="job__name fw-700">Nhân viên hành chính dịch vụ.</a>
                                                    <a class="job__address tt-up d-flex fw-400 " href="">Công ty TNHH
                                                        Ôtô
                                                        Tiến Thu Đà Nẵng
                                                        <svg style="margin-left: auto;"
                                                            xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                                        </svg>
                                                    </a>
                                                    <div class="job-desc d-flex js-between ai-center">
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                                width="9" viewBox="0 0 288 512">

                                                                <path
                                                                    d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7 .5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z" />
                                                            </svg>
                                                            Thỏa thuận
                                                        </div>
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                viewBox="0 0 384 512">
                                                                <path
                                                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z">
                                                                </path>
                                                            </svg>
                                                            Đà Nẵng
                                                        </div>
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                viewBox="0 0 512 512">
                                                                <path
                                                                    d="M142.9 142.9c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5c0 0 0 0 0 0H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5c7.7-21.8 20.2-42.3 37.8-59.8zM16 312v7.6 .7V440c0 9.7 5.8 18.5 14.8 22.2s19.3 1.7 26.2-5.2l41.6-41.6c87.6 86.5 228.7 86.2 315.8-1c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.2 62.2-162.7 62.5-225.3 1L185 329c6.9-6.9 8.9-17.2 5.2-26.2s-12.5-14.8-22.2-14.8H48.4h-.7H40c-13.3 0-24 10.7-24 24z">
                                                                </path>
                                                            </svg>
                                                            5 ngày trước
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-item">
                                        <div class="row">
                                            <div style="--w-md:2" class="clm">
                                                <div class="job__image">
                                                    <a href="">
                                                        <img src="https://vieclamdanang.edu.vn/public/upload/nhatuyendung/showroom-honda-oto-da-nang-cam-le8071642499440.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="--w-md:10" class="clm  d-flex fd-column js-center">
                                                <div class="job-content d-flex fd-column">
                                                    <a class="job__name fw-700">Nhân viên hành chính dịch vụ.</a>
                                                    <a class="job__address tt-up d-flex fw-400 " href="">Công ty TNHH
                                                        Ôtô
                                                        Tiến Thu Đà Nẵng
                                                        <svg style="margin-left: auto;"
                                                            xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                                        </svg>
                                                    </a>
                                                    <div class="job-desc d-flex js-between ai-center">
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                                width="9" viewBox="0 0 288 512">

                                                                <path
                                                                    d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7 .5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z" />
                                                            </svg>
                                                            Thỏa thuận
                                                        </div>
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                viewBox="0 0 384 512">
                                                                <path
                                                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z">
                                                                </path>
                                                            </svg>
                                                            Đà Nẵng
                                                        </div>
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                viewBox="0 0 512 512">
                                                                <path
                                                                    d="M142.9 142.9c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5c0 0 0 0 0 0H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5c7.7-21.8 20.2-42.3 37.8-59.8zM16 312v7.6 .7V440c0 9.7 5.8 18.5 14.8 22.2s19.3 1.7 26.2-5.2l41.6-41.6c87.6 86.5 228.7 86.2 315.8-1c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.2 62.2-162.7 62.5-225.3 1L185 329c6.9-6.9 8.9-17.2 5.2-26.2s-12.5-14.8-22.2-14.8H48.4h-.7H40c-13.3 0-24 10.7-24 24z">
                                                                </path>
                                                            </svg>
                                                            5 ngày trước
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-item">
                                        <div class="row">
                                            <div style="--w-md:2" class="clm">
                                                <div class="job__image">
                                                    <a href="">
                                                        <img src="https://vieclamdanang.edu.vn/public/upload/nhatuyendung/showroom-honda-oto-da-nang-cam-le8071642499440.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="--w-md:10" class="clm  d-flex fd-column js-center">
                                                <div class="job-content d-flex fd-column">
                                                    <a class="job__name fw-700">Nhân viên hành chính dịch vụ.</a>
                                                    <a class="job__address tt-up d-flex fw-400 " href="">Công ty TNHH
                                                        Ôtô
                                                        Tiến Thu Đà Nẵng
                                                        <svg style="margin-left: auto;"
                                                            xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                                        </svg>
                                                    </a>
                                                    <div class="job-desc d-flex js-between ai-center">
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                                width="9" viewBox="0 0 288 512">

                                                                <path
                                                                    d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7 .5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z" />
                                                            </svg>
                                                            Thỏa thuận
                                                        </div>
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                viewBox="0 0 384 512">
                                                                <path
                                                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z">
                                                                </path>
                                                            </svg>
                                                            Đà Nẵng
                                                        </div>
                                                        <div class="job-desc__item d-flex ai-center fw-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                                viewBox="0 0 512 512">
                                                                <path
                                                                    d="M142.9 142.9c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5c0 0 0 0 0 0H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5c7.7-21.8 20.2-42.3 37.8-59.8zM16 312v7.6 .7V440c0 9.7 5.8 18.5 14.8 22.2s19.3 1.7 26.2-5.2l41.6-41.6c87.6 86.5 228.7 86.2 315.8-1c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.2 62.2-162.7 62.5-225.3 1L185 329c6.9-6.9 8.9-17.2 5.2-26.2s-12.5-14.8-22.2-14.8H48.4h-.7H40c-13.3 0-24 10.7-24 24z">
                                                                </path>
                                                            </svg>
                                                            5 ngày trước
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-wrap d-flex js-center ai-center">
                            <ul class="pagination-nav d-flex ai-center js-center">
                                <li>
                                    <a class="d-flex ai-center js-center" href="">1</a>
                                </li>
                                <li>
                                    <a class="d-flex ai-center js-center" href="">2</a>
                                </li>
                                <li>
                                    <a class="d-flex ai-center js-center" href="">3</a>
                                </li>
                                <li>
                                    <a class="d-flex ai-center js-center" href="">...</a>
                                </li>
                                <li>
                                    <a class="d-flex ai-center js-center" href="">234</a>
                                </li>
                                <li>
                                    <a class="d-flex ai-center js-center" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                            <path
                                                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="candidate-box clm" style="--w-md:3 ;--w-xs:12">
                    <div class="candidate-right">
                        <form class="filter-form" action="">
                            <div class="filter-title fw-400 ">
                                <p class="d-flex ai-center toggleSelect">LỌC THEO MỨC LƯƠNG
                                    <svg style="margin-left: auto;" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" />
                                    </svg>
                                </p>
                                <ul class="checkbox-list ">
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Thỏa thuận</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Dưới 3 triệu</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>3 - 5 triệu</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-title fw-400 ">
                                <p class="d-flex ai-center toggleSelect">LỌC THEO CẤP BẬC
                                    <svg style="margin-left: auto;" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" />
                                    </svg>
                                </p>
                                <ul class="checkbox-list ">
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Chưa có kinh nghiệm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Dưới 1 năm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>1 năm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>2 năm</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-title fw-400 ">
                                <p class="d-flex ai-center toggleSelect">LỌC THEO LOẠI HÌNH
                                    <svg style="margin-left: auto;" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" />
                                    </svg>
                                </p>
                                <ul class="checkbox-list ">
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Chưa có kinh nghiệm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Dưới 1 năm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>1 năm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>2 năm</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-title fw-400 ">
                                <p class="d-flex ai-center toggleSelect">LỌC THEO KINH NGHIỆM
                                    <svg style="margin-left: auto;" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" />
                                    </svg>
                                </p>
                                <ul class="checkbox-list ">
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Chưa có kinh nghiệm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Dưới 1 năm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>1 năm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>2 năm</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-title fw-400 ">
                                <p class="d-flex ai-center toggleSelect">LỌC THEO THỜI GIAN
                                    <svg style="margin-left: auto;" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" />
                                    </svg>
                                </p>
                                <ul class="checkbox-list ">
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Chưa có kinh nghiệm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>Dưới 1 năm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>1 năm</span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="1" id="1">
                                        <span>2 năm</span>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
const listItems = document.querySelectorAll('.candidate__tablink');
listItems.forEach((item, index) => {
    item.addEventListener('click', () => {
        listItems.forEach(li => li.classList.remove('active'));
        item.classList.add('active');
    });
});
</script>
<script>
const linkprojects = document.querySelectorAll(".toggleSelect");
linkprojects.forEach(function(linkproject) {

    linkproject.addEventListener("click", function() {
        const iconSvg = this.querySelector("svg");
        console.log(iconSvg);
        iconSvg.classList.toggle("active");
        const menuDrop = this.nextElementSibling;
        console.log(menuDrop);
        menuDrop.classList.toggle("active");
    })
})
</script>
<script>
function toggleDropdown(element) {
    element.classList.toggle("active");
}
</script>
@endsection