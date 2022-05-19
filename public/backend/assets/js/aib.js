$(document).ready(function () {
    $("#accordion").accordion({
        'collapsible': true,
        'active': null,
        'heightStyle': 'content'
    });
    $('.jquery').each(function () {
        eval($(this).html());
    });
    $('.button').button();
});
if ($("#player").length) {
    const player = new Plyr('#player');
}
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
// iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
})
// Red color scheme for iCheck
$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass: 'iradio_minimal-red'
})
// Flat red color scheme for iCheck
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
})
var date = new Date();
var seconds = date.getSeconds();
var minutes = date.getMinutes();
var hour = date.getHours();
$('#datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd ' + hour + ':' + minutes + ':' + seconds
    // startDate: date
})
$('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd ' + hour + ':' + minutes + ':' + seconds
    // startDate: date
})
$(function () {
    // Initialize Select2 Elements
    $('.select2').select2()
})
jQuery(function ($) {
    $('body').on('click', '#selectall', function () {
        $('.singlechkbox').prop('checked', this.checked);
    });
    $('body').on('click', '.singlechkbox', function () {
        if ($(".singlechkbox").length == $(".singlechkbox:checked").length) {
            $("#selectall").prop("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
    });
});
$('.del-confirm').click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: 'Xác nhận Xóa ?',
        text: "Không thể khôi phục sau khi Xóa !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        } else {
            Swal.fire(
                'Đã hủy !',
                'Bạn chưa Xóa gì cả !',
                'error'
            )
        }
    })
});

$('.change-confirm').click(function(event) {
    var form = $(this).closest("form");
    // alert(form);
    event.preventDefault();
    Swal.fire({
        title: 'Đổi ngôn ngữ?',
        text: "Bạn sẽ chuyển sang ngôn ngữ vừa chọn",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận!',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        } else {
            Swal.fire(
                'Đã hủy!',
                'Chưa chuyển',
                'error'
            )
        }
    })
});

$('.change-confirm-product').click(function(event) {
var form = $("#edit-product");
// alert(form);
event.preventDefault();
Swal.fire({
title: 'Đổi ngôn ngữ?',
text: "Bạn sẽ chuyển sang ngôn ngữ vừa chọn",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Xác nhận!',
cancelButtonText: 'Hủy'
}).then((result) => {
if (result.isConfirmed) {
    form.submit();
} else {
    Swal.fire(
        'Đã hủy!',
        'Chưa chuyển',
        'error'
    )
}
})
});

$("#changelanguage  li a span").click(function() {
    const id = $(this).attr('id');
    // alert(id);
    $("input#inputchange").val(id);
});
// disable alert waring datatable
$.fn.dataTable.ext.errMode = 'none';
