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
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>

    <script src="../assets/js/custom-scripts.js"></script>

    <!-- Morris Chart Js -->
    <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>

    <!-- Time Picker -->
    <link href="../MAE/assets/js/timepicker/jquery.timeentry.css" rel="stylesheet">
    <script src="../MAE/assets/js/timepicker/jquery.plugin.js"></script>
    <script src="../MAE/assets/js/timepicker/jquery.timeentry.js"></script>

    <script type="text/javascript"
            src="../MAE/assets/js/resources/scripts/jquery.validate.js"></script>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet"/>
    <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!-- Morris Styles-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="../assets/css/table.css">

    <script src="http://cdn.datatables.net/plug-ins/1.10.19/api/fnReloadAjax.js"></script>

    <script src="../assets/js/boxalert/bootbox.min.js"></script>
    <script src="../assets/js/boxalert/bootbox.locales.min.js"></script>

    <script src="../assets/js/croppie.js"></script>
    <link rel="stylesheet" href="../assets/css/croppie.css"/>

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
                    <li>
                        <a href="../MAE/users/loadEditUsers/"><i
                                    class="fa fa-gear fa-fw"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="../MAE/login/signOut"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                <li>
                    <a href=".." id="menu_dashboard"><i class="fa fa-desktop"></i> Dashboard</a>
                </li>


                <li id="menu_user">
                    <a href=""><i class="fa fa-user"></i> Notifications<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#users/addUser" id="menu_sub_add_user"><i
                                        class="fa fa-plus"></i> New user</a>
                        </li>
                        <li>
                            <a href="#users/fileUpload" id="menu_sub_user_file"><i
                                        class="fa fa-reorder"></i> Upload File</a>
                        </li>
                        <li>
                            <a href="#users/listUsers" id="menu_sub_list_users"><i
                                        class="fa fa-reorder"></i> List All Users</a>
                        </li>
                    </ul>
                </li>

                

                <li id="menu_emp_messages">
                    <a href=""><i class="fa fa-envelope-square"></i> Budget Report<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#Messages/send_messages" id="menu_sub_new_messages"><i
                                        class="fa fa-share-square"></i> New Messages</a>
                        </li>
                        <li>
                            <a href="#Messages/list_messages" id="menu_sub_list_messages"><i
                                        class="fa fa-list-alt"></i>List All Messages</a>
                        </li>
                    </ul>
                </li>

                <li id="menu_event">
                    <a href=""><i class="fa fa-envelope-square"></i> Advertisement<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#event/addEvent" id="menu_sub_add_event"><i
                                        class="fa fa-share-square"></i> New Event</a>
                        </li>
                        <li>
                            <a href="#event/listEvent" id="menu_sub_list_event"><i
                                        class="fa fa-list-alt"></i> List All Events</a>
                        </li>
                    </ul>
                </li>

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

                <li id="menu_news">
                    <a href=""><i class="fa fa-envelope-square"></i> Groups<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#news/addNews" id="menu_sub_add_news"><i
                                        class="fa fa-share-square"></i> Create Group </a>
                        </li>
                        <li>
                            <a href="#news/listNews" id="menu_sub_list_news"><i
                                        class="fa fa-list-alt"></i> List All Group </a>
                        </li>
                        <li>
                            <a href="#news/listNews" id="menu_sub_list_news"><i
                                        class="fa fa-list-alt"></i> Link Users </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Payments
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 20%"><label>Add Payments</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <select class="form-control" >
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Edit Payments</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <select class="form-control" >
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Delete Payments</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <select class="form-control" >
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
</div>
<footer align="center">
    <small><a href="#">WWW.MAE.LK</a></small>
    <p style="padding-top: 0px;">© Copyright 2020 MAE Ltd</p>
</footer>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

</body>
</html>