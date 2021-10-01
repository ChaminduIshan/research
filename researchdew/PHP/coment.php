<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../DB.php';

        $name = $_POST["name"];
        $review = $_POST["Review"];
        $page = $_POST["page"];

        $sql = "insert into review(page,name,comm) values ('" . $page . "','" . $name . "','" . $review . "')";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
        if ($page == 01) {
            header("Location:../pack1.php");
        }  elseif ($page == 02) {
             header("Location:../pack2.php");
        } elseif ($page == 03) {
             header("Location:../pack3.php");
        }elseif ($page == 04) {
             header("Location:../pack4.php");
        }elseif ($page == 05) {
             header("Location:../pack5.php");
        }elseif ($page == 06) {
             header("Location:../pack6.php");
        }
        ?>
    </body>
</html>
