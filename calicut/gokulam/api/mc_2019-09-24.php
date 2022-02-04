<?php

header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$con = mysqli_connect('localhost', 'root', 'letspark123321','mallofmysoredemo') or die("DB Connection cant be established");
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




$query1 = "SELECT COALESCE(SUM(exit_pay),0) as sum_exit_pay_two from details_transaction where exit_user_id = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '2'  and area = '$area'";
$result1 = mysqli_query($con,$query1);
$sum_exit_pay_two=mysqli_fetch_row($result1);
$total2 = implode(',', $sum_exit_pay_two); 


$query2 = "SELECT COALESCE(SUM(exit_pay),0) as sum_exit_pay_four from details_transaction where exit_user_id = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '4'  and area = '$area'";
$result2 = mysqli_query($con,$query2);
$sum_exit_pay_four=mysqli_fetch_row($result2);
$total4 = implode(',', $sum_exit_pay_four);


$sql6 = "SELECT count(*) as foc_count from details_transaction where exit_user_id = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  foc = '1' and  area = '$area'";
$result6 = mysqli_query($con,$sql6);
$foc_count=mysqli_fetch_row($result6);



$total_final = $total2 + $total4 ;

$data = array("result" => 1, "two_wheeler_count" => $two_wheeler_count ,"four_wheeler_count" => $four_wheeler_count ,  "foc_count" => $foc_count, "two_wheeler_amount" =>$sum_exit_pay_two, "four_wheeler_amount" =>$sum_exit_pay_four ,  "area" => "basement" , "total" => "$total_final"  );



}


 else

  {
$sql = "SELECT count(*) as two_wheeler_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '2' and area = '$area'";
$result3 = mysqli_query($con,$sql);
$two_wheeler_count=mysqli_fetch_row($result3);

$sql1 = "SELECT count(*) as four_wheeler_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '4' and area = '$area'";
$result4 = mysqli_query($con,$sql1);
$four_wheeler_count=mysqli_fetch_row($result4);


$sql = "SELECT count(*) as three_wheeler_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '3' and area = '$area'";
$result13 = mysqli_query($con,$sql);
$three_wheeler_count=mysqli_fetch_row($result13);

$sql = "SELECT count(*) as mini_tt_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '5' and area = '$area'";
$result14 = mysqli_query($con,$sql);
$mini_tt_count=mysqli_fetch_row($result14);


$sql = "SELECT count(*) as tt_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '6' and area = '$area'";
$result15 = mysqli_query($con,$sql);
$tt_count=mysqli_fetch_row($result15);

$sql = "SELECT count(*) as bus_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '7' and area = '$area'";
$result15 = mysqli_query($con,$sql);
$bus_count=mysqli_fetch_row($result15);



$sql6 = "SELECT count(*) as foc_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  foc = '1' and  area = '$area'";
$result6 = mysqli_query($con,$sql6);
$foc_count=mysqli_fetch_row($result6);


$query1 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_two from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '2'  and area = '$area'";
$result1 = mysqli_query($con,$query1);
$sum_exit_pay_two=mysqli_fetch_row($result1);
$total1 = implode(',', $sum_exit_pay_two); 



$query2 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_four from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '4'  and area = '$area'";
$result2 = mysqli_query($con,$query2);
$sum_exit_pay_four=mysqli_fetch_row($result2);
$total2 = implode(',', $sum_exit_pay_four); 


$query3 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_three from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '3'  and area = '$area'";
$result3 = mysqli_query($con,$query3);
$sum_exit_pay_three=mysqli_fetch_row($result3);
$total3 = implode(',', $sum_exit_pay_three);


$query5 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_mini_tt from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '5'  and area = '$area'";
$result5 = mysqli_query($con,$query5);
$sum_exit_pay_mini_tt=mysqli_fetch_row($result5);
$total5 = implode(',', $sum_exit_pay_mini_tt); 

$query6 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_tt from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '6'  and area = '$area'";
$result6 = mysqli_query($con,$query6);
$sum_exit_pay_tt=mysqli_fetch_row($result6);
$total6 = implode(',', $sum_exit_pay_tt);

$query7 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_bus from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '7'  and area = '$area'";
$result7 = mysqli_query($con,$query7);
$sum_exit_pay_bus=mysqli_fetch_row($result7);
$total7 = implode(',', $sum_exit_pay_bus);


$total_final = $total1 + $total2 + $total3 + $total5 + $total6 + $total7;
$data = array("result" => 1, "two_wheeler_count" => $two_wheeler_count ,"four_wheeler_count" => $four_wheeler_count  , "three_wheeler_count" => $three_wheeler_count , "mini_tt_count" => $mini_tt_count , "tt_count" => $tt_count , "bus_count" => $bus_count, "foc_count" => $foc_count, "two_wheeler_amount" =>$sum_exit_pay_two, "four_wheeler_amount" =>$sum_exit_pay_four , "three_wheeler_amount" =>$sum_exit_pay_three , "mini_tt_amount" =>$sum_exit_pay_mini_tt , "tt_amount" =>$sum_exit_pay_tt , "bus_amount" =>$sum_exit_pay_bus, "area" => "surface" , "total" => "$total_final"   );

}

mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>