<!--
(C) COPYRIGHT 2019 SKYLINK TELETECH LTD. ALL RIGHTS RESERVED.
For copyright inquiries, please contact at copyright@skylinktel.com
-->
<?php
    $IMEI_14 = filter_input(INPUT_GET, 'imei_14', FILTER_SANITIZE_NUMBER_INT);
    if(strlen($IMEI_14) === 14){
        $add_even_total = 0;
        $add_odd = 0;
        for($i = 0; $i < 14; $i++){
            if(($i % 2) === 1){
                $even_x2 = $IMEI_14[$i] * 2;
                $add_even = intval($even_x2 / 10) + $even_x2 % 10;
                $add_even_total += $add_even;
            }else{
                $add_odd += $IMEI_14[$i];
            }
        }
        $veri_digit = ($add_even_total + $add_odd) % 10;
        if($veri_digit != 0){
            $veri_digit = 10 - $veri_digit;
        }
        echo("Verification Digit: $veri_digit<br>");
        echo("IMEI: " . $IMEI_14 . $veri_digit);
    }else{
        echo("Invalid Entry!!<br>");
        echo("Digits Entered: $IMEI_14");
    }
?>