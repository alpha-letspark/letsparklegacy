<?php 
@ob_start();
ini_set('display_errors','off');
include("config.php");
session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
if (isset($_GET['id'])) {  

	$id=$_GET['id'];
	

$result= mysql_query("SELECT * FROM rating where id='$id' and user_id='2' ");

}
if(isset($_POST['update']))
{
//$id = mysql_real_escape_string(trim($_POST["id"]));
   $sql="update rating set description='$_POST[description]',rating='$_POST[rating]' where id='$id' and user_id='2'";
   $result1=mysql_query($sql);
   if($result1)
   {
    //header('Location: updatesuccessful.php');
	header('Location: events-report.php');
     // echo "Successful";
//echo "<BR>";
//echo "<a href='list_records.php'>View result</a>";
   }
   
   else {
echo "ERROR";
die(mysql_error());
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
    <title>CSC Feedback Report</title>
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
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../img/sidebar-1.jpg">
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
                        <a class="navbar-brand" href="#"> <b>Edit EVENTS DEPARTMENT</b></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                           <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">HR MIS Report</a>
                                    </li>
                                    <li>
                                        <a href="#">IT MIS Report</a>
                                    </li>
                                    <li>
                                        <a href="#">BD MIS Report</a>
                                    </li>
                                    <li>
                                        <a href="#">Legal MIS Report</a>
                                    </li>
                                    <li>
                                        <a href="#">OM MIS Report</a>
                                    </li>
									<li>
                                        <a href="#">Accounts MIS Report</a>
                                    </li>
									<li>
                                        <a href="#">Food MIS Report</a>
                                    </li>
                                </ul>
                            </li>-->
                            <li>
                                <a href="logout.php" >
								 
                                   <!-- <i class="material-icons">input</i>-->
                                   <p>LOGOUT</p>
                                    
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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit EVENTS DEPARTMENT (TEAM)
                                        <small class="category"></small>
                                    </h4>
   <?php if(isset($success)) { ?> <div class="alert alert-success"><i class="fa fa-check fa-fw"></i> Successfully Inserted </div> <?php } ?> 
                                    <form method="post" action="">
                                        <?php if($_SESSION["id"]==1 or $_SESSION["id"]==5 )
									
									
									{ ?>
                   									 <?php 
while($row = mysql_fetch_array($result)){

?>                    
                                        <div class="row">
                                            <div class="col-md-">
                                                <div class="form-group label-floating">
                                                   <!-- <label class="control-label">Fist Name</label>-->
                                                    <input type="text" class="form-control" name="description" style="font-weight:bold"  value="<?php echo $row['description'];?>">
													
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-lg-5 col-md-6 col-sm-3">
                                                     <!-- <label class="control-label">Last Name</label> -->
                                                   
													<select class="selectpicker" name="rating" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                                                    <option disabled="" selected="">Please Select
												
  <option value="0" <?php if($row['rating'] == '0') { echo 'selected'; } ?>>Not yet started</option>
  <option value="0.25" <?php if($row['rating'] == '0.25') { echo 'selected'; } ?>>Started</option>
  <option value="0.75" <?php if($row['rating'] == '0.75') { echo 'selected'; } ?>>Half way through</option>
  <option value="1.0" <?php if($row['rating'] == '1.0') { echo 'selected'; } ?>>Completely Done</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
               
                                        <div class="clearfix"></div>
                                   
									<?php }?>
									<button type="submit" class="btn btn-rose pull-right" name="update">Update Rate</button> 
									<?php } else {
   echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
									
									?>
									</form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#">
                                        <img class="img" src="img/logo.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h6 class="category text-gray">CSC MIS System</h6>
                                    <h4 class="card-title"> <span><?php echo $_SESSION['user']; ?></span></h4>
                                    <p class="description">
                                       <b>Feedback Report</b>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include "footer.php" ?>
        </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
           <!-- <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>-->
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
</body>
</html>