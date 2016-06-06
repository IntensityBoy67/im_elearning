 <div id="login-page">
	  	<div class="container">
	  	
		    
		     <div class="form-login">
 		        <h2 class="form-login-heading" style="background:#428bca;">Confirm Forgotten Password</h2>
		        <div class="login-wrap">
				
				
	<?php if($email == 1){?>
	
					<h4 class ='text text-success'>Change Password link has been sent in your Email! </h4>
		            
	<?php }else if ($email == 0){ 
	 ?>
					<h4  class ='text text-danger'>Email Does not Exist!!! </h4>
					
	<?php }else if($answer == 1){ ?>
 		   

	<?php  } ?>
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



