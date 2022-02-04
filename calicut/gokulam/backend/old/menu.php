<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}
?>

            <div class="logo">
                <a class="simple-text">
                  Focus Mall
                </a>
            </div>
           
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="img/logo.jpg" alt="img">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse"  class="collapsed" >
                           <span><?php echo $_SESSION['user']; ?></span>
                          
                        </a>
                      <!--  <div class="collapse" id="collapseExample">
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
                <ul class="nav">
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li  class="">
                         <?php if($_SESSION["id"]==1 or $_SESSION["id"]==2 )
									
									
									{ ?>
                        <a data-toggle="collapse" href="#pagesExamples" >
                            <i class="material-icons">image</i>
                            <p>Transaction Report
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            
                            <ul class="nav">
                                <li>
                                    <a href="todays-report.php">Todays Report</a>
                                </li>
								<li>
                                    <a href="overall-report.php">Overall Report</a>
                                </li>
								<li>
                                    <a href="generate.php">Generate Report</a>
                                </li>

                            </ul>
                            
                        </div>
                        	<?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
									
									?>
                    </li>

                    <li>
                         <?php if($_SESSION["id"]==1 or $_SESSION["id"]==3 )
									
									
									{ ?>
                        <a data-toggle="collapse" href="#formsExamples">
                            <i class="material-icons">content_paste</i>
                            <p>Redemption Report
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="redemption-today.php">Todays Report</a>
                                </li>
								<li>
                                    <a href="redemption-total.php">Overall Report</a>
                                </li>
								<li>
                                    <a href="redemption-amount.php">Redem Amount</a>
                                </li>
                               
                            </ul>
                        </div>
                        <?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
									
									?>
                    </li>
                   <!--  <li>
                          <?php if($_SESSION["id"]==1 or $_SESSION["id"]==4 )
									
									
									{ ?>
                        <a data-toggle="collapse" href="#tablesExamples">
                            <i class="material-icons">business</i>
                            <p>BD Department
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="tablesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="https://campusville.in/feedback/bd-team.php?department=BD">Team</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/bd-finacials.php?department=BD">Finacials</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/bd-operation-planning.php?department=BD">Operation Planing</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/bd-technology-usage.php?department=BD">Technology Usage</a>
                                </li>
                                 <li>
                                    <a href="https://campusville.in/feedback/bd-brand-image.php?department=BD">Brand Image</a>
                                </li>
                            </ul>
                        </div>
                        
	<?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
									
									?>
                    </li>
                      <li>
                           <?php if($_SESSION["id"]==1 or $_SESSION["id"]==5 )
									
									
									{ ?>
                        <a data-toggle="collapse" href="#componentsExamples">
                            <i class="material-icons">event</i>
                            <p>EVENTS Department
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="componentsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="https://campusville.in/feedback/events-team.php?department=EVENTS">Team</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/events-finacials.php?department=EVENTS">Finacials</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/events-operation-planning.php?department=EVENTS">Operation Planing</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/events-technology-usage.php?department=EVENTS">Technology Usage</a>
                                </li>
                                 <li>
                                    <a href="https://campusville.in/feedback/events-brand-image.php?department=EVENTS">Brand Image</a>
                                </li>
                            </ul>
                        </div>
                        <?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
                    </li>
                    <li>
                         <?php if($_SESSION["id"]==1 or $_SESSION["id"]==6 )
{ ?>
                        <a data-toggle="collapse" href="#mapsExamples">
                            <i class="material-icons">attachment</i>
                            <p>LEGAL Department
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="mapsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="https://campusville.in/feedback/legal-team.php?department=LEGAL">Team</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/legal-finacials.php?department=LEGAL"> Finacials</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/legal-operation-planning.php?department=LEGAL">Operation Planing</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/legal-technology-usage.php?department=LEGAL">Technology Usage</a>
                                </li>
                                 <li>
                                    <a href="https://campusville.in/feedback/legal-brand-image.php?department=LEGAL">Brand Image</a>
                                </li>
                            </ul>
                        </div>
                        <?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
                    </li>
                     <li>
                         <?php if($_SESSION["id"]==1 or $_SESSION["id"]==7 )
{ ?>	
                        <a data-toggle="collapse" href="#pagesExamples1">
                            <i class="material-icons">grid_on</i>
                            <p>O&M Department
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples1">
                            <ul class="nav">
                                <li>
                                    <a href="https://campusville.in/feedback/o&m-team.php?department=OM">Team</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/o&m-finacials.php?department=OM"> Finacials</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/o&m-operation-planning.php?department=OM">Operation Planing</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/o&m-technology-usage.php?department=OM">Technology Usage</a>
                                </li>
                                 <li>
                                    <a href="https://campusville.in/feedback/o&m-brand-image.php?department=OM">Brand Image</a>
                                </li>
                            </ul>
                        </div>
                        <?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
                    </li>
                    <li>
                         <?php if($_SESSION["id"]==1 or $_SESSION["id"]==8 )
{ ?>
                        <a data-toggle="collapse" href="#pagesExamples2">
                            <i class="material-icons">account_balance</i>
                            <p>Accounts Department
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples2">
                            <ul class="nav">
                                <li>
                                    <a href="https://campusville.in/feedback/accounts-team.php?department=ACCOUNTS">Team</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/accounts-finacials.php?department=ACCOUNTS"> Finacials</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/accounts-operation-planning.php?department=ACCOUNTS">Operation Planing</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/accounts-technology-usage.php?department=ACCOUNTS">Technology Usage</a>
                                </li>
                                 <li>
                                    <a href="https://campusville.in/feedback/accounts-brand-image.php?department=ACCOUNTS">Brand Image</a>
                                </li>
                            </ul>
                        </div>
                        <?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
                    </li>
                     <li>
                         <?php if($_SESSION["id"]==1 or $_SESSION["id"]==10 )
{ ?>
                        <a data-toggle="collapse" href="#pagesExamples3">
                            <i class="material-icons">free_breakfast</i>
                            <p>Food Department
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples3">
                            <ul class="nav">
                                <li>
                                    <a href="https://campusville.in/feedback/food-team.php?department=FOOD AND BEVERAGE">Team</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/food-finacials.php?department=FOOD AND BEVERAGE">Finacials</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/food-operation-planning.php?department=FOOD AND BEVERAGE">Operation Planing</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/food-technology-usage.php?department=FOOD AND BEVERAGE">Technology Usage</a>
                                </li>
                                 <li>
                                    <a href="https://campusville.in/feedback/food-brand-image.php?department=FOOD AND BEVERAGE">Brand Image</a>
                                </li>
                            </ul>
                        </div>
                        <?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
                    </li>
                      <li>
                          <?php if($_SESSION["id"]==1 or $_SESSION["id"]==10 )
{ ?>
                        <a data-toggle="collapse" href="#pagesExamples4">
                            <i class="material-icons">free_breakfast</i>
                            <p>PMT Department
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples4">
                            <ul class="nav">
                                <li>
                                    <a href="https://campusville.in/feedback/pmt-team.php?department=PMT">Team</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/pmt-finacials.php?department=PMT">Finacials</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/pmt-operation-planning.php?department=PMT">Operation Planing</a>
                                </li>
                                <li>
                                    <a href="https://campusville.in/feedback/pmt-technology-usage.php?department=PMT">Technology Usage</a>
                                </li>
                                 <li>
                                    <a href="https://campusville.in/feedback/pmt-brand-image.php?department=PMT">Brand Image</a>
                                </li>
                            </ul>
                        </div>
                        <?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
                    </li>
                   <!-- <li>
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
                    </li>-->
                    <li>
                         <?php if($_SESSION["id"]==1)
{ ?>
                     <!--   <a data-toggle="collapse" href="#mapsExamples1">
                            <i class="material-icons">place</i>
                            <p>Reports
                                <b class="caret"></b>
                            </p>
                        </a>-->
                        <div class="collapse" id="mapsExamples1">
                            <ul class="nav">

                                 <!--<li>
                                    <a href="https://campusville.in/feedback/user-report.php">Generate Report</a>
                                </li>-->
                            </ul>
                        </div>
                        	<?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
                    </li>
                    <li>
                        <?php if($_SESSION["id"]==1  )
{ ?>
                        <a href="create_users.php">
                            <i class="material-icons">widgets</i>
                            <p>Create Shopowner</p>
                        </a>
                        	<?php } else {
 //  echo "<div style='text-align: center;font-weight:bold;left: -55px;color:red;'><h3>You dont have privilege to access this page</h3></div>";
}
?>	
                    </li>
                   <!-- <li>
                        <a href="widgets.html">
                            <i class="material-icons">widgets</i>
                            <p>Widgets</p>
                        </a>
                    </li>
                    <li>
                        <a href="charts.html">
                            <i class="material-icons">timeline</i>
                            <p>Repo</p>
                        </a>
                    </li>
                    <li>
                        <a href="calendar.html">
                            <i class="material-icons">date_range</i>
                            <p>Calendar</p>
                        </a>
                    </li>-->
                </ul>
            </div>
        </div>