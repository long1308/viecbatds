@extends('frontend.master')
@section('title', 'Hồ sơ đã lưu')
@section('keywords',  $header['seo-home']->link ??'')
@section('description',  $header['seo-home']->description ?? '')
@section('image',  asset(Auth::guard('web')->user()->avatar_path) ?? '')
@section('content')
<style>
    .box_inner__save {
        padding: 20px 10px;
        background: #fff;
    }

    .box_filter__save {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .from_search__save input {
        padding: 5px 10px;
        border: 1px solid;
        height: 31px;
        width: 100%;
        border-radius: 5px;
    }

    .from_search__save_2 {
        display: flex;
        align-items: center;
        align-items: center;
    }

    .box_filter__save span {
        display: inline-block;
        width: 56px;
        text-align: left;
        font-weight: 700;
        line-height: 36px;
        font-size: 14px;
        flex: 0 0 auto;
    }

    .from_search__save {
        width: 130px;
        display: flex;
    }

    .from_search__save_2 input {
        padding: 5px 10px;
        border: 1px solid;
        height: 31px;
        width: 100px;
        border-radius: 5px;
    }

    .from_search__save select {
        width: 100%;
        padding: 5px 10px;
        height: 31px;
        border-radius: 5px;
    }

    .from_search__save_2 label {
        font-weight: 400;
        font-style: italic;
        margin: 0;
        line-height: 36px;
        white-space: nowrap;
        margin-right: 10px;
    }

    .form-btn__search {
        background-color: #cc0001;
        display: inline-block;
        border-radius: 4px;
        border: none;
        height: 36px;
        line-height: 36px;
        width: 87px;
        color: #fff;
        text-align: center;
        font-size: 13px;
        padding: 0 8px;
        outline: 0;
    }

    .box_filter__save span sup {
        color: #ff0000;
    }

    .table-hover {
        width: 100%;
        text-align: center;
    }

    .check__save {
        display: flex;
    }

    .check__save label {
        margin-bottom: 0;
        margin-left: 5px;
        font-size: 12px;
    }

    .date__save {
        color: #000;
    }

    .table-hover>tbody>tr:hover {
        background-color: #f5f5f5;
    }
</style>
<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile">
            <div class="row">
                <div class="clm" style="--w-lg:9; --w-md:12; --w-sm:12; --w-xs:12">
                    <div class="box__left__search">
                        <div class="box_inner__save">
                            <div class="box_list_job">
                                <div class="filter__save">

                                    <input type="hidden" value="1" name="searchok" autocomplete="off">
                                    {{-- <div class="box_filter__save">
                                        <span>Bộ lọc<sup>*</sup></span>
                                        <div class="from_search__save">
                                            <label></label>

                                            <input class="form-control" type="text" name="txtkey" placeholder="Tên ứng viên, trình độ..." value="" autocomplete="off" fdprocessedid="doagvu">

                                        </div>
                                        <div class="from_search__save_2">
                                            <label>Ngày từ</label>

                                            <input class="form-control date" type="text" name="date_start" placeholder="DD-MM-YYYY" value="" autocomplete="off" fdprocessedid="sipbwr">

                                        </div>
                                        <div class="from_search__save_2">
                                            <label>Ngày đến</label>

                                            <input class="form-control date" type="text" name="date_end" placeholder="DD-MM-YYYY" value="" autocomplete="off" fdprocessedid="fttgqj">
                                        </div>
                                        <div class="from_search__save">
                                            <label></label>
                                            <select id="search_nganhnghe" name="search_nganhnghe" class="form-control input_check" fdprocessedid="qr782n">
                                                <option value="0">Ngành nghề</option>
                                                <option value="40">Môi giới bất động sản thổ cư</option>
                                                <option value="79">Môi giới bất động sản dự án</option>
                                                <option value="7">Môi giới bất động sản nông lâm nghiệp</option>
                                                <option value="83">Môi giới bất động sản cho thuê</option>
                                                <option value="82">Giám đốc kinh doanh bất động sản</option>
                                                <option value="71">Trưởng phòng kinh doanh bất động sản</option>
                                                <option value="52">Kế toán - Hành chính - Thư Ký</option>
                                                <option value="30">Thiết kế - Sáng tạo nghệ thuật</option>
                                                <option value="32">Kiến trúc - Thiết kế nội ngoại thất</option>
                                                <option value="33">Pháp lý - Luật - Kiểm toán</option>
                                                <option value="35">Quản lý dự án </option>
                                                <option value="37">Đầu tư - Tài chính - Ngân Hàng</option>
                                                <option value="38">Marketing - Chăm sóc khách hàng</option>
                                                <option value="39">Giáo dục và đào tạo</option>
                                                <option value="47">Thi công - Xây dựng</option>
                                                <option value="48">Quản lý tiêu chuẩn và chất lượng</option>
                                                <option value="49">Sản xuất - Lắp ráp</option>
                                                <option value="50">Vận hành - Bảo trì bảo dưỡng</option>
                                                <option value="53">Phân tích thống kê dữ liệu</option>
                                                <option value="63">Thông tin - truyền thông - quảng cáo</option>
                                                <option value="66">Xuất bản - In ấn</option>
                                                <option value="72">An ninh - Bảo vệ</option>
                                                <option value="73">Lái xe - Vận tải - Giao nhận</option>
                                                <option value="74">Môi trường - Xử lý chất thải</option>
                                                <option value="75">IT Phần mềm - Phần cứng - Mạng</option>
                                                <option value="161">An toàn lao động</option>
                                                <option value="162">Lao động phổ thông</option>
                                                <option value="163">Biên phiên dịch</option>
                                                <option value="164">Điện - Điện tử - Điện lạnh</option>
                                                <option value="165">Khoa học - Kỹ thuật</option>
                                            </select>
                                        </div>
                                        <button class="form-btn__search" type="submit" name="search" fdprocessedid="cslbh">Tìm kiếm</button>
                                    </div> --}}

                                </div>
                                <div class="pt_name_job">
                                    <strong>Danh sách hồ sơ lưu</strong>
                                </div>
                                <div class="list_job hidden-xs">

                                    <table class="table table-hover" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr>
                                                {{-- <th><input type="checkbox" name="toggle" value="" class="noborder"></th> --}}
                                                <th>Chọn</th>
                                                <th>Tiêu đề</th>
                                                <th>Hồ sơ</th>
                                                <th>Lưu ngày</th>
                                                <th>Trạng thái</th>

                                            </tr>
                                        </thead>
                                        <script>
                                            var listDelete = [];
                                            var listDeletePost = [];
                                       </script>
                                        <tbody>
                                            @foreach ($listSaveProfile as $item)
                                            <tr>
                                                <td><input type="checkbox" id="cb1" name="cid[]" value="70" class="noborder" onchange="changeListDelete({{$item->id}}, this)"></td>
                                                <td class="both_color"><a title="{{ $item->jobseeker->name }}">
                                                        <p></p>{{ $item->jobseeker->name }}
                                                    </a></td>
                                                <td><a style="cursor: pointer; color: #194983; font-weight: bold;" onclick="window.open('{{ asset($item->jobseeker->profile->link_profile) }}', '_blank')">Xem hồ sơ</a></td>
                                                <td><a href="" class="date__save" title="{{ $item->jobseeker->name }}">{{ $item->created_at->format('d-m-Y') }}</a></td>
                                                <td>
                                                    <p class="check__save"> <input type="checkbox" id="tt_lienhe" onchange="changeStatusSaveProfile({{ $item->id }})" name="tt_lienhe" value="1" @if ($item->contact == 1) checked @endif>
                                                        <label for="tt_lienhe">Đã liên hệ</label>
                                                    </p>
                                                    <p class="check__save"> <input type="checkbox" id="tt_phongvan" onchange="changeStatusSaveProfile({{ $item->id }})" name="tt_phongvan" value="1" @if ($item->interview == 1) checked @endif>
                                                        <label for="tt_phongvan">Đã phỏng vấn</label>
                                                    </p>
                                                    <p class="check__save"> <input type="checkbox" id="tt_trungtuyen" onchange="changeStatusSaveProfile({{ $item->id }})" name="tt_trungtuyen" value="1" @if ($item->pass == 1) checked @endif>
                                                        <label for="tt_trungtuyen">Đã trúng tuyển</label>
                                                    </p>
                                                    <p class="check__save"> <input type="checkbox" id="tt_tuchoi" onchange="changeStatusSaveProfile({{ $item->id }})" name="tt_tuchoi" value="1" @if ($item->pass == 2) checked @endif>
                                                        <label for="tt_tuchoi">Từ chối</label>
                                                    </p>
                                                </td>

                                            </tr>
                                            @endforeach                                       
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td class="actions" style="text-align:left !important">Chọn xóa: <a><span class="label red"><i class="icon-trash delete"></i></span></a>&nbsp; <a onclick="deleteSelected()" style="cursor: pointer;">Xóa mục đã chọn</a></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>



                                <div class="pagination">


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                @include('frontend.partials.sidebar-recruiter')
            </div>
        </div>
    </div>
</div>
<script>
function changeStatusSaveProfile(idSaveProfile) {
    if ($('#tt_lienhe').is(":checked") == true) {
        contact = 1;
    } else{
        contact = 2;
    }

    if ($('#tt_phongvan').is(":checked") == true) {
        interview = 1;
    } else{
        interview = 2;
    }

    if ($('#tt_trungtuyen').is(":checked") == true) {
        pass = 1;
    } else if ($('#tt_tuchoi').is(":checked") == true){
        pass = 2;
    } else {
        pass = 3;
    }

    let formData = new FormData();
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('idSaveProfile', idSaveProfile);
    formData.append('contact', contact);
    formData.append('interview', interview);
    formData.append('pass', pass);

    jQuery.ajax({
        url: `{{ route('changeStatusSaveProfile') }}`, 
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

function changeListDelete(idDelete, thisElement) {
    if ($(thisElement).is(":checked")) {
        listDelete.push(idDelete);
    } else{
        listDelete = listDelete.filter(function(item) {
            return item !== idDelete;
        });
    }
}

function deleteSelected() {
    if (listDelete.length == 0) {
        alert('Chưa có tin nào được chọn!');
    } else {
        listDeletePost = listDelete;
        checkConfirm = confirm('Bạn có chắc chắn muốn xóa những tin tuyển dụng này?');

        if (checkConfirm) {
            deleteSaveProfileRecruitment(listDeletePost);
        } else{
            return;
        }
    }
}

function deleteSaveProfileRecruitment() {
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('arrayDelete', listDeletePost);

        jQuery.ajax({
            url: `{{ route('deleteSaveProfileRecruitment') }}`, 
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
</script>
@endsection