<!DOCTYPE >
<html>
	<head>
		
	<title></title>	
		<meta http-equiv="Content-type" content="text/html"; charset="UTF-8"  >
	
	</head>
	
	<body>
		<div= "container">
		<?php
echo form_label("Customers Sign Up");
					echo validation_errors();
	

             	echo form_open('site/signUp_validation');
	
					?>
			    			

			    			
			    				<input type="email" name="email" id="email" placeholder="Email Address">
			    			

			    		
			    						<input type="password" name="password" id="password"  placeholder="Password">
			    					
			    					
			    						<input type="password" name="cpassword" id="cpassword"  placeholder="Confirm Password">
			    					
			    			<input type="submit" value="Register" >
			    		
			    		</form>
		
		</div>
		
		<?php 
		echo form_label("Customers Sign In");
		 echo validation_errors();

						echo form_open("site/login_validation");
					?>

					
						<input type="email" name="email" id="email"  placeholder="Email Address">
					
						<input type="password" name="password" id="password"  placeholder="Password">

					</div>

					<input type="submit" value="Sign In" >

					</form>
					
					<?php
					
					echo form_label("Admin Sign In");
					 echo validation_errors();
	                   echo form_open("site/login_validation_lect");
						?>

			    		
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			
			    		
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    				
			    			</div>
			    			
			    			<input type="submit" value="Sign In" class="btn btn-info btn-block">
			    		
			    		</form>
		
	</body>
	
	
	
	
</html>