
<?php
include 'connect.php';

if ($link==true){
    if (isset($_POST['newupload'])&&$_POST['newupload']==true){

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

        $sql = "INSERT INTO upload_job (fname,lname,email,phone,ad_id,description,date,image,video) VALUES ('".$_POST['f_name']."', '".$_POST['l_name']."', '".$_POST['email']."', '".$_POST['phone']."',  '".explode("###", $_POST['group'])[0]."', '".$_POST['description']."','".date("y-m-d")."' , '".$fileimage."', '".$filevideo."')";
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

    

}else{
    echo "Connection Error!";
}

?>