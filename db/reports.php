<?Php
require('fpdf.php');
include 'connect.php';

if ($link==true){
    if (isset($_POST['get_week_report'])&&$_POST['get_week_report']==true) {

        $chk = "SELECT * FROM `ads` WHERE date<'".$_POST['date']."' and date>DATE_ADD('".$_POST['date']."',INTERVAL -7 DAY)";
        $result=mysqli_query($link,$chk);
        if ($result->num_rows>0){
            $i=0;
            $profit =0;
            $price=0;
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',7);

            $width_cell=array(5,25,40,20,20,35,20,25);
            $pdf->SetFillColor(193,229,252);

            $pdf->Cell($width_cell[0],10,'#',1,0,'C',true);
            $pdf->Cell($width_cell[1],10,'CUSTOMER NAME',1,0,'C',true);
            $pdf->Cell($width_cell[2],10,'EMAIL',1,0,'C',true);
            $pdf->Cell($width_cell[3],10,'PHONE',1,0,'C',true);
            $pdf->Cell($width_cell[4],10,'CATEGORY',1,0,'C',true);
            $pdf->Cell($width_cell[5],10,'DESCRIPTION',1,0,'C',true);
            $pdf->Cell($width_cell[6],10,'GROUP NAME',1,0,'C',true);
            $pdf->Cell($width_cell[7],10,'TOTAL',1,1,'C',true);

            $pdf->SetFont('Arial','',7);

            foreach ($result as $val){
                $i++;

                $pdf->SetFillColor(252, 235, 3);
                $pdf->Cell($width_cell[0],10,$i,1,0,'C',true);
                $pdf->Cell($width_cell[1],10,$val['fname'].' '.$val['lname'],1,0,'C',true);
                $pdf->Cell($width_cell[2],10,$val['email'],1,0,'C',true);
                $pdf->Cell($width_cell[3],10,$val['phone'],1,0,'C',true);
                $pdf->Cell($width_cell[4],10,$val['category'],1,0,'C',true);
                $pdf->Cell($width_cell[5],10,$val['description'],1,0,'C',true);
                $pdf->Cell($width_cell[6],10,$val['g_name'],1,0,'C',true);
                $pdf->Cell($width_cell[7],10,$val['budget'],1,1,'C',true);

                $chks = "SELECT r.* FROM register r,groups g,group_users gu WHERE gu.group_id=g.id and gu.user_id=r.id and g.id=".$val['group_id'];
                $results=mysqli_query($link,$chks);
                $j=0;
                if ($results->num_rows>0){

                    $pdf->SetFont('Arial','B',7);

                    $width_cell1=array(5,25,40,20,20,35,20,25);
                    $pdf->SetFillColor(255, 166, 197);

                    $pdf->Cell($width_cell1[7],10,'',0,0,'C',false);
                    $pdf->Cell($width_cell1[0],10,'#',1,0,'C',true);
                    $pdf->Cell($width_cell1[1],10,'NAME',1,0,'C',true);
                    $pdf->Cell($width_cell1[2],10,'EMAIL',1,0,'C',true);
                    $pdf->Cell($width_cell1[3],10,'PHONE',1,0,'C',true);
                    $pdf->Cell($width_cell1[4],10,'PAGE',1,0,'C',true);
                    $pdf->Cell($width_cell1[5],10,'PLATFORM',1,0,'C',true);
                    $pdf->Cell($width_cell1[6],10,'PRICE',1,1,'C',true);

                    $sub_price=0;

                    foreach ($results as $vals){
                        $j++;
                        $pdf->Cell($width_cell1[7],10,'',0,0,'C',false);
                        $pdf->Cell($width_cell1[0],10,$j,1,0,'C',false);
                        $pdf->Cell($width_cell1[1],10,$vals['fname'].' '.$vals['lname'],1,0,'C',false);
                        $pdf->Cell($width_cell1[2],10,$vals['email'],1,0,'C',false);
                        $pdf->Cell($width_cell1[3],10,$vals['phone'],1,0,'C',false);
                        $pdf->Cell($width_cell1[4],10,$vals['page'],1,0,'C',false,$vals['page_url']);
                        $pdf->Cell($width_cell1[5],10,$vals['platform'],1,0,'C',false);
                        $pdf->Cell($width_cell1[6],10,$vals['price'],1,1,'C',false);
                        $sub_price=$sub_price+$vals['price'];
                    }

                    $pro=$sub_price*0.1;

                    $sub_price=$sub_price+$pro;

                    $pdf->SetFillColor(181, 255, 213);
                    $pdf->Cell($width_cell1[7],10,'',0,0,'C',false);
                    $pdf->Cell(145,10,'Company Revenue',1,0,'C',true);
                    $pdf->Cell($width_cell1[6],10,$pro,1,1,'C',true);

                    $pdf->SetFillColor(255, 219, 135);
                    $pdf->Cell($width_cell1[7],10,'',0,0,'C',false);
                    $pdf->Cell(145,10,'Total Price',1,0,'C',true);
                    $pdf->Cell($width_cell1[6],10,$sub_price,1,1,'C',true);

                    $profit=$profit+$pro;

                }

                $price=$price+$val['budget'];

            }

            $pdf->SetFillColor(222, 228, 255);
            $pdf->Cell(165,10,'Total Profit',1,0,'C',true);
            $pdf->Cell($width_cell[7],10,$profit,1,1,'C',true);

            $pdf->SetFillColor(194, 166, 255);
            $pdf->Cell(165,10,'Total Income',1,0,'C',true);
            $pdf->Cell($width_cell[7],10,$price,1,1,'C',true);

            $pdf->Output("report.pdf","F");

            echo json_encode("success");

        }else{
            echo json_encode("no_data");
        }


    }

    if (isset($_POST['get_month_report'])&&$_POST['get_month_report']==true) {

        $yr = $_POST['year'];
        $month = $_POST['month'];

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


        $chk = "SELECT * FROM `ads` WHERE date<'".$e_date."' and date>'".$s_date."'";
        $result=mysqli_query($link,$chk);
        if ($result->num_rows>0){
            $i=0;
            $profit =0;
            $price=0;
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',7);

            $width_cell=array(5,25,40,20,20,35,20,25);
            $pdf->SetFillColor(193,229,252);

            $pdf->Cell($width_cell[0],10,'#',1,0,'C',true);
            $pdf->Cell($width_cell[1],10,'CUSTOMER NAME',1,0,'C',true);
            $pdf->Cell($width_cell[2],10,'EMAIL',1,0,'C',true);
            $pdf->Cell($width_cell[3],10,'PHONE',1,0,'C',true);
            $pdf->Cell($width_cell[4],10,'CATEGORY',1,0,'C',true);
            $pdf->Cell($width_cell[5],10,'DESCRIPTION',1,0,'C',true);
            $pdf->Cell($width_cell[6],10,'GROUP NAME',1,0,'C',true);
            $pdf->Cell($width_cell[7],10,'TOTAL',1,1,'C',true);

            $pdf->SetFont('Arial','',7);

            foreach ($result as $val){
                $i++;

                $pdf->SetFillColor(252, 235, 3);
                $pdf->Cell($width_cell[0],10,$i,1,0,'C',true);
                $pdf->Cell($width_cell[1],10,$val['fname'].' '.$val['lname'],1,0,'C',true);
                $pdf->Cell($width_cell[2],10,$val['email'],1,0,'C',true);
                $pdf->Cell($width_cell[3],10,$val['phone'],1,0,'C',true);
                $pdf->Cell($width_cell[4],10,$val['category'],1,0,'C',true);
                $pdf->Cell($width_cell[5],10,$val['description'],1,0,'C',true);
                $pdf->Cell($width_cell[6],10,$val['g_name'],1,0,'C',true);
                $pdf->Cell($width_cell[7],10,$val['budget'],1,1,'C',true);

                $chks = "SELECT r.* FROM register r,groups g,group_users gu WHERE gu.group_id=g.id and gu.user_id=r.id and g.id=".$val['group_id'];
                $results=mysqli_query($link,$chks);
                $j=0;
                if ($results->num_rows>0){

                    $pdf->SetFont('Arial','B',7);

                    $width_cell1=array(5,25,40,20,20,35,20,25);
                    $pdf->SetFillColor(255, 166, 197);

                    $pdf->Cell($width_cell1[7],10,'',0,0,'C',false);
                    $pdf->Cell($width_cell1[0],10,'#',1,0,'C',true);
                    $pdf->Cell($width_cell1[1],10,'NAME',1,0,'C',true);
                    $pdf->Cell($width_cell1[2],10,'EMAIL',1,0,'C',true);
                    $pdf->Cell($width_cell1[3],10,'PHONE',1,0,'C',true);
                    $pdf->Cell($width_cell1[4],10,'PAGE',1,0,'C',true);
                    $pdf->Cell($width_cell1[5],10,'PLATFORM',1,0,'C',true);
                    $pdf->Cell($width_cell1[6],10,'PRICE',1,1,'C',true);

                    $sub_price=0;

                    foreach ($results as $vals){
                        $j++;
                        $pdf->Cell($width_cell1[7],10,'',0,0,'C',false);
                        $pdf->Cell($width_cell1[0],10,$j,1,0,'C',false);
                        $pdf->Cell($width_cell1[1],10,$vals['fname'].' '.$vals['lname'],1,0,'C',false);
                        $pdf->Cell($width_cell1[2],10,$vals['email'],1,0,'C',false);
                        $pdf->Cell($width_cell1[3],10,$vals['phone'],1,0,'C',false);
                        $pdf->Cell($width_cell1[4],10,$vals['page'],1,0,'C',false,$vals['page_url']);
                        $pdf->Cell($width_cell1[5],10,$vals['platform'],1,0,'C',false);
                        $pdf->Cell($width_cell1[6],10,$vals['price'],1,1,'C',false);
                        $sub_price=$sub_price+$vals['price'];
                    }

                    $pro=$sub_price*0.1;

                    $sub_price=$sub_price+$pro;

                    $pdf->SetFillColor(181, 255, 213);
                    $pdf->Cell($width_cell1[7],10,'',0,0,'C',false);
                    $pdf->Cell(145,10,'Company Revenue',1,0,'C',true);
                    $pdf->Cell($width_cell1[6],10,$pro,1,1,'C',true);

                    $pdf->SetFillColor(255, 219, 135);
                    $pdf->Cell($width_cell1[7],10,'',0,0,'C',false);
                    $pdf->Cell(145,10,'Total Price',1,0,'C',true);
                    $pdf->Cell($width_cell1[6],10,$sub_price,1,1,'C',true);

                    $profit=$profit+$pro;

                }

                $price=$price+$val['budget'];

            }

            $pdf->SetFillColor(222, 228, 255);
            $pdf->Cell(165,10,'Total Profit',1,0,'C',true);
            $pdf->Cell($width_cell[7],10,$profit,1,1,'C',true);

            $pdf->SetFillColor(194, 166, 255);
            $pdf->Cell(165,10,'Total Income',1,0,'C',true);
            $pdf->Cell($width_cell[7],10,$price,1,1,'C',true);

            $pdf->Output("report.pdf","F");

            echo json_encode("success");

        }else{
            echo json_encode("no_data");
        }


    }
}else{
    echo "Connection Error!";
}

?>