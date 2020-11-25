 <?php
 	echo "Hello World";

 	echo "<br>";
 	echo '<br>';

	var_dump("hello world");
	echo "<br>";

	$name="aa";
	echo $name."<br>";
	echo "string";

	echo "$name <br>";
	echo '$name <br>';

	$name1=" ko ko ";
	var_dump($name1);

	$trim_name1=trim($name1);
	echo "<br>";
	var_dump($trim_name1);

	echo strlen($name1)."<br>";
	echo strlen($trim_name1)."<br>";

	echo strcasecmp("Hello World","hello world")."<br>";
	echo strcasecmp("Hello World","hello")."<br>";
	echo strcasecmp("HELLO","hello world")."<br>";



	echo strtolower("HELLO WORLD")."<br>";
	echo strtoupper("hello world")."<br>";
	echo substr("Hello World",6)."<br>";
	echo substr("Hello World",-2)."<br>";

	echo str_replace("World", "Bootcamper","Hello World")."<br>";
?>