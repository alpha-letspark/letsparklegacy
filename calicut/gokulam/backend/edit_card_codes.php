<?php
session_start();
$db = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com','admin','letspark123321','gokulam');

//require_once("dbcontroller.php");
//$db_handle = new DBController();

$shop_name = "";
$employee_name = "";
$mobile = "";
$vehicle_type = "";
$vehicle_number = "";
$card_type = "";
$name = "";
$email = "";
$password = "";
$type = "";
$update = false;

	
	//$con = mysqli_connect('localhost', 'root', 'mysq','mallofmysoredemo') or die("DB Connection cant be established");
	
	if (isset($_POST['update']))
	{
		$id = $_POST['id'];
		$card_number = $_POST['card_number'];
		$type = $_POST['type'];
		$status = $_POST['status'];
		$valid_from = $_POST['valid_from'];
		$valid_to = $_POST['valid_to'];
		$approval_status = $_POST['approval_status'];
	
		mysqli_query($db, "UPDATE card_details SET card_number='$card_number',type='$type', status='$status',valid_from='$valid_from',valid_to='$valid_to',approval_status='$approval_status' WHERE  id='$id'");
	
		
		//$_SESSION['message'] = "Address Updated...";
		header('location: card_details.php');
	}
	


?>