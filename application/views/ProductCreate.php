
						
						<?php echo form_open('ProductController/error'); ?>
						
						<?php echo form_label('INDICATE Product Title :'); ?>
					<?php echo form_error('product_name'); ?>
					<?php echo form_textarea(array('id' => 'product_name', 'name' => 'product_name')); ?>
					<br />
					
					<?php echo form_label(' product_code :'); ?>
					<?php echo form_error('product_code'); ?>
					<?php echo form_textarea(array('id' => 'product_code', 'name' => 'product_code')); ?>
					<br />
					<?php echo form_label('INDICATE product_description :'); ?>
					<?php echo form_error('product_description'); ?>
					<?php echo form_textarea(array('id' => 'product_description', 'name' => 'product_description')); ?>
		<br />
		
		         
				<?php echo form_error('category_id'); ?>
					<?php echo form_label('SELECT category:'); ?>
				<select name="category_id">
					<option value="none" selected="selected">------------Select category-----------</option>

					<?php $sql = "select cat_id	, cat_name from categories ";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {

		echo "<option value = '" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";

		array('id' => 'category', 'value' => 'category');

	}
	echo "</select>";
					?>
					
<br />
	<?php echo form_label('INDICATE product_price :'); ?>
					<?php echo form_error('product_price'); ?>
					<?php echo form_textarea(array('id' => 'product_price', 'name' => 'product_price')); ?>
		<br />
						
					<input type="submit" value="CREATE Product" >
					</form>
						
				</div style>