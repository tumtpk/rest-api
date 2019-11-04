<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<script>
var base_url = '<?php echo base_url() ?>';
$(document).ready(function() {
    $("#logout").click(function() {
        window.localStorage.removeItem('token');
        window.location.href = base_url + "auth/logoutSystem";
    });

    $.ajaxSetup({
        beforeSend: function(xhrObj) {
            xhrObj.setRequestHeader("Authorization", "Bearer " + localStorage.token)
        }
    });

    $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
        if (jqxhr.status == 401) {
            alert(jqxhr.status + ' ' + thrownError);
        } else {
            alert(jqxhr.status + ' ' + thrownError);
        }
    });

    $.extend(true, $.fn.dataTable.defaults, {
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "ไม่พบข้อมูล",
            "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
            "infoEmpty": "ไม่พบข้อมูล",
            "infoFiltered": "(กรอง 1 จากทั้งหมด _MAX_ รายการ)",
            "lengthMenu": "_MENU_ รายการ",
            "zeroRecords": "ไม่พบข้อมูล",
            "oPaginate": {
                "sFirst": "หน้าแรก", // This is the link to the first page
                "sPrevious": "ก่อนหน้า", // This is the link to the previous page
                "sNext": "ถัดไป", // This is the link to the next page
                "sLast": "หน้าสุดท้าย" // This is the link to the last page
            }
        },
        "responsive": true,
        "bLengthChange": true,
        "searching": false,
        "processing": true,
        "serverSide": true
    });
});
</script>