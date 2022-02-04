<?php
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$sql = "select two_wheeler_slot from client_settings";
$result3 = mysqli_query($con,$sql);
$twoslots=mysqli_fetch_row($result3);
foreach($twoslots as $twowheeler){
        $two = $twowheeler;
        //echo $two;
    }

$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");

$sql = "SELECT COUNT(id) from details_transaction where status = '0' and vehicle_type = '2' and card_type = '5'";
$result3 = mysqli_query($con,$sql);
$transactions = mysqli_fetch_row($result3);

//echo $total_transaction;

foreach($transactions as $transaction){
        $transtwo = $transaction;


$final =  $two - $transtwo;
echo $final;

    }
?>