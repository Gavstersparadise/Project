

		<div style="width:600px;margin-left:auto;margin-right:auto;text-align:center;border:#333 1px solid;
	  margin-bottom: 20px;
    padding: 30px 15px;
    background: #fff;
    background: rgba(255,255,255,0.9);
			">				
<?php echo form_open('categoryController/error'); ?>
						<?php echo form_label('Category Name :'); ?>
					<?php echo form_error('name'); ?>
					<?php echo form_textarea(array('id' => 'name', 'name' => 'name')); ?>

			
						<?php echo form_label('SUBJECT DESCRIPTION:'); ?>
					<?php echo form_error('info'); ?>
					<?php echo form_textarea(array('id' => 'info', 'name' => 'info')); ?>
					

					
					
					<input type="submit" value="CREATE Category" class="btn btn-info btn-block">
					
		</div style>
	</body>

</html>


				
 	
			
					