@extends('admin.master')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý hình ảnh & banner'
        ])
        <div id="alertCreateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Thêm mới thành công! </div>
        <div id="alertUpdateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Cập nhật thành công! </div>
        <div id="alertDeleteSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Xóa thành công! </div>
        <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10">
            {{ $nameParent->name ?? "Quản lý hình ảnh & banner" }}
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                @checkPermission('create-banner')
                <a href="{{ route('admin.addBanner') }}?parent_id={{ request('parent_id') ?? 0 }}"><button class="btn btn-primary shadow-md mr-2">Thêm mới <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span></button></a>
                @endcheckPermission

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
            <!-- BEGIN: Users Layout -->
            <style>
                .before\:from-black::before {
                    content: var(--tw-content);
                    --tw-gradient-from: none;
                }
                span.nameCenter {
                    margin: 0 auto;
                }
            </style>
            @if(isset($listBanner) && $listBanner->count()>0)
                @foreach($listBanner as $item)
                <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                    <div class="box">
                        <a href="{{ route('admin.banner') }}?parent_id={{ $item->id }}">
                        <div class="p-5">
                            <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                @if(count($item->childs)>0)
                                <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{ asset('storage/foldergrey.jpg') }}">
                                @else
                                <img alt="Midone - HTML Admin Template" class="rounded-md" 
                                    @if (asset($item->image_path) == url('/').'/')
                                    src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg"
                                    @else
                                    src="{{ asset($item->image_path) }}"
                                    @endif
                                >
                                @endif
                            </div>
                            <div class="text-slate-600 dark:text-slate-500 mt-5">
                                <div class="flex items-center"><span class="nameCenter"> {{ $item->name }} </span></div>
                            </div>
                        </div>
                        </a>
                        <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                            @checkPermission('create-banner')
                            <a class="flex items-center text-primary mr-auto" href="{{ route('admin.addBanner') }}?parent_id={{ $item->id }}"> <i class="w-4 h-4" data-lucide="plus"></i> Thêm </a>
                            @endcheckPermission
                            @checkPermission('edit-banner')
                            <a class="flex items-center mr-3" href="{{ route('admin.editBanner', ['id'=> $item->id]) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                            @endcheckPermission
                            @checkPermission('delete-banner')
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" onclick="bannerId({{ $item->id }})"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                            @endcheckPermission
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            <!-- END: Users Layout -->
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
                            <div class="text-slate-500 mt-2">
                                Lưu ý: Khi xóa thì danh mục sẽ bị xóa và các danh mục con sẽ bị xóa theo.
                            </div>
                            <input type="hidden" name="idBanner" value="">
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deleteBnner()">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
    </div>
    @include('admin.partials.modal')
    <script>
        function bannerId(itemId) {
            $('input[name="idBanner"]').val(itemId);
        }
        function deleteBnner(button) {
            var idBanner = $('input[name="idBanner"]').val();
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', idBanner);

            jQuery.ajax({
                url: '{{ route('admin.deleteBanner') }}',
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
            window.location.href = '{{ route('admin.banner') }}?parent_id={{ request('parent_id') }}';
            return;
        }

    </script>
@endsection
