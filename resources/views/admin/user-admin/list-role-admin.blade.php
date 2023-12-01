@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý header'
    ])
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Quản lý vai trò
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @checkPermission('create-role')
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add-modal" onclick="window.location.href = '{{ route('admin.role') }}'">Thêm mới <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span></button>
        </div>
        @endcheckPermission
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Vai trò</th>
                        <th class="text-center whitespace-nowrap">Số lượng quyền</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $item)
                    <tr class="intro-x">
                        <td>
                            {{ $key + 1 }} 
                        </td>
                        <td>
                            {{ $item->name }} 
                        </td>
                        <td style="text-align: center;">
                            {{ $item->countPermission }}
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @checkPermission('edit-role')
                                <a class="flex items-center mr-3" href="{{ route('admin.editRole', ['roleId' => $item->id]) }}" data-tw-toggle="modal" data-tw-target="#edit-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                @endcheckPermission
                                @checkPermission('delete-role')
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" onclick="$('#roleId').val('{{ $item->id }}')"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
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
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5">Xóa vai trò?</div>
                        <input id="postIdDelete" type="text" hidden>
                        <div class="text-slate-500 mt-2">
                            Bạn chắc chắn muốn xóa vai trò này? 
                        </div>
                        <input id="roleId" type="text" hidden>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" data-tw-toggle="modal" data-tw-target="#delete-success-confirmation-modal" onclick="deleteRole()">Xóa</button>
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
    <!-- END: Delete Confirmation Modal -->
</div>

<script>
function deleteRole(){
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('roleId', $('#roleId').val());

    jQuery.ajax({
        url: '{{ route('admin.deleteRole') }}', 
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