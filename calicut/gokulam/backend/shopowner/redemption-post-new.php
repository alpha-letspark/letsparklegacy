<?php 
@ob_start();
ini_set('display_errors','off');
include("config.php");
$curdate=  date('Y-m-d');
$lastsevendays= date('Y-m-d', strtotime('-7 days'));
session_start();
$id = $_SESSION['id'];
$date1 = $_POST[date1];
$date2  = $_POST[date2];
//echo $date1;echo $date2;
$_SESSION["date1"] = $date1 ;
$_SESSION["date2"] =$date2;
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
   include("fusioncharts.php");
   include("fusion_db.php");
   
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
    
    

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="img/sidebar-1.jpg">

  
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
                        <a class="navbar-brand" href="#">Redemption Report </a>
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
 <!--<div class="row">

       <a href="generate-redemption.php">  <input id="gobutton" type="submit" value="Gererate Report" class="btn bg-teal-400" name="submit"  style="position: relative; background-color: #ff7900;right: -16px;" /> </a>
	    <a href="generated-list-view.php">  <input id="gobutton" type="submit" value="List View" class="btn bg-teal-400" name="submit"  style="position: relative; background-color: #ff7900;right: -16px;" /> </a>
                    </div>-->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="redem_report.php">
                                    <p class="category"><img src="icons/redemption.png"  style="width:60px"> Total Redemption</p>
                                    <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(redemption_id) as statu FROM  redemption_shopowner  where DATE_FORMAT(created_at,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and shopowner_id= '$id'") or die(mysql_error());
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
                                <div class="card-content"><a href="redem_report.php">
                                    <p class="category"><img src="icons/redemrupee.png"  style="width:60px">Total Amt Collected</p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT SUM(amount_redemmed) as sumnewrow FROM  redemption_shopowner where DATE_FORMAT(created_at,'%Y-%m-%d') >=  '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and shopowner_id= '$id'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['sumnewrow'];?></h3></a>
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
                                <div class="card-content"><a href="redem_report.php">
                                    <p class="category"><img src="icons/redemptionbike.png"  style="width:60px">No of Two Wheelers</p>
                                                                                                          <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM redemption_shopowner where DATE_FORMAT(created_at,'%Y-%m-%d') >=  '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and vehicle_type = '2' and shopowner_id= '$id'") or die(mysql_error());

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
                                <div class="card-content"><a href="redem_report.php">
                                    <p class="category"><img src="icons/redemptioncar.png"  style="width:60px">No of Four Wheelers </p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM redemption_shopowner where DATE_FORMAT(created_at,'%Y-%m-%d') >=  '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and vehicle_type = '4' and shopowner_id= '$id'") or die(mysql_error());

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
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                                <div class="card-content"><a href="redem_report.php">
                                    <p class="category"><img src="icons/redemptionbike.png"  style="width:60px">Amt Redeemed from 2W</p>
                                                                                                          <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount_redemmed) as sumnewrow FROM  redemption_shopowner where DATE_FORMAT(created_at,'%Y-%m-%d') >=  '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and shopowner_id= '$id' and vehicle_type = '2' ") or die(mysql_error());

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
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                                <div class="card-content"><a href="redem_report.php">
                                    <p class="category"><img src="icons/redemptionbike.png"  style="width:60px">Amt Redeemed from 4W</p>
                                                                                                          <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount_redemmed) as sumnewrow FROM  redemption_shopowner where DATE_FORMAT(created_at,'%Y-%m-%d') >=  '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and shopowner_id= '$id' and vehicle_type = '4' ") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3></a>
                                </div><?php }?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>

                        
                    </div>
					
				<div class="row">	
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">

                        </div>
                 
                    </div>
                        <?php

   $strQuery = "SELECT SUM(amount_redemmed) as amount FROM  redemption_shopowner where DATE_FORMAT(created_at,'%Y-%m-%d') >=  '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and shopowner_id= '$id'";
  $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
  if ($result) {

  $arrData = array(
        "chart" => array(
             "caption"=> "Todays Report",
            "subCaption"=> "Total Transactions",
            "xAxisname"=> "Month",
            "yAxisName"=> "Revenues (In INR)",
            "numberPrefix"=> "Rs",
            "legendItemFontColor"=> "#666666",
            "theme"=> "zune"
            )
          );
          // creating array for categories object

          $categoryArray=array();
          $dataseries1=array();
          $dataseries2=array();
          $dataseries3=array();

          // pushing category array values
         while($row = mysqli_fetch_array($result)) {
            array_push($categoryArray, array(
            "label" => $row["date"]
          )
        );
        array_push($dataseries1, array(
          "value" => $row["amount"]
          )
        );

        array_push($dataseries2, array(
          "value" => $row["value1"]
          )
        );
        array_push($dataseries3, array(
          "value" => $row["value3"]
          )
        );

      }

      $arrData["categories"]=array(array("category"=>$categoryArray));
      // creating dataset object
      $arrData["dataset"] = array(array("seriesName"=> "Actual Revenue", "data"=>$dataseries1), array("seriesName"=> "Projected Revenue",  "renderAs"=>"line", "data"=>$dataseries2),array("seriesName"=> "Profit",  "renderAs"=>"area", "data"=>$dataseries3));


      /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
      $jsonEncodedData = json_encode($arrData);

      // chart object
      $msChart = new FusionCharts("mscombi2d", "chart1" , "600", "350", "chart-container", "json", $jsonEncodedData);

      // Render the chart
      $msChart->render();

      // closing db connection
      $dbhandle->close();

   }

?>
                    </div>

					<br>
                        <div id="chart-container">Chart will render here!</div>
                    <div class="row">
                        <div class="col-md-4">
                           
                        </div>
                        <div class="col-md-4">
                           
                        </div>
                        <div class="col-md-4">
                            
                        </div>
 <?php
if(isset($_POST['submit']))
{ 
     
$one=$_REQUEST['date1'];
$two=$_REQUEST['date2'];
$vehicle_type=$_REQUEST['vehicle_type'];


	 $results = mysql_query("SELECT * FROM details_transaction where date between '$one' and '$two' and vehicle_type='".$des."' ");
	//$number=mysql_num_rows($result); 
	//echo $results;
             //  echo "Total records in table= ". $number;
	
?>
<div style="text-align:center;">
<b><?php print"$one"; ?><?php print"$two";?>
<?php 

if(mysql_num_rows($results) >= 1)
{
	?>
									<?php
	 
      while($rowc1 = mysql_fetch_array($results))   
  {
  
  
	
  ?>

                                                <tr>
                                                    <td><?php echo $rowc1['id'];?></td>
                                                    <td><?php echo $rowc1['transaction_id'];?></td>
                                                     <td><?php echo $rowc1['amount'];?></td>
                                                    <td><?php echo $total?></td>
                                                  <!-- <td><?php echo $rowc1['topic'];?></td>-->
													
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                                    </td>
                                                </tr>
											 <?php
  }
  
  
   ?>
   
  <?php
}
else
{
    echo'<div style="text-align:center;color:red;">';
	echo "<h1></h1>";
	echo'</div>';
}

?>
<?php
}
?>
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