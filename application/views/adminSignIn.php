<?php
		
		
		
echo form_label("Admin Sign Up");
					echo validation_errors();
	

             	echo form_open('AdminController/signUp_validation');
	
					?>
			    			

			    			
			    				<input type="email" name="email" id="email" placeholder="Email Address">
			    			
			    						<input type="password" name="password" id="password"  placeholder="Password">
			    					
			    					
			    						<input type="password" name="cpassword" id="cpassword"  placeholder="Confirm Password">
			    					
			    			<input type="submit" value="sign up" >
			    		
			    		</form>
					
		
		<?php
					echo form_label("Admin Sign In");
					 echo validation_errors();
	                   echo form_open("AdminController/login_validation");
						?>

			    		
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			
			    		
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    				
			    			</div>
			    			
			    			<input type="submit" value="Sign In" class="btn btn-info btn-block">
			    		
			    		</form>
