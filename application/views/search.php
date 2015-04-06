<html>
<body>
<?php

$query = "SELECT * FROM products";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$roll[$i]=$rows['product_name'];
$i++;
}
$total_elmt=count($roll);
?>
<form method="POST" action="">
Select products: <select name="sel">
<option>Select</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $roll[$j];
?></option><?php
}
?>
</select>

<input name="submit" type="submit" value="Search"/><br />

</form>

<?php

if(isset($_POST['submit']))
{
$value=$_POST['sel'];

$query2 = "SELECT * FROM products WHERE product_name='$value'";
$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
while($row=mysql_fetch_array($result2))
{
	
	
	echo "title: ".$row['product_name']."<br/>";
	echo "manufacturer: ".$row['product_code']."<br/>";
	echo "price : ".$row['product_price']."<br/>";
	
}

}
?>

