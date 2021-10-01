<?php
include("config.php");
$result = mysqli_query($con,"SELECT src FROM videos2" );

if(mysqli_num_rows($result)){
    while($row  = mysqli_fetch_array($result)){
        $source[] = $row['src'];
        $json = json_encode($source);
    }
}else{
    echo 'result not found';
}

echo $json;

mysqli_close($con);
?>