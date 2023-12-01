@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Thêm danh mục bài viết'
    ])
    <!-- END: Top Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm Danh Mục
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
            <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0" onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="corner-up-left" data-lucide="corner-up-left" class="lucide lucide-corner-up-left block mx-auto"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 00-4-4H4"></path></svg>Quay lại </button>
            <div class="dropdown">
                <button id="submitData" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown" onclick="submitCategory()"> Lưu </button>
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
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên danh mục </div>
                            <div class="mt-5">
                                <input type="text" name="name" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên danh mục" onkeyup="renderData(this)" required>
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
                                <textarea id="descriptionShort" name="descriptionShort" id="" rows="5" style="width: 100%;"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mô tả </div>
                            <div class="mt-5">
                                <textarea id="contentMain" name="content" class="form-control my-editor"></textarea>   
                            </div>
                        </div>
                        <br>
                        {{--BEGIN: Nội dung bài viết
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Nội dung bài viết </div>
                            <div class="mt-5">
                                <textarea name="editor1" id="editor1" rows="10" cols="80">

                                </textarea>
                                <script>
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                            </div>
                        </div>
                        End: Nội dung bài viết--}}
                        <br>
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

        <button id="alert-save-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#save-success-modal"></button>

        <!-- END: Post Content -->
        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                @if (isset($categoryParent) && $categoryParent->name)
                <div>
                    <label class="form-label">Danh mục cha</label>
                    <div class="dropdown">
                        <div class="dropdown-toggle btn w-full btn-outline-secondary dark:bg-darkmode-800 dark:border-darkmode-800 flex items-center justify-start" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            <div class="truncate">{{ $categoryParent->name }}</div>
                        </div>
                    </div>
                </div>
                @endif
                {{--
                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Ngày đăng</label>
                    <input type="text" class=" form-control" id="post-form-2" data-single-mode="true" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" disabled>
                </div>
                --}}
                {{--
                <div class="mt-3">
                    <label for="post-form-3" class="form-label">Danh mục</label>
                    <select data-placeholder="Chọn danh mục" class="tom-select w-full" id="post-form-3" multiple>
                        <option value="1" >Horror</option>
                        <option value="2">Sci-fi</option>
                        <option value="3" >Action</option>
                        <option value="4">Drama</option>
                        <option value="5">Comedy</option>
                    </select>
                </div>
                --}}
                {{--BEGIN: Tag
                <div class="mt-3">
                    <label for="post-form-4" class="form-label">Thẻ tag</label>
                    <select data-placeholder="Chọn thẻ tag" class="tom-select w-full" id="post-form-4" multiple>
                        <option value="1" >Leonardo DiCaprio</option>
                        <option value="2">Johnny Deep</option>
                        <option value="3" >Robert Downey, Jr</option>
                        <option value="4">Samuel L. Jackson</option>
                        <option value="5">Morgan Freeman</option>
                    </select>
                </div>
                End: Tag--}}
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-5" class="form-check-label ml-0 mb-2">Nổi bật</label>
                    <input id="post-form-5" name="hot" class="form-check-input" type="checkbox">
                </div>
                <div class="form-switch flex flex-col items-start mt-3">
                    <label for="modal-form-2" class="form-label">Số thứ tự</label>
                    <input id="modal-form-2" name="order-category" type="number" class="form-control" placeholder="Nhập số thứ tự" value="1">
                </div>
                {{--
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-6" class="form-check-label ml-0 mb-2">Hiển thị</label>
                    <input id="post-form-6" name="active" class="form-check-input" type="checkbox" checked>
                </div>
                --}}
            </div>
        </div>
        <!-- END: Post Info -->
    </div>
</div>
@include('admin.partials.modal')
<script>
    function checkSlug() {
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
                sendSubmit();
            },
            error: function(error) {
                alert = renderAlert(alertText.slugDuplicate);
                $('#alertValidate').html(alert);
                jQuery('html, body').scrollTop(0);
                return false;
            }
        });
    }

    function submitCategory() {
        if (!checkSlug()) {
            return; 
        } 

        sendSubmit();
    }

    function sendSubmit() {
        let content = tinymce.get('contentMain').getContent();

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
        formData.append('order', $('input[name="order-category"]').val());
        formData.append('description_short', $('#descriptionShort').val());
        formData.append('description', content);
        formData.append('parent_id', {{ $categoryParent->id ?? 0 }});
        formData.append('keyword_seo', $('input[name="keywordSeo"]').val());
        formData.append('title_seo', $('input[name="titleSeo"]').val());
        formData.append('description_seo', $('#descriptionSeo').val());
        formData.append('schema_code', $('#schema').val());


        jQuery.ajax({
            url: '{{ route('admin.createCategory') }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                localStorage.setItem('checkCreateSuccess', true);
                window.location.href = '{{ route('admin.category') }}';
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });

    }

    function redirectList(){
        window.location.href = '{{ route('admin.category') }}';
        return;
    }
</script>
<!-- Call Ajax -->
@endsection
