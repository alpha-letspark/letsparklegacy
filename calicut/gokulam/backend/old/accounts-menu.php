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
                    Campus Students
                </a>
            </div>
           
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="img/logo.jpg" alt="img">
                    </div>
                    <div class="info">
                        <a  >
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
                        
                        <a data-toggle="collapse" href="#pagesExamples" >
                            <i class="material-icons">image</i> 
                            <p>Accounts Dept
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div  id="pagesExamples">
                            
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
                        
                    </li>

                  <li>
                        <a href="https://campusville.in/feedback/select-accounts.php">
                            <i class="material-icons">widgets</i>
                            <p>Report</p>
                        </a>
                    </li>
                   <!-- <li>
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