
<br>
<br>
<br>
<br>



<div style="padding-top:50px;" class="container" id="in-body">
      <div class="row">
     
        <div >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h5>Create Course</h5>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-12 col-lg-12 " > 

                

        
                <?php echo form_open('instructor'); ?>  
                  <div class="form-group">
                    <?php echo form_label('Course ID:');?><?php echo form_error('courseid'); ?>
                    <?php  echo form_input(array('type' =>'text','class' => 'form-control','name'=>'courseid'));?>
                  </div>


                 <div class="form-group">
                     <?php echo form_label('Course Title:');?><?php echo form_error('coursetitle'); ?>
                     <?php  echo form_input(array('type' =>'text','class' => 'form-control','name'=>'coursetitle'));?>
                  </div>


                  <div class = "form-group">
                       <?php echo form_label('Description:');?><?php echo form_error('coursedesc'); ?>
                     <textarea class = "form-control" rows = "7" name="coursedesc"></textarea>
                  </div>

                 

                  <div class = "form-group">
                    <div class = "col-sm-offset-2 col-sm-10">
                       <?php echo form_submit(array('type'=> 'submit','class'=>'btn btn-primary btn-lg pull-right','value'=>'Add Course')); ?>
                       
                    </div>
                  </div>

                  <div class="form-group" style="height: 86px;">

                  </div>

                  <?php echo form_close(); ?>

                  
   
                    
                 
                  
             
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>