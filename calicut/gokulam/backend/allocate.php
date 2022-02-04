<?php
//@ob_start();
//ini_set('display_errors','off');
//include("config.php");
include("shop_list.php");
if (isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$update= true;
		$record = mysqli_query($db, "SELECT * FROM employee_allocation WHERE id=$id");
		if(count($record) == 1 )
		{
			$n = mysqli_fetch_array($record);
			$shop_id = $n['shop_id'];
			
			$employee_name = $n['employee_name'];
			$mobile = $n['mobile'];
			$vehicle_type = $n['vehicle_type'];
			$vehicle_number = $n['vehicle_number'];
			$card_type = $n['card_type'];
			
		$r1 = mysqli_query($db, "SELECT * FROM login WHERE id=$shop_id");
		$n1 = mysqli_fetch_array($r1);
		$shop_name = $n1['name'];
		
			//$type = $n['id_cms_privileges'];
			
		}
	}
//session_start();
//echo $_SESSION['name'];
/*if(!isset($_SESSION['user'])){
    header('location: index.php');
}
if(isset($_POST['submit']) )
{
$user = $_POST['user'];
$id = $_GET['id'];
$pass = md5($_POST['pass']);
$query=mysql_query("select *from login where user='$user'");
if(mysql_num_rows($query)>0)
{
 echo '<script>alert("Username Already Exit ...Please try another");
                </script>';
}
else
{

$sql="INSERT INTO employee_allocation (employee_name,employee_id,shop_id,mobile,vehicle_type,vehicle_number,card_type,current_status) VALUES ('$_POST[employee_name]','$_POST[employee_id]','$id','$_POST[mobile]', '$_POST[vehicle_type]','$_POST[vehicle_number]','$_POST[card_type]', '0')" or die(mysql_error());

if(!mysql_query($sql,$bd))

{

 die('Error: ' . mysql_error());
 //echo "Invalid Data";
  }
  else
  {
      $success = true;
      //header('Location: createuser.php');
      //header('Location: thankyou.php');
      //echo "Record inserted Successfully...";
  }
}
}*/
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img\favicon.png">
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
    <style>
    .card .card-content {
    padding: 15px 20px;
    position: relative;
}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px; width: 239px;}
    </style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "add_employee_request_search_box.php",
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
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>

<body>
    <div class="wrapper">
       <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../img/sidebar-1.jpg">
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
                        <a class="navbar-brand" href="#"> Employee Module </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
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
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="card" >

                               <!-- <form action="employee_code.php" method="post">-->
                                    <div class="card-header card-header-icon" >
                                       
                                    </div>
<div>&nbsp;&nbsp;
 <div>
 <a href="add_employee_request.php"><input id="gobutton"  value="Add Employee" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="allocate.php"> <input id="gobutton" value="Card Allocation" class="btn bg-teal-400" name="submit" style="background-color: #ff7900;position: relative;border: 2px solid #ff7900;color: #ffffff;"></a>
<a href="employee-card-recharge.php"> <input id="gobutton" value="Recharge" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="card-allocation.php"> <input id="gobutton"  value="History" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;width: 119px;"></a>
 <a href="employee_list.php"> <input id="gobutton"  value=" Employee List" class="btn bg-teal-400" name="submit"style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>

</div><br />
                                    <div class="card-content" style="position: relative;top: -27px;">


                                        <!--<h4 class="card-title"><b>Request Parking Cards</b></h4>-->
                                         <h4 class="card-title"> <?php if(isset($success)) { ?> <div class="alert alert-success"><i class="fa fa-check fa-fw"></i> Successfully Created </div> <?php } ?></h4>
                                             
										</div>
                        
                        
                    </div>
                         <div align="center"><h2><b><font color="black"></font></b></h2></div>    
                  <div class="container-fluid">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                 <!--   <h4 class="card-title">Employee Card Request</h4> -->
                  
                                  <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                       <!--  <a href="todays-transaction-report.php"> <input id="gobutton" type="submit" value="Go Back" class="btn bg-teal-400" name="submit" style=" background-color: #ff7900;position: relative;"></a>-->
                                    </div>
                                    <div class="material-datatables">
  
                                        <table align="center" id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
  
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Shop Name</th>
                                                    <th>Emp Name</th>
                                                    <th>Mobile</th>
                                        <th>Veh Type</th>
                                                    <th>Veh No</th>
                                                    <th>Card type</th>
                                                    <th>Actions</th>
                                                   
                                                   
                                                    <!--<th>Total</th>-->
                                                   <!-- <th class="disabled-sorting text-right">Actions</th>  -->
                                                </tr>
                                            </thead>
  
                                            <tbody>
                                          
                                                      <?php 
  
// $user_id =  $_SESSION['id'];
      
  $query = ("select login.name as shopname,employee_allocation.id as id, employee_allocation.employee_name as employee_name,employee_allocation.mobile as mobile, employee_allocation.vehicle_type as vehicle_type, employee_allocation.vehicle_number as vehicle_number,employee_allocation.card_type as card_type, 
CASE
        WHEN employee_allocation.card_type= 1 THEN 'PRIVILEGE'
        WHEN employee_allocation.card_type= 2 THEN 'FREE'
        WHEN employee_allocation.card_type= 3 THEN 'EMPLOYEE'
        WHEN employee_allocation.card_type= 4 THEN 'CUSTOMER-4W'
        ELSE 'CUSTOMER-2W'
    END AS result

     from employee_allocation inner join login where employee_allocation.shop_id = login.id and employee_allocation.current_status = '0'");

   // $query = ("SELECT transaction_id,redemption_id,vehicle_type,vehicle_number,entry_time, exit_time, amount, 
         //   (TIME_TO_SEC(exit_time) - TIME_TO_SEC(entry_time)) AS duration, 
           // (CASE WHEN status = '1' THEN 'Completed' ELSE 'Running' END )  as status FROM details_transaction");
  //echo $query;
  $qur =  mysql_query($query) or die(mysql_error());
  while($rowc = mysql_fetch_array($qur)){

?> 

                                                <tr>
                                                    <td><?php echo ++$counter; ?></td>
                                                    <td><?php echo $rowc['shopname'];?></td>
                                        <td><?php echo $rowc['employee_name'];?></td>
                                                    <td><?php echo $rowc['mobile'];?></td>
                                                    <td><?php echo $rowc['vehicle_type'];?></td>
                                                    <td><?php echo $rowc['vehicle_number'];?></td>
                                                    <td><?php echo $rowc['result'];?></td>
                                                    <td class="td-actions">
                          <a href="edit-allocation.php?id=<?php echo $rowc['id'];?>&employee_name=<?php echo $rowc['employee_name'];?>" >
                                                            <button type="button" rel="tooltip" class="btn btn-success btn-simple" title="Allocate" >
                                                                <i class="material-icons">edit</i>
                                                            </button></a>
                         <!-- <a href="javascript:delete_id(<?php echo $rowc['id'];?>)">
                                                            <button type="button" class="btn btn-danger btn-simple btn-xs" rel="tooltip" title="Decline" >
                                                                <i class="material-icons">close</i>
                                                            </button></a> -->
                                                      
                                                    </td>
                          
                          
                          
                                                   <!-- <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                                    </td> -->
                                                </tr>
                      <?php }?>
                                            </tbody>
      
                                        </table>
  <!--<button id="myBtn">Open Modal</button>-->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>
  
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                </div>

<!-- Trigger/Open The Modal -->

                   <!-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><b>Add Employee Vehicle Details</b></h4>
                                    
                                    <div class="toolbar">
                                              Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
    
                                       <!-- <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
    
                                                <tr>
                                                    <th>S no</th>
                                                    <th>Emp Name</th>
                                                    <th>Mobile</th>
                                                    <th>Veh Type</th>
                                                    <th>Veh No</th>
                                                    <th>Card Type</th>
                                                    <th>Card Id</th>
                                                    <th>Delete Req</th>
                                                    
                                                   
                                                  <th>Total</th>-->
                                                 <!--   <th class="disabled-sorting text-right">Actions</th> -->
                                                </tr>
                                            </thead>
    
                                            <tbody>
                                                                                    
                                                                                                        <?php 
    
// $user_id =  $_SESSION['id'];
            
    $query = sprintf("SELECT * FROM  employee_list where shop_id = '$id' ORDER BY  name ASC");
//  echo $query;
    $qur =  mysql_query($query) or die(mysql_error());
    while($rowc = mysql_fetch_array($qur)){

?> 

                                                <tr>
                                                  <!--  <td><?php echo $rowc['name'];?></td>
                                                    <td><?php echo $rowc['employee_id'];?></td>
                                                    <td><?php echo $rowc['shop_name'];?></td>
                                                    <td><?php echo $rowc['doj'];?></td>
                                                    <td><?php echo $rowc['dob'];?></td>
                                                    <td><?php echo $rowc['gender'];?></td>
                                                    <td><?php echo $rowc['vehicle_type'];?></td>
                                                     <td ><a href="#" class="btn btn-rose btn-fill" >Delete</a></td>

                                                    
                                                 <td class="text-right">
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

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>