@extends('admin.master')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Thêm mới'
    ])
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Thêm mới
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

                <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0" onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="corner-up-left" data-lucide="corner-up-left" class="lucide lucide-corner-up-left block mx-auto"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 00-4-4H4"></path></svg>Quay lại </button>

                <div class="dropdown">
                    <button id="submitData" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown" onclick="submitBanner()"> Lưu </button>
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
                        {{-- <li class="nav-item">
                            <button title="Ảnh" onclick="switchTab(2)" data-tw-toggle="tab" data-tw-target="#keywords" class="nav-link tooltip w-full sm:w-40 py-4" id="image-tab" role="tab" aria-selected="false"><i data-lucide="image" class="block mx-auto" style="margin: 0px 5px; padding: 3.5px;"></i>  Ảnh </button>
                        </li> --}}
                    </ul>
                    <div class="post__content tab-content">
                        <div id="contentTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Tên </div>
                                <div class="mt-5">
                                    <input type="text" name="name" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập tên" onkeyup="renderData(this)" required>
                                </div>
                            </div>
                            <br>
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Link </div>
                                <div class="mt-5">
                                    <input name="link" type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Nhập link">
                                </div>
                            </div>
                            <br>
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Hình ảnh </div>
                                <div class="mt-5">
                                    <div class="mt-3">
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4" style="width: 35%">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <div id="imagePreview" onclick="jQuery('#imageUpload').click()">
                                                        <img class="rounded-md" alt="Midone - HTML Admin Template" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1"> Tải lên một ảnh </span>
                                                <input id="imageUpload" name="avatar" type="file" class="w-full h-full top-0 left-0 absolute opacity-0" style="cursor: pointer;"  accept="image/*" onchange="previewImage(this)">
                                            </div>
                                        </div>
                                    </div>
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
                        </div>

                        {{-- <div id="imageTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab" style="display: none;">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Hình ảnh </div>
                                <div class="mt-5">
                                    <div class="mt-3">
                                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4" style="width: 35%">
                                            <div class="flex flex-wrap px-4">
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <div id="imagePreview">
                                                        <img class="rounded-md" alt="Midone - HTML Admin Template" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                                <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1"> Tải lên một ảnh </span>
                                                <input id="imageUpload" name="avatar" type="file" class="w-full h-full top-0 left-0 absolute opacity-0" style="cursor: pointer;"  accept="image/*" onchange="previewImage(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <button id="alert-save-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#save-success-modal"></button>

            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    @if (isset($bannerParent) && $bannerParent->name)
                        <div>
                            <label class="form-label">Mục cha</label>
                            <div class="dropdown">
                                <div class="dropdown-toggle btn w-full btn-outline-secondary dark:bg-darkmode-800 dark:border-darkmode-800 flex items-center justify-start" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                                    <div class="truncate">{{ $bannerParent->name }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-check form-switch flex flex-col items-start mt-3">
                        <label for="post-form-5" class="form-check-label ml-0 mb-2">Nổi bật</label>
                        <input id="post-form-5" name="hot" class="form-check-input" type="checkbox">
                    </div>
                    <div class="form-check form-switch flex flex-col items-start mt-3">
                        <label for="post-form-6" class="form-check-label ml-0 mb-2">Hiển thị</label>
                        <input id="post-form-6" name="active" class="form-check-input" type="checkbox" checked>
                    </div>
                    <div class="form-switch flex flex-col items-start mt-3">
                        <label for="modal-form-2" class="form-label">Số thứ tự</label>
                        <input id="modal-form-2" name="order-banner" type="number" class="form-control" placeholder="Nhập số thứ tự" value="1">
                    </div>
                </div>
            </div>
            <!-- END: Post Info -->
        </div>
    </div>
    @include('admin.partials.modal')
    <script>
        function submitBanner(checkModal) {
            // validateRequire();
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

            let imageInput = jQuery('#imageUpload')[0].files[0];

            let formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('name', $('input[name="name"]').val());
            formData.append('link', $('input[name="link"]').val());
            formData.append('avatar', imageInput);
            formData.append('hot', hot);
            formData.append('active', active);
            formData.append('order', $('input[name="order-banner"]').val());
            formData.append('description', $('#description').val());
            formData.append('parent_id', {{ $bannerParent->id ?? 0 }});


            jQuery.ajax({
                url: '{{ route('admin.createBanner') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    localStorage.setItem('checkCreateSuccess', true);
                    window.location.href = '{{ route('admin.banner') }}?parent_id={{ $bannerParent->id ?? 0 }}';
                },
                error: function(error) {
                    console.error('Lỗi khi gọi API: ', error);
                    return false;
                }
            });

        }

        function redirectList(){
            window.location.href = '{{ route('admin.banner') }}?parent_id={{ $bannerParent->id ?? 0 }}';
            return;
        }
    </script>
    <!-- Call Ajax -->
@endsection
