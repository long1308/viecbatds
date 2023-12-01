@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @if($type == config('constant.type-recruitment.category'))
    @include('admin.partials.topbar', [
        'titleTab' => 'Cập nhật ngành nghề tuyển dụng'
    ])
@elseif($type == config('constant.type-recruitment.position'))
    @include('admin.partials.topbar', [
    'titleTab' => 'Cập nhật vị trí tuyển dụng'
    ])
@endif
    <!-- END: Top Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            @if($type == config('constant.type-recruitment.category'))
               Cập nhật ngành nghề tuyển dụng
            @elseif($type == config('constant.type-recruitment.position'))
               Cập nhật vị trí tuyển dụng
            @endif
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

            <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0" onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="corner-up-left" data-lucide="corner-up-left" class="lucide lucide-corner-up-left block mx-auto"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 00-4-4H4"></path></svg>Quay lại </button>

            <div class="dropdown">
                <button id="submitData" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown" onclick="updateRecruitment()"> Cập nhật </button>
            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
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
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên  </div>
                            <div class="mt-5">
                                <input name="name" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên " value="{{ $recruitment->name }}" onkeyup="renderData(this)">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Slug </div>
                            <div class="mt-5">
                                <input id="slug" name="slug" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập slug" value="{{ $recruitment->key->slug ?? "" }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mô tả ngắn </div>
                            <div class="mt-5">
                                <textarea name="description" id="description" rows="5" style="width: 100%;">{{ $recruitment->description_short }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Nội dung bài viết </div>
                            <div class="mt-5">
                                <textarea id="contentMain" name="content" class="form-control my-editor">{!! $recruitment->description !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div id="imageTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab" style="display: none;">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Ảnh đại diện </div>
                            <div class="mt-5">
                                <div class="mt-3">
                                    <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4" style="width: 35%">
                                        <div class="flex flex-wrap px-4">
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                @if (!$recruitment->avatar_path)
                                                <div id="imagePreview" onclick="jQuery('#imageUpload').click()">
                                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg">
                                                </div>
                                                @else
                                                <div id="imagePreview">
                                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="{{ asset($recruitment->avatar_path)}}">
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
                                <input id="titleSeo" name="titleSeo" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập title seo" value="{{ $recruitment->title_seo }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mô tả seo </div>
                            <div class="mt-5">
                                <input id="descriptionSeo" name="descriptionSeo" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập mô tả seo" value="{{ $recruitment->description_seo }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Từ khóa seo </div>
                            <div class="mt-5">
                                <input id="keywordSeo" name="keywordSeo" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập từ khóa seo" value="{{ $recruitment->keyword_seo }}">
                            </div>
                        </div>
                        <br>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Mã Schema </div>
                            <div class="mt-5">
                                <textarea name="schema" id="schema" style="width: 100%;" cols="30" rows="5" placeholder="Nhập mã schema">{{ $recruitment->schema_code }}</textarea>
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

        <button id="alert-update-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#update-success-modal"></button>

        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                {{-- @if(isset($setting->parent->name))
                <div class="mt-3">
                    <label class="form-label">Danh mục cha</label>
                    <div class="dropdown">
                        <div class="dropdown-toggle btn w-full btn-outline-secondary dark:bg-darkmode-800 dark:border-darkmode-800 flex items-center justify-start" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            <div class="truncate">{{ $setting->parent->name }}</div>
                        </div>
                    </div>
                </div>
                @endif --}}
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-5" class="form-check-label ml-0 mb-2">Nổi bật</label>
                    <input id="post-form-5" name="hot" class="form-check-input hotInput" type="checkbox" @if($recruitment->hot == 1) checked @endif>
                </div>
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-6" class="form-check-label ml-0 mb-2">Hiển thị</label>
                    <input id="post-form-6" name="active" class="form-check-input" type="checkbox" @if($recruitment->active == 1) checked @endif>
                </div>
                <div class="form-switch flex flex-col items-start mt-3">
                    <label for="modal-form-2" class="form-label">Số thứ tự</label>
                    <input id="modal-form-2" name="order" type="number" class="form-control" placeholder="Nhập số thứ tự" value="{{ $recruitment->order ?? 1 }}">
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
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

    function updateRecruitment() {
        if ($('#slug').val() != '{{ $recruitment->key->slug ?? '' }}') {
            if (!checkSlug()) {
            return; 
            } 
        }

        sendSubmit();
    }

    function sendSubmit(checkModal) {
        let content = tinymce.get('contentMain').getContent();
        
        if ($('input[name="hot"]').is(":checked") == true) {
            hot = 1;
        } else {
            hot = 0;
        }

        if ($('input[name="active"]').is(":checked") == true) {
            active = 1;
        } else {
            active = 0;
        }

        if (jQuery('#imageUpload')[0].files[0]) {
            imageUpdateInput = jQuery('#imageUpload')[0].files[0];
        }

        let formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('name', $('input[name="name"]').val());
        formData.append('slug', $('#slug').val());
        formData.append('avatar', imageUpdateInput);
        formData.append('hot', hot);
        formData.append('active', active);
        formData.append('order', $('input[name="order"]').val());
        formData.append('description_short', $('#description').val());
        formData.append('description', content);
        formData.append('keyword_seo', $('input[name="keywordSeo"]').val());
        formData.append('title_seo', $('input[name="titleSeo"]').val());
        formData.append('description_seo', $('input[name="descriptionSeo"]').val());
        formData.append('schema_code', $('#schema').val());
        formData.append('type', '{{ $type }}');

        jQuery.ajax({
            url: `{{ route('admin.updateRecruitment', ['id' => $recruitment->id]) }}`,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                localStorage.setItem('checkUpdateSuccess', true);
                window.location.href = '{{ route('admin.listRecruitment', ['type' => $type]) }}';
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });
    }
</script>

@endsection
