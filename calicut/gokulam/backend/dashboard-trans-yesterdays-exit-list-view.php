<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
$counter = 0;
session_start();
//echo $_SESSION['name'];
 $date1= $_SESSION["date1"] ;
 $date2= $_SESSION["date2"] ;

//echo $date1; echo $date2;  
if(!isset($_SESSION['user'])){
	header('location: index.php');
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

$sql="INSERT INTO login (name,user,pass,type,business_type) VALUES ('$_POST[name]','$_POST[user]','".md5($_POST['pass'])."','$_POST[type]', '$_POST[business_type]')" or die(mysql_error());

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
$curdate=  date('Y-m-d');
$yesterday= date('Y-m-d', strtotime('-1 days'));
$card_type = "";

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
<!-- select jquery script 
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select.type").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
       // alert("You have selected the Type - " + selectedCountry);
		$select = selectedCountry;
		alert("You have selected the Type - " + $select );
    });
});
</script>	-->
</head>

<body>
    <div class="wrapper">
	   <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="img/sidebar-1.jpg">
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
                        <a class="navbar-brand" href="#">Yesterday's Detailed Exit List</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                 
									
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                       <a href="yesterday.php"> <input id="gobutton" type="submit" value="Go Back" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;position: relative;"></a>
                                    </div>
                                    <div class="material-datatables">
	<div align="right">
                                              <form method = "POST">
                                                    <select  name="card_type" style = "position: relative; top: -9px; " id="description" onchange='this.form.submit()'>
                                                        <option value="">Select Card</option>
                                                        <option value="7">All Cards</option>
                                                        <option value="6">Customer Cards</option>
                                                        <option value="1">Privilege</option>
                                                        <option value="2">Free</option>
                                                        <option value="3">Employee</option>
                                                        <option value="4">4-Wheeler</option>
                                                        <option value="5">2-Wheeler</option>
             
                                                    </select>
                                                    <noscript><input type="submit" value="Submit"></noscript>
                                                    </form>
                                                    </div>
                                        <table align="center" id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
	
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Trans Id</th>
                                                    <th>Entry By</th>
                                                    <th>V No.</th>
						                            <th>Type</th>
                                                    <th>Entry Time</th>
                                                    <th>Exit Time</th>
                                                    <th>Duration</th>
                                                    <th>Exited By</th>
                                                    <th>Amt</th>
                                                    <th>Status</th>
                                                    <th>Area</th>
                                                    <th>Card Number</th>
                                                    <th>
											
													</th>
                                                    <!--<th>Total</th>-->
                                                   <!-- <th class="disabled-sorting text-right">Actions</th>  -->
                                                </tr>
                                            </thead>
	
                                            <tbody>
																					
<?php 
$card_type = $_POST['card_type'];
// $user_id =  $_SESSION['id'];
if($card_type == '7')

{			
$query = ("SELECT details_transaction.transaction_id,details_transaction.card_number,details_transaction.redemption_id,details_transaction.vehicle_type,details_transaction.vehicle_number,
details_transaction.userid, details_transaction.exit_user_id, details_transaction.amount,details_transaction.entry_time, details_transaction.exit_time, 
(TIME_TO_SEC(details_transaction.exit_time) - TIME_TO_SEC(details_transaction.entry_time)) AS duration, (CASE WHEN details_transaction.status = '1'
 THEN 'Completed' ELSE 'Running' END ) as status,  (CASE WHEN details_transaction.area = '1' THEN 'Surface' ELSE 'Basement' END ) as area, 
 (CASE WHEN card_details.type = '1' THEN 'Privilage'  WHEN card_details.type = '2' THEN 'Free'  WHEN card_details.type = '3' THEN 'Employee'  WHEN card_details.type = '4' THEN '4-Wheeler' WHEN card_details.type = '5' THEN '2-Wheeler' END ) as type 
 FROM details_transaction INNER JOIN card_details where details_transaction.card_number = card_details.card_number AND 
 DATE_FORMAT(details_transaction.entry_time,'%Y-%m-%d') = '$yesterday' and details_transaction.status = '1'");
}

elseif($card_type == '6')
{
	$query = ("SELECT details_transaction.transaction_id,details_transaction.card_number,details_transaction.redemption_id,details_transaction.vehicle_type,details_transaction.vehicle_number,
details_transaction.userid, details_transaction.exit_user_id, details_transaction.amount,details_transaction.entry_time, details_transaction.exit_time, 
(TIME_TO_SEC(details_transaction.exit_time) - TIME_TO_SEC(details_transaction.entry_time)) AS duration, (CASE WHEN details_transaction.status = '1'
 THEN 'Completed' ELSE 'Running' END ) as status,  (CASE WHEN details_transaction.area = '1' THEN 'Surface' ELSE 'Basement' END ) as area, 
 (CASE WHEN card_details.type = '1' THEN 'Privilage'  WHEN card_details.type = '2' THEN 'Free'  WHEN card_details.type = '3' THEN 'Employee'  WHEN card_details.type = '4' THEN '4-Wheeler' WHEN card_details.type = '5' THEN '2-Wheeler' END ) as type 
 FROM details_transaction INNER JOIN card_details where details_transaction.card_number = card_details.card_number AND 
 DATE_FORMAT(details_transaction.entry_time,'%Y-%m-%d') = '$yesterday' and details_transaction.status = '1' and (details_transaction.card_type = '4' or details_transaction.card_type = '5'  or details_transaction.card_type = '6')");
}
elseif ($card_type != "6" && $card_type != "" && $card_type != "7")
{
	

$query = ("SELECT details_transaction.transaction_id,details_transaction.card_number,details_transaction.redemption_id,details_transaction.vehicle_type,details_transaction.vehicle_number,
details_transaction.userid, details_transaction.exit_user_id, details_transaction.amount,details_transaction.entry_time, details_transaction.exit_time, 
(TIME_TO_SEC(details_transaction.exit_time) - TIME_TO_SEC(details_transaction.entry_time)) AS duration, (CASE WHEN details_transaction.status = '1'
 THEN 'Completed' ELSE 'Running' END ) as status,  (CASE WHEN details_transaction.area = '1' THEN 'Surface' ELSE 'Basement' END ) as area, 
 (CASE WHEN card_details.type = '1' THEN 'Privilage'  WHEN card_details.type = '2' THEN 'Free'  WHEN card_details.type = '3' THEN 'Employee'  WHEN card_details.type = '4' THEN '4-Wheeler' WHEN card_details.type = '5' THEN '2-Wheeler' END ) as type 
 FROM details_transaction INNER JOIN card_details where details_transaction.card_number = card_details.card_number AND 
 DATE_FORMAT(details_transaction.entry_time,'%Y-%m-%d') = '$yesterday' and card_details.type = '$card_type' and details_transaction.status = '1'");
}
else
{			
$query = ("SELECT details_transaction.transaction_id,details_transaction.card_number,details_transaction.redemption_id,details_transaction.vehicle_type,details_transaction.vehicle_number,
details_transaction.userid, details_transaction.exit_user_id, details_transaction.amount,details_transaction.entry_time, details_transaction.exit_time, 
(TIME_TO_SEC(details_transaction.exit_time) - TIME_TO_SEC(details_transaction.entry_time)) AS duration, (CASE WHEN details_transaction.status = '1'
 THEN 'Completed' ELSE 'Running' END ) as status,  (CASE WHEN details_transaction.area = '1' THEN 'Surface' ELSE 'Basement' END ) as area, 
 (CASE WHEN card_details.type = '1' THEN 'Privilage'  WHEN card_details.type = '2' THEN 'Free'  WHEN card_details.type = '3' THEN 'Employee'  WHEN card_details.type = '4' THEN '4-Wheeler' WHEN card_details.type = '5' THEN '2-Wheeler' END ) as type 
 FROM details_transaction INNER JOIN card_details where details_transaction.card_number = card_details.card_number AND 
 DATE_FORMAT(details_transaction.entry_time,'%Y-%m-%d') = '$yesterday' and details_transaction.status = '1' and (details_transaction.card_type = '4' or details_transaction.card_type = '5'  or details_transaction.card_type = '6')");
}

   // $query = ("SELECT transaction_id,redemption_id,vehicle_type,vehicle_number,entry_time, exit_time, amount, 
         //   (TIME_TO_SEC(exit_time) - TIME_TO_SEC(entry_time)) AS duration, 
           // (CASE WHEN status = '1' THEN 'Completed' ELSE 'Running' END )  as status FROM details_transaction");
	//echo $query;
	$qur =  mysql_query($query) or die(mysql_error());
	while($rowc = mysql_fetch_array($qur)){
//entry user
$uid = $rowc['userid'];
$query1 = ("SELECT name FROM cms_users where id = '$uid'");
$qur1 =  mysql_query($query1) or die(mysql_error());
$rowc1 = mysql_fetch_array($qur1);
//exit user
$exuid = $rowc['exit_user_id'];
$exquery1 = ("SELECT name FROM cms_users where id = '$exuid'");
$exqur1 =  mysql_query($exquery1) or die(mysql_error());
$exrowc1 = mysql_fetch_array($exqur1);

	
		$seconds = $rowc['duration'];
        $duration = gmdate('H:i:s', $seconds);
		

?> 

                                                <tr>
                                                    <td><?php echo ++$counter; ?></td>
                                                    <td><?php echo $rowc['transaction_id'];?></td>
							                        <td><?php echo $rowc1['name'];?></td>
							                        <td><?php echo $rowc['vehicle_number'];?></td>
						                            <td><?php echo $rowc['vehicle_type'];?></td>
                                                    <td><?php echo $rowc['entry_time'];?></td>
                                                    <td><?php echo $rowc['exit_time'];?></td>
                                                    <td><?php echo $duration ?></td>
                                                    <td><?php echo $exrowc1['name'];?></td>
                                                    <td><?php echo $rowc['amount'];?></td>
                                                    <td><?php echo $rowc['status'];?></td>
                                                    <td><?php echo $rowc['area'];?></td>
													<td><?php echo $rowc['card_number'];?></td>
													<td><?php echo $rowc['type'];?></td>
                                                   <!-- <td class="text-right">
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