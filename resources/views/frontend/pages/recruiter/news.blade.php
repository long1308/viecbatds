@extends('frontend.master')
@section('title', '')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
<style>
  
</style>
<div class="profile__ntd">
    <div class="ctnr">
        <div class="box__profile">
            <div class="row">
                <div class="clm" style="--w-lg:9; --w-md:4">
                    <div class="box__left__search">
                        <div class="box_inner__save">
                            <div class="box_list_job">
                                <div class="filter__save">

                                    <input type="hidden" value="1" name="searchok" autocomplete="off">
                                    <div class="box_filter__save filter__new">
                                        <span>Bộ lọc<sup>*</sup></span>

                                        <div class="from_search__save_2__new">
                                            <label>Ngày từ</label>

                                            <input class="form-control date" type="text" name="date_start" placeholder="DD-MM-YYYY" value="" autocomplete="off" fdprocessedid="sipbwr">

                                        </div>
                                        <div class="from_search__save_2__new">
                                            <label>Ngày đến</label>

                                            <input class="form-control date" type="text" name="date_end" placeholder="DD-MM-YYYY" value="" autocomplete="off" fdprocessedid="fttgqj">
                                        </div>

                                        <button class="form-btn__search" type="submit" name="search" fdprocessedid="cslbh">Tìm kiếm</button>
                                    </div>

                                </div>



                                <div class="post_news">
                                    <div class="group_title_heading">
                                        <div class="title">
                                            Danh sách các tin đã đăng
                                        </div>
                                        <button class="add_news" id="addnews">
                                            <i class="fa fa-newspaper-o" aria-hidden="true"></i> Thêm tin
                                        </button>
                                        <div id="addNewsModal" class="modal">
                                            <div class="modal-content">
                                                <div class="box__post___news">


                                                    <form id="addNewsForm" action="#" method="post">
                                                        <h2>Thêm tin</h2>
                                                        <div class="rowsPost">
                                                            <label for="newsTitle">Tiêu đề:</label>
                                                            <input type="text">
                                                        </div>

                                                        <div class="rowsPost">
                                                            <label for="">Hình ảnh</label>
                                                            <input type="file">
                                                        </div>
                                                        <div class="rowsPost">
                                                            <label for="newsContent">Giới thiệu:</label>
                                                            <textarea id="newsContent" name="newsContent" required></textarea>
                                                        </div>
                                                        <div class="rowsPost">
                                                            <label for="newsContent">Nội dung:</label>
                                                            <textarea id="newsContent" name="newsContent" required></textarea>
                                                        </div>

                                                        <div class="group__btn__postnew">
                                                            <button class="postNews" type="submit">Thêm</button>
                                                            <button class="close"><span onclick="closeModal()">Đóng</span></button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="list_news_rows">


                                        <div class="item pt_item_new">
                                            <div class="box_new">
                                                <div class="image">
                                                    <a href="https://noibo.viecbatdongsan.com.vn/news-1/fdtytt">
                                                        <img src="https://noibo.viecbatdongsan.com.vn//upload/img_recruiter/job-1.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="box_info">
                                                    <div class="pt_content">
                                                        <h3 class="">
                                                            <a href="https://noibo.viecbatdongsan.com.vn/news-1/fdtytt">fdtytt</a>
                                                        </h3>
                                                        <div class="date_time">
                                                            Ngày tháng: 09/11/2023
                                                        </div>
                                                        <div class="list_tag">

                                                            <div class="tags">
                                                                fgfyjfyy

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="group_button_custom">
                                                        <button class="item_but hide_button" onclick="joliactivenews(1)" id="activenews" fdprocessedid="yoyatg">Hiện</button>
                                                        <button class="item_but edit_button" onclick="jolieditnews(1)" id="suanews" fdprocessedid="g65ohf">Sửa</button>
                                                        <button class="item_but delete_button" onclick="recdelnews(1)" id="deletenews" fdprocessedid="wao0pc">Xóa</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="pagination">


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="clm" style="--w-lg:3; --w-md:12;--w-sm:12; --w-xs:12">
                    <div class="box__right__profile">
                        <div class="box__inner__right__profile">
                            <button class="btn__ntds">Nhà tuyển dụng</button>
                            <div class="box__avt__profile">
                                <img src="https://noibo.viecbatdongsan.com.vn//upload/img_rec_profile/1697445816-nha-tuyen-dung.jpg" alt="">
                            </div>
                            <h2 class="name__profile__sidebar">
                                <a href="">CÔNG TY TNHH BẤT ĐỘNG SẢN ĐẤT NAM HÀ TĨNH</a>
                            </h2>
                            <div class="desc__avt">Jpg, Png, Gif (Dung lượng dưới 2,5mb)</div>
                            <form class="form__post__avt" id="postform" action="">
                                <input type="hidden" value="11" name="id_users">
                                <input type="hidden" value="6" name="id_profile">
                                <input type="hidden" value="1" name="img">
                                <input class="button_in button_title custom-file-input" type="file" name="image" id="logo" title="Thay đổi logo">
                                <label class="custom-file-label" for="logo"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z" />
                                    </svg>Thay đổi logo</label>
                            </form>
                            <button class="btn__post__new">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z" />
                                </svg>
                                Tạo tin tuyển dụng
                            </button>
                            <div class="rows__right">
                                <div class="icon__rows__right">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
                                    </svg>
                                </div>
                                <div class="desc__rows__right">
                                    Tìm kiếm ứng viên
                                </div>
                            </div>
                            <div class="rows__right">
                                <div class="icon__rows__right">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" />
                                    </svg>
                                </div>
                                <div class="desc__rows__right">
                                    Hồ sơ
                                </div>
                            </div>
                            <div class="rows__right">
                                <div class="icon__rows__right">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                        <path d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z" />
                                    </svg>
                                </div>
                                <div class="desc__rows__right">
                                    Danh sách công việc và ứng viên
                                </div>
                            </div>
                            <div class="rows__right">
                                <div class="icon__rows__right">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <path d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z" />
                                    </svg>
                                </div>
                                <div class="desc__rows__right">
                                    Hồ sơ đã lưu
                                </div>
                            </div>
                            <div class="rows__right">
                                <div class="icon__rows__right">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                        <path d="M608 96H32c-17.67 0-32 14.33-32 32v256c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V128c0-17.67-14.33-32-32-32zM304 352c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-8c0-4.42 3.58-8 8-8h224c4.42 0 8 3.58 8 8v8zM72 288v-16c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H80c-4.42 0-8-3.58-8-8zm64 0v-16c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8zm64 0v-16c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8zm64 0v-16c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8zm40-64c0 8.84-7.16 16-16 16H80c-8.84 0-16-7.16-16-16v-48c0-8.84 7.16-16 16-16h208c8.84 0 16 7.16 16 16v48zm272 128c0 4.42-3.58 8-8 8H344c-4.42 0-8-3.58-8-8v-8c0-4.42 3.58-8 8-8h224c4.42 0 8 3.58 8 8v8z" />
                                    </svg>
                                </div>
                                <div class="desc__rows__right">
                                    Tin tức
                                </div>
                            </div>
                            <div class="rows__right">
                                <div class="icon__rows__right">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" />
                                    </svg>
                                </div>
                                <div class="desc__rows__right">
                                    Đăng xuất
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById('addNewsModal');

    // Get the button that opens the modal
    var btn = document.getElementById('addnews');

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName('close')[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = 'block';
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        closeModal();
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }

    function closeModal() {
        modal.style.display = 'none';
    }
</script>
@endsection