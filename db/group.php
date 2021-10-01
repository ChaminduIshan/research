<?php
include 'connect.php';

if ($link==true){
    if (isset($_POST['add_group'])&&$_POST['add_group']==true){

        $chk = "select * from groups where name='".$_POST['g_name']."'";
        $result=mysqli_query($link,$chk);
        if ($result->num_rows==0){
            $sql = "INSERT INTO groups (name, category) VALUES ('".$_POST['g_name']."','".$_POST['g_category']."')";
            if(mysqli_query($link,$sql)){

                echo json_encode("success");
            }else{
                echo json_encode("error");
            }
        }else{
            echo json_encode("error");
        }

    }

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

     if (isset($_POST['unlink_user'])&&$_POST['unlink_user']==true){
         $chk = "delete from group_users where id=".$_POST['id'];
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

}else{
    echo "Connection Error!";
}

function getLists($link){

    $sql ="SELECT * FROM groups";

    $result=mysqli_query($link,$sql);

    foreach ($result as $val) {
        echo "<tr>
                <td>".$val['id']."</td>
                <td>".$val['name']."</td>
                <td>".$val['category']."</td>
                <td>
                    <a class='btn btn-success' href='groupUsers.php?group_id=".$val['id']."'>View</a>
                </td>
                <td>
                    <input type='button' value='Edit' class='btn btn-primary' onclick='editPosition(".$val['id'].")'>
                    <input type='button' value='Delete' class='btn btn-danger' onclick='delete_position(".$val['id'].")'>
                </td>
              </tr>";
    }

}

function getUsersList($link,$id){

    $sql ="SELECT r.*,g.name,gu.id as 'guid' FROM register r,groups g,group_users gu where gu.group_id=g.id and gu.user_id=r.id and gu.group_id=".$id;

    $result=mysqli_query($link,$sql);

    foreach ($result as $val) {
        $name = '"'.$val['fname'].' '.$val['lname'].'"';
        echo "<tr>
                <td>".$val['guid']."</td>
                <td>".$val['name']."</td>
                <td>".$val['fname']."</td>
                <td>".$val['lname']."</td>
                <td>".$val['page']."</td>
                <td><a href='".$val['page_url']."' target='_blank'>Link</a></td>
                <td>".$val['email']."</td>
                <td>".$val['phone']."</td>
                <td>".$val['price']."</td>
                <td>".$val['platform']."</td>
                <td>
                    <input type='button' value='Unlink Group' class='btn btn-danger' onclick='link_users(".$val['guid'].")'>
                </td>
              </tr>";
    }

}
