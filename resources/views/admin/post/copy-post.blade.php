@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý bài viết'
    ])
    <!-- END: Top Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Sao chép bài viết
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

            <a href="{{ route('admin.post') }}">
                <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-lucide="book-open"></i> Danh sách bài viết </button>
            </a>
            <div class="dropdown">
                <button id="submitData" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown" onclick="submitPost('redirectListPost')"> Thêm </button>

            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div id="alertValidate"></div>
            <div class="post intro-y overflow-hidden box mt-5">
                <ul class="post__tabs nav nav-tabs flex-col sm:flex-row bg-slate-200 dark:bg-darkmode-800" role="tablist">
                    <li class="nav-item">
                        <button title="Nội dung" onclick="switchTab(1)" data-tw-toggle="tab" data-tw-target="#content" class="nav-link tooltip w-full sm:w-40 py-4 active" id="content-tab" role="tab" aria-controls="content" aria-selected="true"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Nội dung </button>
                    </li>
                    <li class="nav-item">
                        <button title="Ảnh" onclick="switchTab(2)" data-tw-toggle="tab" data-tw-target="#keywords" class="nav-link tooltip w-full sm:w-40 py-4" id="image-tab" role="tab" aria-selected="false"><i data-lucide="image" class="block mx-auto" style="margin: 0px 5px; padding: 3.5px;"></i>  Ảnh </button>
                    </li>
                    <li class="nav-item">
                        <button title="Seo" onclick="switchTab(3)" data-tw-toggle="tab" data-tw-target="#meta-title" class="nav-link tooltip w-full sm:w-40 py-4" id="seo-tab" role="tab" aria-selected="false"> <i data-lucide="code" class="w-4 h-4 mr-2"></i> Seo </button>
                    </li>
                </ul>

                <div class="post__content tab-content">
                    <div id="contentTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên bài viết </div>
                            <div class="mt-5">
                                <input name="name" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên bài viết" value="{{ $post->name }}" onkeyup="renderData(this)">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Slug </div>
                            <div class="mt-5">
                                <input id="slug" name="slug" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập slug" value="{{ $post->key->slug }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mô tả ngắn </div>
                            <div class="mt-5">
                                <textarea name="description" id="description" rows="5" style="width: 100%;">{{ $post->description }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Nội dung bài viết </div>
                            <div class="mt-5">
                                <textarea id="contentMain" name="content" class="form-control my-editor">{!! $post->content !!}</textarea>     
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5" style="position: sticky;">
                                Mục lục bài viết
                                <button class="btn btn-primary shadow-md mr-2" style="right: 0; position: absolute;" type="button" data-tw-toggle="modal" data-tw-target="#save-post-confirmation-modal">
                                    Thêm mục lục <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                                </button>
                            </div>
                            <div class="mt-5">
                                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                                    <table class="table table-report -mt-2">
                                        <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">STT</th>
                                                <th class="whitespace-nowrap">Danh mục</th>
                                                <th class="text-center whitespace-nowrap">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="intro-x">
                                                <td></td>
                                                <td><p>Chưa có mục lục</p></td>
                                                <td></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div id="imageTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab" style="display: none;">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Ảnh đại diện </div>
                            <div class="mt-5">
                                <div class="mt-3">
                                    {{-- <label class="form-label">Ảnh đại diện</label> --}}
                                    <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4" style="width: 35%">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                @if (!$post->avatar_path)
                                                <div id="imagePreview" onclick="jQuery('#imageUpload').click()">
                                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg">
                                                </div>
                                                @else
                                                <div id="imagePreview">
                                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="{{ asset($post->avatar_path)}}">
                                                </div>
                                                <div title="Xóa ảnh này?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="deleteImg()"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1"> Tải lên một ảnh </span>
                                            <input id="imageUpload" type="file" class="w-full h-full top-0 left-0 absolute opacity-0" style="cursor: pointer;" accept="image/*" onchange="previewImage(this)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="seoTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab" style="display: none;">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Title seo </div>
                            <div class="mt-5">
                                <input id="titleSeo" name="titleSeo" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập title seo" value="{{ $post->title_seo }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Từ khóa seo </div>
                            <div class="mt-5">
                                <input id="keywordSeo" name="keywordSeo" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập từ khóa seo" value="{{ $post->keyword_seo }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mô tả seo </div>
                            <div class="mt-5">
                                <textarea name="descriptionSeo" id="descriptionSeo" style="width: 100%;" cols="30" rows="5" placeholder="Nhập mô tả seo">{{ $post->description_seo }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mã Schema </div>
                            <div class="mt-5">
                                <textarea name="schema" id="schema" style="width: 100%;" cols="30" rows="5" placeholder="Nhập mã schema">{{ $post->schema_code }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <style>
            #titleParagaph{
                white-space: nowrap;        
                overflow: hidden;           
                text-overflow: ellipsis;    
                width: 215px;      
            }
            @media (min-width: 992px){
                #add-paragagh-modal .modal-dialog {
                    width: 60%;
                }

                #edit-paragagh-modal .modal-dialog {
                    width: 60%;
                }
            }
        </style>
        <!-- END: Post Content -->

        <button id="alert-update-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#update-success-confirmation-modal"></button>

        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                <div>
                    <label class="form-label">Được viết bởi</label>
                    <div class="dropdown">
                        <div class="dropdown-toggle btn w-full btn-outline-secondary dark:bg-darkmode-800 dark:border-darkmode-800 flex items-center justify-start" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            
                            <div class="truncate">{{ $post->admin->name }}</div>
                           
                        </div>                       
                    </div>
                </div>
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <p>Sửa lần cuối cùng vào {{ $post->updated_at->format('H:i d/m/Y') }}</p>
                </div>
                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Ngày đăng</label>
                    <input name="datePublish" type="text" class="datepicker-personal" style="width: 100%;" @if (isset($post->published_at))
                    value="{{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}" 
                    @else
                    value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}"
                    @endif>
                </div>
                <div class="mt-3">
                    <label for="post-form-3" class="form-label">Danh mục</label>
                    <select data-placeholder="Chọn danh mục" class="tom-select w-full" name="category">
                        @if (!isset($post->category->id))
                        <option value=""></option>
                        @endif
                        @php
                            $categories = App\Models\Category::where('parent_id', 0)->get();
                            \App\Helper\Common::foreachCategories(categories: $categories, categoryId: $post->category->id ?? 0);
                        @endphp
                    </select>
                </div>
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-5" class="form-check-label ml-0 mb-2">Nổi bật</label>
                    <input id="post-form-5" name="hot" class="form-check-input" type="checkbox" @if ($post->hot) checked @endif>
                </div>
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-6" class="form-check-label ml-0 mb-2">Hiển thị</label>
                    <input id="post-form-6" name="active" class="form-check-input" type="checkbox" @if ($post->active) checked @endif>
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
    </div>

    @if (count($post->comments) > 0)
    <div class="intro-y col-span-12 lg:col-span-8">
        <div class="post intro-y overflow-hidden box mt-5">
            <h2 style="margin-top: 20px;
                        font-size: 17px;
                        font-weight: 500;
                        padding: 1.25rem;">
                    Danh sách bình luận
                </h2>

                <div id="commentTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr style="background: #fff;">
                                    <th class="whitespace-nowrap">STT</th>
                                    <th class="whitespace-nowrap">Email</th>
                                    <th class="whitespace-nowrap">Nội dung bình luận</th>
                                    <th class="whitespace-nowrap">Đánh giá</th>
                                    <th class="text-center whitespace-nowrap">Trạng thái</th>
                                    <th class="text-center whitespace-nowrap">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post->comments as $key => $item)
                                <tr class="intro-x">
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="w-40">
                                        <p>{{ $item->email }}</p>
                                    <td>
                                        <p>{{ $item->content }}</p>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="flex items-center">
                                                @for ($i = 0; $i < $item->star; $i++)
                                                <i data-lucide="star" class="text-pending fill-pending/30 w-4 h-4 mr-1"></i> 
                                                @endfor
                                                @for ($i = 0; $i < 5 - $item->star; $i++)
                                                <i data-lucide="star" class="text-slate-400 fill-slate/30 w-4 h-4 mr-1"></i> 
                                                @endfor 
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-40">
                                        @if ($item->active == 1)
                                        <div class="flex items-center justify-center text-success" onclick="switchStatusComment({{ $item->id }}, 0)" style="cursor: pointer;"> <i data-lucide="eye" class="w-4 h-4 mr-2"></i> Hiển thị </div>
                                        @else
                                        <div class="flex items-center justify-center text-danger" onclick="switchStatusComment({{ $item->id }}, 1)" style="cursor: pointer;"> <i data-lucide="eye-off" class="w-4 h-4 mr-2"></i> Ẩn </div>
                                        @endif
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center text-danger" onclick="deleteCommentPost({{ $item->id }})" style="cursor: pointer;" data-tw-toggle="modal" data-tw-target="#delete-comment-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-comment-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5">Xóa bình luận?</div>
                        <input id="commentIdDelete" type="text" hidden>
                        <div class="text-slate-500 mt-2">
                            Bạn chắc chắn muốn xóa bình luận này? 
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deleteComment()">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
    @endif
<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-paragraph-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                    <div class="text-3xl mt-5">Xóa mục lục?</div>
                    <input id="paragraphIdDelete" type="text" hidden>
                    <div class="text-slate-500 mt-2">
                        Bạn chắc chắn muốn xóa mục lục này? 
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deleteParagraph()">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->
@include('admin.partials.modal')
<script>
$(document).ready(function() {
    jQuery('.datepicker-personal').datepicker({
        dateFormat: "dd/mm/yy", 
        dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"], 
        monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        monthNamesShort: ["Thg 1", "Thg 2", "Thg 3", "Thg 4", "Thg 5", "Thg 6", "Thg 7", "Thg 8", "Thg 9", "Thg 10", "Thg 11", "Thg 12"], 
        firstDay: 1, 
        closeText: "Đóng", 
        prevText: "&#x3C;Trước", 
        nextText: "Tiếp&#x3E;",
        currentText: "Hôm nay", 
    });
});

function checkSlug(checkModal) {
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('slug', $('#slug').val());

    jQuery.ajax({
        url: '{{ route('admin.checkKey') }}', 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            sendSubmit(checkModal);
        },
        error: function(error) {
            alert = renderAlert(alertText.slugDuplicate);
            $('#alertValidate').html(alert);
            jQuery('html, body').scrollTop(0);
            return false;
        }
    });
}

function submitPost(checkModal) {
    let content = tinymce.get('contentMain').getContent();


    if (!validateRequire(content)) {
        return;
    }

    if (!checkSlug(checkModal)) {
        return;
    }

    checkSlug(checkModal);
}

function sendSubmit(checkModal)
{
    let content = tinymce.get('contentMain').getContent();

    if ($('input[name="active"]').is(":checked") == true) {
        active = 1;
    } else {
        active = 0;
    }

    if ($('input[name="hot"]').is(":checked") == true) {
        hot = 1;
    } else {
        hot = 0;
    }

    let imageInput = jQuery('#imageUpload')[0].files[0];

    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('name', $('input[name="name"]').val());
    formData.append('slug', $('#slug').val());
    formData.append('avatar', imageInput);
    formData.append('hot', hot);
    formData.append('active', active);
    formData.append('description', $('#description').val());
    formData.append('content', content);
    formData.append('category_id', $('select[name="category"]').val());
    formData.append('admin_id', {{ Auth::guard('admin')->user()->id }});
    formData.append('keyword_seo', $('input[name="keywordSeo"]').val());
    formData.append('title_seo', $('input[name="titleSeo"]').val());
    formData.append('description_seo', $('#descriptionSeo').val());
    formData.append('published_at', $('input[name="datePublish"]').val());
    formData.append('schema_code', $('#schema').val());


    jQuery.ajax({
        url: '{{ route('admin.createPost') }}', 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            console.log(checkModal);
            if (checkModal == 'redirectListPost') {
                localStorage.setItem('checkCreateSuccess', true);
                window.location.href = '{{ route('admin.post') }}';
            }

            if (checkModal == 'redirectEditPost') {
                redirectEditPost(response.data.id);
            }
        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
}

function redirectEditPost(idPost){
    window.location.href = '{{ route('admin.post') }}' + '/edit-post/' + idPost ;
}

function redirectListPost(){
    window.location.href = '{{ route('admin.post') }}';
    return;
}
</script>

@endsection