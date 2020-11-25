<?php
	echo "<h1>Array Key Exists</h1>";

	$meals = array(
		"Walnut Bun" => 1,
		"Cashew Nuts abd white"=> 4.95,
		"Dried Mulberries"=>6.50,
		"Shrimp Puffs"=>22
	);

	//key
	if(array_key_exists('Shrimp Puffs',$meals)){
		echo "Yes";
	}else{
		echo "No";
	}

	echo "<br><hr>";
	if(array_key_exists('6.50', $meals)){
		echo "Yes";
	}else{
		echo "No";
	}


	echo "<br><hr>";

	//key and value
	echo "<h1>in_array</h1>";
	if(array_key_exists('Shrimp Puffs',$meals)){
		echo "Yes";
	}else{
		echo "No";
	}

	echo "<br><hr>";
	if(in_array('6.50', $meals)){
		echo "Yes";
	}else{
		echo "No";
	}


	echo "<h1>Unset</h1>";
	$results=array (50,60,70,80,89);

	foreach ($results as $result) {
		echo $result."<br>";
	}

	echo "<hr>";
	unset($results[2]);
	foreach ($results as $result) {
		echo $result."<br>";
	}

	echo "<h1>Implode</h1>";

	$flowers = array ('Rose','Jasmin','Orchid');

	$string_flower = implode(',',$flowers);

	echo "$string_flower";//array to string

	echo "<h1>Explode</h1>";
	$pets='Dog,Cat,fish'; //string

	$arr_pets=explode(",",$pets);

	foreach ($arr_pets as $arr_pet) {
		echo $arr_pet."<br>";
	}
?>