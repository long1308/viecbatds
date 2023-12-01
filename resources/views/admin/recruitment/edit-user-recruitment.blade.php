@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Sửa thông tin tài khoản'
    ])
    <!-- END: Top Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Sửa thông tin tài khoản
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            
            <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0" onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="corner-up-left" data-lucide="corner-up-left" class="lucide lucide-corner-up-left block mx-auto"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 00-4-4H4"></path></svg>Quay lại </button>

            <div class="dropdown">
                <button id="submitData" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown" onclick="addProfile()"> Lưu </button>               
            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div id="alertValidate"></div>
            <div class="post intro-y overflow-hidden box mt-5">
                <ul class="post__tabs nav nav-tabs flex-col sm:flex-row bg-slate-200 dark:bg-darkmode-800" role="tablist">
                    <li class="nav-item">
                        <button title="Thông tin tài khoản" onclick="switchTab(1)" data-tw-toggle="tab" data-tw-target="#content" class="nav-link tooltip w-full sm:w-40 py-4 active" id="content-tab" role="tab" aria-controls="content" aria-selected="true"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Tài khoản </button>
                    </li>
                </ul>
                <div class="post__content tab-content">
                    <div id="contentTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên đăng nhập </div>
                            <div class="mt-5">
                                <input type="text" name="usernameCompany" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Tên đăng nhập" value="{{ $profileRecruitment->username }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Số điện thoại </div>
                            <div class="mt-5">
                                <input name="phoneCompany" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Số điện thoại" value="{{ $profileRecruitment->phone }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">Email </div>
                            <div class="mt-5">
                                <input name="emailCompany" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Số điện thoại" value="{{ $profileRecruitment->email }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5" @if ($profileRecruitment->role == 1) style="display: none;" @endif>
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên công ty </div>
                            <div class="mt-5">
                                <input name="nameCompany" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Tên công ty" value="{{ $profileRecruitment->name }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5" @if ($profileRecruitment->role == 1) style="display: none;" @endif>
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Địa chỉ công ty </div>
                            <div class="mt-5">
                                <input name="addressCompany" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Địa chỉ công ty" value="{{ $profileRecruitment->address }}">
                            </div>
                        </div>
                        <br @if ($profileRecruitment->role == 1) style="display: none;" @endif>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5" @if ($profileRecruitment->role == 1) style="display: none;" @endif>
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mô tả ngắn </div>
                            <div class="mt-5">
                                <textarea name="" id="descriptionCompany" cols="30" rows="10" style="width: 100%">{{ $profileRecruitment->description }}</textarea>
                            </div>
                        </div>                       
                        <br @if ($profileRecruitment->role == 1) style="display: none;" @endif>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5" @if ($profileRecruitment->role == 1) style="display: none;" @endif>
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Trang web </div>
                            <div class="mt-5">
                                <input name="websiteCompany" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Trang web" value="{{ $profileRecruitment->website }}">
                            </div>
                        </div>
                    </div>                                   
                </div>
            </div>
        </div>

        <button id="alert-save-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#save-success-confirmation-modal"></button>
        
        <!-- END: Post Content -->
       
    </div>
</div>
@include('admin.partials.modal')
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
    || $('input[name="phoneCompany"]').val() == '') {
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
            localStorage.setItem('checkUpdateSuccess', true);
            window.location.href = '{{ route('admin.listUserRecruitment') }}';
        },
        error: function(error) {
            alert = error.responseJSON.message;
            $('#alertValidate').html(`<div class="alert alert-danger-soft show flex items-center mb-2" role="alert"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="alert-octagon" data-lucide="alert-octagon" class="lucide lucide-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>`
             + alert + ` 
            </div>`);
            jQuery('html, body').scrollTop(0);
            return false;
        }
    });
}    
</script>
<!-- Call Ajax -->
@endsection