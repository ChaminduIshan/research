<?php include 'includes/header.php' ?>
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
                    Upload Ads
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <form id="uplod">
                                    <input type="hidden" value="true" name="newupload" id="newupload">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 20%"><label>First Name:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="f_name" id="f_name">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Last Name:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="l_name" id="l_name">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Email:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="email" name="email">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Phone:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="phone" name="phone">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 20%"><label>AD ID:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="ad_id" name="ad_id">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                            <td style="width: 20%"><label>Description:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="description" name="description">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Image:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="file" id="image" name="image">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Video:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="file" id="video" name="video">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div style="padding-top: 20px;">
                                                    <span id="message"></span>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
<script>
    $('#uplod').addClass("active");
    $('#menu_sub_uplod').addClass("active-menu");

    $(document).ready(function () {

        $("#uplod").validate({
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
               
                ad_id:"required",
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
                
                ad_id: "AD ID Required!",
                description: "Description Required!",
                image: {
                    accept: "Only Accept jpg,png Formats!"
                },
                video: {
                    accept: "Only Accept flv,mkv,avi,wmv,mov,mp4 Formats!"
                }
            },
            submitHandler: function () {
                var form_data = new FormData($('#uplod_ad')[0]);

                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "<?php echo $base_url.'db/upload.php';?>",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        if (data == "success"){
                            $("#uplod_ad")[0].reset();
                            bootbox.alert(" Successful!");
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

        $("#uplod_ad").submit(function(e) {
            e.preventDefault();
        });

    });

    
</script>

