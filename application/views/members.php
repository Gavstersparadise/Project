<?php
	if($this -> session -> userdata('id') == "" || !($this -> session -> userdata('user') == "TRUE")){
   redirect("site/restricted");
}

echo $this -> session -> userdata('id');
?>
<html>
	<head>
		<title>Customer PAGE</title>
	</head>
	<body>
		<center>
			<h2 style="color:#F00; background-color:#000">Customer PAGE</h2>
		</center>
		<center>
			<ul style="list-style:none;">

				<li style="display:inline; padding:15px;">
					<a href="view" style="text-decoration:none;">View Records</a>
				</li>

				<a href="<?php echo base_url(); ?>Shop/"><span>Buy Products<span></a>
				<a href="<?php echo base_url(); ?>site/terms"><span>terms and Conditions<span></a>
				<a href="<?php echo base_url(); ?>site/logout"><span>Logout<span></a>
					<li style="display:inline; padding:15px;"><a href="search" style="text-decoration:none;">Search</a></li>
				

			</ul>
		</center>
	</body>
</html>


