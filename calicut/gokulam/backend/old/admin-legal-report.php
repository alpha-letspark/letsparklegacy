<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
$date=$_POST['date1'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img\apple-icon.png">
    <link rel="icon" type="image/png" href="img\favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Feedback</title>
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
             <?php if($_SESSION["id"]==2 ){ ?>

            <?php include "hr-menu.php"  ?> 
            	<?php } else {}?>
            	
<?php if($_SESSION["id"]==1 ){ ?>

            <?php include "menu.php"  ?> 
            	<?php } else {}?>
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
                        <a class="navbar-brand" href="#"> Legal DEPARTMENT MIS REPORT </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                           
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
                            </li>-->
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Legal Department Report</h4>
									
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div> 
                                    <?php if($_SESSION["id"]==1 )
									
									
									{ ?>
                                    <div class="material-datatables">
	
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
	
                                                <tr>
                                                    <th>Topic</th>
                                                    <th>Description</th>
                                                    <th>Actual Share</th>
                                                    <th>Obtained</th>
                                                    <!--<th>Total</th>-->
                                                    <th class="disabled-sorting text-right">#</th> 
                                                </tr>
                                            </thead>
	
                                            <tbody>
																					
																									    <?php 
	
 //$user_id =  $_SESSION['id'];
			
	$query = sprintf("SELECT * FROM  rating  where department='LEGAL' and user_id='6' and date = '$date'");
//	echo $query;
	$qur =  mysql_query($query) or die(mysql_error());
	while($rowc = mysql_fetch_array($qur)){
	$total = $rowc['rating'] * $rowc['actual_share'];
?> 

                                                <tr>
                                                    <td><?php echo $rowc['topic'];?></td>
                                                    <td><?php echo $rowc['description'];?></td>
                                                     <td><?php echo $rowc['actual_share'];?></td>
                                                    <td><?php echo $total?></td>
                                                  <!-- <td><?php echo $rowc['topic'];?></td>-->
													
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons"></i></a>
                                                    </td>
                                                </tr>
											<?php }?>
                                            </tbody>
			
                                        </table>
	
 <?php 
//	$user_id =  $_SESSION['id'];
	$query1 = sprintf("SELECT SUM(rating*actual_share*0.20) as total1 FROM  rating  where department='LEGAL' and topic='team' and user_id='6' and date = '$date'");
	//echo $query1; 
	$qu1 =  mysql_query($query1) or die(mysql_error());
	while($row1 = mysql_fetch_array($qu1)){
		//extract($rowc); 
		//$total = $row['rating'] * $row['actual_share'];
		 //echo SUM($total);
		  $marks=$row1['total1'];
		  
		 // echo $mark ;
		  echo "<div style='text-align: center;font-weight:bold;'>Average Department Performance Team:- ". $marks  ."</div>";
		
		  // echo "jaffar";
		  
		  	$query1 = sprintf("SELECT SUM(rating*actual_share*0.30) as total2 FROM  rating  where department='LEGAL' and topic='OPERATIONAL PLANNING' and user_id='6' and date = '$date' ");
	//echo $query1; 
	$qu1 =  mysql_query($query1) or die(mysql_error());
	while($row1 = mysql_fetch_array($qu1)){
		//extract($rowc); 
		//$total = $row['rating'] * $row['actual_share'];
		 //echo SUM($total);
		  $marks1=$row1['total2'];
		  
		 // echo $mark ;
		  echo "<div style='text-align: center;font-weight:bold;'>Average Department Performance OPERATIONAL:- ". $marks1  ."</div>";
		
		  // echo "jaffar";
		  
		  
		  	$query1 = sprintf("SELECT SUM(rating*actual_share*0.25) as total3 FROM  rating  where department='LEGAL' and topic='FINANCIALS' and user_id='6' and date = '$date'");
	//echo $query1; 
	$qu1 =  mysql_query($query1) or die(mysql_error());
	while($row1 = mysql_fetch_array($qu1)){
		//extract($rowc); 
		//$total = $row['rating'] * $row['actual_share'];
		 //echo SUM($total);
		  $marks2=$row1['total3'];
		  
		 // echo $mark ;
		  echo "<div style='text-align: center;font-weight:bold;'>Average Department Performance FINANCIALS:- ". $marks2  ."</div>";
		
		  // echo "jaffar";
		  
		
		
		
		
			$query1 = sprintf("SELECT SUM(rating*actual_share*0.10) as total4 FROM  rating  where department='LEGAL' and topic='TECHNOLOGY USAGE' and user_id='6' and date = '$date'");
	//echo $query1; 
	$qu1 =  mysql_query($query1) or die(mysql_error());
	while($row1 = mysql_fetch_array($qu1)){
		//extract($rowc); 
		//$total = $row['rating'] * $row['actual_share'];
		 //echo SUM($total);
		  $marks3=$row1['total4'];
		  
		 // echo $mark ;
		  echo "<div style='text-align: center;font-weight:bold;position: relative;left: -55px;'>Average Department Performance TECHNOLOGY USAGE:- ". $marks3  ."</div>";
		
		  // echo "jaffar";  
		  
		  
		  	$query1 = sprintf("SELECT SUM(rating*actual_share*0.15) as total5 FROM  rating  where department='LEGAL' and topic='BRAND IMAGE' and user_id='6' and date = '$date'");
	//echo $query1; 
	$qu1 =  mysql_query($query1) or die(mysql_error());
	while($row1 = mysql_fetch_array($qu1)){
		//extract($rowc); 
		//$total = $row['rating'] * $row['actual_share'];
		 //echo SUM($total);
		  $marks4=$row1['total5'];
		  
		 // echo $mark ;
		  echo "<div style='text-align: center;font-weight:bold;'>Average Department Performance BRAND IMAGE:- ". $marks4  ."</div>";
		
		  // echo "jaffar";
		  
		  $total=$marks+$marks1+$marks2+$marks3+$marks4;
		  
		  //echo $total;
	echo"<br />";  
		  
		  echo "<div style='text-align: center;font-weight:bold;left: -55px;'><h4>Overall Average Department Performance:-</h4> ". $total  ."</div>";
		  
}}}}}?>
                                    </div>
                                </div>
                                <?php } else {
   echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
									
									?>
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