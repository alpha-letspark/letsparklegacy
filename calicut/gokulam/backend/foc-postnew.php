<?php 
@ob_start();
ini_set('display_errors','off');
include("config.php");
$curdate=  date('Y-m-d');
$lastsevendays= date('Y-m-d', strtotime('-7 days'));
session_start();
$_SESSION["firstdate"] = $_POST[date1];
$_SESSION["seconddate"] = $_POST[date2];


//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
   include("fusioncharts.php");
   include("fusion_db.php");
   
$date1 = $_POST[date1];
$date2 = $_POST[date2];
$_SESSION["date1"] = $_POST[date1];
$_SESSION["date2"] = $_POST[date2];
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
	  <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
		<script type="text/javascript">
// <!-- <![CDATA[

// Project: Dynamic Date Selector (DtTvB) - 2006-03-16
// Script featured on JavaScript Kit- http://www.javascriptkit.com
// Code begin...
// Set the initial date.
var ds_i_date = new Date();
ds_c_month = ds_i_date.getMonth() + 1;
ds_c_year = ds_i_date.getFullYear();

// Get Element By Id
function ds_getel(id) {
	return document.getElementById(id);
}

// Get the left and the top of the element.
function ds_getleft(el) {
	var tmp = el.offsetLeft;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetLeft;
		el = el.offsetParent;
	}
	return tmp;
}
function ds_gettop(el) {
	var tmp = el.offsetTop;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetTop;
		el = el.offsetParent;
	}
	return tmp;
}

// Output Element
var ds_oe = ds_getel('ds_calclass');
// Container
var ds_ce = ds_getel('ds_conclass');

// Output Buffering
var ds_ob = ''; 
function ds_ob_clean() {
	ds_ob = '';
}
function ds_ob_flush() {
	ds_oe.innerHTML = ds_ob;
	ds_ob_clean();
}
function ds_echo(t) {
	ds_ob += t;
}

var ds_element; // Text Element...

var ds_monthnames = [
'January', 'February', 'March', 'April', 'May', 'June',
'July', 'August', 'September', 'October', 'November', 'December'
]; // You can translate it for your language.

var ds_daynames = [
'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
]; // You can translate it for your language.

// Calendar template
function ds_template_main_above(t) {
	return '<table cellpadding="3" cellspacing="1" class="ds_tbl">'
	     + '<tr>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_py();"><<</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_pm();"><</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_hi();" colspan="3">[Close]</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_nm();">></td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_ny();">>></td>'
		 + '</tr>'
	     + '<tr>'
		 + '<td colspan="7" class="ds_head">' + t + '</td>'
		 + '</tr>'
		 + '<tr>';
}

function ds_template_day_row(t) {
	return '<td class="ds_subhead">' + t + '</td>';
	// Define width in CSS, XHTML 1.0 Strict doesn't have width property for it.
}

function ds_template_new_week() {
	return '</tr><tr>';
}

function ds_template_blank_cell(colspan) {
	return '<td colspan="' + colspan + '"></td>'
}

function ds_template_day(d, m, y) {
	return '<td class="ds_cell" onclick="ds_onclick(' + d + ',' + m + ',' + y + ')">' + d + '</td>';
	// Define width the day row.
}

function ds_template_main_below() {
	return '</tr>'
	     + '</table>';
}

// This one draws calendar...
function ds_draw_calendar(m, y) {
	// First clean the output buffer.
	ds_ob_clean();
	// Here we go, do the header
	ds_echo (ds_template_main_above(ds_monthnames[m - 1] + ' ' + y));
	for (i = 0; i < 7; i ++) {
		ds_echo (ds_template_day_row(ds_daynames[i]));
	}
	// Make a date object.
	var ds_dc_date = new Date();
	ds_dc_date.setMonth(m - 1);
	ds_dc_date.setFullYear(y);
	ds_dc_date.setDate(1);
	if (m == 1 || m == 3 || m == 5 || m == 7 || m == 8 || m == 10 || m == 12) {
		days = 31;
	} else if (m == 4 || m == 6 || m == 9 || m == 11) {
		days = 30;
	} else {
		days = (y % 4 == 0) ? 29 : 28;
	}
	var first_day = ds_dc_date.getDay();
	var first_loop = 1;
	// Start the first week
	ds_echo (ds_template_new_week());
	// If sunday is not the first day of the month, make a blank cell...
	if (first_day != 0) {
		ds_echo (ds_template_blank_cell(first_day));
	}
	var j = first_day;
	for (i = 0; i < days; i ++) {
		// Today is sunday, make a new week.
		// If this sunday is the first day of the month,
		// we've made a new row for you already.
		if (j == 0 && !first_loop) {
			// New week!!
			ds_echo (ds_template_new_week());
		}
		// Make a row of that day!
		ds_echo (ds_template_day(i + 1, m, y));
		// This is not first loop anymore...
		first_loop = 0;
		// What is the next day?
		j ++;
		j %= 7;
	}
	// Do the footer
	ds_echo (ds_template_main_below());
	// And let's display..
	ds_ob_flush();
	// Scroll it into view.
	ds_ce.scrollIntoView();
}

// A function to show the calendar.
// When user click on the date, it will set the content of t.
function ds_sh(t) {
	// Set the element to set...
	ds_element = t;
	// Make a new date, and set the current month and year.
	var ds_sh_date = new Date();
	ds_c_month = ds_sh_date.getMonth() + 1;
	ds_c_year = ds_sh_date.getFullYear();
	// Draw the calendar
	ds_draw_calendar(ds_c_month, ds_c_year);
	// To change the position properly, we must show it first.
	ds_ce.style.display = '';
	// Move the calendar container!
	the_left = ds_getleft(t);
	the_top = ds_gettop(t) + t.offsetHeight;
	ds_ce.style.left = the_left + 'px';
	ds_ce.style.top = the_top + 'px';
	// Scroll it into view.
	ds_ce.scrollIntoView();
}

// Hide the calendar.
function ds_hi() {
	ds_ce.style.display = 'none';
}

// Moves to the next month...
function ds_nm() {
	// Increase the current month.
	ds_c_month ++;
	// We have passed December, let's go to the next year.
	// Increase the current year, and set the current month to January.
	if (ds_c_month > 12) {
		ds_c_month = 1; 
		ds_c_year++;
	}
	// Redraw the calendar.
	ds_draw_calendar(ds_c_month, ds_c_year);
}

// Moves to the previous month...
function ds_pm() {
	ds_c_month = ds_c_month - 1; // Can't use dash-dash here, it will make the page invalid.
	// We have passed January, let's go back to the previous year.
	// Decrease the current year, and set the current month to December.
	if (ds_c_month < 1) {
		ds_c_month = 12; 
		ds_c_year = ds_c_year - 1; // Can't use dash-dash here, it will make the page invalid.
	}
	// Redraw the calendar.
	ds_draw_calendar(ds_c_month, ds_c_year);
}

// Moves to the next year...
function ds_ny() {
	// Increase the current year.
	ds_c_year++;
	// Redraw the calendar.
	ds_draw_calendar(ds_c_month, ds_c_year);
}

// Moves to the previous year...
function ds_py() {
	// Decrease the current year.
	ds_c_year = ds_c_year - 1; // Can't use dash-dash here, it will make the page invalid.
	// Redraw the calendar.
	ds_draw_calendar(ds_c_month, ds_c_year);
}

// Format the date to output.
function ds_format_date(d, m, y) {
	// 2 digits month.
	m2 = '00' + m;
	m2 = m2.substr(m2.length - 2);
	// 2 digits day.
	d2 = '00' + d;
	d2 = d2.substr(d2.length - 2);
	// YYYY-MM-DD
	return y + '-' + m2 + '-' + d2;
}

// When the user clicks the day.
function ds_onclick(d, m, y) {
	// Hide the calendar.
	ds_hi();
	// Set the value of it, if we can.
	if (typeof(ds_element.value) != 'undefined') {
		ds_element.value = ds_format_date(d, m, y);
	// Maybe we want to set the HTML in it.
	} else if (typeof(ds_element.innerHTML) != 'undefined') {
		ds_element.innerHTML = ds_format_date(d, m, y);
	// I don't know how should we display it, just alert it to user.
	} else {
		alert (ds_format_date(d, m, y));
	}
}

// And here is the end.

// ]]> -->
</script>
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
                        <a class="navbar-brand" href="#"> Generated FOC Report </a>
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

                                 echo "";  

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
						                <div class="row">
						                	<div class="col-md-12">
	
                                    </div>
					<!--<form name="form2" method="post" id="" action="transaction-post.php">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                                    <code> <b> Date FROM </b> <input onclick="ds_sh(this);"  class="form-control" name="date1" type="text" readonly="readonly" placeholder="Start Date...." required/> </code>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                                    <code> <b>Date TO</b> <input name="date2" onclick="ds_sh(this);" class="form-control"type="text" readonly="readonly"  placeholder="End Date.." required/></code>
                                </div>
                            </div>
                        </div>
                      <!--  <div class="col-xs-2">
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
                        </div> -->
					<!--	<div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                       <code> <b> Select </b> <select name="department" class="form-control" >
			           <option value=""> SELECT BOTH</option> 
                       <option value="2">2 WHEELER</option>
                       <option value="4">4 WHEELER</option>
                       
              </select></code>
                                </div>
                            </div>
                        </div>
 
 <input id="gobutton" type="submit" value="submit" class="btn bg-teal-400" name="submit"  style="position: relative; background-color: #ff7900;right:-16px;" /> 
</form>-->
       <div align="left"> <a href="generate-foc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="gobutton" type="submit" value="Generate Report" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;"></a><a href="generate-foc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href="generate-foc.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="gobutton" type="submit" value="Export to Excel" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;"></a></div>

	   <div align="center"> <b>From Date :</b> <?php echo $date1 ?><b>&nbsp;&nbsp;To Date : </b><?php echo $date2 ?></div>
                    </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <div class="card-content"><a href="foc-detailed-report.php">
                                    <p class="category"> <img src="icons/transaction.png" style="width:60px">Total FoC</p>
                                    <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(foc) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(entry_time,'%Y-%m-%d') <= '$date2' and foc = '1'") or die(mysql_error());
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
                                <div class="card-content"><a href="foc-detailed-report.php">
                                    <p class="category"><img src="icons/rupee.png" style="width:60px">Total Amt Collected</p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT SUM(amount) as sumnewrow FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(entry_time,'%Y-%m-%d') <= '$date2' and foc = '1'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title">₹<?php echo $row2['sumnewrow'];?></h3> </a>
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
                                <div class="card-content"><a href="foc-detailed-report.php">
                                    <p class="category"><img src="icons/bike.png"  style="width:60px">No of Two Wheelers</p>
                                                                                                          <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(entry_time,'%Y-%m-%d') <= '$date2' and vehicle_type = '2' and foc = '1'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3> </a>
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
                                <div class="card-content"><a href="foc-detailed-report.php">
                                    <p class="category"><img src="icons/car.png"  style="width:60px">No of Four Wheelers </p>
                                                                        <?php 
	//$dept=$_POST['department'];
	$q1 =  mysql_query("SELECT COUNT(vehicle_type) as vec FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(entry_time,'%Y-%m-%d') <= '$date2' and vehicle_type = '4' and foc = '1'") or die(mysql_error());

	while($row2 = mysql_fetch_array($q1)){
?>
                                    <h3 class="card-title"><?php echo $row2['vec'];?></h3> </a>
                                </div><?php } ?>
                                <div class="card-footer">
                                   
                                </div>
                            </div>
                        </div>

                        
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
	echo "";
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
<script src="js/bootstrap-datetimepicker.js"></script>
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