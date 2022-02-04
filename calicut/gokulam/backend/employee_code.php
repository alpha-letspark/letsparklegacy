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
	if(isset($_GET['del_employee_request']))
	{
		$id = $_GET['del_employee_request'];
		
		mysqli_query($db, "UPDATE employee_allocation SET current_status ='3' WHERE  id='$id'");
		//mysqli_query($db, "DELETE from employee_allocation WHERE  id='$id'");
		
			$sql1 = "select card_number from employee_allocation WHERE id = '$id'";
			$result4 = mysqli_query($db,$sql1);
			$card_number=mysqli_fetch_row($result4);
			$c = $card_number[0];
	
		mysqli_query($db, "UPDATE card_details SET approval_status ='1' WHERE  card_number='$c'");

	    echo "<script>alert('Record has been deleted');</script>";

		
		header('location: employee_list.php');

	}

	if (isset($_POST['add_employee_request']))
	{
		$shop_name = $_POST['shop_name'];
		//$shop_id = mysqli_query($db, "SELECT id FROM login WHERE name = '$shop_name' ");
			$sql1 = "select id from login WHERE name = '$shop_name'";
			$result4 = mysqli_query($db,$sql1);
			$shop_id=mysqli_fetch_row($result4);
			$swap=$shop_id[0];
			//echo $shop_id;
		$employee_name = $_POST['employee_name'];
		$mobile = $_POST['mobile'];
		$vehicle_type = $_POST['vehicle_type'];
		$vehicle_number = $_POST['vehicle_number'];
		$card_type = $_POST['card_type'];
						
		mysqli_query($db, "INSERT INTO employee_allocation (shop_id,employee_name,mobile,vehicle_type,vehicle_number,card_type,current_status) VALUES ('$swap','$employee_name', '$mobile', '$vehicle_type', '$vehicle_number', '$card_type', '0')");
		$_SESSION['message'] = "Data sent successfully";
		//alert("data is saved");
		header('location: add_employee_request.php');

	}
	if (isset($_POST['update_employee_request']))
	{
		$id = $_POST['employee_id'];
		$shop_name = $_POST['shop_name'];
		//$shop_id = mysqli_query($db, "SELECT id FROM login WHERE name = '$shop_name' ");
			$sql1 = "select id from login WHERE name = '$shop_name'";
			$result4 = mysqli_query($db,$sql1);
			$shop_id=mysqli_fetch_row($result4);
			$swap=$shop_id[0];
			//echo $shop_id;
		$employee_name = $_POST['employee_name'];
		$mobile = $_POST['mobile'];
		$vehicle_type = $_POST['vehicle_type'];
		$vehicle_number = $_POST['vehicle_number'];
		$card_type = $_POST['card_type'];
						
		mysqli_query($db, "update employee_allocation set shop_id = '$swap' , employee_name = '$employee_name' , mobile = '$mobile', vehicle_type = '$vehicle_type' , vehicle_number = '$vehicle_number', card_type = '$card_type' where id='$id'") ;
		//$_SESSION['message'] = "Data sent successfully";
		//alert("data is saved");
		header('location: employee_list.php');

	}

	if (isset($_POST['add_attendant']))
	{
		$name = $_POST['name'];
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		$type = $_POST['type'];
								
		mysqli_query($db, "INSERT INTO cms_users (name,email,password,id_cms_privileges) VALUES ('$name', '$email', '$password', '$type')");
		//$_SESSION['message'] = "Data sent successfully";
		//alert("data is saved");
		header('location: add_attendant.php');

	}
	if (isset($_POST['update']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		$type = $_POST['type'];

	if ($password == "")
	{
		mysqli_query($db, "UPDATE cms_users SET name='$name',email='$email',password='$password',id_cms_privileges='$type' WHERE  id='$id'");
	}
	else
	{
		mysqli_query($db, "UPDATE cms_users SET name='$name',email='$email',id_cms_privileges='$type' WHERE  id='$id'");
	}
	
		
		//$_SESSION['message'] = "Address Updated...";
		header('location: view_attendant.php');
	}
	
/*if(!empty($_POST["keyword"])) {
$query ="SELECT name FROM mall_details WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $name) {
?>
<li onClick="selectname('<?php echo $mall_details["name"]; ?>');"></li>
<?php } ?>
</ul>
<?php } } ?>*/

?>