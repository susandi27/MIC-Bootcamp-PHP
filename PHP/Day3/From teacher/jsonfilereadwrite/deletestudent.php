<?php
	$id = $_POST['sid'];
	//var_dump($id);

	$studentlist=file_get_contents('studentlist.json');

	$studentlist_array =json_decode($studentlist,true);

	//delete data
	unset($studentlist_array[$id]);
	//var_dump($studentlist_array);die*();
	
	$jsonData = json_encode($studentlist_array,JSON_PRETTY_PRINT);

	file_put_contents('studentlist.json', $jsonData);
?>