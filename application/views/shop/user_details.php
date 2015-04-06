<body>
    <?php echo validation_errors(); ?>
    <?php echo form_open('/cust/user_details') ; ?>
        <?php echo form_input(array('name' => 'cust_first_name', 'placeholder' => 'First Name', 'maxlength' => '125', 'size' => '50')); ?><br />
        <?php echo form_input(array('name' => 'cust_last_name', 'placeholder' => 'Last Name', 'maxlength' => '125', 'size' => '50')); ?><br />
        <?php echo form_input(array('name' => 'email', 'placeholder' => 'Email Address', 'maxlength' => '255', 'size' => '50')); ?><br />
        <?php echo form_input(array('name' => 'email_confirm', 'placeholder' => 'Confirm Email', 'maxlength' => '255', 'size' => '50')); ?><br />
        <?php echo form_textarea(array('name' => 'payment_address', 'placeholder' => 'Payment Address', 'rows' => '6', 'cols' => '40', 'size' => '50')); ?><br />
        <?php echo form_submit('', 'Enter') ; ?><br />
        <?php echo form_close() ; ?>
    </form>
</body>