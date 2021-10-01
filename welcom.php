<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>MAE</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
      <?php include('includes/header.php');?>

      <br></br>
      <br></br>
      <br></br>


<div class="row">

    <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-4">
        <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
 
        <div class="carousel-inner">
            <div class="item active">

                <img src="assets/img/1.jpg" alt="" />
         
            </div>
            <div class="item">
                <img src="assets/img/3.jpg" alt="" />
        
            </div>
            <div class="item">
                <img src="assets/img/5.jpg" alt="" />
         
            </div>
        </div>
    
        
        </div>
        </div>


        </div>

    </div>
</div>

// cvs upload function

<?php 
if ( isset($_POST["submit"]) ) {

    if ( isset($_FILES["file"])) {
 
             //if there was an error uploading the file
         if ($_FILES["file"]["error"] > 0) {
             echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
 
         }
         else {
                  //Print file details
              echo "Upload: " . $_FILES["file"]["name"] . "<br />";
              echo "Type: " . $_FILES["file"]["type"] . "<br />";
              echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
              echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
 
                  //if file already exists
              if (file_exists("upload/" . $_FILES["file"]["name"])) {
             echo $_FILES["file"]["name"] . " already exists. ";
              }
              else {
                     //Store file in directory "upload" with the name of "uploaded_file.txt"
             $storagename = "uploaded_file.csv";
             move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
             echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
             header('Location: fetch.php');
             }
         }
      } else {
              echo "No file selected <br />";
      }
 }

?>


</body>
</html>
<?php include 'includes/footer.php' ?>
