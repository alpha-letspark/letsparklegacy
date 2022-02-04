<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$redem_amount = array(
    "Two" => array(
        "1st" => 5,
        "2nd" => 10,
        "3rd" => 20,
    ),
          
    "Four" => array(        
        "1st" => 10,
        "2nd" => 20,
        "3rd" => 30,
    ),
      
);

$data = array("status" => "success", "data" => $redem_amount );
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);
?>