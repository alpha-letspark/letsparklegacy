<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$myObj->name = "Gokulam Mall";
$myObj->place = "Kochi";
$myObj->gst = "32AAECS2586E1ZI";

$myObj->terms->line1 = "Conditions Apply";
$myObj->terms->line2 = "";
$myObj->terms->line3 = "";
$myObj->terms->line4 = "";
$myObj->footer = "Powered by LetsPark";
$myJSON = json_encode($myObj);

echo $myJSON;
?>