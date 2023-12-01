@extends('frontend.master')
@section('title', 'Danh sách ứng viên')
@section('keywords', $header['seo-home']->link ??'')
@section('description', $header['seo-home']->description ??'')
@section('image', asset($header['seo-home']->avatar_path) ?? '')
@section('content')
<style>

</style>
<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile">
            <div class="row">
                <div class="clm" style="--w-lg:9; --w-md:4">
                    <div class="box__left__post">
                        <div class="box_inner__list">
                            <div class="box_list_job">
                                <form name="reclistjobse" id="reclistjobse" method="post" action="">

                                    <div class="filter">

                                        <input type="hidden" value="1" name="searchok">
                                        <div class="box_filter">
                                            <span>Bộ lọc<sup>*</sup></span>
                                            <div class="from_search">
                                                <label></label>

                                                <input id="searchName" class="form-control" type="text" name="txtkey" placeholder="Tên người tìm việc..." @if (request()->input('keyword'))
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
                                            <button class="form-control" type="button" name="search" fdprocessedid="cfs5ko" onclick="filterListRecruitment()">Tìm kiếm</button>
                                            <button class="form-control" type="button" name="" fdprocessedid="cfs5ko" onclick="window.location.href='{{ route('listEmployee') }}';">Quay lại</button>
                                        </div>

                                    </div>
                                </form>
                                <div class="listRecruiment">
                                    <div class="name_jobs_recruiment">
                                        <h2>{{ $postRecruitment->name }}</h2>
                                    </div>
                                    <div class="list__see__and__time__update">
                                        <div class="timeUpdate">
                                            <div class="iconTimeUpdate">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" />
                                                </svg>
                                            </div>
                                            <div class="timeDetailUpdate">
                                                Cập nhật {{ $postRecruitment->updated_at->format('d-m-Y') }}
                                            </div>
                                        </div>
                                        <div class="seeUpdate">
                                            <div class="iconSee">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                    <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" />
                                                </svg>
                                            </div>
                                            <div class="seeDetail">Lượt xem {{ $postRecruitment->view }}</div>
                                        </div>
                                    </div>
                                    <table class="tableListRecruiment" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên người ứng tuyển</th>
                                                <th>Ngày ứng tuyển</th>
                                                <th>Xem hồ sơ</th>
                                                <th>Chấp nhận / Từ chối</th>
                                                <th>Trạng thái</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($postRecruitment->applyRecruitments as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->jobseeker->name }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <p style="cursor: pointer; padding: 0; color: #194983; font-weight: bold;" onclick="window.open('{{ asset($item->jobseeker->profile->link_profile) }}', '_blank')">Xem hồ sơ</p>
                                                </td>
                                                <td>
                                                    @if ($item->approve == 0 && $item->reject == 0)
                                                    Chưa duyệt
                                                    @elseif($item->approve == 1)
                                                    Chấp nhận
                                                    @elseif($item->reject == 1)
                                                    Từ chối
                                                    @endif
                                                </td>
                                                <td>Đã tiếp nhận</td>
                                                <td>
                                                    <div class="groupAction">
                                                        <button class="actionAccept" onclick="changeApprove({{ $item->id }}, 1)">
                                                            Chấp nhận
                                                        </button>
                                                        <button class="actionRemove" onclick="changeApprove({{ $item->id }}, 0)">
                                                            Từ chối
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach                       
                                        </tbody>
                                    </table>
                                    <h3 class="nameTableRecuiment">
                                        Danh sách ứng viên được chấp nhận
                                    </h3>
                                    <table class="tableListRecruiment" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tên người ứng tuyển</th>
                                                <th>Ngày ứng tuyển</th>
                                                <th>Xem hồ sơ</th>
                                                <th>Chấp nhận / Từ chối</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($postRecruitment->applyRecruitments()->where('approve', 1)->get() as $key => $item)
                                            <tr>
                                                <td>{{ $item->jobseeker->name }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <p style="cursor: pointer; padding: 0; color: #194983; font-weight: bold;" onclick="window.open('{{ asset($item->jobseeker->profile->link_profile) }}', '_blank')">Xem hồ sơ</p>
                                                </td>
                                                <td>
                                                    Chấp nhận
                                                </td>
                                                <td>Đã tiếp nhận</td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                    <h3 class="nameTableRecuiment">
                                        Danh sách ứng viên từ chối
                                    </h3>
                                    <table class="tableListRecruiment" border="0" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tên người ứng tuyển</th>
                                                <th>Ngày ứng tuyển</th>
                                                <th>Xem hồ sơ</th>
                                                <th>Chấp nhận / Từ chối</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($postRecruitment->applyRecruitments()->where('reject', 1)->get() as $key => $item)
                                            <tr>
                                                <td>{{ $item->jobseeker->name }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <p style="cursor: pointer; padding: 0; color: #194983; font-weight: bold;" onclick="window.open('{{ asset($item->jobseeker->profile->link_profile) }}', '_blank')">Xem hồ sơ</p>
                                                </td>
                                                <td>
                                                    Từ chối
                                                </td>
                                                <td>Đã tiếp nhận</td>
                                            </tr>
                                            @endforeach 
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
</div>
</div>
<script>
var urlParams = new URLSearchParams(window.location.search);

function filterListRecruitment() {
    urlParams.delete('keyword');

    if ($('#searchName').val() != '') {
        urlParams.set('keyword', $('#searchName').val());
    }

    var newURL = window.location.pathname + '?' + urlParams.toString();

    window.location.href = newURL;
}

function changeApprove(idItem, status) {
    let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('approve', status);
        formData.append('id', idItem);

        jQuery.ajax({
            url: `{{ route('changeApprove') }}`, 
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