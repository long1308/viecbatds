@extends('admin.master')
@section('content')
<div class="content">
        <!-- BEGIN: Top Bar -->
    @if($type == config('constant.type-recruitment.category'))
        @include('admin.partials.topbar', [
            'titleTab' => 'Quản lý ngành nghề tuyển dụng'
        ])
    @elseif($type == config('constant.type-recruitment.position'))
        @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý vị trí tuyển dụng'
        ])
    @endif
    <div id="alertCreateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Thêm mới thành công! </div>
    <div id="alertUpdateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Cập nhật thành công! </div>
    <div id="alertDeleteSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Xóa thành công! </div>

    <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10">
            @if($type == config('constant.type-recruitment.category'))
                Quản lý ngành nghề tuyển dụng
            @elseif($type == config('constant.type-recruitment.position'))
                Quản lý vị trí tuyển dụng
            @endif
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                <a href="{{ route('admin.addRecruitment', ['type' => $type]) }}"><button class="btn btn-primary shadow-md mr-2">Thêm mới <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span></button></a>

                <div class="hidden md:block mx-auto text-slate-500"></div>
                <style>
                    /*@media (min-width: 640px)*/
                    button.btn.box.mr-2.flex.items-center.ml-auto.sm\:ml-0 {
                        margin-left: auto !important;
                    }
                </style>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0" onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="corner-up-left" data-lucide="corner-up-left" class="lucide lucide-corner-up-left block mx-auto"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 00-4-4H4"></path></svg>Quay lại </button>
                    </div>
                </div>

            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Tên</th>
                        <th class="text-center whitespace-nowrap">Thứ tự</th>
                        <th class="text-center whitespace-nowrap">Nổi bật</th>
                        @if ($type == config('constant.type-recruitment.category'))
                        <th class="text-center whitespace-nowrap">Trạng thái</th>
                        @endif
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($listRecruitment)>0)
                        @foreach($listRecruitment as $item)
                        <tr class="intro-x">
                            <td>
                                {{-- <i @if(count($item->childs)>0) data-lucide="folder" @else data-lucide="file-minus" @endif class="block mx-auto" style="margin: 0px;"></i> --}}
                                <i data-lucide="layers" class="block mx-auto" style="margin: 0px;"></i>
                            </td>
                            <td style="font-weight: bold;">
                                {{ $item->name }}
                            </td>
                            <td style="text-align: center;">
                                <div style="display: flex; justify-content: center;">
                                    <input type="number" value="{{ $item->order }}" onblur="updateOrderRecruitment({{  $item->id }}, this)" onkeypress="handleKeyPress(event, {{  $item->id }}, this)" style="width: 65px;">
                                </div>
                            </td>
                            @if ($type == config('constant.type-recruitment.category'))
                            <td class="w-40" style="width: 20px;">
                                {{-- @if($item->hot == 1)
                                    <div class="flex items-center justify-center text-success"style="cursor: pointer;" onclick="changeHot({{ $item->id }}, 0)"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Nổi bật</div>
                                @else
                                    <div class="flex items-center justify-center text-primary"style="cursor: pointer;" onclick="changeHot({{ $item->id }}, 1)"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Bình thường </div>
                                @endif --}}
                                <div class="form-check form-switch flex flex-col items-start mt-3">
                                    <input id="post-form-5" name="hot" class="form-check-input hotInput" type="checkbox" @if($item->hot == 1) onchange="changeHot({{ $item->id }}, 0)" checked @else onchange="changeHot({{ $item->id }}, 1)" @endif>
                                </div>                                  
                            </td>
                            @endif
                            <td class="w-40">
                                @if ($type == config('constant.type-recruitment.category'))
                                    @if($item->active == 1)
                                        <div class="flex items-center justify-center text-success" style="cursor: pointer;" onclick="switchStatus($('#idHidden').val('{{ $item->id }}'))" data-tw-toggle="modal" data-tw-target="#hidden-recruitment-confirmation-modal"> <i data-lucide="eye" class="w-4 h-4 mr-2"></i> Hiển thị</div>
                                    @else
                                        <div class="flex items-center justify-center text-danger" style="cursor: pointer;" onclick="changeStatus({{ $item->id }}, 1)"> <i data-lucide="eye-off" class="w-4 h-4 mr-2"></i> Ẩn </div>
                                    @endif
                                @else
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="eye" class="w-4 h-4 mr-2"></i> Hiển thị</div> 
                                @endif      
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    {{-- <a class="flex items-center mr-3 text-primary" href="{{ route('admin.addRecruitment', ['type' => $type]) }}" data-tw-toggle="modal" data-tw-target="#add-modal"> <i data-lucide="plus" class="block mx-auto"></i>  Thêm </a> --}}
                                    <a class="flex items-center mr-3" href="{{ route('admin.editRecruitment', ['type' => $type]) }}?id={{ $item->id }}" data-tw-toggle="modal" data-tw-target="#edit-modal"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" onclick="idRecruitment({{ $item->id }})"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
        </div>
        <!-- BEGIN: Delete Confirmation Modal -->
        <button id="alert-delete-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#delete-success-modal"></button>

        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bạn có chắc chắn muốn xóa?</div>
                            {{-- <div class="text-slate-500 mt-2">
                                Lưu ý: Khi xóa thì danh mục sẽ bị xóa và các danh mục con sẽ bị xóa theo.
                            </div> --}}
                            <input type="hidden" name="idRecruitment" value="">
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deleteRecruitment()">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
        <div id="hidden-recruitment-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bạn có chắc chắn muốn ẩn?</div>
                            <div class="text-slate-500 mt-2">
                                Lưu ý: Khi ẩn thì sẽ ẩn toàn bộ tin tuyển dụng thuộc ngành nghề này.
                            </div>
                            <input id="idHidden" type="hidden" name="idHidden">
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="changeStatus($('#idHidden').val(), 0)">Ẩn</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@include('admin.partials.modal')
<script>
    function idRecruitment(itemId) {
        $('input[name="idRecruitment"]').val(itemId);
    }
    function deleteRecruitment() {
        let idRecruitment = $('input[name="idRecruitment"]').val();

        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('idRecruitment', idRecruitment);
        formData.append('type', '{{ $type }}');

        jQuery.ajax({
            url: '{{ route('admin.deleteRecruitment') }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                localStorage.setItem('checkDeleteSuccess', true);
                window.location.reload();
                jQuery('html, body').scrollTop(0);
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
            }
        });
    }

    function handleKeyPress(event, itemId, inputElement) {
        if (event.keyCode === 13) {
            updateOrderRecruitment(itemId, inputElement);
        }
    }

    function updateOrderRecruitment(recruitmentId, orderInput) {
        let formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('recruitmentId', recruitmentId);
        formData.append('order', $(orderInput).val());
        formData.append('type', '{{ $type }}');

        jQuery.ajax({
            url: `{{ route('admin.updateOrderRecruitment') }}`, 
            method: 'POST', 
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                window.location.reload();
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });
    }

    function changeStatus(id, active) {
        let formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('id', id);
        formData.append('active', active);
        formData.append('type', '{{ $type }}');

        jQuery.ajax({
            url: `{{ route('admin.changeStatusRecruitment') }}`, 
            method: 'POST', 
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                window.location.reload();
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });
    }

    function changeHot(id, hot) {
        let formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('id', id);
        formData.append('hot', hot);
        formData.append('type', '{{ $type }}');

        jQuery.ajax({
            url: `{{ route('admin.changeHotRecruitment') }}`, 
            method: 'POST', 
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
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
