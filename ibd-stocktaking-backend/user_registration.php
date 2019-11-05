<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');

//umieszczenie otrzymanego JSONa do utworzonego obiektu
$obj = json_decode($json,true);

$email = $obj['email'];
$password = $obj['password'];
$first_name = $obj['first_name'];
$last_name = $obj['last_name'];
$sex = $obj['sex'];
$date_of_birth = $obj['date_of_birth'];
$address = $obj['address'];
$telephone_number = $obj['telephone_number'];
$bank_account_number = $obj['bank_account_number'];

$CheckSQL = "SELECT * FROM users WHERE email='$email'";

$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));


if(isset($check)){

	$ReturnJsonMSG = 'Użytkownik istnieje już w systemie';
	
	//Konwersja wiadomości do JSONa
	$ReturnJson = json_encode($ReturnJsonMSG);

	echo $ReturnJson; 

} else {

	if($email != NULL && $password != NULL && $first_name != NULL && $last_name != NULL && $date_of_birth != "--" && $sex != NULL && $address != NULL && $telephone_number != NULL && $bank_account_number != NULL) {
		
		$Sql_Query = "INSERT INTO users (email, password, first_name, last_name, date_of_birth, sex, address, telephone_number, bank_account_number) VALUES ('$email','$password','$first_name','$last_name','$date_of_birth','$sex','$address','$telephone_number','$bank_account_number')";

		if(mysqli_query($con,$Sql_Query)){

			$MSG = 'Nastąpiło poprawne utworzenie konta' ;

			//Konwersja wiadomości do JSONa
			$json = json_encode($MSG);

			echo $json ;
		 } else{
			echo 'Spóbuj ponownie';
		 }
	 
	 } else if($first_name == NULL) {
		 
		$ReturnJsonMSG = 'Proszę wpisać poprawne imię';
		
		//Konwersja wiadomości do JSONa
		$ReturnJson = json_encode($ReturnJsonMSG);

		echo $ReturnJson ;
	} else if($last_name == NULL) {
		 
		$ReturnJsonMSG = 'Proszę wpisać poprawne nazwisko';
		
		//Konwersja wiadomości do JSONa
		$ReturnJson = json_encode($ReturnJsonMSG);

		echo $ReturnJson ;
	 } else if($password == NULL) {
		 
		$ReturnJsonMSG = 'Proszę wpisać poprawne hasło';
		
		//Konwersja wiadomości do JSONa
		$ReturnJson = json_encode($ReturnJsonMSG);

		echo $ReturnJson ;
	 } else if($email == NULL) {
		 
		$ReturnJsonMSG = 'Proszę wpisać poprawny adres skrzynki pocztowej';
		
		//Konwersja wiadomości do JSONa
		$ReturnJson = json_encode($ReturnJsonMSG);

		echo $ReturnJson ;
	 } else if($date_of_birth == "--") {
		 
		$ReturnJsonMSG = 'Proszę wpisać poprawną datę urodzenia';
		
		//Konwersja wiadomości do JSONa
		$ReturnJson = json_encode($ReturnJsonMSG);

		echo $ReturnJson ;
	 } else if($sex == NULL) {
		 
		$ReturnJsonMSG = 'Proszę wybrać płeć';
		
		//Konwersja wiadomości do JSONa
		$ReturnJson = json_encode($ReturnJsonMSG);

		echo $ReturnJson ;
	 } 
} 
 mysqli_close($con);
?>
