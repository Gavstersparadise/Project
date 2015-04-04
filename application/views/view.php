<?php

$mysql_db=mysql_select_db("products");
$query = "SELECT * FROM products";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
while($rows=mysql_fetch_array($result))
{
	echo "title: ".$rows['title']."<br/>";
	echo "manufacturer: ".$rows['manufacturer']."<br/>";
	echo "price: ".$rows['price']."<br/>";
	echo "category_id: ".$rows['category_id']."<br/>";
	echo "<br/>";
}
?>
