<?php
	require 'db_connect.php';

	$id = $_GET['id'];
	if($-GET['status']==0){
		$status = 'Confirm';
	}else{
		$status = 'Delete';
	}
	
	$sql = "UPDATE orders SET status=:value1 WHERE id=:value2";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $status);
	$stmt->bindParam(':value2',$id);
	$stmt->execute();
	

	/*var_dump($id);
	var_dump($status);*/


?>