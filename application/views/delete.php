<?php

$query = "SELECT * FROM products";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$name[$i]=$rows['title'];
$i++;
}
$total_elmt=count($name);
?>
<form method="POST" action="">
Select the Name to Delete: <select name="sel">
<option>Select</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $name[$j];
?></option><?php
}
?>
</select><br />

<input name="submit" type="submit" value="Delete"/><br />

</form>
<p align=right><a href="view">VIEW RECORDS</a></p>

<?php

if(isset($_POST['submit']))
{
$name=$_POST['sel'];


$query = "DELETE FROM products WHERE title='$name'";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
echo "Successfully Deleted!";
}


?>