<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head lang="en">
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="css/style.css" rel="stylesheet">

    <!--- Bootstrap 5.3  --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- JQuery 3.6.0 -->
    <script rel="preconnect" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/jquery.validate.min.js"></script>

    <style>
        .help-block {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container py-4 border-bottom">
        <div class="row">
            <div class="col-4"><img src="logo.png"></div>
        </div>
    </div>

    <div class="container my-5">
        <div id="loginForm" style="max-width: 400px;margin: 0 auto;">
            <h1 style="margin-bottom: 20px;">Login</h1>

            <form action="login.php" method="post" id="login_frm" class="" role="form" data-togal="validator" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <input class="form-control" id="l_email" name="log_email" type="email" placeholder="Email :" autocomplete="off" required>
                </div>

                <div class="form-group mb-4">
                    <input class="form-control" id="l_pass" name="log_pass" type="password" placeholder="Password :" autocomplete="off" required>
                </div>

                <div class="log_btn">
                    <button type="submit" id="loginBtn" class="btn btn-primary me-4">Login</button>
                    <button type="button" id="create_acc_btn" class="btn btn-link">Create an Account</button>
                </div>
            </form>
        </div>

        <div id="registerForm" style="max-width: 400px;margin: 0 auto;display: none;">
            <h1 style="margin-bottom: 20px;">Register</h1>

            <form action="register.php" method="post" id="create_frm" class="" role="form" data-togal="validator" enctype="multipart/form-data">

                <div class="form-group mb-3">
                    <label for="focusedInput">First Name :</label>
                    <input class="form-control" id="N-ame" name="first_name" type="text" autocomplete="off" required>
                </div>
                <div class="form-group mb-3">
                    <label for="focusedInput">Last Name :</label>
                    <input class="form-control" id="L-ame" name="last_name" type="text" autocomplete="off" required>
                </div>

                <div class="form-group mb-3">
                    <label for="focusedInput">Email :</label>
                    <input class="form-control" id="E-mail" name="email" type="email" autocomplete="off" required>
                </div>

                <div class="form-group mb-3">
                    <label for="focusedInput">Password :</label>
                    <input class="form-control" id="N-pass" name="password" type="password" autocomplete="off" required>
                </div>

                <div class="form-group mb-3">
                    <label for="focusedInput">Mobile :</label>
                    <input class="form-control" id="M-bile" name="mobile" type="text" maxlength="10" autocomplete="off" required>
                </div>

                <div class="log_btn">
                    <a href="index.php" class="me-4 btn btn-link">SignIn</a>
                    <button type="submit" id="submitRegisterBtn" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        // click create an account link, show the Register form js
        $(document).ready(function() {
            $("#create_acc_btn").click(function() {
                $("#registerForm").show();
                $("#loginForm").hide();
            })
        })

        // validate mobile number js
        $("#M-bile").keydown(function(e) {
            $('.lblf_phonemm').html(e.keyCode);
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>


    <script>
        // validate login form js
        $("#login_frm").validate({
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        //  submit login form js
        $(document).on('submit', '#login_frm', function() {
            event.preventDefault();
            $form_id = $(this).attr('id');
            $url = $(this).attr('action');
            $method = $(this).attr('method');
            $data = $(this).serialize();
            $.ajax({
                url: $url,
                type: $method,
                data: $data,
                dataType: "json",
                cache: false,
                beforeSend: function() {
                    debugger
                    $("#loginBtn").attr("disabled", true).html('Loading');
                },
                success: function($resp) {
                    debugger
                    if ($resp.success) {
                        $("#" + $form_id)[0].reset();
                        alert($resp.msg);
                        window.location.href = "http://localhost/eshop/dashboard.php";
                    } else {
                        debugger
                        $("#loginBtn").removeAttr("disabled").html("login");
                        alert('Invalid username and password...!');
                    }
                },
                error: function(err) {
                    debugger
                    $("#" + $form_id + " .msg").html('');
                    $("#loginBtn").removeAttr("disabled").html("Login");
                    alert('Invalid username and password...!');
                }
            });
        });
    </script>


    <script>
        // validate register form 
        $("#create_frm").validate({
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        /// Submit Register Form
        $(document).on('submit', '#create_frm', function() {
            event.preventDefault();
            $form_id = $(this).attr('id');
            $url = $(this).attr('action');
            $method = $(this).attr('method');
            $data = $(this).serialize();
            $.ajax({
                url: $url,
                type: $method,
                data: $data,
                dataType: "json",
                cache: false,
                beforeSend: function() {
                    debugger
                    $("#submitRegisterBtn").attr("disabled", true).html('Loading');
                },
                success: function($resp) {
                    debugger
                    if ($resp.success) {
                        $("#" + $form_id)[0].reset();
                        alert($resp.msg);
                        window.location.href = "http://localhost/eshop/index.php";
                    } else {
                        debugger
                        $("#submitBtn").removeAttr("disabled").html("Submit");
                        alert($resp.msg);
                    }
                },
                error: function(err) {
                    debugger
                    $("#" + $form_id + " .msg").html('');
                    $("#submitBtn").removeAttr("disabled").html("Submit");
                    alert('Error, something wrong...!');
                }
            });
        });
    </script>

</body>

</html>