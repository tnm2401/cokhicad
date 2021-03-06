<script src="{{ asset('backend') }}/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/assets/js/jquery-ui.js"></script>
<script src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('backend') }}/bower_components/bootstrap-validate/dist/bootstrap-validate.js"></script>
<script src="{{ asset('backend') }}/bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('backend') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="{{ asset('backend') }}/bower_components/DataTables/datatables.min.js"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('backend') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('backend') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('backend') }}/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('backend') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Sparkline -->
<!-- jvectormap  -->
<script src="{{ asset('backend') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('backend') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- ChartJS -->
<script src="{{ asset('backend') }}/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('backend')}}/dist/js/pages/dashboard2.js"></script> --}}
<!-- AdminLTE App -->
<script src="{{ asset('backend') }}/dist/js/adminlte.min.js"></script>
<script src="{{ asset('backend') }}/plugins/jQueryfiler/js/jquery.filer.min.js"></script>
<script src="{{ asset('backend') }}/plugins/jQueryfiler/examples/dragdrop/js/custom.js" type="text/javascript">
</script>
{{-- <script src="{{asset('backend')}}/assets/js/jquery.pjax.js"></script> --}}
<script src="{{ asset('backend') }}/assets/js/pace.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plyr.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/assets/js/script.js"></script>
<script src="{{ asset('backend') }}/plugins/ckeditor/ckeditor.js"></script>
<script src="{{ asset('backend') }}/plugins/ckfinder/ckfinder.js"></script>
<script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2@11.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
{{-- <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script> --}}
<script type="text/javascript" src="{{ asset('backend') }}/src/js/jquery.tree.js"></script>
<script src="{{ asset('backend') }}/assets/js/aib.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: "{{ route('backend.dashboard.index') }}/laravel-filemanager?type=images",
        filebrowserImageUploadUrl: "{{ route('backend.dashboard.index') }}/laravel-filemanager/upload?type=images&_token={{ csrf_token() }}",
        filebrowserBrowseUrl: "{{ route('backend.dashboard.index') }}/laravel-filemanager?type=Images",
        filebrowserUploadUrl: "{{ route('backend.dashboard.index') }}/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}"
    };
</script>
<script>
    function AutoSlug() {
        @foreach($language as $lang)
        var name_{{$lang->locale}}, slug_{{$lang->locale}};
        //L???y text t??? th??? input name_{{$lang->locale}}
        name_{{$lang->locale}} = document.getElementById("name_{{$lang->locale}}").value;
        //?????i ch??? hoa th??nh ch??? th?????ng
        slug_{{$lang->locale}} = name_{{$lang->locale}}.toLowerCase();
        //?????i k?? t??? c?? d???u th??nh kh??ng d???u
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/i|??|??|???|??|???/gi, 'i');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/??|???|???|???|???/gi, 'y');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/??/gi, 'd');
        //X??a c??c k?? t??? ?????t bi???t
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/ /gi, "-");
        //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
        //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/\-\-\-\-\-/gi, '-');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/\-\-\-\-/gi, '-');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/\-\-\-/gi, '-');
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/\-\-/gi, '-');
        //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
        slug_{{$lang->locale}} = '@' + slug_{{$lang->locale}} + '@';
        slug_{{$lang->locale}} = slug_{{$lang->locale}}.replace(/\@\-|\-\@|\@/gi, '');
        //In slug_{{$lang->locale}} ra textbox c?? id ???slug_{{$lang->locale}}???
        document.getElementById('slug_{{$lang->locale}}').value = slug_{{$lang->locale}};
        @endforeach}
</script>
<script type="text/javascript">
  var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};
  if (has_errors) {
    Swal.fire({
      title: 'L???i !',
      icon: 'error',
      html: jQuery('.show__errors').html(),
      showCloseButton: true,
    });
  }
</script>
<script>
    $(document).ready(function() {
        $(".tag").select2({
            theme: "bootstrap-5",
            tags: true,
            tokenSeparators: [',']
        })
    });
</script>
<script>
    function previewImages() {
            var $preview = $('#preview').empty();
            if (this.files) $.each(this.files, readAndPreview);
            function readAndPreview(i, file) {
              if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                  // Swal.fire(
                  //     'Sai ?????nh d???ng',
                  //     file.name + ' kh??ng ph???i l?? h??nh ???nh',
                  //     'error'
                  // )
                  alert('Vui l??ng ch???n ?????nh d???ng h??nh ???nh !');
              } else {
                var reader = new FileReader();
                $(reader).on("load", function() {
                    $preview.append($("<img/>", {
                        src: this.result,
                        width: 106,
                        height: 72,
                    }));
                });
              }
              reader.readAsDataURL(file);
            }
        }
        $('#file-input').on("change", previewImages);
</script>
