<?php
@ob_start();
ini_set('display_errors','off');
include("config.php");
session_start();
$id = $_SESSION['id'];
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
           
            <div class="sidebar-wrapper">
			<?php 
	 $id=$_SESSION['id'];
	$query = sprintf("SELECT * FROM  login  where id= '$id'  ");
	
	$qur =  mysql_query($query) or die(mysql_error());
	while($rowc = mysql_fetch_array($qur)){
		//extract($rowc); 
?> 
                <div class="user">
                    <div class="photo">
                        <img src="img/logo.jpg" style="width: 69px;" alt="img">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse"  class="collapsed" >
                           <span><?php echo $_SESSION['user']; ?></span>
                          
                        </a>
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="dashboard.php?id=<?php echo $rowc['id'];?>">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="change-password.php?id=<?php echo $rowc['id'];?>">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="icons/09.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password</p>
                        </a>
                    </li>

					<li>
                       <!-- <a href="redem_amount.php?id=<?php echo $rowc['id'];?>"> -->
                        <a href="new_file.php?id=<?php echo $rowc['id'];?>">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="img/redemption.png"style="width: 28px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Redeem</p>
                        </a>
                    </li>

                     <li>
                     <a data-toggle="collapse" href="#formsExamples">
                            <p><img src="icons/10.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Redemption Report <b class="caret"></b></p>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                    <li>
                        <a href="todays-redemption-report.php?id=<?php echo $rowc['id'];?>">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="img/redemption.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Todays Report</p>
                        </a>
                    </li>
                    <li>
                        <a href="generate-redemption.php?id=<?php echo $rowc['id'];?>">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="img/redemption.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generate Report</p> 
                        </a>
                    </li>
                                
                               
                            </ul>
                        </div>
                       </li>
                

                    <ul class="nav">
                     <li>
                     <a data-toggle="collapse" href="#formsExamplesnew">
                            <p><img src="icons/10.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Settlement Report <b class="caret"></b></p>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamplesnew">
                            <ul class="nav">
                    <li>
                        <a href="todays-settlement-report.php?id=<?php echo $rowc['id'];?>">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="img/redemption.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Todays Report</p>
                        </a>
                    </li>
                    <li>
                        <a href="generate-settlement.php?id=<?php echo $rowc['id'];?>">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="img/redemption.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generate Report</p> 
                        </a>
                    </li>
                     <li>
                        <a href="unsettled-report.php?id=<?php echo $rowc['id'];?>">
                            <!--<i class="material-icons">dashboard</i>-->
                            <p><img src="img/redemption.png" style="width: 21px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unsettled Report</p> 
                        </a>
                    </li>
                    



                <?php }?>
                                
                               
                            </ul>

                </ul>
            </div>
        </div>
