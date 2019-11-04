<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "ajax": {
            "url": base_url + "api/activities/search",
            "dataType": "json",
            "type": "POST",
            "data": function(data) {
                data.keyword = $("#search").val()
            }
        },
        "order": [
            [2, "asc"]
        ],
        "columns": [
            null,
            {
                "data": 'activity_name'
            },
            {
                "data": "start_date"
            },
            {
                "data": "end_date"
            }
        ],
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0]
            },
            {
                "targets": 0,
                "data": null,
                "render": function(data, type, full, meta) {
                    return meta.row + 1;
                }
            },
            {
                "targets": 4,
                "data": null,
                "render": function(data, type, full, meta) {
                    return '<p> <button type="button" class="btn btn-primary btn-warning" > <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข </button> ' +
                        '<button type="button" class="btn btn-default btn-danger" onclick="comfirm_delete(' +
                        data.activity_id + ',\'' + data.activity_name +
                        '\')"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ </button>' +
                        '</p>';
                }
            }
        ]
    });

    $("#form-search").submit(function() {
        event.preventDefault();
        table.ajax.reload();
    })

});

function comfirm_delete(id, name) {
    var txt;
    var r = confirm("คุณค้องการลบ " + name + " ใช่หรือไม่");
    if (r == true) {
        $.get(base_url + "api/activities/delete", {
                id: id
            },
            function(data, textStatus, jqXHR) {
                if (data.status) {
                    alert("บันทึกสำเร็จ");
                    window.location.reload();
                } else {
                    alert("บันทึกไม่สำเร็จ");
                }
            }
        );
    }
}
</script>