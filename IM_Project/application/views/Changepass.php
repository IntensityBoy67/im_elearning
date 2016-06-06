
	  <div id="login-page">
	  	<div class="container">
	  	
 	    
		     <div class="form-login">
		     <?php echo form_open('Admin/UpdatePass'); ?>
		        <h2 class="form-login-heading">Help</h2>
		        <div class="login-wrap">
		         <input type="hidden" name="Idnum" value="<?php echo $Idnum; ?>"/>
                    <label>Previous Password</label>
		            <input type="text" class="form-control" placeholder="answer" value="<?php echo $Password; ?>" readonly>
		            <br>
		            <label>New Password</label>
		            <input type="password" class="form-control" id = "pass" placeholder="New Password" name="Password"  required >
		            <br>
		             <label>Retype Password</label>
		            <input type="password" class="form-control" id = "rpass" placeholder="Retype Password" name="RPassword" required >
		            <span id ="flag_pass"></span>

		            <br>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit" onclick="return confirm('We will now redirect you back to the login page')"><i class="glyphicon glyphicon-send"></i>    Send Update</button>
		   		
		   		<?php echo form_close(); ?>	
		 
		   		</div>
		   	</div>	
		       	
	  	
	  	</div>
	  </div>

   <script>
        $("document").ready(function(){
            
            $("#form_reg").submit(function(){
                
      if($("#pass").val() != $("#rpass").val())
            return false;

                
            });
            
            
            $('#pass, #rpass').change(function(){
                    
                    if($("#pass").val() != $("#rpass").val() && $("#pass").val() != '' && $("#rpass").val()!= '')
                    $("#flag_pass").html("<font color= 'red'>Password Mismatch</font>");
                else if($("#pass").val() == $("#rpass").val())
                     $("#flag_pass").html("<font color= 'green'>Password Match!</font>");
            });
            
        });
        
        </script>	
         <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url('img/KM_DSME_COntract_May132.jpg')?>", {speed: 500});
    </script>



