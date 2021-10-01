<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin</title>

    <noscript>
        <div class="notification error png_bg">
            <div>
                Javascript is disabled or is not supported by your browser.
            </div>
        </div>
    </noscript>


    <style>
        .elementz {
            border: none;
            background-image: none;
            background-color: transparent;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            outline: none;
            -webkit-appearance: none;
            color: #000;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content1 {
            background-color: #fefefe;
            margin: auto;
            width: 40%;
            height: 80%;
            overflow-y: scroll;
            padding: 20px;
            border: 1px solid #888;
        }

        /* The Close Button */
        .close1 {
            color: #aaaaaa;
            float: right;
            margin-left: 95%;
            font-size: 28px;
            font-weight: bold;
        }

        .close1:hover,
        .close1:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-file {
            position: relative;
            overflow: hidden;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload {
            width: 100%;
        }

        .my-error-class {
            color: red;
        }

        .my-valid-class {
            color: green;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <!-- Bootstrap Js -->
    <script src="../MAE/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../MAE/assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="../MAE/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../MAE/assets/js/dataTables/dataTables.bootstrap.js"></script>

    <script src="../MAE/assets/js/custom-scripts.js"></script>

    <!-- Morris Chart Js -->
    <script src="../MAE/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../MAE/assets/js/morris/morris.js"></script>

    <!-- Time Picker -->
    <link href="../MAE/assets/js/timepicker/jquery.timeentry.css" rel="stylesheet">
    <script src="../MAE/assets/js/timepicker/jquery.plugin.js"></script>
    <script src="../MAE/assets/js/timepicker/jquery.timeentry.js"></script>

    <script type="text/javascript" src="../MAE/assets/js/jquery.validate.js"></script>
    <!-- Bootstrap Styles-->
    <link href="../MAE/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="../MAE/assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom Styles-->
    <link href="../MAE/assets/css/custom-styles.css" rel="stylesheet"/>
    <!-- TABLE STYLES-->
    <link href="../MAE/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!-- Morris Styles-->
    <link href="../MAE/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="../MAE/assets/css/table.css">

    <script src="http://cdn.datatables.net/plug-ins/1.10.19/api/fnReloadAjax.js"></script>

    <script src="../MAE/assets/js/boxalert/bootbox.min.js"></script>
    <script src="../MAE/assets/js/boxalert/bootbox.locales.min.js"></script>

    <script src="../MAE/assets/js/croppie.js"></script>
    <link rel="stylesheet" href="../MAE/assets/css/croppie.css"/>

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="..">MAE</a>
        </div>
        <!--div class="navbar-header">
                    <div class="alert alert-warning">
						<strong>Warning!</strong> # is temporary unavailable due to a maintanance activity. Inconvenience caused is deeply regretted.
					</div>
                </div-->
                <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> Name <i
                        class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                <?php if (isset ($_SESSION['platform'])&&$_SESSION['platform']=="Admin") {  ?>
                    <li>
                        <a href="http://localhost/vehicle-detector/"><i
                                class="fa fa-gear fa-fw"></i> LED DISPLAY</a>
                    </li>
                <?php } ?>
                    <li class="divider"></li>
                    <li><a href="../research/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>


    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <div>
                <div class="panel-body">
                    <!--image -->
                </div>
            </div>
            <ul class="nav" id="main-menu">
            

            <?php if (isset ($_SESSION['platform'])&&$_SESSION['platform']=="Admin") {  ?>
                <li>
                <a href="../research/Admin_page1.php" id="menu_dashboard"><i class="fa fa-desktop"></i> Dashboard</a>
                </li>
                <?php } ?>


                <?php if (isset ($_SESSION['platform'])&&$_SESSION['platform']=="Admin") {  ?>
                <li id="menu_groups">
                    <a href="../research/signup.php"><i class="fa fa-user"></i> Add New Users<span class="fa arrow"></span></a>
                    
                </li>
                <?php } ?>

                
                <li id="menu_notification">
                    <a href=""><i class="fa fa-envelope-square"></i> Notifications<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="myNotification.php" id="menu_sub_my_note"><i
                                    class="fa fa-plus"></i> Notification</a>
                        </li>
                        <li>
                            <a href="myAds.php" id="menu_sub_my_note_ads"><i
                                    class="fa fa-reorder"></i> My Ads</a>
                        </li>
                    </ul>
                </li>

                <?php if (isset ($_SESSION['platform'])&&$_SESSION['platform']=="Admin") {  ?>
                <li id="menu_news">
                    <a href=""><i class="fa fa-envelope-square"></i> Payment Details<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#news/addNews" id="menu_sub_add_news"><i
                                    class="fa fa-share-square"></i> Add News </a>
                        </li>
                        <li>
                            <a href="#news/listNews" id="menu_sub_list_news"><i
                                    class="fa fa-list-alt"></i> List All News</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if (isset ($_SESSION['platform'])&&$_SESSION['platform']=="Admin") {  ?>
                <li id="menu_groups">
                    <a href=""><i class="fa fa-envelope-square"></i> Groups<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="../research/addGroup.php" id="menu_sub_add_group"><i
                                    class="fa fa-share-square"></i> Create Group </a>
                        </li>
                        <li>
                            <a href="../research/listGroup.php" id="menu_sub_list_groups"><i
                                    class="fa fa-list-alt"></i> List All Group </a>
                        </li>
                        <li>
                            <a href="../research/Admin_Auther1.php" id="menu_sub_link_users"><i
                                    class="fa fa-list-alt"></i> Link Users </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if (isset ($_SESSION['platform'])&&$_SESSION['platform']=="Admin") {  ?>
                <li id="menu_ads">
                    <a href=""><i class="fa fa-envelope-square"></i> Ads Details<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="createAds.php" id="menu_sub_create_ads"><i
                                        class="fa fa-share-square"></i> Create Ads </a>
                        </li>
                        <li>
                            <a href="listAds.php" id="menu_sub_lists_ads"><i
                                        class="fa fa-list-alt"></i> List All Ads</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if (isset ($_SESSION['platform'])&&$_SESSION['platform']=="Admin") {  ?>
                <li id="menu_notification">
                    <a href=""><i class="fa fa-user"></i> Billboard System <span class="fa arrow"></span></a>
                    
                </li>
                <?php } ?>

                <?php if (isset ($_SESSION['platform'])&&$_SESSION['platform']=="Admin") {  ?>
                <li id="menu_report">
                    <a href=""><i class="fa fa-envelope-square"></i> Get Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="weekReport.php" id="menu_sub_weekly_report"><i
                                        class="fa fa-share-square"></i> Get Weekly Report </a>
                        </li>
                    </ul>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="monthReport.php" id="menu_sub_monthly_report"><i
                                        class="fa fa-share-square"></i> Get Monthly Report </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <li>
                            <a href="../research/change_password.php" id="menu_password"><i 
                                    class="fa fa-key"></i> Change Password</a>
                </li>
            </ul>
        </div>
    </nav>
