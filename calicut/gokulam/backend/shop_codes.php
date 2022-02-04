<?php
session_start();
$db  = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com','admin','letspark123321','gokulam');

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
	if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		mysqli_query($db, "UPDATE employee_allocation SET current_status ='3'WHERE  id='$id'");
		header('location: employee_list.php');

	}

	if (isset($_POST['add_attendant']))
	{
		$name = $_POST['name'];
		$user = $_POST['username'];
		$password = md5($_POST['password']);
		$type = '3';
		$business_type = 'shop';
								
		mysqli_query($db, "INSERT INTO login (name,user,pass,type,business_type) VALUES ('$name', '$user', '$password', '$type', '$business_type')");
		//$_SESSION['message'] = "Data sent successfully";
		//alert("data is saved");
		header('location: add_shop.php');

	}
	if (isset($_POST['update']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$user = $_POST['username'];
		$pass = md5($_POST['password']);
		

	if ($password == "")
	{
		mysqli_query($db, "UPDATE login SET name='$name',user='$user', pass ='$pass'  WHERE  id='$id'");
	}
	else
	{
		mysqli_query($db, "UPDATE login SET name='$name', user ='$user' , pass ='$pass' WHERE  id='$id'");
	}
	
		
		//$_SESSION['message'] = "Address Updated...";
		header('location: view_shop.php');
	}
	if (isset($_GET['del']))
	{
		$id = $_GET['del'];
		mysqli_query($db, "UPDATE login SET type = '0' WHERE  id='$id'");
		$_SESSION['message'] = "Record deleted";
		
		header('location: view_shop.php');
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