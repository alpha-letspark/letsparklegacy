<?php
$conn = mysql_connect("database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com","admin","letspark123321");
mysql_select_db("gokulam",$conn);
$result = mysql_query("SELECT * FROM login");
?>
<html>
<head>
<title>Users List</title>
<link rel="icon" href="http://letspark.in/img/favicon.png" sizes="144x144">
<link rel="stylesheet" type="text/css" href="styles.css" />
<script language="javascript" src="users.js" type="text/javascript"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<SCRIPT language="javascript">

    $(function () {

        // add multiple select / deselect functionality

        $("#selectall").click(function () {

            $('.name').attr('checked', this.checked);

        });

 

        // if all checkbox are selected, then check the select all checkbox

        // and viceversa

        $(".name").click(function () {

 

            if ($(".name").length == $(".name:checked").length) {

                $("#selectall").attr("checked", "checked");

            } else {

                $("#selectall").removeAttr("checked");

            }

 

        });

    });

</SCRIPT>
</head>
<body>
<form name="frmUser" method="post" action="">
<div>
<table border="0" cellpadding="10" cellspacing="1" width="100%" class="tblListForm">
<tr class="listheader">
<td><input type="checkbox" id="selectall"/> </td>
<td>id</td>
<td>uname</td>
<td>pwd</td>
</tr>
<?php
$i=0;
while($row = mysql_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td width="20" align="center"><input type="checkbox" class="name" name="id[]" value="<?php echo $row["id"]; ?>"/></td>
<!--<td><input type="checkbox" name="users[]" value="<?php echo $row["id"]; ?>" ></td>-->
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["user"]; ?></td>
<td><?php echo $row["pass"]; ?></td>
</tr>
<?php
$i++;
}
?>
<tr class="listheader">
<td colspan="4"><input type="button" name="update" value="Update" onClick="setUpdateAction();" /> <input type="button" name="delete" value="Delete"  onClick="setDeleteAction();" /></td>
</tr>
</table>
</form>
</div>
</body></html>