<?php
	require 'db_connect.php';

	$name = $_POST['name'];
	$photo = $_FILES['photo'];

	/*var_dump($name);
	var_dump($photo);*/

	//upload files
	$basepath = 'image/brand/';
	$fullpath= $basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'],$fullpath);

	$sql = "INSERT INTO brands (name,logo) VALUES (:value1,:value2)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1',$name);
	$stmt->bindParam(':value2',$fullpath);
	$stmt->execute();

	header('location: brand_list.php');

?>