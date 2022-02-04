<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
session_start();
$id = $_SESSION['id'];
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
if(isset($_POST['submit']) )
{
	$redemption_id = $_POST['redemption_id'];
	$transaction_id = $_POST['transaction_id'];
	$vehicle_number = $_POST['vehicle_number'];
	$vehicle_type = $_POST['vehicle_type'];
	$amount_redemmed = $_POST['amount_redemmed'];
	if( $vehicle_type=="2" ){
$max_amount=10;
}
else{
$max_amount=20;
}
$redemption_flag = 1;
$curdate = date('Y-m-d H:i:s');
	
$query = "INSERT INTO redemption_shopowner(client_id,redemption_id,shopowner_id,amount_redemmed,max_amount,redemption_flag,vehicle_type,created_at,extra) VALUES ('$client_id', '$redemption_id','$id', '$amount_redemmed','$max_amount','$redemption_flag','$vehicle_type', '$curdate' , '$transaction_id' )";
$insert = mysql_query($query);

if($insert){
//echo "Succesfully Redemption Added";
} else {
//echo "Redemption Failed";
}   
    
 

$query1 = "update details_transaction set flag = '0' where transaction_id = '$transaction_id'";
$insert1 = mysql_query($query1);

if($insert){
//echo "Succesfully Redemption Added";
} else {
//echo "Redemption Failed";
}   
    
   												
			
}

if(isset($_GET['submitresult']))
{
	
}
   include("fusioncharts.php");
   include("fusion_db.php");
   $curdate=  date('Y-m-d');
$lastsevendays= date('Y-m-d', strtotime('-7 days'));
$d1= $_SESSION["firstdate"];
$d2 = $_SESSION["seconddate"];
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
		  <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
			<style>
	.card .card-content {
    padding: 15px 20px;
    position: relative;
}
	</style>
	<link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
<script>
function myFunction() {
  alert("Redemption done successfully");
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
		 <?php if($_SESSION["type"]== 1 or $_SESSION["type"]== 3 ){ ?>
             <?php include "menu.php"  ?>
           <?php } else { } ?>
           
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
                        <a class="navbar-brand" href="#">Todays Redemption Report Details </a>
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
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
<div class="row">

					<form name="form2" method="post" id="" action="new_file.php">
			           <div class="col-xs-3">
                            <div >
       <input type="text" style="height: 50px; margin-left:20px; " class="form-control" name="textfield2" placeholder="Redemption Id" required />
	
                              
                            </div>

                        </div>
 <input id="gobutton" type="submit" value="submit" id="submitresult"class="btn bg-teal-400" name="submitresult"  style="position: relative;bottom: -19px; background-color: #ff7900;" /> 
</form>
                    </div>
<?php
if(isset($_POST['submitresult']))
{ 
   
 $curdate=  date('Y-m-d');
 $text = $_POST['textfield2'];
	 $result = mysql_query("SELECT * FROM details_transaction where redemption_id = '$text' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status = '0' and flag = '1' "); 
 if(mysql_num_rows($result) == 0  )
{
	$message = "Redemption id does not exist";

	echo "<script type='text/javascript'>alert('$message');</script>";

}
	 
	 }	
//echo $redemption_id;
?>

					<div class="card-content">
                    <div align="right"><a href="check-status-old-redemption.php"><button type="button" class="btn btn-info">Check Ticket Redemption</button></a></div>
									
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
	
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
	
                                                <tr align="center">
												<th align="center">Transaction Id</th>
												<th align="center">Redemption Id</th>
												<th align="center">No.</th>
												<th align="center">Vehicle Type</th>
												<th align="center">Entry Time</th>
												<th align="center">Amount to Redem</th>
                                                <!--<th>Total</th>-->
                                                   <!-- <th class="disabled-sorting text-right">Actions</th>  -->
                                                </tr>
                                            </thead>
	
                                            <tbody>
<?php 
	while($row2 = mysql_fetch_array($result)){
		
?> 

                                                <tr>
        
					
													<td ><?php echo $row2['transaction_id'];?></td>
													<td ><?php echo $row2['redemption_id'];?></td>
													<td ><?php echo $row2['vehicle_number'];?></td>
                                                    <td ><?php echo $row2['vehicle_type'];?></td>
													<td ><?php echo $row2['entry_time'];?></td>
													<td >
						<form class="form-signin" action="" method="post">
						<input type="hidden" name="transaction_id" class="form-control"  value="<?php echo $row2['transaction_id'];?>" >
						 <input type="hidden" name="redemption_id" class="form-control"  value="<?php echo $row2['redemption_id'];?>" >
						 <input type="hidden" name="vehicle_number" class="form-control"  value="<?php echo $row2['vehicle_number'];?>" >
						 <input type="hidden" name="vehicle_type" class="form-control"  value="<?php echo $row2['vehicle_type'];?>" >
						 <input type="hidden" name="entry_time" class="form-control"  value="<?php echo $row2['entry_time'];?>" >	 
													<select name="amount_redemmed">
													<option value="" disabled>Select Amount</option>
<?php
if ($row2['vehicle_type'] == '2')
{
	echo '<option value="10">10</option>';
}
else
{
	echo '<option value="10">10</option>';
	echo '<option value="20">20</option>';
}

?>
</select>
<input type="submit" onclick="myFunction()" style="position: relative;background-color: #ff7900;margin-left: 10%;"name="submit"value="Submit"class="btn btn-primary btn-sm"></input> 

	</form> 

						
													</td>
													
												
                                                   <!-- <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                                    </td> -->
                                               </tr>
											<?php }?>
                                            </tbody>
			
                                        </table>
										 
                                    </div>
									<br>
                      <!--  <div id="chart-container">Chart will render here!</div> -->
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
/html>
