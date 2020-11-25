<?php
	echo "<h1>Function</h1>";

	function showName(){
		echo "Su Su";
	}
	showName();

	//------------------------
	echo "<h1>Argument</h1>";
	function showfirstName($n){
		echo $n;
	}
	$value1="Su Sandi";
	showfirstName($value1);

	echo "<br>";
	//---------------------------------

	function showfullName($one,$two){
		echo $one." ".$two;
	}

	$firstName="Su";
	$lastName="Sandi";
	showfullName($firstName,$lastName);
	echo '<br>';

	//---------------------------------
	function sum($v1,$v2){
		$v3=$v1+$v2;
	
	echo "First Number:".$v1;
	echo 'Second Number:'.$v2;
	echo "Result:".$v3;
	}

	sum(4,5);
	//---------------------------------
	echo "<h1>Array Argument</h1>";

	$studentOne=array(
		'Myanmar' => 60,
		'English' => 70,
		'Maths'	=> 99,
		'Chemistry' => 90,
		'Physics' => 99,
		'Bio' => 80);

	$studentname= "Ko Ko";

	function showResult($value,$value2){

		$name=$value2;
		//var_dmap($value['Maths']);
		$mark1= $value['Myanmar'];
		$mark2= $value['English'];
		$mark3= $value['Maths'];
		$mark4= $value['Chemistry'];
		$mark5= $value['Physics'];
		$mark6= $value['Bio'];

		$total = $mark1 + $mark2 + $mark3 + $mark4 + $mark4 + $mark5 + $mark6;

		echo "<h3>$name</h3>";
		echo "Myanmar => ".$mark1."<br>";
		echo "English => ".$mark2."<br>";
		echo "Maths => ".$mark3."<br>";
		echo "Chemistry => ".$mark4."<br>";
		echo "Physics => ".$mark5."<br>";
		echo "Bio => ".$mark6."<br>";
		
		echo "Total => ".$total." marks <br>";

	}
	showResult($studentOne,$studentname);
?>