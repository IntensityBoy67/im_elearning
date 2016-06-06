<style type="text/css">.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}
#filehere{
 width:  500px;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
#ju{
  border: solid 2px #2F7EC1;

  
}
.well{
  
  width: 80%;
  margin: 0 auto;
  background-color: #fff;

}
.required{
  color:red;
}
#lectable{
  background-color: #fff;
}
</style>
 <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
   <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<div style="margin-top:8%;"></div>
<div class="container">

    


          <div class="container">


                  <div class="row well">
                      <div class="jumbotron" id="ju" style="text-align:center;color:#2F7EC1;">

                        <h1>Upload Video Lectures </h1>

                      </div>
                      
                    

                            <div class="col-md-12" >


                                <div class="alert alert-success"  style="width:100%"><strong><?php echo $msg =  $this->input->get('msg', TRUE);?></strong></div>

                                <form action="<?php echo site_url('Instructor/video_lec_insertion');?>"  method="post" enctype="multipart/form-data">
                                        <div class="form-group">



                                             

									<?php if($this->input->get('course_id') === NULL) { ?>
									
                                             <select class="form-control" name="course">
                                              <option>Select Course</option>

                                              <?php 

                                              foreach ($course as $cou) {
                                                # code...
                                              $course_name = $cou['CourseName'];
                                              $course_id = $cou['courseID'];
                                              ?>
                                              <option value="<?php echo $course_id;?>"><?php echo $course_name;?></option>
                                           
											
                                             <?php } ?>
											  </select>
											  
								<?php
								
									}else{  ?>
									 <?php 
											$this->load->model("InstructorModel");
											$p = new InstructorModel();
											
										$course_info = $p->getCourseInfo($this->input->get('course_id')); ?></h2>
											
											<h2>Course Name: <?php echo $course_info['CourseName']; ?></h2>
											
                                          <input type= "hidden" value= "<?php echo $this->input->get('course_id'); ?>" name = "course"/>

										  
									<?php } ?>	  
										  
                                        </div>
                                        <div class="form-group">
                                            <label>Lecture title:</label><span class="required">*</span>
                                            <input type="text" name="lec_title" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                             <label>Embedded URL:</label><span class="required">*</span>
                                             <input type="text" name="embed_url" class="form-control " required/>
                                        </div>
                                        <div class="form-group">
                                             <label>Date Uploaded:</label><span class="required">*</span>
                                             <input type="date" name="date_uploaded" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                             <label>Upload Notes(Optional):</label>
                                             <span class="btn btn-default btn-file">
                                                        Browse <input class="btn btn-default" name="fields" type="file">
                                                    </span>
                                        </div>

                                        <div class="form-group">
                                              <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                        
                                        
                                         
                                    </form>              
                            </div> <!-- col-md-12 -->
                              
                           
                        </div><br>
                <div class="jumbotron" id="lectable">
                            <table id="answers" cellpadding='0' cellspacing='0' border='0' style='width:100%;' class='datatable1 table table-striped table-bordered'>
                              <thead>
                              <tr>
                                
                                <th>Lecture Name:</th>
                                <th>Upload Notes:</th>
                                <th>Date Uploaded: </th>
                                <th>Action</th>
                              </tr>
                              </thead>
                               <tbody>
                                <?php 

        $this->load->model('InstructorModel');
        $p = new InstructorModel;



                                foreach($lic as $row){ ?>
                                  <tr>
                                       
                                        <td><?php echo $row['lec_title']; ?></td>
										
                                        <td><?php echo (empty($row['lecture_name']))? "No Lectures Uploaded":$row['lecture_name']; ?></td>
										
                                        <td><?php 
										
										$php_date= strtotime($row['date_uploaded']);
			 
			echo date("M d, Y", $php_date);
									?></td>



                                        <td><a href="<?php echo 'update_lec?id='. $row['lec_video_id']; ?>">Update</a></td>

                                  </tr>

                              <?php } ?>

                                </tbody>
                            </table>
                        </div> 
                       
                  </div>
            </div>
     