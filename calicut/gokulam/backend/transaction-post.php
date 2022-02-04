<?php
@ob_start();
//ini_set('display_errors','off');
include("config.php");
session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}

//$date1 = $_POST[date1];
//$date2 = $_POST[date2];
//$time1 = $_POST[time1];
//$time2 = $_POST[time2];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lets Park</title>
	<link rel="icon" href="http://letspark.in/img/favicon.png" sizes="144x144">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/calendar.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
    <table  class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
<tr><td id="ds_calclass">
</td></tr>
</table>
<script src="js/mdtimepicker.js"></script>
<script>
  $(document).ready(function(){
    $('#timepicker').mdtimepicker(); //Initializes the time picker
  });
</script>
<script>
  $(document).ready(function(){
    $('#timepicker1').mdtimepicker(); //Initializes the time picker
  });
</script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
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
                        <a class="navbar-brand" href="#"> TRANSACTION REPORT </a>
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
                                  
                                   <p>Logout</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
								
	                <div class="row">
					<form name="form2" method="post" id="" action="generate.php">
                        <div class="col-xs-2">
                            <div class="card">
                                <div class="card-content text-center">
                                    <code> <b> Date FROM </b> <input onclick="ds_sh(this);"  class="form-control" name="date1" type="text" readonly="readonly" placeholder="Start Date...." required/> </code>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="card">
                                <div class="card-content text-center">
                                    <code> <b>Date TO</b> <input name="date2" onclick="ds_sh(this);" class="form-control"type="text" readonly="readonly"  placeholder="End Date.." required/></code>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="card">
                                <div class="card-content text-center">
                                    <code> <b> Time FROM </b> <input class="form-control" name= "time1" type="time" id="timepicker"/></code>
                                </div>
                            </div>
                        </div>
						<div class="col-xs-2">
                            <div class="card">
                                <div class="card-content text-center">
                                    <code> <b> Time To </b> <input class="form-control" name= "time2" type="time" id="timepicker1"/></code>
                                </div>
                            </div>
                        </div>
						<div class="col-xs-2">
                            <div class="card">
                                <div class="card-content text-center">
                       <code> <b> Select </b> <select name="department" class="form-control" >
			           <option value=""> SELECT BOTH</option> 
                       <option value="HR">2 WHEELER</option>
                       <option value="IT">4 WHEELER</option>
                       
              </select></code>
                                </div>
                            </div>
                        </div>
 
 <input id="gobutton" type="submit" value="submit" class="btn bg-teal-400" name="submit"  style="position: relative;bottom: -19px; background-color: #dc124c;" /> 
</form>
                    </div>
					
	<div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"> Total Transaction</p>
                                    <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' ") or die(mysql_error());
//	echo $q1;
	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Total Amt Collected</p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT SUM(amount) as sumnewrow FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['sumnewrow'];?></h3>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">No of Two Wheelers</p>
                                                                                                          <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and vehicle_type = '2'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3>
                                </div><?php }?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>
						
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">No of Four Wheelers </p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM details_transaction where vehicle_type = '2' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"> Total 2W trans under 15 min </p>
                                    <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT count(*) FROM `details_transaction`  where vehicle_type = '2' and amount = '0' and status = '0' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' ") or die(mysql_error());
//	echo $q1;
	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['count(*)'];?></h3>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Total 4W trans under 15 min </p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT count(*) FROM `details_transaction`  where vehicle_type = '4' and amount = '0' and status = '0' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' ") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['count(*)'];?></h3>
                                </div><?php } ?>
								
								
                                <div class="card-footer">
                                   
                                </div>

                            </div>
                        </div>                   
                    </div>
                        
                    </div>
                </div>
            </div>				
    <div class="card-content">
               <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">TRANSACTION REPORT</h4>
									
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div> 
									
									
                                    <div class="material-datatables">
	
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
	
                                                <tr>
                                                    <th>Transaction id</th>
                                                    <th>Vehicle type</th>
                                                    <th>Entry Time</th>
													<th>Exit Time</th>
													<th>Amount</th>
													<th>Status</th>
                                                   
                                                    <!--<th>Total</th>-->
                                                    <th class="disabled-sorting text-right">#</th> 
                                                </tr>
                                            </thead>
	
                                            <tbody>
																					
																									    <?php 
	
 //$user_id =  $_SESSION['id'];
			
	$query = sprintf("SELECT * FROM  details_transaction");
//	echo $query;
	$qur =  mysql_query($query) or die(mysql_error());
	while($rowc = mysql_fetch_array($qur)){
	
?> 

                                                <tr>
                                                    <td><?php echo $rowc['redemption_id'];?></td>
                                                    <td><?php echo $rowc['vehicle_type'];?></td>
                                                    <td><?php echo $rowc['entry_time'];?></td>
													<td><?php echo $rowc['exit_time'];?></td>
													<td><?php echo $rowc['amount'];?></td>
													<td><?php echo $rowc['status'];?></td>
                                                   
													
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons"></i></a>
                                                    </td>
                                                </tr>
	<?php } ?>
                                            </tbody>
			
                                        </table>

                                    </div>
                                </div>
                              
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
                                 </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <?php include"footer.php"?>
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
                        <img src="../img/sidebar-1.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../img/sidebar-2.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../img/sidebar-3.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../img/sidebar-4.jpg" alt="img">
                    </a>
                </li>
               
            </ul>
        </div>
    </div>

<!--   Core JS Files   -->
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/material.min.js" type="text/javascript"></script>
<script src="js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQdPTFiEAKL64Z4ivRsw9YwdUeYJ8F-HU"></script>

<!-- Select Plugin -->
<script src="js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>
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