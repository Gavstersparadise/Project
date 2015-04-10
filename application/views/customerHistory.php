<?php
			
			$query = "SELECT * FROM user";
			$result=mysql_query($query) or die("Query Failed : ".mysql_error());
			$i=0;
			while($rows=mysql_fetch_array($result))
			{
				$roll[$i]=$rows['id'];
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
		
			
			if(isset($_POST['submit']))
			{
				$value=$_POST['sel'];
				
				$query2 = "
select a.*,  c.user_id
from customer c
left join orders a on c.user_id = a.cust_id 
where `user_id` = '$value';
";
				$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
				while($row=mysql_fetch_array($result2))
				{
					
					echo "order_details: ".$row['order_details']."<br/>";
				
					
				
				
				}
				
			}
			