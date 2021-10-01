<?php
include 'connect.php';

if ($link==true){

    if (isset($_POST['link_user'])&&$_POST['link_user']==true){
        $chk = "select * from group_users where group_id=".$_POST['group_id']." and user_id=".$_POST['user_id'];
        $result=mysqli_query($link,$chk);
        if ($result->num_rows==0) {
            $sql = "INSERT INTO group_users (group_id, user_id) VALUES ('" . $_POST['group_id'] . "','" . $_POST['user_id'] . "')";
            if (mysqli_query($link, $sql)) {

                echo json_encode("success");
            } else {
                echo json_encode("error");
            }
        }else {
            echo json_encode("error");
        }

    }

    if (isset($_POST['login_user'])&&$_POST['login_user']==true){
        $chk = "select * from register where username='".$_POST['username']."'";
        $result=mysqli_query($link,$chk);
        if ($result->num_rows==1){
            $pass="";
            $username="";
            $platform="";
            foreach ($result as $data){
                $pass=$data['password'];
                $id=$data['id'];
                $platform=$data['platform'];
                $username=$data['username'];
            }
            if ($pass==$_POST['password']){

                session_start();

                $_SESSION['user_id']=$id;
                $_SESSION['platform']=$platform;
                $_SESSION['username']=$username;

                echo json_encode("success");
            }else{
                echo json_encode("password");
            }
        }else{
            echo json_encode("no_user");
        }
    }

/*
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

    $sql ="SELECT * FROM register";

    $result=mysqli_query($link,$sql);

    foreach ($result as $val) {
        $name = '"'.$val['fname'].' '.$val['lname'].'"';
        echo "<tr>
                <td>".$val['id']."</td>
                <td>".$val['fname']."</td>
                <td>".$val['lname']."</td>
                <td>".$val['page']."</td>
                <td><a href='".$val['page_url']."' target='_blank'>Link</a></td>
                <td>".$val['email']."</td>
                <td>".$val['phone']."</td>
                <td>".$val['category']."</td>
                <td>".$val['price']."</td>
                <td>".$val['platform']."</td>
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


function myAds($link,$user_id){

    $sql ="SELECT a.* FROM ads a , notification n WHERE a.id=n.ads_id and n.user_id=".$user_id." ORDER BY a.id DESC";

    $result=mysqli_query($link,$sql);

    foreach ($result as $val) {

        $img="";
        $video="";

        if ($val['image']!=null){
            $img="<img src='db/".$val['image']."' class='img-thumbnail' width='45px'>";
        }

        if ($val['video']!=null){
            $video="<video width='140' height='105' controls>
                      <source src='db/".$val['video']."' type='video/mp4'>
                      Your browser does not support the video tag.
                    </video>";
        }

        echo "<tr>
                <td>".$val['id']."</td>
                <td>".$val['fname']." ".$val['lname']."</td>
                <td>".$val['email']."</td>
                <td>".$val['phone']."</td>
                <td>".$val['description']."</td>
                <td>".$val['date']."</td>
                <td>".$img."</td>
                <td>".$video."</td>
              </tr>";
    }

}

function monthlyIncome($link,$user_id){

    $yr = date("Y");
    $month = date("m");

    $s_date="";
    $e_date="";

    if($month==1){
        $s_date=$yr."-01-01";
        $e_date=$yr."-01-31";
    }else if($month==2){
        $s_date=$yr."-02-01";
        $e_date=$yr."-02-28";
    }else if($month==3){
        $s_date=$yr."-03-01";
        $e_date=$yr."-03-31";
    }else if($month==4){
        $s_date=$yr."-04-01";
        $e_date=$yr."-04-30";
    }else if($month==5){
        $s_date=$yr."-05-01";
        $e_date=$yr."-05-31";
    }else if($month==6){
        $s_date=$yr."-06-01";
        $e_date=$yr."-06-30";
    }else if($month==7){
        $s_date=$yr."-07-01";
        $e_date=$yr."-07-31";
    }else if($month==8){
        $s_date=$yr."-08-01";
        $e_date=$yr."-08-31";
    }else if($month==9){
        $s_date=$yr."-09-01";
        $e_date=$yr."-09-30";
    }else if($month==10){
        $s_date=$yr."-10-01";
        $e_date=$yr."-10-31";
    }else if($month==11){
        $s_date=$yr."-11-01";
        $e_date=$yr."-11-30";
    }else if($month==12){
        $s_date=$yr."-12-01";
        $e_date=$yr."-12-31";
    }

    $sql ="SELECT sum(r.price) as icome FROM ads a , notification n,register r WHERE a.id=n.ads_id and n.user_id=r.id and n.user_id=".$user_id." and a.date>='".$s_date."' and a.date<='".$e_date."'";

    $result=mysqli_query($link,$sql);

    $income=0;

    foreach ($result as $val) {
        $income = $val['icome'];
    }

    if ($income==null){
        $income=0;
    }

    echo " Rs. ".$income." /=";
}

function myNotification($link,$user_id){

    $sql ="SELECT a.* FROM ads a , notification n WHERE a.id=n.ads_id and n.user_id=".$user_id." and (a.date>DATE_ADD('".date("y-m-d")."',INTERVAL -14 DAY) or n.note=1) ORDER BY a.id DESC";

    $result=mysqli_query($link,$sql);

    foreach ($result as $val) {

        $img="";
        $video="";

        if ($val['image']!=null){
            $img="<img src='db/".$val['image']."' class='img-thumbnail' width='45px'>";
        }

        if ($val['video']!=null){
            $video="<video width='140' height='105' controls>
                      <source src='db/".$val['video']."' type='video/mp4'>
                      Your browser does not support the video tag.
                    </video>";
        }

        echo "<tr>
                <td>".$val['id']."</td>
                <td>".$val['fname']." ".$val['lname']."</td>
                <td>".$val['email']."</td>
                <td>".$val['phone']."</td>
                <td>".$val['description']."</td>
                <td>".$val['date']."</td>
                <td>".$val['group_id']."</td>
                <td>".$img."</td>
                <td>".$video."</td>
              </tr>";
    }

    $chks = "update notification set note=0 where user_id=".$user_id;
    mysqli_query($link,$chks);

}