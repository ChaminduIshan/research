<?php include 'includes/header.php' ?>
<?php include 'db/group.php'?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Groups
                </h1>
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Groups
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" id="reloadTable">
                            <span id="message"></span>
                            <table class="table table-striped table-bordered table-hover" id="employee-grid">
                                <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="30%">Name</th>
                                    <th width="20%">Category</th>
                                    <th width="20%">Group Users</th>
                                    <th width="20%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php getLists($link)?>
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

<div id="popupEdit" class="modal">
    <div class="modal-content1" style="height: 40%">
        <span class="close">&times;</span>
        <div class="col-md-12">
            <form  id="group_edit">
                <input type="hidden" id="group_id" name="group_id" >
                <div class="form-group">
                    <label for="dname">Group Name</label>
                    <input class="form-control" type="text" name="g_name" id="g_name"/>
                </div>
                <div class="form-group">
                    <label for="dname">Group Category</label>
                    <input class="form-control" type="text" name="g_category" id="g_category"/>
                </div>

                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<script>

    var popupEdit = document.getElementById("popupEdit");

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function () {
        popupEdit.style.display = "none";
    }

    function editPosition(id) {

        $.ajax({
            type: "POST",
            url: "db/group.php",
            data: { 'getEdit' : true ,'id' : id},
            dataType: "json",
            success: function(data){
                popupEdit.style.display = "block";
                $('#group_id').val(data['id']);
                $('#g_name').val(data['name']);
                $('#g_category').val(data['category']);
            },
            failure: function(errMsg) {
                alert('Error');
            }
        });

    }

    function delete_position(id) {

        bootbox.confirm({
            message: "If You Want To Delete?",
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
                        data: { 'getDelete' : true ,'id' : id},
                        dataType: "json",
                        success: function(data){
                            if (data == "success") {
                                bootbox.alert("Group Delete Successful!");
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

    $("#group_edit").validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules: {
            g_name: "required",
            g_category: "required"
        },
        messages: {
            g_name: "Group Name Required!",
            g_category: "Group Category Required"
        },
        submitHandler: function () {
            var g_data = {
                "edit_group" : true,
                'id' : $('#group_id').val(),
                'g_name' : $('#g_name').val(),
                'g_category' : $('#g_category').val()
            };

            $.ajax({
                type: "POST",
                url: "<?php echo $base_url.'db/group.php';?>",
                data: g_data,
                dataType: "json",
                success: function(data){
                    if (data == "success"){
                        $("#group_edit")[0].reset();
                        bootbox.alert("Group Edit Successful!");
                        $("#reloadTable").load(location.href + " #reloadTable");
                        popupEdit.style.display = "none";
                    }else {
                        popupEdit.style.display = "none";
                        bootbox.alert({
                            message: "Something is Wrong!",
                            className: 'rubberBand animated'
                        });
                    }
                },
                failure: function(errMsg) {
                    popupEdit.style.display = "none";
                    bootbox.alert({
                        message: "Connection Error!",
                        className: 'rubberBand animated'
                    });
                }
            });
        }
    });

    $("#group_edit").submit(function(e) {
        e.preventDefault();
    });

</script>

