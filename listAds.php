<?php include 'includes/header.php' ?>
<?php include 'db/ads.php'?>
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
                        All Ads
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" id="reloadTable">
                            <span id="message"></span>
                            <table class="table table-striped table-bordered table-hover" id="employee-grid">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">First Name</th>
                                    <th width="10%">Last Name</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%">Budget</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">Description</th>
                                    <th width="10%">Group Name</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Image</th>
                                    <th width="15%">Video</th>
                                    <th width="10%">Rating</th>
                                    <th width="10%">Actions</th>
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
    $('#menu_ads').addClass("active");
    $('#menu_sub_lists_ads').addClass("active-menu");
</script>

<div id="popupEdit" class="modal">
    <div class="modal-content1" style="height: 80%">
        <span class="close">&times;</span>
        <div class="col-md-12">
            <form  id="ads_edit">
                <input type="hidden" value="true" name="edit_Ads" id="edit_Ads">
                <input type="hidden" id="ads_id" name="ads_id" >
                <div class="form-group">
                    <label for="dname">First Name</label>
                    <input class="form-control" type="text" name="f_name" id="f_name">
                </div>
                <div class="form-group">
                    <label for="dname">Last Name</label>
                    <input class="form-control" type="text" name="l_name" id="l_name">
                </div>
                <div class="form-group">
                    <label for="dname">Email</label>
                    <input class="form-control" type="text" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="dname">Phone</label>
                    <input class="form-control" type="text" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="dname">Max Budget</label>
                    <input class="form-control" type="number" step="0.01" id="budget" onkeypress="groups_load()" onchange="groups_load()" name="budget">
                </div>
                <div class="form-group">
                    <label for="dname">Group</label>
                    <div id="group_div">
                        <select class="form-control" id="group" name="group">
                            <option value="">~ Select ~</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dname">Category</label>
                    <input class="form-control" type="text" id="category" name="category">
                </div>
                <div class="form-group">
                    <label for="dname">Description</label>
                    <input class="form-control" type="text" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="dname">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div id="image_div">

                </div>
                <div class="form-group">
                    <label for="dname">Video</label>
                    <input class="form-control" type="file" id="video" name="video">
                </div>
                <div id="video_div">

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
        $("#ads_edit")[0].reset();
        $('#image_div').html("");
        $('#video_div').html("");
    }

    function editAds(id) {

        $.ajax({
            type: "POST",
            url: "db/ads.php",
            data: { 'getEditAds' : true ,'id' : id},
            dataType: "json",
            success: function(data){
                popupEdit.style.display = "block";
                $('#ads_id').val(data['id']);
                $('#f_name').val(data['fname']);
                $('#l_name').val(data['lname']);
                $('#email').val(data['email']);
                $('#phone').val(data['phone']);
                $('#budget').val(data['budget']);
                $('#category').val(data['category']);
                $('#description').val(data['description']);
                $('#image_div').html(data['image']);
                $('#video_div').html(data['video']);
                $('#group_div').html(data['select']);
                $('#group').val(data['group']);
            },
            failure: function(errMsg) {
                alert('Error');
            }
        });

    }

    function delete_ads(id) {

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
                        url: "db/ads.php",
                        data: { 'deleteAds' : true ,'id' : id},
                        dataType: "json",
                        success: function(data){
                            if (data == "success") {
                                bootbox.alert("Ads Delete Successful!");
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

    $("#ads_edit").validate({
        errorClass: "my-error-class",
        validClass: "my-valid-class",
        rules: {
            f_name: "required",
            l_name: "required",
            email: {
                email: true,
                required: true
            },
            phone: {
                accept:"[0-9]+",
                required:true,
                minlength: 10,
                maxlength: 10
            },
            budget: {
                accept:"[0-9]+",
                required:true
            },
            category: "required",
            description:"required",
            image: {
                accept: "jpg|png"
            },
            video: {
                accept: "flv|mkv|avi|wmv|mov|mp4"
            }
        },
        messages: {
            f_name: "First Name Required!",
            l_name: "Last Name Required!",
            email: {
                email: "Wrong Email!",
                required: "Email Required!"
            },
            phone: {
                accept:"Only Numbers!",
                required:"Phone Number Required!",
                minlength:"Wrong Phone Number!",
                maxlength:"Wrong Phone Number!"
            },
            budget: {
                accept:"Only Numbers!",
                required:"Budget Required!"
            },
            category: "Category Required!",
            description: "Description Required!",
            image: {
                accept: "Only Accept jpg,png Formats!"
            },
            video: {
                accept: "Only Accept flv,mkv,avi,wmv,mov,mp4 Formats!"
            }
        },
        submitHandler: function () {
            var form_data = new FormData($('#ads_edit')[0]);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?php echo 'db/ads.php';?>",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(data){
                    console.log(data);
                    if (data == "success"){
                        $("#ads_edit")[0].reset();
                        bootbox.alert("Ads Edit Successful!");
                        $("#reloadTable").load(location.href + " #reloadTable");
                        popupEdit.style.display = "none";
                        $('#image_div').html("");
                        $('#video_div').html("");
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

    $("#ads_edit").submit(function(e) {
        e.preventDefault();
    });

    function groups_load(){
        $.ajax({
            type: "POST",
            url: "db/ads.php",
            data: { 'load_groups' : true ,'price' : $('#budget').val()},
            success: function(data){
                $("#group_div").html(data);
            },
            failure: function(errMsg) {
                bootbox.alert({
                    message: "Connection Error!",
                    className: 'rubberBand animated'
                });
            }
        });
    }

    function ratingclick(value,id,g_id) {
        var s_value=document.getElementById(value.id).value;
        $.ajax({
            type: "POST",
            url: "db/ads.php",
            data: { 'rating_groups' : true ,'value' : s_value , 'ads_id':id , 'g_id':g_id},
            success: function(data){
                bootbox.alert("Ratings!");
                $("#reloadTable").load(location.href + " #reloadTable");
            },
            failure: function(errMsg) {
                bootbox.alert({
                    message: "Connection Error!",
                    className: 'rubberBand animated'
                });
            }
        });
    }

</script>

