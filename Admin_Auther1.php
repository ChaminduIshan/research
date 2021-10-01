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
    <title>MAE</title>
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
      
      <?php include('includes/header.php');?>
    <!------MENU SECTION START-->

    <div style="margin-top: 10px; margin-bottom: 30px;margin-left: 600px;"></div>
    <div id="page-wrapper" style="margin-left: 300px;">
    
        <div class="main-page">
            <div class="col_3">
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-facebook-official "></i>
                        <div class="stats">
                            <a href="facebook_Auther.php">
                            <span> Facebook Authors</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-youtube "></i>
                        <div class="stats">
                            <a href="youtube_Auther.php">
                            <span>Youtube Author</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="pull-left fa fa-instagram "></i>
                        <div class="stats">
                            <a href="instergram_Auther.php">
                            <span>Instergram Author</span>
                        </div>
                    </div>
                </div>
                
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

      
    <!------MENU SECTION End-->

</body>
</html>
<?php include 'includes/footer.php' ?>
