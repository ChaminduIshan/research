<?php
include("config.php");
?>
<!doctype html>
<html>

<head>
    <style>
        video {
            float: left;
        }
    </style>
</head>

<body>


    <div>
        <video id="myVideo" width='100%' height='auto' controls autoplay muted>

            <?php

            $video_arr = array();

            $fetchVideos = mysqli_query($con, "SELECT location FROM videos2 ORDER BY id DESC");

            $i = 0;

            while ($row = mysqli_fetch_assoc($fetchVideos)) {

                
                $video_arr[$i] = $row['location'];

                $i++;
            }

        

            ?>

            <script>
                var videoSource = <?php echo json_encode($video_arr); ?>;
                var i = 0;
                
                
                var videoCount = videoSource.length;
                
                document.getElementById("myVideo").setAttribute("src", videoSource[0]);
        

                function videoPlay(videoNum) {
                    document.getElementById("myVideo").setAttribute("src", videoSource[videoNum]);
                    document.getElementById("myVideo").load();
                    document.getElementById("myVideo").play();
                }

                document.getElementById('myVideo').addEventListener('ended', myHandler, false);

                function myHandler() {

                    if(i < videoCount - 1){
                        i++;
                    }
                    else{
                        i = 0;
                    }

                    videoPlay(i);
                    
                }
            </script>
</body>

</html>