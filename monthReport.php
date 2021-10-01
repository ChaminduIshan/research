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
                        Monthly Report
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <form id="week_report">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 20%"><label>Year</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <select class="form-control" name="year" id="year">
                                                        <option value="">~ Select ~</option>
                                                        <option value="2019">~ 2019 ~</option>
                                                        <option value="2020">~ 2020 ~</option>
                                                        <option value="2021">~ 2021 ~</option>
                                                        <option value="2022">~ 2022 ~</option>
                                                        <option value="2023">~ 2023 ~</option>
                                                        <option value="2024">~ 2024 ~</option>
                                                        <option value="2025">~ 2025 ~</option>
                                                        <option value="2026">~ 2026 ~</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Month</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <select class="form-control" name="month" id="month">
                                                        <option value="">~ Select ~</option>
                                                        <option value="1">~ January ~</option>
                                                        <option value="2">~ February ~</option>
                                                        <option value="3">~ March ~</option>
                                                        <option value="4">~ April ~</option>
                                                        <option value="5">~ May ~</option>
                                                        <option value="6">~ June ~</option>
                                                        <option value="7">~ July ~</option>
                                                        <option value="8">~ August ~</option>
                                                        <option value="9">~ September ~</option>
                                                        <option value="10">~ October ~</option>
                                                        <option value="11">~ November ~</option>
                                                        <option value="12">~ December ~</option>
                                                    </select>
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
    $('#menu_sub_monthly_report').addClass("active-menu");

    $(document).ready(function () {

        $("#week_report").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                month: "required",
                year: "required"
            },
            messages: {
                month: "Month Required!",
                year: "Year Required!"
            },
            submitHandler: function () {
                var g_data = {
                    "get_month_report" : true,
                    'month' : $('#month').val(),
                    'year' : $('#year').val()
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


