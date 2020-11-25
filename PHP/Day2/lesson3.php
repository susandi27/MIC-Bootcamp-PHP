<?php
	echo "<h1>If statement </h1>";

	$result = 90;
	if($result > 80){
		echo "Your mark is 90";
	}

	echo "<hr>";

	echo "<h1>If......Elese statement</h1>";

	$gender='Female';
	if($gender=='Female'){
		echo "This is a girl";
	}
	else{
		echo "This is a boy";
	}

	echo "<hr>";
	echo " <h1>If....Elseif.....elseif.....else</h1>";

	$mark=49;
	if ($mark >80){
		echo "Excellent";
	}
	elseif($mark<80){
		echo "Very good";
	}
	elseif($mark == 40){
		echo "Pass";
	}
	elseif ($mark < 40){
		echo "Fail";
	}
	else{
		echo "Your Mark is: $mark";
	}

	echo "<hr>";

	echo "<h1>Switch</h1>";
	switch ($mark) {
		case '$mark < 80':
			echo "Excellent";
			break;

		case '$mark == 80':
			echo "Very Good";
			break;

		case '$mark >= 40':
			echo "Pass";
			break;

		case '$mark < 40':
			echo "Fail";
			break;
		
		default:
			echo "Your mark is : $mark";
			break;
	}
?>