<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        @if (isset($header['icon-website']))
        <link rel="shortcut icon" href="{{ asset($header['icon-website']) }}">
        @endif
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Đăng nhập hệ thống quản trị</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('asset_admin/dist/css/app.css') }}" />
        <!-- END: CSS Assets-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('asset_admin/src/common.js') }}"></script>
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <div class="my-auto">
                        <div style="margin-bottom: 10rem;">
                            <img src="{{ asset('/storage/bivaco-brand-white-no-background.png') }}" alt="" style="z-index: 10000;
                            position: absolute;
                            width: 25%;">
                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Hệ thống quản trị
                        </h2>
                        <div class="intro-x mt-8">
                            <input name="email" type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Email">
                            <input name="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Mật khẩu">
                        </div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                                <label class="cursor-pointer select-none" for="remember-me">Ghi nhớ đăng nhập</label>
                            </div>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" onclick="loginAdmin()">Đăng nhập</button>
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        
        <script>
        $(document).keypress(function(event) {
            if (event.which === 13) {
                loginAdmin();
            }
        });
        
        function loginAdmin(){
            let formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('email', $('input[name="email"]').val());
            formData.append('password', $('input[name="password"]').val());

            jQuery.ajax({
                url: `{{ route('admin.loginAdmin') }}`, 
                method: 'POST', 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    window.location.href = '{{ route('admin.index') }}';
                },
                error: function(error) {
                    console.error('Lỗi khi gọi API: ', error);
                    alert('Tài khoản hoặc mật khẩu không chính xác!');
                }
            });
        }
        </script>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('asset_admin/dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
    </body>
</html>