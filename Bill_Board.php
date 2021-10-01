<?php include 'includes/header.php' ?>
<?php include 'billusers.php'?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    BillBoard
                </h1>
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    BillBoard
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" id="reloadTable">
                            <span id="message"></span>
                            <table class="table table-striped table-bordered table-hover" id="employee-grid">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">Location</th>
                                    <th width="10%">Price</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    <?php getUsersList($link)?>
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
    $('#menu_sub_link_users').addClass("active-menu");
</script>
<div id="popupEdit" class="modal">
    <div class="modal-content1" style="height: 40%">
        <span class="close">&times;</span>
        <div class="col-md-12">
            <form  id="link_user">
                <input type="hidden" id="user_id" name="user_id" >
                <div class="form-group">
                    <label for="dname">Name</label>
                    <input class="form-control" type="text" name="u_name" id="u_name" readonly/>
                </div>
                <div class="form-group">
                    <label for="dname">Select Group</label>
                    <select class="form-control" name="g_id" id="g_id">
                        <option value="">~ Select ~</option>
                        <?php getGroups($link)?>
                    </select>
                </div>

                <input type="submit" value="Link" class="btn btn-primary">
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

    function link_users(id,name) {
        popupEdit.style.display = "block";
        $('#u_name').val(name);
        $('#user_id').val(id);
    }

    $("#link_user").validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules: {
            g_id: "required"
        },
        messages: {
            g_id: "Select Group!"
        },
        submitHandler: function () {
            var g_data = {
                "link_user" : true,
                'user_id' : $('#user_id').val(),
                'group_id' : $('#g_id').val()
            };

            $.ajax({
                type: "POST",
                url: "<?php echo $base_url.'billusers.php';?>",
                data: g_data,
                dataType: "json",
                success: function(data){
                    if (data == "success"){
                        $("#link_user")[0].reset();
                        bootbox.alert("User Group Link Successful!");
                        popupEdit.style.display = "none";
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
    });

    $("#link_user").submit(function(e) {
        e.preventDefault();
    });

</script>

