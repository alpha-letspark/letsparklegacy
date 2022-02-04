<?php 
@ob_start();
ini_set('display_errors','off');
include("config.php");
date_default_timezone_set('Asia/Kolkata');  
$yesterday= date('Y-m-d', strtotime('-1 days'));
$lastsevendays= date('Y-m-d', strtotime('-7 days'));
session_start();
$twocount = 0;
$fourcount = 0;

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
    <title>LetsPark Gokulam Mall</title>
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
    
    <style type="text/css">
      .dash{
        border: 1px solid red;
        width: 100%;
        height: 0px;

}  
    </style>

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
           <?php if($_SESSION["id"]==74 ){ ?>
             <?php include "menu.php"  ?>
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
                        <a class="navbar-brand" href="#"> Yesterday's Transaction Report </a>
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
                                <div class="card-content"><a href="dashboard-trans-yesterdays-list-view.php">
                         <p class="category"><img src="icons/transaction.png" style="width:60px"> Entry</p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and (card_type = '4' or card_type = '5') and area = '0'  ") or die(mysql_error());
    $q2 =  mysql_query("SELECT COUNT(transaction_id) as statu1 FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and (card_type = '4' or card_type = '5'  or card_type = '6') and area = '1'  ") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
  	while($row3 = mysql_fetch_array($q2)){

$basement = $row2['statu'];
$surface = $row3['statu1'];
$total = $basement + $surface;

?>
                                    <h3 class="card-title"><?php echo $total ;?></h3></a>
                                </div></a>
                                
<?php }} ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="dashboard-trans-yesterdays-exit-list-view.php">
                         <p class="category"><img src="icons/transaction.png" style="width:60px"> Exit</p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and status = '1' and (card_type = '4' or card_type = '5'  or card_type = '6')") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
                                </div></a>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>
						
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="vop-yesterdays-report.php">
                         <p class="category"><img src="icons/transaction.png" style="width:60px"> VoP</p>
                                    <?php 
  //$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and manual_vop_update = '1' and (card_type = '4' or card_type = '5' or card_type = '6')") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
                                </div></a>
                                
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
                    <div class="card-content"><a href= "list-view-transaction.php"><a href="dashboard-trans-yesterdays-list-view.php">
                                    <p class="category"><img src="icons/rupee.png" style="width:60px">Amt Collected</p>
                                                                        <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount) as sumnewrow FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and (card_type = '4' or card_type = '5' or card_type = '6')") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">₹<?php echo $row2['sumnewrow'];?></h3></a>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                       <div class="card-content"><a href= "list-view-transaction.php"><a href="dashboard-trans-yesterdays-list-view-two.php">
                                    <p class="category"><img src="icons/bike.png"  style="width:60px">2 Wheeler Entry</p>
                                                                                                          <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and vehicle_type = '2' and (card_type = '4' or card_type = '5'  or card_type = '6')") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3></a>
                                </div><?php }?>
                                <div class="card-footer"></a>
                                   
                                </div>
                            </div>
                        </div>
						
 <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                       <div class="card-content"><a href= "list-view-transaction.php"><a href="dashboard-trans-yesterdays-list-view_2w_Exit.php">
                                    <p class="category"><img src="icons/bike.png"  style="width:60px">2 Wheeler Exit</p>
                                                                                                          <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and vehicle_type = '2' and status = '1' and (card_type = '4' or card_type = '5'  or card_type = '6')") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3></a>
                                </div><?php }?>
                                <div class="card-footer"></a>
                                   
                                </div>
                            </div>
                        </div>

<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                       <div class="card-content"><a href="2w-on-premises_yesterday.php">
                                    <p class="category"><img src="icons/transaction.png"  style="width:60px">2W on premises</p>
<?php
$q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and vehicle_type = '2' AND status = '0' and (card_type = '4' or card_type = '5'  or card_type = '6') ") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){                                                         ?>

                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
  </div> <?php } ?>
                                <div class="card-footer"></a>
                                   
                                </div>
                            </div>
                        </div>
<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="dashboard-trans-yesterdays-list-view-two.php">
                                    <p class="category"><img src="icons/bike_money.png"  style="width:60px">2W Amt Collected</p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount) as sum FROM `details_transaction`  where vehicle_type = '2' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and (card_type = '4' or card_type = '5'  or card_type = '6') ") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">₹<?php echo $row2['sum'];?></h3></a>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>						
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                       <div class="card-content"><a href= "list-view-transaction.php"><a href="dashboard-trans-yesterdays-list-view-four.php">
                                    <p class="category"><img src="icons/car.png"  style="width:60px">4 Wheeler Entry</p>
                                                                                                          <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and vehicle_type = '4' and (card_type = '4' or card_type = '5'  or card_type = '6')") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3></a>
                                </div><?php }?>
                                <div class="card-footer"></a>
                                   
                                </div>
                            </div>
                        </div>
                       
            
            <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                     <div class="card-content"><a href= "list-view-transaction.php"><a href="dashboard-trans-yesterdays-list-view_4w_Exit.php">
                                    <p class="category"><img src="icons/car.png"  style="width:60px">4 Wheeler Exit </p>
                                                                        <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM details_transaction where vehicle_type = '4' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and status = '1' and (card_type = '4' or card_type = '5'  or card_type = '6')") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3></a>
                                </div><?php } ?>
                                <div class="card-footer"></a>
                                   
                                </div>
                            </div>
                        </div>
<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                       <div class="card-content"><a href="4w-on-premises_yesterday.php">
                                    <p class="category"><img src="icons/transaction.png"  style="width:60px">4W on premises</p>
                                                                                                          
<?php
$q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and vehicle_type = '4' AND status = '0' and (card_type = '4' or card_type = '5'  or card_type = '6') ") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){                                                         ?>

                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
  </div> <?php } ?>                         
                                <div class="card-footer"></a>
                                   
                                </div>
                            </div>
                        </div>	
   <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="dashboard-trans-yesterdays-list-view-four.php">
                                    <p class="category"><img src="icons/car_money.png"  style="width:60px">4W Amt Collected</p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount) as sum FROM `details_transaction`  where vehicle_type = '4' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and (card_type = '4' or card_type = '5'  or card_type = '6') ") or die(mysql_error()); 
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">₹<?php echo $row2['sum'];?></h3></a>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>	                     
                    </div>

                                            <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                       <div class="card-content"><a href="yesterday-regular.php">
                                    <p class="category"><img src="icons/transaction.png"  style="width:60px">Regular Parking</p>
                                                                                                          <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday'  AND area = '0' and (card_type = '4' or card_type = '5'  or card_type = '6') ") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
                                </div><?php }?>
                                <div class="card-footer"></a>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                    <div class="card-content"><a href= "yesterday-premium.php">
                                    <p class="category"><img src="icons/transaction.png" style="width:60px"> Premium Parking</p>
                                                                        <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' AND area = '1'") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div></a>
                            </div>
                        </div>

 
   <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="yesterday-premium.php">
                                    <p class="category"><img src="icons/car.png"  style="width:60px">Premium Amount </p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount) as sum FROM `details_transaction`  where  DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday'  and area = '1' ") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">₹<?php echo $row2['sum'];?></h3></a>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>  
<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="yesterday-FOC.php">
                         <p class="category"><img src="icons/redemption.png" style="width:60px"> Free of Charge</p>
                                    <?php 
  //$dept=$_POST['department'];
    $q1 =  mysql_query("SELECT COUNT(foc) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' and foc = '1' and (card_type = '4' or card_type = '5'  or card_type = '6') ") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3><br /></a>
                                </div></a>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>	
  <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                       <div class="card-content"><a href="yesterday-emp-entry.php">
                                    <p class="category"><img src="icons/transaction.png"  style="width:60px">Emp Entry</p>
                                                                                                          <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday'  AND  (card_type = '1' or card_type = '3')  ") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
                                </div><?php }?>
                                <div class="card-footer"></a>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">equalizer</i>
                                </div>
                    <div class="card-content"><a href= "yesterday-emp-exit.php">
                                    <p class="category"><img src="icons/transaction.png" style="width:60px"> Emp Exit</p>
                                                                        <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' AND (card_type = '1' or card_type = '3') and status = '1'") or die(mysql_error());

  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['statu'];?></h3></a>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div></a>
                            </div>
                        </div>

 
   <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="yesterday-emp-vop.php">
                                    <p class="category"><img src="icons/car.png"  style="width:60px">Emp VOP </p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday' AND (card_type = '1' or card_type = '3') and status = '0'") or die(mysql_error());
//  echo $q1;
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
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="yesterday-rec-dashboard.php">
                                    <p class="category"><img src="icons/car.png"  style="width:60px">Emp Recharge Amt </p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT SUM(amount) as statu FROM  recharge_details where DATE_FORMAT(recharge_date,'%Y-%m-%d')   = '$yesterday'") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">₹<?php echo $row2['statu'];?></h3></a>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="yesterday-fine.php">
                                    <p class="category"><img src="icons/car.png"  style="width:60px">Fine Count </p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(*) as statu FROM  finedetails where DATE_FORMAT(created_at,'%Y-%m-%d') = '$yesterday' ") or die(mysql_error());
//  echo $q1;
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
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="fine.php">
                                    <p class="category"><img src="icons/car.png"  style="width:60px">Fine Amt </p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT sum(fined_amount) as statu FROM  finedetails where DATE_FORMAT(created_at,'%Y-%m-%d') = '$yesterday' ") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">₹<?php echo $row2['statu'];?></h3></a>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div> 

                                                <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="2w-15-yes.php">
                                    <p class="category"><img src="icons/15minbike.png"  style="width:60px">2W Under 15 mins </p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(*) as cnt FROM details_transaction where card_type = '5' and (TIME_TO_SEC(exit_time) - TIME_TO_SEC(entry_time)) <= 900  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday'") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['cnt'];?></h3></a>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div> 

                                                <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="4w-15-yes.php">
                                    <p class="category"><img src="icons/15mincar.png"  style="width:60px">4W Under 15 mins </p>
                                    <?php 
  //$dept=$_POST['department'];
  $q1 =  mysql_query("SELECT COUNT(*) as cnt FROM details_transaction where card_type = '4' and (TIME_TO_SEC(exit_time) - TIME_TO_SEC(entry_time)) <= 900  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$yesterday'") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['cnt'];?></h3></a>
                                </div>
                                
<?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div> 









						
        
                        <?php

   $strQuery = "SELECT DISTINCT DATE_FORMAT(entry_time,'%Y-%m-%d') as date, sum(amount) as amount  from `details_transaction` where DATE_FORMAT(entry_time,'%Y-%m-%d') > '$lastsevendays' and DATE_FORMAT(entry_time,'%Y-%m-%d') < '$yesterday' group by DATE_FORMAT(entry_time,'%Y-%m-%d')  ";
  $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
  if ($result) {

  $arrData = array(
        "chart" => array(
             "caption"=> "This Week Report",
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

                    </div>
                </div>
            </div>   
           
       

          <div style="overflow: hidden;"> <?php include "footer.php" ?></div>
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
<!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
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