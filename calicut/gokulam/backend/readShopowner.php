<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM login WHERE user like '" . $_POST["keyword"] . "%' ORDER BY user LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $shopowner) {
?>
<li onClick="selectShop('<?php echo $shopowner["id"]; ?>');"><?php echo $shopowner["name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>