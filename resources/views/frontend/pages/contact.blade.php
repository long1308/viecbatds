@extends('frontend.master')
@section('title', 'Liên hệ')
@section('content')
<section class="contact2__intro">
    <div class="ct2__bg p-relative">
      <div class="ctnr">
        <div class="ct2__title p-relative">
          <nav>
            <a href="">Trang chủ</a>
            <span>/</span>
            Liên hệ
          </nav>
          <h1>Liên hệ với chúng tôi</h1>
        </div>
      </div>
    </div>
  </section>
  <main>
    <div class="ctnr">
      <article class="ct2__articles">
        <div class="row">
          <div
            class="clm ct2__contact1 ta-center"
            style="--w-xs: 12; --w-md: 12; --w-lg: 4"
          >
            <span class="d-block">LIÊN HỆ</span>
            <h2>Liên hệ với chúng tôi</h2>
            <p>
              @if (isset($home['about-us']))
              {{ $home['about-us']->description }}
              @endif
            </p>
          </div>
          <div
            class="ct2__contact2 clm ta-center"
            style="--w-xs: 12; --w-md: 6; --w-lg: 4"
          >
            <ul class="ct2__list">
              <li>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 576 512"
                >
                  <path
                    d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"
                  />
                </svg>
                <div>
                  <h3>Địa chỉ</h3>
                  <p>
                    @if (isset($home['contact']['address']))
                    {{ $home['contact']['address']->description }}
                    @endif
                  </p>
                </div>
              </li>
              <li>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                  />
                </svg>
                <div>
                  <h3>Điện thoại</h3>
                  <p>@if (isset($home['contact']['phone']))
                    {{ $home['contact']['phone']->description }}
                    @endif</p>
                </div>
              </li>
            </ul>
          </div>
          <div
            class="ct2__contact2 clm ta-center"
            style="--w-xs: 12; --w-md: 6; --w-lg: 4"
          >
            <ul class="ct2__list">
              <li>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
                  />
                </svg>
                <div>
                  <h3>Email</h3>
                  <p>@if (isset($home['contact']['email']))
                    {{ $home['contact']['email']->description }}
                    @endif</p>
                </div>
              </li>
              <li>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"
                  />
                </svg>
                <div>
                  <h3>Giờ làm việc</h3>
                  <p>
                    @if (isset($home['contact']['time']))
                    {{ $home['contact']['time']->description }}
                    @endif
                  </p>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
        <div class="ct2__map">
          <div>
            {{-- <iframe
              loading="lazy"
              src="https://maps.google.com/maps?q=Hanoi,%20Vietnam&t=m&z=12&output=embed&iwloc=near"
              title="Hanoi, Vietnam"
              aria-label="Hanoi, Vietnam"
              frameborder="0"
            ></iframe> --}}
            {!! $home['contact']->content !!}
          </div>
        </div>
        <div class="ct2__feedback ta-center">
          <div class="ct2-feedback__title">
            <h2>Chúng tôi rất mong chờ sự liên hệ của bạn</h2>
            <p>
              Vui lòng điền vào những trường có dấu *
            </p>
            <form action="" class="ct2__form d-flex row js-between">
              <input type="text" name="contactName" class="clm form-focus" style="--w-xs: 12; --w-md: 6" placeholder="Tên*" required/>
              <input type="text" name="contactEmail" class="clm form-focus" style="--w-xs: 12; --w-md: 6" placeholder="Email*" required/>
              <input type="number" name="contactPhone" class="clm form-focus" style="--w-xs: 12" placeholder="Số điện thoại"/>
              <textarea
                name=""
                id="contentContact"
                cols="30"
                rows="10"
                class="clm form-focus"
                style="--w-xs: 12"
                placeholder="Nội dung"
                required
              ></textarea>
              <button type="button" class="d-flex js-center ai-center" onclick="addContact()">
                Gửi
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 448 512"
                >
                  <path
                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"
                  />
                </svg>
              </button>
            </form>
          </div>
        </div>
      </article>
    </div>
  </main>
<script>
  function addContact(){
    if ($('input[name="contactEmail"]').val() == ''
    || $('#contentContact').val() == '' 
    || $('input[name="contactPhone"]').val() == ''
    || $('input[name="contactName"]').val() == '') {
      return;
    }
    let formData = new FormData();
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('content', $('#contentContact').val());
    formData.append('phone', $('input[name="contactPhone"]').val());
    formData.append('name', $('input[name="contactName"]').val());
    formData.append('email', $('input[name="contactEmail"]').val());

    jQuery.ajax({
        url: `{{ route('addContact') }}`, 
        method: 'POST', 
        data: formData,
        contentType: false, 
        processData: false,
        success: function(response) {
            alert('Gửi liên hệ thành công!');
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