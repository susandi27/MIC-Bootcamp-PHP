<?php
	$servername="localhost";
	$dbname="onlineshop";
	$user="root";
	$password="";

	$dsn="mysql:host=$servername; dbname=$dbname";

	$pdo=new PDO($dsn, $user, $password);

	try{
		$conn =$pdo;

		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "Connected Successfully";

	}catch(PDOException $e){
		echo "Connection failed ".$e->getMessage();
	}

?>