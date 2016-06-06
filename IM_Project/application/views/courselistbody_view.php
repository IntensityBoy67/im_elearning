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

                <h1>Handled Courses</h1>

            </div>


            <?php if (!empty($update_course)) { ?>
                <div class="col-md-12" >
                    <div class="alert alert-success"  style="width:100%"><strong><?php echo $msg = $this->input->get('msg', TRUE); ?></strong></div>
                    <form action="<?php echo site_url('Instructor/courseUpdate'); ?>"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="update_id" value="<?= $update_course->instruct_course_id ?>">
                        <div class="form-group">
                            <label>Courses Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><?= $update_course->CourseName ?></label>
                        </div>
                        <div class="form-group">
                            <label>Lecture Note:</label><span class="required">*</span>
                            <textarea name="course_note" class="form-control" required></textarea>                                    
                        </div>
                        <div class="form-group">
                            <label>No. of Enrolees</label><span class="required">*</span>     
                            <input type="text" value="<?= $update_course->quiz_time_limit ?>" class='form-control' name="quiz_time_limit" required placeholder="1:30:00 (1 houre 30 minutes)"  />                                    
                        </div>

                        <div class="form-group">
                            <label>Upload Image :</label><span class="required">*</span>
                            <span class="btn btn-default btn-file">
                                Browse <input class="btn btn-default" name="course_image" type="file">
                            </span>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>



                    </form>              
                </div>  <!--col-md-12 -->
            <?php } ?>

        </div><br>
        

    </div>
    
</div>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div class="jumbotron" id="lectable">
	
	
	<?php if(!empty($courses)){ ?>
	
            <table id="answers" cellpadding='0' cellspacing='0' border='0' style='width:100%;' class='datatable1 table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Image:</th>
                        <th>Course:</th>
                        <th>No. of Enrollees</th>      
                        <th>Last Activity</th>						
						<th>Expiration Date</th>

						
                        <!--<th>Lecture Note</th> 
                        <th>Update</th> -->
                    </tr>
                </thead>
				
                <tbody>

                    <?php

                    $this->load->model('InstructorModel');
                    $p = new InstructorModel;


                    foreach ($courses as $course){

                    
                        ?>
                        <tr>
                            <td>
                                <img alt = "No Preview Available" src="<?= base_url('img_courses/' ). $course['courseID'].$course['course_image']; ?>" style="width:200px;">
                            </td>
                            <td>
                                <?php

                                //$course_info = $p->getCourseInfo($course->course_id);

                                echo "<a href= 'presentation?course_id=".$course['courseID']."'>" . $course['CourseName']. "</a>";

                                ?>
                            </td>
                            <td>
                                <a href= '<?php echo 'viewStuds?course_id='.$course['courseID']; ?>'>
								
                                    <?php 

                                    echo $p->count_studs_by_course($course['courseID']);
                                     
                                //* echo $course->quiz_time_limit; ?>

                            </a>
                            </td>
							
							   <td>
                                    <?php 
									
								      $row = $p->loadLastUpdCourse($course['courseID']);
									  
									  if(empty($row)) echo "<span class= 'label label-danger'>No Activities Yet!</span>";
									  
									  echo "<span class= 'label label-info'>".$row['notif_desc']."</span><br><br>";
									  
									  echo "<span class= 'label label-danger'>".$row['nodification_date']."</span><br>";
									  
                                 //*  echo $course['expiration_date'];
                                     
                                //* echo $course->quiz_time_limit; ?>

                            </a>
                            </td>
							
							   <td>
                                    <?php 

                                    echo $course['date_expired'];
                                     
                                //* echo $course->quiz_time_limit; ?>

                            </a>
                            </td>
							
                        </tr>

						
                    <?php } 
					
					
					}else echo "No Courses Assigned Yet! "; ?>
					
					

                </tbody>
            </table>
        </div>
</div>