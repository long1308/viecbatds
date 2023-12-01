<!-- BEGIN: Confirmation Modal -->
<div id="display-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="eye" class="w-16 h-16 text-success mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Hiển thị bài viết?</div>
                    <div class="text-slate-500 mt-2">
                        Bạn có chắc chắn muốn hiển thị bài viết?
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="changeEye()">Có</button>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Không</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="hidden-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="eye-off" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Ẩn bài viết?</div>
                    <div class="text-slate-500 mt-2">
                        Bạn có chắc chắn muốn ẩn bài viết?
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="changeEye()">Có</button>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Không</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="save-post-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="save" class="w-16 h-16 text-primary mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Lưu bài viết?</div>
                    <div class="text-slate-500 mt-2">
                        Để thêm mục lục thì bạn cần lưu bài viết.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="submitPost('redirectEditPost')">Có</button>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Không</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="save-success-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i>
                    <div class="text-3xl mt-5" style="font-size: 26px !important">Lưu bài viết thành công</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="redirectListPost()">OK</button>
                    {{-- <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Không</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div id="update-success-confirmation-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i>
                    <div class="text-3xl mt-5" style="font-size: 26px !important">Cập nhật bài viết thành công</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="redirectListPost()">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="save-success-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i>
                    <div class="text-3xl mt-5" style="font-size: 26px !important">Thêm thành công</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="redirectList()">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="update-success-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i>
                    <div class="text-3xl mt-5" style="font-size: 26px !important">Cập nhật thành công</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="redirectList()">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="delete-success-modal" class="modal" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="check-square" class="w-16 h-16 text-success mx-auto mt-3"></i>
                    <div class="text-3xl mt-5" style="font-size: 26px !important">Xóa thành công</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="redirectList()">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Confirmation Modal -->