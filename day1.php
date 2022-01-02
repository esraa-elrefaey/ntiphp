<?php 

// # Task ... 
// Write a PHP program to calculate electricity bill .
// Conditions:
// For first 50 units – 3.50/unit
// For next 100 units – 4.00/unit
// For units above 150 – 6.50/unit
// You can use conditional statements.


$cal_bill ="";
$usage =140 ;

if ($usage <= 50 )
    {
       $cal_bill = $usage * 3.50;
      echo "electricity bill = ".$cal_bill ;
    }
    elseif ($usage >50 && $usage <=150 ) 
    {
        $cal_bill = $usage * 4.00;
        echo "electricity bill = ".$cal_bill ;
    }
    elseif ($usage > 150) {
        $cal_bill = $usage * 6.50 ;
      echo "electricity bill = ".$cal_bill ;

    }









?>