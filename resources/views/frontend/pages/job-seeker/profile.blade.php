@extends('frontend.master')
@section('title', 'Hồ sơ')
@section('keywords', $header['seo-home']->link ??'')
@section('description', $header['seo-home']->description ??'')
@section('image', asset($header['seo-home']->avatar_path) ??'')
@section('content')
<style>
  
</style>
<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile ">
            <div class="row">
                <div class="clm" style="--w-lg:9; --w-md:12; --w-sm:12; --w-xs:12">
                    @if (request()->input('type') == '')                      
                    <div class="left__profileUse active">
                        <div class="box__left__search">
                            <div class="box_inner__profile profile__use">

                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Họ tên <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input name="name" type="text" value="{{ Auth::guard('web')->user()->name }}">
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Số điện thoại <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input name="phone" type="text" value="{{ Auth::guard('web')->user()->phone }}" disabled>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Ngày sinh <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input id="dateOfBirth" name="dateOfBirth" name="dateExpiry" type="date" class="datepicker-personal" style="width: 40%;" 
                                            @if (isset(Auth::guard('web')->user()->profile))
                                            value="{{ \Carbon\Carbon::parse(Auth::guard('web')->user()->profile->date_of_birth)->format('Y-m-d') }}"
                                            @endif >
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Giới tính <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="checkGt">
                                            <input class="sexCheckbox" id="femaleSex" name="sex" type="radio" value="Nam" onclick="$('#maleSex').prop('checked', false)"
                                            @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->sex == 0) 
                                            checked  
                                            @endif >
                                            <label for="">Nữ</label>
                                        </form>
                                        <form action="" class="checkGt">
                                            <input class="sexCheckbox" id="maleSex" name="sex" type="radio" value="Nữ" onclick="$('#femaleSex').prop('checked', false)"
                                            @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->sex == 1) 
                                            checked  
                                            @endif >
                                            <label for="">Nam</label>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Quê quán <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <div class="row_adress_option" style="display: flex;">
                                                <select name="hometownId" id="hometownId">
                                                    <option value="default">Tỉnh / Thành phố</option>
                                                    @foreach (\App\Models\AddressInformation::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                    @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->hometown_id == $item->id) 
                                                    selected  
                                                    @endif 
                                                    >{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input name="hometowmDetail" type="text" placeholder="Địa chỉ chi tiết" 
                                                @if (isset(Auth::guard('web')->user()->profile->hometown_detail))
                                                value="{{ Auth::guard('web')->user()->profile->hometown_detail }}" 
                                                @endif 
                                                style="margin-left: 10px; width: 65%;">
                                                {{-- <select name="" id="">
                                                    <option value="">Quận/ Huyện</option>
                                                </select>
                                                <select name="" id="">
                                                    <option value="">Phường/ Xã</option>
                                                </select> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Địa chỉ cư trú <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <div class="row_adress_option" style="display: flex;">
                                                <select name="addressId" id="addressId">
                                                    <option value="default">Tỉnh / Thành phố</option>
                                                    @foreach (\App\Models\AddressInformation::all() as $item)
                                                    <option value="{{ $item->id }}" 
                                                    @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->address_id == $item->id) 
                                                    selected  
                                                    @endif
                                                    >{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" name="addressDetail" placeholder="Địa chỉ chi tiết" 
                                                @if (isset(Auth::guard('web')->user()->profile->address_detail))
                                                value="{{ Auth::guard('web')->user()->profile->address_detail }}" 
                                                @endif
                                                style="margin-left: 10px; width: 65%;">
                                                {{-- <select name="" id="">
                                                    <option value="">Quận/ Huyện</option>
                                                </select>
                                                <select name="" id="">
                                                    <option value="">Phường/ Xã</option>
                                                </select> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Năm kinh nghiệm <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input id="experienceYear" name="experienceYear" type="text" style="width: 20%;"
                                            @if (isset(Auth::guard('web')->user()->profile))
                                            value="{{ Auth::guard('web')->user()->profile->experience_year }}"
                                            @endif >
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Ngành nghề <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <select name="professionId" id="professionId">
                                                <option value="default">Ngành nghề</option>
                                                @foreach (\App\Models\CategoryRecruitment::all() as $item)
                                                <option value="{{ $item->id }}"
                                                @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->profession_id == $item->id) 
                                                selected  
                                                @endif
                                                >{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>

                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Đào tạo tại Nhà Phố Việt Nam</label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <select name="experience" id="experience">
                                                <option value="default">Lựa chọn</option>
                                                <option value="1" 
                                                @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->experience == 1) 
                                                selected  
                                                @endif
                                                >Có</option>
                                                <option value="0" 
                                                @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->experience == 0) 
                                                selected  
                                                @endif
                                                >Không</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Trình độ <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <select name="degree" id="degree">
                                                <option value="default">Lựa chọn</option>
                                                @foreach (config('constant.jobseeker.degree') as $key => $item)
                                                <option value="{{ $item }}" 
                                                @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->degree == $item) 
                                                selected  
                                                @endif
                                                >{{ $key }}</option>
                                                @endforeach                                                
                                            </select>
                                        </form>
                                    </div>
                                </div>

                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Địa chỉ email</label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input name="email" type="text" value="{{ Auth::guard('web')->user()->email }}" disabled>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Mức lương <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input name="minSalary" type="number" style="width: 80px;"
                                            @if (isset(Auth::guard('web')->user()->profile))
                                             value="{{ Auth::guard('web')->user()->profile->min_salary }}"
                                            @endif>
                                            <p style="margin-right: 10px; margin-left: 10px; padding: 0;">-</p>
                                            <input name="maxSalary" type="number" style="width: 80px;" 
                                            @if (isset(Auth::guard('web')->user()->profile))
                                            value="{{ Auth::guard('web')->user()->profile->max_salary }}"
                                            @endif>
                                            <p style="margin-right: 10px; margin-left: 10px; padding: 0; font-size: 14px;"> triệu VNĐ </p>
                                        </form>
                                    </div>
                                </div>
                                @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->link_profile)
                                <div class="rows__in" style="margin: 0;">
                                    <div class="rows_in_left">
                                    </div>
                                    <div class="row_in_right">
                                        <div class="form-upload">
                                            <p style="color: #194983;
                                            padding: 0;
                                            cursor: pointer;
                                            font-weight: bold;" onclick="window.open('{{ asset(Auth::guard('web')->user()->profile->link_profile) }}', '_blank')">
                                            Hồ sơ của bạn</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                    </div>
                                    <div class="row_in_right">
                                        <div class="form-upload">
                                            <label class="button_in_in attached_file" for="attached_file" style="cursor: pointer;">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                                        <path d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z" />
                                                    </svg> Tải Lên Hồ Sơ</span>
                                                <div class="dinh-dang-file" style="margin-top: 0;">
                                                    Ảnh, Pdf, Word(Dung lượng dưới 5mb)
                                                </div>

                                            </label>
                                            <input type="file" name="fileProfile" id="attached_file" onchange="uploadFile()" class="inputfile" accept=".pdf, image/*, .doc, .docx">
                                        </div>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <div class="checkBoxSuccess">
                                                <input class="approveCheck" id="approveTrue" type="checkbox" onclick="$('#approveFalse').prop('checked', false)"
                                                @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->approve == 1) 
                                                    checked 
                                                @endif >
                                                <label for="">Cho phép luân chuyển hồ sơ</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <div class="checkBoxSuccess">
                                                <input class="approveCheck" id="approveFalse" type="checkbox" onclick="$('#approveTrue').prop('checked', false)" 
                                                @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->approve == 0) 
                                                    checked 
                                                @endif >
                                                <label for="">Đã tìm được việc</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <div class="checkBoxSuccess">
                                                <input id="agree" name="agree" type="checkbox"
                                                @if (isset(Auth::guard('web')->user()->profile) && Auth::guard('web')->user()->profile->agree == 1) 
                                                    checked 
                                                @endif >
                                                <label for="">Tôi đồng ý với điều khoản tại trang Tuyển Dụng</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="rows__in">
                                    <div class="rows_in_left">
                                    </div>
                                    <div class="row_in_right">
                                        <div class="group__btn__profile">
                                            <button class="btnUpdateProfileUse" onclick="updateProfileUser()">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z" />
                                                </svg>
                                                Cập nhật
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div style="margin-top: 25px;">
                                    <p><strong>Lưu ý:</strong> Bạn vui lòng liên hệ admin để thay đổi tên tài khoản, email, số điện thoại.</p>
                                    {!!$footer['lhe']->content!!}
                                </div>

                            </div>

                        </div>
                    </div>
                    @endif

                    @if (request()->input('type') == config('constant.jobseeker.type-tab.company-sent'))                       
                    <div class="left__profileUse active">
                        <div class="box__left__search">
                            <div class="box_inner__profile profile__use">
                                <div class="list__apply">
                                    <h3 class="title__list__apply">Danh sách các công ty đã ứng tuyển</h3>
                                    <div class="box__tableAplly">
                                        <table class="tableApply">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Ngày ứng tuyển</th>
                                                    <th>Tên công ty</th>
                                                    <th>Tin ứng tuyển</th>
                                                    <th>Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (Auth::guard('web')->user()->applyRecruitments->reverse() as $key => $item)
                                                <tr>
                                                    <td>
                                                        <div class="numbers">{{ $key+1 }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="time__apply">{{ $item->created_at->format('d-m-Y') }}</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('detailRecruiter', ['username' => $item->recruitment->company->username]) }}" class="desc__apply">
                                                            <div class="images"><img src="{{ asset($item->recruitment->company->avatar_path) }}" alt=""></div>
                                                            <h3 class="title__descApply">{{ $item->recruitment->company->name }}</h3>
                                                        </a>
                                                    </td>
                                                    <td><a href="{{ route('postRecruitmentDetail', ['slug' => $item->recruitment->slug]) }}" class="storyApply">{{ $item->recruitment->name }}</a></td>
                                                    @if ($item->approve == 0 && $item->reject == 0)
                                                    <td>
                                                        <div class="update__times">Chưa xem</div>
                                                    </td>
                                                    @elseif($item->approve == 1)
                                                    <td>
                                                        <div class="update__times">Chấp nhận</div>
                                                    </td>
                                                    @elseif($item->reject == 1)
                                                    <td>
                                                        <div class="update__times">Từ chối</div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>
                    @endif
                    @if (request()->input('type') == config('constant.jobseeker.type-tab.alert'))  
                    <div class="left__profileUse active">
                        <div class="box__left__search">
                            <div class="box_inner__profile profile__use">
                                <div class="list__apply">
                                    <h3 class="title__list__apply">Thông báo</h3>
                                    <div class="box__tableAplly">
                                        <table class="tableApply">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên công ty</th>
                                                    <th>Phản hồi</th>
                                                    <th>Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (Auth::guard('web')->user()->applyRecruitments()->whereDate('created_at', Carbon\Carbon::today()->toDateString())->get() as $key => $item)
                                                <tr>
                                                    <td>
                                                        <div class="numbers">{{ $key+1 }}</div>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('detailRecruiter', ['username' => $item->recruitment->company->username]) }}" class="desc__apply">
                                                            <div class="images"><img src="{{ asset($item->recruitment->company->avatar_path) }}" alt=""></div>
                                                            <h3 class="title__descApply">{{ $item->recruitment->company->name }}</h3>
                                                        </a>
                                                        <a href="{{ route('postRecruitmentDetail', ['slug' => $item->recruitment->slug]) }}" class="storyApply border__applyDesc">{{ $item->recruitment->name }}</a>
                                                    </td>
                                                    <td>
                                                        <div class="time__back">{{ $item->created_at->format('H:m d-m-Y') }}</div>
                                                    </td>
                                                    @if ($item->approve == 0 && $item->reject == 0)
                                                    <td>
                                                        <div class="update__times">Chưa xem</div>
                                                    </td>
                                                    @elseif($item->approve == 1)
                                                    <td>
                                                        <div class="update__times">Chấp nhận</div>
                                                    </td>
                                                    @elseif($item->reject == 1)
                                                    <td>
                                                        <div class="update__times">Từ chối</div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>
                    @endif
                    @if (request()->input('type') == config('constant.jobseeker.type-tab.viewed-profile')) 
                    <div class="left__profileUse active">
                        <div class="box__left__search">
                            <div class="box_inner__profile profile__use">
                                <div class="list__apply">
                                    <h3 class="title__list__apply">Thông báo</h3>
                                    <div class="box__tableAplly">
                                        <table class="tableApply">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên công ty</th>
                                                    <th>Thời gian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (App\Models\ProfileSave::where('jobseeker_id', Auth::guard('web')->user()->id)->get() as $key => $item)
                                                <tr>
                                                    <td>
                                                        <div class="numbers">{{ $key+1 }}</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('detailRecruiter', ['username' => $item->recruiter->username]) }}" class="desc__apply">
                                                            <div class="images"><img src="{{ asset($item->recruiter->avatar_path) }}" alt="{{ $item->recruiter->name }}"></div>
                                                            <h3 class="title__descApply">{{ $item->recruiter->name }}</h3>
                                                    </td>
                                                    <td>
                                                        <div class="time__back">{{ $item->created_at->format('H:m d-m-Y') }}</div>
                                                    </td>

                                                </tr>
                                                @endforeach                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>
                    @endif
                    @if (request()->input('type') == config('constant.jobseeker.type-tab.change-pass')) 
                    <div class="left__profileUse active">
                        <div class="box__left__search">
                            <div class="box_inner__profile profile__use">
                                <div class="list__apply">
                                    <h3 class="title__list__apply">Đổi mật khẩu</h3>
                                    <div class="box__tableAplly">
                                        <form action="" class="edit__passwword">
                                            <div class="box__input__pass">
                                                <input id="passInput" type="password" placeholder="Nhập mật khẩu mới" class="password__change">
                                                <div class="toggle-password" onclick="togglePasswordVisibility(this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                        <path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="box__input__pass">
                                                <input id="passInputConfirm" type="password" placeholder="Nhập lại mật khẩu" class="password__update">
                                                <div class="toggle-password" onclick="togglePasswordVisibility(this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                        <path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <button class="update_paswword" type="button" onclick="changePass()">Cập nhật</button>

                                        </form>
                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>
                    @endif
                </div>
                <div class="clm" style="--w-lg:3; --w-md:12; --w-sm:12; --w-xs:12">
                    <div class="box__right__profileUse">
                        <div class="box__right__profile">
                            <div class="box__inner__right__profile">

                                <div class="box__avt__profile avt__use">
                                    @if (Auth::guard('web')->user()->avatar_path)
                                    <img src="{{ asset(Auth::guard('web')->user()->avatar_path) }}" alt="{{ Auth::guard('web')->user()->name }}">
                                    @else
                                    <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="">
                                    @endif
                                </div>
                                <h2 class="name__profileUse">
                                    <a href="">{{ Auth::guard('web')->user()->name }}</a>
                                </h2>
                                <div class="desc__avt desc__use">Jpg, Png, Gif (Dung lượng dưới 2,5mb)</div>
                                <form class="form__post__avt post__use" id="postform" action="">
                                    <input type="hidden" value="11" name="id_users">
                                    <input type="hidden" value="6" name="id_profile">
                                    <input type="hidden" value="1" name="img">
                                    <input class="button_in button_title custom-file-input" onchange="uploadLogo()"  type="file" name="image" accept="image/*" id="logo" title="Thay đổi logo">
                                    <label class="custom-file-label" for="logo"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z" />
                                        </svg>Thay đổi hình đại diện</label>
                                </form>

                                <div class="rows__right" style="cursor: pointer;" onclick="window.location.href = '{{ route('profileJobSeeker') }}' ">
                                    <div class="icon__rows__right">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" />
                                        </svg>
                                    </div>
                                    <div class="desc__rows__right">
                                        Hồ sơ
                                    </div>
                                </div>
                                <div class="rows__right" style="cursor: pointer;" onclick="window.location.href = '{{ route('profileJobSeeker') }}?type={{ config('constant.jobseeker.type-tab.company-sent') }}' ">
                                    <div class="icon__rows__right">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path d="M48 48a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm448 16H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z" />
                                        </svg>
                                    </div>
                                    <div class="desc__rows__right">
                                        Công ty đã gửi
                                    </div>
                                </div>
                                <div class="rows__right" style="cursor: pointer;" onclick="window.location.href = '{{ route('profileJobSeeker') }}?type={{ config('constant.jobseeker.type-tab.alert') }}' ">
                                    <div class="icon__rows__right">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z" />
                                        </svg>
                                    </div>
                                    <div class="desc__rows__right">
                                        Thông báo
                                        <div class="noti">
                                            {{ Auth::guard('web')->user()->applyRecruitments()->whereDate('created_at', Carbon\Carbon::today()->toDateString())->count() }}
                                        </div>
                                    </div>
                                </div>
                                <div class="rows__right" style="cursor: pointer;" onclick="window.location.href = '{{ route('profileJobSeeker') }}?type={{ config('constant.jobseeker.type-tab.viewed-profile') }}' ">
                                    <div class="icon__rows__right">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" />
                                        </svg>
                                    </div>
                                    <div class="desc__rows__right">
                                        Ai xem hồ sơ của tôi
                                    </div>
                                </div>
                                <div class="rows__right" style="cursor: pointer;" onclick="window.location.href = '{{ route('profileJobSeeker') }}?type={{ config('constant.jobseeker.type-tab.change-pass') }}' ">
                                    <div class="icon__rows__right">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                            <path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                                        </svg>
                                    </div>
                                    <div class="desc__rows__right">
                                        Đổi mật khẩu
                                    </div>
                                </div>
                                <div class="rows__right" onclick="logout()" style="cursor: pointer;">
                                    <div class="icon__rows__right">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" />
                                        </svg>
                                    </div>
                                    <div class="desc__rows__right">
                                        Đăng xuất
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var experienceYear = document.getElementById('experienceYear');
        var minSalary = document.getElementById('minSalary');
        var maxSalary = document.getElementById('maxSalary');

        experienceYear.addEventListener('keypress', function(event) {
            validateNumberic(event)
        });

        minSalary.addEventListener('keypress', function(event) {
            validateNumberic(event)
        });

        maxSalary.addEventListener('keypress', function(event) {
            validateNumberic(event)
        });
    });

    function changePass() {
        if ($('#passInput').val() != $('#passInputConfirm').val()) {
            alert('Mật khẩu nhập lại không trùng khớp!');
            return;
        }

        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('userId', '{{ Auth::guard('web')->user()->id }}');
        formData.append('password', $('#passInput').val());

        jQuery.ajax({
            url: `{{ route('admin.changePassUserRecruitment') }}`, 
            method: 'POST', 
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                alert('Đổi mật khẩu thành công!');
                window.location.reload();
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });
    }

    function validateNumberic(event) {
        var charCode = event.charCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
        }
    }

    function isAllowedFileType(fileType) {
        var allowedFileTypes = ["application/pdf", "image/jpeg", "image/png", "image/gif", "image/bmp", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];

        return allowedFileTypes.includes(fileType);
    }

    function isAlloweImageType(fileType) {
        var allowedFileTypes = ["image/jpeg", "image/png", "image/gif", "image/bmp"];

        return allowedFileTypes.includes(fileType);
    }

    function uploadLogo() {
        let imageInput = jQuery('#logo')[0].files[0];

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
        formData.append('avatar', imageInput);
        formData.append('id', '{{ Auth::guard('web')->user()->id }}');
    
        jQuery.ajax({
                url: '{{ route('uploadLogo') }}', 
                method: 'POST', 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    alert('Cập nhật ảnh thành công!');
                    window.location.reload();
                },
                error: function(error) {
                    console.error('Lỗi khi gọi API: ', error);
                    return false;
                }
            });
    }

    function uploadFile() {
        let fileInput = jQuery('#attached_file')[0].files[0];

        if (fileInput) {
            var fileType = fileInput.type;

            if (isAllowedFileType(fileType)) {
            
            } else {
                alert('Loại file không được hỗ trợ. Chỉ chấp nhận file PDF, ảnh và Word.');
                return;
            }
        } 
    
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('file', fileInput);
        formData.append('id', '{{ Auth::guard('web')->user()->id }}');
    
        jQuery.ajax({
                url: '{{ route('uploadFile') }}', 
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

    function updateProfileUser(){
        if ($('input[name="name"]').val() == '' 
        || $('input[name="phone"]').val() == '' 
        || $('.sexCheckbox').val() == '' 
        || $('#hometownId').val() == 'default'
        || $('input[name="hometowmDetail"]').val() == ''
        || $('#addressId').val() == 'default'
        || $('input[name="addressDetail"]').val() == ''
        || $('#experienceYear').val() == ''
        || $('#professionId').val() == 'default'
        || $('#degree').val() == 'default'
        || $('input[name="email"]').val() == ''
        || $('input[name="minSalary"]').val() == ''
        || $('input[name="maxSalary"]').val() == '') {
            alert('Vui lòng điền đầy đủ thông tin để tiếp tục!');
            return;
        }

        let sex;
        let approve;
        let agree;

        if ($('#maleSex').is(":checked") == true) {
            sex = 1;
        } 

        if ($('#femaleSex').is(":checked") == true) {
            sex = 0;
        } 

        if ($('#approveTrue').is(":checked") == true) {
            approve = 1;
        } 

        if ($('#approveFalse').is(":checked") == true) {
            approve = 0;
        } 

        if ($('#agree').is(":checked") == true) {
            agree = 1;
        } else{
            agree = 0;
        }

        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('name',$('input[name="name"]').val());
        formData.append('phone', $('input[name="phone"]').val());
        formData.append('date_of_birth', $('#dateOfBirth').val());
        formData.append('sex', sex);
        formData.append('hometown_id', $('#hometownId').val());
        formData.append('hometown_detail', $('input[name="hometowmDetail"]').val());
        formData.append('address_id', $('#addressId').val());
        formData.append('address_detail', $('input[name="addressDetail"]').val());
        formData.append('experience', $('#experience').val());
        formData.append('experience_year', $('#experienceYear').val());
        formData.append('profession_id', $('#professionId').val());
        formData.append('min_salary', $('input[name="minSalary"]').val());
        formData.append('max_salary', $('input[name="maxSalary"]').val());
        formData.append('degree', $('#degree').val());
        formData.append('email', $('input[name="email"]').val());
        formData.append('approve', approve);
        formData.append('agree', agree);
        formData.append('jobseeker_id', '{{ Auth::guard('web')->user()->id }}');

        jQuery.ajax({
            url: `{{ route('updateProfileUser') }}`, 
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
@endsection