@extends('backend.layout.master')
@section('title', 'Trình biên tập mã nguồn')
@section('content')
    <div class="content-wrapper" id="pjax-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                Trình biên tập mã nguồn
            </h4>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
                <li><a>Mã nguồn</a></li>
                <li class="active">Chỉnh sửa</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-body">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="card-box ">
                        <h4 class="header-title mb-3">Mã nguồn</h4>
                        <div id="">
                            <div class="list-group">
                                <ul class="pl-0">
                                    {{-- <li class="folder-name">
                                        <a href="javascript:void(0)" id="open-folder" class="open-folder text-primary"
                                            data-path="folder_app"><i class="fa-duotone fa-folder"></i> app</a>
                                        <ul class="parent-folder" id="folder_app">
                                            {{ scan_full_dir('../app') }}
                                        </ul>
                                    </li>
                                    <li class="folder-name">
                                        <a href="javascript:void(0)" id="open-folder" class="open-folder text-primary"
                                            data-path="folder_public"><i class="fa-duotone fa-folder"></i> public</a>
                                        <ul class="parent-folder" id="folder_public">
                                            {{ scan_full_dir('../public') }}
                                        </ul>
                                    </li>
                                    <li class="folder-name">
                                        <a href="javascript:void(0)" id="open-folder" class="open-folder text-primary"
                                            data-path="folder_resources"><i class="fa-duotone fa-folder"></i> resources</a>
                                        <ul class="parent-folder" id="folder_resources">
                                            {{ scan_full_dir('../resources') }}
                                        </ul>
                                    </li>
                                    <li class="folder-name">
                                        <a href="javascript:void(0)" id="open-folder" class="open-folder text-primary"
                                            data-path="folder_routes"><i class="fa-duotone fa-folder"></i> routes</a>
                                        <ul class="parent-folder" id="folder_routes">
                                            {{ scan_full_dir('../routes') }}
                                        </ul>
                                    </li>
                                    <li class="folder-name">
                                        <a href="javascript:void(0)" id="open-folder" class="open-folder text-primary"
                                            data-path="folder_vendor"><i class="fa-duotone fa-folder"></i> vendor</a>
                                        <ul class="parent-folder" id="folder_vendor">
                                            {{ scan_full_dir('../vendor') }}
                                        </ul>
                                    </li> --}}
                                    {{ scan_full_dir('../../aibcms.local') }}



                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-md-8">
                    <form id="put-content-file" class="loading-file" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card-box">
                            <h4 class="header-title mb-3">Nội dung : <span class="path_file"></span></h4>
                            <div class="autohide-scroll view-source bg-listSource">
                                <div id="editor" class="views-source"></div>
                                <input class="hidden" name="dir" id="dir-file">
                                <textarea class="hidden" name="put_file"></textarea>

                            </div>
                        </div>
                        <div class="">
                            <a href="{{ route('sources.index') }}" class="btn btn-danger waves-effect waves-light"><span
                                    class="icon-button"><i class="fa-regular fa-arrow-rotate-left"></i></span> Hủy</a>
                            <button id="submit" type="submit"
                                class="btn btn-primary float-right waves-effect width-md waves-light" name="send"
                                value="save"><span class="icon-button"><i class="fa-regular fa-floppy-disk"></i></span>
                                Lưu</button>

                        </div>
                    </form>

                </div>
            </div>
                </div>
            </div>
        </section>
        <!-- end row -->
    </div> <!-- end container-fluid -->

@endsection
@push('style')
    <style type="text/css">
        img {
            max-width: 100%;
        }

        /*a {*/
        /*    color: #0078bd;*/
        /*}*/
        /*a:hover{*/
        /*    color: #428bca;*/
        /*}*/
        .required {
            color: #e83e8c;
        }

        .modal-lg {
            min-width: auto;
            max-width: fit-content;
        }

        .table td,
        .table th {
            vertical-align: middle !important;
        }

        div.checkbox {
            line-height: 18px;
        }

        .tabs-bordered li a {
            padding: 17px 20px !important;
        }

        .item-input {
            cursor: pointer;
        }

        .photo-hover-overlay {
            z-index: 3;
            background: rgba(49, 55, 61, .75);
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            -webkit-transition: opacity .1s ease-in-out;
            transition: opacity .1s ease-in-out;
        }

        .box-hover-overlay {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-align: end;
            -webkit-align-items: flex-end;
            -ms-flex-align: end;
            align-items: flex-end;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 100%;
        }

        .box-hover-overlay a {
            cursor: pointer;
        }

        .slider-holder.ui-sortable {
            width: calc(100% + 15px);
            margin-left: -5px;
            margin-top: 5px;
            margin-bottom: 5px;
            list-style-type: none;
        }

        .slider-holder.ui-sortable li {
            width: calc(20%);
            /*height: 100%!important;*/
            float: left;
            padding-left: 10px;
            margin-top: 10px;
            cursor: move;
            background: transparent;
            box-shadow: none;
        }

        .slider-holder.ui-sortable li:first-child {}

        .slider-holder li .item-image {
            background: #fafbfc;
            padding: 0;
            width: 100%;
            padding-bottom: 100%;
            overflow: hidden;
        }

        .slider-holder li .item-image:before {
            z-index: 1;
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border: 1px solid rgba(195, 207, 216, .3);
        }

        .box-product-images:hover .photo-hover-overlay {
            opacity: 1;
        }

        .position-image-product {
            position: absolute;
            max-width: 100%;
            max-height: 100%;
            display: block;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            image-orientation: from-image;
        }

        .table thead th {
            border-bottom: none;
        }

        .bootstrap-tagsinput .label-info {
            /*background: #cae9f7;*/
            /*color:#005e94 ;*/
            padding: 5px;

        }

        .btn-primary:hover {
            background: -webkit-gradient(linear, left top, left bottom, from(#0078bd), to(#0377b9));
            background: linear-gradient(to bottom, #0078bd, #0377b9);
            border-color: #065f92;
            -webkit-box-shadow: inset 0 1px 0 0 #0078bd;
            box-shadow: inset 0 1px 0 0 #0078bd;
            color: #fff;
            outline: none;
        }

        .checkbox label::before {
            border: 2px solid #58b3f0;
        }

        .checkbox input[type=checkbox]:checked+label::after {
            border-color: #58b3f0;
        }

        .card-box {
            background: #fff;
            border-radius: 3px;
            box-shadow: unset;
            /*box-shadow: 0 2px 4px rgb(0 0 0 / 10%);*/
        }

        .btn-primary {
            background: -webkit-gradient(linear, left top, left bottom, from(#4d97c1), to(#3995ca));
            background: linear-gradient(to bottom, #4d97c1, #3995ca);
            border-color: #2d8ec5;
            -webkit-box-shadow: inset 0 1px 0 0 #0078bd;
            box-shadow: inset 0 1px 0 0 #519dca;
            color: #fff;
            outline: none;
        }

        .btn-default {
            color: #333;
            background: #fff;
            border-color: #c4cdd5;
        }

        .form-control {
            overflow: hidden;
        }

        .checkbox-primary input[type=checkbox]:checked+label::before {
            background: -webkit-gradient(linear, left top, left bottom, from(#4d97c1), to(#3995ca));
            background: linear-gradient(to bottom, #4d97c1, #3995ca);
            border-color: #4d97c1;
        }

        .checkbox-primary {}

        label {
            font-size: 15px;
        }

        input.slug {
            min-width: 75px;
            width: 100%;
        }

        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .edit-seo {
            position: absolute;
            right: 2.2rem;
        }

        .title-seo {
            /*min-height: 21px;*/
            display: block;
            font-size: 15px;
            color: #1a0dab;
            line-height: 21px;
            margin-bottom: 2px;
            white-space: pre;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .slug-seo {
            display: block;
            word-wrap: break-word;
            color: #006621;
            font-size: 13px;
            line-height: 20px;
            margin-bottom: 4px;
        }

        .description-seo {
            display: block;
            color: #545454;
            line-height: 18px;
            font-size: 13px;
        }

        .qtv {
            display: inline;
            vertical-align: middle;
            font-style: normal;
            background-color: #eebc49;
            color: #222;
            font-size: 10px;
            padding: 5px 5px 3px 5px;
            border-radius: 2px;
            width: auto;
            height: auto;
            line-height: 1;
            margin-left: 5px;
        }

        /*.select2-container .select2-selection--single .select2-selection__rendered, .select2-container .select2-selection--multiple .select2-search__field {*/
        /*    font-weight: 600;*/
        /*}*/
        .fade {
            opacity: 1;
            -webkit-transition: opacity .15s linear !important;
            -o-transition: opacity .15s linear !important;
            transition: opacity .15s linear !important;
            padding-right: 0 !important;
        }

        .modal.fade .modal-dialog {
            -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            -o-transform: translate(0, -25%);
            transform: translate(0, -25%);
            -webkit-transition: -webkit-transform .3s ease-out;
            -o-transition: -o-transform .3s ease-out;
            transition: -webkit-transform .3s ease-out;
            transition: transform .3s ease-out;
            transition: transform .3s ease-out, -webkit-transform .3s ease-out, -o-transform .3s ease-out;
        }

        .modal.show .modal-dialog {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }

        .note-editor.note-frame {
            border: 1px solid #d1d1d1;
        }

        .card-header.note-toolbar {
            border-bottom: 1px solid #d1d1d1;
        }

        .dropdown-toggle:empty::after {
            margin-left: 0;
        }

        .dropdown-toggle:empty::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
        }

        .select2-container--open .select2-dropdown--below {
            z-index: 9999;
        }

        .show-box-update {
            display: none;
        }

        .box-action-image img,
        .box-action-background img {
            max-height: 300px;
        }

        .box-position {
            position: absolute;
            bottom: 10px;
            right: 2rem;
        }

        .show-box,
        .show-box-bg,
        .show-box-logo,
        .show-box-favicon,
        .show-box-watermark,
        .show-one-box,
        .show-multiple-box {
            display: none;
        }

        .change-sort {
            position: absolute;
            top: 30%;
            right: 30%;
        }

        .bootstrap-tagsinput {
            min-height: 80px;
            vertical-align: top;
        }

        .list-group li {
            list-style: none;
            cursor: pointer;
            font-weight: 600;
        }

        .parent-folder {
            padding-left: 10px;
            display: none;
        }

        .parent-folder>li:before,
        .list-group>ul>li:before {
            background-image: url(https://coderthemes.com/adminox/layouts/vertical/assets/images/plugins/jstree.png);
            background-position: -132px -4px;
            padding-left: 30px;
            width: 24px;
            height: 28px;
            line-height: 28px;
            font-size: 15px;
            overflow: hidden;
            content: "";
        }

        .ace_scrollbar-v {
            overflow-y: hidden !important;
        }

        .toast-top-right {
            top: 12px;
            right: 0;
        }

        #toast-container {
            position: fixed;
            z-index: 999999;
            pointer-events: none;
        }

        .toast-message {
            font-size: 14px;
        }

        #toast-container>div {
            position: relative;
            pointer-events: auto;
            overflow: hidden;
            margin: 0 0 6px;
            padding: 15px 15px 15px 50px;
            width: 300px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            background-position: 15px center;
            background-repeat: no-repeat;
            -moz-box-shadow: 0 0 12px #999;
            -webkit-box-shadow: 0 0 12px #999;
            box-shadow: 0 0 12px #999;
            color: #fff;
            opacity: 1;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
            filter: alpha(opacity=100);
        }

        #toast-container>.toast-success {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==) !important;
        }

        #toast-container>.toast-error {
            background-image: url('../images/errors.png') !important;
            background-size: 30px 30px;
        }

        .toast-success {
            background-color: #51a351;
            opacity: 1;
        }

        .toast-error {
            background-color: #d9534f;
            opacity: 1;
        }

        .toast-info {
            opacity: 1;
        }

        .toast-warning {
            opacity: 1;
        }

        #toast-container * {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .toast-title {
            font-weight: 700;
        }

        #toast-container>div:hover {
            -moz-box-shadow: 0 0 12px #000;
            -webkit-box-shadow: 0 0 12px #000;
            box-shadow: 0 0 12px #000;
            opacity: 1;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
            filter: alpha(opacity=100);
            cursor: pointer;
        }

        .path_file {
            text-transform: initial;
        }

        ul.grid {
            padding: 0;
            margin: 0;
        }

        .grid-gallery li,
        li#item {
            list-style: none;
        }

        .icon-img img {
            display: inline-block;
            width: 16px;
            height: 16px;
            vertical-align: -3px;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .tree-sub {
            background-image: url(https://coderthemes.com/adminox/layouts/vertical/assets/images/plugins/jstree.png);
            background-position: -132px -4px;
            padding-left: 30px;
            width: 24px;
            height: 28px;
            line-height: 28px;
            font-size: 15px;
            overflow: hidden;
        }

        .menu_action {
            position: absolute;
            display: inline-block;
            right: 5px;
            top: 9px;
        }

        .dd-handle {
            cursor: pointer;
            /*background-color: #5553ce!important;*/
            /*border-color: #5553ce;*/
            padding: 16px !important;
            font-weight: 600 !important;
            /*color: #fff!important;*/
        }

        .dd-list .dd-item button[class^=dd-collapse],
        .dd-list .dd-item button[class^=dd-expand] {
            display: none;
        }

        .dd-list .dd-item button[class^=btn] {
            color: #fff !important;
            border-color: #fff !important;
            height: auto !important;
            width: auto !important;
            font-size: .8rem !important;
        }

        .dd-list .dd-item .dd-handle {
            min-height: 54px;
        }

        .menu_action a {
            border: 1px solid #fff;
        }

        .select2-container .select2-selection--multiple .select2-selection__choice {
            margin-right: 3px !important;
        }

        .select-category .select2-container .select2-selection--multiple .select2-selection__choice {
            display: table;
            float: unset;
            margin-right: 0 !important;
        }

        .mce-tooltip {
            display: none !important;
        }

        @media (max-width: 420px) {
            .w-xs-100 {
                width: 100%;
            }
        }


        .file-name {
            word-wrap: break-word;
        }

        .hidden {
            display: none;
        }

        #editor,
        .view-source {
            height: 600px !important;
        }

    </style>
@endpush
@push('script')
    <script src="{{ asset('backend') }}/plugins/editcode/ace.js" type="text/javascript"></script>
    <!-- scrollbar init-->
    <script src="https://coderthemes.com/adminox/layouts/vertical/assets/js/pages/scrollbar.init.js"></script>

    <script>
        $(document).on('click', '#open-folder', function() {
            var path = $(this).attr('data-path');
            var result = $('#' + path);
            if (result.css('display') == 'block') {
                result.slideUp();
            } else {
                result.slideDown();
            }
        })


        $(document).on('click', '#open-sub-folder', function() {
            var path = $(this).attr('data-path');
            var result = $('#' + path);
            if (result.css('display') == 'block') {
                result.slideUp();
            } else {
                result.slideDown();
            }

        })
        $(document).on("click", "#show-file", function() {
            var white_list = ['html', 'ctp', 'txt', 'xml', 'css', 'js', 'php', 'env'];
            var ext = $(this).attr('data-ext');
            var path = $(this).attr('data-path');
            if (path != 'undefined' && ext != 'undefined' && $.inArray(ext, white_list) > -1) {
                loadContentFile(path, ext)
            }
        });

        function loadContentFile(path, ext) {

            if (typeof ace != "undefined" && typeof require != "undefined") {

                var editor = ace.edit("editor");
                var url = '{{ route('ajax.load.sources') }}';
                // editor.setOptions({
                //   enableBasicAutocompletion: true
                // });
                if (typeof ext != "undefined" && ext.length > 0) {
                    switch (ext) {
                        case 'css':
                            editor.session.setMode("ace/mode/css");
                            break;
                        case 'js':
                            editor.session.setMode("ace/mode/javascript");
                            break;
                        case 'php':
                            editor.session.setMode("ace/mode/php");
                            break;
                        default:
                            editor.session.setMode("ace/mode/html");
                            break;
                    }
                }

                editor.getSession().setUseWrapMode(true);
                editor.setBehavioursEnabled(true);
                editor.renderer.setOption('showLineNumbers', true);
                editor.setTheme("ace/theme/monokai");

                $.ajax({
                    async: true,
                    url: url,
                    type: 'get',
                    data: {
                        path: path
                    },
                    dataType: 'html',
                    success: function(response) {
                        $('#dir-file').val(path);
                        $('span.path_file').text(path);
                        editor.setValue(response);
                    },
                    error: function(response) {

                    }
                });
            }

        }
    </script>


    <script type="text/javascript">
        var editor = ace.edit("editor");
        var textarea = $('textarea[name="put_file"]');
        editor.setTheme("ace/theme/monokai");
        editor.getSession().setUseWrapMode(true);
        editor.setBehavioursEnabled(true);
        editor.renderer.setOption('showLineNumbers', true);
        editor.session.setMode("ace/mode/php");
        editor.getSession().on("change", function() {
            textarea.val(editor.getSession().getValue());
        });
        textarea.val(editor.getSession().getValue());
        $('#submit').click(function(e) {
            e.preventDefault();
            data = $('form#put-content-file').serialize();
            var url = '{{ route('ajax.push.sources') }}';
            var _token = $('input[name="_token"]').val();
            var dir = $('#dir-file').val();
            $.ajax({
                type: "post",
                cache: false,
                url: url,
                data: data,
                success: function(response) {
                    Swal.fire({
                        // position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                error: function(response) {
                    Swal.fire({
                        // position: 'top-end',
                        icon: 'error',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        })
    </script>
@endpush
