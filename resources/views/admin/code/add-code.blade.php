@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Thêm mã code'
    ])
    <!-- END: Top Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm mã code
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

            <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0" onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="corner-up-left" data-lucide="corner-up-left" class="lucide lucide-corner-up-left block mx-auto"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 00-4-4H4"></path></svg>Quay lại </button>

            <div class="dropdown">
                <button id="submitData" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown" onclick="submitCode()"> Lưu </button>
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
                        <button title="Fill in the article content" onclick="switchTab(1)" data-tw-toggle="tab" data-tw-target="#content" class="nav-link tooltip w-full sm:w-40 py-4 active" id="content-tab" role="tab" aria-controls="content" aria-selected="true"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Mã code </button>
                    </li>
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
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Nhập mã code </div>
                            <div class="mt-5">
                                <textarea id="description" name="description" id="" rows="5" style="width: 100%;"></textarea>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <button id="alert-save-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#save-success-modal"></button>

        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-6" class="form-check-label ml-0 mb-2">Hiển thị</label>
                    <input id="post-form-6" name="active" class="form-check-input" type="checkbox" checked>
                </div>
                <div class="form-switch flex flex-col items-start mt-3">
                    <label for="modal-form-2" class="form-label">Số thứ tự</label>
                    <input id="modal-form-2" name="order-code" type="number" class="form-control" placeholder="Nhập số thứ tự" value="1">
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
    </div>
</div>
@include('admin.partials.modal')

<script>
    function submitCode(checkModal) {
        // validateRequire();
        if ($('input[name="active"]').is(":checked") == true) {
            active = 1;
        } else {
            active = 0;
        }

        let formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('name', $('input[name="name"]').val());
        formData.append('active', active);
        formData.append('order', $('input[name="order-code"]').val());
        formData.append('description', $('#description').val());

        jQuery.ajax({
            url: '{{ route('admin.createCode') }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                jQuery('#alert-save-success').click();
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });
    }

    function redirectList(){
        window.location.href = '{{ route('admin.code')}}';
        return;
    }
</script>
<!-- Call Ajax -->
@endsection
