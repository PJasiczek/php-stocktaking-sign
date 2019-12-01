<?php
include 'dbconfig.php';
 
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$email = $obj['email'];

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "SELECT users.user_id, users.email, users.password, users.first_name, users.last_name, users.sex, users.date_of_birth, users.telephone_number, users.bank_account_number, users.balance, users.is_pregnant, addresses.address_id, addresses.street_name, addresses.house_number, addresses.apartment_number, cities.city_id, cities.city_name
FROM addresses, cities, users
WHERE addresses.address_id=users.address_id AND cities.city_id=addresses.city_id AND users.email='$email'";
 
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