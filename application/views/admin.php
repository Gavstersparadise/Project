
 	<html>
<head>
<title>ADMIN PAGE</title>
</head>
<body>
<center><h2 style="color:#F00; background-color:#000">ADMIN PAGE</h2></center>
<center><ul style="list-style:none;">
<li style="display:inline; padding:15px;"><a href="ProductCreate" style="text-decoration:none;">Create Product</a></li>
<li style="display:inline; padding:15px;"><a href="category" style="text-decoration:none;">Create Category</a></li>
<li style="display:inline; padding:15px;"><a href="search" style="text-decoration:none;">Search</a></li>
<li style="display:inline; padding:15px;"><a href="update" style="text-decoration:none;">Update</a></li>
<li style="display:inline; padding:15px;"><a href="delete" style="text-decoration:none;">Delete</a></li>
<li style="display:inline; padding:15px;"><a href="view" style="text-decoration:none;">View Records</a></li>
<li style="display:inline; padding:15px;"><a href="automaticCreate" style="text-decoration:none;">create average</a></li>
<li style="display:inline; padding:15px;"><a href="customerHistory" style="text-decoration:none;">Customer Orders</a></li>
<li style="display:inline; padding:15px;"><a href="updateQuantity" style="text-decoration:none;">updateQuantity </a></li>
	<a href="<?php echo base_url(); ?>site/logout"><span>Logout<span></a>

	<?php
	$this -> session -> userdata('id');
	?>
</ul></center>
</body>
</html>

			
					

				
 	
			
					