<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>MAE Admin Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
      <?php include('includes/header.php');?>

      <H1 style="margin-top: 10px; margin-bottom: 30px;margin-left: 600px ;">Admin Home page </H1>
    <div id="page-wrapper" style="margin-left: 300px;">
        <div class="main-page">
            <div class="col_3">
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-facebook-official "><a href="Admin_Auther1.php"></i>
                        <div class="stats">
                            <span>Authors</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-film "></i>
                        <div class="stats">
                            <a href="Bill_Board.php">
                            <span>Billboard</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-flag-o "></i>
                        <div class="stats">
                            <a href="Banner_Board.php">
                            <span>Banner Board</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-diamond "></i>
                        <div class="stats">
                            <a href="creater.php">
                            <span>Content Creator</span>
                        </div>
                    </div>
                </div>

                
                <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <!------MENU SECTION End-->

</body>
</html>
<?php include 'includes/footer.php' ?>
