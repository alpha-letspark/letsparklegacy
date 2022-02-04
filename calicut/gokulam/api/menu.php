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
                  Mall of Mysore
                </a>
            </div>
           
            <div class="sidebar-wrapper" style="overflow: auto;">
                <div class="user">
                   <a href="dashboard.php"> <div class="photo">
                        <img src="img/logo.jpg" style="width: 69px;" alt="img">
                    </div></a>
                    <div class="info">
                        <a data-toggle="collapse"  class="collapsed" >
                           <span><?php echo $_SESSION['user']; ?></span>
                          
                        </a>
                    </div>
                </div>
                <ul class="nav">
                    <?php if($_SESSION["id"]==1 or $_SESSION["id"]==2 ){ ?> 
                    <li>
                        <a href="dashboard.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</p>
                        </a>
                    </li>
                    <li  class="">
                    
                        <a data-toggle="collapse" href="#pagesExamples" >
                           <!-- <i class="material-icons">image</i>-->
                           <p><img src="icons/03.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaction Report <b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            
                            <ul class="nav">
                                <li>
                                    <a href="todays-transaction-report.php">Yesterday's Report</a>
                                </li>
                                
                                <li>
                                    <a href="generate-transaction.php">Generate Report</a>
                                </li>

                            </ul>
                            
                        </div>
                           
                    </li>
                    

                 
                        

                     <li>
                        <a href="user_collection.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Collection Report</p>
                        </a>
                    </li>
                    <li>
                        <a href="employee-card-request.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Card Request</p>
                        </a>
                    </li>
						<li>
					<a data-toggle="collapse" href="#t2">
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee<b class="caret"></b></p>
                        </a> 
    
                        <div class="collapse" id="t2">
                            <ul class="nav">

                                <li>
                                    <a href="add_employee_request.php">Add Employee</a>
                                </li>
                                <li>
                                    <a href="employee_list.php">Employee List</a>
                                </li>
								
                            </ul>
                        </div>
					</li>
					 <li>
					<a data-toggle="collapse" href="#t1">
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reports<b class="caret"></b></p>
                        </a> 
    
                        <div class="collapse" id="t1">
                            <ul class="nav">

                                <li>
                                    <a href="foc.php">FOC</a>
                                </li>
                                <li>
                                    <a href="yesterdaysvop.php">VOP</a>
                                </li>
								<li>
                                    <a href="searchvehicle.php">Vehicle Search Report</a>
                                </li>
                            </ul>
                        </div>
					</li>
					 <li>

                        <a href="employee-card-recharge.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Card Recharge</p>
                        </a>
                    </li>
                    <li>
                        <a href="recharge-history.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recharge History</p>
                        </a>
                    </li>
                     <li>
                        <a href="card-allocation.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Card Allocation Details</p>
                        </a>
                    </li>

                  
                    <li>
                        <a href="change_password.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password</p>
                        </a>
                    </li>
<?php } else { } ?>
                </ul>
            </div>
        </div>