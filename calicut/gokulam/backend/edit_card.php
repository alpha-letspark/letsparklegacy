<?php
include("config.php");
if (isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$update= true;
		$query = ("select * from card_details where id = $id ");

	
//	$query = sprintf("SELECT * FROM  employee_allocation where shop_id = '$id' ORDER BY  id DESC");
//	echo $query;
	$qur =  mysql_query($query) or die(mysql_error());
	while($rowc = mysql_fetch_array($qur)){
			$card_number = $rowc['card_number'];
			$type = $rowc['type'];
			$status = $rowc['status'];
			$valid_from = $rowc['valid_from'];
			$valid_to = $rowc['valid_to'];
			$approval_status = $rowc['approval_status'];
	}
		
	}
//@ob_start();
//i_set('display_errors','off');
//clude("config.php");
//session_start();
//echo $_SESSION['name'];
/*if(!isset($_SESSION['user'])){
    header('location: index.php');
}
if(isset($_POST['submit']) )
{
$user = $_POST['user'];
$id = $_GET['id'];
$pass = md5($_POST['pass']);
$query=mysql_query("select *from login where user='$user'");
if(mysql_num_rows($query)>0)
{
 echo '<script>alert("Username Already Exit ...Please try another");
                </script>';
}
else
{

$sql="INSERT INTO employee_allocation (employee_name,employee_id,shop_id,mobile,vehicle_type,vehicle_number,card_type,current_status) VALUES ('$_POST[employee_name]','$_POST[employee_id]','$id','$_POST[mobile]', '$_POST[vehicle_type]','$_POST[vehicle_number]','$_POST[card_type]', '0')" or die(mysql_error());

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
}*/
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img\favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LetsPark Mall of Mysore</title>
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
	
    <style>
    .card .card-content {
    padding: 15px 20px;
    position: relative;
}

    </style>
	
	<script   type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script type="text/javascript">


    $(window).load(function(){
      
$('#isNews').change(function(){
   $("#password").prop("disabled", !$(this).is(':checked'));
});

    });

</script>
<script>
function show_alert() {
  alert("Successfully Added");
}

</script>
<script>
function show_alert1() {
  alert("Successfully Updated");
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
                        <a class="navbar-brand" href="#"> Edit Cards </a>
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
                        <div class="col-md-6">
                            <div class="card">
<?php

?>	
	
                                <form action="edit_card_codes.php" method="post">
                                    <div class="card-header card-header-icon" >
                                       
                                    </div>
                                       
                                       <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="card-content" >
                                        <!--<h4 class="card-title"><b>Request Parking Cards</b></h4>-->
                                         <h4 class="card-title"> <?php if(isset($success)) { ?> <div class="alert alert-success"><i class="fa fa-check fa-fw"></i> Successfully Created </div> <?php } ?></h4>
                                           <div class="form-group label-floating">
                                             <label class="control-label">
                                               Card Number
                                               <small>*</small>
                                            </label>
											
											<input class="form-control" name="card_number" type="text" value="<?php echo $card_number; ?>" required autocomplete="off">
                                        </div>
                                         <div class="form-group label-floating">
										 <label class="control-label">
                                               Card Type
                                               <small>*</small>
                                            </label>
                                       <select class="form-control" name="type" id ="type" required  title="Select" data-size="7">
                                                    <?php
													if($type == "1")
													{ ?>
														<option value="1" selected>Privilege</option>
														<option value="2" >Free</option>
														<option value="3" >Employee</option>
														<option value="4">4-Wheeler</option>
														<option value="5">2-Wheeler</option>
											<?php   }
													if($type == "2")
													{ ?>
														<option value="1" >Privilege</option>
														 <option value="2" selected>Free</option>
														 <option value="3" >Employee</option>
														 <option value="4">4-Wheeler</option>
														 <option value="5">2-Wheeler</option>
											<?php   } 
											 		if($type == "3")
													{ ?>
												<option value="1" >Privilege</option>
														<option value="2" >Free</option>
														<option value="3" selected>Employee</option>
														<option value="4">4-Wheeler</option>
														<option value="5">2-Wheeler</option>
											<?php   } 
													if($type == "4")
													{ ?>
												<option value="1" >Privilege</option>
														<option value="2" >Free</option>
														<option value="3" >Employee</option>
														<option value="4" selected>4-Wheeler</option>
														<option value="5">2-Wheeler</option>
											<?php   } 
											
													if($type == "5")
													{ ?>
														<option value="1" >Privilege</option>
														<option value="2" >Free</option>
														<option value="3" >Employee</option>
														<option value="4" >4-Wheeler</option>
														<option value="5" selected>2-Wheeler</option>
											<?php   } ?>		 
                                                    
                                                     
                                                    
                                                    
                                                    </select>
                                        </div> 
										
                                          <div class="form-group label-floating">
										  <label class="control-label">
                                               Status
                                               <small>*</small>
                                            </label>
                                       <select class="form-control" name="status" id ="status" required  title="Select" data-size="7">
                                              <?php
													if($status == "0")
													{ ?>
														<option value="0" selected>Inactive</option>
														<option value="1" >Active</option>
											<?php   } 
													if($status == "1")
													{ ?>
														<option value="0" >Inactive</option>
														<option value="1" selected >Active</option>
											<?php   } ?>
											
										            </select>
                                        </div> 
										  
											<div class="form-group label-floating">
											 <label class="control-label">
                                               Valid From
                                               <small>*</small>
                                            </label>
											<input class="form-control" name="valid_from" type="date" value="<?php echo $valid_from; ?>" required autocomplete="off">
											</div> 
											
											<div class="form-group label-floating">
											<label class="control-label">
                                               Valid To
                                               <small>*</small>
                                            </label>
											<input class="form-control" name="valid_to" type="date" value="<?php echo $valid_to; ?>" required autocomplete="off">
											</div> 
											
											
											
											<div class="form-group">
											<label class="control-label">
                                               Approval Status
                                               <small>*</small>
                                            </label>
                                       <select class="form-control" name="approval_status" id ="approval_status" required  title="Select" data-size="7">
                                              <?php
													if($approval_status == "0")
													{ ?>
														<option value="0" selected>Not Approved</option>
														<option value="1" >Approved</option>
											<?php   } 
													if($approval_status == "1")
													{ ?>
														<option value="0" >Not Approved</option>
														<option value="1" selected >Approved</option>
											<?php   } ?>
											
										            </select>
                                        </div> 
                                             
                                            
											
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <label class="control-label">
                                               <small></small>
                                            </label>
                                          
                                        
                                        <div class="form-footer text-right">
                                            <?php if ($update == true): ?>
                             <button  type="submit" name="update" class="btn btn-rose btn-fill" >Update</button>
											<?php else: ?>
						 	<button  onclick="show_alert();"type="submit" name="add_attendant" class="btn btn-rose btn-fill">Submit</button>
											<?php endif ?>
											
                                        </div>
                                    </div>
                                </form>
                               
                            </div>
                        </div>
                       
                        
                        
                    </div>
                   <!-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><b>Add Employee Vehicle Details</b></h4>
                                    
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
    
                                       <!-- <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
    
                                                <tr>
                                                    <th>S no</th>
                                                    <th>Emp Name</th>
                                                    <th>Mobile</th>
                                                    <th>Veh Type</th>
                                                    <th>Veh No</th>
                                                    <th>Card Type</th>
                                                    <th>Card Id</th>
                                                    <th>Delete Req</th>
                                                    
                                                   
                                                    <!--<th>Total</th>-->
                                                 <!--   <th class="disabled-sorting text-right">Actions</th> -->
                                                </tr>
                                            </thead>
    
                                            <tbody>
                                                                                    
                                                                                                        <?php 
    
// $user_id =  $_SESSION['id'];
            
    $query = sprintf("SELECT * FROM  employee_list where shop_id = '$id' ORDER BY  name ASC");
//  echo $query;
    $qur =  mysql_query($query) or die(mysql_error());
    while($rowc = mysql_fetch_array($qur)){

?> 

                                                <tr>
                                                  <!--  <td><?php echo $rowc['name'];?></td>
                                                    <td><?php echo $rowc['employee_id'];?></td>
                                                    <td><?php echo $rowc['shop_name'];?></td>
                                                    <td><?php echo $rowc['doj'];?></td>
                                                    <td><?php echo $rowc['dob'];?></td>
                                                    <td><?php echo $rowc['gender'];?></td>
                                                    <td><?php echo $rowc['vehicle_type'];?></td>
                                                     <td ><a href="#" class="btn btn-rose btn-fill" >Delete</a></td>

                                                    
                                                  <!--  <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                                    </td> -->
                                                </tr>
                                            <?php }?>
                                            </tbody>
            
                                        </table>
    
  
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>-->
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
	 <script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
      window.parent.parent.postMessage(["resultsFrame", {
        height: document.body.getBoundingClientRect().height,
        slug: "mkt5nbvs"
      }], "*")
    }

    // always overwrite window.name, in case users try to set it manually
    window.name = "result"
  </script>
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
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
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