@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý bài viết'
    ])
    <div id="alertCreateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Thêm mới thành công! </div>
    <div id="alertUpdateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Cập nhật thành công! </div>
    <div id="alertDeleteSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Xóa thành công! </div>

    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách bài viết
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            @checkPermission('create-post')
            <a href="{{ route('admin.addPost') }}"><button class="btn btn-primary shadow-md mr-2">Thêm bài viết mới <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span></button></a>
            @endcheckPermission
            @checkPermission('delete-post')
            <a style="cursor: pointer;" onclick="openModal()"><button class="btn btn-primary shadow-md mr-2">Xóa mục đã chọn <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="trash"></i> </span></button></a>
            @endcheckPermission
            <button id="open-modal-check-delete" data-tw-toggle="modal" data-tw-target="#delete-select-confirmation-modal" hidden></button>
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
        </div>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2" style="justify-content: center;">
            <div class="col-span-3" style="margin-right: 20px; display: flex; width: 10vw;">
                <select data-placeholder="Chọn danh mục" class="tom-select w-full" name="filter">
                    <option value="default">-- Lọc --</option>
                    <option value="hot" @if (request()->input('filter') == 'hot') selected @endif>Nổi bật</option>
                    <option value="hidden" @if (request()->input('filter') == 'hidden') selected @endif>Ẩn</option>
                    <option value="active" @if (request()->input('filter') == 'active') selected @endif>Hiển thị</option>
                </select>
            </div>

            <div class="col-span-3" style="margin-right: 20px; display: flex; width: 15vw;">
                <select data-placeholder="Chọn danh mục" class="tom-select w-full" name="sort">
                    <option value="default">-- Sắp xếp theo --</option>
                    <option value="asc" @if (request()->input('sort') == 'asc') selected @endif>Ngày tạo tăng dần</option>
                    <option value="desc" @if (request()->input('sort') == 'desc') selected @endif>Ngày tạo giảm dần</option>
                </select>
            </div>

            <div style="width: 20%; margin-right: 20px; display: flex;">
                <select data-placeholder="Chọn danh mục" class="tom-select w-full" name="category">
                    <option value="default">-- Lọc theo danh mục --</option>
                    @php
                        $categories = App\Models\Category::where('parent_id', 0)->get();
                        \App\Helper\Common::foreachCategories(categories: $categories, categoryId: request()->input('categoryId') ?? null);
                    @endphp
                </select>
            </div>

            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0" style="margin-right: 20px;">
                <div class="w-56 relative text-slate-500">
                    <input name="search" type="text" class="form-control w-56 box pr-10" @if (request()->input('search')) value="{{ request()->input('search') }}" @endif placeholder="Tìm kiếm...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search" style="cursor: pointer;"></i> 
                </div>
            </div>

            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0" style="margin-right: 10px;">
                <a style="cursor: pointer;" onclick="filterPost()"><button type="button" class="btn btn-primary shadow-md mr-2" style="width: 10vw;">Tìm</button></a>
            </div>

            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="{{ route('admin.post') }}"><button type="button" class="btn btn-primary shadow-md mr-2" style="width: 10vw;">Làm mới <span class="w-5 h-5 flex items-center justify-center" style="margin-left: 5px;"> <i class="w-4 h-4" data-lucide="refresh-cw"></i> </span></button></a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        {{-- @dd($listPost->items()) --}}
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible" style="overflow: overlay;">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">
                            <input name="" type="checkbox" class="form-check-input border mr-2 checkbox-all" onchange="checkAll()" style="border-color: #babcc6">
                        </th>
                        <th class="whitespace-nowrap">Ảnh</th>
                        <th class="whitespace-nowrap">Tên bài viết</th>
                        <th class="text-center whitespace-nowrap">Bình luận</th>
                        <th class="text-center whitespace-nowrap">Danh mục</th>
                        <th class="text-center whitespace-nowrap">Thứ tự</th>
                        <th class="text-center whitespace-nowrap">Trạng thái</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listPost->items() as $key => $item)
                    <tr class="intro-x">
                        {{-- <td>
                           {{ $key + 1 + ( $listPost->currentPage() - 1 )*$listPost->perPage() }}
                        </td> --}}
                        <td> 
                            <input name="{{ $item->id }}" type="checkbox" class="form-check-input border mr-2 checkbox-delete" onchange="changeListDelete({{$item->id}}, this)" style="border-color: #babcc6"> 
                        </td>
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit" style="width: 5rem; height: 5rem;">
                                    <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" 
                                    @if (!$item->avatar_path)
                                        src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg"
                                    @else
                                        src="{{ asset($item->avatar_path) }}"
                                    @endif 
                                    title="{{ $item->name }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a class="font-medium whitespace-nowrap" 
                            style="white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            width: 20vw;
                            display: block;" title="{{ $item->name }}">{{ $item->name }}</a> 
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Tác giả: 
                            @if ($item->admin)
                                {{ $item->admin->name }}
                            @endif </div>
                        </td>
                        <td @if ($item->comments->where('active', 1)->count() == count($item->comments))
                            class="text-success"
                        @else
                            class="text-danger"
                        @endif>
                            <div style="display: flex; justify-content: center;">
                                {{ $item->comments->where('active', 1)->count() }}/{{ count($item->comments) }}
                            </div>
                        </td>
                        <td>
                            @if ($item->category)
                            <div style="display: flex; justify-content: center;">
                                {{ $item->category->name }}
                            </div>
                            @endif </a>
                        </td>
                        <td>
                            <div style="display: flex; justify-content: center;">
                                <input type="number" value="{{ $item->order }}" onblur="updateOrderPost({{  $item->id }}, this)" onkeypress="handleKeyPress(event, {{  $item->id }}, this)" style="width: 55px;">
                            </div>
                        </td>
                        <td class="w-40">
                            @if ($item->active)
                            <div class="flex items-center justify-center text-success" style="cursor: pointer;" onclick="switchStatus({{ $item->id }}, 0)" data-tw-toggle="modal" data-tw-target="#hidden-confirmation-modal"> <i data-lucide="eye" class="block mx-auto" style="margin: 5px;"></i> <p>Hiển thị</p> </div>
                            @else
                            <div class="flex items-center justify-center text-danger" style="cursor: pointer;" onclick="switchStatus({{ $item->id }}, 1)" data-tw-toggle="modal" data-tw-target="#display-confirmation-modal"> <i data-lucide="eye-off" class="block mx-auto" style="margin: 5px;"></i> <p>Ẩn</p> </div>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @checkPermission('create-post')
                                <a class="flex items-center mr-3" href="{{ route('admin.copyPost', ['id' => $item->id]) }}"> <i data-lucide="copy" class="w-4 h-4 mr-1"></i> Copy </a>
                                @endcheckPermission
                                @checkPermission('edit-post')
                                <a class="flex items-center mr-3" href="{{ route('admin.editPost', ['id' => $item->id]) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                @endcheckPermission
                                @checkPermission('delete-post')
                                <a class="flex items-center text-danger" style="cursor: pointer;" onclick="deletePostConfirm({{ $item->id }})" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                                @endcheckPermission
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            @if ($listPost->total() > $listPost->perPage())
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => '1'])) }}"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                    </li>

                    <li class="page-item"> <a class="page-link" >...</a> </li>
                    @if ($listPost->currentPage() == 1)
                        @for ($i = $listPost->currentPage(); $i <= $listPost->currentPage() + 2; $i++)
                            @if ($i >= 1 && $i <= $listPost->lastPage())
                            <li @if ($i == $listPost->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => $i])) }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @elseif($listPost->currentPage() == $listPost->lastPage())
                        @for ($i = $listPost->currentPage() - 2; $i <= $listPost->currentPage(); $i++)
                            @if ($i >= 1 && $i <= $listPost->lastPage())
                            <li @if ($i == $listPost->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => $i])) }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @else
                        @for ($i = $listPost->currentPage() - 1; $i <= $listPost->currentPage() + 1; $i++)
                            @if ($i >= 1 && $i <= $listPost->lastPage())
                            <li @if ($i == $listPost->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => $i])) }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @endif
                    <li class="page-item"> <a class="page-link">...</a> </li>

                    <li class="page-item">
                        <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => $listPost->lastPage()])) }}"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                    </li>
                </ul>
            </nav>
            <p style="margin-right: 25px;">Trang  {{ $listPost->currentPage() }} / {{ $listPost->lastPage() }}</p>
            @endif
        </div>
        <!-- END: Pagination -->
    </div>
    
    @include('admin.partials.modal')

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5">Xóa bài viết?</div>
                        <input id="postIdDelete" type="text" hidden>
                        <div class="text-slate-500 mt-2">
                            Bạn chắc chắn muốn xóa bài viết này? 
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deletePost()">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-select-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5">Xóa mục đã chọn?</div>
                        <input id="postIdDelete" type="text" hidden>
                        <div class="text-slate-500 mt-2">
                            Bạn chắc chắn muốn mục đã chọn? 
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deletePost()">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>
<script>
function checkAll() {
    if (jQuery('.checkbox-all').is(":checked")) {
        jQuery('.checkbox-delete').prop('checked', true)
        $('.checkbox-delete').each(function () {
            listDelete.push(jQuery(this).attr('name'));
        });
    } else {
        jQuery('.checkbox-delete').prop('checked', false)
        listDelete = [];
    }
}

function changeListDelete(idDelete, thisElement) {
    if ($(thisElement).is(":checked")) {
        listDelete.push(idDelete);
    } else {
        listDelete = listDelete.filter(function(item) {
            return item !== idDelete;
        });
    }
}

function openModal() {
    if (listDelete.length > 0) {
        jQuery('#open-modal-check-delete').click();
    }
}

var urlParams = new URLSearchParams(window.location.search);

function filterPost() {
    urlParams.delete('search');
    urlParams.delete('categoryId');
    urlParams.delete('sort');
    urlParams.delete('filter');

    if ($('input[name="search"]').val() != '') {
        urlParams.set('search', $('input[name="search"]').val());
    }

    if ($('select[name="category"]').val() != 'default') {
        urlParams.set('categoryId', $('select[name="category"]').val());
    }

    if ($('select[name="sort"]').val() != 'default') {
        urlParams.set('sort', $('select[name="sort"]').val());
    }

    if ($('select[name="filter"]').val() != 'default') {
        urlParams.set('filter', $('select[name="filter"]').val());
    }

    var newURL = window.location.pathname + '?' + urlParams.toString();

    window.location.href = newURL;
}

function handleKeyPress(event, itemId, inputElement) {
    if (event.keyCode === 13) {
        updateOrderPost(itemId, inputElement);
    }
}

function updateOrderPost(postId, orderInput) {
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('postId', postId);
    formData.append('order', $(orderInput).val());

    jQuery.ajax({
        url: `{{ route('admin.updateOrderPost') }}`, 
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

function changeActive(postId, status) {
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('postId', postId);
    formData.append('status', status);

    jQuery.ajax({
        url: `{{ route('admin.changeActivePost') }}`, 
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

function deletePostConfirm(postIdDelete){
    listDelete = [];
    listDelete.push(postIdDelete);
}

function deletePost(postIdDelete){

    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('postId', listDelete);

    jQuery.ajax({
        url: `{{ route('admin.deletePost') }}`, 
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
            return false;
        }
    });
}
</script>
@endsection