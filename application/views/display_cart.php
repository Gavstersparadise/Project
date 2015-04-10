<?php

	if($this -> session -> userdata('id') == "" || !($this -> session -> userdata('user') == "TRUE") ){
		
}
echo $this -> session -> userdata('id');
?>


<?php echo anchor('cust/user_details', 'Proceed to checkout') ; ?>
<?php echo form_open('shop/update_cart'); ?>

<table cellpadding="6" cellspacing="1" style="width:50%" border="1">

  <tr>
    <th>Quantity</th>
    <th>Description</th>
    <th>Item Price</th>
    <th>Sub-Total</th>
  </tr>

  <?php $i = 1; ?>

  <?php foreach ($this->cart->contents() as $items): ?>

    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

    <tr>
      <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
      <td>
        <?php echo $items['name']; ?>

        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

          <p>
            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

              <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br/>

            <?php endforeach; ?>
          </p>

        <?php endif; ?>

      </td>
      <td><?php echo $this->cart->format_number($items['price']); ?></td>
      <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
    </tr>
	<?php			


?>
    <?php $i++; ?>

  <?php endforeach; ?>

  <tr>
    <td colspan="2"> </td>
    <td><strong>Total</strong></td>
    <td>$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
	<?php
	$user = $this -> session -> userdata('id');
	$total =  $items['subtotal'];
	//loyalty buys
	$query2 = "
select c.user_id, count(*) as number 
from customer c
left join orders a on c.user_id = a.cust_id 
where `user_id` = '$user';
";
				$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
				while($row=mysql_fetch_array($result2))
				{
					
					echo "number: ".$row['number']."<br/>";
							
					$lovely = $row['number'];
					if($lovely > 2){
	                $total =  $items['subtotal'] * 0.95;
					echo "Thanks for your loyalty heres a discount your new price is  ";
				}
				}
	
	
	echo $total;
	
	?>
  </tr>

</table>

<p><?php echo form_submit('', 'Update Cart'); ?></p>
<?php echo form_close() ; ?>


<?php echo form_open('shop/index') ; ?>
  <select name="cat">
    <?php foreach ($cat_query->result() as $cat_row) : ?>
       <option value="<?php echo $cat_row->cat_id;?>"><?php echo $cat_row->cat_name;?></option>
    <?php endforeach ; ?>
 </select>
<?php echo form_submit('', 'Search') ; ?>
    <?php echo form_close() ; ?>