<?php
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$sql1 = "select four_wheeler_slot  from client_settings";
$result4 = mysqli_query($con,$sql1);
$fourslots=mysqli_fetch_row($result4);
foreach($fourslots as $fourwheeler){
        $four = $fourwheeler;
        //echo $two;
    }

$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");

$sql = "SELECT COUNT(id) from details_transaction where status = '0' and vehicle_type = '4' and card_type = '4'";
$result3 = mysqli_query($con,$sql);
$transactions = mysqli_fetch_row($result3);

//echo $total_transaction;

foreach($transactions as $transaction){
        $transfour = $transaction;


$final =  $four - $transfour;
echo $final;

    }
?>