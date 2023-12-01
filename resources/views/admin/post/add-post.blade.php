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
            Thêm bài viết mới
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            {{-- <div class="dropdown mr-2">
                <button class="dropdown-toggle btn box flex items-center" aria-expanded="false" data-tw-toggle="dropdown"> English <i class="w-4 h-4 ml-2" data-lucide="chevron-down"></i> </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">English</span> </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">Indonesian</span> </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
            <a href="{{ route('admin.post') }}">
                <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-lucide="book-open"></i> Danh sách bài viết </button>
            </a>
            <div class="dropdown">
                <button id="submitData" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown" onclick="submitPost('redirectListPost')"> Lưu </button>
                {{-- <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> As New Post </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> As Draft </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Word </a>
                        </li>
                    </ul>
                </div> --}}
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
                                <input type="text" name="name" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên bài viết" onkeyup="renderData(this)" required>
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Slug </div>
                            <div class="mt-5">
                                <input id="slug" name="slug" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập slug">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mô tả ngắn </div>
                            <div class="mt-5">
                                <textarea id="description" name="description" id="" rows="5" style="width: 100%;"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Nội dung bài viết </div>
                            <div class="mt-5">
                                <textarea id="contentMain" name="content" class="form-control my-editor"></textarea>                        
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
                                {{-- <div>
                                    <label for="post-form-7" class="form-label">Caption</label>
                                    <input id="post-form-7" type="text" class="form-control" placeholder="Write caption">
                                </div> --}}
                                <div class="mt-3">
                                    {{-- <label class="form-label">Ảnh đại diện</label> --}}
                                    <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4" style="width: 35%">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <div id="imagePreview" onclick="jQuery('#imageUpload').click()">
                                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg">
                                                </div>
                                                {{-- <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> --}}
                                            </div>
                                            {{-- <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md" alt="Midone - HTML Admin Template" src="dist/images/preview-5.jpg">
                                                <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                            </div>
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md" alt="Midone - HTML Admin Template" src="dist/images/preview-10.jpg">
                                                <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                            </div>
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md" alt="Midone - HTML Admin Template" src="dist/images/preview-10.jpg">
                                                <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                            </div> --}}
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1"> Tải lên một ảnh </span>
                                            <input id="imageUpload" name="avatar" type="file" class="w-full h-full top-0 left-0 absolute opacity-0" style="cursor: pointer;"  accept="image/*" onchange="previewImage(this)">
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
                                <input id="titleSeo" name="titleSeo" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập title seo">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Từ khóa seo </div>
                            <div class="mt-5">
                                <input id="keywordSeo" name="keywordSeo" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập từ khóa seo">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mô tả seo </div>
                            <div class="mt-5">
                                <textarea name="descriptionSeo" id="descriptionSeo" style="width: 100%;" cols="30" rows="5" placeholder="Nhập mô tả seo"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mã Schema </div>
                            <div class="mt-5">
                                <textarea name="schema" id="schema" style="width: 100%;" cols="30" rows="5" placeholder="Nhập mã schema"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <button id="alert-save-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#save-success-confirmation-modal"></button>
        
        <!-- END: Post Content -->
        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                <div>
                    <label class="form-label">Được viết bởi</label>
                    <div class="dropdown">
                        <div class="dropdown-toggle btn w-full btn-outline-secondary dark:bg-darkmode-800 dark:border-darkmode-800 flex items-center justify-start" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            
                            <div class="truncate">{{ Auth::guard('admin')->user()->name }}</div>
                           
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Ngày đăng</label>
                    <input name="datePublish" type="text" class="datepicker-personal" style="width: 100%;" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                </div>

                <div class="mt-3">
                    <label for="post-form-3" class="form-label">Danh mục</label>
                    <select data-placeholder="Chọn danh mục" class="tom-select w-full" name="category">
                        <option value=""></option>
                        @php
                            $categories = App\Models\Category::where('parent_id', 0)->get();
                            \App\Helper\Common::foreachCategories(categories: $categories, categoryId: null);
                        @endphp
                    </select>
                </div>
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-5" class="form-check-label ml-0 mb-2">Nổi bật</label>
                    <input id="post-form-5" name="hot" class="form-check-input" type="checkbox">
                </div>
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-6" class="form-check-label ml-0 mb-2">Hiển thị</label>
                    <input id="post-form-6" name="active" class="form-check-input" type="checkbox" checked>
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
    </div>
</div>
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
<!-- Call Ajax -->
@endsection