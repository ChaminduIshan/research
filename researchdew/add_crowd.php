<!doctype html>
<html>
  <head>

  <link rel="pingback" href="xmlrpc.html">
        <title>Bilboard System</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" media="all">
        <link rel="stylesheet" href="assets/css/flaticon.css" type="text/css" media="all">
        <link rel="stylesheet" href="assets/css/font-linearicons.css" type="text/css" media="all">
        <link rel="stylesheet" href="style.css" type="text/css" media="all">
        <link rel="stylesheet" href="assets/css/travel-setting.css" type="text/css" media="all">

    <?php
    include("config.php");
 
    if(isset($_POST['but_upload'])){
       $maxsize = 524288000; // 5MB
 
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO videos2(name,location) VALUES('".$name."','".$target_file."')";

              mysqli_query($con,$query);
              echo "Upload successfully.";
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     } 
     ?>
  </head>
  <body>
  

  <div class="container two-column-respon mg-top-6x mg-bt-6x">
                        <div class="row">
                            <div class="col-sm-12 mg-btn-6x">
                                <div class="shortcode_title title-center title-decoration-bottom-center">
                                    <h3 class="title_primary">Upload Normal Videos</h3><span class="line_after_title"></span>
                                </div>
                            </div>
                        </div>

                        <button class="btn_reth"  value="Go Back" onclick="history.back(-1)">Back</button>

                        <br>
                        <br>


    <form method="post" action="" enctype='multipart/form-data'>
      <input type='file' name='file' />
      <input type='submit' value='Upload' name='but_upload'>
    </form>

  </body>
  <script type='text/javascript' src='assets/js/jquery.min.js'></script>
        <script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
        <script type='text/javascript' src='assets/js/vendors.js'></script>
        <script type='text/javascript' src='assets/js/owl.carousel.min.js'></script>
        <script type="text/javascript" src="assets/js/jquery.mb-comingsoon.min.js"></script>
        <script type="text/javascript" src="assets/js/waypoints.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
        <script type='text/javascript' src='assets/js/theme.js'></script>
</html>