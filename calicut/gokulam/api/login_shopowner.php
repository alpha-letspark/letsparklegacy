<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');  
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);

$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$user= strtolower($obj->user);
//$email= $obj->email; 
$password= $obj->password;
$pass = md5($password);
 $query = sprintf("SELECT * FROM  login where user='$user' ");
 
 $qur =  mysql_query($query) or die(mysql_error());
 while($rowc = mysql_fetch_array($qur)){
  //extract($rowc); 

 if( $rowc['user']==NULL &&  $rowc['pass']== NULL )

	{
		$data = array("result" => 0, "status" => "failed") ;
	}



 else if( $rowc['user']==$user &&  $rowc['pass']== $pass )

	{
		$data = array("result" => 1, "status" => "success" ,"name" => $rowc['name'],"shopowner_id" => $rowc['id'], "id_cms_privileges" => $rowc['type']); ;
	}



	else
	{
		$data = array("result" => 0, "status" => "failed"); 
	}

 }
 
mysql_close($conn);
/* JSON Response */
//header("Content-type: application/json");
echo json_encode($data);

?>