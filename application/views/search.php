<html>
<body>
<?php

$query = "SELECT * FROM products";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$roll[$i]=$rows['title'];
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

$query2 = "SELECT * FROM products WHERE title='$value'";
$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
while($row=mysql_fetch_array($result2))
{
	echo "title: ".$row['title']."<br/>";
	echo "manufacturer: ".$row['manufacturer']."<br/>";
	echo "price : ".$row['price']."<br/>";
	echo "category_id: ".$row['category_id'];
}

}
?>

