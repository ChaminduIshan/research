<?php include 'includes/header.php' ?>
<?php include 'db/config.php' ?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Report
                </h1>
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Weekly Report
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <form id="week_report">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 20%"><label>Week Last Date:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="date" name="date" id="date">
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
    $('#menu_report').addClass("active");
    $('#menu_sub_weekly_report').addClass("active-menu");

    $(document).ready(function () {

        $("#week_report").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                date: {
                    date: true,
                    required: true
                }
            },
            messages: {
                date: {
                    date: "Wrong Input!",
                    required: "Date Required!"
                }
            },
            submitHandler: function () {
                var g_data = {
                    "get_week_report" : true,
                    'date' : $('#date').val()
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo $base_url.'db/reports.php';?>",
                    data: g_data,
                    dataType: "json",
                    success: function(data){
                        if (data=="success"){
                            $("#week_report")[0].reset();
                            window.open("<?php echo $base_url."db/report.pdf"?>");
                        }else if (data=="no_data"){
                            $("#week_report")[0].reset();
                            bootbox.alert({
                                message: "No Records!",
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

        $("#week_report").submit(function(e) {
            e.preventDefault();
        });

    });
</script>


