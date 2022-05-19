// function cfDel (msg) {
// 	if (window.confirm(msg)) {
// 		return true;
// 	}
// 		return false;
// }

$(function() {
    var tableData = $('.data-table');

    var columns = [];


    var stt = 0;

    tableData.find("thead th").each(function() {

        if ($(this).attr('data') !== undefined) {
            if ($(this).attr('orderable') !== undefined) {
                columns.push(stt);
            }

        }
        stt++;

    });


    tableData.DataTable({
        'order': [2], //Bắt đầu sắp xếp cột nào ?
        'responsive': true,
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'columnDefs': [
            { 'orderable': false, 'targets': columns }
        ],
        'language': {
            "sProcessing": "Đang xử lý...",
            "sLengthMenu": "Xem _MENU_ mục",
            "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
            "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
            "sInfoFiltered": "(được lọc từ _MAX_ mục)",
            "sInfoPostFix": "",
            "sSearch": "Tìm:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Đầu",
                "sPrevious": "Trước",
                "sNext": "Tiếp",
                "sLast": "Cuối"
            }
        }
    })
})