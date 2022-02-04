<?php
@ob_start();
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
ini_set('display_errors','off');
include("config.php");
session_start();
date_default_timezone_set('Asia/Kolkata');
$curdate = date('Y-m-d H:i:s');
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
$id = $_GET['id'];
$employee_name = $_GET['employee_name'];

$q = ("select card_type as card_type, 
CASE
        WHEN employee_allocation.card_type= 1 THEN 'PRIVILEGE'
        WHEN employee_allocation.card_type= 2 THEN 'FREE'
        WHEN employee_allocation.card_type= 3 THEN 'PAID'
        WHEN employee_allocation.card_type= 4 THEN 'CUSTOMER-4W'
        ELSE 'CUSTOMER-2W'
    END AS result , card_type
 from employee_allocation where id = '$id'");
 
$qr =  mysql_query($q) or die(mysql_error());
$rc = mysql_fetch_array($qr);
$card_type = $rc['card_type'];
if(isset($_POST['submit']) )
{
$q12 = "";
$card_number = $_POST['employee_id'];
$card_type1 = $_POST['card_type1'];
//$q1="select * from card_details where card_number='$card_number' and type = '$card_type' and approval_status = '0'";
$q1="select * from card_details where card_number='$card_number' and type = '$card_type'";
$q11 =  mysql_query($q1);
$q12 = mysql_fetch_array($q11);
//echo $q12;
if($q12 == "")
{
		  $success = true;
}
else
{


          //check card
$results = mysql_query("SELECT * FROM employee_allocation where card_number = '$card_number' and current_status = 1");
$count = mysql_num_rows($results);
if(mysql_num_rows($results) >= '1')
{
    //echo '<script>alert("Card already allocated")</script>'; 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

swal("Oops!", "Card already allocated!", "error");
});
</script>
<?php
}

else if(mysql_num_rows($results) < '1')

{
//check card ends

$valid_from = $_POST['valid_from'];
$valid_to = $_POST['valid_to'];
$amount = $_POST['amount'];
$employee_name = $_POST['employee_name'];
//$sql="UPDATE  card_details set approval_status = '1' where card_number = '$card_number'" or die(mysql_error());
 $sq1="UPDATE  card_details set approval_status = '2',valid_from = '$valid_from',valid_to = '$valid_to'  where card_number = '$card_number'" or die(mysql_error());
$sq2="UPDATE  employee_allocation set current_status = '1' , card_number = '$card_number' , valid_from = '$valid_from',valid_to = '$valid_to' where id = '$id' " or die(mysql_error());
$sq3="INSERT INTO recharge_details (card_number,amount, valid_from,valid_to,recharge_date,employee_name) VALUES ('$card_number','$amount', '$valid_from', '$valid_to' , '$curdate', '$employee_name');" or die(mysql_error());
}


if(!mysql_query($sq1,$bd) || !mysql_query($sq2,$bd) || !mysql_query($sq3,$bd)  )

{
      

// die('Error: ' . mysql_error());
 //echo "Invalid Data";
 


  }
  else
  {
    //echo '<script>alert("Card allocated and recharged successfully")</script>';
     // header('Location: allocate.php');
      //header('Location: thankyou.php');
	  //echo "Record inserted Successfully...";
    ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

swal("Success!", "Card allocated and Recharged Successfully!", "success",timer: 20000);
});
</script>
<?php

  }

}
}
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
	 <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
    var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();

    $('#datepicker').datepicker({
       // minDate: new Date(currentYear, currentMonth, currentDate),
        dateFormat: 'yy-mm-dd'
    });
});

    </script>

        <script type="text/javascript">
      $(document).ready(function () {
    var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();

    $('#datepicker1').datepicker({
       // minDate: new Date(currentYear, currentMonth, currentDate),
        dateFormat: 'yy-mm-dd'
    });
});

    </script>
	<style>
	.card .card-content {
    padding: 15px 20px;
    position: relative;
}
	</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
 <style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;z-index: 1000;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px; width: 239px;}
</style>
<script>
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "readcard.php",
	
    data:'keyword='+$(this).val()+'&type=2',
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
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("form").submit(function(){
    alert("Card allocated and recharged successfully.");
  });
});
</script>-->
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
                        <a class="navbar-brand" href="#">Employee Module </a>
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
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
<div>&nbsp;&nbsp;
 <div>
 <a href="add_employee_request.php"><input id="gobutton"  value="Add Employee" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="allocate.php"> <input id="gobutton" value="Card Allocation" class="btn bg-teal-400" name="submit" style="background-color: #ff7900;position: relative;border: 2px solid #ff7900;color: #ffffff;"></a>
<a href="employee-card-recharge.php"> <input id="gobutton" value="Recharge" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="card-allocation.php"> <input id="gobutton"  value="History" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;width: 119px;"></a>
 <a href="employee_list.php"> <input id="gobutton"  value=" Employee List" class="btn bg-teal-400" name="submit"style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>

</div><br />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <?php if($_SESSION["id"]==1  )
									
									
									{ ?>
                                <form id="RegisterValidation" action="" method="post" name="form" >
                                    <div class="card-header card-header-icon" >

                                    </div>            
                                       
                                    <div class="card-content">
                                        
           <h4 class="card-title"> <?php if(isset($success)) { ?> <div class="alert alert-success" style="background-color:red;text-align:center;"><strong> Invalid Card Number </strong></div> <?php } ?></h4>
								 <div align="center" class="form-group label-floating" style="padding-bottom: 10px;margin: -27px 0 0 0;right: -15px;">
									 &nbsp;&nbsp;<p style="font-size: 18px;"><b>Card Type: <?php echo $rc['result']; ?></b></p>
						<div align="center"><input type="hidden" class="form-control" id="card_type1" name="card_type1" value = "<?php echo $rc['card_type']; ?>" type="text" disabled autocomplete="off">
   
                                      <div align="center"><input type="hidden" class="form-control" id="card_name" name="card_name" value = "<?php echo $rc['result']; ?>" type="text" disabled autocomplete="off"></div>
                                       </div></div>
                                            
                                        </div>
                                         <div>
                         <div class="form-group label-floating">
                                             &nbsp;&nbsp;<b>&nbsp;&nbsp;Select Card Number</b>
                                             <label class="control-label">
                                               
                                               <small></small>
                                            </label><br/>
					<input type="text" name="employee_id" id="search-box" value="<?php echo $shopowner["card_number"];?>" placeholder="Select card number..." autocomplete ="off" required/>
                 
                   </div> 
                   <div id="suggesstion-box"></div>
                   </div><br />
				<div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                 <code> <b> Valid FROM </b> <input  class="form-control"  VALUE="<?php echo $rc['valid_from']; ?>" name="valid_from" autocomplete="off" type="date" required/> </code>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                 <code> <b>Valid TO</b> <input name="valid_to" class="form-control"  VALUE="<?php echo $rc['valid_to']; ?>" autocomplete="off" type="date" required/></code>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4" align="right">
                            <div class="card" >
                                <b></b>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card" >
                                <b>&nbsp;&nbsp;Add Recharge Amount</b>
                         <input class="form-control" id="amount" name="amount"  type="text"  autocomplete="off" required="">
                         <input class="form-control" id="employee_name" name="employee_name"  type="hidden" value="<?php echo $employee_name; ?>"  autocomplete="off" required="">
                            </div>
                        </div>
                         <div align="right"><input type="submit" name="submit" class="btn btn-rose btn-fill"></submit></div>
				   </div>
										

                                    </div>
                                </form>
                               
                            </div>
                        </div>
                       
                        
                        
                    </div>
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>

                                    <div class="material-datatables">
	
	
  <?php } ?>
									
								

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
  <script>
      function insertResults(json){
        $("#employee_id").val(json["employee_id"]);
       $("#shop_name").val(json["shop_name"]);
       $("#vehicle_type").val(json["vehicle_type"]);
      }

      function clearForm(){
        $("#employee_id,#shop_name,#vehicle_type").val("");
					

      }

      function makeAjaxRequest(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajax.php",
          success: function(json) {
            insertResults(json);
          }
        });
      }

      $("#meetingPlace").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm();
        } else {
          makeAjaxRequest(id);
        }
      });
    </script>
  
</body>
</html>