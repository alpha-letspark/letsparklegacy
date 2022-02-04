<?php

header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$employee_id =  $_GET['employee_id'];
$area =  $_GET['area'];
$date = $_GET['date'];

if ($area == 0 ) {


$sql = "SELECT count(*) as two_wheeler_count from details_transaction where exit_user_id = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '2' and area = '$area'";
$result3 = mysqli_query($con,$sql);
$two_wheeler_count=mysqli_fetch_row($result3);

$sql1 = "SELECT count(*) as four_wheeler_count from details_transaction where exit_user_id = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '4' and area = '$area'";
$result4 = mysqli_query($con,$sql1);
$four_wheeler_count=mysqli_fetch_row($result4);

$sql6 = "SELECT count(*) as foc_count from details_transaction where exit_user_id = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  foc = '1' and  area = '$area'";
$result6 = mysqli_query($con,$sql6);
$foc_count=mysqli_fetch_row($result6);


$query1 = "SELECT COALESCE(SUM(exit_pay),0) as sum_exit_pay_two from details_transaction where exit_user_id = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '2'  and area = '$area'";
$result1 = mysqli_query($con,$query1);
$sum_exit_pay_two=mysqli_fetch_row($result1);
$total3 = implode(',', $sum_exit_pay_two); 


$query2 = "SELECT COALESCE(SUM(exit_pay),0) as sum_exit_pay_four from details_transaction where exit_user_id = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '4'  and area = '$area'";
$result2 = mysqli_query($con,$query2);
$sum_exit_pay_four=mysqli_fetch_row($result2);
$total4 = implode(',', $sum_exit_pay_four); 


$sql9 = "SELECT count(*) FROM `details_transaction`  where exit_user_id = $employee_id and vehicle_type = '2'  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and (TIME_TO_SEC(exit_time) - TIME_TO_SEC(entry_time)) <= 900 and area = '$area'";
$result9 = mysqli_query($con,$sql9);
$under_fifteen_minute=mysqli_fetch_row($result9);



$total_final = $total3 + $total4;
$data = array("result" => 1, "two_wheeler_count" => $two_wheeler_count ,"four_wheeler_count" => $four_wheeler_count, "foc_count" => $foc_count, "two_wheeler_amount" =>$sum_exit_pay_two, "four_wheeler_amount" =>$sum_exit_pay_four , "under_fifteen_minute" =>$under_fifteen_minute , "area" => "basement" , "total" => "$total_final"  );






}


 else

  {
$sql = "SELECT count(*) as two_wheeler_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '2' and area = '$area'";
$result3 = mysqli_query($con,$sql);
$two_wheeler_count=mysqli_fetch_row($result3);

$sql1 = "SELECT count(*) as four_wheeler_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '4' and area = '$area'";
$result4 = mysqli_query($con,$sql1);
$four_wheeler_count=mysqli_fetch_row($result4);

$sql6 = "SELECT count(*) as foc_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  foc = '1' and  area = '$area'";
$result6 = mysqli_query($con,$sql6);
$foc_count=mysqli_fetch_row($result6);


$query1 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_two from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '2'  and area = '$area'";
$result1 = mysqli_query($con,$query1);
$sum_exit_pay_two=mysqli_fetch_row($result1);
$total5 = implode(',', $sum_exit_pay_two); 



$query2 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_four from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '4'  and area = '$area'";
$result2 = mysqli_query($con,$query2);
$sum_exit_pay_four=mysqli_fetch_row($result2);
$total6 = implode(',', $sum_exit_pay_four); 



$total_final = $total5 + $total6;
$data = array("result" => 1, "two_wheeler_count" => $two_wheeler_count ,"four_wheeler_count" => $four_wheeler_count, "foc_count" => $foc_count, "two_wheeler_amount" =>$sum_exit_pay_two, "four_wheeler_amount" =>$sum_exit_pay_four , "area" => "surface" , "total" => "$total_final" );

}

mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>