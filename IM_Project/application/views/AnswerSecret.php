
	  <div id="login-page">
	  	<div class="container">
	  	
		    
		     <div class="form-login">
		     <?php echo form_open('Admin/resultID'); ?>
		        <h2 class="form-login-heading">Help</h2>
		        <div class="login-wrap">
		         <input type="hidden" name="Idnum" value="<?php echo $Idnum; ?>"/>
		         <input type="hidden" name="question" value="<?php echo $question; ?>"/>
                    <label><?php echo $question; ?></label>
		            <input type="text" class="form-control" placeholder="answer" name="answer" autofocus>
		            <br>
		           
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="glyphicon glyphicon-send"></i>    Send Answer</button>
		   		
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
        $.backstretch("<?php echo base_url('img/KM_DSME_COntract_May132.jpg')?>", {speed: 500});
    </script>



