<?php
include 'dbconfig.php';
 
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$user_id = $obj['user_id'];

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "SELECT events.event_id, events.event_code, events.name, events.type, events.date, addresses.address_id, addresses.street_name, addresses.house_number, addresses.apartment_number, cities.city_id, cities.city_name, events.start_time, events.end_time, events.hour_price, events.free_places_count, events.places_count, events.description
FROM addresses, cities, events, usersevents 
WHERE usersevents.event_id=events.event_id AND addresses.address_id=events.address_id AND addresses.city_id=cities.city_id AND usersevents.user_id=$user_id";
 
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