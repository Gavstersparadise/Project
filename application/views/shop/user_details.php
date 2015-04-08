<body>
    <?php echo validation_errors(); ?>
    <?php echo form_open('/cust/user_details') ; ?>
        <?php echo form_input(array('name' => 'cust_first_name', 'placeholder' => 'First Name', 'maxlength' => '125', 'size' => '50')); ?><br />
        <?php echo form_input(array('name' => 'cust_last_name', 'placeholder' => 'Last Name', 'maxlength' => '125', 'size' => '50')); ?><br />
        <?php echo form_input(array('name' => 'email', 'placeholder' => 'Email Address', 'maxlength' => '255', 'size' => '50')); ?><br />
        <?php echo form_input(array('name' => 'email_confirm', 'placeholder' => 'Confirm Email', 'maxlength' => '255', 'size' => '50')); ?><br />
        <?php echo form_textarea(array('name' => 'payment_address', 'placeholder' => 'Payment Address', 'rows' => '6', 'cols' => '40', 'size' => '50')); ?><br />
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="EYEHUNCPAYVBE">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
					
        <?php echo form_close() ; ?>
    </form>
</body>