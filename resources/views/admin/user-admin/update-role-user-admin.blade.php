@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý vai trò'
    ])
    <!-- END: Top Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cập nhật vai trò
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0" onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="corner-up-left" data-lucide="corner-up-left" class="lucide lucide-corner-up-left block mx-auto"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 00-4-4H4"></path></svg>Quay lại </button>

            <div class="dropdown">
                <button class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="modal" data-tw-target="#update-role-success-confirmation-modal" onclick="submitRole()"> Lưu </button>
            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div id="alertValidate"></div>
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div id="contentTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên vai trò </div>
                            <div class="mt-5">
                                <input type="text" name="name" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên vai trò" value="{{ $role->name }}">
                            </div>
                        </div>

                    </div>                                   

                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-3">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center">
                                <input id="tickAll" name="all" type="checkbox" class="form-check-input border mr-2" onchange="tickAll()">
                                 Tất cả
                                </div>
                        </div>
                    </div>                                   
                </div>
            </div>
        </div>
        @foreach (\Spatie\Permission\Models\Permission::all() as $item)
        <div class="intro-y col-span-12 lg:col-span-3">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center">
                                <input name="{{ $item->name }}" type="checkbox" class="form-check-input border mr-2 checkboxRole" 
                                @if (in_array($item->name, $role->arrPermission))
                                    checked
                                @endif>
                                 {{ \App\Helper\Common::convertNamePermission( $item->name ) }}
                                </div>
                        </div>
                    </div>                                   
                </div>
            </div>
        </div>
        @endforeach

        <button id="alert-save-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#save-success-confirmation-modal"></button>
        
        <!-- END: Post Content -->
        <div id="update-role-success-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i> 
                            <div class="text-3xl mt-5" style="font-size: 26px !important">Cập nhật thành công</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="window.location.href= '{{ route('admin.listRole') }}'">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.partials.modal')
<script>

function tickAll() {
    allCheckbox = jQuery('.checkboxRole').toArray();

    if ($('#tickAll').is(':checked')) {
        allCheckbox.forEach(element => {
            element.checked = true;
        });
    } else {
        allCheckbox.forEach(element => {
            element.checked = false;
        });
    }
}

function submitRole() {
    allCheckbox = jQuery('.checkboxRole').toArray();

    let permission = [];

    allCheckbox.forEach(element => {
        if (element.checked) {
            permission.push(element.getAttribute('name'));
        }
    });

    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('name', $('input[name="name"]').val());
    formData.append('permission', permission);
    formData.append('roleId', {{ $role->id }});

    jQuery.ajax({
        url: '{{ route('admin.updateRole') }}', 
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
<!-- Call Ajax -->
@endsection