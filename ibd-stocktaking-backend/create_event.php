<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');

//umieszczenie otrzymanego JSONa do utworzonego obiektu
$obj = json_decode($json,true);

$name = $obj['name'];
$type = $obj['type'];
$date = $obj['date'];
$start_time = $obj['start_time'];
$end_time = $obj['end_time'];
$address = $obj['address'];
$city = $obj['city'];
$hour_price = $obj['hour_price'];
$free_places_count = $obj['free_places_count'];
$places_count = $obj['places_count'];


$Sql_Query = "INSERT INTO event (name, type, date, start_time, end_time, address, city, hour_price, free_places_count, places_count) VALUES ('$name','$type','$date','$start_time','$end_time','$address','$city','$hour_price','$free_places_count','$places_count')";

if(mysqli_query($con,$Sql_Query)){

	$MSG = 'Pomyślnie zapisano wydarzenie w systemie' ;

	//Konwersja wiadomości do JSONa
	$json = json_encode($MSG);

	echo $json ;
 } else{
	echo 'Spóbuj ponownie';
 }
 
 mysqli_close($con);
?>
