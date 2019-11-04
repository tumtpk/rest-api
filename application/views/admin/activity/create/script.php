<script>
$(document).ready(function() {
    let start = $("#start_date");
    let end = $("#end_date");

    start.datepicker({
        dateFormat: 'yy-mm-dd'
    });

    start.change(function() {
        end.datepicker("option", "minDate", getDate(start));
    });

    end.datepicker({
        dateFormat: 'yy-mm-dd'
    });

    end.change(function() {
        start.datepicker("option", "maxDate", getDate(end));
    });

    function getDate(target) {
        var date = target.val();
        if (!date) {
            date = null;
        }
        return date;
    }

    // validate
    $("#form").validate({
        rules: {
            activity_name: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
                required: true
            }
        },
        messages: {
            activity_name: {
                required: "กรอกชื่อกิจกรรม"
            },
            start_date: {
                required: "กรอกวันที่เริ่ม"
            },
            end_date: {
                required: "กรอกวันที่สิ้นสุด"
            }
        },
    });

    // submit value
    $("#form").submit(function(e) {
        e.preventDefault();
        let isvalid = $(this).valid();
        if (isvalid) {
            let formdata = $(this).serialize();
            $.post(base_url + "api/activities/create", formdata,
                function(data, textStatus, jqXHR) {
                    if (data.status) {
                        alert("บันทึกสำเร็จ");
                        window.location.href = base_url + "admin/dashboard"
                    } else {
                        alert("บันทึกไม่สำเร็จ");
                    }
                }
            );
        }
    });
});
</script>