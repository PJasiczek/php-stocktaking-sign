<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');

//umieszczenie otrzymanego JSONa do utworzonego obiektu
$obj = json_decode($json,true);

$email = $obj['email'];
$password = $obj['password'];
$address = $obj['address'];
$telephone_number = $obj['telephone_number'];
$bank_account_number = $obj['bank_account_number'];

$CheckSQL = "SELECT * FROM users WHERE email='$email'";

$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

if($password != NULL && $address != NULL && $telephone_number != NULL && $bank_account_number != NULL) {

	$Sql_Query = "UPDATE users SET password='$password', email='$email', telephone_number='$telephone_number', bank_account_number='$bank_account_number' WHERE email='$email';";

	if(mysqli_query($con,$Sql_Query)){

		$MSG = 'Nastąpiło poprawna modyfikacja konta' ;

		//Konwersja wiadomości do JSONa
		$json = json_encode($MSG);

		echo $json ;
	 } else{
		echo 'Spóbuj ponownie';
	 }
 
 } else if($email == NULL) {
	 
	$ReturnJsonMSG = 'Proszę wpisać poprawny adres skrzynki pocztowej';
	
	//Konwersja wiadomości do JSONa
	$ReturnJson = json_encode($ReturnJsonMSG);

	echo $ReturnJson ;
 } else if($password == NULL) {
	 
	$ReturnJsonMSG = 'Proszę wpisać poprawne hasło';
	
	//Konwersja wiadomości do JSONa
	$ReturnJson = json_encode($ReturnJsonMSG);

	echo $ReturnJson ;
 } else if($telephone_number == NULL) {
	 
	$ReturnJsonMSG = 'Proszę wpisać poprawną numer telefonu';
	
	//Konwersja wiadomości do JSONa
	$ReturnJson = json_encode($ReturnJsonMSG);

	echo $ReturnJson ;
 } else if($bank_account_number == NULL) {
	 
	$ReturnJsonMSG = 'Proszę wpisać numner konta bankowego';
	
	//Konwersja wiadomości do JSONa
	$ReturnJson = json_encode($ReturnJsonMSG);

	echo $ReturnJson ;
 } 
 
 mysqli_close($con);
?>
