<?php
include 'dbconfig.php';
 
$con = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$user_id = $obj['user_id'];
$event_id = $obj['event_id'];
$CheckSQL = "SELECT * FROM usersevents WHERE user_id='$user_id' AND event_id='$event_id'";

$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

if(isset($check)){

		$SuccessMsg = 'false';
 
		$SuccessMsgJson = json_encode($SuccessMsg);
 
		echo $SuccessMsgJson ; 

} else {

	$Sql_Query = "INSERT INTO usersevents (user_id, event_id) VALUES ('$user_id','$event_id')";

	if(mysqli_query($con,$Sql_Query)){
		$SuccessMsg = 'true';
 
		$SuccessMsgJson = json_encode($SuccessMsg);
 
		echo $SuccessMsgJson ; 
	 } else{
		$SuccessMsg = 'false';
 
		$SuccessMsgJson = json_encode($SuccessMsg);
 
		echo $SuccessMsgJson ; 
	 }
}
 
 mysqli_close($con);
?>