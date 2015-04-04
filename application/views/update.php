<html>
<body>
<?php
$server="localhost";
$username="root";
$password="";
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
Select the Roll No. to Update: <select name="sel">
<option>Select</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $roll[$j];
?></option><?php
}
?>
</select><br />
title: <input name="title" type="text" /><br />
manufacturer: <input name="manufacturer" type="text" /><br />
price: <input name="price" type="text" /><br />
<input name="submit" type="submit" value="Update"/><br />
<input name="reset" type="reset" value="Reset"/>
</form>

<?php

if(isset($_POST['submit']))
{
$value=$_POST['sel'];
$name=$_POST['title'];
$marks=$_POST['manufacturer'];
$course=$_POST['price'];

$query2 = "UPDATE products SET title='$name',manufacturer='$marks',price='$course' WHERE title='$value'";
$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
echo "Successfully Updated";
}
?>
