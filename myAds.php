<?php include 'includes/header.php' ?>
<?php include 'db/users.php'?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Ads
                </h1>
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Ads / This Month Income <?php monthlyIncome($link,$_SESSION['user_id'])?>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" id="reloadTable">
                            <span id="message"></span>
                            <table class="table table-striped table-bordered table-hover" id="employee-grid">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="20%">Customer Name</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%">Description</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Image</th>
                                    <th width="15%">Video</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php myAds($link,$_SESSION['user_id'])?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
<script>
    $('#menu_notification').addClass("active");
    $('#menu_sub_my_note_ads').addClass("active-menu");
</script>