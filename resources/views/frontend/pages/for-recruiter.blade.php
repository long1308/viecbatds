<link rel="stylesheet" href="{{ asset('frontend/css/recruiter.css') }}">
@extends('frontend.master')
@section('title', '')
@section('content')
<section>
    <div class="recruiter-banner p-relative">
        <div class="recruiter-banner__slider">
            <div class="banner__image">
                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/banner-2.jpg" alt="">
            </div>
            <div class="banner__image">
                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/banner-2.jpg" alt="">
            </div>
            <div class="banner__image">
                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/banner-2.jpg" alt="">
            </div>
        </div>
        <div class="banner__info p-absolute top-0 ta-center right-0 left-0 bottom-0">
            <h3 class="banner__subtitle fw-600  ta-center">Sàn giao dịch</h3>
            <h2 class="banner__title fw-700 tt-up">Việc làm đà nẵng</h2>
            <div class="banner__desc h6">
                <p>Chào mừng quí doanh nghiệp đến với chuyên trang hỗ trợ nhà tuyển dụng của Sàn Giao Dịch Việc Làm
                    Đà Nẵng.</p>
                <p>Nhân tài là tài sản quan trọng nhất mọi doanh nghiệp, đừng để đối thủ nhanh tay hơn bạn, hãy liên
                    hệ ngay với chúng tôi để có thể tiếp cận với những ứng viên ưu tú nhất.</p>
            </div>
        </div>
    </div>
    <div class="why">
        <div class="ctnr">
            <div class="why__heading ta-center">
                <h2 class="why__title">TẠI SAO CHỌN CHÚNG TÔI</h2>
                <p class="why__desc h6">Với hơn +3000 lượt hồ sơ ứng tuyển thành công mỗi ngày, sự hiệu quả đến từ đâu?
                </p>
            </div>
            <div class="why-wrap p-relative">
                <div class="why__image p-absolute d-none">
                    <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/rings-why.png" alt="">
                </div>
                <div class="why__inner d-flex">
                    <div>
                        <div class="why-left ta-left">
                            <div class="why-box  p-relative">
                                <div class="why-box-head ai-center d-flex ">
                                    <div class="why-box__title fw-600">NỀN TẢNG TUYỂN DỤNG SỐ 1 TẠI ĐÀ NẴNG</div>
                                    <div class="why-box__icon d-flex js-center ai-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                            <path d="M104 224H24c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V248c0-13.3-10.7-24-24-24zM64 472c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zM384 81.5c0 42.4-26 66.2-33.3 94.5h101.7c33.4 0 59.4 27.7 59.6 58.1 .1 17.9-7.5 37.2-19.4 49.2l-.1 .1c9.8 23.3 8.2 56-9.3 79.5 8.7 25.9-.1 57.7-16.4 74.8 4.3 17.6 2.2 32.6-6.1 44.6C440.2 511.6 389.6 512 346.8 512l-2.8 0c-48.3 0-87.8-17.6-119.6-31.7-16-7.1-36.8-15.9-52.7-16.2-6.5-.1-11.8-5.5-11.8-12v-213.8c0-3.2 1.3-6.3 3.6-8.5 39.6-39.1 56.6-80.6 89.1-113.1 14.8-14.8 20.2-37.2 25.4-58.9C282.5 39.3 291.8 0 312 0c24 0 72 8 72 81.5z" />
                                        </svg>
                                    </div>
                                </div>
                                <span class="why-box-desc d-block fw-500">
                                    Vieclamdanang.edu.vn là chuyên trang tuyển dụng việc làm uy tín nhất tại Đà Nẵng.
                                    Chúng
                                    tôi không phải người tiên phong nhưng là người làm tốt nhất
                                </span>
                            </div>
                            <div class="why-box  p-relative">
                                <div class="why-box-head ai-center d-flex">
                                    <div class="why-box__title fw-600">NỀN TẢNG TUYỂN DỤNG SỐ 1 TẠI ĐÀ NẴNG</div>
                                    <div class="why-box__icon d-flex js-center ai-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                            <path d="M104 224H24c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V248c0-13.3-10.7-24-24-24zM64 472c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zM384 81.5c0 42.4-26 66.2-33.3 94.5h101.7c33.4 0 59.4 27.7 59.6 58.1 .1 17.9-7.5 37.2-19.4 49.2l-.1 .1c9.8 23.3 8.2 56-9.3 79.5 8.7 25.9-.1 57.7-16.4 74.8 4.3 17.6 2.2 32.6-6.1 44.6C440.2 511.6 389.6 512 346.8 512l-2.8 0c-48.3 0-87.8-17.6-119.6-31.7-16-7.1-36.8-15.9-52.7-16.2-6.5-.1-11.8-5.5-11.8-12v-213.8c0-3.2 1.3-6.3 3.6-8.5 39.6-39.1 56.6-80.6 89.1-113.1 14.8-14.8 20.2-37.2 25.4-58.9C282.5 39.3 291.8 0 312 0c24 0 72 8 72 81.5z" />
                                        </svg>
                                    </div>
                                </div>
                                <span class="why-box-desc d-block fw-500">
                                    Vieclamdanang.edu.vn là chuyên trang tuyển dụng việc làm uy tín nhất tại Đà Nẵng.
                                    Chúng
                                    tôi không phải người tiên phong nhưng là người làm tốt nhất
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="why-phone p-relative d-none">
                            <div class="why-phone-wrap">
                                <div class="why-phone-box p-absolute top-0 left-0 right-0 bottom-0">
                                    <div class="why-phone__slider">
                                        <div class="why-phone__image">
                                            <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/temp-30s-03-3000.jpg" alt="">
                                        </div>
                                        <div class="why-phone__image">
                                            <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/9.jpg" alt="">
                                        </div>
                                        <div class="why-phone__image">
                                            <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/9.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="why-right">
                            <div class="why-box p-relative">
                                <div class="why-box-head ai-center d-flex ">
                                    <div class="why-box__title fw-600">NỀN TẢNG TUYỂN DỤNG SỐ 1 TẠI ĐÀ NẴNG</div>
                                    <div class="why-box__icon d-flex js-center ai-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                            <path d="M104 224H24c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V248c0-13.3-10.7-24-24-24zM64 472c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zM384 81.5c0 42.4-26 66.2-33.3 94.5h101.7c33.4 0 59.4 27.7 59.6 58.1 .1 17.9-7.5 37.2-19.4 49.2l-.1 .1c9.8 23.3 8.2 56-9.3 79.5 8.7 25.9-.1 57.7-16.4 74.8 4.3 17.6 2.2 32.6-6.1 44.6C440.2 511.6 389.6 512 346.8 512l-2.8 0c-48.3 0-87.8-17.6-119.6-31.7-16-7.1-36.8-15.9-52.7-16.2-6.5-.1-11.8-5.5-11.8-12v-213.8c0-3.2 1.3-6.3 3.6-8.5 39.6-39.1 56.6-80.6 89.1-113.1 14.8-14.8 20.2-37.2 25.4-58.9C282.5 39.3 291.8 0 312 0c24 0 72 8 72 81.5z" />
                                        </svg>
                                    </div>
                                </div>
                                <span class="why-box-desc d-block fw-500">
                                    Vieclamdanang.edu.vn là chuyên trang tuyển dụng việc làm uy tín nhất tại Đà Nẵng.
                                    Chúng
                                    tôi không phải người tiên phong nhưng là người làm tốt nhất
                                </span>
                            </div>
                            <div class="why-box  p-relative">
                                <div class="why-box-head ai-center d-flex">
                                    <div class="why-box__title fw-600">NỀN TẢNG TUYỂN DỤNG SỐ 1 TẠI ĐÀ NẴNG</div>
                                    <div class="why-box__icon d-flex js-center ai-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                            <path d="M104 224H24c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V248c0-13.3-10.7-24-24-24zM64 472c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zM384 81.5c0 42.4-26 66.2-33.3 94.5h101.7c33.4 0 59.4 27.7 59.6 58.1 .1 17.9-7.5 37.2-19.4 49.2l-.1 .1c9.8 23.3 8.2 56-9.3 79.5 8.7 25.9-.1 57.7-16.4 74.8 4.3 17.6 2.2 32.6-6.1 44.6C440.2 511.6 389.6 512 346.8 512l-2.8 0c-48.3 0-87.8-17.6-119.6-31.7-16-7.1-36.8-15.9-52.7-16.2-6.5-.1-11.8-5.5-11.8-12v-213.8c0-3.2 1.3-6.3 3.6-8.5 39.6-39.1 56.6-80.6 89.1-113.1 14.8-14.8 20.2-37.2 25.4-58.9C282.5 39.3 291.8 0 312 0c24 0 72 8 72 81.5z" />
                                        </svg>
                                    </div>
                                </div>
                                <span class="why-box-desc d-block fw-500">
                                    Vieclamdanang.edu.vn là chuyên trang tuyển dụng việc làm uy tín nhất tại Đà Nẵng.
                                    Chúng
                                    tôi không phải người tiên phong nhưng là người làm tốt nhất
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="service">
        <div class="ctnr">
            <div class="why__heading ta-center">
                <h2 class="why__title">TẠI SAO CHỌN CHÚNG TÔI</h2>
                <p class="why__desc h6">Với hơn +3000 lượt hồ sơ ứng tuyển thành công mỗi ngày, sự hiệu quả đến từ đâu?
                </p>
            </div>
            <div class="service-inner">
                <div class="service-item">
                    <div class="row">
                        <div style="--w-lg:5;--w-xs:12" class="clm">
                            <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/dang-tuyen-mien-phi.png" alt="">
                        </div>
                        <div style="--w-lg:7;--w-xs:12" class="clm">
                            <h3 class="service__title fw-700">Đăng tuyển miễn phí</h3>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Cách để đăng tin hiệu quả >>
                                <a class="service__desc--link d-block">
                                    Xem chi tiết
                                </a>
                            </div>
                            <a class="service__btn tt-up d-inline-block fw-600">
                                Đăng ngay
                            </a>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="row">
                        <div style="--w-lg:5;--w-xs:12" class="clm">
                            <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/dang-tuyen-mien-phi.png" alt="">
                        </div>
                        <div style="--w-lg:7;--w-xs:12" class="clm">
                            <h3 class="service__title fw-700">Đăng tuyển miễn phí</h3>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Cách để đăng tin hiệu quả >>
                                <a class="service__desc--link d-block">
                                    Xem chi tiết
                                </a>
                            </div>
                            <a class="service__btn tt-up d-inline-block fw-600">
                                Đăng ngay
                            </a>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="row">
                        <div style="--w-lg:5;--w-xs:12" class="clm">
                            <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/dang-tuyen-mien-phi.png" alt="">
                        </div>
                        <div style="--w-lg:7;--w-xs:12" class="clm">
                            <h3 class="service__title fw-700">Đăng tuyển miễn phí</h3>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Cách để đăng tin hiệu quả >>
                                <a class="service__desc--link d-block">
                                    Xem chi tiết
                                </a>
                            </div>
                            <a class="service__btn tt-up d-inline-block fw-600">
                                Đăng ngay
                            </a>
                        </div>
                    </div>
                </div>
                <div class="service-item">
                    <div class="row">
                        <div style="--w-lg:5;--w-xs:12" class="clm">
                            <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/dang-tuyen-mien-phi.png" alt="">
                        </div>
                        <div style="--w-lg:7;--w-xs:12" class="clm">
                            <h3 class="service__title fw-700">Đăng tuyển miễn phí</h3>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Đăng tối đa 4 tin tuyển dụng miễn phí.
                            </div>
                            <div class="service__desc d-flex ai-center">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/check.png" alt="">
                                Cách để đăng tin hiệu quả >>
                                <a class="service__desc--link d-block">
                                    Xem chi tiết
                                </a>
                            </div>
                            <a class="service__btn tt-up d-inline-block fw-600">
                                Đăng ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="recruitment-price">

        <div class="ctnr">
            <div class="why__heading ta-center">
                <h2 class="why__title">TẠI SAO CHỌN CHÚNG TÔI</h2>
                <p class="why__desc h6">Với hơn +3000 lượt hồ sơ ứng tuyển thành công mỗi ngày, sự hiệu quả đến từ đâu?
                </p>
            </div>
            <div class="recruitment-price__slider">
                <div class="price-inner">
                    <ul>
                        <li>
                            TỐT NHẤT 3
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="6" viewBox="0 0 192 512">
                                    <path d="M20 424.2h20V279.8H20c-11 0-20-9-20-20V212c0-11 9-20 20-20h112c11 0 20 9 20 20v212.2h20c11 0 20 9 20 20V492c0 11-9 20-20 20H20c-11 0-20-9-20-20v-47.8c0-11 9-20 20-20zM96 0C56.2 0 24 32.2 24 72s32.2 72 72 72 72-32.2 72-72S135.8 0 96 0z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                    </ul>
                    <div class="price-bottom p-relative">
                        <button class="price-bottom__btn d-block">Đăng ký</button>
                        <div class="price-bottom__notification ta-center p-absolute">
                            Có thể đăng ký
                        </div>
                    </div>
                </div>
                <div class="price-inner">
                    <ul>
                        <li>
                            TỐT NHẤT 3
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="6" viewBox="0 0 192 512">
                                    <path d="M20 424.2h20V279.8H20c-11 0-20-9-20-20V212c0-11 9-20 20-20h112c11 0 20 9 20 20v212.2h20c11 0 20 9 20 20V492c0 11-9 20-20 20H20c-11 0-20-9-20-20v-47.8c0-11 9-20 20-20zM96 0C56.2 0 24 32.2 24 72s32.2 72 72 72 72-32.2 72-72S135.8 0 96 0z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                    </ul>
                    <div class="price-bottom p-relative">
                        <button class="price-bottom__btn d-block">Đăng ký</button>
                        <div class="price-bottom__notification ta-center p-absolute">
                            Có thể đăng ký
                        </div>
                    </div>
                </div>
                <div class="price-inner">
                    <ul>
                        <li>
                            TỐT NHẤT 3
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="6" viewBox="0 0 192 512">
                                    <path d="M20 424.2h20V279.8H20c-11 0-20-9-20-20V212c0-11 9-20 20-20h112c11 0 20 9 20 20v212.2h20c11 0 20 9 20 20V492c0 11-9 20-20 20H20c-11 0-20-9-20-20v-47.8c0-11 9-20 20-20zM96 0C56.2 0 24 32.2 24 72s32.2 72 72 72 72-32.2 72-72S135.8 0 96 0z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                    </ul>
                    <div class="price-bottom p-relative">
                        <button class="price-bottom__btn d-block">Đăng ký</button>
                        <div class="price-bottom__notification ta-center p-absolute">
                            Có thể đăng ký
                        </div>
                    </div>
                </div>
                <div class="price-inner">
                    <ul>
                        <li>
                            TỐT NHẤT 3
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="6" viewBox="0 0 192 512">
                                    <path d="M20 424.2h20V279.8H20c-11 0-20-9-20-20V212c0-11 9-20 20-20h112c11 0 20 9 20 20v212.2h20c11 0 20 9 20 20V492c0 11-9 20-20 20H20c-11 0-20-9-20-20v-47.8c0-11 9-20 20-20zM96 0C56.2 0 24 32.2 24 72s32.2 72 72 72 72-32.2 72-72S135.8 0 96 0z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                        <li>
                            <input value="31" type="radio" class="price-input">
                            <label>
                                <span>
                                    <i></i>
                                    1 Tuần
                                </span>
                                <span>
                                    700.000
                                    <sup>đ</sup>
                                </span>
                            </label>
                        </li>
                    </ul>
                    <div class="price-bottom p-relative">
                        <button class="price-bottom__btn d-block">Đăng ký</button>
                        <div class="price-bottom__notification ta-center p-absolute">
                            Có thể đăng ký
                        </div>
                    </div>
                </div>
            </div>
            <div class="recruitment-price__btn ta-center">
                <a class="d-inline-block" href=""> Tìm hiểu các vị trí quảng cáo</a>
                </a>
            </div>
        </div>
        <div class="compare">
            <div class="why__heading ta-center">
                <h2 class="why__title">TẠI SAO CHỌN CHÚNG TÔI</h2>
                <p class="why__desc h6">Với hơn +3000 lượt hồ sơ ứng tuyển thành công mỗi ngày, sự hiệu quả đến từ đâu?
                </p>
            </div>
            <div class="ctnr">
                <table class="w-100">
                    <thead class="compare-thead">
                        <tr class="row">
                            <th style="--w-md:3">
                                <h3 class="compare-thead__title tt-up fw-700">CÁC KHU VỰC VIP
                                </h3>
                                <span class="compare-thead__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </th>
                            <th style="--w-md:3">
                                <h3 class="compare-thead__title tt-up fw-700">TUYỂN GẤP
                                </h3>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="6" viewBox="0 0 192 512">
                                        <path d="M20 424.2h20V279.8H20c-11 0-20-9-20-20V212c0-11 9-20 20-20h112c11 0 20 9 20 20v212.2h20c11 0 20 9 20 20V492c0 11-9 20-20 20H20c-11 0-20-9-20-20v-47.8c0-11 9-20 20-20zM96 0C56.2 0 24 32.2 24 72s32.2 72 72 72 72-32.2 72-72S135.8 0 96 0z">
                                        </path>
                                    </svg>
                                </a>
                            </th>
                            <th style="--w-md:3">
                                <h3 class="compare-thead__title tt-up fw-700">HÀNG ĐẦU
                                </h3>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="6" viewBox="0 0 192 512">
                                        <path d="M20 424.2h20V279.8H20c-11 0-20-9-20-20V212c0-11 9-20 20-20h112c11 0 20 9 20 20v212.2h20c11 0 20 9 20 20V492c0 11-9 20-20 20H20c-11 0-20-9-20-20v-47.8c0-11 9-20 20-20zM96 0C56.2 0 24 32.2 24 72s32.2 72 72 72 72-32.2 72-72S135.8 0 96 0z">
                                        </path>
                                    </svg>
                                </a>
                            </th>
                            <th style="--w-md:3">
                                <h3 class="compare-thead__title tt-up fw-700">TỐT NHẤT
                                </h3>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="6" viewBox="0 0 192 512">
                                        <path d="M20 424.2h20V279.8H20c-11 0-20-9-20-20V212c0-11 9-20 20-20h112c11 0 20 9 20 20v212.2h20c11 0 20 9 20 20V492c0 11-9 20-20 20H20c-11 0-20-9-20-20v-47.8c0-11 9-20 20-20zM96 0C56.2 0 24 32.2 24 72s32.2 72 72 72 72-32.2 72-72S135.8 0 96 0z">
                                        </path>
                                    </svg>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="compare-body">
                        <tr class="row">
                            <td style="--w-md:3">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/ic-mota.png" alt="">
                                <span>Mô tả chung</span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                        </tr>
                        <tr class="row">
                            <td style="--w-md:3">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/ic-mota.png" alt="">
                                <span>Mô tả chung</span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                        </tr>
                        <tr class="row">
                            <td style="--w-md:3">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/ic-mota.png" alt="">
                                <span>Mô tả chung</span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                        </tr>
                        <tr class="row">
                            <td style="--w-md:3">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/ic-mota.png" alt="">
                                <span>Mô tả chung</span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                            <td style="--w-md:3">
                                <span class="compare-body__desc fw-400">
                                    Các ưu đãi khi đăng tin
                                </span>
                            </td>
                        </tr>
                        <tr class="row">
                            <td style="--w-md:3">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/ic-mota.png" alt="">
                                <span>Mô tả chung</span>
                            </td>
                            <td style="--w-md:3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zM227.3 387.3l184-184c6.2-6.2 6.2-16.4 0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6 0L216 308.1l-70.1-70.1c-6.2-6.2-16.4-6.2-22.6 0l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6l104 104c6.2 6.2 16.4 6.2 22.6 0z" />
                                </svg>
                            </td>
                            <td style="--w-md:3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zM227.3 387.3l184-184c6.2-6.2 6.2-16.4 0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6 0L216 308.1l-70.1-70.1c-6.2-6.2-16.4-6.2-22.6 0l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6l104 104c6.2 6.2 16.4 6.2 22.6 0z" />
                                </svg>
                            </td>
                            <td style="--w-md:3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zM227.3 387.3l184-184c6.2-6.2 6.2-16.4 0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6 0L216 308.1l-70.1-70.1c-6.2-6.2-16.4-6.2-22.6 0l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6l104 104c6.2 6.2 16.4 6.2 22.6 0z" />
                                </svg>
                            </td>
                        </tr>
                        <tr class="row">
                            <td style="--w-md:3">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/ic-mota.png" alt="">
                                <span>Mô tả chung</span>
                            </td>
                            <td style="--w-md:3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z" />
                                </svg>
                            </td>
                            <td style="--w-md:3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z" />
                                </svg>
                            </td>
                            <td style="--w-md:3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                    <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z" />
                                </svg>
                            </td>
                        </tr>
                        <tr class="row">
                            <td style="--w-md:3">
                                <img src="https://vieclamdanang.edu.vn/public/upload/icon/ntd/ic-mota.png" alt="">
                                <span>Mô tả chung</span>
                            </td>
                            <td style="--w-md:3">
                                <a class="d-block" href="">Đăng ký</a>
                            </td>
                            <td style="--w-md:3">
                                <a class="d-block" href="">Đăng ký</a>
                            </td>
                            <td style="--w-md:3">
                                <a class="d-block" href="">Đăng ký</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="ctnr">

        </div>
</section>

<script>
    $(document).ready(function() {
        $(".recruiter-banner__slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".why-phone__slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
        });
    });
    $(document).ready(function() {
        $(".recruitment-price__slider").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,

                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,

                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>

@endsection