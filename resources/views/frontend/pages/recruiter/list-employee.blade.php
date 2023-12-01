@extends('frontend.master')
@section('title', 'Danh sách tin tuyển dụng')
@section('keywords',  $header['seo-home']->link ??'')
@section('description', $header['seo-home']->description ??'')
@section('image', asset($header['seo-home']->avatar_path) ??'')
@section('content')
<style>

</style>
<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile">
            <div class="row">
                <div class="clm" style="--w-lg:9;  --w-md:12; --w-sm:12; --w-xs:12">
                    <div class="box__left__post">
                        <div class="box_inner__list">
                            <div class="box_list_job">
                                <form name="reclistjobse" id="reclistjobse" method="post" action="https://noibo.viecbatdongsan.com.vn/recruiter-listjob.html">

                                    <div class="filter">

                                        <input type="hidden" value="1" name="searchok">
                                        <div class="box_filter">
                                            <span>Bộ lọc<sup>*</sup></span>
                                            <div class="from_search">
                                                <label></label>

                                                <input id="namePostRecruitment" class="form-control" type="text" name="txtkey" placeholder="Tên công việc..." @if (request()->input('keyword'))
                                                value="{{ request()->input('keyword') }}"
                                                @endif autocomplete="off" fdprocessedid="ittqk5">

                                            </div>
                                            {{-- <div class="from_search">
                                                <label>Ngày từ</label>

                                                <input class="form-control date" type="text" name="date_start" placeholder="DD-MM-YYYY" value="" autocomplete="off" fdprocessedid="px3m9c">

                                            </div>
                                            <div class="from_search">
                                                <label>Ngày đến</label>

                                                <input class="form-control date" type="text" name="date_end" placeholder="DD-MM-YYYY" value="" autocomplete="off" fdprocessedid="f5rzml">
                                            </div> --}}
                                            <button class="form-control" type="button" name="search" fdprocessedid="cfs5ko" onclick="filterPostRecruitment()">Tìm kiếm</button>
                                        </div>

                                    </div>
                                </form>
                                <div class="list_job">
                                    <div class="pt_name_job">
                                        <strong>Danh sách tin tuyển dụng</strong>
                                    </div>
                                    
                                    <form name="reclistjob" id="reclistjob" method="post">
                                        <script>
                                             var listDelete = [];
                                             var listDeletePost = [];
                                        </script>
                                        <div class="pt_container_table_reponsive">
                                            <table class="table table-hover tb_reponsive" border="0" cellpadding="0" cellspacing="0">
                                                <thead class="tb_head_reponsive">
                                                    <tr>
                                                        <th>
                                                            {{-- <input type="checkbox" name="toggle" value="" onchange="checkAll()" class="noborder checkbox-all"> --}}
                                                        </th>
                                                        <th>Tên tin tuyển dụng</th>
                                                        <th>Ngày đăng</th>
                                                        <th>Ngày hết hạn</th>
                                                        <th>Lượt xem</th>
                                                        <th>Số lượng ứng tuyển</th>
                                                        <th>Số lượng đã tuyển</th>
                                                        <th>Trạng thái</th>
                                                        <th>Sửa</th>
                                                    </tr>
                                                </thead>
                                                <tbody border="0" cellpadding="0" cellspacing="0">
                                                    @foreach($listRecruitment as $item)
                                                    <tr>
                                                        <td><input type="checkbox" id="cb1" name="ciddd[]" value="7" class="noborder checkbox-delete" onchange="changeListDelete({{$item->id}}, this)"></td>
                                                        <td class="both_color" style="width: 250px;"><a href="{{ route('listEmployeeRecruitment', ['id' => $item->id]) }}" title="">{{$item->name}}</a></td>
                                                        <td><a href="" title="">{{ date('d-m-Y', strtotime($item->created_at)) }}</a></td>
                                                        <td><a href="" title="">{{ date('d-m-Y', strtotime($item->expiry_date)) }}</a></td>
                                                        <td align="center"><a href="" title="">{{$item->view}}</a></td>
                                                        <td align="center"><a href="" title="">{{ $item->applyRecruitments->count() }}</a></td>
                                                        <td align="center"><a href="" title="">{{ $item->applyRecruitments->where('approve', 1)->count() }}</a></td>
                                                        <td>
                                                            @if (App\Helper\Common::checkOutdate($item->expiry_date))
                                                            Hết hạn
                                                            @elseif ($item->active == 1)
                                                            Đang tuyển
                                                            @elseif($item->active == 0)
                                                            Dừng tuyển
                                                            @endif
                                                        </td>
                                                        <td class="pt_icon_edit_{{$item->id}}" id="" onclick="dropdown('_{{$item->id}}')"><svg  class="icon__ronate_{{$item->id}}" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                                <path d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z" />
                                                            </svg></td>
                                                    </tr>
                                                    <tr class="pt_list_edit_{{$item->id}}" style="display: none;">
                                                        <td colspan="10" align="right">
                                                            <a class="pt_table_button pt_table_xemtruoc" target="_blank" href="{{ route('postRecruitmentDetail', ['slug' => $item->slug]) }}">Xem tin</a>
                                                            <a class="pt_table_button pt_table_edit" href="{{ route('editPostRecruitment', ['id' => $item->id]) }}">Sửa</a>
                                                            <a class="pt_table_button pt_table_edit" href="{{ route('editPostRecruitment', ['id' => $item->id]) }}">Gia hạn</a>
                                                            @if ($item->active == 1)
                                                            <a class="pt_table_button pt_table_xemtruoc" style="cursor: pointer;" onclick="changeStatus({{$item->id}}, 0)">Tuyển đủ</a>
                                                            @else
                                                            <a class="pt_table_button pt_table_xemtruoc" style="cursor: pointer;" onclick="changeStatus({{$item->id}}, 1)">Tiếp tục tuyển</a>
                                                            @endif
                                                            <a class="pt_table_button pt_table_xemtruoc" style="cursor: pointer;" onclick="deleteOnePostRecruitment({{ $item->id }})">Xóa</a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td class="actions" style="text-align:left !important">Chọn xóa: <a><span class="label red"><i class="icon-trash delete"></i></span></a>&nbsp; <a  onclick="deleteSelected()" style="cursor: pointer; color: #194983; font-weight: bold;">Xóa mục đã chọn </a></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
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
</div>
</div>
<script>
    var urlParams = new URLSearchParams(window.location.search);

    function filterPostRecruitment() {
        urlParams.delete('keyword');

        if ($('#namePostRecruitment').val() != '') {
            urlParams.set('keyword', $('#namePostRecruitment').val());
        }

        var newURL = window.location.pathname + '?' + urlParams.toString();

        window.location.href = newURL;
    }

   function dropdown(id) {
        $(".pt_list_edit"+id).toggle();
        $(".icon__ronate"+id).toggleClass("rotate"); // Thêm hoặc xóa lớp rotate để xoay icon
    }

    function checkAll() {
        if ($('.checkbox-all').is(":checked")) {
            $('.checkbox-delete').prop('checked', true)
        } else {
            $('.checkbox-delete').prop('checked', false)
        }
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
                deletePostRecruitment(listDeletePost);
            } else{
                return;
            }
        }
    }

    function deleteOnePostRecruitment(idDelete) {
        listDeletePost.push(idDelete);
        checkConfirm = confirm('Bạn có chắc chắn muốn xóa tin tuyển dụng này?');

        if (checkConfirm) {
            deletePostRecruitment(listDeletePost);
        } else{
            return;
        }
    }

    function deletePostRecruitment() {
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('arrayDelete', listDeletePost);

        jQuery.ajax({
            url: `{{ route('deletePostRecruitment') }}`, 
            method: 'POST', 
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                alert('Xóa tin thành công!');
                window.location.reload();
            },
            error: function(error) {
                console.error('Lỗi khi gọi API: ', error);
                return false;
            }
        });
    }

    function changeStatus(idPost, status) {
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('active', status);
        formData.append('id', idPost);

        jQuery.ajax({
            url: `{{ route('changeStatusPostRecruitment') }}`, 
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