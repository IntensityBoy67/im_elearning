
<br>
<br>
<br>
<br>
<div style="padding-top:50px;" class="container" id="in-body">
      <div class="row">
     
        <div >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Post Announcements</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-12 col-lg-12 "> 
                 <!-- <div class="alert alert-success">
                    <strong>Success!</strong> Announcement Posted.
                  </div> -->
                  <?php echo form_open('instructor/announcementsend');?>
                  <div class = "form-group">

<div class="col-md-6">
                  <input type="hidden"  name="Created_by"  value="<?php echo $this->session->userdata('Idnum'); ?>" readonly />
                   <input type="hidden"  name="flag"  value='1' readonly />
                  <div class='form-group has-primary'>


       <label>Which course will have this announcement?</label>
         <select class='form-control' name="courseID">

  <?php 
  foreach($instruct_course as $data1){
      if($data1->IdNum==$this->session->userdata('Idnum')&&$data1->flag=='1'){?>       
               
                <option value='<?php echo ($data1->course_id); ?>'><?php echo ($data1->course_id); ?> &nbsp;
   				<option
    <?php  if ($data1->course_id!=NULL) {
          foreach($course as $data2){
      if ($data2->courseID==$data1->course_id) {
            echo ($data2->CourseName);

            }      
            
              }
      }

                ?>
              


                </option>

  <?php }}?>              
        </select>
    </div>
    </div>



    <div class="col-md-6">
    <label>Date and time</label>
     <input type="datetime-local" class = "form-control"  name="announcement_date_createdby" required />
     </div>


     <div class="col-md-12">
    <label>Announcement Title</label>
                  <input type="text" class = "form-control"  name="announcement_title" placeholder="Title of the announcement" required />
                    <br> 



    <label>Announcement Content</label>
                     <textarea name="announcement_content" class = "form-control" rows = "7"></textarea>
                     </div>
                 
                    <div class = "col-md-offset-2 col-md-10">
                    <br>
                       <button type = "submit" class = "btn btn-info btn-lg pull-right">Add Announncement</button>
                    </div>
                    <?php echo form_close(); ?> 
                  </div>


  <div class="col-lg-12" style="background-color: #fff; border-radius: 4px;">         
  <div class="table-responsive">
    <br>
            <table id="dean" class="table table-hover" style="color:#111;">
              <thead>
              
                <tr> 
                 
                   <th>Course</th>
                   <th>Date created</th>
                  <th>Title</th>
                  <th>View details</th>
                </tr>
              </thead>
              <tbody>
                 
  <?php 
  


  foreach($announcement as $datas){
      if($datas->flag=='1'){
         
          
          ?>                   
                <tr>
                 
                  
                  <td><?php echo ($datas->courseID); ?></td>
                   <td><?php echo ($datas->announcement_date_createdby); ?></td>
                    <td><?php echo ($datas->announcement_title); ?></td>
                  <?php echo form_open('instructor/deleteAnnocement');?>  
                  <input class="form-control" type="hidden" name="announcement_id" value="<?php echo ($datas->announcement_id); ?>"/>  
                  <td><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td>
                  <?php echo form_close();?>  
                </tr>
  <?php }}?>              
               
                      
              </tbody>
            </table>
            <br>
            <script type="text/javascript">
              $(document).ready(function() {
                  $('#dean').DataTable();
              } );

    </script>

          </div>
        </div> 



<div class="col-sm-12" style="height:30px;">
 
</div> 

        </div>              



              
             
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>