<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');

//umieszczenie otrzymanego JSONa do utworzonego obiektu
$obj = json_decode($json,true);

$event_code = $obj['event_code'];

$Sql_Query = "DELETE FROM events WHERE event_code='$event_code';";

if(mysqli_query($con,$Sql_Query)){

	$MSG = 'Nastąpiło poprawne usunięcie wydarzenia' ;

	$json = json_encode($MSG);

	echo $json ;
} else{
	echo 'Spóbuj ponownie';
}

 mysqli_close($con);
?>
