<?php

include("config.php");

$id=$_REQUEST['id'];
$query = "DELETE FROM videos2 WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>