<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "map";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $bool = false;
    $count =  $_POST['count'];
    for($k=0; $k < $count; $k++){
        if(isset($_POST['check_'.$k])){
            $bool = true;
            $sql_insert="INSERT INTO 
                            tbl_batch (p_id,bth_no,bth_dp,u_id)
                            VALUES (
                                '".$_POST['p_id_'.$k]."',
                                '".$_POST['bth_no_'.$k]."',
                                '".$_POST['bth_dp_'.$k]."',
                                '".$_POST['u_id_'.$k]."'
                            )";
            $res = mysqli_query($conn,$sql_insert);
        }
    }

    if(!$bool){
        echo "Sorry, Data not checked";
    }

    if($res){
        echo "Data Added Successfully";
    }
?>