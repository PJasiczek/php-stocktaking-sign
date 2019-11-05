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

$CheckSQL = "SELECT * FROM event WHERE name='$name'";

$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

$Sql_Query = "UPDATE event SET type='$type', date='$date', start_time='$start_time', end_time='$end_time', address='$address', city='$city', hour_price='$hour_price', free_places_count='$free_places_count', places_count='$places_count' WHERE name='$name';";

if(mysqli_query($con,$Sql_Query)){

	$MSG = 'Nastąpiła poprawna modyfikacja wydarzenia' ;

	//Konwersja wiadomości do JSONa
	$json = json_encode($MSG);

	echo $json ;
} else{
	echo 'Spóbuj ponownie';
}

 mysqli_close($con);
?>
