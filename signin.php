<?php include "db/config.php";?>
<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <link rel="stylesheet" href="css\login.css">
    <link rel="stylesheet" href="css\font-awesome.min.css">


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <!-- Bootstrap Js -->
    <script src="../research/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../research/assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="../research/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../research/assets/js/dataTables/dataTables.bootstrap.js"></script>

    <script src="../research/assets/js/custom-scripts.js"></script>

    <!-- Morris Chart Js -->
    <script src="../research/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../research/assets/js/morris/morris.js"></script>

    <!-- Time Picker -->
    <link href="../research/assets/js/timepicker/jquery.timeentry.css" rel="stylesheet">
    <script src="../research/assets/js/timepicker/jquery.plugin.js"></script>
    <script src="../research/assets/js/timepicker/jquery.timeentry.js"></script>

    <script type="text/javascript" src="../research/assets/js/jquery.validate.js"></script>
    <!-- Bootstrap Styles-->
    <link href="../research/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="../research/assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom Styles-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!-- Morris Styles-->
    <link href="../research/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="../research/assets/css/table.css">

    <script src="http://cdn.datatables.net/plug-ins/1.10.19/api/fnReloadAjax.js"></script>

    <script src="../research/assets/js/boxalert/bootbox.min.js"></script>
    <script src="../research/assets/js/boxalert/bootbox.locales.min.js"></script>

    <script src="../research/assets/js/croppie.js"></script>
    <link rel="stylesheet" href="../research/assets/css/croppie.css"/>

    <style>

        .my-error-class {
            color: red;
        }

        .my-valid-class {
            color: green;
        }
    </style>
</head>
<body>
<div class="container1">
    <img src="images/ab.png"/>
    <form id="log_Form">
        <div class="alert alert-danger" style="display: none;" id="error_div">
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
        </div>
        <div class="alert alert-success" style="display: none;" id="success_div">
            <strong>Login Success!</strong> You will be redirected in a moment.
        </div>
        <div class="form-group" id="email_div">
            <input class="input-class1" placeholder="Your Username" id="username" name="username" type="text">
        </div>
        <div class="form-group" id="password_div">
            <input class="input-class1" placeholder="Password" id="password" name="password" type="password">
        </div>
        <button type="submit" class="btn btn-default">Sign In</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
</body>
</html>
<script>

    $(document).ready(function () {

        $("#log_Form").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                username: "required",
                password: "required"
            },
            messages: {
                username: "Username Required!",
                password: "Password Required"
            },
            submitHandler: function () {
                var g_data = {
                    "login_user" : true,
                    'username' : $('#username').val(),
                    'password' : $('#password').val()
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo $base_url.'db/users.php';?>",
                    data: g_data,
                    dataType: "json",
                    success: function(data){
                        if (data == "success"){
                            window.location.href = "welcom.php";
                        }else if (data == "password"){
                            bootbox.alert({
                                message: "Your Password is Wrong!",
                                className: 'rubberBand animated'
                            });
                        }else {
                            bootbox.alert({
                                message: "Your Username & Password is Wrong!",
                                className: 'rubberBand animated'
                            });
                        }
                    },
                    failure: function(errMsg) {
                        bootbox.alert({
                            message: "Connection Error!",
                            className: 'rubberBand animated'
                        });
                    }
                });
            }
        });

        $("#log_Form").submit(function(e) {
            e.preventDefault();
        });

    });
</script>




