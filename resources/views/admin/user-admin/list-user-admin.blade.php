@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý header'
    ])
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Quản lý thành viên hệ thống
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @checkPermission('create-auth')
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add-modal">Thêm mới <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span></button>
        </div>
        @endcheckPermission
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Tên</th>
                        <th class="whitespace-nowrap">Email</th>
                        <th class="text-center whitespace-nowrap">Vai trò</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $key => $item)
                    <tr class="intro-x">
                        <td>
                            {{ $key + 1 }} 
                        </td>
                        <td>
                            {{ $item->name }} 
                        </td>
                        <td>
                            {{ $item->email }} 
                        </td>
                        <td style="text-align: center;">
                            @if (isset($item->roles[0]->name))
                            {{ $item->roles[0]->name }} 
                            @else

                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @checkPermission('edit-auth')
                                <a class="flex items-center mr-3" data-tw-toggle="modal" data-tw-target="#edit-modal" onclick="editAdmin({{ $item }})" style="cursor: pointer;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                @endcheckPermission
                                @checkPermission('delete-auth')
                                <a class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" onclick="deleteAdmin({{ $item->id }})" style="cursor: pointer;"> <i data-lucide="trash-2" class="w-4 h-4 mr-1" ></i> Xóa </a>
                                @endcheckPermission
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
    <!-- BEGIN: Add new category Modal -->
    <div id="add-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="text-3xl mt-5" style="padding: 15px 15px;
                    font-weight: 500;
                    font-size: 20px;">Thêm mới thành viên</div>
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5" style="border-bottom-width: 0px !important;"> Vai trò </div>
                        <div id="basic-select" class="p-5" style="padding: 0px;">
                            <div class="preview">
                                <!-- BEGIN: Basic Select -->
                                <div>
                                    <div class="mt-2">
                                        <select data-placeholder="Chọn vai trò" class="tom-select w-full" id="roleAdd" name="role">
                                            @foreach (\Spatie\Permission\Models\Role::all() as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- END: Basic Select -->          
                            </div>
                        </div>
    
                    </div>
            
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên thành viên </div>
                        <div class="mt-5" style="margin-top: 0rem !important;">
                            <input name="name" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên thành viên">
                        </div>
                    </div>

                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Email </div>
                        <div class="mt-5" style="margin-top: 0rem !important;">
                            <input name="email" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập email">
                        </div>
                    </div>

                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mật khẩu </div>
                        <div class="mt-5" style="margin-top: 0rem !important;">
                            <div style="display: flex;">
                                <input name="password" type="password" class="intro-y form-control py-3 px-4 box pr-10 passInput" placeholder="Nhập mật khẩu">
                                <button type="button" onclick="changeStatusPass()" style="width: 3rem;
                                border: 1px solid #d5d4d4;
                                border-radius: 5px;
                                background: #f1f1f1;">
                                    <i data-lucide="eye" class="block mx-auto"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Hủy</button>
                        <button type="button" class="btn btn-primary w-20" onclick="createAdmin()" data-tw-toggle="modal" data-tw-target="#save-success-confirmation-modal">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="text-3xl mt-5" style="padding: 15px 15px;
                    font-weight: 500;
                    font-size: 20px;">Cập nhật thông tin thành viên</div>
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5" style="border-bottom-width: 0px !important;"> Vai trò </div>
                        <div id="basic-select" class="p-5" style="padding: 0px;">
                            <div class="preview">
                                <!-- BEGIN: Basic Select -->
                                <div>
                                    <div class="mt-2">
                                        <select data-placeholder="Chọn vai trò" class="tom-select w-full" id="roleEdit" name="role">
                                            <option value=""></option>
                                            @foreach (\Spatie\Permission\Models\Role::all() as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- END: Basic Select -->          
                            </div>
                        </div>
    
                    </div>
            
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên thành viên </div>
                        <div class="mt-5" style="margin-top: 0rem !important;">
                            <input id="nameEdit" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên thành viên">
                        </div>
                    </div>

                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Email </div>
                        <div class="mt-5" style="margin-top: 0rem !important;">
                            <input id="emailEdit" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập email">
                        </div>
                    </div>
                    <input id="adminId" type="text" hidden>

                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mật khẩu </div>
                        <div class="mt-5" style="margin-top: 0rem !important;">
                            <div style="display: flex;">
                                <input id="passwordEdit" type="password" class="intro-y form-control py-3 px-4 box pr-10 passInput" placeholder="Nhập mật khẩu">
                                <button type="button" onclick="changeStatusPass()" style="width: 3rem;
                                border: 1px solid #d5d4d4;
                                border-radius: 5px;
                                background: #f1f1f1;">
                                    <i data-lucide="eye" class="block mx-auto"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Hủy</button>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-20" data-tw-toggle="modal" data-tw-target="#update-success-confirmation-modal" onclick="updateAdmin()">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Add new category Modal -->

    <div id="save-success-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5" style="font-size: 26px !important">Lưu thành công</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="window.location.reload()">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="update-success-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5" style="font-size: 26px !important">Cập nhật thành công</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="window.location.reload()">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5">Xóa tài khoản?</div>
                        <input id="postIdDelete" type="text" hidden>
                        <div class="text-slate-500 mt-2">
                            Bạn chắc chắn muốn xóa tài khoản này? 
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" data-tw-toggle="modal" data-tw-target="#delete-success-confirmation-modal">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="delete-success-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5" style="font-size: 26px !important">Xóa thành công</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="window.location.reload()">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function createAdmin(){
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('role', $('#roleAdd').val());
    formData.append('name', $('input[name="name"]').val());
    formData.append('email', $('input[name="email"]').val());
    formData.append('password', $('input[name="password"]').val());

    jQuery.ajax({
        url: '{{ route('admin.registerAdmin') }}', 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            
        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
}

function updateAdmin(){
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('adminId', $('#adminId').val());
    formData.append('role', $('#roleEdit').val());
    formData.append('name', $('#nameEdit').val());
    formData.append('email', $('#emailEdit').val());
    formData.append('password', $('#passwordEdit').val());
    console.log(formData);

    jQuery.ajax({
        url: '{{ route('admin.updateAdmin') }}', 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {

        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
}

function editAdmin(admin){
    if (admin.roles[0] && admin.roles[0].name) {
        $('#roleEdit').val(admin.roles[0].name);
    }
    $('#adminId').val(admin.id);
    $('#nameEdit').val(admin.name);
    $('#emailEdit').val(admin.email);
}

function changeStatusPass(){
    if ($('.passInput').attr('type') == 'password') {
        $('.passInput').attr('type', 'text');
    } else{
        $('.passInput').attr('type', 'password');
    }
}

function deleteAdmin(adminId){
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('adminId', adminId);

    jQuery.ajax({
        url: '{{ route('admin.deleteAdmin') }}', 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {

        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
}
</script>
@endsection