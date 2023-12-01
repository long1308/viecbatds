<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" src="{{ asset('/storage/bivaco-brand-white-no-background.png') }}" style="width: 70%;">
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('admin.index') }}" @if (url()->current() == route('admin.index')) class="side-menu side-menu--active" @else class="side-menu" @endif>
                <div class="side-menu__icon"> <i data-lucide="aperture" class="block mx-auto"></i> </div>
                <div class="side-menu__title">
                    Bảng điều khiển
                    {{-- <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div> --}}
                </div>
            </a>
            {{-- <ul class="side-menu__sub-open">
                <li>
                    <a href="index.html" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-3.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 3 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-4.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 4 </div>
                    </a>
                </li>
            </ul> --}}
        </li>

        @checkPermission('view-post')
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="package" class="block mx-auto"></i>  </div>
                <div class="side-menu__title">
                    Quản lý tuyển dụng
                </div>
                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.listRecruitment', ['type' => config('constant.type-recruitment.category')]) }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Ngành nghề tuyển dụng </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.listRecruitment', ['type' => config('constant.type-recruitment.position')]) }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Vị trí tuyển dụng </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.listAttribute') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Thuộc tính </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.listPostRecruitment') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Tin tuyển dụng </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.listUserRecruitment') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Tài khoản </div>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.information', ['type' => config('constant.type-setting.footer')]) }}?parent_id=3" @if (url()->current() == route('admin.information', ['type' => config('constant.type-setting.footer')])) class="side-menu side-menu--active" @else class="side-menu" @endif>
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Quản lý footer </div>
                    </a>
                </li> --}}
            </ul>
        </li>
        @endcheckPermission

        @checkPermission('view-category')
        <li>
            <a href="{{ route('admin.category') }}" 
                @if (Route::currentRouteName()  == 'admin.category'
                || Route::currentRouteName()  == 'admin.addCategory'
                || Route::currentRouteName()  == 'admin.editCategory') 
                class="side-menu side-menu--active" 
                @else class="side-menu" 
                @endif>
                <div class="side-menu__icon"> <i data-lucide="folder" class="block mx-auto"></i>  </div>
                <div class="side-menu__title">
                    Danh mục bài viết
                </div>
            </a>
        </li>
        @endcheckPermission

        @checkPermission('view-post')
        <li>
            <a href="{{ route('admin.post') }}" 
                @if (Route::currentRouteName() == 'admin.post' 
                || Route::currentRouteName() == 'admin.addPost'
                || Route::currentRouteName() == 'admin.editPost') 
                class="side-menu side-menu--active" 
                @else class="side-menu" 
                @endif>
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title">
                    Quản lý bài viết
                </div>
            </a>
        </li>
        @endcheckPermission

        @checkPermission('view-banner')
        <li>
            <a href="{{ route('admin.banner') }}" 
                @if (Route::currentRouteName() =='admin.banner'
                || Route::currentRouteName() =='admin.addBanner'
                || Route::currentRouteName() =='admin.editBanner') 
                class="side-menu side-menu--active" 
                @else class="side-menu" 
                @endif>
                <div class="side-menu__icon"> <i data-lucide="columns" class="block mx-auto"></i>  </div>
                <div class="side-menu__title">
                    Hình ảnh & banner
                </div>
            </a>
        </li>
        @endcheckPermission
        
        @checkPermission('view-information-web')
        <li>
            <a href="javascript:;" 
                @if (url()->current() == route('admin.information', ['type' => config('constant.type-setting.header')]) 
                || url()->current() == route('admin.information', ['type' => config('constant.type-setting.body')]) 
                || url()->current() == route('admin.information', ['type' => config('constant.type-setting.footer')])
                || Route::currentRouteName() =='admin.addInformation'
                || Route::currentRouteName() =='admin.editInformation' ) 
                class="side-menu side-menu--active" 
                @else class="side-menu" 
                @endif>
                <div class="side-menu__icon"> <i data-lucide="book" class="block mx-auto"></i>  </div>
                <div class="side-menu__title">
                    Thông tin trang
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.information', ['type' => config('constant.type-setting.header')]) }}?parent_id=1"  @if (url()->current() == route('admin.information', ['type' => config('constant.type-setting.header')])) class="side-menu side-menu--active" @else class="side-menu" @endif>
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Quản lý header </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.information', ['type' => config('constant.type-setting.body')]) }}?parent_id=2" @if (url()->current() == route('admin.information', ['type' => config('constant.type-setting.body')])) class="side-menu side-menu--active" @else class="side-menu" @endif>
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Quản lý trang chủ </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.information', ['type' => config('constant.type-setting.footer')]) }}?parent_id=3" @if (url()->current() == route('admin.information', ['type' => config('constant.type-setting.footer')])) class="side-menu side-menu--active" @else class="side-menu" @endif>
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Quản lý footer </div>
                    </a>
                </li>
            </ul>
        </li>
        @endcheckPermission

        @checkPermission('view-content-web')
        <li>
            <a href="{{ route('admin.content') }}" 
                @if (Route::currentRouteName() == 'admin.content'
                || Route::currentRouteName() =='admin.addContent'
                || Route::currentRouteName() =='admin.editContent') 
                class="side-menu side-menu--active" 
                @else class="side-menu" 
                @endif>
                <div class="side-menu__icon"> <i data-lucide="globe" class="block mx-auto"></i>  </div>
                <div class="side-menu__title">
                    Nội dung trang web
                </div>
            </a>
        </li>
        @endcheckPermission

        @checkPermission('view-banner')
        <li>
            <a href="{{ route('admin.contact') }}"
                @if (Route::currentRouteName() == 'admin.contact') 
                class="side-menu side-menu--active" 
                @else class="side-menu" 
                @endif>
                <div class="side-menu__icon"> <i data-lucide="phone" class="block mx-auto"></i>  </div>
                <div class="side-menu__title">
                    Quản lý liên hệ
                </div>
            </a>
        </li>
        @endcheckPermission

        @checkPermission('view-code')
        <li>
            <a href="{{ route('admin.code') }}" 
                @if (Route::currentRouteName() == 'admin.code'
                || Route::currentRouteName() =='admin.addCode'
                || Route::currentRouteName() =='admin.editCode') 
                class="side-menu side-menu--active" 
                @else class="side-menu" 
                @endif>
                <div class="side-menu__icon"> <i data-lucide="code" class="block mx-auto"></i>  </div>
                <div class="side-menu__title">
                    Quản lý mã code
                </div>
            </a>
        </li>
        @endcheckPermission

        @checkPermission('view-auth', 'view-role')
        <li>
            <a href="javascript:;" 
                @if (Route::currentRouteName() == 'admin.user-admin' 
                || Route::currentRouteName() == 'admin.role'
                || Route::currentRouteName() == 'admin.listRole'
                || Route::currentRouteName() == 'admin.editRole') 
                class="side-menu side-menu--active" 
                @else class="side-menu" 
                @endif>
                <div class="side-menu__icon"> <i data-lucide="users" class="block mx-auto"></i>  </div>
                <div class="side-menu__title">
                    Thành viên hệ thống
                </div>
                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
            </a>
            <ul class="">

                @checkPermission('view-auth')
                <li>
                    <a href="{{ route('admin.user-admin') }}"  @if (url()->current() == route('admin.user-admin')) class="side-menu side-menu--active" @else class="side-menu" @endif>
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Quản lý thành viên </div>
                    </a>
                </li>
                @endcheckPermission

                @checkPermission('view-role')
                <li>
                    <a href="{{ route('admin.listRole') }}" @if (url()->current() == route('admin.listRole')) class="side-menu side-menu--active" @else class="side-menu" @endif>
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Quản lý vai trò </div>
                    </a>
                </li>
                @endcheckPermission
            </ul>
        </li>
        @endcheckPermission
    </ul>
</nav>
