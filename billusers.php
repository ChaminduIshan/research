<?php
include 'db/connect.php';

if ($link==true){

    if (isset($_POST['link_user'])&&$_POST['link_user']==true){

        $sql = "INSERT INTO group_users (group_id, user_id) VALUES ('".$_POST['group_id']."','".$_POST['user_id']."')";
        if(mysqli_query($link,$sql)){

            echo json_encode("success");
        }else{
            echo json_encode("error");
        }

    }
    /*
        if (isset($_POST['getEdit'])&&$_POST['getEdit']==true){
            $chk = "select * from groups where id=".$_POST['id'];
            $result=mysqli_query($link,$chk);
            if ($result->num_rows==1){
                $res = array();
                foreach ($result as $val){
                    $g = array(
                        "id"=>$val['id'],
                        "name"=>$val['name'],
                        "category"=>$val['category']
                    );
                }

                echo json_encode($res=$g);
            }
        }

        if (isset($_POST['getDelete'])&&$_POST['getDelete']==true){
            $chk = "delete from groups where id=".$_POST['id'];
            $result=mysqli_query($link,$chk);
            if ($result){
                echo json_encode("success");
            }else{
                echo json_encode("error");
            }
        }

        if (isset($_POST['edit_group'])&&$_POST['edit_group']==true){
            $chk = "update groups set name='".$_POST['g_name']."' , category='".$_POST['g_category']."' where id=".$_POST['id'];
            $result=mysqli_query($link,$chk);
            if ($result){
                echo json_encode("success");
            }else{
                echo json_encode("error");
            }
        }
    */
}else{
    echo "Connection Error!";
}

function getUsersList($link){

    $sql ="SELECT * FROM bilboard";

    $result=mysqli_query($link,$sql);

    foreach ($result as $val) {
        $name = '"'.$val['location'].' '.$val['Category'].'"';
        echo "<tr>
                <td>".$val['id']."</td>
                <td>".$val['location']."</td>
                <td>".$val['price']."</td>
                <td>".$val['Category']."</td>
                
                <td>
                    <input type='button' value='Link To Group' class='btn btn-success' onclick='link_users(".$val['id'].",".$name.")'>
                </td>
              </tr>";
    }

}

function getGroups($link){

    $sql ="SELECT * FROM groups";

    $result=mysqli_query($link,$sql);

    foreach ($result as $val) {
        echo "<option value='".$val['id']."'>".$val['name']."</option>";
    }

}