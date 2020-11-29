<?php 
	
	$name = $_POST['sname'];
	$price = $_POST['price'];

	$profile = $_FILES['profile'];

	// upload File
	$basepath = 'photo/';
	$fullpath = $basepath.$profile['name']; 
	move_uploaded_file($profile['tmp_name'], $fullpath);


	$menu = array(
		"name"		=>	$name,
		"price"		=>	$price,
		"profile"	=>	$fullpath
	);

	
	// get jsonData From studentlist.json file

	$jsonData = file_get_contents('menulist.json');

	if (!$jsonData) {
		$jsonData = '[]';
	}


	// convert into array from json

	$data_arr = json_decode($jsonData,true);

	array_push($data_arr, $menu);


	$jsonData = json_encode($data_arr, JSON_PRETTY_PRINT);

	file_put_contents('menulist.json', $jsonData);

	header('location: index.php');

?>