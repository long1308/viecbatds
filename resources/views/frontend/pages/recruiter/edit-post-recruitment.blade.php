@extends('frontend.master')
@section('title', 'Sửa tin tuyển dụng')
@section('keywords', $header['seo-home']->link ?? '')
@section('description', $header['seo-home']->description ?? '')
@section('image', asset($header['seo-home']->avatar_path) ?? '')
@section('content')

<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile">
            <div class="row">
                <div class="clm" style="--w-lg:9; --w-md:12; --w-sm:12; --w-xs:12">
                    <div class="box__left__post">
                        <div class="box_inner__post">
                            <h2 class="title__postnews">Sửa tin tuyển dụng</h2>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Tiêu đề *</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <input name="title" type="text" value="{{ $postRecruitment->name }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Số lượng tuyển</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2 toww">
                                        <input name="numberRecruitment" type="number" value="{{ $postRecruitment->number_people }}">
                                    </form>
                                    <form action="" class="form__in2 toww">
                                        <select name="sex" id="sex">
                                            <option value="default">Giới tính</option>
                                            <option value="Không yêu cầu" @if ($postRecruitment->sex == "Không yêu cầu") selected @endif>Không yêu cầu</option>
                                            <option value="Nam" @if ($postRecruitment->sex == "Nam") selected @endif>Nam</option>
                                            <option value="Nữ" @if ($postRecruitment->sex == "Nữ") selected @endif>Nữ</option>

                                        </select>
                                    </form>
                                </div>

                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Trình độ</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <input name="degree" type="text" value="{{ $postRecruitment->degree }}"> 
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Ngành nghề</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__selects">
                                        <select name="categoryRecruitment" id="categoryRecruitment" style="width: 50%;">
                                            <option value="default">Chọn ngành ngề tuyển dụng</option>
                                            @foreach ($categoryRecruitment as $item)
                                            <option value="{{ $item->id }}" @if ($postRecruitment->profession_id == $item->id) selected @endif>{{ $item->name }}</option> 
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Vị trí</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__selects">
                                        <select name="positionRecruitment" id="positionRecruitment" style="width: 50%;">
                                            <option value="default">Chọn vị trí tuyển dụng</option>
                                            @foreach ($positionRecruitment as $item)
                                            <option value="{{ $item->id }}" @if ($postRecruitment->position_id == $item->id) selected @endif>{{ $item->name }}</option> 
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Năm kinh nghiệm</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <input id="experienceYear" name="experienceYear" type="text" style="width: 20%;" value="{{ $postRecruitment->experience_year }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Nơi làm việc</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__selects">
                                        <select name="addressId" id="addressId" style="width: 50%;">
                                            <option value="default">Chọn nơi làm việc</option>
                                            @foreach ($dataAddress as $item)
                                            <option value="{{ $item->id }}" @if ($postRecruitment->address_id == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Địa điểm chi tiết</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <input name="addressDetail" type="text" value="{{ $postRecruitment->address_detail }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Hình thức làm việc</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__selects">
                                        <select name="typeWork" id="typeWork" style="width: 50%;">
                                            <option value="default">Chọn hình thức làm việc</option>
                                            <option value="Toàn thời gian" @if ($postRecruitment->type_work == "Toàn thời gian") selected @endif>Toàn thời gian</option>
                                            <option value="Bán thời gian" @if ($postRecruitment->type_work == "Bán thời gian") selected @endif>Bán thời gian</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Mức lương</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <input id="minSalary" name="minSalary" type="text" style="margin-right: 20px; width: 10%;" value="{{ $postRecruitment->min_salary }}">
                                        <p>-</p>
                                        <input id="maxSalary" name="maxSalary" type="text" style="margin-left: 20px; width: 10%;" value="{{ $postRecruitment->max_salary }}"> 
                                        <p style="margin-left: 10px; font-size: 15px; margin-top: 5px;">đơn vị: triệu VNĐ </p>                                   
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Ngày hết hạn</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <input name="dateExpiry" type="date" class="datepicker-personal" style="width: 40%;" value="{{ date('Y-m-d', strtotime($postRecruitment->expiry_date)) }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Mô tả công việc</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <textarea name="" id="description" cols="30" rows="10" style="padding: 10px;">{{ $postRecruitment->description }}</textarea>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Yêu cầu công việc</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <textarea name="" id="require" cols="30" rows="10" style="padding: 10px;">{{ $postRecruitment->require }}</textarea>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in2">
                                <div class="rows__in2__lefft">
                                    <label for="">Lợi ích</label>
                                </div>
                                <div class="rows__in2__right">
                                    <form action="" class="form__in2">
                                        <textarea name="" id="benefits" cols="30" rows="10" style="padding: 10px;">{{ $postRecruitment->benefits }}</textarea>
                                    </form>
                                </div>
                            </div>

                            <div class="inner__bottom__post" style="text-align: center;">

                                {{-- <div class="rows__in2">
                                    <div class="rows__in2__lefft">
                                        <label for="">Liên hệ</label>
                                    </div>
                                    <div class="rows__in2__right">
                                        <div class="box_contact">

                                            <div class="line_contact">
                                                <div class="title_line">
                                                    Điện thoại:
                                                </div>
                                                <div class="value">
                                                    <input type="text" name="phone_number" id="phone_number" fdprocessedid="5v9f1a">
                                                </div>
                                            </div>

                                            <div class="line_contact">
                                                <div class="title_line">
                                                    Email:
                                                </div>
                                                <div class="value">
                                                    <input type="text" name="email" id="email" fdprocessedid="j1wu19">
                                                </div>
                                            </div>

                                            <div class="line_contact">
                                                <div class="title_line">
                                                    Địa chỉ:
                                                </div>
                                                <div class="value">
                                                    <input type="text" name="address" id="address" fdprocessedid="eda4lb">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div> --}}
                                <button class="btn__save__post" onclick="updatePostRecruitment()">Cập nhật</button>
                            </div>
                        </div>


                    </div>

                </div>
                @include('frontend.partials.sidebar-recruiter')
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

function validateNumberic(event) {
    var charCode = event.charCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        event.preventDefault();
    }
}

function updatePostRecruitment(){
    if ($('input[name="title"]').val() == '' 
    || $('input[name="numberRecruitment"]').val() == '' 
    || $('#sex').val() == 'default' 
    || $('input[name="degree"]').val() == ''
    || $('#categoryRecruitment').val() == 'default'
    || $('input[name="experienceYear"]').val() == ''
    || $('#addressId').val() == 'default'
    || $('input[name="addressDetail"]').val() == ''
    || $('#typeWork').val() == 'default'
    || $('#positionRecruitment').val() == 'default'
    || $('input[name="minSalary"]').val() == ''
    || $('input[name="maxSalary"]').val() == ''
    || $('input[name="dateExpiry"]').val() == ''
    || $('#description').val() == ''
    || $('#require').val() == ''
    || $('#benefits').val() == '') {
        alert('Vui lòng điền đầy đủ thông tin để tiếp tục!');
        return;
    }

    let formData = new FormData();
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('name',$('input[name="title"]').val());
    formData.append('description', $('#description').val());
    formData.append('sex', $('#sex').val());
    formData.append('position_id', $('#positionRecruitment').val());
    formData.append('number_people', $('input[name="numberRecruitment"]').val());
    formData.append('type_work', $('#typeWork').val());
    formData.append('degree', $('input[name="degree"]').val());
    formData.append('experience_year', $('input[name="experienceYear"]').val());
    formData.append('profession_id', $('#categoryRecruitment').val());
    formData.append('min_salary', $('input[name="minSalary"]').val());
    formData.append('max_salary', $('input[name="maxSalary"]').val());
    formData.append('benefits', $('#benefits').val());
    formData.append('require', $('#require').val());
    formData.append('address_id', $('#addressId').val());
    formData.append('address_detail', $('input[name="addressDetail"]').val());
    formData.append('expiry_date', $('input[name="dateExpiry"]').val());
    formData.append('recruitment_id', '{{ $postRecruitment->id }}');

    jQuery.ajax({
        url: `{{ route('updatePostRecruitment') }}`, 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            alert('Cập nhật tin thành công!');
            window.location.href = '{{ route('listEmployee') }}';
        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
}
</script>
@endsection