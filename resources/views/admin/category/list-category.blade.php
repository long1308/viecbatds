@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý danh mục'
    ])
    <div id="alertCreateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Thêm mới thành công! </div>
    <div id="alertUpdateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Cập nhật thành công! </div>
    <div id="alertDeleteSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Xóa thành công! </div>

    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        {{ $nameParent->name ?? "Danh sách danh mục bài viết" }}
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            @checkPermission('create-category')
            <a href="{{ route('admin.addCategory') }}?parent_id={{ request('parent_id') ?? 0 }}"><button class="btn btn-primary shadow-md mr-2">Thêm danh mục mới <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span></button></a>
            @endcheckPermission
            {{-- <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
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
                        <th class="whitespace-nowrap">Tên danh mục</th>
{{--                        <th class="text-center whitespace-nowrap">Trạng thái</th>--}}
                        <th class="text-center whitespace-nowrap">Thứ tự</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($listCategory) && count($listCategory)>0)
                    @foreach ($listCategory as $key => $item)
                    <tr class="intro-x">
                        <td>
                            @if(count($item->childs)>0)
                            <i data-lucide="folder" class="block mx-auto" style="margin: 0px;"></i>
                            @else
                            <i data-lucide="file-minus" class="block mx-auto" style="margin: 0px;"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.category') }}?parent_id={{ $item->id }}" class="font-medium whitespace-nowrap">{{ $item->name }}</a>
                        </td>
                        <td style="text-align: center;">
                            <input type="number" value="{{ $item->order }}" onblur="updateOrderCategory({{  $item->id }}, this)" onkeypress="handleKeyPress(event, {{  $item->id }}, this)" style="width: 55px;">
                        </td>
                        {{--<td class="w-40">
                            <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i></div>
                        </td>--}}
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @checkPermission('create-category')
                                <a class="flex items-center mr-3 text-primary" href="{{ route('admin.addCategory') }}?parent_id={{ $item->id }}" data-tw-toggle="modal" data-tw-target="#new-category-modal"> <i data-lucide="plus" class="block mx-auto"></i>  Thêm </a>
                                @endcheckPermission
                                @checkPermission('edit-category')
                                <a class="flex items-center mr-3" href="{{ route('admin.editCategory', ['id'=> $item->id]) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                @endcheckPermission
                                @checkPermission('delete-category')
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" onclick="categoryId({{ $item->id }})"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                                @endcheckPermission
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                    </li>
                    <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                    <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div> --}}
        <!-- END: Pagination -->
    </div>

    {{--
    <!-- BEGIN: Add new category Modal -->
    <div id="new-category-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="text-3xl mt-5" style="padding: 15px 15px;
                    font-weight: 500;
                    font-size: 20px;">Thêm danh mục mới</div>
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5" style="border-bottom-width: 0px !important;"> Danh mục cha </div>
                        <div id="basic-select" class="p-5" style="padding: 0px;">
                            <div class="preview">
                                <!-- BEGIN: Basic Select -->
                                <div>
                                    <div class="mt-2">
                                        <select data-placeholder="Chọn danh mục" class="tom-select w-full">
                                            <option value="1">Xã hội</option>
                                            <option value="2">Cuộc sống</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- END: Basic Select -->
                            </div>
                        </div>
                    </div>

                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên danh mục </div>
                        <div class="mt-5" style="margin-top: 0rem !important;">
                            <input type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên danh mục">
                        </div>
                    </div>
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Slug </div>
                        <div class="mt-5" style="margin-top: 0rem !important;">
                            <input type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập slug">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Hủy</button>
                        <button type="button" class="btn btn-primary w-20">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Add new category Modal -->
    --}}

    <!-- BEGIN: Delete Confirmation Modal -->
    <button id="alert-delete-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#delete-success-modal"></button>

    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bạn có chắc chắn muốn xóa?</div>
                        <div class="text-slate-500 mt-2">
                            Lưu ý: Khi xóa thì danh mục sẽ bị xóa và các danh mục con sẽ bị xóa theo.
                        </div>
                        <input type="hidden" name="idCategory" value="">
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deleteCategory()">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>
@include('admin.partials.modal')
<script>
    function categoryId(itemId) {
       $('input[name="idCategory"]').val(itemId);
    }
    function deleteCategory(button) {
        var idCategory = $('input[name="idCategory"]').val();
        var formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('id', idCategory);

        jQuery.ajax({
            url: '{{ route('admin.deleteCategory') }}',
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

    function redirectList(){
        window.location.href = '{{ route('admin.category') }}';
        return;
    }

    function handleKeyPress(event, itemId, inputElement) {
    if (event.keyCode === 13) {
        updateOrderCategory(itemId, inputElement);
    }
}

function updateOrderCategory(categoryId, orderInput) {
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('categoryId', categoryId);
    formData.append('order', $(orderInput).val());

    jQuery.ajax({
        url: `{{ route('admin.updateOrderCategory') }}`, 
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
