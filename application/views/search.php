<?php
	if($this -> session -> userdata('id') == "" ){
   redirect("site/restricted");
}

$this -> load -> model("model_users");

?>

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
		$gav = "";
		
			
			if(isset($_POST['submit']))
			{
				$value=$_POST['sel'];
				
				$query2 = "SELECT * FROM products WHERE product_name='$value'";
				$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
				while($row=mysql_fetch_array($result2))
				{
					
					echo "ID: ".$row['product_id']."<br/>";
					echo "title: ".$row['product_name']."<br/>";
					echo "manufacturer: ".$row['product_code']."<br/>";
					echo "price : ".$row['product_price']."<br/>";
					
					$gav = $row['product_id'];
				
				}
				
			}
			
			
			$user_id = $this -> model_users -> get_userID($this -> input -> post('email'));

			$lovely = array("id" => $user_id, "email" => $this -> input -> post("email"),'product' => $gav, "user" => "TRUE", "is_logged_in" => 1);

			$this -> session -> set_userdata($lovely);
	
			?>
			<br>
			<br>
			<?php  echo form_label("View Comments and reviews");    ?>
			<br>
			<?php
			$query1 = "SELECT * FROM review WHERE product_id='$gav'";
				$result3=mysql_query($query1);
				while($rowes=mysql_fetch_array($result3))
				{
					echo "Rating out of 5: ".$rowes['Rating']."<br/>";
					echo "Review: ".$rowes['Review']."<br/>";
					

				
				}
				
			
			
			
			?>
			
			<br>
			<br>
			<br>
			<br>
			

     <?php	echo form_label("Post a comment");
			echo validation_errors();
		 echo form_open('reviewController/error');?>
		
		
	<fieldset><legend>Review This Product</legend>	
    <p><label for="Rating">Rating</label><input type="radio" name="Rating"
      value="5" /> 5 <input type="radio" name="Rating" value="4" /> 4
      <input type="radio" name="Rating" value="3" /> 3 <input type="radio"
      name="Rating" value="2" /> 2 <input type="radio" name="Rating" value="1" /> 1</p>	

		<?php (array('id' => 'Rating', 'name' => 'Rating')); ?>
		
		
		
		
		<?php echo form_label('Please write a review:'); ?>
		<?php echo form_error('Review'); ?>
		<?php echo form_textarea(array('id' => 'Review', 'name' => 'Review')); ?>
		
	
		<input type="submit" value="Post comment">
		
		
		