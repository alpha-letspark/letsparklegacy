<?php 
@ob_start();
include("config.php");
if (isset($_GET['department'])) {  

	$department=$_GET['department'];
	

$result= mysql_query("SELECT * FROM topic where department='$department' ");

}
if(isset($_POST['submit'] ))
{
foreach($_POST['department'] as $row=>$department)
{
$dep=$department;
//$department=$_POST['department'][$row];
$topic=$_POST['topic'][$row];
$description=$_POST['description'][$row];

//echo $description;
//echo $topic;
//echo $department;
echo $sql;

$sql="INSERT INTO rating(description,topic,department)
VALUES
('$dep','$topic','$description')";

}
if(!mysql_query($sql,$bd))

{

 die('Error: ' . mysql_error());
 //echo "Invalid Data";
  }
  else
  {
$success = true;
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
    <title>Material Admin Dashboard</title>
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
            <div class="logo">
                <a href="dashboard.html" class="simple-text">
                    Logo Text
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="dashboard.html" class="simple-text">
                    LT
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="img/avatar.jpg" alt="img">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            Jannat Man
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a data-toggle="collapse" href="#pagesExamples" aria-expanded="true">
                            <i class="material-icons">image</i>
                            <p>Pages
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse in" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="pricing.html">Pricing</a>
                                </li>
                                <li>
                                    <a href="timeline.html">Timeline</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                                <li>
                                    <a href="register.html">Register Page</a>
                                </li>
                                <li>
                                    <a href="lock.html">Lock Screen Page</a>
                                </li>
                                <li class="active">
                                    <a href="user.html">User Profile</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#componentsExamples">
                            <i class="material-icons">apps</i>
                            <p>Components
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="componentsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="components/buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="components/grid.html">Grid System</a>
                                </li>
                                <li>
                                    <a href="components/panels.html">Panels</a>
                                </li>
                                <li>
                                    <a href="components/sweet-alert.html">Sweet Alert</a>
                                </li>
                                <li>
                                    <a href="components/notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="components/icons.html">Icons</a>
                                </li>
                                <li>
                                    <a href="components/typography.html">Typography</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#formsExamples">
                            <i class="material-icons">content_paste</i>
                            <p>Forms
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="forms/regular.html">Regular Forms</a>
                                </li>
                                <li>
                                    <a href="forms/extended.html">Extended Forms</a>
                                </li>
                                <li>
                                    <a href="forms/validation.html">Validation Forms</a>
                                </li>
                                <li>
                                    <a href="forms/wizard.html">Wizard</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#tablesExamples">
                            <i class="material-icons">grid_on</i>
                            <p>Tables
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="tablesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="tables/regular.html">Regular Tables</a>
                                </li>
                                <li>
                                    <a href="tables/extended.html">Extended Tables</a>
                                </li>
                                <li>
                                    <a href="tables/datatables.net.html">DataTables.net</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#mapsExamples">
                            <i class="material-icons">place</i>
                            <p>Maps
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="mapsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="maps/google.html">Google Maps</a>
                                </li>
                                <li>
                                    <a href="maps/fullscreen.html">Full Screen Map</a>
                                </li>
                                <li>
                                    <a href="maps/vector.html">Vector Map</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="widgets.html">
                            <i class="material-icons">widgets</i>
                            <p>Widgets</p>
                        </a>
                    </li>
                    <li>
                        <a href="charts.html">
                            <i class="material-icons">timeline</i>
                            <p>Charts</p>
                        </a>
                    </li>
                    <li>
                        <a href="calendar.html">
                            <i class="material-icons">date_range</i>
                            <p>Calendar</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
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
                        <a class="navbar-brand" href="#"> Profile </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
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
                                        <a href="#">Generate monthly report</a>
                                    </li>
                                    <li>
                                        <a href="#">A new order has been placed!</a>
                                    </li>
                                    <li>
                                        <a href="#">Settings updated</a>
                                    </li>
                                    <li>
                                        <a href="#">Completed the task</a>
                                    </li>
                                    <li>
                                        <a href="#">Director meeting started</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Profile -
                                        <small class="category">Complete your profile</small>
                                    </h4>
   <?php if(isset($success)) { ?> <div class="alert alert-success"> <i class="fa fa-check fa-fw"></i> Successfully Inserted </div> <?php } ?> 
                                    <form method="post" action="">
                   									 <?php 
while($row = mysql_fetch_array($result)){

?>                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Fist Name</label>
                                                    <input type="text" class="form-control" name="description[]"  value="<?php echo $row['description'];?>">
													 <input type="hidden" class="form-control" name="department[]" value="<?php echo $row['department']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                   
													<select class="form-control" name="topic[]">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>
                                                </div>
                                            </div>
                                        </div>
										    
										    
								
                                     
                                        
                                        <div class="clearfix"></div>
                                   
									<?php }?>
									<button type="submit" class="btn btn-rose pull-right" name="submit">Update Profile</button> </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#">
                                        <img class="img" src="img/marc.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                                    <h4 class="card-title">Jannat Man</h4>
                                    <p class="description">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                    </p>
                                    <a href="#" class="btn btn-rose btn-round">Connect</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="dashboard.html">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="login.html">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="register.html">
                                    Register
                                </a>
                            </li>
                            <li>
                                <a href="lock.html">
                                    Lock
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                       <a href="dashboard.html">Company Name</a>, Better idea for work
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
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