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
date_default_timezone_set('Asia/Kolkata');
$current_date=date('Y-m-d');
$amount_redemmed = $_POST['amount_redemmed'];
$shopowner_id =    $_POST['shopowner_id'];
$redemption_id =   $_REQUEST['redemption_id'];
$redemption_flag = 1;
$vehicle_type = 2;
$con1 = mysqli_connect('database-1.c4yvruc72su1.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulamdemo') or die("DB Connection cant be established");
$sql1 = "select vehicle_number as vec from details_transaction where redemption_id='".$redemption_id."' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$current_date'";
$result = mysqli_query($con,$sql1);
$vec=mysqli_fetch_row($result);
if( $vehicle_type=="2" ){
$max_amount=10;
}
else{
$max_amount=20;
}


if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
date_default_timezone_set('Asia/Kolkata');  
$created_at=  date('Y-m-d H:i:s');
$current_date=date('Y-m-d');
$con1 = mysqli_connect('database-1.c4yvruc72su1.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulamdemo') or die("DB Connection cant be established");
$query = "select redemption_id, vehicle_type, transaction_id   from details_transaction where redemption_id='".$redemption_id."' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$current_date'"; 
$result = mysqli_query($con1, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
//echo $query;
$red_id = $row['redemption_id'];
$extra = $row['transaction_id'];

//echo $row['redemption_id'];


$redemption_id = $_POST['redemption_id'];

    $sq = "SELECT * from redemption_shopowner WHERE redemption_id = '$redemption_id'  ";
//echo $sq ;
    $result = mysql_query($sq);
      if($amount_redemmed==0) 
      {
        echo '<script type="text/javascript">alert("Sorry ...Redemption Id  already exists!");</script>';
echo '<script>window.location.href = "redem_amount.php";</script>';

       //print "Sorry that Mobile number already exists";
       }
  else 
   {

$resultset_1 = mysql_query("SELECT * from redemption_shopowner WHERE redemption_id = '$redemption_id' and DATE_FORMAT(created_at,'%Y-%m-%d') = '$current_date'") or die(mysql_error());
$count = mysql_num_rows($resultset_1);
   if($count == 0) 
   {
$redemption_id =   $_REQUEST['redemption_id'];
date_default_timezone_set('Asia/Kolkata');  
$curdate = date('Y-m-d H:i:s');
$vehicle_type=   $_REQUEST['vehicle_type'];
$query = "INSERT INTO redemption_shopowner(client_id,redemption_id,shopowner_id,amount_redemmed,max_amount,redemption_flag,vehicle_type,created_at,extra) VALUES ('$client_id', '$redemption_id','$id', '$amount_redemmed','$max_amount','$redemption_flag','$vehicle_type', '$curdate' , '$extra' )";
$insert = mysql_query($query);

if($insert){
//echo "Succesfully Redemption Added";
}} else {
//echo "Redemption Failed";
}   
    
}   
    
    
    
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
    <style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px; width: 278px;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $("#search-box").keyup(function(){
        $.ajax({
        type: "POST",
        url: "readShop.php",
        data:'keyword='+$(this).val(),
        beforeSend: function(){
            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background","#FFF");
        }
        });
    });
});

function selectShop(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
    <table  class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
<tr><td id="ds_calclass">
</td></tr>
</table>
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
                        <a class="navbar-brand" href="#"> REDEM AMOUNT</a>
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
    <form name="form2" method="post" id="" action="redem_amt.php">
                       <div class="col-xs-3">
                            <div class="card">
                                 
     <h4 style="color:#007C84; color: #007C84;position: relative;right: -415px;font-weight: bold;">Successfully Redeemed</h4>
                             
                            </div>

                    </div>
                                <div class="card-content">
        
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables1">
    
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
    
                                             <!--   <tr>
                                                    <th>Topic</th>
                                                    <th>Description</th>
                                                    <th>Actual Share</th>
                                                    <th>Obtained</th>
                                                    <!--<th>Total</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>-->
                                            </thead>
    
                                            <tbody>
                                                                                    
                                                                                                
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
<!-- Select Plugin -->
<script src="js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="js/sweetalert2.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>
</body>
</html>