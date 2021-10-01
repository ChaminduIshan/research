<?php
include 'connect.php';

if ($link==true){
    if (isset($_POST['newAds'])&&$_POST['newAds']==true){

        $fileimage="";
        $filevideo="";

        if ($_FILES['image']['name']!=null){
            $file = $_FILES['image'];

            $ext = pathinfo($file['name']);

            $fileimage = 'image/' . uniqid() . time() . '.' . $ext['extension'];

            move_uploaded_file($file['tmp_name'], $fileimage);
        }

        if ($_FILES['video']['name']!=null){
            $file = $_FILES['video'];

            $ext = pathinfo($file['name']);

            $filevideo = 'video/' . uniqid() . time() . '.' . $ext['extension'];

            move_uploaded_file($file['tmp_name'], $filevideo);
        }

        $sql = "INSERT INTO ads (fname,lname,email,phone,budget,category,description,group_id,g_name,date,image,video) VALUES ('".$_POST['f_name']."', '".$_POST['l_name']."', '".$_POST['email']."', '".$_POST['phone']."', '".explode("###", $_POST['group'])[1]."', '".$_POST['category']."', '".$_POST['description']."','".explode("###", $_POST['group'])[0]."','".explode("###", $_POST['group'])[2]."', '".date("y-m-d")."' , '".$fileimage."', '".$filevideo."')";
        if(mysqli_query($link,$sql)){

            $ins_id =$link->insert_id;

            $chk = "select * from group_users where group_id=".explode("###", $_POST['group'])[0];
            $result=mysqli_query($link,$chk);

            foreach ($result as $val){
                $s = "INSERT INTO notification (ads_id, user_id, note) VALUES ('".$ins_id."', '".$val['user_id']."', '1')";
                mysqli_query($link,$s);
            }

            echo "success";

        }else{
            echo "error";
        }

    }

    if (isset($_POST['rating_groups'])&&$_POST['rating_groups']==true){
        $chk = "update ads set ratings=".$_POST['value']." where id=".$_POST['ads_id'];
        mysqli_query($link,$chk);

        $chk = "select * from ads where group_id=".$_POST['g_id'];
        $result=mysqli_query($link,$chk);

        $total = 0;

        foreach ($result as $val){
            $total = $total + $val['ratings'];
        }

        $avg = $total/$result->num_rows;

        $chk = "update groups set ratings=".$avg." where id=".$_POST['g_id'];
        mysqli_query($link,$chk);

    }

    if (isset($_POST['deleteAds'])&&$_POST['deleteAds']==true){
        $chk = "delete from ads where id=".$_POST['id'];
        $result=mysqli_query($link,$chk);
        if ($result){
            $ch = "delete from notification where ads_id=".$_POST['id'];
            mysqli_query($link,$ch);
            echo json_encode("success");
        }else{
            echo json_encode("error");
        }
    }

    if (isset($_POST['getEditAds'])&&$_POST['getEditAds']==true){
        $chk = "select * from ads where id=".$_POST['id'];
        $result=mysqli_query($link,$chk);
        if ($result->num_rows==1){
            $res = array();
            foreach ($result as $val){

                $select = '<select class="form-control" id="group" name="group">
                        <option value="">~ Select ~</option>';

                $select = $select . "<option value='".$val['group_id']."###".$val['budget']."###".$val['g_name']."'>Group Name :" . $val['g_name'] . ", Total :" . $val['budget'] . "</option>";

                $select=$select . '</select>';

                $group = $val['group_id']."###".$val['budget']."###".$val['g_name'];

                $img="";
                $video="";

                if ($val['image']!=null){
                    $img="<img src='db/".$val['image']."' class='img-thumbnail' width='320px'>";
                }

                if ($val['video']!=null){
                    $video="<video width='320' height='240' controls>
                      <source src='db/".$val['video']."' type='video/mp4'>
                      Your browser does not support the video tag.
                    </video>";
                }

                $g = array(
                    "id"=>$val['id'],
                    "fname"=>$val['fname'],
                    "lname"=>$val['lname'],
                    "email"=>$val['email'],
                    "phone"=>$val['phone'],
                    "budget"=>$val['budget'],
                    "category"=>$val['category'],
                    "description"=>$val['description'],
                    "select"=>$select,
                    "group"=>$group,
                    "image"=>$img,
                    "video"=>$video
                );
            }

            echo json_encode($res=$g);
        }
    }

    if (isset($_POST['edit_Ads'])&&$_POST['edit_Ads']==true){

        $fileimage="";
        $filevideo="";

        if ($_FILES['image']['name']!=null){
            $file = $_FILES['image'];

            $ext = pathinfo($file['name']);

            $fileimage = 'image/' . uniqid() . time() . '.' . $ext['extension'];

            move_uploaded_file($file['tmp_name'], $fileimage);

            $chk = "update ads set image='".$fileimage."' where id=".$_POST['ads_id'];
            mysqli_query($link,$chk);

        }

        if ($_FILES['video']['name']!=null){
            $file = $_FILES['video'];

            $ext = pathinfo($file['name']);

            $filevideo = 'video/' . uniqid() . time() . '.' . $ext['extension'];

            move_uploaded_file($file['tmp_name'], $filevideo);

            $chk = "update ads set video='".$filevideo."' where id=".$_POST['ads_id'];
            mysqli_query($link,$chk);

        }

        $chk = "update ads set fname='".$_POST['f_name']."' , lname='".$_POST['l_name']."', email='".$_POST['email']."', phone='".$_POST['phone']."', budget='".explode("###", $_POST['group'])[1]."', category='".$_POST['category']."', description='".$_POST['description']."',group_id='".explode("###", $_POST['group'])[0]."',g_name='".explode("###", $_POST['group'])[2]."' where id=".$_POST['ads_id'];
        $result=mysqli_query($link,$chk);
        if ($result){
            $ins_id =$_POST['ads_id'];

            $chk = "delete from notification where ads_id=".$ins_id;
            mysqli_query($link,$chk);

            $chks = "select * from group_users where group_id=".explode("###", $_POST['group'])[0];
            $results=mysqli_query($link,$chks);

            foreach ($results as $val){
                $s = "INSERT INTO notification (ads_id, user_id, note) VALUES ('".$ins_id."', '".$val['user_id']."', '1')";
                mysqli_query($link,$s);
            }
            echo "success";
        }else{
            echo "error";
        }
    }

    if (isset($_POST['load_groups'])&&$_POST['load_groups']==true){
        $select = '<select class="form-control" id="group" name="group" onchange="group_price_load()">
                        <option value="">~ Select ~</option>';
        if ($_POST['price']>1) {
            $chk = "SELECT g.*,sum(r.price)+(sum(r.price)*0.1) as total FROM register r,groups g, group_users gu WHERE gu.user_id=r.id and gu.group_id=g.id GROUP BY g.id HAVING total<" . $_POST['price'];
            $result = mysqli_query($link, $chk);



            foreach ($result as $val) {

                $select = $select . "<option value='".$val['id']."###".$val['total']."###".$val['name']."'>Group Name :" . $val['name'] . ", Category :" . $val['category'] . ", Total :" . $val['total'] . " , Ratings :" . $val['ratings'] . "</option>";

            }
        }
        echo $select . '</select>';
    }

}else{
    echo "Connection Error!";
}

function getLists($link){

    $sql ="SELECT * FROM ads";

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

        {
        $zero="";
        $one="";
        $two="";
        $three="";
        $four="";
        $five="";

        if($val['ratings']==0){
            $zero="selected";
        }else if($val['ratings']==1){
            $one="selected";
        }else if($val['ratings']==2){
            $two="selected";
        }else if($val['ratings']==3){
            $three="selected";
        }else if($val['ratings']==4){
            $four="selected";
        }else if($val['ratings']==5){
            $five="selected";
        }
    }

        echo "<tr>
                <td>".$val['id']."</td>
                <td>".$val['fname']."</td>
                <td>".$val['lname']."</td>
                <td>".$val['email']."</td>
                <td>".$val['phone']."</td>
                <td>".$val['budget']."</td>
                <td>".$val['category']."</td>
                <td>".$val['description']."</td>
                <td>".$val['g_name']."</td>
                <td>".$val['date']."</td>
                <td>".$img."</td>
                <td>".$video."</td>

                <td>
                    <select id='select".$val['id']."' onchange='ratingclick(this,".$val['id'].",".$val['group_id'].")' >
                        <option ".$zero.">0</option>
                        <option ".$one.">1</option>
                        <option ".$two.">2</option>
                        <option ".$three.">3</option>
                        <option ".$four.">4</option>
                        <option ".$five.">5</option>
                    </select>
                </td>
                <td>
                    <input type='button' value='Edit' class='btn btn-primary' onclick='editAds(".$val['id'].")'>
                    <input type='button' value='Delete' class='btn btn-danger' onclick='delete_ads(".$val['id'].")'>
                </td>
              </tr>";
    }

}