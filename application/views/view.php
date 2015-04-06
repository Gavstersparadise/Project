<?php

$mysql_db=mysql_select_db("products");
$query = "SELECT * FROM products";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
while($rows=mysql_fetch_array($result))
{
	echo "product_name: ".$rows['product_name']."<br/>";
	echo "product_code: ".$rows['product_code']."<br/>";
	echo "product_description: ".$rows['product_description']."<br/>";
	echo "product_price: ".$rows['product_price']."<br/>";
	echo "<br/>";
}
?>
