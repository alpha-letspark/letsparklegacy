<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');  
include_once("db_config.php");

$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$email= $obj->email;
$password= $obj->password;
$pass = md5($password);
 $query = sprintf("SELECT * FROM  cms_users where email='$email' ");
 
 $qur =  mysql_query($query) or die(mysql_error());
 while($rowc = mysql_fetch_array($qur)){
  //extract($rowc); 

 if( $rowc['email']==NULL &&  $rowc['password']== NULL )

	{
		$data = array("result" => 0, "status" => "failed") ;
	}



 else if( $rowc['email']==$email &&  $rowc['password']== $pass )

	{
		$data = array("result" => 1, "status" => "success" ,"name" => $rowc['name'],"employee_id" => $rowc['id'], "id_cms_privileges" => $rowc['id_cms_privileges']); ;
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