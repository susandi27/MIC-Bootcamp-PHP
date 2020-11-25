<?php
	echo "<h1>Exercise 2</h1>";
	echo "<table border=1 cellspacing=0 cellpadding='20'>";
	for ($i=1; $i <= 10; $i++) {
		echo "<tr>"; 
		for ($j=1; $j <= 10; $j++) { 
			if(($i+$j)%2==0){
				echo "<td style='background-color:black;'></td>";
			}else{
			echo "<td></td>";
			}
		}
		echo "</tr>";
	}	
	echo "</table>";
?>