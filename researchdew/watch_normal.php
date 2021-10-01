<?php
include("config.php");
?>
<!doctype html>
<html>
  <head>
    <style>
    video{
     float: left;
    }
    </style>
  </head>
  <body>

  
    <div>
    <button class="btn_reth"  value="Go Back" onclick="history.back(-1)">Back</button>

                        <br>
                        <br>
 
     <?php 
     $fetchVideos = mysqli_query($con, "SELECT location FROM videos ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['location'];
 
       echo "<div >";
       echo "<video src='".$location."' controls width='440px' height='320px' >";
       echo "</div>";
     }
     ?>

     </body>
     </html>

<?php 
     $fetchVideos = mysqli_query($con, "SELECT location FROM videos2 ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['location'];
 
       echo "<div >";
       echo "<video src='".$location."' controls width='440px' height='320px' >";
       echo "</div>";
     }
     ?>
 
    </div> 

    <!-- <video controls id="myVideo" >
   
 
</video> -->



  </body>


</html>
<!-- <script>

var videoSource = new Array();
videoSource[0]='videos/videoplayback (3).mp4';
videoSource[1]='video/videoplayback (13).mp4';
var videoCount = videoSource.length;

document.getElementById("myVideo").setAttribute("videos/videoplayback (3).mp4",videoSource[0]);
Create a function to load and play the videos.
 
    function videoPlay(videoNum)
    {
document.getElementById("myVideo").setAttribute("videos/videoplayback (3).mp4",videoSource[videoNum]);
document.getElementById("myVideo").load();
document.getElementById("myVideo").play();
    }

    document.getElementById('myVideo').addEventListener('ended',myHandler,false);
function myHandler() {
i++;
if(i == (videoCount-1)){
i = 0;
videoPlay(i);
}
else{
videoPlay(i);
}
        
       }</script> -->