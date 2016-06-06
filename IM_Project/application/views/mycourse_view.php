<body>
<div style="height: 50px;"> </div>
            
       <div class="col-md-12">
                              <div class="row">
                                  <div class="box">
                                      <div class="col-lg-12">
                                      <br>
                                      <br>
                                      <br> 
                                    <div class="container">
                                      <div class="row">
                                      <div class="well">
                                          <h1 class="text-center">Enrolled Courses</h1>
                                          <div class="list-group">
										 <?php $this->load->model("InstructorModel");
$p = new InstructorModel();

							 ?> 
										  <?php if(isset($flag) && $flag == 1) {?><br><br><span class ='text text-success'><?php echo "Course ID:".$course_id." has been Successfully Enrolled! <br><br>"; ?></span> <?php }?>
                                            <?php
											
											if(!empty($query)){
                                             foreach ($query as $q) {



 
                                              # code...
                                            ?>
                                            <a href="<?php echo site_url('IM/presentation') ?>?id=<?php echo $q['courseID'];?>" class="list-group-item" <?php if(isset($course_id) && $course_id=== $q['courseID']) { ?> style = "background-color: yellow;" <?php } ?>>
                                                  <div class="media col-md-3">
                                                      <figure class="pull-left">
                                                          <img class="media-object img-rounded img-responsive" height = "100" width= "200"  src="<?php echo base_url().'/course_imgs/'.$q['courseID'].$q['course_image']; ?>" alt="placehold.it/350x250" >
                                                      </figure>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <h4 class="list-group-item-heading"><?php echo $q['CourseName'];?></h4>
                                                      <p class="list-group-item-text"><?php echo $q['courseDescription'];?> </p>
                                                  </div>
                                                  <div class="col-md-3 text-center">
                                                     
                                          <button type="button" class="btn btn-primary btn-lg btn-block" > Continue </button>
                                         
										  <label style="font-size:15px;"><strong>Rank (Most Enrolled): </strong></label>
                                                <?php
												
												$course_row= $p->loadcourse_ranking();   
											 
												
																for($x=  0;$course_row[$x] !== NULL; $x++){
																
																if($course_row[$x]['courseID']== $q['courseID'])
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
										   <br>
										   										<p><?php 
																				
																				
																				echo "Progress: ".$p->stud_count_lecs($this->session->userdata("username"), $q['courseID'])."/".$p->count_lecs($q['courseID']); ?></p>

										  
                                         </div>
                                            </a>
                                      <?php }//* END IF

									}else echo "No Enrolled Courses Yet! ";
                                      ?>
                                    </div>
                                  </div>
                                            <!-- MODAL XD  -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header" style="background: #2b7dc0;">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Course Title here</h4>
                                              </div>
                                              <div class="modal-body">
                                                 <label><strong>Lectures:</strong> </label> <p class="form-group">79</p>
                                                 <label><strong>Languages</strong></label> <p>English</p>

                                                 <label><strong>Course Description:</strong></label>
                                                 <p>Description here.Description here.Description here.Description here.</p>

                                              </div>
                                              <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-success btn-lg">Take This Course</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                       <!-- END OF MODAL -->   
                                        
                                  </div> <!-- end of box -->
                                </div> <!-- end of row -->
 
      </div> <!-- end of col-md-12 -->
    </div> <!-- end of cover-container-->
  </div> <!-- end of site wrapper container -->

</div>
    



<!--- by gml -->

 

</body>






