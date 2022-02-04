<?php 
	@ob_start();
ini_set('display_errors','off');
include("config.php");
session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
// $user_id =  $_SESSION['id'];
			
	$query = sprintf("SELECT * FROM  login where type = '3' ORDER BY  name ASC");
//	echo $query;
	$qur =  mysql_query($query) or die(mysql_error());
	while($rowc = mysql_fetch_array($qur)){

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Multiple Rows With Checkboxes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="css/dataTables.checkboxes.css" rel="stylesheet"/>
	<link rel="icon" href="http://letspark.in/img/favicon.png" sizes="144x144">
</head>
<body>
    
    <div class="container" style="margin:15px auto">
        <form id="myform" method="post">
            <p><b>Selected rows data</b></p>
            <pre id="view-rows"></pre>
            <p><b>Form data as submitted to the server</b></p>
            <pre id="view-form"></pre>
            <p><button class="btn btn-danger">View Selected</button><br/></p>
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>    
                        <th></th>  
                        <th>User Name</th>
	                    <th>Password</th>
			            <th>Business Type</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>    
                        <th></th>  
                          <td><?php echo $rowc['name'];?></td>
                                                    <td><?php echo $rowc['user'];?></td>
													<td><?php echo $rowc['pass'];?></td>
													<td><?php echo $rowc['business_type'];?></td>
                    </tr><?php }?>
                </tfoot>
            </table>
        </form>  
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/dataTables.checkboxes.min.js"></script>
    <script>
    $(document).ready(function(){
        var mytable = $("#mytable").DataTable({
            ajax: 'data.json',
            columnDefs: [
                {
                    targets: 0,
                    checkboxes: {
                        seletRow: true
                    }
                }
            ],
            select:{
                style: 'multi'
            },
            order: [[1, 'asc']]
        })
        $("#myform").on('submit', function(e){
            var form = this
            var rowsel = mytable.column(0).checkboxes.selected();
            $.each(rowsel, function(index, rowId){
                $(form).append(
                    $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                )
            })
            $("#view-rows").text(rowsel.join(","))
            $("#view-form").text($(form).serialize())
            $('input[name="id\[\]"]', form).remove()
            e.preventDefault()
        })
    })
    </script>
</body>
</html>