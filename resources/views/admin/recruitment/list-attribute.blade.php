@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý thuộc tính'
    ])

    <div id="alertCreateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Thêm mới thành công! </div>
    <div id="alertUpdateSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Cập nhật thành công! </div>
    <div id="alertDeleteSuccess" class="alert alert-success-soft show flex items-center mb-2" role="alert" style="color: #54b200; margin-top: 30px; display: none;"> <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> Xóa thành công! </div>

    <!-- END: Top Bar -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Danh sách thuộc tính
        </h2>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div id="alertValidate"></div>
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div id="contentTab" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> Thêm thuộc tính mới </div>
                            <div class="mt-5" style="display: flex;">
                                <input id="nameAttribute" type="text" name="nameAttribute" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Tên thuộc tính mới" value="" style="margin-right: 20px;">
                                <button id="submitData" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown" onclick="addAttribute($('#nameAttribute').val(), 0)"> Thêm </button>               
                            </div>

                        </div>

                    </div>                                   

                </div>
            </div>
        </div>

        @foreach ($listAttribute as $item)
        <div class="intro-y col-span-12 lg:col-span-6" id="attribute-box">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">

                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5" style="display: flex;">
                            <div class="font-medium flex items-center">
                                <input type="text" value="{{ $item->name }}" style="margin-right: 15px;">
                            </div>
                            <div class="side-menu__sub-icon" onclick="dropdownShow({{ $item->id }})" style="cursor: pointer; margin-right: 15px; margin-top: 10px;">
                                <div class="dropdown-attr-{{ $item->id }}"> <input class="check-dropdown-{{ $item->id }}" type="text" value="1" hidden> <i data-lucide="chevron-down"></i>  </div>
                            </div>
                                
                            <a class="flex items-center text-danger" style="cursor: pointer;" onclick="$('#idAttributeDelete').val({{ $item->id }})" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                        </div>
                        <div style="margin: 10px 0px; display: flex;">
                            <input class="no-submit" type="text" id="nameAttributeChild-{{ $item->id }}" placeholder="Thêm thuộc tính con" onkeypress="submitDataChild({{ $item->id }})" value="" style="margin-right: 15px;"> 
                            <button id="submitData-{{ $item->id }}" onclick="addAttribute($('#nameAttributeChild-{{ $item->id }}').val(), {{ $item->id }})" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Thêm </button>               
                        </div>
      
                        <div id="dropdownBox-{{ $item->id }}">
                            @foreach ($item->childs as $itemChild)
                            <div style="margin: 10px 0px; display: flex;">
                                <a class="flex items-center"> <i data-lucide="plus" class="w-4 h-4 mr-1"></i></a>  
                                <input type="text" value="{{ $itemChild->name }}" style="margin-right: 15px;"> 
                                <a class="flex items-center text-danger" style="cursor: pointer;" onclick="$('#idAttributeDelete').val({{ $itemChild->id }})" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>                            
                            </div>
                            @endforeach
                        </div>
                    </div> 
                    <script>
                    function dropdownShow(idAttribute) {
                        if ($('.check-dropdown-' + idAttribute).val() == 1) {
                            $('.check-dropdown-' + idAttribute).val('0');
                            $('.dropdown-attr-' + idAttribute).css('transform', 'rotateX(180deg)');
                            $('#dropdownBox-' + idAttribute).css('display', 'none');
                        } else{
                            $('.check-dropdown-' + idAttribute).val('1');
                            $('.dropdown-attr-' + idAttribute).css('transform', 'rotateX(0deg)');
                            $('#dropdownBox-' + idAttribute).css('display', 'block');
                        }
                    }

                    // function tickAll(idAttribute) {
                    //     if ($('#tickAll-' + idAttribute).is(":checked") == true) {
                    //         jQuery('#attribute-box-' + idAttribute + ' input[type="checkbox"]').prop('checked', true);
                    //     } else {
                    //         jQuery('#attribute-box-' + idAttribute + ' input[type="checkbox"]').prop('checked', false);
                    //     }
                    // }
                    </script>
                </div>
            </div>
        </div>
        @endforeach

        {{-- <div class="intro-y col-span-12 lg:col-span-3" id="attribute-box-{{ $item->id }}">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">

                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5" style="display: flex;">
                            <div class="font-medium flex items-center">
                                <input id="tickAll-{{ $item->id }}" onchange="tickAll({{ $item->id }})" name="all" @if ($product->attributes->pluck('parent_id')->contains($item->id)) checked @endif type="checkbox" class="form-check-input border mr-2">
                                {{ $item->name }}
                                </div>
                                <div class="side-menu__sub-icon" onclick="dropdownShow({{ $item->id }})" style="cursor: pointer;">
                                    <div class="dropdown-attr-{{ $item->id }}"> <input class="check-dropdown-{{ $item->id }}" type="text" value="0" hidden> <i data-lucide="chevron-down"></i>  </div>
                                </div>
                        </div>
      
                        <div id="dropdownBox{{ $item->id }}" style="display: none;">
                            @foreach (App\Models\Attribute::where('parent_id', $item->id)->get() as $keyChild => $itemChild)
                            <div style="margin: 10px 0px;">
                                <input id="checkbox_{{ $itemChild->id }}" @if ($product->list_attributes->pluck('attribute_id')->contains($itemChild->id)) checked @endif name="checkbox_attribute" type="checkbox" class="form-check-input border mr-2" style="margin-bottom: 5px;"> {{ $itemChild->name }} 
                                <div style="margin: 5px 0px 10px 0px; display: flex;">
                                    <input id="price_{{ $itemChild->id }}" name="price" type="text" class="form-check-input border mr-2 price-format" @if ($product->list_attributes->pluck('attribute_id')->contains($itemChild->id)) value="{{ number_format($product->list_attributes->where('attribute_id', $itemChild->id)->first()->price_new) }}" @endif style="width: 135px; border-radius: 5px;" placeholder="Giá"> 
                                    <input id="oldPrice_{{ $itemChild->id }}" name="oldPrice" type="text" class="form-check-input border mr-2 price-format" @if ($product->list_attributes->pluck('attribute_id')->contains($itemChild->id)) value="{{ number_format($product->list_attributes->where('attribute_id', $itemChild->id)->first()->price_old) }}" @endif style="width: 135px; border-radius: 5px;" placeholder="Giá cũ"> 
                                </div>                            
                            </div>
                            @endforeach
                        </div>
                    </div> 
                    <script>
                    function dropdownShow(itemId) {
                        if ($('.check-dropdown-' + itemId).val() == 1) {
                            $('.check-dropdown-' + itemId).val('0');
                            $('.dropdown-attr-' + itemId).css('transform', 'rotateX(0deg)');
                            $('#dropdownBox' + itemId).css('display', 'none');
                        } else{
                            $('.check-dropdown-' + itemId).val('1');
                            $('.dropdown-attr-' + itemId).css('transform', 'rotateX(180deg)');
                            $('#dropdownBox' + itemId).css('display', 'block');
                        }
                    }

                    function tickAll(idAttribute) {
                        if ($('#tickAll-' + idAttribute).is(":checked") == true) {
                            jQuery('#attribute-box-' + idAttribute + ' input[type="checkbox"]').prop('checked', true);
                        } else {
                            jQuery('#attribute-box-' + idAttribute + ' input[type="checkbox"]').prop('checked', false);
                        }
                    }
                    </script>
                </div>
            </div>
        </div> --}}
        

        {{-- <button id="alert-save-success" style="display: none;" data-tw-toggle="modal" data-tw-target="#save-success-confirmation-modal"></button>
        
        <!-- END: Post Content -->
        <div id="update-role-success-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i> 
                            <div class="text-3xl mt-5" style="font-size: 26px !important">Cập nhật thành công</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="window.location.href= '{{ route('admin.listRole') }}'">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                            <div class="text-3xl mt-5">Xóa thuộc tính?</div>
                            <input id="idAttributeDelete" type="text" hidden>
                            <div class="text-slate-500 mt-2">
                                Bạn chắc chắn muốn xóa thuộc tính này? 
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deleteAttribute($('#idAttributeDelete').val())">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
</div>
@include('admin.partials.modal')
<script>
function submitDataChild(idAttribute) {
    if (event.which === 13) {
        jQuery('#submitData-' + idAttribute).click();
    }
}

function addAttribute(nameAttribute, parentId) {
    if (nameAttribute == '') {
        alert = renderAlert(' nhập tên thuộc tính ');
        $('#alertValidate').html(alert);
        jQuery('html, body').scrollTop(0);
        return;
    }

    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('name', nameAttribute);
    formData.append('parent_id', parentId);

    jQuery.ajax({
        url: '{{ route('admin.createAttribute') }}', 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            localStorage.setItem('checkCreateSuccess', true);
            window.location.reload();
        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
}

function deleteAttribute(idAttribute) {
    arrIdAttribute = [];

    arrIdAttribute.push(idAttribute);

    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('ids', arrIdAttribute);

    jQuery.ajax({
        url: '{{ route('admin.deleteAttribute') }}', 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            localStorage.setItem('checkDeleteSuccess', true);
            window.location.reload();
        },
        error: function(error) {
            console.error('Lỗi khi gọi API: ', error);
            return false;
        }
    });
}
</script>
<!-- Call Ajax -->
@endsection