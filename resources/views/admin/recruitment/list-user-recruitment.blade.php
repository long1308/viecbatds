@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý tài khoản'
    ])
    <div id="alertCreateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Thêm mới thành công! </div>
    <div id="alertUpdateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Cập nhật thành công! </div>
    <div id="alertDeleteSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Xóa thành công! </div>
    <div id="alertPassSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Đổi mật khẩu thành công! </div>


    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách tài khoản
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a style="cursor: pointer;" onclick="openModal()"><button class="btn btn-primary shadow-md mr-2">Xóa mục đã chọn <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="trash"></i> </span></button></a>
            <button id="open-modal-check-delete" data-tw-toggle="modal" data-tw-target="#delete-select-confirmation-modal" hidden></button>
        </div>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2" style="justify-content: center;">
            <div class="col-span-3" style="margin-right: 20px; display: flex; width: 10vw;">
                <select data-placeholder="Chọn danh mục" class="tom-select w-full" name="filter">
                    <option value="default">-- Lọc --</option>
                    <option value="hot" @if (request()->input('filter') == 'hot') selected @endif>Nổi bật</option>
                    <option value="hidden" @if (request()->input('filter') == 'hidden') selected @endif>Đã khóa</option>
                    <option value="active" @if (request()->input('filter') == 'active') selected @endif>Hoạt động</option>
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
                    <option value="default">-- Lọc theo đối tượng --</option>
                    <option value="2" @if (request()->input('categoryId') == '2') selected @endif> Nhà tuyển dụng</option>
                    <option value="1" @if (request()->input('categoryId') == '1') selected @endif> Người tìm việc</option>
                    {{-- @php
                        $categoriesRecruitment = App\Models\CategoryRecruitment::where('parent_id', 0)->get();
                        // \App\Helper\Common::foreachCategories(categories: $categoriesRecruitment, categoryId: request()->input('categoryId') ?? null);
                    @endphp
                    @foreach ($categoriesRecruitment as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach --}}
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
                <a style="cursor: pointer;" onclick="window.location.href = window.location.pathname"><button type="button" class="btn btn-primary shadow-md mr-2" style="width: 10vw;">Làm mới <span class="w-5 h-5 flex items-center justify-center" style="margin-left: 5px;"> <i class="w-4 h-4" data-lucide="refresh-cw"></i> </span></button></a>
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
                        <th class="whitespace-nowrap">Tên tài khoản</th>
                        <th class="text-center whitespace-nowrap">Loại tài khoản</th>
                        <th class="text-center whitespace-nowrap">Nổi bật</th>
                        <th class="text-center whitespace-nowrap">Trạng thái</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                {{-- @dd($listPost->items()) --}}
                <tbody>
                    @foreach ($listUser->items() as $key => $item)
                    <tr class="intro-x">
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
                        <td title="{{ $item->name }}">
                            <a class="font-medium whitespace-nowrap" 
                            style="white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            width: 18vw;
                            display: block;" title="{{ $item->name }}"> {{ $item->username }}</a> 
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5" style="white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            width: 18vw;
                            display: block;" >
                                {{ $item->name }}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            @if ($item->role == 2)
                            Nhà tuyển dụng
                            @else
                            Người tìm việc
                            @endif
                        </td>
                        <td style="width: 20px;">
                            <div class="form-check form-switch flex flex-col items-start mt-3">
                                <input id="post-form-5" name="hot" class="form-check-input hotInput" type="checkbox" @if($item->hot == 1) onchange="changeHot({{ $item->id }}, 0)" checked @else onchange="changeHot({{ $item->id }}, 1)" @endif>
                            </div>
                        </td>
                        <td class="w-40">
                            @if ($item->active)
                            <div class="flex items-center justify-center text-success" style="cursor: pointer;" onclick="switchStatus($('#idHidden').val({{ $item->id }}))" data-tw-toggle="modal" data-tw-target="#hidden-post-recruitment-confirmation-modal"> <i data-lucide="eye" class="block mx-auto" style="margin: 5px;"></i> <p>Hoạt động</p> </div>
                            @else
                            <div class="flex items-center justify-center text-danger" style="cursor: pointer;" onclick="changeStatus({{ $item->id }}, 1)"> <i data-lucide="lock" class="block mx-auto" style="margin: 5px;"></i> <p>Đã khóa</p> </div>
                            @endif
                        </td>
                        <td class="table-report__action w-56" style="width: 275px;">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary" onclick="fillData({{ $item->id }}, '{{ $item->name }}', '{{ $item->username }}')" data-tw-toggle="modal" data-tw-target="#reset-pass-modal" style="cursor: pointer;"> <i data-lucide="rotate-cw" class="w-4 h-4 mr-1"></i> Reset mật khẩu </a>
                                <a class="flex items-center mr-3" href="{{ route('admin.editProfileRecruitment', ['id' => $item->id]) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                {{-- <a class="flex items-center mr-3 text-dark" target="_blank" href="{{ route('postRecruitmentDetail', ['slug' => $item->slug]) }}"> <i data-lucide="send" class="w-4 h-4 mr-1"></i> Chi tiết </a> --}}
                                <a class="flex items-center text-danger" style="cursor: pointer;" onclick="deletePostConfirm({{ $item->id }})" data-tw-toggle="modal" data-tw-target="#delete-post-recruitment-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div id="reset-pass-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="text-3xl mt-5" style="padding: 15px 15px;
                        font-weight: 500;
                        font-size: 20px;">Đặt lại mật khẩu</div>

                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên </div>
                            <div class="mt-5" style="margin-top: 0rem !important;">
                                <input id="nameReset" name="nameReset" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên thành viên" disabled>
                            </div>
                        </div>
    
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên đăng nhập </div>
                            <div class="mt-5" style="margin-top: 0rem !important;">
                                <input id="usernameReset" name="usernameReset" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập email" disabled>
                            </div>
                        </div>
    
                        <input id="idReset" name="idReset" type="text" hidden>

                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Đổi mật khẩu </div>
                            <div class="mt-5" style="margin-top: 0rem !important;">
                                <div style="display: flex;">
                                    <input id="passInput" name="passwordReset" autocomplete="new-password" type="password" class="intro-y form-control py-3 px-4 box pr-10 passInput" placeholder="Nhập mật khẩu">
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
                            <button type="button" class="btn btn-primary w-20" onclick="changePass()">Đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            @if ($listUser->total() > $listUser->perPage())
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => '1'])) }}"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                    </li>

                    <li class="page-item"> <a class="page-link" >...</a> </li>
                    @if ($listUser->currentPage() == 1)
                        @for ($i = $listUser->currentPage(); $i <= $listUser->currentPage() + 2; $i++)
                            @if ($i >= 1 && $i <= $listUser->lastPage())
                            <li @if ($i == $listUser->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => $i])) }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @elseif($listUser->currentPage() == $listUser->lastPage())
                        @for ($i = $listUser->currentPage() - 2; $i <= $listUser->currentPage(); $i++)
                            @if ($i >= 1 && $i <= $listUser->lastPage())
                            <li @if ($i == $listUser->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => $i])) }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @else
                        @for ($i = $listUser->currentPage() - 1; $i <= $listUser->currentPage() + 1; $i++)
                            @if ($i >= 1 && $i <= $listUser->lastPage())
                            <li @if ($i == $listUser->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => $i])) }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @endif
                    <li class="page-item"> <a class="page-link">...</a> </li>

                    <li class="page-item">
                        <a class="page-link" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),  ['page' => $listUser->lastPage()])) }}"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                    </li>
                </ul>
            </nav>
            <p style="margin-right: 25px;">Trang  {{ $listUser->currentPage() }} / {{ $listUser->lastPage() }}</p>
            @endif
        </div>
        <!-- END: Pagination -->
    </div>
    
    @include('admin.partials.modal')

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-post-recruitment-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5">Xóa tài khoản này?</div>
                        <input id="postIdDelete" type="text" hidden>
                        <div class="text-slate-500 mt-2">
                            Lưu ý: Sẽ xóa toàn bộ bài viết của tài khoản này
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
    <div id="hidden-post-recruitment-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="lock" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Khóa tài khoản này?</div>
                        <input id="idHidden" type="hidden" name="idHidden">
                        <div class="text-slate-500 mt-2">
                            Lưu ý: Sẽ ẩn toàn bộ bài viết của tài khoản này
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="changeStatus($('#idHidden').val(), 0)">Khóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

$(document).ready(function(){
    if (localStorage.getItem('changePassSuccess')) {
        $('#alertPassSuccess').css('display', 'flex');
        localStorage.removeItem('changePassSuccess');
    }
});

function changeStatusPass(){
    if ($('.passInput').attr('type') == 'password') {
        $('.passInput').attr('type', 'text');
    } else{
        $('.passInput').attr('type', 'password');
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

function fillData(id, name, username) {
    $('#nameReset').val(name)
    $('#usernameReset').val(username)
    $('#idReset').val(id)
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

function changePass() {
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('userId', $('#idReset').val());
    formData.append('password', $('#passInput').val());

    jQuery.ajax({
        url: `{{ route('admin.changePassUserRecruitment') }}`, 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            localStorage.setItem('changePassSuccess', true);
            window.location.reload();
            jQuery('html, body').scrollTop(0);
        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
}

function changeStatus(userId, status) {
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('userId', userId);
    formData.append('status', status);

    jQuery.ajax({
        url: `{{ route('admin.changeStatusUserRecruitment') }}`, 
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

function changeHot(userId, hot) {
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('userId', userId);
    formData.append('hot', hot);

    jQuery.ajax({
        url: `{{ route('admin.changeHotUserRecruitment') }}`, 
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
    formData.append('userId', listDelete);

    jQuery.ajax({
        url: `{{ route('admin.deleteUserRecruitment') }}`, 
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