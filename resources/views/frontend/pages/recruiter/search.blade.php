@extends('frontend.master')
@section('title', 'Tìm kiếm ứng viên')
@section('keywords', $header['seo-home']->link ?? '')
@section('description', $header['seo-home']->description ?? '')
@section('image', asset($header['seo-home']->avatar_path) ?? '')
@section('content')
<style>
  
</style>
<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile">
            <div class="row">
                <div class="clm" style="--w-lg:9;  --w-md:12; --w-sm:12; --w-xs:12">
                    <div class="box__left__search">
                        <div class="box_inner__profile">
                            <div class="box__search__top">
                                <h2 class="name__profile">Người tìm việc phù hợp</h2>
                                {{-- <button class="suscess-dt"><a href="">ĐÃ ĐƯỢC ĐÀO TẠO TẠI NHÀ PHỐ VIỆT NAM</a></button> --}}
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Giới tính</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <label for="" class="radio__inline"> 
                                            <input type="radio" id="maleSex" value="Nam" onclick="$('#femaleSex').prop('checked', false); $('#noSex').prop('checked', false);" style="margin-right: 10px; margin-left: 20px;" @if (request()->input('sex') == 'nam') checked @endif>Nam
                                        </label>
                                        <label for="" class="radio__inline"> 
                                            <input type="radio" id="femaleSex" value="Nam" onclick="$('#maleSex').prop('checked', false); $('#noSex').prop('checked', false);" style="margin-right: 10px; margin-left: 20px;" @if (request()->input('sex') == 'nu') checked @endif>Nữ
                                        </label>
                                        <label for="" class="radio__inline"> 
                                            <input type="radio" id="noSex" value="Nam" onclick="$('#femaleSex').prop('checked', false); $('#maleSex').prop('checked', false);" style="margin-right: 10px; margin-left: 20px;" @if (request()->input('sex') == 'khongyeucau') checked @endif>Không yêu cầu
                                        </label>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Địa chỉ cư trú</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <div class="row_adress_option">
                                            <select name="addressId" id="addressId">
                                                <option value="default">Tỉnh / Thành phố</option>
                                                @foreach (\App\Models\AddressInformation::all() as $item)
                                                <option value="{{ $item->id }}" 
                                                @if (request()->input('addressId') == $item->id) slected @endif
                                                >{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Kinh nghiệm</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <input name="minExperienceYear" type="number"  @if (request()->input('minExperienceYear')) value="{{ request()->input('minExperienceYear') }}" @endif style="width: 80px;">
                                        <p style="margin-right: 10px; margin-left: 10px; padding: 0;">-</p>
                                        <input name="maxExperienceYear" type="number" style="width: 80px;" @if (request()->input('maxExperienceYear')) value="{{ request()->input('maxExperienceYear') }}" @endif>
                                        <p style="margin-right: 10px; margin-left: 10px; padding: 0; font-size: 14px;"> năm kinh nghiệm </p>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Ngành nghề</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <select name="professionId" id="professionId">
                                            <option value="default">Ngành nghề</option>
                                            @foreach (\App\Models\CategoryRecruitment::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if (request()->input('professionId') == $item->id) selected @endif
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
                                            @if (request()->input('experience') == '1') selected @endif
                                            >Có</option>
                                            <option value="0" 
                                            @if (request()->input('experience') == '0') selected @endif
                                            >Không</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Trình độ</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <select name="degree" id="degree">
                                            <option value="default">Lựa chọn</option>
                                            @foreach (config('constant.jobseeker.degree') as $key => $item)
                                            <option value="{{ $item }}" 
                                            @if (request()->input('degree') == `'`.$item.`'`) selected @endif
                                            >{{ $key }}</option>
                                            @endforeach                                                
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Mức lương</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <input name="minSalary" type="number" style="width: 80px;" @if (request()->input('minSalary')) value="{{ request()->input('minSalary') }}" @endif>
                                        <p style="margin-right: 10px; margin-left: 10px; padding: 0;">-</p>
                                        <input name="maxSalary" type="number" style="width: 80px;" @if (request()->input('maxSalary')) value="{{ request()->input('maxSalary') }}" @endif>
                                        <p style="margin-right: 10px; margin-left: 10px; padding: 0; font-size: 14px;"> triệu VNĐ </p>
                                    </form>
                                </div>
                            </div>
                            <div class="group__btn__profile">
                                <button class="btn__search" onclick="filterProfile()">Tìm kiếm</button>
                                <button class="btn__search" onclick="window.location.href='{{ route('searchRecruitment') }}'">Làm mới</button>
                            </div>

                            <div class="form__search__sucssecc">
                                @if ($listProfile)
                                <h3>Kết quả tìm kiếm</h3>
                                @foreach ($listProfile as $item)
                                <div class="box_result_jobs">
                                    <div class="name_company">
                                        <div class="icon_like">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                <path d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z" />
                                            </svg>
                                        </div>

                                        <div class="group_cp">
                                            <a class="name">{{ $item->jobseeker->name }}</a>
                                            <div class="date">
                                                Cập nhật: {{ $item->updated_at->format('d-m-Y') }}
                                            </div>
                                        </div>
                                        <div class="pt_images_user">
                                            <a class="name" href=""><img src="{{ asset($item->jobseeker->avatar_path) }}" alt=""></a>
                                        </div>
                                    </div>

                                    <div class="info_right">
                                        <div class="salary_company item_in" style="padding: 0;">
                                            <div class="icon" style="cursor: pointer; color: #194983; font-weight: bold;" onclick="window.open('{{ asset($item->link_profile) }}', '_blank')">Xem hồ sơ</div>
                                            <div class="value"></div>
                                        </div>

                                        <div class="experience_company item_in" style="padding: 0;">
                                            <div class="value">{{ Carbon\Carbon::parse($item->date_of_birth)->format('Y') }}</div>
                                        </div>

                                        <div class="address_company item_in" style="padding: 0;">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                    <path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z" />
                                                </svg>
                                            </div>
                                            <div class="value">{{ $item->address->name }}</div>
                                        </div>

                                        <div class="experience_company item_in">
                                            @if (Auth::guard('web')->user()->profileSaves && Auth::guard('web')->user()->profileSaves()->where('jobseeker_id', $item->jobseeker->id)->first())
                                            <button style="background: #cc0001;
                                            color: white;"> Đã lưu </button>
                                            @else
                                            <button onclick="saveProfile({{ Auth::guard('web')->user()->id }},{{ $item->jobseeker->id }})">Lưu</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                @include('frontend.partials.sidebar-recruiter')
            </div>
        </div>
    </div>
</div>
<script>
var urlParams = new URLSearchParams(window.location.search);

function filterProfile() {
    urlParams.delete('sex');
    urlParams.delete('addressId');
    urlParams.delete('minExperienceYear');
    urlParams.delete('maxExperienceYear');
    urlParams.delete('professionId');
    urlParams.delete('experience');
    urlParams.delete('degree');
    urlParams.delete('minSalary');
    urlParams.delete('maxSalary');

    let sex = null;

    if ($('#maleSex').is(":checked") == true) {
        sex = 'nam';
    } 

    if ($('#femaleSex').is(":checked") == true) {
        sex = 'nu';
    } 

    if ($('#noSex').is(":checked") == true) {
        sex = 'khongyeucau';
    } 

    if (sex) {
        urlParams.set('sex', sex);
    }

    if ($('select[name="addressId"]').val() != 'default') {
        urlParams.set('addressId', $('select[name="addressId"]').val());
    }

    if ($('input[name="maxExperienceYear"]').val() != '' && $('input[name="minExperienceYear"]').val() != '') {
        urlParams.set('minExperienceYear', $('input[name="minExperienceYear"]').val());
        urlParams.set('maxExperienceYear', $('input[name="maxExperienceYear"]').val());
    }

    if ($('#professionId').val() != 'default') {
        urlParams.set('professionId', $('#professionId').val());
    }

    if ($('#experience').val() != 'default') {
        urlParams.set('experience', $('#experience').val());
    }

    if ($('select[name="degree"]').val() != 'default') {
        urlParams.set('degree', $('select[name="degree"]').val());
    }

    if ($('input[name="maxSalary"]').val() != '' && $('input[name="minSalary"]').val() != '') {
        urlParams.set('minSalary', $('input[name="minSalary"]').val());
        urlParams.set('maxSalary', $('input[name="maxSalary"]').val());
    }

    var newURL = window.location.pathname + '?' + urlParams.toString();

    window.location.href = newURL;
}

function saveProfile(recruiterId, jobseekerId) {
    let formData = new FormData();
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('recruiter_id', recruiterId);
    formData.append('jobseeker_id', jobseekerId);

    jQuery.ajax({
        url: `{{ route('saveProfile') }}`, 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            alert('Lưu hồ sơ thành công!');
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