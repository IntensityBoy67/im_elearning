<style type="text/css">
    .warpper{
        width: 100%;
    }
    .warpper table{
        margin: 50px auto;
        text-align: center;
    }
    h1{
        text-align: center;
    }
    .error{
        color: red;
    }
</style>
<div class="col-md-6">

            <div class="row">
                <div class="box">
                    <div class="col-lg-8">
                        <form action="<?php echo base_url();?>/index.php/IM/userCourse" id="form_reg" method="post" accept-charset="utf-8">
                    <div class="container" style="width: 925px;">
                                      <div class="row">
                                      <div >
                                          <h1 class="text-center">Courses Information</h1>
                                          <br>
                                          <br>
                                          <div class="list-group">
                                              <?php
                                              $course_id = $this->uri->segment(3);
//                                              foreach($u_course as $user_courses)
//                                                  $enroll_course = $user_courses['course_id'];
//                                              print_r(count($enroll_course));
                                              foreach ($course as  $result)
                                                  # code...
                                              $course_id = $result['courseID'];
                                              $course_name = $result['CourseName'];
                                              $price = $result['price'];
                                              $course_type = $result['courseType'];
                                              ?>

<!--                                              <a href="--><?php //echo site_url('IM/presentation')?><!--" class="list-group-item ">-->
                                                  <div class="media col-md-3">
                                                      <figure class="pull-left">
                                                          <img class="media-object img-rounded img-responsive"  src="http://placehold.it/350x250" alt="placehold.it/350x250" >
                                                      </figure>
                                                  </div>
                                                    <div class="col-md-6">
                                                      <h4 class="list-group-item-heading"><?php echo $result['CourseName'];?> </h4>
                                                    <input type="hidden" name="course_id" id="course_id" value="<?php echo $result['courseID'];?>">
                                  <input type='hidden' class='form-control' name="user_email" value = "<?php echo $this->session->userdata('Email'); ?>"/>

                                                        <?php echo form_error('user_email', '<div class="error">', '</div>'); ?>
                                                        <input type="hidden" name="course_type" id="course_id" value="<?php echo $result['courseType'];?>">

                                                    <input type="hidden" value="<?php echo $course_type; ?>" class="list-group-item-heading">

                                                      <p class="list-group-item-text"> <?php echo $result['courseDescription'];?></p>

                                                  </div>
                                                  <br>
                                                  <div class="col-md-3 text-center">
                                                     <br>
                                                      <?php
                                                      $this->db->select('*');
                                                      $this->db->from('user_course');
                                                      $this->db->where('Email',$this->session->userdata('Email'));
                                                      $this->db->where('course_id',$course_id);
                                                      $query = $this->db->get();
                                                      $result = $query->result_array();
                                                      if($result)
                                                      {
                                                          echo "Course Enrolled Already";
                                                      }
                                                      else
                                                      {
                                                          ?>
                                                          <?php if($course_type == 'paid')
                                                      {
                                                          ?>
                                                          
														<p class= "label label-warning">Price: P<?php echo $price; ?> </p>
                                                      <?php } 
                                                      else{
                                                          ?>
                                                          <button type="submit" name="submit"
                                                                  class="btn btn-primary btn-lg btn-block"> Take this
                                                              course
                                                          </button>
														  
												<!-- <p class= "btn btn-info">Price: Free</p> -->

                                                      <?php }?>
                                                          <?php
                                                      }

                                                      ?>
                                                           </div>
														   
														   <br>
														     <?php if($course_type == 'paid')
                                                      {?>
													  </div></div></div>
													  
													  <hr /> 
													  
														  <table>
											 <tr><td><p class = 'text text-success'>You can contact the Admin for availing the paid course...</p>
											 
														 
															<tr><td><p class= 'text text-danger'>Email:</p><td><p class= 'text text-info'>admin@impacts.ph</p>
															<tr><td><p class= 'text text-danger'>Contact Number:</p><td><p class= 'text text-info'>Local 522-0972</p>
															<tr><td><p class= 'text text-danger'>Local Address:</p><td><p class= 'text text-info'>Quimonda Bldg., 2nd Floor, Integrated Maritime Inc.</p></td></tr>

                              <tr><td><p class= 'text text-danger'>Account Details:</p></td><td><p>Bank code: 5051<br>Domestic account number: 1322617<br>IBAN: DK5750510001322617</p></td></tr>
														  </table>
<!--                                                 </a>-->
													  <?php } ?>
                                            </form>
                            <?php
                        if($course_type == 'paid')
                        {
                            /*echo "<br> <form id = \"paypal_checkout\" action = \"https://www.paypal.com/cgi-bin/webscr\" method = \"post\">
    <input name = \"cmd\" value = \"_cart\" type = \"hidden\">
    <input name = \"upload\" value = \"1\" type = \"hidden\">
    <input name = \"no_note\" value = \"0\" type = \"hidden\">
    <input name = \"bn\" value = \"PP-BuyNowBF\" type = \"hidden\">
    <input name = \"tax\" value = \"0\" type = \"hidden\">
    <input name = \"rm\" value = \"2\" type = \"hidden\">

    <input name = \"business\" value = \"giannamarielanete@gmail.com\" type = \"hidden\">
    <input name = \"handling_cart\" value = \"0\" type = \"hidden\">
    <input name = \"currency_code\" value = \"PHP\" type = \"hidden\">
    <input name = \"lc\" value = \"PHP\" type = \"hidden\">
    <input name = \"return\" value = \"http://localhost/IM_Project/index.php/IM/userCourse\" type = \"hidden\">
    <input name = \"cbt\" value = \"http://localhost/IM_Project/index.php/IM/courseEnroll\" type = \"hidden\">
    <input name = \"cancel_return\" value = \"http://localhost/IM_Project/index.php/IM/courseEnroll/$course_id\" type = \"hidden\">
    <input name = \"custom\" value = \"\" type = \"hidden\">

    <div id = \"item_1\" class = \"itemwrap\">
        <input name = \"item_name_1\" value = \"$course_name\" type = \"hidden\">
        <input name = \"quantity_1\" value = \"1\" type = \"hidden\">
        <input name = \"amount_1\" value = \"$price\" type = \"hidden\">
        <input name = \"shipping_1\" value = \"0\" type = \"hidden\">
    </div>
    <input type=\"image\" name=\"submit\" border=\"0\"
           src=\"https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif\"
           alt=\"PayPal - The safer, easier way to pay online\" /> <br> <br>
</form>
";*/
                        }?>

                    </div>
                                          </div>
                                    </div>
                                  </div>




<?php
