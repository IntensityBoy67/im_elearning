 <div id="login-page">
	  	<div class="container">
	  	
		    
		     <div class="form-login">
		
			
		        <h2 class="form-login-heading" style="background:#428bca;">Change Password</h2>
		        <div class="login-wrap">
				     <?php 
			 
				 if(1 == $flag){
			 echo form_open('instructor/pass_change'); ?>

		            <input type="text" class="form-control" placeholder="Old Password" name="old_pass" autofocus>
		            <input type="text" class="form-control" placeholder="New Password" name="pass" autofocus>
		            <input type="text" class="form-control" placeholder="Re- Password" name="repass" autofocus>
          
		            <button class="btn btn-primary btn-block" href="index.html" type="submit"><i class="glyphicon glyphicon-send"></i>Change Password</button>
		   		
		   		<?php echo form_close();
				
			 }else echo "<span class ='text text-danger'>Answer to Secret Question is not correct!</span>
			 <br>
			 <a href= 'forgot_pass'>Try Again!</a>";
			 
			 
				?>	
				
				</div>
			</div>
		     
		   		</div>
		   	</div>	
		       	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url('img/KM_DSME_COntract_May131.jpg')?>", {speed: 500});
    </script>



