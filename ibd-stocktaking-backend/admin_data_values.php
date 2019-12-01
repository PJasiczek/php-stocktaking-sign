<?php
include 'dbconfig.php';
 
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$username = $obj['username'];
$password = $obj['password'];

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "SELECT * FROM admins WHERE username='$username' AND password='$password';";
 
$result = $conn->query($sql);
 
if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>