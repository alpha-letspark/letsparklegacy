<?php
@ob_start();
//include('lock.php');
include("config.php");
session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
    header('location: index.php');
}
//$hostelname=$_POST['hostelname'];
if (isset($_GET['id'])) {  

    $id=$_GET['id'];
    

$result= mysql_query("SELECT * FROM login where id='$id' ");

}
if(isset($_POST['update']))
{

   $sql="update login set  pass='".md5($_POST['pass'])."' where id='$id'";
   $result1=mysql_query($sql);
   if($result1)
   {
    //header('Location: updatesuccessful.php');
//  header('Location: listofusers.php');
$success = true;
     // echo "Successful";
//echo "<BR>";
//echo "<a href='list_records.php'>View result</a>";
   }
   
   else {
//echo "ERROR";
die(mysql_error());
}

}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img\apple-icon.png">
    <link rel="icon" type="image/png" href="img\favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Lets Park</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS     -->
    <link href="css\bootstrap.min.css" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="css\material-dashboard.css" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css\demo.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="css\font-awesome.min.css">
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
           <div class="logo">
                <a href="dashboard.php" class="simple-text">
                   CSC PRERANA
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="dashboard.php" class="simple-text">
                    LT
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <?php 
     $id=$_SESSION['id'];
    $query = sprintf("SELECT * FROM  login where id='$id'  ");
    
    $qur =  mysql_query($query) or die(mysql_error());
    while($rowc = mysql_fetch_array($qur)){
        //extract($rowc); 
?> 
                        <img src="<?php echo $rowc["locations"];?>" alt="img">
                         <?php }?>
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed"> 
                                                                  <?php 
     $id=$_SESSION['id'];
    $query = sprintf("SELECT * FROM  login where id='$id'  ");
    
    $qur =  mysql_query($query) or die(mysql_error());
    while($rowc = mysql_fetch_array($qur)){
        //extract($rowc); 
?> 

                           <?php echo $rowc['name'];?>
                            <?php }?>
                            <b class="caret"></b>
                       </a>
                        <!--<div class="collapse" id="collapseExample">
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
                        </div>-->
                    </div>
                </div>
                   <?php include"menu.php"?>
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
                  
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                           
                           
                              <li>
                                <a href="logout.php" >
         
                                    <!--<i class="material-icons">input</i>-->
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
                        <div class="col-md-6">
                             <?php if(isset($success)) { ?> <div class="alert alert-success"> <i class="fa fa-check fa-fw"></i>Password Updated Successfully </div> <?php } ?> 
                            <div class="card">
                                
                            <?php 
while($row = mysql_fetch_array($result)){

?>   
                                <form id="RegisterValidation" method="post" action="">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">mail_outline</i>
                                    </div>
                                            <div class="card-content">
                                        <h4 class="card-title">Change Password</h4>
                                      
                                        <div class="form-group label-floating">
                                            <label class="control-label" style="color: black;font-size: 12px;font-weight: bold;">
                                                Password
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="pass" id="txtPassword" type="text" value=" <?php echo $row['pass']; ?>" required="">
                                           
                                        </div>
                                         <div class="form-group label-floating">
                                            <label class="control-label" style="color: black;font-size: 12px;font-weight: bold;">
                                               Conform Password
                                                <small>*</small>
                                            </label>
                                          
                                            <input class="form-control"  id="txtConfirmPassword" type="text" value=" <?php echo $row['pass']; ?>" required="">
                                        </div>
                                       
                                        <div class="category form-category">
                                            <small>*</small> Required fields</div>
                                        <div class="form-footer text-right">
                                            
                                            <button type="submit" name="update" class="btn btn-rose btn-fill" onclick="return Validate()">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <?php }?>
                            </div>
                        </div>
                       
                       
                        
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                  
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                       CSC
                    </p>
                </div>
            </footer>
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
                        <img src="..\img\sidebar-1.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="..\img\sidebar-2.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="..\img\sidebar-3.jpg" alt="img">
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="..\img\sidebar-4.jpg" alt="img">
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
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQdPTFiEAKL64Z4ivRsw9YwdUeYJ8F-HU"></script>
<!-- Select Plugin -->
<script src="js\jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="js\jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="js\sweetalert2.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
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
    function setFormValidation(id) {
        $(id).validate({
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    }

    $(document).ready(function() {
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
</script>
  <script type="text/javascript">
        function Validate() {
            var password = document.getElementById("txtPassword").value;
            var confirmPassword = document.getElementById("txtConfirmPassword").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>