<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
$curdate=  date('Y-m-d');
$counter = 0;
$yesterday= date('Y-m-d', strtotime('-1 days'));
$date_from = $_POST['date1'];
$date_to =   $_POST['date2'];
$oneweek = date('Y-m-d', strtotime('-7 days'));
$onemonth = date('Y-m-d', strtotime('-30 days'));
$sixmonth = date('Y-m-d', strtotime('-180 days'));
$oneyear = date('Y-m-d', strtotime('-365 days'));

session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
  header('location: index.php');
}
$month_type = $_POST['month_type'];
{
    if($month_type == '1')
    {
        $date_from = $yesterday;
        $date_to = $yesterday;
    }
    elseif($month_type == '2')
    {
        $date_from = $oneweek;
        $date_to = $curdate;
    }
    elseif($month_type == '3')
    {
        $date_from = $onemonth;
        $date_to = $curdate;
    }
    elseif($month_type == '4')
    {
        $date_from = $sixmonth;
        $date_to = $curdate;
    }
    elseif($month_type == '5')
    {
        $date_from = $oneyear;
        $date_to = $curdate;
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
    <title>LetsPark Mall of Mysore</title>
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
    url: "readEmployee.php",
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
                        <a class="navbar-brand" href="#"> SELECT USER</a>
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

          <form name="form2" method="post" id="" action="user_collection_report.php">
                 <div class="col-xs-3">
                            <div class="card">
       <input type="text" name="employee_id" id="search-box" value="<?php echo $shopowner["id"];?>" placeholder="Select User" autocomplete ="off" required/>
        
  
                              <div id="suggesstion-box"></div>
                            </div>

                        </div>
                         <div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                 <code> <b> Date FROM </b> <input  class="form-control" id="datepicker" name="date1" autocomplete="off" type="text" required/> </code>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-content text-center">
                 <code> <b>Date TO</b> <input name="date2" class="form-control" id="datepicker1" autocomplete="off" type="text" required/></code>
                                </div>
                            </div>
                        </div>

 
 <input id="gobutton" type="submit" value="submit" class="btn bg-teal-400" name="submit"  style="position: relative;
    right: -20px;; background-color: #ff7900;" /> 
</form>
                    </div>
        <br/ >
        <div class="content">
                <div class="container-fluid">
                <div class="row" align = "right" style = "position: relative;left: -28px;" >
        <form method="post">
                                   
                <select name="month_type" class="form-control" style="width:20%" onchange='this.form.submit()'>
                    <option value="">Please Select Option</option>
                    <option value="1" >Yesterday</option>
                    <option value="2" >Last Week</option>
                    <option value="3" >Last Month</option>
                    <option value="4" >Last 6 Month</option>
                    <option value="5" >Last 1 Year</option>
                </select>
        </form>
        </div>
        </div>
        </div>
        <br/>
        
                <!-- table starts here -->
                
                <div class="content">
                <div class="container-fluid">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title"><strong>Total Detailed List<strong></h3>
                  
                                    
                                    <div class="material-datatables">
  
                                        <table align="center" id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
  
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>Total 2W</th>
                                                    <th>Total 4W</th>
                                                    <th>2W Amt</th>
                                                    <th>4W Amt</th>
                                                    <th>Total Collection</th>
                                                    <th>View </th>
                                                                                                       
                                                </tr>
                                            </thead>
                                        
<?php

 $q1 =  mysql_query("select * from cms_users ") or die(mysql_error());
  while($row2 = mysql_fetch_array($q1)){
      $uid = $row2['id'];
 ?>
                                        <tr>
                                            <td><?php echo ++$counter; ?></td>
                                            <td><?php echo $row2['name']; ?></td>

    <?php
    
       $q2 =  mysql_query("SELECT count(*) as two_wheeler_count from details_transaction where  exit_user_id = $uid and exit_time >= '$date_from' and exit_time <= '$date_to' and area = '0' and vehicle_type = 2 ") or die(mysql_error());
      $rowc1 = mysql_fetch_array($q2);

    ?> <td><?php echo $rowc1['two_wheeler_count']; ?></td>
    <?php
    
       $q2 =  mysql_query("SELECT count(*) as two_wheeler_count from details_transaction where  exit_user_id = $uid and exit_time >= '$date_from' and exit_time <= '$date_to' and area = '0' and vehicle_type = 4") or die(mysql_error());
      $rowc1 = mysql_fetch_array($q2);

    ?> <td><?php echo $rowc1['four_wheeler_count']; ?></td>
  
  <?php
        $q2 =  mysql_query("SELECT sum(amount) as amount  from details_transaction where  exit_user_id = $uid  and exit_time >= '$date_from' and exit_time <= '$date_to' and area = '0' and vehicle_type = 2") or die(mysql_error());
      $rowc1 = mysql_fetch_array($q2);
      $amt = $rowc1['amount'];
      if ($amt == "" ){  $amt = '0'; }

    ?><td><?php echo $amt; ?></td>
  
  <?php
    
       $q2 =  mysql_query("SELECT sum(amount) as amount  from details_transaction where  exit_user_id = $uid  and exit_time >= '$date_from' and exit_time <= '$date_to' and area = '0' and vehicle_type = 4") or die(mysql_error());
      $rowc1 = mysql_fetch_array($q2);
$amt = $rowc1['amount'];
      if ($amt == "" ){  $amt = '0'; }
    ?> <td><?php echo $rowc1['amt']; ?></td>
    
  <?php
    
       $q2 =  mysql_query("SELECT sum(amount) as amount  from details_transaction where  exit_user_id = $uid  and exit_time >= '$date_from' and exit_time <= '$date_to' and area = '0'") or die(mysql_error());
      $rowc1 = mysql_fetch_array($q2);
$amt = $rowc1['amount'];
      if ($amt == "" ){  $amt = '0'; }
    ?> <td><?php echo $rowc1['amt']; ?></td>
    
     
    
                                        <td><a href="#" ><i class="fa fa-eye"></i></a></td>
    </tr>
  <?php  } ?>
                                        </table>
  
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                </div>
            </div>
                
                <!-- table ends here -->
                

                      
                                <div class="card-footer">
                                   
                                </div></a>
                            </div>
                        </div>
                                <div class="card-content">

                                                    <div class="container-fluid">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>

                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                </div>
                                   
        
    
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
  
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" style="width:100%">
                                            <thead>
                                            </thead>
  
                                            <tbody>
                                          
                                                      
 <?php
if(isset($_POST['submit']))
{ 
 
$one=$_REQUEST['date1'];
$two=$_REQUEST['date2'];

  $des=$_POST["department"]; 

   $results = mysql_query("SELECT * FROM rating where date between '$one' and '$two' and department='".$des."' ");
  //$number=mysql_num_rows($result); 
  //echo $results;
             //  echo "Total records in table= ". $number;
  
?>
<div style="text-align:center;">
<b>Start Date:<?php print"$one"; ?>.....End Date:<?php print"$two";?>
<?php 

if(mysql_num_rows($results) >= 1)
{
  ?>
                  <?php
   
      while($rowc1 = mysql_fetch_array($results))   
  {
  
   $total = $rowc1['rating'] * $rowc1['actual_share'];
  
  ?>

                                                <tr>
                                                    <td><?php echo $rowc1['topic'];?></td>
                                                    <td><?php echo $rowc1['description'];?></td>
                                                     <td><?php echo $rowc1['actual_share'];?></td>
                                                    <td><?php echo $total?></td>
                                                  <!-- <td><?php echo $rowc1['topic'];?></td>-->
                          
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                                    </td>
                                                </tr>
                       <?php
  }
  
  
   ?>
   
  <?php
}
else
{
    echo'<div style="text-align:center;color:red;">';
  echo "<h1>No Records Found...</h1>";
  echo'</div>';
}

?>
<?php
}
?>
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
<!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>
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
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '/'s row.');
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