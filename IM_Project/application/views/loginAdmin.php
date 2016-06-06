
	  <div id="login-page">
	  	<div class="container">
	  	
		    
		     <div class="form-login">
		     <?php echo form_open('Admin/validateLogin'); ?>
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">

		            <input type="text" class="form-control" placeholder="ID Number" name="Idnum" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="Password" >
		             <br>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		   		<?php if(!empty($message)) echo "<br><br><span class= 'label label-danger'>".$message."</span><br>";?>
		   		<?php echo form_close(); ?>	
		   		<br>
		   		<a href="<?php echo site_url('Admin/viewID') ?>">Forgot your password?</a>
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
        $.backstretch("<?php echo base_url('img/KM_DSME_COntract_May132.jpg')?>", {speed: 500});
    </script>



