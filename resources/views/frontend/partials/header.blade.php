<header>
    <div class="header__contact">
        <div class="ctnr">
            <div class="wrap__header__contact d-flex ai-center js-between">
                <ul class="list__contact__header d-flex ai-center">
                    <li class="phone d-flex ai-center">
                        <div class="icon__phone d-flex ai-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                            </svg>
                            Đăng tuyển:
                            <a href="">0987654321</a>
                        </div>
                    </li>
                    <li class="phone__apply d-flex ai-center">
                        Tìm việc:
                        <a href="">0987654321</a>
                    </li>
                    <li class="phone__hotline d-flex ai-center">
                        Phone: <a href="">0987654321</a>
                    </li>
                    <li class="email d-flex ai-center">
                        <div class="icon__email d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                            </svg>
                        </div>
                        <a href="">info@gmail.com</a>
                    </li>
                </ul>
                <div class="box__sign__contact">
                    <div class="box__sign__news  d-flex ai-center">
                        <div class="signup__new d-flex ai-center">
                            <div class="icon__signup__new">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                    <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                            </div>
                            <a href="">Đăng ký</a>
                        </div>
                        <div class="sign__new d-flex ai-center">
                            <div class="icon__signin__new">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                                </svg>
                            </div>
                            <a href=""> Đăng nhập</a>
                        </div>
                        <div class="sign__by">
                            <a href="">Dành cho nhà tuyển dụng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__top">
        <div class="ctnr">
            <div class="row ai-center">
                <div class="clm" style=" --w-lg:4;--w-md:4; --w-sm:6; --w-xs:6">
                    <div class="logo">
                        <div class="logo__desktop">
                            <a href="{{ route('home') }}"><img src="{{$header['logo']}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="clm" style=" --w-lg:4;--w-md:8 ;--w-sm:6; --w-xs:6">
                    <div class="group__btn__header">
                        @if(isset($header['co_hoi']))
                        <button class="btn__header__jobs" onclick="window.location.href='{{ route('post.checkDetailOrCategory', ['slug' => $header['co_hoi']->key->slug]) }}'" style="cursor: pointer;">{{$header['co_hoi']->name}}</button>
                        @endif
                        @if(isset($header['goi_dang_tin']))
                        <button class="btn__header__postfree" onclick="window.location.href='{{ route('post.checkDetailOrCategory', ['slug'=> $header['goi_dang_tin']->key->slug]) }}'" style="cursor: pointer;">{{$header['goi_dang_tin']->name}}</button>
                        @endif
                    </div>
                </div>
                <div class="clm" style=" --w-lg:4;--w-md:12">
                    <div class="employer__and__login d-flex">
                        @if (!Auth::guard('web')->check())
                        <div class="group__btn__login">
                            <div class="not__logged">
                                <div class="btn__login__title">Người tìm việc</div>
                                <div class="btn__login__action">
                                    <a href="{{ route('user.login') }}" class="action__signin">Đăng nhập</a>/
                                    <a href="{{ route('user.register') }}" class="action__signup">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="login__success">
                            <div class="title__login__success">Thông tin tài khoản</div>
                            <div class="row__success">
                                <div class="icon__login__success">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" />
                                    </svg>
                                </div>
                                <div class="name__user__login">
                                    <div class="name__detail">{{ Auth::guard('web')->user()->username }} <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                            <path d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z" />
                                        </svg></div>
                                </div>
                            </div>
                            <div class="profile__details">
                                <div class="row__details" @if (Auth::guard('web')->user()->role == 2)
                                    onclick="window.location.href='{{ route('profileRecruiter') }}'"
                                    @else
                                    onclick="window.location.href='{{ route('profileJobSeeker') }}'"
                                    @endif>
                                    <div class="row__details__left">
                                        Hồ sơ
                                    </div>
                                    <div class="row__details__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path d="M436 160c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h320c26.5 0 48-21.5 48-48v-48h20c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20v-64h20c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20v-64h20zm-228-32c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64 28.7-64 64-64zm112 236.8c0 10.6-10 19.2-22.4 19.2H118.4C106 384 96 375.4 96 364.8v-19.2c0-31.8 30.1-57.6 67.2-57.6h5c12.3 5.1 25.7 8 39.8 8s27.6-2.9 39.8-8h5c37.1 0 67.2 25.8 67.2 57.6v19.2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="row__details" onclick="logout()" style="cursor: pointer;">
                                    <div class="row__details__left">
                                        Đăng xuất
                                    </div>
                                    <div class="row__details__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="group__employer">
                            <div class="empolyer__desc">Dành cho</div>
                            <a href="{{route('listRecruiter')}}" class="employer__action">Nhà tuyển dụng</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="header__main">
        <div class="ctnr d-flex ai-center p-relative">
            <ul class="menu__desktop">
                @for($i = 0; $i < 5; $i++ ) <li class="menu__desktop__item">
                    <a href="{{ route('post.checkDetailOrCategory', ['slug' => $header['menu_moi'][$i]->key->slug]) }}">
                        <img src="{{ asset('frontend/images/icon_menu.png') }}" alt="" class="icon-menu">
                        {{$header['menu_moi'][$i]->name}}
                    </a>
                    </li>
                    @endfor
            </ul>
            <div class="menu__more">
                <div class="icon__bars d-flex">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6H20M4 12H20M4 18H20"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="nav__sub  p-absolute">
                <ul class="nav__sub__click">
                    @for($i = 0;$i < count($header['menu_moi']);$i++) <li class="nav__sub__click__item"><a href="{{$header['menu_moi'][$i]->key->slug}}">{{$header['menu_moi'][$i]->name}}</a></li>
                        @endfor

                </ul>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="ctnr">
            <div class="wrap__header__bottom">
                <div class="row">
                    <div class="clm" style="--w-lg:4; --w-md:4">
                        <div class="row__header__bottom d-flex ai-center">
                            <div class="icon__header__bottom search__icon__hdbottom">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
                                </svg>
                                <input type="text" placeholder="Tiêu đề công việc, vị trí...">
                            </div>
                        </div>
                    </div>
                    <div class="clm" style="--w-lg:8; --w-md:8">
                        <div class="wrap__right__header__bottom">
                            <div class="row">
                                <div class="clm" style="--w-lg:5; --w-md:5">
                                    <div class="row__header__bottom d-flex ai-center">
                                        <div class="icon__header__bottom filter__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                                <path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" />
                                            </svg>
                                            <input type="text" placeholder="Lọc theo ngành nghề">
                                        </div>
                                    </div>
                                </div>
                                <div class="clm" style="--lg:5; --w-md:5">
                                    <div class="row__header__bottom d-flex ai-center">
                                        <div class="icon__header__bottom filter__adress">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                            </svg>
                                            <input type="text" placeholder="Lọc theo địa điểm">
                                        </div>
                                    </div>
                                </div>
                                <div class="clm" style="--w-lg:2; --w-md:2">
                                    <button class="btn__submit__form__filter">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                                        </svg>
                                        Tìm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row__middle">
                    <div class="clm" style="--w-lg:8; --w-md:8">
                        <div class="title__bottom_hd">
                            <h2>Sàn giao dịch việc làm</h2>
                        </div>
                    </div>
                    <div class="clm" style="--w-lg:4; --w-md:4">
                        <div class="box__detail__hd d-flex ai-center">
                            <div class="reset">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M463.5 224H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5z" />
                                    </svg>
                                    Reset
                                </a>
                            </div>
                            <buttom class="search__detail" id="searchButton">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
                                </svg>
                                Tìm kiếm nâng cao
                            </buttom>
                        </div>
                    </div>
                </div>
                <div class="row row__search__detail" id="searchDetail">
                    <div class="clm" style="--w-lg:3; --w-md:3">
                        <div class="row__header__bottom d-flex ai-center">
                            <div class="icon__header__bottom search__icon__hdbottom">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M326.7 403.7c-22.1 8-45.9 12.3-70.7 12.3s-48.7-4.4-70.7-12.3c-.3-.1-.5-.2-.8-.3c-30-11-56.8-28.7-78.6-51.4C70 314.6 48 263.9 48 208C48 93.1 141.1 0 256 0S464 93.1 464 208c0 55.9-22 106.6-57.9 144c-1 1-2 2.1-3 3.1c-21.4 21.4-47.4 38.1-76.3 48.6zM256 91.9c-11.1 0-20.1 9-20.1 20.1v6c-5.6 1.2-10.9 2.9-15.9 5.1c-15 6.8-27.9 19.4-31.1 37.7c-1.8 10.2-.8 20 3.4 29c4.2 8.8 10.7 15 17.3 19.5c11.6 7.9 26.9 12.5 38.6 16l2.2 .7c13.9 4.2 23.4 7.4 29.3 11.7c2.5 1.8 3.4 3.2 3.7 4c.3 .8 .9 2.6 .2 6.7c-.6 3.5-2.5 6.4-8 8.8c-6.1 2.6-16 3.9-28.8 1.9c-6-1-16.7-4.6-26.2-7.9l0 0 0 0 0 0c-2.2-.7-4.3-1.5-6.4-2.1c-10.5-3.5-21.8 2.2-25.3 12.7s2.2 21.8 12.7 25.3c1.2 .4 2.7 .9 4.4 1.5c7.9 2.7 20.3 6.9 29.8 9.1V304c0 11.1 9 20.1 20.1 20.1s20.1-9 20.1-20.1v-5.5c5.3-1 10.5-2.5 15.4-4.6c15.7-6.7 28.4-19.7 31.6-38.7c1.8-10.4 1-20.3-3-29.4c-3.9-9-10.2-15.6-16.9-20.5c-12.2-8.8-28.3-13.7-40.4-17.4l-.8-.2c-14.2-4.3-23.8-7.3-29.9-11.4c-2.6-1.8-3.4-3-3.6-3.5c-.2-.3-.7-1.6-.1-5c.3-1.9 1.9-5.2 8.2-8.1c6.4-2.9 16.4-4.5 28.6-2.6c4.3 .7 17.9 3.3 21.7 4.3c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-4.4-1.2-14.4-3.2-21-4.4V112c0-11.1-9-20.1-20.1-20.1zM48 352H64c19.5 25.9 44 47.7 72.2 64H64v32H256 448V416H375.8c28.2-16.3 52.8-38.1 72.2-64h16c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V400c0-26.5 21.5-48 48-48z" />
                                </svg>
                                <input type="text" placeholder="Lọc theo mức lương">
                            </div>
                        </div>
                    </div>
                    <div class="clm" style="--w-lg:3; --w-md:3">
                        <div class="row__header__bottom d-flex ai-center">
                            <div class="icon__header__bottom search__icon__hdbottom">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                </svg>
                                <input type="text" placeholder="Lọc theo cấp bậc">
                            </div>
                        </div>
                    </div>
                    <div class="clm" style="--w-lg:3; --w-md:3">
                        <div class="row__header__bottom d-flex ai-center">
                            <div class="icon__header__bottom search__icon__hdbottom">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <input type="text" placeholder="Lọc theo loại hình công việc">
                            </div>
                        </div>
                    </div>
                    <div class="clm" style="--w-lg:3; --w-md:3">
                        <div class="row__header__bottom d-flex ai-center">
                            <div class="icon__header__bottom search__icon__hdbottom">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                    <path d="M512 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H512zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM208 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H176zM376 144c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z" />
                                </svg>
                                <input type="text" placeholder="Lọc theo kinh nghiệm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    function logout() {
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        jQuery.ajax({
            url: `{{ route('logoutAccount') }}`,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                window.location.href = `{{ route('home') }}`;
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });
    }


    const userMore = document.querySelector(".name__user__login");
    const userDetail = document.querySelector(".profile__details");

    let isUser = false;

    userMore.addEventListener("click", () => {
        if (isUser) {
            userDetail.style.maxHeight = "0";
            isUser = false;
        } else {
            userDetail.style.maxHeight = "375px"; // You can set a suitable value
            isUser = true;
        }
    });
</script>


<script>
     var searchButton = document.getElementById("searchButton");
        var resetButton = document.querySelector(".reset");
        var searchDetailRow = document.getElementById("searchDetail");

        searchButton.addEventListener("click", function () {
            // Chuyển đổi lớp "active" trên nút đặt lại
            resetButton.classList.toggle("active");

            // Chuyển đổi lớp "active" trên dòng chi tiết tìm kiếm
            searchDetailRow.classList.toggle("active");

            // Xoay 180 độ biểu tượng
            var icon = searchButton.querySelector("svg");
            icon.classList.toggle("rotate-icon");
        });
    </script>
