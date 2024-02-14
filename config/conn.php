<?php 

$conn = new mysqli('localhost','root','','bcaquiz');

if($conn->connect_error){
	//echo "Error connecting database";
	die("Connection failed: " . $conn->connect_error);
 } 
 else{
	// echo "database connected<br>";
}

 ?>