<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];

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

	$student = array(
		"name"		=>	$name,
		"email"		=>	$email,
		"gender"	=>	$gender,
		"address"	=>	$address,
		"profile"	=>	$fullpath
	);

	// get jsonData From studentlist.json file

	$jsonData = file_get_contents('studentlist.json');

	//checking connection
	if (!$jsonData) {
		$jsonData = '[]';
	}


	// convert into array from json

	$data_arr = json_decode($jsonData,true);

	//if data is exit (push in addstudent.php)
	$data_arr[$id]=$student;


	$jsonData = json_encode($data_arr, JSON_PRETTY_PRINT);

	file_put_contents('studentlist.json', $jsonData);

	header('location: index.php');
?>