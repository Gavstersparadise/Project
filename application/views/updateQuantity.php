<?php
class QuantityUpdate
{
   
	

private  $product_id;
private  $amount;


    public function __construct($product_id, $amount)
    {
        $this->$product_id = $product_id;
        $this->$amount = $amount;
	
       
    }
	


  
	public function getamount()
    {
        return $this->amount;
    }
}

class quantityFactory
{
    public static function create($product_id, $amount)
    {
        return new QuantityUpdate($product_id, $amount);
    }
}



			
			$query = "SELECT * FROM products";
			$result=mysql_query($query) or die("Query Failed : ".mysql_error());
			$i=0;
			while($rows=mysql_fetch_array($result))
			{
				$roll[$i]=$rows['product_id'];
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
		$gav = "";
		$number = 100;
			
			if(isset($_POST['submit']))
			{
				$value=$_POST['sel'];
				// have the factory create the apple object
$veyron = quantityFactory::create($value,$number);





$sql = "INSERT INTO quantity (product_id, amount)
VALUES ('$value','$number')";
$this -> db -> query($sql);

echo "success";
				
			}
			


