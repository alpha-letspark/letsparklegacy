<?php 


$servername = 'database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com';
$username = "admin";
$password = "letspark123321";
$dbname = "gokulam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email FROM cms_users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();


?>