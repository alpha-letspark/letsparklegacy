<?php 
$transaction_id = 1588584759504;
$conn = new mysqli('localhost', 'root', 'letspark123321', 'valet');
if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}
$result = $conn->query("SELECT status FROM transactions where transaction_id = '$transaction_id' ");
//$result = $conn->query("SELECT status FROM transactions where (CASE WHEN status = '1' THEN 'Completed'  WHEN status = '2' THEN 'Request Accepted'  WHEN status = '3' THEN 'Request Pending' END ) as type  where transaction_id = '$transaction_id' ");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo $row['status'] . '<br>';
	}
}
?>
