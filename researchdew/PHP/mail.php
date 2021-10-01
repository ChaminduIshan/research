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
        require '../PHPMailer/PHPMailerAutoload.php';
//        require '../PHPMailer/src/Exception.php';
//        require '../PHPMailer/src/PHPMailer.php';
//        require '../PHPMailer/src/SMTP.php';

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
//        
//        $mail->SMTPDebug = 0;
//        $mail->Debugoutput = 'html';
        $mail->Host = "smtp.gmail.com";

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = "bhanukakrish@gmail.com";
        $mail->Password = "krishna@789";

        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';


        $mail->setFrom('mr.bhanuka@gmail.com', 'Bhanuka');
        $mail->addAddress('to@site.com', 'To');

        $mail->Subject = "Text Mail";
        $mail->Body = "Message";

        if (!$mail->send()) {
            echo "Error sending message";
        } else {
            echo "Message sent!";
        }
//
//        $name = $_POST["first_name"];
//        $review = $_POST["last_name"];
//        $to = $_POST["email_tour"];
//        $page = $_POST["phone"];
//        $page = $_POST["date_book "];
//        $to = 'bhanukakrish@gmail.com';
//        $subject = 'Booking Travel Cylon';
//        $message = 'hello';
//        $headers = 'From: webmaster@example.com' . "\r\n" .
//                'Reply-To: webmaster@example.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//
//        mail($to, $subject, $message, $headers);
//        mysqli_query($conn, $sql);
//        mysqli_close($conn);
//        header("Location:../pack1.php");
        ?>
    </body>
</html>
