<?php
	// Get the values from form
	$firstName = $_POST["first_name"];
	$lastName = $_POST["last_name"];
	$Address = $_POST["address"];
	$Age = $_POST["age"];
		echo $firstName." ".$lastName." ".$Address." ".$Age;
	// Prepare variables for db-connection
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "admin";

	//Create connection
	$conn = new mysqli($serverName,$userName,$password,$dbName);
	//Check connection
	if($conn->connect_error){
		die("Connect failed".$conn->connect_error);
	}

	//Prepare and bind statement
	$stmt = $conn->prepare("INSERT INTO clujschool (firstname, lastname, address, age) VALUES (?,?,?,?)");
	$stmt->bind_param("sssi",$firstName, $lastName, $Address, $Age);
	//ii spunem sa execute
	$stmt->execute();
	// ii spunem sa le inchida
	mysqli_stmt_close($stmt);
	mysqli_close();
	header('location:students.php');
?>