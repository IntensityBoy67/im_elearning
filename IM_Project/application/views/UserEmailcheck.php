 <div id="login-page">
	  	<div class="container">
	  	
		    
		     <div class="form-login">
		     <?php echo form_open('IM/forgot_pass'); ?>
		        <h2 class="form-login-heading" style="background:#428bca;">Forgot Password</h2>
		        <div class="login-wrap">

		            <input type="text" class="form-control" placeholder="Email Address" name="Email" autofocus>
		            <br>
		           
		            <button class="btn btn-primary btn-block" type="submit">
					<i class="glyphicon glyphicon-send"></i> Send Email Address</button>
		   		
		   		<?php echo form_close(); ?>	
				
				</div>
 </div>
		      <?php echo form_open('IM/forgot_pass'); ?>
			  
			  <div class="form-login">
			   <h2 class="form-login-heading" style="background:#428bca; height:30px;">OR</h2>

		        <div class="login-wrap">

		            <input type="text" class="form-control" placeholder="Username" name="username" autofocus>	
					
		            <input type="text" class="form-control" placeholder= "Answer To Secret Question" name="answer" autofocus>
				
					
		            <br>
		           
		            <button class="btn btn-primary btn-block"  type="submit"><i class="glyphicon glyphicon-send"></i> Submit</button>
		   		
		   		<?php echo form_close(); ?>	
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



