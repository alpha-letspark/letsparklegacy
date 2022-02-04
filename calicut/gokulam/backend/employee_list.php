<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
session_start();
$counter = 0;
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}

if(isset($_GET['msg']))
	{
		
	  //  echo "<script>alert('Record has been deleted');</script>";
		header('location: employee_list.php');

	}
if(isset($_POST['submit']) )
{
$user = $_POST['user'];
$pass = md5($_POST['pass']);
$query=mysql_query("select *from login where user='$user'");
if(mysql_num_rows($query)>0)
{
 echo '<script>alert("Username Already Exit ...Please try another");
				</script>';
}
else
{

$sql="INSERT INTO employee_list (name,employee_id,shop_name,doj,dob,gender,vehicle_type,vehicle_number) VALUES ('$_POST[name]','$_POST[employee_id]','$_POST[shop_name]','$_POST[doj]', '$_POST[dob]','$_POST[gender]', '$_POST[vehicle_type]', '$_POST[vehicle_number]')" or die(mysql_error());

if(!mysql_query($sql,$bd))

{

 die('Error: ' . mysql_error());
 //echo "Invalid Data";
  }
  else
  {
      $success = true;
      //header('Location: createuser.php');
      //header('Location: thankyou.php');
	  //echo "Record inserted Successfully...";
  }
}
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img\favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lets Park</title>
	<link rel="icon" href="http://letspark.in/img/favicon.png" sizes="144x144">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
   <link href="css\bootstrap.min.css" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="css\material-dashboard.css" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
   
    <link rel="stylesheet" href="css\font-awesome.min.css">
    
	<style>
	.card .card-content {
    padding: 15px 20px;
    position: relative;
}
	</style>
	<script type="text/javascript">
function delete_id(id)
{
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='employee_code.php?del_employee_request='+ id;
     }
}
</script>
</head>

<body>
    <div class="wrapper">
	   <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"-->
          <?php include "menu.php"  ?>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Employee Module</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                           <li>
                                <a href="logout.php" >
                                   <!-- <i class="material-icons">input</i>-->
                                   <p>Logout</p>
                                   
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                       <!-- <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                
                            </button>
                        </form>-->
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    </div>
                   <div>&nbsp;&nbsp;
 <div>
 <a href="add_employee_request.php"><input id="gobutton"  value="Add Employee" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="allocate.php"> <input id="gobutton" value="Card Allocation" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="employee-card-recharge.php"> <input id="gobutton" value="Recharge" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="card-allocation.php"> <input id="gobutton"  value="History" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;width: 119px;"></a>
 <a href="employee_list.php"> <input id="gobutton"  value=" Employee List" class="btn bg-teal-400" name="submit"style="background-color: #ff7900;position: relative;border: 2px solid #ff7900;color: #ffffff;"></a>

</div><br />
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div></div>
                                 
                                <div class="card-content">
                                    <h4 class="card-title"><b>Employee List</b></h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
	
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
	
                                                <tr>
                                                    <th>S no</th>
                                                    <th>Emp Name</th>
													<th>Shop Name</th>
													<th>Mobile</th>
													<th>Veh No</th>
													<th>Veh Type</th>
													<th>Card Type</th>
													<th>Card Number</th>
													<th>Actions</th>
                                                    
                                                   
                                                    <!--<th>Total</th>-->
                                                 <!--   <th class="disabled-sorting text-right">Actions</th> -->
                                                </tr>
                                            </thead>
	
                                            <tbody>									
																									    <?php 
	
// $user_id =  $_SESSION['id'];
 $query = ("SELECT employee_allocation.id as id,employee_allocation.card_number,(CASE WHEN employee_allocation.card_type = '1' THEN 'Privilage'  WHEN employee_allocation.card_type = '2' THEN 'Free'  WHEN employee_allocation.card_type = '3' THEN 'Employee'  WHEN employee_allocation.card_type = '4' THEN '4-Wheeler' WHEN employee_allocation.card_type = '5' THEN '2-Wheeler' END ) as card_type,
employee_allocation.employee_name,(CASE WHEN employee_allocation.vehicle_type = '2' THEN '2 wheeler' WHEN employee_allocation.vehicle_type = '4' THEN '4 Wheeler' END) as vehicle_type,
employee_allocation.vehicle_number,employee_allocation.mobile, login.name FROM employee_allocation INNER JOIN login where employee_allocation.shop_id = login.id and employee_allocation.current_status != 3 ");

	
//	$query = sprintf("SELECT * FROM  employee_allocation where shop_id = '$id' ORDER BY  id DESC");
//	echo $query;
	$qur =  mysql_query($query) or die(mysql_error());
	while($rowc = mysql_fetch_array($qur)){

?> 

                                                <tr>
                                                    <td><?php echo ++$counter; ?></td>
                                                    <td><?php echo $rowc['employee_name'];?></td>
													<td><?php echo $rowc['name'];?></td>
													<td><?php echo $rowc['mobile'];?></td>
													<td><?php echo $rowc['vehicle_number'];?></td>
													<td><?php echo $rowc['vehicle_type'];?></td>
													<td><?php echo $rowc['card_type'];?></td>
													<td><?php echo $rowc['card_number'];?></td>
													<td class="td-actions">
													<a href="add_employee_request.php?edit=<?php echo $rowc['id'];?>" >
                                                            <button type="button" rel="tooltip" class="btn btn-primary btn-simple btn-xs" title="Edit" >
                                                                <i class="material-icons">edit</i>
                                                            </button></a>
													<a href="javascript:delete_id(<?php echo $rowc['id'];?>)" >
                                                            <button type="button" class="btn btn-danger btn-simple btn-xs" rel="tooltip" title="Remove" >
                                                                <i class="material-icons">close</i>
                                                            </button></a>
																											
                                                       </td>
												<!--	<td ><a href="add_employee_request.php?edit=<?php echo $rowc['id'];?>" class="btn btn-rose btn-fill" >Edit</a><a href="employee_code.php?del=<?php echo $rowc['id'];?>" class="btn btn-rose btn-fill" >Delete</a></td>  -->

                                                </tr>
											<?php }?>
                                            </tbody>
			
                                        </table>
	
  
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                </div>
            </div>
            <?php include "footer.php" ?>
        </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
           
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors text-center">
                            <span class="badge filter badge-purple" data-color="purple"></span>
                            <span class="badge filter badge-blue" data-color="blue"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-orange" data-color="orange"></span>
                            <span class="badge filter badge-red" data-color="red"></span>
                            <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="text-center">
                            <span class="badge filter badge-white" data-color="white"></span>
                            <span class="badge filter badge-black active" data-color="black"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <div class="switch-trigger">
                        <p>Sidebar Mini</p>
                        <div class="togglebutton switch-sidebar-mini">
                            <label>
                                <input type="checkbox">
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="adjustments-line">
                    <div class="switch-trigger">
                        <p>Sidebar Image</p>
                        <div class="togglebutton switch-sidebar-image">
                            <label>
                                <input type="checkbox" checked="">
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="img/sidebar-1.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="img/sidebar-2.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="img/sidebar-3.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="img/sidebar-4.jpg" alt="img">
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
<!--   Core JS Files   -->
<script src="js\jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js\jquery-ui.min.js" type="text/javascript"></script>
<script src="js\bootstrap.min.js" type="text/javascript"></script>
<script src="js\material.min.js" type="text/javascript"></script>
<script src="js\perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="js\jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="js\moment.min.js"></script>
<!--  Charts Plugin -->
<script src="js\chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="js\jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="js\bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="js\jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="js\bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="js\jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="js\nouislider.min.js"></script>
<!-- Select Plugin -->
<script src="js\jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="js\jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="js\sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js\jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="js\fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="js\jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="js\material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="js\demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
</body>
</html>