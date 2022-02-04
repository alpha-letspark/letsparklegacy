<?php 
$db = new mysqli('localhost', 'campusvi_feedbac', 'tRX@_#5DkU.m', 'campusvi_feedback');
if($_POST['id']!=""):
	extract($_POST);
    $id=mysqli_real_escape_string($db,$id);
 	$sql = $db->query("DELETE FROM rating WHERE id='$id'");
endif;
?>