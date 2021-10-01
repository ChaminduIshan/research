<?php 
    $storagename = "uploaded_file.csv";
    if ( isset($storagename) && $file = fopen( "upload/" . $storagename , "r" ) ) {
        ?>
        <form action="add_data.php" method="POST">
        <table border="1" style="border-collapse: collapse;">
        <?php
        $count =0;
        while (($getDataa = fgetcsv($file, 10000, ",")) != FALSE) {
            
            ?>
                <tr>
                    <td><input type="hidden" id="bth_id_<?php echo $count; ?>" name="bth_id_<?php echo $count; ?>" value="<?php echo $getDataa[0] ?>" ><?php echo $getDataa[0] ?></td>
                    <td><input type="hidden" id="p_id_<?php echo $count; ?>" name="p_id_<?php echo $count; ?>"value="<?php echo $getDataa[1]?>" ><?php echo $getDataa[1] ?></td>
                    <td><input type="hidden" id="bth_no_<?php echo $count; ?>" name="bth_no_<?php echo $count; ?>" value="<?php echo $getDataa[2] ?>"><?php echo $getDataa[2] ?></td>
                    <td><input type="hidden" id="bth_dp_<?php echo $count; ?>" name="bth_dp_<?php echo $count; ?>"value="<?php echo $getDataa[3] ?>" ><?php echo $getDataa[3] ?></td>
                    <td><input type="hidden" id="u_id_<?php echo $count; ?>" name="u_id_<?php echo $count; ?>" value="<?php echo $getDataa[4] ?>"><?php echo $getDataa[4] ?></td>
                    <td><input type="checkbox" id="check_<?php echo $count; ?>" name="check_<?php echo $count; ?>"></td>
                </tr>
            <?php
            $count++;
        }
        ?>
       
        </table>
        <table>
            <tr>
                <td>
                    <input type="submit" value="ADD DATA"> 
                </td>
            </tr>
        </table>
        <input type="hidden" value="<?php echo $count ?>" id="count" name="count">
        </form>
        <?php

    }else{
        echo "File not opened.<br />";
    }
?>