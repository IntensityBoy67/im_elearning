<style type="text/css">
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
    #ca{
        background-color: #fff;
    }
</style>
<div style="height: 100px;"></div>

<div class="container">
    <div class="row well">
        <div class="jumbotron" id="ju" style="text-align:center;color:#2F7EC1;">
            <h1>Assessment</h1>
                        
            <?php echo validation_errors('<span class="error">', '</span>'); ?>
        </div>
        <div class="col-md-12" id="question" >
            <?php echo form_open("instructor/addquiz",array('id' => 'quiz_form'));?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">	
                            <label>Assigned Course/s:</label>
                            <?php
                            $courses = $this->db->select('CourseName,courseID')->from('course')
                                    ->join('instruct_course','instruct_course.course_id = course.courseID')
                                    ->where('instruct_course.IdNum',$_SESSION['Idnum'])
                                    ->get()
                                    ->result();    
                            
                            ?>
                            <select class="form-control"  name="course_id" id="course_id">
                                <?php
                                foreach($courses as $course){
                                    ?>
                                <option value="<?=$course->courseID?>"><?=$course->CourseName?></option>
                                <?php
                                }
                                ?>                                
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label>Assessment Name:</label><span class="required">*</span>
                            <input type="text" class="form-control" name="assement_name" id="assement_name"  required/><br>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Assessment Time Limit:<span class="required">*</span></label>
                            <input type="time" name="time_limit" id="time_limit" class="form-control" placeholder="00.00.00" required/>
                        </div>
                        <div class="col-md-6">
                            <label>Points for Questions</label><span class="required">*</span>
                            <select class="form-control" name="points" id="points">
                                <option>10 points</option>
                                <option>20 points</option>
                                <option>30 points </option>
                                <option>40 points</option>
                                <option>50 points</option>
                            </select>

                        </div>

                    </div>
                    <br>
                    <div class="form-group">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Assessment Image:<span class="required">(Optional)</span></label>
                            <input type="file" />
                        </div>

                    </div>
                </div>


                <label class="control-label">Question<span class="required">*</span></label>
                <input class="form-control"  type="text" id="question" name="question"
                       title="Please enter question" required /><br>
                <label>Option 1</label><span class="required">*</span>
                <input class="form-control" type="text" name="answer1" id="answer1" required/><br>
                <label>Option 2</label><span class="required">*</span>
                <input class="form-control" type="text" name="answer2" id="answer2" required/><br>
                <label>Option 3</label><span class="required">*</span>
                <input class="form-control" type="text" name="answer3" id="answer3" required/><br>
                <label>Option 4</label><span class="required">*</span>
                <input class="form-control" type="text" name="answer4" id="answer4" required/><br>
                <label>Option 5</label><span class="required">(Optional)</span>	
                <input class="form-control" type="text" name="answer5" id="answer5" /><br>		
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">

                            <label>Answer 1:</label><span class="required">*</span>
                            <select  name="canswer1" id="canswer1" class="form-control"
                                     title="Please select correct answer" required >
                                <option value="">Select one</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                                <option value="5">Option 5</option>
                            </select>
                        </div >
                        <div class="col-md-4">
                            <label>Answer 2:</label><span class="required">(Optional)</span>
                            <select  name="canswer2" id="canswer2" class="form-control"
                                     title="Please select correct answer" >
                                <option value="">Select one</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                                <option value="5">Option 5</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Answer 3:</label><span class="required">(Optional)</span>
                            <select  name="canswer3" id="canswer3" class="form-control"
                                     title="Please select correct answer"  >
                                <option value="">Select one</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                                <option value="5">Option 5</option>
                            </select>

                        </div>	

                    </div>



                </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">ADD</button>
            <a class="btn">CANCEL</a>
            <input type="hidden" name="task" value="ADD" />
        </div>



        </form>

    </div>

</div><br>
<div class="jumbotron" id="ca">
    <div class="dropdown"> 
        <div class="col-md-2">
            <select  name="select1" id="select1" class="form-control">
                <option>Course 1</option>
                <option>Course 2</option>
                <option>Course 3</option>
            </select>
        </div>


    </div>
    <br>

    <div class="jumnotron">
        <table id="answers" cellpadding='0' cellspacing='0' border='0' style='width:100%;' class='datatable1 table table-striped table-bordered'>
            <thead>
                <tr>

                    <th>Quiz Name</th>
                    <th>Answer1</th>
                    <th>Answer2</th>
                    <th>Answer3</th>
                    <th>Answer4</th>
                    <th>Answer5</th>
                    <th>Correct Answer 1</th>
                    <th>Correct Answer 2</th>
                    <th>Correct Answer 3</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $course_quizs = $this->db->where('instructor_IDnum',$_SESSION['Idnum'])->get('course_quiz')->result();
                foreach($course_quizs as $course_quiz){
                ?>                
                <tr>
                    <td><?=$course_quiz->quiz_name?></td>
                    <td><?=$course_quiz->quiz_ans1?></td>
                    <td><?=$course_quiz->quiz_ans2?></td>
                    <td><?=$course_quiz->quiz_ans3?></td>
                    <td><?=$course_quiz->quiz_ans4?></td>
                    <td><?=$course_quiz->quiz_ans5?></td>
                    <td><?=$course_quiz->correct_ans1?></td>
                    <td><?=$course_quiz->correct_ans2?></td>
                    <td><?=$course_quiz->correct_ans3?></td>
                    <td><a href="<?=  site_url('instructor/quizmodify/'.$course_quiz->quiz_id)?>">Update</a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>		


</div>


</div>