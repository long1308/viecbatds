{{--<div class="box__slide p-relative">
    @if(isset( $home['banner-header']->childs))
    <div class="slide p-relative">
        @foreach( $home['banner-header']->childs()->get() as $item)
        <div class="slide__item"><a href="{{$item->link}}"><img src="{{ asset($item->image_path) }}" alt="{{$item->name}}"></a></div>
        @endforeach
    </div>
    @endif
    <div class="inner__slide p-absolute">
        <div class="ctnr w-100">
            <div class="box__register">
                <div class="form__register">
                    <form action="">
                        <div class="input__search">
                            <input type="text" name="keyword" placeholder="Tìm kiếm cơ hội việc làm" @if (request()->input('keyword'))
                            value="{{ request()->input('keyword') }}"
                            @endif>
                            <button type="button" onclick="filterPost()"><img src="{{ asset('frontend/images/timngay__image.png') }}" alt=""></button>
                        </div>
                        <div class="group__select d-flex js-between">
                            <select class="option__jobs" name="categoryId" id="categoryId">
                                <option value="default">Ngành nghề</option>
                                @foreach (\App\Models\CategoryRecruitment::all() as $item)
                                <option value="{{ $item->id }}" @if (request()->input('categoryId') ==  $item->id) selected @endif>{{ $item->name }}</option>
                                @endforeach

                            </select>
                            <select name="addressId" class="option__adress" id="addressId">
                                <option value="default">Địa điểm</option>
                                @foreach (\App\Models\AddressInformation::all() as $item)
                                <option value="{{ $item->id }}" @if (request()->input('addressId') ==  $item->id ) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    @if(isset($home['banner-header']))
                    <div class="box__slide__video">
                        <a href="{{$home['banner-header']->link}}"><img src="{{ asset( $home['banner-header']->image_path) }}" alt="{{ $home['banner-header']->name}}"></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>--}}
<script>
var urlParams = new URLSearchParams(window.location.search);

function filterPost() {
    urlParams.delete('keyword');
    urlParams.delete('categoryId');
    urlParams.delete('addressId');

    if ($('input[name="keyword"]').val() != '') {
        urlParams.set('keyword', $('input[name="keyword"]').val());
    }

    if ($('select[name="categoryId"]').val() != 'default') {
        urlParams.set('categoryId', $('select[name="categoryId"]').val());
    }

    if ($('select[name="addressId"]').val() != 'default') {
        urlParams.set('addressId', $('select[name="addressId"]').val());
    }

    var newURL = '{{ route('filterJob') }}' + '?' + urlParams.toString();

    window.location.href = newURL;
}
</script>