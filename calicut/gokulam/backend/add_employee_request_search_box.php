<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM login WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name ";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $shopowner) {
?>
<li onClick="selectShop('<?php echo $shopowner["name"]; ?>');"><?php echo $shopowner["name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>