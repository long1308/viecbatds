<footer>
    <div class="footer__main">
        <div class="footer__top__m">
            <div class="ctnr">
                <div class="row">
                    @if(isset($footer['nghe_nghiep']))
                    <div class="clm" style="--w-lg:8 ; --w-md:12; --w-sm:12; --w-xs:12">
                        <h2 class="footer__title__top">Việc theo nghề</h2>
                        <div class="vocational__work">
                            <div class="row">
                                <div class="clm" style="--w-lg:12; --w-md:12;--w-sm:12; --w-xs:12">
                                    <ul class="list_work__jobs">
                                        @foreach($footer['nghe_nghiep'] as $item)
                                        <li class="word__jobs__item"><a href="{{route('post.checkDetailOrCategory', ['slug' => $item->key->slug])}}"> {{$item->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- <div class="clm" style="--w-lg:4;--w-md:4">
                                    <ul class="list_work__jobs">
                                        <li class="word__jobs__item"><a href=""> Môi giới bất động sản thổ cư</a>
                                        </li>
                                        <li class="word__jobs__item"><a href=""> Môi giới bất động sản dự án</a>
                                        </li>
                                        <li class="word__jobs__item"><a href=""> Môi giới bất động sản nông lâm
                                                nghiệp</a></li>
                                        <li class="word__jobs__item"><a href=""> Môi giới bất động sản cho thuê</a>
                                        </li>
                                        <li class="word__jobs__item"><a href=""> Giám đốc kinh doanh bất động
                                                sản</a>
                                        </li>
                                        <li class="word__jobs__item"><a href=""> Trưởng phòng kinh doanh bất động
                                                sản</a></li>
                                    </ul>
                                </div>
                                <div class="clm" style="--w-lg:4;--w-md:4">
                                    <ul class="list_work__jobs">
                                        <li class="word__jobs__item"><a href=""> Môi giới bất động sản thổ cư</a>
                                        </li>
                                        <li class="word__jobs__item"><a href=""> Môi giới bất động sản dự án</a>
                                        </li>
                                        <li class="word__jobs__item"><a href=""> Môi giới bất động sản nông lâm
                                                nghiệp</a></li>
                                        <li class="word__jobs__item"><a href=""> Môi giới bất động sản cho thuê</a>
                                        </li>
                                        <li class="word__jobs__item"><a href=""> Giám đốc kinh doanh bất động
                                                sản</a>
                                        </li>
                                        <li class="word__jobs__item"><a href=""> Trưởng phòng kinh doanh bất động
                                                sản</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(isset($footer['ve-chung-toi']))
                    <div class="clm" style="--w-lg:4 ;--w-md:12;--w-xs:12">
                        <div class="about__us">
                            <h2 class="footer__title__top">{{$item->name}}</h2>

                            <div class="row">
                                <div class="clm" style="--w-lg:12; --w-xs:12">
                                    <ul class="listabout abache">
                                        @foreach($footer['ve-chung-toi']->childs()->get() as $item)
                                        <li class="list__about__item"><a href="{{route('post.checkDetailOrCategory', ['slug' => $item->key->slug])}}">{{$item->name}}</a></li>
                                        @endforeach
                                        <!-- <li class="list__about__item"><a href="">Bảo vệ thông tin cá nhân</a></li>
                                        <li class="list__about__item"><a href="">Trợ giúp</a></li>
                                        <li class="list__about__item"><a href="">Quy chế hoạt động</a></li> -->
                                    </ul>
                                </div>
                                <!-- <div class="clm" style="--w-lg:6; --w-xs:12">
                                  <ul class="listabout">
                                      <li class="list__about__item"><a href="">Thỏa thuận sử dụng</a></li>
                                      <li class="list__about__item"><a href="">Bảo vệ thông tin cá nhân</a></li>
                                      <li class="list__about__item"><a href="">Trợ giúp</a></li>
                                      <li class="list__about__item"><a href="">Quy chế hoạt động</a></li>
                                  </ul>
                              </div> -->
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="ctnr">
                <div class="box__ft__bt">
                    <div class="row">
                        @if(isset($footer['information-footer']))
                        <div class="clm" style="--w-lg:3">
                            <div class="logo__footer">
                                <a href="{{$footer['information-footer']->link}}"><img src="{{$footer['information-footer']->avatar_path}}" alt=""></a>
                            </div>
                        </div>
                        @endif
                        <div class="clm" style="--w-lg:5; --w-xs:12">
                            @if(isset($footer['vietbds']))
                            <div class="adress__box">
                                <h3 class="adress__title">{{$footer['vietbds']->name}}</h3>
                                <div class="adress__item">
                                    {!!$footer['vietbds']->content!!}
                                </div>
                            </div>
                            @endif
                            @if(isset($footer['ket_noi']))
                            <div class="connect__internet d-flex">
                                <h3 class="conect__title">{{$footer['ket_noi']->name}}</h3>
                                <div class="list__icon__conect">
                                    @foreach($footer['ket_noi']->childs()->get() as $item)
                                    <div class="icon__facebook icon__border">
                                        <a href="{{$item->link}}">
                                            {!!$item->description!!}
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            @endif
                        </div>
                        @if(isset($footer['lhe']))
                        <div class="clm" style="--w-lg:4">
                            <div class="contact__media">
                                <h3 class="title__media">{{$footer['lhe']->name}}</h3>
                                {!!$footer['lhe']->content!!}
                            </div>
                            <div class="qr__media">
                                <img src="./images/qr.jpg" alt="">
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
      <div class="copy__right__footer">
      <div class="ctnr">
            <div class=" d-flex js-between">
                @if(isset($footer['copyright']))
                {{$footer['copyright']->description}}
                @endif
                <div class="back_to_top " onclick="scrollToTop()"><a class="d-flex ai-center"><span>Trở lại đầu trang</span><img src="https://noibo.viecbatdongsan.com.vn/images/icon_back_to_top.png"></a></div>
            </div>
        </div>
      </div>
    </div>
</footer>