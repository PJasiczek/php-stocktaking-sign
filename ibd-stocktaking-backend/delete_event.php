<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');

//umieszczenie otrzymanego JSONa do utworzonego obiektu
$obj = json_decode($json,true);

$name = $obj['name'];

$Sql_Query = "DELETE FROM event WHERE name='$name';";

if(mysqli_query($con,$Sql_Query)){

	$MSG = 'Nastąpiło poprawne usunięcie wydarzenia' ;

	//Konwersja wiadomości do JSONa
	$json = json_encode($MSG);

	echo $json ;
} else{
	echo 'Spóbuj ponownie';
}

 mysqli_close($con);
?>
