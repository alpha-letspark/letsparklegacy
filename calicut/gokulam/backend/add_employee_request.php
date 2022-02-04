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


if(isset($_POST['add_employee_request']) )
{
?>


<?php
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
    <title>LetsPark</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function(){
  $("form").submit(function(){
    
   // alert("Data added successfully.");
    //swal("Employee Added Successfully");
    swal("Great!", "Employee Added Successfully!", "success");


  });
});
</script>

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

                                <form action="employee_code.php" method="post" name = "form">
                                    <div class="card-header card-header-icon" >
                                       
                                    </div>
                                       
<div>&nbsp;&nbsp;
 <div>
 <a href="add_employee_request.php"><input id="gobutton"  value="Add Employee" class="btn bg-teal-400" name="submit" style="background-color: #ff7900;position: relative;border: 2px solid #ff7900;color: #ffffff;"></a>
<a href="allocate.php"> <input id="gobutton" value="Card Allocation" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="employee-card-recharge.php"> <input id="gobutton" value="Recharge" class="btn bg-teal-400" name="submit" style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>
<a href="card-allocation.php"> <input id="gobutton"  value="History" class="btn bg-teal-400" name="submit"style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"</a>
 <a href="employee_list.php"> <input id="gobutton"  value=" Employee List" class="btn bg-teal-400" name="submit"style="background-color: #ffffff;position: relative;border: 2px solid #ff7900;color: #ff7900;"></a>

</div><br />
                                    <div class="card-content" style="position: relative;top: -27px;">
                                        <!--<h4 class="card-title"><b>Request Parking Cards</b></h4>-->
                                         <h4 class="card-title"> <?php if(isset($success)) { ?> <div class="alert alert-success"><i class="fa fa-check fa-fw"></i> Successfully Created </div> <?php } ?></h4>
                                           <div class="form-group label-floating">
                                             <label class="control-label">
                                               Shop Name
                                               <small>*</small>
                                            </label>
                                            <input class="form-control" id="search-box" name="shop_name" value="<?php echo $shop_name;?>" type="text" required="" autocomplete="off">
											<div id="suggesstion-box"></div>
											</div><br />
											<div class="container">

  <div class="row">
    <div class="col-sm-6">
    									<div class="form-group label-floating" >
                                             <label class="control-label">
                                               Employee Name
                                               <small>*</small>
                                            </label>
                                            <input class="form-control" style="width: 300px;" name="employee_name" value="<?php echo $employee_name;?>" type="text" required="" autocomplete="off">
                                           <input name="employee_id" value="<?php echo $id;?>" type="hidden">

                                        </div>
    </div>
    <div class="col-sm-6" >
                                           <div class="form-group label-floating">
                                             
                                             <label class="control-label">
                                               Mobile
                                               <small></small>
                                            </label>
                                            <input class="form-control" style="width: 300px;" name="mobile" type="text" value="<?php echo $mobile;?>" pattern="[0-9]{10}$" placeholder="9944412222" title="" autocomplete="off">
											
                                        </div>
    </div>
  </div>
</div>
											


                                        
                                        <div class="form-group label-floating">
                                            
                                          <div >
                                       <label >
						<?php   
						if($vehicle_type == '2')
						{
						?>
						<input type="radio" name="vehicle_type" value="2" checked><span class="circle"></span><span class="check"></span> 2 Wheeler
						<input type="radio" name="vehicle_type" value="4" ><span class="circle"></span><span class="check"></span> 4 Wheeler
						<?php   
						}
						elseif($vehicle_type == '4')
						{
						?>
						<input type="radio" name="vehicle_type" value="2" ><span class="circle"></span><span class="check"></span> 2 Wheeler
                        <input type="radio" name="vehicle_type" value="4" checked><span class="circle"></span><span class="check"></span> 4 Wheeler
						<?php 
						}						
						else
						{
						?>
						<input type="radio" name="vehicle_type" value="2" ><span class="circle"></span><span class="check"></span> 2 Wheeler
                        <input type="radio" name="vehicle_type" value="4" ><span class="circle"></span><span class="check"></span> 4 Wheeler
						<?php 
						}						
						?>
						<br/>
                                                    </label>
                                        
										</div>
										<br>
                                        <div class="form-group label-floating">
                                             <label class="control-label">
                                               Vehicle Number
                                               <small>*</small>
                                            </label>
                        <input class="form-control"  style="width: 300px;" name="vehicle_number" type="text" value="<?php echo $vehicle_number;?>" required="" autocomplete="off">                                        </div>
                                        </div>

                                          <div class="form-group label-floating">
                                           <label >
						<?php   
						if($card_type == '2')
						{
						?>
                           <!-- <input type="radio" name="card_type" checked value="2" ><span class="circle"></span><span class="check"></span> Free&nbsp;&nbsp;-->
                            <p>Card Type*</p>
                            <input type="radio" name="card_type" value="3" ><span class="circle"></span><span class="check"></span> Paid&nbsp;&nbsp;<br />
                             <input type="radio" name="card_type" value="1" ><span class="circle"></span><span class="check"></span>Privilege&nbsp;&nbsp;

						<?php   
						}
						elseif($card_type == '3')
						{
						?>
							<!--<input type="radio" name="card_type" value="2" ><span class="circle"></span><span class="check"></span> Free&nbsp;&nbsp;-->
							<p>Card Type*</p>
                            <input type="radio" name="card_type" checked value="3" ><span class="circle"></span><span class="check"></span> Paid&nbsp;&nbsp;<br />
                            <input type="radio" name="card_type" value="1" ><span class="circle"></span><span class="check"></span> Privilege&nbsp;&nbsp;
						<?php   
						}
						else
						{
						?>
							<!--<input type="radio" name="card_type" value="2" ><span class="circle"></span><span class="check"></span> Free&nbsp;&nbsp;-->
							<p>Card Type*</p>
                            <input type="radio" name="card_type" value="3" ><span class="circle"></span><span class="check"></span> Paid&nbsp;&nbsp;<br />
                            <input type="radio" name="card_type" value="1" ><span class="circle"></span><span class="check"></span> Privilege&nbsp;&nbsp;
						<?php   
						}
						?>
							<br/>
                                                    </label>     
										
                                        </div>
                                        <div class="form-footer text-right">
                                            
											<?php if ($update == true): ?>
                                            <button type="submit" name="update_employee_request" class="btn btn-rose btn-fill">Update</button>
											<?php else: ?>
                                            <button type="submit" name="add_employee_request" class="btn btn-rose btn-fill">Submit</button>
											<?php endif ?>
                                        </div>
                                    </div>
									</div>
                                </form>
                               
                            </div>
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