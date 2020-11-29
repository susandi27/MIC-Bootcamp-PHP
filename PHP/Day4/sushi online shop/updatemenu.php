<?php
	$name = $_POST['name'];
	$price = $_POST['price'];

	$id = $_POST['id'];
	$oldphoto = $_POST['oldphoto']; //old photo

	$newphoto = $_FILES['newphoto']; //new photo


	if($newphoto['size'] > 0 ){ //if user update photo

		//upload file
		$basepath = 'photo/';
		$fullpath = $basepath.$newphoto['name']; // photo/IMG_4332 (1).jpg
		move_uploaded_file($newphoto['tmp_name'], $fullpath);
	}
	else{
		$fullpath	= $oldphoto;
	}

	$menu = array(
		"name"		=>	$name,
		"price"		=>	$price,
		"profile"	=>	$fullpath
	);

	// get jsonData From menulist.json file

	$jsonData = file_get_contents('menulist.json');

	//checking connection
	if (!$jsonData) {
		$jsonData = '[]';
	}


	// convert into array from json

	$data_arr = json_decode($jsonData,true);

	//if data is exit (push in addstudent.php)
	$data_arr[$id]=$menu;


	$jsonData = json_encode($data_arr, JSON_PRETTY_PRINT);

	file_put_contents('menulist.json', $jsonData);

	header('location: index.php');
?>