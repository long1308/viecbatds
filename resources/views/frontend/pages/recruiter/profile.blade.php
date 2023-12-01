@extends('frontend.master')
@section('title', 'Hồ sơ')
@section('keywords', $header['seo-home']->link ?? '')
@section('description', $header['seo-home']->description ?? '')
@section('image', asset($header['seo-home']->avatar_path) ?? '')
@section('content')

<div class="profile__new">
    <div class="container">
        <div class="wrap__profile__new">
            <div class="ctnr">
                <div class="row">
                    <div class="clm" style="--w-lg:9; --w-md:9; --w-sm:12; --w-xs:12">
                        <div class="header__profile">
                            <div class="header__profile__banner">
                                <img src="{{ asset(Auth::guard('web')->user()->banner_path ?? 'storage/ban-bom-go-soi-lam-ban-1.jpg') }}" alt="">
                                <input class="button_in button_title custom-file-input" onchange="uploadBannerUser()" type="file" name="image" id="bannerUser" accept="image/*" title="Thay đổi banner" hidden>
                                <button type="button" class="updateBanner"onclick="$('#bannerUser').click()">Cập nhật banner</button>
                            </div>
                            <div class="body__profile__new">
                                <div class="content__body">
                                    <div class="avata__body" style="background-image: url({{ asset(Auth::guard('web')->user()->avatar_path) }});">
                                        <button class="updateAvata">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <path d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="list__detail__body">
                                        <div class="body__name">
                                            <h3>{{ Auth::guard('web')->user()->name }}</h3>
                                        </div>
                                        <div class="rows__detail">
                                            <div class="number__story"> 0 tin tuyển dụng</div>
                                            <div class="number__folower">0 lượt theo dõi</div>
                                            <div class="number__money">Số duw: 0</div>
                                            <div class="numbers">Điểm 10</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="group__acticons">
                                <button class="upVip">Nâng cấp vip</button>
                                <button class="paytoCard">Nạp số dư</button>
                                <button class="checkdetail">
                                    Xác thực thông tin
                                </button>
                            </div>
                            <div class="tab__header__profile">
                                <ul>
                                    <li onclick="window.location.href = '{{ route('profileRecruiter') }}' ">Home</li>
                                    <li>Hồ sơ nộp</li>
                                    <li onclick="window.location.href = '{{ route('profileRecruiter') }}?tab=dang-tin' ">Đăng tin</li>
                                    <li>Cập nhật tài khoản</li>
                                </ul>
                                <div class="about__me"><a href="">Trang công ty</a></div>
                            </div>
                        </div>
                        @if (!request()->input('tab'))
                        <div class="tab__list__profile active">
                            <div class="main__tablist">
                                <div class="box_inner__profile">
                                    <h2 class="name__profile">Chỉnh sửa tên Công Ty</h2>
                                    <div class="rows__in">
                                        <div class="rows_in_left">
                                            <label for="">Tên công ty*</label>
                                        </div>
                                        <div class="row_in_right">
                                            <form action="" class="from__profile">
                                                <input type="text" name="nameCompany" placeholder="Tên công ty" value="{{ Auth::guard('web')->user()->name }}">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="rows__in">
                                        <div class="rows_in_left">
                                            <label for="">Tên đăng nhập*</label>
                                        </div>
                                        <div class="row_in_right">
                                            <form action="" class="from__profile">
                                                <input type="text" name="usernameCompany" placeholder="Tên đăng nhập" value="{{ Auth::guard('web')->user()->username }}" disabled>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="rows__in">
                                        <div class="rows_in_left">
                                            <label for="">Địa chỉ công ty*</label>
                                        </div>
                                        <div class="row_in_right">
                                            <form action="" class="from__profile">
                                                <input type="text" name="addressCompany" placeholder="Địa chỉ công ty" value="{{ Auth::guard('web')->user()->address }}">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="rows__in" style="height: 200px;">
                                        <div class="rows_in_left">
                                            <label for="">Giới thiệu ngắn</label>
                                        </div>
                                        <div class="row_in_right">
                                            <form action="" class="from__profile">
                                                <textarea id="descriptionCompany" name="" id="" cols="30" rows="10" style="width: 100%">{{ Auth::guard('web')->user()->description }}</textarea>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="rows__in">
                                        <div class="rows_in_left">
                                            <label for="">Email*</label>
                                        </div>
                                        <div class="row_in_right">
                                            <form action="" class="from__profile">
                                                <input type="text" name="emailCompany" placeholder="example@email.com" value="{{ Auth::guard('web')->user()->email }}" disabled>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="rows__in">
                                        <div class="rows_in_left">
                                            <label for="">Điện thoại*</label>
                                        </div>
                                        <div class="row_in_right">
                                            <form action="" class="from__profile">
                                                <input type="tel" name="phoneCompany" placeholder="Số điện thoại" value="{{ Auth::guard('web')->user()->phone }}" disabled>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="rows__in">
                                        <div class="rows_in_left">
                                            <label for="">Trang web</label>
                                        </div>
                                        <div class="row_in_right">
                                            <form action="" class="from__profile">
                                                <input type="text" name="websiteCompany" placeholder="website" value="{{ Auth::guard('web')->user()->website }}">
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Thông tin sản phẩm</label>
                                </div>
                                <div class="row_in_right">
                                    <button class="btn__add__product">Thêm mới sản phẩm</button>
                                </div>
                            </div> --}}
                                    <div class="group__btn__profile">
                                        <button type="button" class="btn__save" onclick="addProfile()">Lưu</button>
                                        <button class="btn__view__again" onclick="window.location.href='{{ route('detailRecruiter', ['username' => Auth::guard('web')->user()->username]) }}'">Xem lại thông tin hồ sơ</button>
                                    </div>
                                    <div style="margin-top: 25px;">
                                        <p><strong>Lưu ý:</strong> Bạn vui lòng liên hệ admin để thay đổi tên tài khoản, email, số điện thoại.</p>
                                        {!!$footer['lhe']->content!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (request()->input('tab') == 'dang-tin')
                        <div class="tab__list__profile active">
                            <div class="main__tablist">
                                <div class="tablist__top">
                                    <div class="header__tablist">
                                        <h2>Thông tin công việc</h2>
                                    </div>
                                    <div class="body__tablist">
                                        <div class="row">
                                            <div class="clm" style="--w-lg:7;--w-md:7">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub> Chức danh</div>
                                                    <input type="text" placeholder="VD: Nhân viên kinh doanh ...">
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:5; --w-md:5">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub> Cấp bậc</div>
                                                    <select name="position" id="">
                                                        <option value="" disabled>Chọn cấp bậc</option>
                                                        @foreach ($arrPosition as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:6; --w-md:6">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub> {{ $typeWork->name }}</div>
                                                    <select name="type_work" id="">
                                                        <option value="" disabled>Chọn loại hình công việc</option>
                                                        @foreach ($arrTypeWork as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:6; --w-md:6">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub> {{ $salary->name }}</div>
                                                    <select name="salary" id="">
                                                        <option value="" disabled>Chọn mức lương</option>
                                                        @foreach ($arrSalary as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach             
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:6; --w-md:6">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub>Địa điểm làm việc (Giới hạn <strong>6</strong> địa điểm)</div>
                                                    <select name="address" id="" data-placeholder="Chọn địa điểm làm việc" multiple>
                                                        @foreach ($arrAddress as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach                                   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:6; --w-md:6">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub>Ngành nghề (Giới hạn <strong>3</strong> ngành nghề)</div>
                                                    <select class="check__work" name="" id="" data-placeholder="Chọn ngành nghề" multiple>   
                                                        @foreach ($arrCategoryRecruitment as $item)                 
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:6; --w-md:6">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub>Số lượng</div>
                                                    <div class="box__include">
                                                        <button class="decrement">-</button>
                                                        <input type="text" value="1">
                                                        <button class="increment">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:6; --w-md:6">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub>Hạn nộp hồ sơ</div>
                                                    <input type="date">
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:12; --w-md:12">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub>Mô tả công việc(Giới hạn 2.000 ký tự)</div>
                                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tablist__bottom">
                                    <div class="header__tablist">
                                        <h2>Yêu cầu công việc</h2>
                                    </div>
                                    <div class="body__tablist">
                                        <div class="row">
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub> {{ $experience->name }}</div>
                                                    <select name="experience" id="">
                                                        @foreach ($arrExperience as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub> {{ $degree->name }}</div>
                                                    <select name="degree" id="">
                                                        @foreach ($arrDegree as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach             
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <div class="rows_tablist">
                                                    <div class="labels"><sub>*</sub> Giới tính</div>
                                                    <select name="salary" id="">
                                                        <option value="0">Không yêu cầu</option>
                                                        <option value="1">Nam</option>
                                                        <option value="2">Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content__tablist__bottom">
                                        <div class="input__welfare">
                                            <textarea name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tablist__bottom">
                                    <div class="header__tablist">
                                        <h2>Chế độ phúc lợi</h2>
                                    </div>
                                    <div class="content__tablist__bottom">
                                        <div class="row">
                                            @foreach (App\Models\AttributeRecruitment::where('parent_id', 38)->get() as $item)
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H96V32H64zm64 0V480H448V32H128zM512 480c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H480V480h32zM256 176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H320v48c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V288H208c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16h48V176z" />
                                                    </svg>
                                                    Chế độ bảo hiểm --}}
                                                    {!! $item->name !!}
                                                </button>
                                            </div>
                                            @endforeach
                                            
                                            {{-- <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                        <path d="M32.1 29.3C33.5 12.8 47.4 0 64 0H256c16.6 0 30.5 12.8 31.9 29.3l14 168.4c6 72-42.5 135.2-109.9 150.6V448h48c17.7 0 32 14.3 32 32s-14.3 32-32 32H160 80c-17.7 0-32-14.3-32-32s14.3-32 32-32h48V348.4C60.6 333 12.1 269.8 18.1 197.8l14-168.4zm56 98.7H231.9l-5.3-64H93.4l-5.3 64z" />
                                                    </svg>
                                                    Nghỉ phép năm
                                                </button>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                                        <path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z" />
                                                    </svg>
                                                    Đồng phục
                                                </button>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H96V32H64zm64 0V480H448V32H128zM512 480c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H480V480h32zM256 176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H320v48c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V288H208c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16h48V176z" />
                                                    </svg>
                                                    Chế độ bảo hiểm
                                                </button>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                        <path d="M32.1 29.3C33.5 12.8 47.4 0 64 0H256c16.6 0 30.5 12.8 31.9 29.3l14 168.4c6 72-42.5 135.2-109.9 150.6V448h48c17.7 0 32 14.3 32 32s-14.3 32-32 32H160 80c-17.7 0-32-14.3-32-32s14.3-32 32-32h48V348.4C60.6 333 12.1 269.8 18.1 197.8l14-168.4zm56 98.7H231.9l-5.3-64H93.4l-5.3 64z" />
                                                    </svg>
                                                    Nghỉ phép năm
                                                </button>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                                        <path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z" />
                                                    </svg>
                                                    Đồng phục
                                                </button>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H96V32H64zm64 0V480H448V32H128zM512 480c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H480V480h32zM256 176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H320v48c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V288H208c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16h48V176z" />
                                                    </svg>
                                                    Chế độ bảo hiểm
                                                </button>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                        <path d="M32.1 29.3C33.5 12.8 47.4 0 64 0H256c16.6 0 30.5 12.8 31.9 29.3l14 168.4c6 72-42.5 135.2-109.9 150.6V448h48c17.7 0 32 14.3 32 32s-14.3 32-32 32H160 80c-17.7 0-32-14.3-32-32s14.3-32 32-32h48V348.4C60.6 333 12.1 269.8 18.1 197.8l14-168.4zm56 98.7H231.9l-5.3-64H93.4l-5.3 64z" />
                                                    </svg>
                                                    Nghỉ phép năm
                                                </button>
                                            </div>
                                            <div class="clm" style="--w-lg:4; --w-md:4">
                                                <button class="Welfare">
                                                    <input type="checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                                        <path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z" />
                                                    </svg>
                                                    Đồng phục
                                                </button>
                                            </div> --}}
                                        </div>
                                        <div class="show__mores">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                <path d="M246.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 402.7 361.4 265.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-160 160zm160-352l-160 160c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 210.7 361.4 73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3z" />
                                            </svg>
                                            Xem thêm
                                        </div>
                                        <div class="input__welfare">
                                            <textarea name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tablist__bottom">
                                    <div class="header__tablist">
                                        <h2>Thông tin liên hệ</h2>
                                    </div>
                                    <div class="content__tablist__bottom">
                                        <div class="row">
                                            {{-- <div class="clm" style="--w-lg:12; --w-md:12">
                                                <div class="rows_tablist__bottom">
                                                    <div class="labels"><input type="checkbox">Ứng tuyển online qua email</div>
                                                    <div class="d-flex ai-center">
                                                        <select name="" id="">
                                                            <option value="">Ứng tuyển online qua email</option>
                                                            <option value="">Chọn cấp bậc</option>
                                                            <option value="">Chọn cấp bậc</option>
                                                        </select>
                                                        <button class="add__emails">
                                                            +
                                                        </button>
                                                    </div>
                                                    <div class="desc__posts">
                                                        * Hệ thống sẽ gửi hồ sơ ứng tuyển đến email này, thông tin email sẽ được bảo mật
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="clm" style="--w-lg:12; --w-md:12">
                                                <div class="rows_tablist__bottom">
                                                    <div class="labels"><input type="checkbox">Ứng viên có thể liên hệ qua hotline:</div>
                                                    <input class="w-100" type="text" value="0987654321">
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:12; --w-md:12">
                                                <div class="rows_tablist__bottom">
                                                    <div class="labels"><input type="checkbox">Nộp trực tiếp tại văn phòng </div>
                                                </div>
                                            </div> --}}
                                            <div class="clm" style="--w-lg:6; --w-md:6">
                                                <div class="rows_tablist__bottom">
                                                    <div class="labels"><sub>*</sub>Người liên hệ</div>
                                                    <input class="w-100" type="text" value="Phòng nhân sự">
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:6; --w-md:6">
                                                <div class="rows_tablist__bottom">
                                                    <div class="labels"><sub>*</sub>Số điện thoại</div>
                                                    <input class="w-100" type="text" value="Phòng nhân sự">
                                                </div>
                                            </div>
                                            <div class="clm" style="--w-lg:12; --w-md:12">
                                                <div class="rows_tablist__bottom">
                                                    <div class="labels"><sub>*</sub>Địa chỉ liên hệ</div>
                                                    <input class="w-100" type="text" value="47 Thanh Liệt">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post__up">
                                        <button>Đăng tuyển dụng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="clm" style="--w-lg:3;--w-md:3">
                        <div class="sticky-top">
                            <div class="infoCompany-card infoCompany-card_sidebar overflow-hidden card">
                                <div class="card-header border-bottom-0 bg-transparent">
                                    <div class="card-title mb-0" style="font-size: 1em">
                                        Biển Vàng </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                                </svg>
                                            </span>
                                            0981784234
                                        </li>
                                        <li>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                    <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                                </svg>
                                            </span>
                                            Số 47 Thanh liệt
                                        </li>
                                        <li>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z" />
                                                </svg>
                                            </span>
                                            <a href="javascript:void(0)" rel="nofollow">Chưa cập nhật</a>
                                        </li>
                                        <li>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                                    <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                                </svg>
                                                Qui mô:
                                            </span>
                                            Chưa cập nhật
                                        </li>
                                        <li>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z" />
                                                </svg>
                                                MST:
                                            </span>
                                            05512232
                                        </li>
                                        <li>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path d="M318.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-120 120c-12.5 12.5-12.5 32.8 0 45.3l16 16c12.5 12.5 32.8 12.5 45.3 0l4-4L325.4 293.4l-4 4c-12.5 12.5-12.5 32.8 0 45.3l16 16c12.5 12.5 32.8 12.5 45.3 0l120-120c12.5-12.5 12.5-32.8 0-45.3l-16-16c-12.5-12.5-32.8-12.5-45.3 0l-4 4L330.6 74.6l4-4c12.5-12.5 12.5-32.8 0-45.3l-16-16zm-152 288c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3l48 48c12.5 12.5 32.8 12.5 45.3 0l112-112c12.5-12.5 12.5-32.8 0-45.3l-1.4-1.4L272 285.3 226.7 240 168 298.7l-1.4-1.4z" />
                                                </svg>
                                                Loại hình:
                                            </span>
                                            Chưa cập nhật
                                        </li>
                                        <li>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
                                                </svg>
                                                Lĩnh vực:
                                            </span>
                                            Chưa cập nhật
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile">
            <div class="row">
                <div class="clm" style="--w-lg:9;  --w-md:12; --w-sm:12; --w-xs:12">
                    <div class="box__left__profile">


                    </div>
                </div>
                @include('frontend.partials.sidebar-recruiter')
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $(document).ready(function() {
        $('input[type="tel"]').on('input', function(event) {
            $(this).val($(this).val().replace(/\D/g, ''));
        });
    });

    function isAlloweImageType(fileType) {
        var allowedFileTypes = ["image/jpeg", "image/png", "image/gif", "image/bmp"];

        return allowedFileTypes.includes(fileType);
    }

    function uploadBannerUser() {
        let imageInput = jQuery('#bannerUser')[0].files[0];

        if (imageInput) {
            var fileType = imageInput.type;

            if (isAlloweImageType(fileType)) {
            
            } else {
                alert('Loại file không được hỗ trợ. Chỉ chấp nhận file ảnh.');
                return;
            }
        } 

        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('banner', imageInput);
        formData.append('id', '{{ Auth::guard('web')->user()->id }}');

        jQuery.ajax({
                url: '{{ route('uploadBannerUser') }}', 
                method: 'POST', 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    alert('Cập nhật ảnh bìa thành công!');
                    window.location.reload();
                },
                error: function(error) {
                    console.error('Lỗi khi gọi API: ', error);
                    return false;
                }
            });
    }

    function addProfile() {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var phoneNumberPattern = /^\d{10,11}$/;

        if ($('input[name="nameCompany"]').val() == '' ||
            $('input[name="usernameCompany"]').val() == '' ||
            $('input[name="emailCompany"]').val() == '' ||
            $('input[name="phoneCompany"]').val() == '' ||
            $('input[name="addressCompany"]').val() == '') {
            alert('Vui lòng điền đầy đủ thông tin * để tiếp tục!');
            return;
        }

        if (!phoneNumberPattern.test($('input[name="phoneCompany"]').val())) {
            alert('Vui lòng nhập đúng định dạng số điện thoại (có từ 10 đến 11 chữ số)!');
            return;
        }

        if (!emailPattern.test($('input[name="emailCompany"]').val())) {
            alert('Vui lòng nhập đúng định dạng email!');
            return;
        }

        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('name', $('input[name="nameCompany"]').val());
        formData.append('username', $('input[name="usernameCompany"]').val());
        formData.append('email', $('input[name="emailCompany"]').val());
        formData.append('phone', $('input[name="phoneCompany"]').val());
        formData.append('website', $('input[name="websiteCompany"]').val());
        formData.append('description', $('#descriptionCompany').val());
        formData.append('address', $('input[name="addressCompany"]').val());

        jQuery.ajax({
            url: `{{ route('updateProfile', ['userId' => Auth::guard('web')->user()->id]) }}`,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Cập nhật hồ sơ thành công!');
                window.location.reload();
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });
    }
</script>
<script>
    function showTabList(index) {
        const tabsList = document.querySelectorAll('.tab__list__profile');
        const tabLinksList = document.querySelectorAll('.tab__header__profile ul li');

        // Ẩn tất cả các tab và loại bỏ lớp active khỏi tất cả các tab link
        tabsList.forEach(tab => tab.classList.remove('active'));
        tabLinksList.forEach(link => link.classList.remove('active'));

        // Hiển thị tab được chọn và thêm lớp active cho tab link tương ứng
        tabsList[index].classList.add('active');
        tabLinksList[index].classList.add('active');
    }
</script>