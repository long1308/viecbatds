<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        @if (isset($header['icon-website']))
        <link rel="shortcut icon" href="{{ asset($header['icon-website']) }}">
        @endif
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Bivaco - Quản trị</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('asset_admin/dist/css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('asset_admin/src/bonus.css') }}" />
        <!-- END: CSS Assets-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('asset_admin/src/common.js') }}"></script>
        
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://cdn.tiny.cloud/1/b2vtb365nn7gj3ia522w5v4dm1wcz2miw5agwj55cejtlox1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        
        <style>
        .ck-editor__editable {
            height: 300px;
        }
        </style>
    </head>
    <!-- END: Head -->
    <body class="py-5">

        <div class="flex mt-[4.7rem] md:mt-0">
            <!-- BEGIN: Side Menu -->
            @include('admin.partials.sidebar')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            @yield('content')

            <!-- END: Content -->
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        {{-- <div data-url="side-menu-dark-dashboard-overview-1.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
            <div class="dark-mode-switcher__toggle border"></div>
        </div> --}}
        <!-- END: Dark Mode Switcher-->

        <!-- BEGIN: JS Assets-->
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('asset_admin/dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        <script>
            var editor_config = {
              height: 450,
              path_absolute : "/",
              selector: 'textarea.my-editor',
              relative_urls: false,   
              language: 'vi',
              language_url: '{{ asset('tinymce/langs/vi.js') }}',                               
              plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image media | code | fontsizeselect | fontselect | forecolor | backcolor | bullist numlist outdent indent",
              file_picker_callback : function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
          
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                  cmsURL = cmsURL + "&type=Images";
                } else {
                  cmsURL = cmsURL + "&type=Files";
                }
          
                tinyMCE.activeEditor.windowManager.openUrl({
                  url : cmsURL,
                  title : 'Filemanager',
                  width : x * 0.8,
                  height : y * 0.9,
                  resizable : "yes",
                  close_previous : "no",
                  onMessage: (api, message) => {
                    callback(message.content);
                  }
                });
              }
            };
          
            tinymce.init(editor_config);

            editor_config.selector = '#contentParagragh';
            tinymce.init(editor_config);
        </script>  
        {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            var options = {
              filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
              filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
              filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
              filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
              height: 350,
              toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    '/',
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    '/',
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons: 'Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CreateDiv,Language,Anchor,RemoveFormat,CopyFormatting,About,ShowBlocks,Print,ExportPdf'
            };

            CKEDITOR.on('dialogDefinition', function (ev) {
                var dialogName = ev.data.name;

                if (dialogName == 'image') {
                    var dialogDefinition = ev.data.definition;

                    dialogDefinition.removeContents('Upload');
                    dialogDefinition.removeContents('advanced');
                }
            });

            CKEDITOR.replace('contentMain', options);
            CKEDITOR.replace('contentParagragh', options);
            CKEDITOR.replace('contentEditParagragh', options);
        </script> --}}
    </body>
</html>
