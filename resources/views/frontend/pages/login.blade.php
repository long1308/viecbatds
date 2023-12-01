@extends('frontend.master')
@section('title', $header['seo-home']->name ??'')
@section('keywords', $header['seo-home']->link ??'')
@section('description', $header['seo-home']->description ??'')
@section('image', asset($header['seo-home']->avatar_path) ??'')
@section('content')

@include('frontend.partials.slide')

<div class="clear__fix">
    <div class="ctnr">
        <div class="row">
            <div class="clm" style="--w-lg:12; --w-md:12; --w-sm:12; --w-xs:12">
                <ul class="directional d-flex ai-center">
                    <li class="directional__item ">
                        <a href="" class="d-flex ai-center p-relative">
                            <svg viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                </g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>home [#1391]</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs> </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Dribbble-Light-Preview"
                                            transform="translate(-419.000000, -720.000000)" fill="#000000">
                                            <g id="icons" transform="translate(56.000000, 160.000000)">
                                                <path
                                                    d="M379.79996,578 L376.649968,578 L376.649968,574 L370.349983,574 L370.349983,578 L367.19999,578 L367.19999,568.813 L373.489475,562.823 L379.79996,568.832 L379.79996,578 Z M381.899955,568.004 L381.899955,568 L381.899955,568 L373.502075,560 L363,569.992 L364.481546,571.406 L365.099995,570.813 L365.099995,580 L372.449978,580 L372.449978,576 L374.549973,576 L374.549973,580 L381.899955,580 L381.899955,579.997 L381.899955,570.832 L382.514204,571.416 L384.001,570.002 L381.899955,568.004 Z"
                                                    id="home-[#1391]"> </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
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
<div class="box__register">
    <div class="ctnr">
        <div class="row">
            <div class="clm " style="--w-lg:5; --w-md:5; --w-sm:5; --w-xs:12">
                <ul class="nav nav-tabs">
                    <li class="active" onclick="showTab(0)"><a data-toggle="tab" aria-expanded="false">Người tìm
                            việc</a></li>
                    <li class="" onclick="showTab(1)"><a data-toggle="tab" aria-expanded="true">Nhà tuyển dụng</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active fade">
                        <div class="form_signup">
                            <div class="box_form_signup">
                                <form action="" method="POST"
                                    name="sign_up">
                                    <input type="hidden" name="success" value="1">

                                    <div class="title">
                                        Đăng nhập dành cho người tìm việc
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path
                                                d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z" />
                                        </svg>
                                    </div>
                                    <div class="sub_title">
                                        Nhập chi tiết tài khoản của bạn tại đây
                                    </div>
                                    <div class="error_msg btn_ btn-danger"></div>
                                    <div class="success_msg btn_ btn-success"></div>
                                    <div class="form-group">
                                        <label>Tài khoản hoặc số điện thoại</label>
                                        <input class="form-control" type="text" name="username" value=""
                                            placeholder="Tài khoản hoặc số điện thoại" required="" fdprocessedid="038n6">
                                    </div>
                                    <div class="form-group signup-password">
                                        <label>Mật khẩu</label>
                                        <input class="form-control password" type="password" name="password"
                                            placeholder="Mật khẩu" required="" fdprocessedid="uqszm">
                                        <div class="icon_eyes">
                                            <div class="eye-close" style="display: none;"></div>
                                            <div class="eye-open" style=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group savePassword">
                                        <input type="checkbox">
                                        <label for="">Nhớ mật khẩu</label>
                                    </div>

                                    <div class="btn__register">
                                        <button id="submit" class="form-control" type="button" name="send"
                                            fdprocessedid="0r858l" onclick="loginAccount(1)">
                                            Đăng nhập
                                        </button>
                                    </div>
                                    <div class="forgotPassword">
                                        <a href="">Quên mật khẩu?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
             
                    <div class="tab-pane fade">
                        <div class="form_signup">
                            <div class="box_form_signup">
                                <form action="" method="POST"
                                    name="sign_up">
                                    <input type="hidden" name="success" value="1">

                                    <div class="title">
                                        Đăng nhập dành cho nhà tuyển dụng
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path
                                                d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z" />
                                        </svg>
                                    </div>
                                    <div class="sub_title">
                                        Nhập chi tiết tài khoản của bạn tại đây
                                    </div>
                                    <div class="error_msg btn_ btn-danger"></div>
                                    <div class="success_msg btn_ btn-success"></div>
                                    <div class="form-group">
                                        <label>Tài khoản hoặc email</label>
                                        <input class="form-control" type="text" name="usernameCompany" value=""
                                            placeholder="Tài khoản hoặc email" required="" fdprocessedid="038n6">
                                    </div>
                                    <div class="form-group signup-password">
                                        <label>Mật khẩu</label>
                                        <input class="form-control password" type="password" name="passwordCompany"
                                            placeholder="Mật khẩu" required="" fdprocessedid="uqszm">
                                        <div class="icon_eyes">
                                            <div class="eye-close" style="display: none;"></div>
                                            <div class="eye-open" style=""></div>
                                        </div>
                                    </div>                      
                                    <div class="btn__register">
                                        <button id="submit" class="form-control" type="button" name="send"
                                            fdprocessedid="0r858l" onclick="loginAccount(2)">
                                            Đăng nhập
                                        </button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" clm col-md-7 col-sm-7 col-xs-12" style="--w-lg:7; --w-md:7; --w-sm:7; --w-xs:12">
                <div class="noidung_signup">
                    <div class="image"><img alt=""
                            src="https://noibo.viecbatdongsan.com.vn/img-svc/images/5a7929ad982f6b71323e.jpg"></div>

                    <div class="desc"><span
                            style="color: rgb(34, 34, 34); font-family: Arial, Verdana, sans-serif; font-size: 12px;">Nếu
                            bất kỳ ai trong chúng tôi được hỏi về công việc chúng tôi đang làm hàng ngày tại
                            <strong>Công ty Cổ phần Concert Media</strong>, chúng tôi chắc chắn sẽ tự hào trả lời
                            rằng chúng tôi đang làm công việc của " Những người tạo nên ước mơ ". Sở dĩ chúng tôi
                            vốn có cái tên đó là vì “chúng tôi giúp mọi người và các công ty đạt được ước mơ của
                            họ”. Trong ngành Tuyển dụng và Nhân sự, chúng tôi đã không ngừng biến ước mơ nghề nghiệp
                            của hàng ngàn công ty và mọi người thành hiện thực với các dịch vụ hiệu quả và chuyên
                            nghiệp, công ty tuyển dụng lâu đời và lớn nhất tại Việt Nam, tìm kiếm nhân sự điều hành
                            hàng đầu.</span></div>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('input[type="tel"]').on('input', function(event) {
        $(this).val($(this).val().replace(/\D/g, ''));
    });
});

function loginAccount(role){
    let formData = new FormData();

    if (role == 1) {
        if ($('input[name="username"]').val() == '' 
        || $('input[name="password"]').val() == '') {
            alert('Vui lòng điền đầy đủ thông tin để tiếp tục!');
            return;
        }

        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('password', $('input[name="password"]').val());
        formData.append('username', $('input[name="username"]').val());
        formData.append('role', role);
    }

    if (role == 2) {
        if ($('input[name="usernameCompany"]').val() == '' 
        || $('input[name="passwordCompany"]').val() == '') {
            alert('Vui lòng điền đầy đủ thông tin để tiếp tục!');
            return;
        }

        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('password', $('input[name="passwordCompany"]').val());
        formData.append('username', $('input[name="usernameCompany"]').val());
        formData.append('role', role);
    }

    jQuery.ajax({
        url: `{{ route('loginAccount') }}`, 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            if (response.role == 1) {
                window.location.href = '{{ route('profileJobSeeker') }}';
            }
  
            if (response.role == 2) {
                window.location.href = '{{ route('profileRecruiter') }}';
            }
        },
        error: function(error) {
            console.log(error);
            alert('Tài khoản hoặc mật khẩu chưa chính xác!')
        }
    });
}
</script>
@endsection