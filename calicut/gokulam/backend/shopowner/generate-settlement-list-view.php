<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
session_start();
$id = $_SESSION['id'];
 $date1= $_SESSION["date1"] ;
 $date2= $_SESSION["date2"] ;
// echo $date1;echo $date2;
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
if(isset($_POST['submit']) )
{
$user = $_POST['user'];
$pass = md5($_POST['pass']);
$query=mysql_query("select *from login where user='$user'");
if(mysql_num_rows($query)>0)
{
 echo '<script>alert("Username Already Exit ...Please try another");
				</script>';
}
else
{

$sql="INSERT INTO login (name,user,pass,type,business_type) VALUES ('$_POST[name]','$_POST[user]','".md5($_POST['pass'])."','$_POST[type]', '$_POST[business_type]')" or die(mysql_error());

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
}
   include("fusioncharts.php");
   include("fusion_db.php");
   $curdate=  date('Y-m-d');
$lastsevendays= date('Y-m-d', strtotime('-7 days'));
$d1= $_SESSION["firstdate"];
$d2 = $_SESSION["seconddate"];
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
		  <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
			<style>
	.card .card-content {
    padding: 15px 20px;
    position: relative;
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
		 <?php if($_SESSION["type"]== 1 or $_SESSION["type"]== 3 ){ ?>
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
                        <a class="navbar-brand" href="#">Generate Settlement List</a>
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
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Generated Settlement Full Report</h4>
									
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
	
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
	
                                                <tr align="center">
													<th align="center">Redemption Id</th>
                                                    <th align="center">Amount</th>
													<th align="center">Vehicle Type</th>
                                                    <th align="center">Vehicle No</th>
													<th align="center">Status</th>
													<th align="center">Redeemed Date</th>
                                                    <th align="center">Settlement Date</th>
                                                    
                                                   
                                                    <!--<th>Total</th>-->
                                                   <!-- <th class="disabled-sorting text-right">Actions</th>  -->
                                                </tr>
                                            </thead>
	
                                            <tbody>
																					
																									    <?php 
	

		
		
			
	//$q1 =  mysql_query("SELECT redemption_id, shopowner_id , amount_redemmed, vehicle_type, redemption_flag,updated_at,created_at,
   // CASE
      //  WHEN redemption_flag= 0 THEN 'Settled'
      //  ELSE 'Not Settled'
   // END AS result
//FROM
   // redemption_shopowner where DATE_FORMAT(updated_at,'%Y-%m-%d') >=  '$date1' and DATE_FORMAT(updated_at,'%Y-%m-%d') <= '$date2' and shopowner_id = $id ");
	//while($row2 = mysql_fetch_array($q1)){

   $q1 =  mysql_query("SELECT details_transaction.vehicle_number,redemption_shopowner.redemption_id, redemption_shopowner.shopowner_id , redemption_shopowner.amount_redemmed, redemption_shopowner.vehicle_type, redemption_shopowner.redemption_flag,redemption_shopowner.updated_at,redemption_shopowner.created_at,
   ( CASE
        WHEN redemption_shopowner.redemption_flag= 0 THEN 'Settled'
        ELSE 'Not Settled'
    END ) AS result
FROM
    redemption_shopowner inner join details_transaction where details_transaction.redemption_id = redemption_shopowner.redemption_id  and DATE_FORMAT(redemption_shopowner.updated_at,'%Y-%m-%d') >=  '$date1' and DATE_FORMAT(redemption_shopowner.updated_at,'%Y-%m-%d') <=  '$date2'and redemption_shopowner.shopowner_id = $id and redemption_shopowner.redemption_flag= 0 ");
    while($row2 = mysql_fetch_array($q1)){                                                                                                     
	
		

		

?> 

                                                <tr>
                                                    
													<td align="center"><?php echo $row2['redemption_id'];?></td>
													<td align="center"><?php echo $row2['amount_redemmed'];?></td>
													<td align="center"><?php echo $row2['vehicle_type'];?></td>
                                                    <td align="center"><?php echo $row2['vehicle_number'];?></td>
													<td align="center"><?php echo $row2['result'];?></td>
													<td align="center"><?php echo $row2['created_at'];?></td>
                                                    <td align="center"><?php echo $row2['updated_at'];?></td>
													
												
                                                   <!-- <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                                    </td> -->
                                                </tr>
											<?php }?>
                                            </tbody>
			
                                        </table>
										 <?php

 $strQuery = "SELECT DISTINCT DATE_FORMAT(created_at,'%Y-%m-%d') as date, sum(amount_redemmed) as amount  from `redemption_shopowner` where DATE_FORMAT(created_at,'%Y-%m-%d') = '$curdate' and shopowner_id = '$id'   group by DATE_FORMAT(created_at,'%Y-%m-%d') ";
  $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
  if ($result) {

  $arrData = array(
        "chart" => array(
            "caption"=> "Todays Report",
            "subCaption"=> "Total Redemption",
            "xAxisname"=> "Month",
            "yAxisName"=> "Revenues (In INR)",
            "numberPrefix"=> "Rs",
            "legendItemFontColor"=> "#666666",
            "theme"=> "zune"
            )
          );
          // creating array for categories object

          $categoryArray=array();
          $dataseries1=array();
          $dataseries2=array();
          $dataseries3=array();

          // pushing category array values
         while($row = mysqli_fetch_array($result)) {
            array_push($categoryArray, array(
            "label" => $row["date"]
          )
        );
        array_push($dataseries1, array(
          "value" => $row["amount"]
          )
        );

        array_push($dataseries2, array(
          "value" => $row["value1"]
          )
        );
        array_push($dataseries3, array(
          "value" => $row["value3"]
          )
        );

      }

      $arrData["categories"]=array(array("category"=>$categoryArray));
      // creating dataset object
      $arrData["dataset"] = array(array("seriesName"=> "Actual Revenue", "data"=>$dataseries1), array("seriesName"=> "Projected Revenue",  "renderAs"=>"line", "data"=>$dataseries2),array("seriesName"=> "Profit",  "renderAs"=>"area", "data"=>$dataseries3));


      /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
      $jsonEncodedData = json_encode($arrData);

      // chart object
      $msChart = new FusionCharts("mscombi2d", "chart1" , "600", "350", "chart-container", "json", $jsonEncodedData);

      // Render the chart
      $msChart->render();

      // closing db connection
      $dbhandle->close();

   }

?>
	
                                    </div>
									<br>
                      <!--  <div id="chart-container">Chart will render here!</div> -->
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
</body>
</html>
