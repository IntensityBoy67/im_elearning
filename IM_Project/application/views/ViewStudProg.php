 
<div style="height: 50px;"></div>
<div class="container">

    
        <section class="wrapper">
            <div class="row">
                <div clas="col-md-12">
				 <div class="table-responsive" style="margin-left: 10%;">
				 
				 
                                                                      <?php 
 																$this->load->model('InstructorModel');
																$p = new InstructorModel();
																$course_info = $p->getCourseInfo($this->input->get('course_id'));

																?>
					<h2>Progress of: <?php echo $course_info['CourseName']; ?></h2>
					
                                                        <table   class="table table-bordered table-hover" style=  "width: 1000px;" >
                                                                <thead>
                                                                    <tr  >
                                                                        <th style=" font-size:15px;">Lectures</th>
                                                                        <th style=" font-size:15px; width:30px;" >Viewed Status</th>
                                                                          <th style=" font-size:15px; width:20px;">Date Viewed</th>
                                                                      
                                                                    </tr>
                                                                </thead>
																
                                                                      <?php 
 																$this->load->model('UserModel');
																$p = new UserModel();
                                                                $user = $this->session->userdata('username');
                                                                $id =  $this->input->get('course_id', TRUE);
                                                                $this->db->select('*');
                                                                $this->db->from('course');
                                                                $this->db->join('video_lectures', 'course.courseID=video_lectures.course');
                                                                $this->db->where('video_lectures.course',$id);
                                                                $qu = $this->db->get();
                                                                $res = $qu->result_array();
																$num_views = 0;
																$quiz_taken_cnt = 0;
                                                                      foreach ($res as $lecture) {
                                                                        # code...
                                                                      ?>
																	  
																	  
                                                                      <tbody>
                                                                              <tr class="info">
                                                                                  <td style="width: 200px; font-size:13px;" >
																				  
											
														<a <?php 
														
														$lec_view_info= $p->get_lec_viewed($lecture['lec_video_id'], $this->session->userdata('username'));
														
														
														if(!empty($lec_view_info)){

														?> <?php }else { ?> class= 'text text-info' <?php } ?> href="<?php echo 'cont_presentation?'.'id='. $lecture['lec_video_id']; ?>">
														
														
														<?php echo $lecture['lec_title'];?>
											
																				  </a>
																				  </td>
																				  
				
 																				  
																				  <td style = "width: 30px;">
																				  <?php if(!empty($lec_view_info)){?>
																				  
																				  	
																		<span class='glyphicon glyphicon-ok'></span>

																				
																				  <?php
																	$num_views++;
																				  }?>
																		
																		  
																				  </td>
																				  
																				  <td style= "width:100px;">
																				  
																				  
																					 <?php 				

				if(!empty($lec_view_info)) {	
				
											$php_date= strtotime($lec_view_info['date']);
											 
											$php_date= date("M d, Y", $php_date);
											
											 echo $php_date;
											 
						}else echo "Not Yet Viewed";
				 
											 ?>		  
                                                                              </tr>
                                                                      </tbody>        
                                                                      <?php }?>
                                                      </table> 
													  <h2>Total Viewed Lectures: <?php echo $num_views;?></h2>
													  <?php
													  
															$count_course_lecs= $p->count_lecs_by_course($course_info['courseID']);
												?>
 													  <h2>Course Progress Percentage: <?php 
													  if($num_views >= 1)
													  echo number_format(($num_views/$count_course_lecs) * 100, 2)."%"; ?></h2>
													  
                                                </div>
 				 
                </div>


            </div>

        </section>

   




</div>