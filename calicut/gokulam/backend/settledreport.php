<?php 
@ob_start();
ini_set('display_errors','off');
include("config.php");
$curdate=  date('Y-m-d');
session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LetsPark</title>
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
    

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <?php if($_SESSION["id"]==2 ){ ?>

           <?php include "hr-menu.php"  ?>
           <?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
           <?php if($_SESSION["id"]==3 ){ ?>

            <?php include "it-menu.php"  ?>
                     <?php } else { } ?>
 

<?php if($_SESSION["id"]==4 ){ ?>
             <?php include "bd-menu.php"  ?>
           <?php } else { } ?>
           
           <?php if($_SESSION["id"]==5 ){ ?>
             <?php include "events-menu.php"  ?>
           <?php } else { } ?>
           
           <?php if($_SESSION["id"]==6 ){ ?>
             <?php include "legal-menu.php"  ?>
           <?php } else { } ?>
           
           <?php if($_SESSION["id"]==7 ){ ?>
             <?php include "om-menu.php"  ?>
           <?php } else { } ?>
           
           <?php if($_SESSION["id"]==8 ){ ?>
             <?php include "accounts-menu.php"  ?>
           <?php } else { } ?>
           
           <?php if($_SESSION["id"]==9 ){ ?>
             <?php include "pmt-menu.php"  ?>
           <?php } else { } ?>
           <?php if($_SESSION["id"]==10 ){ ?>
             <?php include "food-menu.php"  ?>
           <?php } else { } ?>
           
           <?php if($_SESSION["id"]==1 ){ ?>
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
                        <a class="navbar-brand" href="#"> Today's Settlement Report </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                  <?php
                                    
                                     $sql = "SELECT id FROM `login` "; 
                                    // echo $sql;
                                   //  echo  $_SESSION['id'];
                                          $result = mysql_query($sql) or die (mysql_error()); 
                                             if(mysql_num_rows($result)) { 
                                           $value = mysql_result($result, 0); 
                                         if($_SESSION['id'] == "1") { 
        
                                         //  echo $value;
 
                                     //echo "<p>This is a test.</p>"; 

                                 echo "<a href=\"settings.php\"></a>";  

                                          } 
                                          }
                                    
                                    ?> 
                           
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <!-- <i class="material-icons">notifications</i>-->
                                    <!--<span class="notification">5</span>-->
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
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
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="settled_redemption_report.php">
                                    <p class="category"><img src="icons/redemption.png"  style="width:60px"> Settled Transaction</p>
                                    <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(redemption_id) as statu FROM  redemption_shopowner where DATE_FORMAT(updated_at,'%Y-%m-%d') = '$curdate' 
 and redemption_flag='0'") or die(mysql_error());
//	echo $q1;
	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
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
                                <div class="card-content"><a href="settled_redemption_report.php">
                                    <p class="category"><img src="icons/redemrupee.png"  style="width:55px">Total Amt Settled</p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT SUM(amount_redemmed) as sumnewrow FROM  redemption_shopowner where DATE_FORMAT(updated_at,'%Y-%m-%d') =  '$curdate' and redemption_flag='0'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">???<?php echo $row2['sumnewrow'];?></h3></a>
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
                                <div class="card-content"><a href="settled_redemption_report.php">
                                    <p class="category"><img src="icons/redemptionbike.png"  style="width:60px">No of 2W</p>
                                                                                                          <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT count(redemption_id) as vec FROM redemption_shopowner where DATE_FORMAT(updated_at,'%Y-%m-%d') = '$curdate' and vehicle_type = '2' and redemption_flag='0'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3></a>
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
                                <div class="card-content"><a href="settled_redemption_report.php">
                                    <p class="category"><img src="icons/redemptioncar.png"  style="width:60px">No of 4W </p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT count(redemption_id) as vec FROM redemption_shopowner where DATE_FORMAT(updated_at,'%Y-%m-%d') = '$curdate' and vehicle_type = '4' and redemption_flag='0'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3></a>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <div class="card-content"><a href="settled_redemption_report.php">
                                    <p class="category"><img src="icons/redemptioncar.png"  style="width:60px">Amt Settled from 2W </p>
                                                                        <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount_redemmed) as sumnewrow FROM  redemption_shopowner where DATE_FORMAT(updated_at,'%Y-%m-%d') =  '$curdate' and redemption_flag='0' and vehicle_type='2'") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">???<?php echo $row2['sumnewrow'];?></h3></a>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <div class="card-content"><a href="settled_redemption_report.php">
                                    <p class="category"><img src="icons/redemptioncar.png"  style="width:60px">Amt Settled from 4W </p>
                                                                        <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount_redemmed) as sumnewrow FROM  redemption_shopowner where DATE_FORMAT(updated_at,'%Y-%m-%d') =  '$curdate' and redemption_flag='0' and vehicle_type='4'") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">???<?php echo $row2['sumnewrow'];?></h3></a>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>

                        
                    </div>
					
				<!--<div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"> Attendant 1 Collection</p>
                                    <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT SUM(amount) FROM `details_transaction` where userid = '7' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'") or die(mysql_error());
//	echo $q1;
	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['SUM(amount)'];?></h3>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>-->
                        <!--<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <div class="card-content">
                                   <p class="category"> Attendant 2 Collection</p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT SUM(amount) FROM `details_transaction` where userid = '8' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' ") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['SUM(amount)'];?></h3>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>-->
                       <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"> Attendant 3 Collection</p>
                                                                                                          <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT SUM(amount) FROM `details_transaction` where userid = '9' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' ") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['SUM(amount)'];?></h3>
                                </div><?php }?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div> -->
						
						<!--  <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <div class="card-content">
                                   <p class="category"> Attendant 4 Collection</p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT SUM(amount) FROM `details_transaction` where userid = '10' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' ") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['sumvec2'];?></h3>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div> -->
                   <!-- <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"> Total trans under 15 min 2W</p>
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
                        </div> -->
                       <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Total trans under 15 min 4W</p>
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
                        
                    </div> -->
					<!--<h4>&nbsp;&nbsp;&nbsp;Detailed Report</h4>
<a href="settled_redemption_report.php"><button type="submit" name="submit" class="btn btn-rose btn-fill">Detailed Reports<div class="ripple-container"></div></button></a>
<a href="selectshopredemption.php"><button type="submit" name="submit" class="btn btn-rose btn-fill">Shopowner Redemption Report<div class="ripple-container"></div></button></a>-->
  
                    
  
                    <br>
					
                    <div class="row">
                        <div class="col-md-4">
                           
                        </div>
                        <div class="col-md-4">
                           
                        </div>
                        <div class="col-md-4">
                            
                        </div>
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
</body>
</html>