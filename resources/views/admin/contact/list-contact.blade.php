@extends('admin.master')
@section('content')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('admin.partials.topbar', [
        'titleTab' => 'Quản lý liên hệ'
    ])
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách liên hệ
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
       
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">STT</th>
                        <th class="whitespace-nowrap">Tên</th>
                        <th class="whitespace-nowrap">Email</th>
                        <th class="whitespace-nowrap">Số điện thoại</th>
                        <th class="whitespace-nowrap">Nội dung</th>
                        <th class="text-center whitespace-nowrap">Xử lý</th>
                        <th class="whitespace-nowrap">Ngày</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listContacts as $key => $item)
                    <tr class="intro-x">
                        <td>
                            {{ $key + 1 + ( $listContacts->currentPage() - 1 )*$listContacts->perPage() }}
                        </td>
                        <td class="w-40">
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->email }}
                        </td>
                        <td>
                            {{ $item->phone }}
                        </td>
                        <td>
                            {{ $item->content }}
                        </td>
                        <td>
                            @if ($item->approve == 1)
                            <div class="flex items-center justify-center text-success" style="cursor: pointer; width: 110px;" onclick="switchContactStatus({{ $item->id }}, 0)" data-tw-toggle="modal" data-tw-target="#hidden-confirmation-modal"> <i data-lucide="check-square" class="block mx-auto" style="margin: 5px;"></i> <p>Đã xử lý</p> </div>
                            @else
                            <div class="flex items-center justify-center text-danger" style="cursor: pointer; width: 110px;" onclick="switchContactStatus({{ $item->id }}, 1)" data-tw-toggle="modal" data-tw-target="#display-confirmation-modal"> <i data-lucide="x-square" class="block mx-auto" style="margin: 5px;"></i> <p>Chưa xử lý</p> </div>
                            @endif
                        </td>
                        <td>
                            {{ date('d/m/Y', strtotime($item->created_at)) }}
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @checkPermission('delete-contact')
                                <a class="flex items-center text-danger" onclick="$('#idContact').val( {{ $item->id }} )" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" style="cursor: pointer;"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                                @endcheckPermission
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            @if ($listContacts->total() > $listContacts->perPage())
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="{{ url()->current().'?page='.'1' }}"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                    </li>

                    <li class="page-item"> <a class="page-link" >...</a> </li>
                    @if ($listContacts->currentPage() == 1)
                        @for ($i = $listContacts->currentPage(); $i <= $listContacts->currentPage() + 2; $i++)
                            @if ($i >= 1 && $i <= $listContacts->lastPage())
                            <li @if ($i == $listContacts->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?page='.$i }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @elseif($listContacts->currentPage() == $listContacts->lastPage())
                        @for ($i = $listContacts->currentPage() - 2; $i <= $listContacts->currentPage(); $i++)
                            @if ($i >= 1 && $i <= $listContacts->lastPage())
                            <li @if ($i == $listContacts->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?page='.$i }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @else
                        @for ($i = $listContacts->currentPage() - 1; $i <= $listContacts->currentPage() + 1; $i++)
                            @if ($i >= 1 && $i <= $listContacts->lastPage())
                            <li @if ($i == $listContacts->currentPage()) class="page-item active" @else class="page-item" @endif> 
                                <a class="page-link" href="{{ url()->current().'?page='.$i }}">{{ $i }}</a> 
                            </li>
                            @endif
                        @endfor
                    @endif
                    <li class="page-item"> <a class="page-link">...</a> </li>

                    <li class="page-item">
                        <a class="page-link" href="{{ url()->current().'?page='.$listContacts->lastPage() }}"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                    </li>
                </ul>
            </nav>
            <p style="margin-right: 25px;">Trang  {{ $listContacts->currentPage() }} / {{ $listContacts->lastPage() }}</p>
            @endif
        </div>
        <!-- END: Pagination -->
        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bạn có chắc chắn muốn xóa?</div>
                            <input type="hidden" id="idContact" name="idContact" value="">
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="deletePost()">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function deletePost(){
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('id', $('#idContact').val());

    jQuery.ajax({
        url: `{{ route('admin.deleteContactById') }}`, 
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

function switchContactStatus(contactId, contactStatus) {
    let formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('id', contactId);
    formData.append('approve', contactStatus);

    jQuery.ajax({
        url: `{{ route('admin.switchContactStatus') }}`, 
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