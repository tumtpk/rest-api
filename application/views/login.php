<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form id="login">
                    <div class="form-group">
                        <label>username</label>
                        <input type="username" class="form-control" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-default">เข้าสู่ระบบ</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    var base_url = '<?php echo base_url() ?>';
    $(document).ready(function() {

        $('#login').submit(function(e) {
            e.preventDefault();
            let form = $(this).serialize();
            $.post(base_url + "api/Auth/login", form,
                function(data, textStatus, jqXHR) {
                    if (data.status) {
                        alert("เข้าสู่ระบบสำเร็จ");
                        window.localStorage.setItem('token', data.token);
                        window.location.reload();
                    } else {
                        alert(data.message);
                    }
                }
            );
        });

    });
    </script>
</body>

</html>