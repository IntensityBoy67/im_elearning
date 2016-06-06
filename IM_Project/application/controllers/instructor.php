<?php

class Instructor extends CI_Controller {

    function __construct() {
		//* error_reporting(0);
        parent::__construct();
        $this->load->model('InstructorModel');
    }

	
	
	public function ViewStudProg(){
		
        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
         $this->load->view('ViewStudProg');
    $this->load->view('instructor/footer_view');
	}
	
	
//==================================================================       
 
	
    public function main() {


        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
        $this->load->view('instructor/instructorbody_view');
        $this->load->view('instructor/footer_view');
    }
	
	
	public function re_pass() {
        $this->load->view('instructor/header_view');

	$this->load->view('instructor/navbar_view');
 			$data['flag']= 1;
			   
			$this->load->view("re_pass", $data);
			
		   
				
	}

	
	public function pass_change() {
			
			
		$old_pass =  $this->input->post('old_pass');
		$pass =		 $this->input->post('pass');
		$repass = 	 $this->input->post('repass');


       $this->load->view('HeaderBootstrap2');

       $this->load->view("repass");
		
			
		}
		
		
	public function ViewCourseStats() {

        
        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');

         
		$this->load->model("UserModel");
								
		$stud_model = new UserModel();
		
		//* $data['courses']= $stud_model->loadQuizzesByStud($this->session->userdata("username"));
	
		$data['quiz_taken_lists']= $stud_model->loadQuizTaken_Lists_ByCourse($this->input->get('username'), $this->input->get('course_id'));
		$data['course_info']= $stud_model->getCourseInfo($this->input->get('course_id'));
		$data['username']= $this->input->get('username');

		
        $this->load->view('ViewCourseStats', $data);
        $this->load->view('instructor/footer_view');
    }
	// ====================================================================//

	public function print_quiz_taken_lists(){
		
			$this->load->model("UserModel");
			$stud_model = new UserModel();
			
			$this->load->view('fpdfs/fpdf');
			
			$data['quiz_taken_lists']= $stud_model->loadQuizTaken_Lists_ByCourse($this->input->get("username"), $this->input->get('course_id'));
			$data['course_info']= $stud_model->getCourseInfo($this->input->get('course_id'));

			$this->load->view('print_quiz_taken_lists', $data);
			
	}
//===================================================================

        public function UpdateInstInfo_Proc() {
					  
			$this->load->model('InstructorModel');
			$p = new InstructorModel();
			
			$p->Fname=$this->input->post('Fname');
			$p->Lname=$this->input->post('Lname');
			$p->Vacant_Sched=$this->input->post('Vacant_Sched');
			//$p->Username=$this->input->post('Username');
			//$p->Password= MD5($this->input->post('Password'));
			$p->Gender=$this->input->post('Gender');
			$p->Phonenumber=$this->input->post('Phonenumber');
			$p->question=$this->input->post('question');
			$p->answer=$this->input->post('answer');
			
			 $result=$p->updateInstrutor($this->session->userdata('username'));
		

			if(!$result){
			echo mysqli_error($result);
				
			}else $this->main();
			
		}
	
//===================================================================   

    public function cont_presentation() {

          $this->load->model('UserModel');
		  $p = new UserModel();
		  $p->CourseName=$this->input->post('CourseName');
			
		  $lec_id = $this->input->get('id', TRUE);
			
		  $data=array();


          $data['course_info']=$p->LoadCoursesuser($lec_id);


		//* Check the $data['course_info']['courseID']
		
		
		$data['instrct']=$p->GetTeachinfo($data['course_info']['IdNum']);
		$data['lectures'] = $p->loadLecturesFromCourse($this->input->get('id'));

        $this->load->model('comments');
   
        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');

         $this->load->view('presentation/contpresentation_view');
        $this->load->view('instructor/footer_view');
    }

//===================================================================   
    public function course() {

        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
        $this->load->view('instructor/viewcourse_view');
        $this->load->view('instructor/footer_view');
    }
	
	
//===================================================================   
    public function select_course() {
		
		$this->load->model('InstructorModel');
		$p = new InstructorModel();
		
		
        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
		//$this->load->view('datatables/datatablesheader_view');

		$data['courses']= $p-> loadAssCourses($this->session->userdata('Idnum'));
		
		$this->load->view('instructor/select_course', $data);
        $this->load->view('instructor/footer_view');
		//$this->load->view('datatables/datatablesfooter_view');
		
    }
	
	
	

//==================================================================      


    public function updateInfoForm() {
        
                        $this->load->view('instructor/header_view');
      $this->load->view('instructor/navbar_view');
      $this->load->view('instructor/updateInfoForm');
      $this->load->view('instructor/footer_view');
    } 
	

//====================================================================  
    public function addquiz() {
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url'));

        $this->form_validation->set_rules('course_id', 'Course id', 'required');
        $this->form_validation->set_rules('assement_name', 'Assessment name', 'required');
        $this->form_validation->set_rules('time_limit', 'Time limit', 'required');
      
        $this->form_validation->set_rules('points', 'Points', 'required');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer1', 'Option 1', 'required');
        $this->form_validation->set_rules('answer2', 'Option 2', 'required');
        $this->form_validation->set_rules('answer3', 'Option 3', 'required');
        $this->form_validation->set_rules('answer4', 'Option 4', 'required');
        $this->form_validation->set_rules('canswer1', 'Currect Answer 1', 'required');
        if ($this->form_validation->run() == true) {

            $insert_data['instructor_IDnum'] = $_SESSION['Idnum'];
            $insert_data['courseID'] = $this->input->post('course_id');
            $insert_data['quiz_name'] = $this->input->post('assement_name');
            $insert_data['quiz_timelimit'] = $this->input->post('time_limit');
         
            $insert_data['points'] = $this->input->post('points');
            $insert_data['quiz_question'] = $this->input->post('question');
            $insert_data['quiz_ans1'] = $this->input->post('answer1');
            $insert_data['quiz_ans2'] = $this->input->post('answer2');
            $insert_data['quiz_ans3'] = $this->input->post('answer3');
            $insert_data['quiz_ans4'] = $this->input->post('answer4');
            $insert_data['quiz_ans5'] = $this->input->post('answer5') ? $this->input->post('answer5') : '';
            $insert_data['correct_ans1'] = $this->input->post('canswer1');
            $insert_data['correct_ans2'] = $this->input->post('canswer2') ? $this->input->post('canswer2') : '';
            $insert_data['correct_ans3'] = $this->input->post('canswer3') ? $this->input->post('canswer3') : '';
            $this->db->insert('course_quiz', $insert_data);
            if ($this->db->affected_rows()) {
                 $this->session->set_flashdata('message', 'Success!');
                redirect('instructor/addquiz', 'refresh');
            }
        }

        // set the flash data error message if there is one
        $this->data['message'] = $this->session->flashdata('message');

        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
        $this->load->view('instructor/addquizbody_view', $this->data);
        $this->load->view('instructor/footer_view');
    }

    //====================================================================  
    public function quizmodify() {
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url'));

        $this->form_validation->set_rules('course_id', 'Course id', 'required');
        $this->form_validation->set_rules('assement_name', 'Assessment name', 'required');
        $this->form_validation->set_rules('time_limit', 'Time limit', 'required');      
        $this->form_validation->set_rules('points', 'Points', 'required');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer1', 'Option 1', 'required');
        $this->form_validation->set_rules('answer2', 'Option 2', 'required');
        $this->form_validation->set_rules('answer3', 'Option 3', 'required');
        $this->form_validation->set_rules('answer4', 'Option 4', 'required');
        $this->form_validation->set_rules('canswer1', 'Currect Answer 1', 'required');
        if ($this->form_validation->run() == true) {

            $insert_data['instructor_IDnum'] = $_SESSION['Idnum'];
            $insert_data['courseID'] = $this->input->post('course_id');
            $insert_data['quiz_name'] = $this->input->post('assement_name');
            $insert_data['quiz_timelimit'] = $this->input->post('time_limit');            
            $insert_data['points'] = $this->input->post('points');
            $insert_data['quiz_question'] = $this->input->post('question');
            $insert_data['quiz_ans1'] = $this->input->post('answer1');
            $insert_data['quiz_ans2'] = $this->input->post('answer2');
            $insert_data['quiz_ans3'] = $this->input->post('answer3');
            $insert_data['quiz_ans4'] = $this->input->post('answer4');
            $insert_data['quiz_ans5'] = $this->input->post('answer5') ? $this->input->post('answer5') : '';
            $insert_data['correct_ans1'] = $this->input->post('canswer1');
            $insert_data['correct_ans2'] = $this->input->post('canswer2') ? $this->input->post('canswer2') : '';
            $insert_data['correct_ans3'] = $this->input->post('canswer3') ? $this->input->post('canswer3') : '';
            $this->db->where('quiz_id', $this->uri->segment(3));
            $this->db->update('course_quiz', $insert_data);
            if ($this->db->affected_rows()) {
                 $this->session->set_flashdata('success', 'Success!');
                redirect('instructor/addquiz', 'refresh');
            }
        }
        $this->data['quiz_update'] = $this->db->where('quiz_id', $this->uri->segment(3))->where('instructor_IDnum', $_SESSION['Idnum'])->get('course_quiz')->row();
        // set the flash data error message if there is one
        $this->data['message'] = $this->session->flashdata('message');

        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
        $this->load->view('instructor/updatequizbody_view', $this->data);
        $this->load->view('instructor/footer_view');
    }

//====================================================================      
    public function addlectures() {
		
        if ($this->session->userdata('log_type') == "Instructor") { // if logged in, mo-direct sa homepage...
            
			if($this->input->get('course_id') !== NULL){
            $idn = $this->input->get('course_id');

            ///$this->db->join('instruct_course', 'course.courseID=instruct_course.course_id');
			
			
            $this->load->model("InstructorModel");
            $p= new InstructorModel();

            $array['course'] = $p->loadAssCourses($idn);

          
            $array['lic'] = $p->loadLecturesFromCourse($idn);
			
            $this->load->view('instructor/header_view');
            $this->load->view('instructor/navbar_view');
            $this->load->view('instructor/lecturebody_view', $array);
            $this->load->view('instructor/footer_view');
			
			}else $this->select_course();
            
        }
    }
	
	 public function list_lects() {
		
        if ($this->session->userdata('log_type') == "Instructor") { // if logged in, mo-direct sa homepage...
            
            $idn = $this->session->userdata('Idnum');

            ///$this->db->join('instruct_course', 'course.courseID=instruct_course.course_id');
            $this->load->model("InstructorModel");
            $p= new InstructorModel();

            $data['lecs'] = $p->loadLecsbyInstructor($idn);



            //$course = $this->db->get();
        
 
            $this->load->view('instructor/header_view');
            $this->load->view('instructor/navbar_view');
            $this->load->view('instructor/list_lects', $data);
            $this->load->view('instructor/footer_view');
            
        }
    }
	
	
	 public function list_quizzes() {
		
        if ($this->session->userdata('log_type') == "Instructor") { // if logged in, mo-direct sa homepage...
            
            $idn = $this->session->userdata('Idnum');

            ///$this->db->join('instruct_course', 'course.courseID=instruct_course.course_id');
            $this->load->model("InstructorModel");
            $p= new InstructorModel();
 
            $data['quizzes'] = $p->loadQuizzesbyInstructor($this->session->userdata('Idnum'));
        
 
            $this->load->view('instructor/header_view');
            $this->load->view('instructor/navbar_view');
            $this->load->view('instructor/list_quizzes', $data);
            
        }
    }
	
	
 //=======================================================================
 
 //=======================================================================
 
        public function lictureinsertion()
    {
        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'ppt|pptx|doc',
            'max_size' => '5000',
            'max_width' => '5024',
            'max_height' => '3766',

        );
        $this->load->library('upload');
        $this->upload->initialize($config);

        $files = $_FILES;
        $count = count($_FILES['fields']['name']);
        for ($i = 0; $i < $count; $i++) {
            $_FILES['fields']['name'] = $files['fields']['name'][$i];
            $_FILES['fields']['type'] = $files['fields']['type'][$i];
            $_FILES['fields']['tmp_name'] = $files['fields']['tmp_name'][$i];
            $_FILES['fields']['error'] = $files['fields']['error'][$i];
            $_FILES['fields']['size'] = $files['fields']['size'][$i];

            $this->upload->do_upload('fields');
            $upload_data_i = $this->upload->data();
            $data_ary = array(
                'licture_name' => $upload_data_i['file_name'],
                'courseID' => $this->input->post('c_id'),
            );
            $this->db->insert('lictures', $data_ary);
        }
        $this->addlectures();
    }
              

//========================================================================
    public function announcement() {
        $data = array();
        $this->load->model('InstructorModel');
        $p = new InstructorModel;
        $data['edit_announcement'] = $p->get_announcement($this->input->get('modify_id'));


        $Idnum = $this->session->userdata('Idnum');
        $data['course'] = $p->loadAssCourses($Idnum);

        //* $data['instruct_course'] = $p->selectInstructorCourseAssigned($Idnum);
        $data['announcement'] = $p->getallann();
        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
        $this->load->view('instructor/announcement_view', $data);
        $this->load->view('instructor/footer_view');
    }

//====================================================================
    public function deleteAnnocement() {
        $this->load->model('InstructorModel');
        $p = new InstructorModel();
        $p->announcement_id = $this->input->post('announcement_id');
        $p->flag = $_POST['flag'] = '2';
        $result = $p->deleteAnn();
        if (!$result) {
            echo mysqli_error($result);
        } else {
            redirect('instructor/announcement', 'refresh');
        }
    }

//===================================================================    

    public function video_lec_insertion() {
		
        if ($this->session->userdata('Idnum') !== NULL) { // if logged in, mo-direct sa homepage...
		
            $config = array(
                'upload_path' => './uploads/',
                'allowed_types' => 'ppt|pptx|docx|doc|pdf',
                'max_size' => '5000',
                'max_width' => '5024',
                'max_height' => '3766'
            );
            $this->load->library('upload');
            $this->upload->initialize($config);
            
			$this->upload->do_upload('fields'); //* Notes File `Field` Name 
			
            $upload_data_i = $this->upload->data();
			
            $idnum = $this->session->userdata('Idnum');
            
			$data_ary = array(
                'course' => $this->input->post('course'),
                'lec_title' => $this->input->post('lec_title'),
                'embed_url' => $this->input->post('embed_url'),
                'Idnum' => $idnum,
                'lecture_name' => $upload_data_i['file_name'],
                'date_uploaded' => $this->input->post('date_uploaded')
            );

            $this->db->insert('video_lectures', $data_ary);

            $last_lec_id= $this->db->insert_id();

            $notif_array = array(

                    'nodification_to'=> $this->input->post('course'),
                    'nodification_from'=> $idnum,
                    'notif_to_table'=> 'course',
                    'notif_from_table'=> 'instructors',
                    'nodification_content'=> "Newly Uploaded Lecture!",
                    'new_data_id'=> $last_lec_id,
                    'notif_type'=> 1,
                    'notif_desc'=> "Newly Uploaded Lecture!",
                    'nodification_status'=> 1

                );

            $this->db->insert('nodification', $notif_array);


            redirect('instructor/list_lects?msg=The lecture is successfully created');
        }
    }

//===================================================================
    public function announcementsend() {

        $this->load->model('InstructorModel');
        $p = new InstructorModel();
        $p->Created_by = $this->input->post('Created_by');
        $p->courseID = $this->input->post('courseID');
        $p->announcement_date_createdby = $this->input->post('announcement_date_createdby');
        $p->announcement_title = $this->input->post('announcement_title');
        $p->announcement_content = $this->input->post('announcement_content');
        $p->flag = $this->input->post('flag');

        if ($this->input->post('update_id')) {
            // if set update id 
            $result = $p->updateinstrucAnn();
        } else {
            // if not set update id 
            $result = $p->addinstrucAnn();


         $notif_array = array( 

                    'nodification_to'=> $p->courseID,
                    'nodification_from'=> $this->input->post('announcement_date_createdby'), //*IF notification is from user notif_from is 0
                    'notif_to_table'=> 'course',
                    'notif_from_table'=> 'instructors',
                    'nodification_content'=> 'Newly Posted Announcement!',
                    'new_data_id'=> $result,
                    'notif_type'=> 4,
                    'notif_desc'=> "Newly Posted Announcement!",
                    'nodification_status'=> 1

                );
         

         $p->insertNotif($notif_array);


        }
        if (!$result) {
            echo mysqli_error($result);
        } else {
            redirect('instructor/announcement', 'refresh');
        }
    }
//===================================================================


    public function presentation() {

   $this->load->model('UserModel');
$p = new UserModel();
//$p->CourseName=$this->input->post('CourseName');

$data=array();

 
 $data['course_info']=$p->LoadCoursesuser($this->input->get('course_id'));

//* $data['gg1']=$p->selectLectures();

//* echo $data['course_info']['IdNum'];

 $data['instrct']=$p->GetTeachinfo($data['course_info']['IdNum']);
 $data['lectures'] = $p->loadLecturesFromCourse($this->input->get('id'));

$this->load->view ('instructor/header_view');
  $this->load->view('instructor/navbar_view');
   $this->load->view('instructor/presentation_view', $data);


   $this->load->view('instructor/footer_view');
        }
    

    public function replace_quiz(){

		$this->load->view('instructor/header_view');
		$this->load->view('instructor/navbar_view');
		$this->load->model('instructormodel');
		$teach_model = new Instructormodel();

	
		$this->session->set_userdata(array('quiz_id'=>NULL));
	

		$teach_id = $this->session->userdata('Idnum');
  

    //* If Accessed through Presentation/Lecture

		$data['arch_quizzes']= $teach_model->loadArchQuizzes($this->input->get('lec_id'));  
    
         $this->load->view('instructor/replace_quiz', $data);
         $this->load->view('instructor/footer_view');   

    }
	
	
    public function quizmodule(){

    $this->load->view('instructor/header_view');
    $this->load->view('instructor/navbar_view');


    $this->load->model('instructormodel');
    $teach_model = new Instructormodel();

	
	$this->session->set_userdata(array('quiz_id'=>NULL));
	

    $teach_id = $this->session->userdata('Idnum');
    $data['teach_id']= $teach_id;


    if($this->input->get('lec_id') === NULL) //*If Access Directly through the Make Quiz Link

		$data['courses']= $teach_model->loadAssCourses($teach_id); //* Load courses for select data

    else

		$data['lec_info']= $teach_model->loadLecInfo($this->input->get('lec_id'));  
    
    $this->load->view('instructor/quizmodule_view', $data);
    $this->load->view('instructor/footer_view');   

    }

    public function loadLecturesByQuiz(){

    $this->load->model('instructormodel');
    $teach_model = new Instructormodel();
    
	$course_id= $this->input->post('course_id');
	
    $lectures= $teach_model->loadLecturesByQuiz($course_id);

?>

	<script>
	
	$("#lec_video_id").change(function() {
				
				$("#quiz_name").val("Quiz "+ $("#lec_video_id option:selected").text());

			});
			
	</script>

<?php
    echo "<select required name = 'lec_video_id' id = 'lec_video_id' class= 'form-control'>";
    echo "<option>Select Lecture</option>";

    foreach($lectures as $row){

        echo "<option value = '$row[lec_video_id]'  >". $row['lec_title'] ."</option>";

    }

    echo "</select>";

    }


public function InsertQuizInfo(){
        
    
    $this->load->model('InstructorModel');
    $teach_model = new Instructormodel();
	
	
	
		
		
	if($this->input->post('lec_video_id') !== NULL && $this->session->userdata('quiz_id') === NULL){

		//*Incase of Accidental Page Redirects

		$quiz_info['lec_video_id'] = $this->input->post('lec_video_id');
		$quiz_info['quiz_name'] = $this->input->post('quiz_name');
		$quiz_info['course_id'] = $this->input->post('course_id');
		$quiz_info['quiz_desc'] = $this->input->post('quiz_desc');
		$quiz_info['quiz_num_quest'] = $this->input->post('quiz_num_quest');
		$quiz_info['quiz_time_stat'] = $this->input->post('quiz_time_stat');
		$quiz_info['quiz_time_limit'] = $this->input->post('quiz_time_limit');
		$quiz_info['quiz_pass_percent'] = $this->input->post('quiz_pass_percent');
		$quiz_info['quiz_stat'] = 2; //* 2 stands for unfinished quiz
		$quiz_info['quiz_createdby_id'] = $this->session->userdata('Idnum');
		$quiz_info['quiz_time_limit'] = $this->input->post('quiz_time_limit');
		$quiz_info['quiz_recstat_id'] = $quiz_info['flag'] = 1;  

		
		$quiz_session['quiz_id']= $teach_model->insertQuizInfo($quiz_info);
		

		
		$quiz_session['lec_video_id']= $quiz_info['lec_video_id'];
			
		$quiz_session['quiz_name']= $quiz_info['quiz_name'];
		$quiz_session['quiz_desc']= $quiz_info['quiz_desc'];
		$quiz_session['quiz_num_quest']= $quiz_info['quiz_num_quest'];
	   
	   
		//* Optional Session Data

		 $quiz_session['quiz_curr_part']= 1;



		$this->session->set_userdata($quiz_session);
		
		

	}

	$this->makequestions();



    }

  public function makequestions()
    {


    $this->load->model('instructormodel');
    $teach_model = new Instructormodel();



    $this->load->view('instructor/header_view');
    $this->load->view('instructor/navbar_view');





    $teach_id= $this->session->userdata('IdNum');

   
 
    $this->load->view('instructor/makequestions');

    $this->load->view('instructor/footer_view');   

    }

 public function InsertQuests(){



    $this->load->model('instructormodel');

 
if(!empty($this->session->userdata('quiz_id')) && !empty($this->input->post('quiz_stat'))){
 


    $teach_model = new Instructormodel();
    $teach_id= $this->session->userdata('IdNum');
    $quiz_stat = $this->input->post('quiz_stat');
    $sum_pts= 0;


    $num_quests =  $this->session->userdata('quiz_num_quest');

    $quiz_id= $question_info['quiz_id'] = $this->session->userdata('quiz_id');

    for($i = 0; $i < $num_quests; $i++){

   //* $teach_model->insertQuestion($quest_info);

    $question_info['quiz_question'] = $this->input->post('quiz_question')[$i];    

    $question_info['A'] = $this->input->post('A')[$i];
    $question_info['B'] = $this->input->post('B')[$i];
    $question_info['C'] = $this->input->post('C')[$i];
    $question_info['D'] = $this->input->post('D')[$i];



    $question_info['quiz_pts'] = $this->input->post('pts')[$i];    
    $question_info['quiz_cor_ans'] = $this->input->post('cor_ans')[$i];    
    $question_info['quiz_quest_date_created'] = date("Y-m-d");

    $question_info['quiz_question'] = $this->input->post('quiz_question')[$i];

    $teach_model->insertQuestion($question_info);

    $sum_pts += $question_info['quiz_pts'];

}   
        if($quiz_stat == 1) {


            $upd_data['quiz_stat'] = $quiz_stat;
            $upd_data['quiz_total_score'] = $sum_pts;

            $teach_model->UpdateQuiz($quiz_id, $upd_data);
			$teach_model->UpdateArchQuiz($quiz_id, $this->session->userdata('lec_video_id'));
			
            //*Insert Notification for Quiz to Students

             $course_info = $teach_model->getLecInfo($this->session->userdata('lec_video_id'));


         $notif_array = array( 

                    'nodification_to'=> $course_info['course'],
                    'nodification_from'=> $this->session->userdata('Idnum'), //*IF notification is from user notif_from is 0
                    'notif_to_table'=> 'course',
                    'notif_from_table'=> 'instructor',
                    'nodification_content'=> "Newly Created Quiz!",
                    'new_data_id'=> $quiz_id,
                    'notif_type'=> 3,
                    'notif_desc'=> "Newly Created Quiz!",
                    'nodification_status'=> 1

                );

          $this->db->insert("nodification", $notif_array);

        }



    
 

        $this->viewQuizInfo($this->session->userdata('quiz_id'));



}else $this->makequestions();



 
    }

public function viewStuds(){

    $course_id= $this->input->get('course_id');

        $this->load->model('instructormodel');

        $teach_model = new Instructormodel();


      $this->load->view('instructor/header_view');

      $this->load->view('instructor/navbar_view');


	  $data['studs']= $teach_model->loadEnrolledStuds($this->input->get('course_id'));
	  
      $this->load->view('instructor/viewStuds', $data);

        $this->load->view('instructor/footer_view');



}

	public function enrolled_stud_print(){
		
			$this->load->model("InstructorModel");
			$teach_model = new InstructorModel();
			
			$data['enrollees']= $teach_model->loadEnrolledStudsInfo($this->input->get('course_id'));
			$data['course_info']= $teach_model->getCourseInfo($this->input->get('course_id'));	
			
			$this->load->view('fpdfs/fpdf');
			
			$this->load->view('instructor/enrolled_stud_print', $data);
			
	}
	

public function viewQuizInfo($quiz_id = ''){

        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');


        $quiz_id = (!empty($quiz_id)) ? $quiz_id : $this->input->get('quiz_id');


        $this->load->model('instructormodel');

        $teach_model = new Instructormodel();
	
	
        $data['quiz_info'] = $teach_model->loadQuizInfo($quiz_id);
        $data['questions'] = $teach_model->loadQuests($quiz_id);
 
        //*Load Quiz Info and Questions


        $this->load->view('instructor/viewQuizInfo', $data);

        $this->load->view('instructor/footer_view');

    }
	
	
public function viewQuizInfoStud($quiz_id = ''){
	
	
	    $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
		
		$quiz_id = $this->input->get('quiz_id');
		$username = $this->input->get('username');
		
        $this->load->model('instructormodel');

        $teach_model = new Instructormodel();
	
		$data['quiz_taken_info']= $teach_model->loadQuizTaken($quiz_id, $username);
		
		$data['quiz_info'] = $teach_model->loadQuizInfo($quiz_id);

		$data['questions'] = $teach_model->loadQuests($quiz_id);
			
		$data['quiz_id'] = $quiz_id;
		

        $this->load->view('instructor/ViewQuizInfoStud', $data);

        $this->load->view('instructor/footer_view');
	

	
}

//===================================================================
    public function addnotes() {

        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
        $this->load->view('instructor/notesbody_view');
        $this->load->view('instructor/footer_view');
    }

//===================================================================       
    public function announcementview() {

        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
        $this->load->view('instructor/announcementview_view');
        $this->load->view('instructor/footer_view');
    }
//==================================================================
    public function Studentview(){
        $data=array();
        $this->load->model('InstructorModel');
        $p = new InstructorModel;
        $Idnum=$this->input->post('Idnum');
        $data['user']= $p->selectUser();
        $data['instruct_course']= $p->selectInstructorCourseAssigned($Idnum);
        $data['user_course']= $p->selectStudentCourse();
        $data['course']= $p->selectCourse();
        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');
        $this->load->view('instructor/viewStudents',$data);
        $this->load->view('instructor/footer_view');    

        }
//======================================================================
        public function courselist() {

        $idn = $this->session->userdata('Idnum');
     
        $this->load->model("InstructorModel");
        $p = new InstructorModel();

        $courses = $p->loadAssCourses($idn);

        $array['courses'] = $courses;
        $array['update_course'] = '';
    
        $this->load->view('instructor/header_view');
        $this->load->view('instructor/navbar_view');

        $this->load->model('InstructorModel');
        $p = new InstructorModel();

        $data['courses'] = $p->loadAssCourses($idn);

        $this->load->view('instructor/courselistbody_view', $data);

    }
   public function ViewQuizResultsLists() {

		     $this->load->model('InstructorModel');
			$p = new InstructorModel();
			$data=array();

			$data['quiz_info'] = $p->loadQuizInfo($this->input->get('quiz_id'));
			$data['questions'] = $p->loadQuests($this->input->get('quiz_id'));
			$data['quiz_taken'] = $p->loadQuizTaken($this->input->get('quiz_id'));
			$data['quiz_id'] =  $this->input->get('quiz_id');
			
			$data['no_enrollees'] = $p->count_enrollees($data['quiz_info']['course_id']);
			
			
			$this->load->view ('instructor/header_view');
			$this->load->view('instructor/navbar_view');
		    $this->load->view('instructor/ViewQuizResultsLists', $data);


		   $this->load->view('instructor/footer_view');
  
  }
   
 //=====================================================================================
	
   public function ListLectures() {

		  $this->load->model('InstructorModel');
		$p = new InstructorModel();

		$data=array();

		 $data['lecs'] = $p->loadLecturesFromCourse($this->input->get('course_id'));

		$this->load->view ('instructor/header_view');
		  $this->load->view('instructor/navbar_view');
		   $this->load->view('instructor/ListLectures', $data);


		   $this->load->view('instructor/footer_view');
   }
   
 //=====================================================================================
     public function courseUpdate() {
        $idn = $this->session->userdata('Idnum');
        $config['upload_path'] = './assets/img/course/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = 100;
        //$config['max_width'] = 1024;
        //$config['max_height'] = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('course_image')) {
            $data = $this->upload->data();
            $insert_data['course_image'] = $data['file_name'];
        }
        $insert_data['course_note'] = $this->input->post('course_note');
        $insert_data['quiz_time_limit'] = $this->input->post('quiz_time_limit');
        $this->db->where('instruct_course_id', $this->input->post('update_id'));
        $this->db->where('IdNum', $idn);
        $this->db->update('instruct_course', $insert_data);
        if ($this->db->affected_rows()) {
               redirect('instructor/courselist', 'refresh');
        } else {
            show_error('Please try again later');
        }
    }
    

}
