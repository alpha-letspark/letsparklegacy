<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
$card_number = $_POST['card_number'];
session_start();
echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
  header('location: index.php');
}
$card_type="";
if (isset($_POST['submit']))
{
	$card_type = $_POST['type'];
}

$counter = 0;
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
        <style>
    .card .card-content {
    padding: 15px 20px;
    position: relative;
}
    </style>
</head>

<body>
    <div class="wrapper">
       <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"-->
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
                        <a class="navbar-brand" href="#">Card Allocation Report/History</a>
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
                                <div class="card-content">
                                    <div>&nbsp;&nbsp;
          <div><a href="add_employee_request.php"> <input id="gobutton"  value="Add Employee" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;position: relative;"></a>
             <a href="employee_list.php"> <input id="gobutton"  value=" Employee List" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;position: relative;"></a>
<a href="allocate.php"> <input id="gobutton" value="Card Allocation" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;position: relative;"></a>
<a href="employee-card-recharge.php"> <input id="gobutton" value="Recharge" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;position: relative;"></a>
<a href="card-allocation.php"> <input id="gobutton"  value="History" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;position: relative;border: 2px solid black;width:114px;"></a><br />
<a href="card-allocation.php"> <input id="gobutton"  value="Overall" class="btn bg-teal-400" name="submit" style=" background-color: #007C84;position: relative;width: 115px;height: 29px;border: 2px solid black;"></a>
<a href="recharge-history.php"> <input id="gobutton"  value="Card Number" class="btn bg-teal-400" name="submit" style=" background-color: #007C84;position: relative;width: 150px;height: 29px;"></a>
</div>




                    <div class="row" >
                    <form name="form2" method="post" id="" action="overall-recharge-history.php"  >
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                 <code> <b> Date FROM </b> <input  class="form-control" type="date" name="date1" autocomplete="off" type="text" required/> </code>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                 <code> <b>Date TO</b> <input name="date2" class="form-control" type="date" autocomplete="off" type="text" required/></code>
                                </div>
                            </div>
                        </div>
 
<input id="gobutton" type="submit" value="submit" class="btn bg-teal-400" name="submit"  style=" background-color: #ff7900;position: relative; center: -32px;bottom: -32px;" /> 
</form>
                    </div>





                                    <h4 class="card-title">Card Allocation Report/History</h4>
									
									<form id="card_type" action="" method="post">

                                   
										<select name="type" class="form-control" style="width:20%" id ="type" required  title="Select" data-size="7">
                                            <option value="">Please Select Card Type </option>
											<option value="1" >PREVILEGE</option>
                                            <option value="2" >FREE</option>
                                            <option value="3" >EMPLOYEE</option>
											<option value="4" >CUSTOMER 2W</option>
											<option value="5" >CUSTOMER 4W</option>
                                        </select>
									<button type="submit" name="submit" class="btn btn-rose btn-fill">Submit</button>
									</form>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
    
                                        <table align="center" id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
    
                                                <tr>
                                                    <th>S No</th>
                                                    <th>Shop Name</th>
                                                    <th>Card Type</th>
                                                    <th>Card Number</th>
                                                    <th>Emp Name</th>
                                                    <th>Valid From</th>
                                                    <th>Valid To</th>
                                                    <th>Status</th>
                                                   
                                                    <!--<th>Total</th>-->
                                                   <!-- <th class="disabled-sorting text-right">Actions</th>  -->
                                                </tr>
                                            </thead>
    
                                            <tbody>
                                                                                    
<?php 
    
// $user_id =  $_SESSION['id'];
if ($card_type != "")
{
	$query = sprintf("SELECT employee_allocation.card_type,CASE
        WHEN employee_allocation.card_type= 1 THEN 'PREVILEGE' 
        WHEN employee_allocation.card_type= 2 THEN 'FREE' 
        WHEN employee_allocation.card_type= 3 THEN 'EMPLOYEE' 
        WHEN employee_allocation.card_type= 4 THEN 'CUSTOMER 2W' 
        ELSE 'CUSTOMER 4W'
END AS type, employee_allocation.card_number,employee_allocation.employee_name,employee_allocation.shop_id,employee_allocation.valid_from,employee_allocation.valid_to,login.name as name, employee_allocation.current_status as current_status, CASE
        WHEN current_status= 0 THEN 'PENDING'
        ELSE 'ALLOCATED'
END AS result from employee_allocation inner join login where employee_allocation.shop_id=login.id and employee_allocation.card_type=$card_type");
}
else
{
	$query = sprintf("SELECT employee_allocation.card_type,CASE
        WHEN employee_allocation.card_type= 1 THEN 'PREVILEGE' 
        WHEN employee_allocation.card_type= 2 THEN 'FREE' 
        WHEN employee_allocation.card_type= 3 THEN 'EMPLOYEE' 
        WHEN employee_allocation.card_type= 4 THEN 'CUSTOMER 2W' 
        ELSE 'CUSTOMER4W'
END AS type, employee_allocation.card_number,employee_allocation.employee_name,employee_allocation.shop_id,employee_allocation.valid_from,employee_allocation.valid_to,login.name as name, employee_allocation.current_status as current_status, CASE
        WHEN current_status= 0 THEN 'PENDING' 
		WHEN current_status= 1 THEN 'ALLOCATED' 
		ELSE 'DECLINED'
END AS result from employee_allocation inner join login where employee_allocation.shop_id=login.id");
}
      
    
//  echo $query;
    $qur =  mysql_query($query) or die(mysql_error());
    while($rowc = mysql_fetch_array($qur)){

?> 

                                                <tr>
                                                     <td><?php echo ++$counter; ?></td>
                                                     <td><?php echo $rowc['name'];?></td>
                                                     <td><?php echo $rowc['type'];?></td>
                                                     <td><?php echo $rowc['card_number'];?></td>
                                                     <td><?php echo $rowc['employee_name'];?></td>
                                                     <td><?php echo $rowc['valid_from'];?></td>
                                                     <td><?php echo $rowc['valid_to'];?></td>
                                                     <td><?php echo $rowc['result'];?></td>
                                                
                                                   <!-- <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                                    </td> -->
                                                </tr>
                                            <?php }?>
                                            </tbody>
            
                                        </table>
    
                                    </div>
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