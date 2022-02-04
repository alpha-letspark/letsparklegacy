<?php
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";
$sql = "select two_wheeler_slot from client_settings";
$result3 = mysqli_query($con,$sql);
$twoslots=mysqli_fetch_row($result3);
foreach($twoslots as $twowheeler){
        $two = $twowheeler;
        //echo $two;
    }

$sql1 = "select four_wheeler_slot  from client_settings";
$result4 = mysqli_query($con,$sql1);
$fourslots=mysqli_fetch_row($result4);
foreach($fourslots as $fourwheeler){
        $four = $fourwheeler;
        //echo $two;
    }

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="images/favicon.png">
	<title>Gokulam Mall</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/loaders.css">
	<link rel="stylesheet" href="css/lightbox.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<!-- preloader -->
	<div class="preloader">
		<div class="spinner z-depth-1"></div>
	</div>
	<!-- end preloader -->
	

	<div class="team segments" >
		<div class="container">
			<div class="section-title">
				<h3></h3><br />
			</div>
			<div class="row">
				<div class="col s12">
					<div class="contents z-depth-1">
				<div align="center" style="    padding: 29px 10px;"><a href="">	</div>
						<div class="text" align="center" style="    padding: 70px 10px;"><br /><br />
<br /><br /><br /><br />
                            <!--<h3>Total Slots  :  <?php echo $four ?></h3><br /><br />
							<h3>Slots in Use : <div id="show1">  </h3><br /><br />-->
						    <h2> <div style="color:green;font-size: 329px;" id="show3"></div>  </h2><br /><br /><br /><br /><br /><br /><br />
						</div>
					</div>
				</div>

				
			</div>
			
		</div>
	</div>
	<!-- end team -->


	<!-- end footer -->

	<script src="js/jquery.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/numscroller.js"></script>
	<script src="js/lightbox.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show').load('data.php')
			}, 3000);
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show1').load('data1.php')
			}, 3000);
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show2').load('data2.php')
			}, 3000);
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show3').load('data3.php')
			}, 3000);
		});
	</script>

</body>
</html>