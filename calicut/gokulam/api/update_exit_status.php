<?php
/* include db.config.php */
// include_once('db_config.php');
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$id = $_POST["id"];
$two_wheeler_slot = $_POST["two_wheeler_slot"];
$four_wheeler_slot = $_POST["four_wheeler_slot"];

$query = "UPDATE details_transaction SET status='1'";
$update = mysqli_query($con,$query);

if($update){
$data = array("result" => 1, "message" => "Successfully status updated!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>
<?php
/* code to send sms to client*/

 
$url="http://alerts.sinfini.com/api/web2sms.php?workingkey=A33d84f2a3c4d610f3a12932a1c3a01f6&sender=CAMPUS&to=9019505844,7019779635&message=Test;
&dlr_url=http://www.orangerich.in/pricing.php&msgid=XX";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output=curl_exec($ch);
curl_close($ch);                                
//return $output;

/* code to send sms to client ends here*/


?>

<?php 
require '/home/admiss321/public_html/public_html/letspark.in/PHPMailer_v5.1/class.phpmailer.php';
$name=$_POST["name"];
$phone_no=$_POST['mobile'];


$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'localhost';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@letspark.in';                            // SMTP username
$mail->Password = 'info12345';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'info@letspark.in';
$mail->FromName = 'CSC';
//$mail->addAddress('bd@campusville.in');    
$mail->addAddress('nimeshdm23@gmail.com');  
$mail->addAddress('jaffarmohammedc@gmail.com');  
$mail->addAddress('it@campusville.in');                // Name is optional
//$mail->addCC('it@campusville.in');





$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Letspark';
$mail->Body   = '<tr bgcolor="#eeffee"><td>Student Name</td><td>'.print_r($_POST['student_name'],true).'</td></tr>'.'<tr bgcolor="#eeffee"><td>Student Housing</td><td>'.print_r($_POST['hostel_name'],true).'</td></tr>'.'<tr bgcolor="#eeffee"><td>Room No</td><td>'.print_r($_POST['room_no'],true).'</td></tr>'.'<tr bgcolor="#eeffee"><td>Mobile No</td><td>'.print_r($_POST['mobile'],true).'</td></tr>'
.'<tr bgcolor="#eeffee"><td>Date</td><td>'.print_r($_POST['date'],true).'</td></tr>';



if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

?>