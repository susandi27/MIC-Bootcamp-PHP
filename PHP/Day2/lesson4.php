<?php
	echo "<h1>For</h1>";

	for ($i=1; $i < 20; $i++) { 
		echo "Batch: $i <br>";
	}

	echo "<hr>";

	echo "<h1>While</h1>";
	$a=5;
	while ($a<= 10) {
		echo "Student: $a <br>";
		$a++;
	}

	echo "<h1>";
	echo "<h1>Do while</h1>";

	$b=1;
	do{
		echo "Student: $b <br>";
		$b++;
	}
	while($b<=5);

	echo "<h1>Foreach</h1>";
	$fruits=array("apple","orange","grape","pineapple");
	foreach ($fruits as $fruit) {
		echo "$fruit <br>";
	}
?>