<!DOCTYPE >

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
						<a href="<?php echo base_url(); ?>AdminController/adminSIgnIn"><span>Admin Sign In<span></a>
					
	</body>
	
	
	
	
</html>