<?php include 'includes/header.php' ?>
<?php include 'db/group.php'?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Users Group
                </h1>
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Users
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" id="reloadTable">
                            <span id="message"></span>
                            <table class="table table-striped table-bordered table-hover" id="employee-grid">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">Group Name</th>
                                    <th width="10%">First Name</th>
                                    <th width="10%">Last Name</th>
                                    <th width="10%">Page</th>
                                    <th width="5%">Page Link</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%">Price</th>
                                    <th width="10%">Platform</th>
                                    <th width="10%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php getUsersList($link,$_GET['group_id'])?>
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
    $('#menu_groups').addClass("active");
    $('#menu_sub_list_groups').addClass("active-menu");
</script>
<script>

    function link_users(id) {

        bootbox.confirm({
            message: "If You Want To Unlink?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-success'
                }
            },
            callback: function (result) {
                if (result==true){
                    $.ajax({
                        type: "POST",
                        url: "db/group.php",
                        data: { 'unlink_user' : true ,'id' : id},
                        dataType: "json",
                        success: function(data){
                            if (data == "success") {
                                bootbox.alert("Group Unlink Successful!");
                                $("#reloadTable").load(location.href + " #reloadTable");
                            }else {
                                bootbox.alert({
                                    message: "Something is Wrong!",
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
            }
        });

    }

</script>

