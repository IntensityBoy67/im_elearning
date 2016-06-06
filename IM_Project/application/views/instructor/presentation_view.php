<body>
   
<div class="height:50px;"></div>
<div class="container">          
<div class="row" style="background-color: #fff;">
 <div class="row mt" style="padding-bottom:215px;">
 <div class="col-lg-12">
   <div class="site-wrapper">
    <div class="site-wrapper-inner">
     <div class="cover-container">
       <div class="col-md-12">
                              
                              <div class="row">
                                  <div class="box">
                                      <div class="col-lg-12">
                                      <br>
                                      <br>
                                      <br>
                               <?php 

                                              $this->load->model('InstructorModel');
                                              $this->load->model('UserModel');
                                              $p = new InstructorModel();
                                              $stud_model = new UserModel();							   
							   
                                            $course_info = $p->getCourseInfo($this->input->get('id'));
											$enrollees= $p->count_studs_by_course($this->input->get('id'));
							   ?>
                                <div class="col-lg-12" style = "width: 1200px; border-bottom: 2px;">
                                      <div style="border-bottom: 1px solid #ccc;  float: left; width: 800px; height:500px;" class="jumbotron col-lg-8">
                                                                          <img height= "200" width= "350" style="margin:auto;" class="img-responsive" src="<?php echo base_url().'course_imgs/'.$this->input->get('id').$course_info['course_image']; ?>" alt= "No Preview Available">


                                      </div>


                                      <div style="margin-left:3px;border-bottom: 1px solid #ccc; float: left; width: 350px;" class="jumbotron col-sm-3">

                                        
                                         <label><strong>Lectures:</strong> 
                                          <?php


											  echo $p->count_lecs($this->input->get('id')); 
										  
										  
 

                                          ?>


                                       </label> <br>
                                         
                                         <label><strong>Languages:</strong> English</label> <br>
                                                                                             

                                      </div>
 <br>
                                              <div style = "width: 1200px; float:left;">
                                              <div class="col-lg-4" style = "width: 800px; >
                                                <p style="font-size:13px;">
											 <label style="font-size:15px;"><strong>Course Description: </strong></label>

                                                <?php echo $course_info['courseDescription'];
                                                 ?>
                                                </p>
												
												 <p style="font-size:13px;">
											 <label style="font-size:15px;"><strong>Rank: </strong></label>

                                                <?php 
												
												$course_row= $p->loadcourse_ranking(); 									 
												
																for($x=  0;$course_row[$x] !== NULL; $x++){
																
																	if($course_row[$x]['courseID']== $course_info['courseID'])
																	break;
																 
																
																}
																$rank = $x+1;
																
																if($rank % 10 == 1)
																	echo ($rank)."st";
																
																else if($rank % 10 == 2)
																	echo ($rank)."nd";
																
																else if($rank % 10 == 3)
																	echo ($rank)."rd";
																
																else 
																	echo ($rank)."th";
																

												?>
                                                </p>
												
												 <p style="font-size:13px;">
											 <label style="font-size:15px;"><strong>No. of Enrollees: </strong></label>

                                                <?php echo $enrollees;
                                                 ?>
                                                </p>
												
												
												
                                         

                                        <!-- end of col-lg- -->
									 	
							 <div  class="row" style = "width: 1200px;">
							 
                                 <div style ="width: 250px;  float:left;">
										   <div class="row">
                                              <div clas="col-lg-9 ">
                                                  <div class="table-responsive" style="margin-left: 10%;">
                                                        <table   class="table table-bordered table-hover" style=  "width: 700px;" >
                                                                <thead>
                                                                    <tr  >
                                                                        <th style=" font-size:15px;">Lectures</th>
                                                                       
                                                                    </tr>
                                                                </thead>
																
                                                                      <?php 
																	  
                                                                $user = $this->session->userdata('username');
                                                                $id =  $this->input->get('id', TRUE);
                                                                $this->db->select('*');
                                                                $this->db->from('course');
                                                                $this->db->join('video_lectures', 'course.courseID=video_lectures.course');
                                                                $this->db->where('video_lectures.course',$id);
                                                                $qu = $this->db->get();
                                                                $res = $qu->result_array();
																
                                                                      foreach ($res as $lecture) {
                                                                        # code...
                                                                      ?>
                                                                      <tbody>
                                                                              <tr class="info">
                                                                                  <td style="width: 85%; font-size:13px;" >
																				  
	<a <?php if($p->islec_viewed($lecture['lec_video_id'], $this->session->userdata('username')) >= 1){ ?> class= 'text text-info'<?php } ?> href="<?php echo 'cont_presentation?'.'id='. $lecture['lec_video_id']; ?>"><?php echo $lecture['lec_title'];?>
																				  </a>
																				  
																				  <?php if($stud_model->count_lecs_views($this->session->userdata('username'), $lecture['lec_video_id'])>=1) {?>
																				  
																				  <i class = "glyphicon glyphicon-ok"></i>
																				  
																				  <?php } ?>
																				  
																				  </td>
                                                                              </tr>
                                                                      </tbody>        
                                                                      <?php }?>
                                                      </table> 
                                                </div>
						 
										</div>

				</div>

             </div> 
			 
			 
                                              <div  style ="width: 750px; float:left; padding-left: 550px; ">
											  
													<div style =" overflow-y: scroll; margin-left:60px; width: 250px; height:500px; float:left;"  >


                                                                    <h2 class = "alert alert-success"><p>Course Activities</p></h2>
                                                                 
                                                                    <hr /> 
	                         <?php 

                                                                    $course_id=  ($this->input->get('course_id') === NULL)? $this->input->get('id'): $this->input->get('course_id');
                                                                      

                                                                     $notifs=  $p->loadNotifsCourse($course_id);  

                                                                     //* print_r($notifs);



                                                                      foreach($notifs as $row_notifs){
                                                                      
                                                                        if($row_notifs['notif_type'] == 1){

                                                                          $lec_info= $p->getLecInfo($row_notifs['new_data_id']);

                                                                        ?>


                                                                    <p class= "text text-small">Instructor <span class = 'label label-danger'> <?php 
                                                                        echo $instrct['Fname'];
                                                                    ?></span> has uploaded <a href = "<?php echo 'cont_presentation?id='.$this->input->get('course_id').'&video='. $row_notifs['new_data_id']; ?>"><font class=  'text text-info'> <?php echo $lec_info['lec_title']; ?> </font></a></p>
                                                                

                                                                <?php  } else if ($row_notifs['notif_type'] == 2){ ?>

                                                                    <p class= "text text-small"> <?php 

                                                                    if($row_notifs['notif_from_table'] == 'instructors') echo "Instructor "; 
                                                                    
                                                                    else 
                                                                        echo "A student ";


                                                                      $comment_info= $p->getCommentInfo($row_notifs['new_data_id']);

                                                                    ?> has created a new discussion 
                                                                     <a href = "<?php echo 'cont_presentation?id='.$row_notifs['nodification_to'].'&video='.$comment_info['lec_video_id'].'&comment_id='.$comment_info['comments_id']; ?>"> 
                                                                      <span class= 'text text-danger'><?php echo "Discussion (Id:".$comment_info['comments_id'].")"; ?></span></a>  
                                                                        from <?php

                                                                          $lec_info = $p->getLecInfo($comment_info['lec_video_id']);
                                                                          echo $lec_info['lec_title'];

                                                                       ?>

                                                                     
                                                                       

                                                                    </p>
                                                                    


                                                                    <?php } else if($row_notifs['notif_type'] == 3){

                                                                        $quiz_info = $p->loadQuizInfo($row_notifs['new_data_id']);
                                                                        $lec_info= $p->getLecInfo($quiz_info['lec_video_id']);

                                                                     ?>

                                                                    <p class= "text text-small"> Instructor <span class= 'label label-danger'><?php echo $instrct['Fname']; ?></span> has uploaded (New)  <a href = "<?php if($this->session->userdata('username') === NULL)  echo 'ViewQuizInfo?quiz_id='.$row_notifs['new_data_id']; else echo 'quizinstruction?quiz_id='.$row_notifs['new_data_id']; ?>"> <span class ="text text-danger"> Quiz <?php echo $quiz_info['quiz_name']; ?> </span></a> from <a href="<?php echo 'cont_presentation?id='.$lec_info['course'].'&video='.$quiz_info['lec_video_id']; ?>"> <span class= 'text text-info'><?php echo $lec_info['lec_title']; ?> </span></a>  </p>

                                                                    <?php }else if($row_notifs['notif_type'] == 4){ ?>

                                                                    <p class= "text text-small"> Instructor <span class= 'label label-danger'><?php echo $instrct['Fname']; ?></span> has created a (New) <a href = "<?php echo 'ViewAnnouncement?ann_id='.$row_notifs['new_data_id']; ?>"> <span class ="text text-danger"> Announcement</a>  </p>                                                                    

                                                                    <?php

                                                                    }


                                                                    ?>


                                                                    <span class= 'label label-warning'><?php   
																	
$php_date= strtotime($row_notifs['nodification_date']);
			 
			$php_date= date("M d, Y H:m", $php_date);
			
			 echo $php_date; ?></span>
 
                                                                    <hr />
<?php
                                                                  }

                                                                 ?>


                                                                </div> 

                                      </div> 
					 </div> 
                                   











                               <!-- <div  style = "width:1200px;">-->
                               <div class="row">
                                 

                                  <div class="col-lg-8" style = "width: 500px;">
                                               <h3 class="head text-center">List of Notes <span style="color:#f48260;">♥</span> </h3>
                                                                <div class="well table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                 <td>Notes Name</td>
                                                                                 <td>Lecture Name</td>
                                                                                <td>Download</td>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            foreach ($lectures as $lec_info) {
                                                                                ?>
                                                                                <tr class="info">
                                                                                    <td><?php echo $lec_info['lecture_name']; ?></td>
                                                                                      <td><?php echo $lec_info['lec_title']; ?></td>
                                                                                   

                                                                                        <td><a href="<?php echo site_url(); ?>/IM/download_lec?id=<?php echo $lec_info['lec_video_id']; ?>"><button>Download</button></a></td>
                                                                                     

                                                                                </tr>
                                                                            <?php } ?>

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                              </div>
                                       
									  
									  
                                                              </div>
<div style="margin-left:3px;border-bottom: 1px solid #ccc;" class="alert alert-success col-sm-8">

                                        
                                      <h2><p class= 'label label-warning'>Course Ranking</p></h2>
									 <br> <p>*This is just sample layout...</p>
									  <br>
									  
                                         <table class = 'table table-bordered table-condensed'>
										 
										 <tr>
										 <th>Rank </th>
										 <th>Username</th>
										 <th>Score Percentage</th>
											
										<tr>
											<td>1
											<td>ikashi
											<td>93%
											
										<tr>
											<td>2
											<td>dave
											<td>87%
											
										<tr>
											<td>3
											<td>Rotchel123
											<td>85%
											
										
											
										 </table>
                                                                                              

                                      </div>

                                                              <div class="row">
                                                                 
                                                                 
                                </div> 


   
                                    

                                                    
<div class="box-result-cnt">

            <?php 
            $id =  $this->input->get('id', TRUE);  
            $user = $this->session->userdata('username');
            ?>

        </div><!-- /rate-result-cnt -->

                                       
                                      

                                      
                                        
                                  </div> <!-- end of box -->
                                </div> <!-- end of row -->



      </div> <!-- end of col-md-12 -->
    </div> <!-- end of cover-container-->
  </div> <!-- end of site wrapper container -->
</div> <!-- site wrapper -->
</div> <!-- col lg 12-->
</div> <!-- / row mt -->
 </div><!-- /row -->


    <script>
        // rating script
        $(function(){ 
            $('.rate-btn').hover(function(){
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });
                            
            $('.rate-btn').click(function(){    
                var therate = $(this).attr('id');
                var dataRate = 'act=rate&post_id=<?php echo $id; ?>&rate='+therate; //
                $('.rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-active');
                };
       

                $.ajax({
                    type : "POST",
                    url : "http://localhost:/IM_Project/assets/ajax.php",
                    data: dataRate,
                    success:function(){}
                });
                
            });
        });
    </script>



<!--- by gml -->


</body>






