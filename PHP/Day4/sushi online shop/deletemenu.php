<?php
	$id = $_POST['sid'];
	//var_dump($id);

	$menulist=file_get_contents('menulist.json');

	$menulist_array =json_decode($menulist,true);

	//delete data
	unset($menulist_array[$id]);
	//var_dump($menulist_array);die*();
	
	$jsonData = json_encode($menulist_array,JSON_PRETTY_PRINT);

	file_put_contents('menulist.json', $jsonData);
?>