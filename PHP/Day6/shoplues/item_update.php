<?php
	require 'db_connect.php';

	$id=$_POST['id'];
	$name=$_POST['name'];
	$codeno = $_POST['codeno'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$description = $_POST['description'];
	$subcategory_id = $_POST['sid'];
	$brand_id = $_POST['bid'];
	$oldphoto=$_POST['oldphoto'];
	$newphoto=$_FILES['photo'];
	
	if($newphoto['size'] > 0){
		//upload file
		$basepath = 'image/brand/';
		$fullpath = $basepath.$newphoto['name'];
		move_uploaded_file($newphoto['tmp_name'], $fullpath);

	}else{
		$fullpath = $oldphoto;
	}
	$sql = "UPDATE items SET name=:value1, photo=:value2,codeno=:value3,price=:value4, discount=:value5, description=:value6,  brand_id=:value7, subcategory_id=:value8 WHERE id =:value9";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1',$name);
	$stmt->bindParam(':value2',$fullpath);
	$stmt->bindParam(':value3',$codeno);
	$stmt->bindParam(':value4',$price);
	$stmt->bindParam(':value5',$discount);
	$stmt->bindParam(':value6',$description);
	$stmt->bindParam(':value7',$brand_id);
	$stmt->bindParam(':value8',$subcategory_id);
	$stmt->bindParam(':value9',$id);

	$stmt->execute();

	header("location: item_list.php");

?>