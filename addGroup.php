<?php include 'includes/header.php' ?>
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
                        Add Group
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <form id="groupAdd">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 20%"><label>Group Name:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="g_name" id="g_name">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%"><label>Group Category:</label></td>
                                            <td style="width: 80%">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="g_category" name="g_category">
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
    $('#menu_groups').addClass("active");
    $('#menu_sub_add_group').addClass("active-menu");
</script>
