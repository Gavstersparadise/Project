
						
						<?php echo form_open('ProductController/error'); ?>
						
						<?php echo form_label('INDICATE Product Title :'); ?>
					<?php echo form_error('title'); ?>
					<?php echo form_textarea(array('id' => 'title', 'name' => 'title')); ?>
					<br />
					
					<?php echo form_label(' manufacturer :'); ?>
					<?php echo form_error('manufacturer'); ?>
					<?php echo form_textarea(array('id' => 'manufacturer', 'name' => 'manufacturer')); ?>
					<br />
					<?php echo form_label('INDICATE price :'); ?>
					<?php echo form_error('price'); ?>
					<?php echo form_textarea(array('id' => 'price', 'name' => 'price')); ?>
		<br />
		
		         
				<?php echo form_error('category_id'); ?>
					<?php echo form_label('SELECT category:'); ?>
				<select name="category_id">
					<option value="none" selected="selected">------------Select category-----------</option>

					<?php $sql = "select id	, name from category ";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {

		echo "<option value = '" . $row['id'] . "'>" . $row['name'] . "</option>";

		array('id' => 'category', 'value' => 'category');

	}
	echo "</select>";
					?>
					
<br />
	
						
					<input type="submit" value="CREATE SUBJECT" class="btn btn-info btn-block">
					</form>
						
				</div style>