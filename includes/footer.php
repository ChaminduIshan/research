</div>
<!-- /. PAGE INNER  -->
</div>
<footer align="center">
    <small><a href="#" class="text-white">WWW.MAE.LK</a></small>
    <p class="text-white" style="padding-top: 0px;">© Copyright 2020 MAE Ltd</p>
</footer>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

</body>
</html>
<?php include "db/config.php";?>
<script>

    $(document).ready(function () {
        $('#employee-grid').dataTable();
    });

    $(document).ready(function () {

        $("#groupAdd").validate({
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
                    "add_group" : true,
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
                            $("#groupAdd")[0].reset();
                            bootbox.alert("Group Created Successful!");
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

        $("#groupAdd").submit(function(e) {
            e.preventDefault();
        });

    });
</script>
