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
                  Gokulam Mall
                </a>
            </div>
           
            <div class="sidebar-wrapper" style="overflow: auto;">
                <div class="user">
                   <a href="dashboard.php"> <div class="photo">
                        <img src="img/logo.jpg" style="width: 75px;" alt="img">
                    </div></a>
                    <div class="info">
                        <a data-toggle="collapse"  class="collapsed" >
                           <span><?php echo $_SESSION['user']; ?></span>       
                        </a>
                    </div>
                </div>
                <ul class="nav">
                    <?php if($_SESSION["id"]==1 || $_SESSION["id"]==74 ){ ?> 
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
                                    <a href="yesterday.php">Yesterday's Report</a>
                                </li>
                                
                                <li>
                                    <a href="generate-transaction.php">Generate Report</a>
                                </li>


                            </ul>
                            
                        </div>
                           
                    </li>
                    

                 
                        

                     <li>
                        <a href="user_col.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Collection Report</p>
                        </a>
                    </li>
                    
                  <!--  <li>
                        <a href="employee-card-request.php">
                            <!--<i class="material-icons">dashboard</i>-->
                           <!-- <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Card Request</p>
                        </a>
                    </li> -->
					<li>
					<a data-toggle="collapse" href="#t3">
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parking Attendant<b class="caret"></b></p>
                        </a> 
    
                        <div class="collapse" id="t3">
                            <ul class="nav">

                                <li>
                                    <a href="add_attendant.php">Add Attendant</a>
                                </li>
                                <li>
                                    <a href="view_attendant.php">View Attendant</a>
                                </li>
								
                            </ul>
                        </div>
					</li>
                     <li>
                        <a href="add_employee_request.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Module</p>
                        </a>
                    </li>
						<!--<li>
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
					</li>-->

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
                                <li>
                        <a href="generate-fine.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p>Fine Report</p>
                        </a>
                    </li>
                            </ul>
                        </div>
					</li>
                    <!--<li>
                        <a data-toggle="collapse" href="#formsExamplesnewdropdown">
                            <p><img src="icons/10.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Card<b class="caret"></b></p>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamplesnewdropdown">
                            <ul class="nav">

                                <li>
                                    <a href="employee-card-recharge.php">Employee Card Recharge</a>
                                </li>
                                <li>
                                    <a href="recharge-history.php">Recharge History</a>
                                </li>
                                <li>
                                    <a href="card-allocation.php">Card Allocation History</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>-->

                                        <li>
                    <a data-toggle="collapse" href="#t4">
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shop<b class="caret"></b></p>
                        </a> 
    
                        <div class="collapse" id="t4">
                            <ul class="nav">

                                <li>
                                    <a href="create_users.php">Add Shop</a>
                                </li>
                                <li>
                                    <a href="view_shop.php">Shop List</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
 
                    <li>
                        <a data-toggle="collapse" href="#formsExamples">
                            <p><img src="icons/10.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Redemption Report <b class="caret"></b></p>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="todays-redemption-report.php">Todays Report</a>
                                </li>
                                <li>
                                    <a href="generate-redemption.php">Generate Report</a>
                                </li>
                                 <li>
                                    <a href="selectshopredemption.php">Shopowner Overall Report</a>
                                </li>
                                <li>
                                    <a href="single-redem-generate-report.php">Shopowner Generate Report</a>
                                </li>
                               
                            </ul>
                        </div>

                    </li>
                    
                                        <li>
                        <a data-toggle="collapse" href="#formsExamplesnew">
                            <p><img src="icons/10.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Settlement Report <b class="caret"></b></p>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamplesnew">
                            <ul class="nav">

                                <li>
                                    <a href="selectshop.php">Settlement</a>
                                </li>
                                <li>
                                    <a href="settledreport.php"> Todays Settled Report</a>
                                </li>
                                <li>
                                    <a href="unsettledreport.php">Todays Unsettled Report</a>
                                </li>
                                <li>
                                    <a href="generate-unsettled.php">Generate Unsettled Report</a>
                                </li>
                                <li>
                                    <a href="generate-settled.php">Generate Settled Report</a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                                         
                    <li>
                        <a href="moneycollected-remarks.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Money Collected Remarks</p>
                        </a>
                    </li>

                                        
                    <li>
                        <a href="change_password.php">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password</p>
                        </a>
                    </li>

                     <!--<li>
                        <a href="card_details.php">
                            <i class="material-icons">dashboard</i>-->
                           <!-- <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Card Information</p>
                        </a>
                    </li>-->
                   <!-- <li>
                        <a href="fine.php">
                            <!--<i class="material-icons">dashboard</i>-->
                           <!-- <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fine details</p>
                        </a>
                    </li>-->

                   <!--  <li>
                        <a href="validity_update.php">
                            <!--<i class="material-icons">dashboard</i>-->
                           <!-- <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Card Validity</p>
                        </a>
                    </li>-->

                   
<?php } else { } ?>
                </ul>
            </div>
        </div>