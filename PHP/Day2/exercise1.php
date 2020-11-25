<?php
	$humbager	=	4.95 *2;
	$milkshake	=	1.95;
	$cola		=	85 * 0.01;
	
	/*echo "<h1>Exercise 1</h1> <br>";
	
	
	
	echo "Tax-tip is $tax_tip <br>";
	
	echo "Total Cost is $total_cost dollars";*/

	echo "<h1>Exercise 1 Restaurant Meal</h1>";
	echo "<table border=1 cellspacing=0 cellpadding=10>";
	echo "<tr>";
	echo "<td>Two Humbager</td>";
	echo "<td>$ $humbager</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Chocolate Milkshake</td>";
	echo "<td>$ $milkshake</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Cola</td>";
	echo "<td>$ $cola</td>";
	echo "</tr>";

	$total		=	$humbager + $milkshake + $cola;
	echo "<tr>";
	echo "<td>Total</td>";
	echo "<td>$ $total</td>";
	echo "</tr>";

	$tax 	= 	($total * 7.5)/100;
	echo "<tr>";
	echo "<td>Tax</td>";
	echo "<td>$ $tax</td>";
	echo "</tr>";

	$tax_tip 	= ($total * 16)/100;
	echo "<tr>";
	echo "<td>Tax tip</td>";
	echo "<td>$ $tax_tip</td>";
	echo "</tr>";

	$total_cost	= $total + $tax + $tax_tip;
	echo "<tr>";
	echo "<td>Total Cost</td>";
	echo "<td>$ $total_cost</td>";
	echo "</tr>";

	echo "</table>";
?>