

<?php
session_start();
include('db/connect.php');
error_reporting(0);
if(isset($_POST['signup'])) {
    /*  {
    //code for captach verification
        if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
            echo "<script>alert('Incorrect verification code');</script>" ;
        }
        else {*/
//Code for user ID
    $count_my_page = ("studentid.txt");
    $hits = file($count_my_page);
    $hits[0]++;
    $fp = fopen($count_my_page, "w");
    fputs($fp, "$hits[0]");
    fclose($fp);
    $id = $hits[0];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $page = $_POST['page'];
    $page_url = $_POST['page_url'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone= $_POST['phone'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $platform = $_POST['platform'];

    $fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
    $lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
    $page = mysqli_real_escape_string($link, $_REQUEST['page']);
    $page_url = mysqli_real_escape_string($link, $_REQUEST['page_url']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $username = mysqli_real_escape_string($link, $_REQUEST['username']);        
    $password = mysqli_real_escape_string($link, $_REQUEST['password']);
    $phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
    $category = mysqli_real_escape_string($link, $_REQUEST['category']);
    $price = mysqli_real_escape_string($link, $_REQUEST['price']);
    $platform = mysqli_real_escape_string($link, $_REQUEST['platform']);

    $sql = "INSERT INTO register (fname, lname, page, page_url, email, username, password, phone, category, price, platform) 
    VALUES ('$fname', '$lname', '$page','$page_url','$email','$username','$password','$phone','$category','$price','$platform')";

if(mysqli_query($link, $sql)){
    echo '<div class="alert alert-success">Thank You!now please login </div>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

}


?>


    
    <script type="text/javascript">
        function valid()
        {
            if(document.signup.password.value!= document.signup.confirmpassword.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data:'email='+$("#email").val(),
                type: "POST",
                success:function(data){
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
    </script>

<?php include 'includes/header.php' ?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                SIGNUP FORM
                </h1>
            </div>
        </div>
<!------MENU SECTION START-->

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            
        </div>
        <div class="row">

            <div class="col-md-9 col-md-offset-1">
                <div class="panel panel-danger">
                    
                    <div class="panel-body">
                        <form method="post" onSubmit="return valid();">
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="fname" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lname" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Enter page Name (Chenel Name)</label>
                                <input class="form-control" type="text" name="page" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Enter page url (Chenel url)</label>
                                <input class="form-control" type="text" name="page_url" autocomplete="off" required />
                            </div>


                            <div class="form-group">
                                <label>Enter Email</label>
                                <input class="form-control" type="email" name="email" id="email" onBlur="checkAvailability()"  autocomplete="off" required  />
                                <span id="user-availability-status" style="font-size:12px;"></span>
                            </div>

                            <div class="form-group">
                                <label>Enter User name</label>
                                <input class="form-control" type="text" name="username" autocomplete="off" required  />
                            </div>

                            <div class="form-group">
                                <label>Enter Password</label>
                                <input class="form-control" type="password" name="password" autocomplete="off" required  />
                            </div>

                            <div class="form-group">
                                <label>Confirm Password </label>
                                <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
                            </div>

                            <div class="form-group">
                                <label>phone :</label>
                                <input class="form-control" type="text" name="phone" maxlength="100" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>category :</label>
                                <input class="form-control" type="text" name="category" maxlength="100" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>price :</label>
                                <input class="form-control" type="text" name="price" maxlength="10" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>platform:</label>
                                <input class=
                                <select id="school" size="1">
                                    <option value="Facebook">Facebook</option>
                                    <option value="Youtube">Youtube</option>
                                    <option value="Instergram">Instergram</option>
                                </select>
                                 name="platform" maxlength="100" autocomplete="off" required />
                            </div>

                            <button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->

<?php include 'includes/footer.php' ?>


