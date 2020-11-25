<?php
	$citys=array(
	"New York"=> ["NY",8175133],
	"Los Angeles" => ["CA",3792621],
 	"Chicago" => ["IL",2695598],
	"Houston"=> ["TX",2100263], 
	"Philadelphia" => ["PA",1526006],
	"Phoenix" => ["AZ",1445632], 
	"San Antonio" => ["TX",1327407], 
	"San Diego" => ["CA",1307402], 
	"Dallas" => ["TX",1197816], 
	"San Jose" => ["CA",945942]);


	echo "<h1>Exercise 3 (location and Population)</h1>";
	echo "<table border=1 cellspacing=0 cellpadding=10>";
	echo "<tr>";
	echo "<th colspan=2>Location</th>";
	echo "<th>Population </th>";
	echo "</tr>";
	echo "<tr>";
	$total=0;
	$keys = array_keys($citys);
	for($i = 0; $i < count($citys); $i++) {
    echo "<td>$keys[$i]</td>";
    foreach($citys[$keys[$i]] as $key) {
        echo "<td>".$key."</td>";
        $total+=intval($key);
    }
   	echo "</tr>";
	}
	echo "<tr>";
	echo "<td colspan=2>Total</td>";
    echo "<td>".$total."</td>";
    echo "</tr>";
	echo "</table>";
?>