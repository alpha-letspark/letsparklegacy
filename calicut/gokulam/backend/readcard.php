<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
//$query ="SELECT * FROM card_details WHERE card_number like '" . $_POST["keyword"] . "%' and ( approval_status = '0' or approval_status = '3') ORDER BY card_number LIMIT 0,6";

$query ="SELECT * FROM card_details WHERE card_number like '" . $_POST["keyword"] . "%' and ( approval_status = '1' or approval_status = '3')  ORDER BY card_number LIMIT 0,6";

$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $shopowner) {
?>
<li onClick="selectShop('<?php echo $shopowner["card_number"]; ?>');"><?php echo $shopowner["card_number"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>