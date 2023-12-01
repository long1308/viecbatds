<head>
    <title> {{ $profileRecruitment->name }} </title>
    @if (isset($header['icon-website']))
    <link rel="shortcut icon" href="{{ asset($header['icon-website']) }}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css"
    integrity="sha512-W/zrbCncQnky/EzL+/AYwTtosvrM+YG/V6piQLSe2HuKS6cmbw89kjYkp3tWFn1dkWV7L1ruvJyKbLz73Vlgfg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/joblist.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/employer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/employDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
</head>
<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile">
            <div class="row">
                @if ($profileRecruitment->role == 1)
                <div class="clm" style="--w-lg:9; --w-md:4">
                    @if (request()->input('type') == '')                      
                    <div class="left__profileUse active">
                        <div class="box__left__search">
                            <div class="box_inner__profile profile__use">

                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Tên tài khoản <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input name="username" type="text" value="{{ $profileRecruitment->username }}">
                                        </form>
                                    </div>
                                </div>

                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Số điện thoại <sup>*</sup></label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input name="phone" type="text" value="{{ $profileRecruitment->phone }}">
                                        </form>
                                    </div>
                                </div>                       

                                <div class="rows__in">
                                    <div class="rows_in_left">
                                        <label for="">Địa chỉ email</label>
                                    </div>
                                    <div class="row_in_right">
                                        <form action="" class="from__profile">
                                            <input name="email" type="text" value="{{ $profileRecruitment->email }}">
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

                            </div>

                        </div>
                    </div>
                    @endif

                </div>
                @elseif($profileRecruitment->role == 2)
                <div class="clm" style="--w-lg:9; --w-md:4">
                    <div class="box__left__profile">
                        <div class="box_inner__profile">
                            <h2 class="name__profile">Chỉnh sửa tên Công Ty</h2>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Tên công ty*</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <input type="text" name="nameCompany" placeholder="Tên công ty" value="{{ $profileRecruitment->name }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Tên đăng nhập*</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <input type="text" name="usernameCompany" placeholder="Tên đăng nhập" value="{{ $profileRecruitment->username }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Địa chỉ công ty*</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <input type="text" name="addressCompany" placeholder="Địa chỉ công ty" value="{{ $profileRecruitment->address }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in" style="height: 200px;">
                                <div class="rows_in_left">
                                    <label for="">Giới thiệu ngắn</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <textarea id="descriptionCompany" name="" id="" cols="30" rows="10" style="width: 100%">{{ $profileRecruitment->description }}</textarea>
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Email*</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <input type="text" name="emailCompany" placeholder="example@email.com" value="{{ $profileRecruitment->email }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Điện thoại*</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <input type="tel" name="phoneCompany" placeholder="Số điện thoại" value="{{ $profileRecruitment->phone }}">
                                    </form>
                                </div>
                            </div>
                            <div class="rows__in">
                                <div class="rows_in_left">
                                    <label for="">Trang web</label>
                                </div>
                                <div class="row_in_right">
                                    <form action="" class="from__profile">
                                        <input type="text" name="websiteCompany" placeholder="website" value="{{ $profileRecruitment->website }}">
                                    </form>
                                </div>
                            </div>                         
                            <div class="group__btn__profile">
                                <button type="button" class="btn__save" onclick="addProfile()">Lưu</button>
                                <button class="btn__view__again" onclick="window.open('{{ route('detailRecruiter', ['username' => $profileRecruitment->username]) }}', '_blank')">Xem lại thông tin hồ sơ</button>
                            </div>                       
                        </div>

                    </div>
                </div>
                @endif
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

function addProfile(){
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneNumberPattern = /^\d{10,11}$/;

    if ($('input[name="nameCompany"]').val() == '' 
    || $('input[name="usernameCompany"]').val() == '' 
    || $('input[name="emailCompany"]').val() == '' 
    || $('input[name="phoneCompany"]').val() == ''
    || $('input[name="addressCompany"]').val() == '') {
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
        url: `{{ route('updateProfile', ['userId' => $profileRecruitment->id]) }}`, 
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