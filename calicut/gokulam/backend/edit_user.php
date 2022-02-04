<?php
$conn = mysql_connect("database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com","admin","letspark123321");
mysql_select_db("gokulam",$conn);

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["id"]);
for($i=0;$i<$usersCount;$i++) {
mysql_query("UPDATE login set type= '4' WHERE id='" . $_POST["id"][$i] . "'");
}
header("Location:list_user.php");
}
?>
<html>
<head>
<title>Edit Multiple User</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center">
<tr class="tableheader">
<td>Edit User</td>
</tr>
<?php
$rowCount = count($_POST["id"]);
for($i=0;$i<$rowCount;$i++) {
$result = mysql_query("SELECT * FROM login WHERE id='" . $_POST["id"][$i] . "'");
$row[$i]= mysql_fetch_array($result);
?>
<tr>
<td>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr>
<td><label>Id</label></td>
<td><input type="hidden" name="id[]" class="txtField" value="<?php echo $row[$i]['id']; ?>"><input type="text" name="userName[]" class="txtField" value="<?php echo $row[$i]['userName']; ?>"></td>
</tr>

<td><label>Pwd</label></td>
<td><input type="text" name="firstName[]" class="txtField" value="<?php echo $row[$i]['pass']; ?>"></td>
</tr>

</table>
</td>
</tr>
<?php
}
?>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>