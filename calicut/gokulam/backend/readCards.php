<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM card_details WHERE card_number like '" . $_POST["keyword"] . "%' ORDER BY card_number LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $card) {
?>
<li onClick="selectShop('<?php echo $card["card_number"]; ?>');"><?php echo $card["card_number"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>