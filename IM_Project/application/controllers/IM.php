<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class IM extends CI_Controller {

    public function UserEmailcheck() {

        $this->load->view('HeaderBootstrap2');
        $this->load->view('UserEmailcheck');
    }

    public function forgot_pass() {
		
        $this->load->model('UserModel');
        $p = new UserModel();
		
		if($this->input->post('Email') !== NULL || $this->input->post('username') !== NULL){
		
		
			$p->username = $this->input->post('username');
			
			$user_info= $p->getUserInformation();
			
			if($this->input->post('Email') !== NULL){
						
				$this->load->view('HeaderBootstrap2');
				
				if($p->checkUserEmail($this->input->post('Email')) >= 1){
					$data['email']= 1;
					
				
				$key_id= md5($user_info['stud_id']);
				 
				$config = array(
				
				'protocol'=>'smtp',
				'smtp_host'=> 'ssl://smtp.googlemail.com',
				'smtp_port'=> '465',
				'smtp_user'=> 'cjcrusher815@gmail.com',
				'smtp_pass'=> 'richelle123',
				'mailtype'=> 'html',
				'charset'=> 'iso-8859-1',
				'wordwrap'=> TRUE
				
				);
				
				$this->load->library('email', $config);

				$message = "You can now succesfully change your password";
				
				$this->email->set_newline("r\n");

				$message = "<a href= 're_pass?key_id=".$key_id."'>Click Here</a> to go to the Change Password Page";
				
				$this->email->set_newline("r\n");
				
				$this->email->set_newline("r\n");				   
				   
				$this->email->from('cjcrusher815@gmail@gmail.com'); // change it to yours
				  
				$this->email->to($this->input->post('Email')); // change it to yours
				  
				$this->email->subject('Resume from JobsBuddy for your Job posting');
				
				$this->email->message($message);

				
			  if($this->email->send())
			 {
			  echo 'Email sent.';
			 }
			 else
			{
			 show_error($this->email->print_debugger());
			}
			
		}else $data['flag']= 0;
				
				$this->load->view("forgot_pass_confirm", $data);
				
				//* mail(); here...
				
				
				
			}
			
			else if($this->input->post('username') !== NULL){
 				
				 if($user_info['answer'] == $this->input->post('answer'))
					 
					 $answer_flag = 1;
					 
				else 
					
					$answer_flag = 0;
				
			$this->re_pass($answer_flag);
			
			}
				
			
	}else $this->UserEmailcheck();

		
    }
	
		
	public function re_pass($answer_flag = '') {
				
				
		
		   if($answer_flag !== NULL){
			   
			   
		   $this->load->view('HeaderBootstrap2');
			$data['flag']= $answer_flag;
			   
			$this->load->view("re_pass", $data);
			
		   }
				
	}

	
	
	    public function change_pass_user() {
			
			       $this->load->view('HeaderBootstrap2');
/*
		$old_pass =  $this->input->post('old_pass');
		$pass =		 $this->input->post('pass');
		$repass = 	 $this->input->post('repass');
*/
		$data['flag']= 1;
		
		$this->load->view("re_pass", $data);

       $this->load->view('footerUser');

       
			
		}

		
		
	    public function pass_change() {
			
			
		$old_pass =  $this->input->post('old_pass');
		$pass =		 $this->input->post('pass');
		$repass = 	 $this->input->post('repass');


       $this->load->view('HeaderBootstrap2');

       $this->load->view("repass");
		
			
		}

    public function resultIDU() {
        $this->load->model('UserModel');
        $p = new UserModel();
        $p->Email = $this->input->post('Email');
        $p->question = $this->input->post('question');
        $p->answer = $this->input->post('answer');
        $result = $p->checkIDU();

        $data = array();
        $data = $p->getOneviewU();
        if ($data == NULL) {
            echo mysqli_error($data);
        }
        $this->load->view('HeaderBootstrap2');
        $this->load->view('ChangepassU', $data);
    }

    public function UpdatePassU() {
        $this->load->model('UserModel');
        $p = new UserModel();
        $p->Email = $this->input->post('Email');
        $p->password = MD5($this->input->post('password'));
        $result = $p->updateUser();

        if ($result == NULL) {
            echo mysqli_error($result);
        }

        redirect('IM/index', 'refresh');
    }

    public function validateLogin() {
	
	//diri kay check if sakto ang username and password
	
	error_reporting(0);
	
        if ($this->session->userdata('is_logged_in') == 1) {
            redirect('', 'refresh');
        } else {
            $data = array();
            $this->load->model('UserModel');
            $p = new UserModel();
            $p->username = $this->input->post('username');
            $p->password = MD5($this->input->post('password'));
            

            $result = $p->checkUser();

            if ($result == 0) { //If result returns 0 indicates user does not yet exist..
                redirect('', 'refresh');
                echo mysqli_error($result);
            } else { 
                $this->setSession();
            }
        }
    }

    public function emailvalidate(){
            $this->load->model("UserModel");

            $p= new UserModel();



            echo $p->checkEmail($this->input->post('email'));

    }

    public function setSession() {
		
        $this->load->model('UserModel');
        $p = new UserModel();
        $p->username = $this->input->post('username');
        $data = array();
        $data = $p->getUserInformation(); //diri imong gi query and sulod atong account
        //then diri create an array, ang variables ra nga imong gusto i-add sa session ang ibutang...
	
		session_start();
	
		$_SESSION['is_log_in']= 1;
			
        $sess_array = array(
            'Email' => $data['Email'],
            'username' => $data['username'],
            'password' => $data['password'],
            'Fname' => $data['Fname'],
            'Lname' => $data['Lname'],
            'question' => $data['question'],
            'answer' => $data['answer'],
            'is_logged_in' => 1,
			'log_type'=> "student"
        );

        $this->session->set_userdata($sess_array); 

        redirect('', 'refresh'); 
    }

    public function logout() {
        $this->session->sess_destroy();
		$this->session->set_userdata(array('is_logged_in'=>0)); 
		
		
		session_start();
	
	
		unset($_SESSION['is_log_in']);
	
		redirect('', 'refresh');
    }

    public function index($flag = '') {
	
	

	//* error_reporting(0);

		
        if(!isset($_SESSION['is_log_in'])){ //* is_logged_in is 1 == logged in

		$data = array();
		
		
		
			if(isset($flag['email']))
				$data['email'] = 1;
	
			if(isset($flag['username']))
				$data['username'] = 1;
	
			if(isset($flag['pass']))
				$data['pass'] = 1;
			
			
			
			$this->load->view('HeaderBootstrap2');
            $this->load->view('NavUser');
            $this->load->view('IMhome', $data); //*Home Page
            $this->load->view('footerUser');

		}else {
			
            $this->load->view('HeaderBootstrap2');
            $this->load->view('NavUser');		
			$this->load->model("UserModel");
			$p = new UserModel();
			
			$data['anns'] = $p->loadUserAnnouncements($this->session->userdata('username'));
			
            $this->load->view('LandingPage', $data);//*User Profile 
			
            $this->load->view('footerUser');

			

        }
		
		
    }
	

    public function InputaddUser() {

        $this->load->model('UserModel');
        $p = new UserModel();
		
		
        $p->Fname = $this->input->post('Fname');
        $p->Lname = $this->input->post('Lname');
        $p->Email = $this->input->post('Email');
        $p->username = $this->input->post('username');
        $p->password = md5($this->input->post('password'));
        $p->flag = 1;
        $p->question = $this->input->post('question');
        $p->answer = md5($this->input->post('answer'));
		
		$user_info = $p->checkUserExist();
			
		error_reporting(0);
		
        if(!empty($user_info) || $p->password != md5($this->input->post('Rpassword'))){ 
 
		$data = array();
		
			if($user_info['Email'])
				$data['email']  = 1;
			
			if($user_info['username'])
				$data['username']  = 1;
			
			if($p->password != md5($this->input->post('Rpassword')))
				$data['pass']  = 1;
			
			
            $this->index($data);

			
			
        }else{

        $result = $p->addUser();
		
		$this->setSession();

           
            redirect('', 'refresh');
        
        }
    }



    public function loadusers() {

        $this->load->model('UserModel');
        $data = array();
        $data['prod'] = $this->UserModel->loadUser();
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
        $this->load->view('UserTable', $data);
        $this->load->view('footer');
    }

    public function viewUser() {
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
        $this->load->model('UserModel');
        $p = new UserModel();
        $p->Email = $this->input->post('Email');
        $data = array();
        $data = $p->getOneviewU();
        $this->load->view('viewUserInfo', $data);
        $this->load->view('footer');
    }

    public function UpdateViewUser() {
        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');
        $this->load->model('UserModel');
        $p = new UserModel();
		
        $p->Email = $this->input->post('Email');
        $data = array();
        $data = $p->getOneviewU();
        $this->load->view('UpdateUser', $data);
        $this->load->view('footerUser');
    }

    public function UpdateUser() {


        $this->load->model('UserModel');
        $this->load->model('UserModel');
        $p = new UserModel();
        $p->Fname = $this->input->post('Fname');
        $p->Lname = $this->input->post('Lname');
        $p->Email = $this->input->post('Email');
        $p->username = $this->input->post('username');
        $p->password = $this->input->post('password');
         $p->flag = $this->input->post('flag');
        $p->question = $this->input->post('question');
        $p->answer = $this->input->post('answer');
        $result = $p->updateUser();
        if (!$result) {
            echo mysqli_error($result);
        } else {
            $this->setSession();
            redirect('', 'refresh');
        }
    }

    public function deleteUser() {
        $this->load->model('UserModel');
        $p = new UserModel();
        $p->Email = $this->input->post('Email');
        $p->flag = 2;
        $result = $p->deleteU();
        if (!$result) {
            echo mysqli_error($result);
        } else {
            redirect('IM/loadusers', 'refresh');
        }
    }

// ------------------ start of gianna marie code here ---------------- //
// ====================================================================//
    public function presentation() {
   $this->load->model('UserModel');
	$p = new UserModel();
	$p->CourseName=$this->input->post('CourseName');

	$data=array();

	 
	$data['course_info']=$p->LoadCoursesuser($this->input->get('id'));

	//* $data['gg1']=$p->selectLectures();

	//* echo $data['course_info']['IdNum'];

	$data['instrct']=$p->GetTeachinfo($data['course_info']['IdNum']);
	$data['lectures'] = $p->loadLecturesFromCourse($this->input->get('id'));
	$p->updateUserCourse($this->session->userdata('username'), $this->input->get('id'));

	$this->load->view ('HeaderBootstrap2');
	$this->load->view('NavUser');
	$this->load->view('presentation_view', $data);


	$this->load->view('footerUser');
	
	
        }
    
	
	

// ====================================================================//

    public function cont_presentation() {

          $this->load->model('UserModel');
			$p = new UserModel();
			$p->CourseName=$this->input->post('CourseName');
			
			$lec_id = $this->input->get('id', TRUE);
			
			$data=array();


			$data['course_info']=$p->getLecInfo($lec_id);
				
			
			//$course_info = $p->getCourseInfo();
			
			$lec_view_data['username']= $this->session->userdata('username');
			$lec_view_data['video_lec_Id']= $lec_id;
			$lec_view_data['course_id']= $data['course_info']['course'];
	

		//* Check the $data['course_info']['courseID']
		
		
		
		//$data['instruct']=$p->GetTeachinfo($data['course_info']['IdNum']);
		$data['lectures'] = $p->loadLecturesFromCourse($this->input->get('id'));

        $this->load->model('comments');
        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');

         $this->load->view('presentation/contpresentation_view');
        $this->load->view('footerUser');
    }

public function insert_lec_view(){
				
					$this->load->model("Usermodel");

				$stud_model= new Usermodel();
				
				$lec_view_data['username']= $this->session->userdata("username");
				$lec_view_data['video_lec_Id']= $this->input->post('video_lec_Id');
				$lec_view_data['course_id']= $stud_model->getLecInfo($this->input->post('video_lec_Id'))['course'];
						
		if($stud_model->check_lec_view($lec_view_data['username'], $lec_view_data['video_lec_Id']) < 1)	
			$stud_model->insertLecView($lec_view_data);
		
		
	redirect("IM/cont_presentation?id=".$this->input->post('video_lec_Id'));
		
	
}	
	
// ====================================================================//

	public function print_quiz_taken_lists(){
		
			$this->load->model("UserModel");
			$stud_model = new UserModel();
			
			$this->load->view('fpdfs/fpdf');
			
			$data['quiz_taken_lists']= $stud_model->loadQuizTaken_Lists_ByCourse($this->session->userdata("username"), $this->input->get('course_id'));
			$data['course_info']= $stud_model->getCourseInfo($this->input->get('course_id'));

			$this->load->view('print_quiz_taken_lists', $data);
			
	}
	

// ====================================================================//

    public function myCourse($flag = '', $course_id = '') {
	
        if ($this->session->userdata('is_logged_in') == 1) {
		
			$this->load->model('UserModel');
			$p = new UserModel();
			
			if(isset($flag))
			$data['flag'] = $flag;
			
			if(isset($course_id))
			$data['course_id'] = $course_id;
			
			
            $data['query'] = $p->loadEnrolledCourses($this->session->userdata('Email'));
			
			
            $this->load->view('HeaderBootstrap2');
            $this->load->view('NavUser');
            $this->load->view('mycourse_view', $data);
            $this->load->view('footerUser');
        }
    }

// ====================================================================//

    public function courseEnroll() {
		
        $this->load->model('course_model');

        $data['results'] = $this->course_model->get_course();

        $this->load->view('datatables/datatablesheader_view');
        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');

        $this->load->view('datatables/enroll_view', $data);
        $this->load->view('datatables/datatablesfooter_view');
    }
	

	  public function terms_and_conditions() {

         $this->load->view('HeaderBootstrap2');
         $this->load->view('NavUser');

        $this->load->view('terms_and_conditions');
        $this->load->view('footerUser');
		
    }
	

	
 public function announcement_content() {

         $this->load->view('HeaderBootstrap2');
         $this->load->view('NavUser');
		$this->load->model("UserModel");
		$p = new UserModel();
		
		$data['ann_info'] = $p->getAnnInfo($this->input->get('ann_id'));
		$data['course_info'] = $p->getCourseInfo($data['ann_info']['courseID']);
		$data['inst_info'] = $p->GetTeachinfo($data['course_info']['IdNum']);
		
		$this->load->view('announcement_content', $data);
		
        $this->load->view('footerUser');
		
    }



// ====================================================================//
    public function courseDesc($course_id) {
        if ($this->session->userdata('is_logged_in') == 1) { // if logged in, mo-direct sa homepage...
            $this->db->select('*');
            $this->db->from('user_course');
            $this->db->where('Email', $this->session->userdata('Email'));
            $query = $this->db->get();
            $result = $query->result_array();
            $array['query'] = $result;

            $course = $this->db->where('courseID', $course_id);
            $course1 = $this->db->get('course');
            $u_course = $this->db->get('user_course');
            $cou = $u_course->result_array();
            foreach ($cou as $item)
                $cour_id = $item['course_id'];
            $courses = $course1->result_array();
//    foreach($user_course1 as $c)
//      print_r($user_course1['course_type']);

            $array['course'] = $courses;
            $this->load->view('datatables/course_description', $array);
        }
    }

// =================================================================
    public function userCourse() {
 
 
 
  if ($this->session->userdata('is_logged_in') == 1 && $this->input->post('course_id') !== NULL && $this->session->userdata('username') !== NULL){
  
  // if logged in, mo-direct sa homepage...
  
  
            $email = $this->session->userdata('Email');
            $course_id = $this->input->post('course_id');
            $username = $this->session->userdata('username');
 
            $usercourse = array(
                'course_id' => $course_id,
                 'Email' => $email,
				'username' => $this->session->userdata('username'),
				'date_enrolled'=> date("Y-m-d"),
				'last_access'=> date("Y-m-d")
				
            );
            $this->db->insert('user_course', $usercourse);
            $this->myCourse(1, $course_id);
        }

 
    }
	
	

// ==============================================================
    public function datatables() {

        $this->load->view('datatables/datatablesheader_view');
        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');
        $this->load->view('datatables');
    }

    public function download_lec($id = null) {
        $lec_id = $this->input->get('id');
        /*
        $this->load->helper('download');
        $this->db->where('lec_video_id', $lec_id);
        $this->db->select('lecture_name');
        $this->db->from('video_lectures');
        $q = $this->db->get();
        $r = $q->result_array();
        foreach ($r as $s)
        # code...
            $rr = $s['lecture_name'];
        $name = $rr;
*/
        $this->load->model("InstructorModel");

        $p = new InstructorModel();

        $lec_info = $p->getLecInfo($lec_id);

        $file_path = base_url(). 'uploads/' . $lec_info['lecture_name'];

        
        header('Content-Type: application/octet-stream');

         header("Content-Disposition: attachment; filename=". basename($file_path));
/*        
        ob_clean();
        flush();

*/


        readfile($file_path);

    }

    /* ============================================== */
    /* Quiz Module */

    public function quizinstruction() {

        $this->load->model("InstructorModel");
        $this->load->model("UserModel");


        $quiz_id = $_GET['quiz_id'];

        $teach_model = new InstructorModel();
        $stud_model= new UserModel();


       $data['quiz_info']=  $teach_model->loadQuizInfo($quiz_id);

        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');
        $this->load->view('quiz/quizinstruction_view', $data);
        $this->load->view('footerUser');
    }







public function TakeQuiz(){



    $this->load->view('HeaderBootstrap2');
    $this->load->view('NavUser');
    $this->load->model('Usermodel');
    $p = new Usermodel();



    if($this->input->get('quiz_id') !== NULL){

    $quiz_id = $this->input->get('quiz_id');

    $data['quiz_info'] = $p->loadQuizInfo($quiz_id);

    $load_quiztaken = $p->loadQuizTaken($quiz_id, $this->session->userdata('username'));

    $data['flag'] = 0;
 
    if(!empty($load_quiztaken['quiz_taken_mark'])) { //* Indication the Student had Finished quiz
	
		$data['flag'] = 1;
		$this->load->view('TakeQuiz', $data);
            

        $this->load->view('footerUser');
		
	
	}else {
    $quiz_taken_data['quiz_taken_user_id']= $this->session->userdata('username');
     $quiz_taken_data['quiz_id']= $quiz_id;
    $quiz_taken_data['quiz_taken_date']= date("Y-m-d");
    $quiz_taken_data['quiz_taken_mark']= 1;
    $quiz_taken_data['quiz_max_scores']=  $data['quiz_info']['quiz_total_score'];
    $quiz_taken_data['lec_video_id']=  $data['quiz_info']['lec_video_id'];


    $quiz_taken_id = $p->insertQuizTaken($quiz_taken_data);

    $questions =  $p->loadQuests($quiz_id);

	
    //* Assign Question Id for the purpose of  loading multple choices...

 $quiz_cnt = array(
        'current_quest_id'=> $questions[0]['quiz_quest_id'],
         'cur_index' => 0
         );

    $this->session->set_userdata('quiz_cnt', $quiz_cnt);
	
    $quiz_data= array(

        'quiz_id'=> $this->input->get('quiz_id'),
		'quiz_taken_id'=> $quiz_taken_id,
        'quiz_name'=> $data['quiz_info']['quiz_name'],
        'quiz_desc'=> $data['quiz_info']['quiz_desc'],
        'quiz_time_limit'=> $data['quiz_info']['quiz_time_limit'],
        'quiz_total_score'=> $data['quiz_info']['quiz_total_score'],
        'num_quests'=>  $data['quiz_info']['quiz_num_quest'],
        'quiz_stat'=> $data['quiz_info']['quiz_stat']


        );

    
    $this->session->set_userdata('quiz_info', $quiz_data);


    $i= 0;


    foreach($questions as $row_quest){

  $question_data[$i] = array(


        'quiz_quest_id'=> $row_quest['quiz_quest_id'],    
        'question'=> $row_quest['quiz_question'],
        'A'=> $row_quest['A'],
        'B'=> $row_quest['B'],
        'C'=> $row_quest['C'],
        'D'=> $row_quest['D'],
        'quiz_cor_ans'=> $row_quest['quiz_cor_ans'],
        'quiz_pts' => $row_quest['quiz_pts']
        
        


        );
  
  $i++;

    }

    $this->session->set_userdata('questions', $question_data);

    $quiz_info = $this->session->userdata('quiz_cnt');




    $this->load->view('TakeQuiz', $data);
        
    

        $this->load->view('footerUser');
		}

    }
	
}


public function InsertAns(){
	

    if(!empty($this->input->post('subm_ans'))){


    //*Checks if answer is submitted by form and if quiz has been answered already...


    $this->load->model('InstructorModel');
    $p = new InstructorModel(); 
    

    $quiz_id =  $this->session->userdata('quiz_info')['quiz_id'];


    //* Insertion of Submitted Answer
    
    $data_quest['quiz_answer'] = $this->input->post('quiz_answer');
    $data_quest['quiz_ans_ischeck'] = ($this->input->post('quiz_answer')===$this->input->post('quiz_cor_ans') ? 1:0);
    //* if answer is check ischeck == 1 else == 0

    $data_quest['quiz_quest_id'] = $this->input->post('quiz_quest_id');
    $data_quest['quiz_ans_pts'] = $this->input->post('quiz_pts');
    $data_quest['quiz_taken_id'] = $this->session->userdata('quiz_info')['quiz_taken_id'];

    $data_quest['quiz_ans_recstat_id']= 1;

 
    $data_quest['quiz_ans_createdby_id']= $this->session->userdata('username');
    $data_quest['quiz_ans_date_created']= date('Y-m-d');


  //print_r($this->session->userdata());
     $p->InsertAns($data_quest);



    //* Insert the Submitted Answers


//* $p->updatequizans($qans_rec_no['quiz_ans_rec_no'], $upd_data_qans);

    $count_upd['cur_index']= $this->session->userdata('quiz_cnt')['cur_index'] + 1;

     $count_upd['current_quest_id']= $this->session->userdata('quiz_cnt')['current_quest_id'] + 1;


    $this->session->set_userdata('quiz_cnt', $count_upd);

    if($this->session->userdata('quiz_cnt')['cur_index'] < $this->session->userdata('quiz_info')['num_quests']){

    ?>
           <div class="row">

<script  type = "text/javascript" src = "<?php echo base_url('js/jquery.min.js'); ?>"></script>
                    
<script>

var x;

$("document").ready(function(){


    $("input[type='radio']").change(function(){

        x= $(this).val();

    });


    $("input[name='subm_ans']").click(function(){

        if($("input[name='quiz_answer']").val() != ''){

            $.post("InsertAns", {
                subm_ans: 1,                
                quiz_answer: x,
                quiz_quest_id: $("#quiz_quest_id").val(),
                quiz_cor_ans: $("#quiz_cor_ans").val(),
                quiz_pts: $("#quiz_pts").val()



            }, function(data){



                $("#quiz_container").html(data);

            });

        }

    });


});

 </script>
    <div class="panel-body" id = "quiz_container">

    
        <h4>Question 

            <?php 

        $index= $this->session->userdata('quiz_cnt')['cur_index'];

        echo $index+1;

        ?> out of 
            <?php 
			
            echo $this->session->userdata('quiz_info')['num_quests']; 

            $quest_info = $this->session->userdata('questions');

            ?></h4>
			
        <?php 

     
        $question_info = $quest_info[$index]; 

 
        ?>
	<br>
        <h4>Question: <?php echo $question_info['question']; ?></h4><br><br>
        


 
<table><tr>
                    

<td ><input type = "radio" value = "A" name = "quiz_answer" />
<td style="width:15%;"><?php echo 'A). '. $question_info['A']; ?> 

<?php if(!empty($question_info['choice_img'])) { ?>

    <td><img src= "<?php echo 'data:image/jpeg;base64, '. base64_encode($question_info['choice_img']); ?>" width= "150" height= "150"/> 


<?php } ?>
<td style="width:2%;"><input type = "radio" value = "B" name = "quiz_answer" />
<td ><?php echo 'B). '. $question_info['B']; ?> 

<?php if(!empty($question_info['choice_img'])) { ?>

    <td><img src= "<?php echo 'data:image/jpeg;base64, '. base64_encode($question_info['choice_img']); ?>" width= "150" height= "150"/> 


<?php } ?>
<td><input type = "radio" value = "C" name = "quiz_answer" />
<td><?php echo 'C). '. $question_info['C']; ?> 

<?php if(!empty($question_info['choice_img'])) { ?>

    <td><img src= "<?php echo 'data:image/jpeg;base64, '. base64_encode($question_info['choice_img']); ?>" width= "150" height= "150"/> 


<?php } ?>



<td><input type = "radio" value = "D" name = "quiz_answer" />
<td><?php echo 'D). '. $question_info['D']; ?> 

<?php if(!empty($question_info['choice_img'])) { ?>

    <td><img src= "<?php echo 'data:image/jpeg; base64, '. base64_encode($question_info['choice_img']); ?>" width= "150" height= "150"/> 


<?php } ?>

                </table>
				
	<div style="padding-top:15px;">

        <h4>Points: <?php echo $question_info['quiz_pts']; ?></h4>

<br /> <br />

        <input type = "hidden" value = "<?php echo $question_info['quiz_quest_id']; ?>" name = "quiz_quest_id" id= "quiz_quest_id"/>
        <input type = "hidden" value = "<?php echo $question_info['quiz_cor_ans']; ?>" name = "quiz_cor_ans" id= "quiz_cor_ans"/>
        <input type = "hidden" value = "<?php echo $question_info['quiz_pts']; ?>" name = "quiz_pts" id= "quiz_pts"/>

        <input type = "button" name = "subm_ans" class = "btn btn-info" value = "Submit Answer" />
</div>

<?php
        
        } else {
			
            $data= array();



            /*$data['quiz_info'] = $this->session->userdata('quiz_info');
            $data['questions'] = $this->session->userdata('questions'); */

           //* $this->load->view('quiz/QuizInfo', $data);

?>
            <h4>Quiz is done!</h4>
            <br><br><br>
            <a class = 'btn btn-info' href= "<?php echo 'ViewQuiz?quiz_id=',$this->session->userdata('quiz_info')['quiz_id']; ?> ">Click Here for the Result</a>

<?php
           //* Displays Quiz Info 

        
           //* Displays Notification


            //*Empty the Quiz and its Questions
			

	
			$quiz_taken_id= $this->session->userdata('quiz_info')['quiz_taken_id'];
			
			//* Update Total Score in Quiz Taken Table...
			
			$this->load->model("UserModel");
			
			$stud_model = new UserModel();
			
			$sum_ans_quiz= $p->sum_quiz_ans_pts($quiz_taken_id); 
			
			$sum_tot_ans_pts = ($sum_ans_quiz[0]->quiz_ans_pts);

				
			$stud_model->updateQuizTaken($quiz_taken_id, array('quiz_tot_score'=> $sum_tot_ans_pts));
			
			
			
			
            $this->session->set_userdata('questions', '');
            $this->session->set_userdata('quiz_info', '');

        }

    }


}


//* Can only be accessed when student finishes the quiz...


  public function ViewQuiz(){

    $quiz_id= $this->input->get('quiz_id');

    //* Put Restrictions in Here...
    $this->load->model("Usermodel");
    $p= new UserModel();

	

    $quiz_taken_info= $p->load_quiztaken($quiz_id, $this->session->userdata('username'));
	
	
		 if($quiz_taken_info['quiz_taken_mark'] == 1){
				//*If the quiz has been taken already...

			$this->load->view('HeaderBootstrap2');
			$this->load->view('NavUser');
			

			$data['quiz_info'] = $p->loadQuizInfo($quiz_id);

			$data['questions'] = $p->loadQuests($quiz_id);
			
			
			$data['flag'] = 1;
			

			//* Note: Lacking of Load Answers with Summation of Points...
			
		 

			$this->load->view('viewQuizInfoStud', $data);
			$this->load->view('footerUser');


	 }else {

			$this->load->view('HeaderBootstrap2');
			$this->load->view('NavUser');
			
			$this->load->view('quiz/viewQuizInfoStud', array('flag' => 0));

			$this->load->view('footerUser');


		}

    }






    public function quizresults() {

        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');
		
		$this->load->model("UserModel");
								
		$stud_model = new UserModel();
		
	//	$data['results']= $stud_model->loadQuizzesByStud($this->session->userdata("username"));
		$data['quiz_taken_lists']= $stud_model->loadQuizTaken_Lists($this->session->userdata("username"));
		
		
 	 		
        $this->load->view('quiz/quizresults_view', $data);
		
        $this->load->view('footerUser');
    }
 
 
	   
    public function stud_prog() {

	        $this->load->view('datatables/datatablesheader_view');

        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');
		
		$this->load->model("UserModel");
								
		$stud_model = new UserModel();
		
		
		$data['course_prog']= $stud_model->load_progress($this->session->userdata("username"));
		
 		
 		
		//*	$data['courses']= $stud_model->loadQuizzesByStud($this->session->userdata("username"));


        $this->load->view('stud_prog', $data);
		
        $this->load->view('footerUser');
		
		
    }


	public function ViewCOurseStats() {

        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');
		
		$this->load->model("UserModel");
								
		$stud_model = new UserModel();
		
		//* $data['courses']= $stud_model->loadQuizzesByStud($this->session->userdata("username"));
	
		$data['quiz_taken_lists']= $stud_model->loadQuizTaken_Lists_ByCourse($this->session->userdata("username"), $this->input->get('course_id'));
		$data['course_info']= $stud_model->getCourseInfo($this->input->get('course_id'));
		$data['username'] = null;
		
        $this->load->view('ViewCourseStats', $data);
        $this->load->view('footerUser');
    }

	
	
	public function stud_eval() {

        $this->load->view('HeaderBootstrap2');
        $this->load->view('NavUser');
		
		$this->load->model("UserModel");
								
		$stud_model = new UserModel();
		
		//* $data['courses']= $stud_model->loadQuizzesByStud($this->session->userdata("username"));
	
		$data['eval_lists']= $stud_model->loadEnrolledCourses($this->session->userdata('Email'));
			
		
        $this->load->view('stud_eval', $data);
        $this->load->view('footerUser');
    }

	
//insert comments
    public function insert_comments() {

        $this->load->helper('date');

        $video_id = $this->input->post('lec_video_id');
        $comment = trim($this->input->post('discussion_comment'));
        $datestring = "%Y-%m-%d - %h:%i %a";
        $time = time();
        $date = mdate($datestring, $time);
        $user_id = $this->session->userdata('username');
        $ip_address = $this->input->ip_address();

        $insert_data = array(
            'lec_video_id' => $video_id,
            'user_id' => $user_id,
            'comments' => $comment,
            'ip_address'=>$ip_address, 
            'comments_status'=> 0
        );

        $this->db->insert("comments", $insert_data);
        $last_com_id = $this->db->insert_id();

         $notif_array = array( 

                    'nodification_to'=> $this->input->post('course_id'),
                    'nodification_from'=> 0, //*IF notification is from user notif_from is 0
                    'notif_to_table'=> 'course',
                    'notif_from_table'=> 'user',
                    'nodification_content'=> "Newly Created Discussion!",
                    'new_data_id'=> $last_com_id,
                    'notif_type'=> 2,
                    'notif_desc'=> "Newly Created Discussion!",
                    'nodification_status'=> 1

                );

        $this->db->insert("nodification", $notif_array);

        //* $this->comments->comment_insert($insert_data);

    }

    //insert Reply comments
    public function insert_reply_comments() {
        $this->load->helper('date');

        $comments_id = $this->input->post('comments_id');
        $reply_com_id = $this->input->post('reply_com_id') ? $this->input->post('reply_com_id') : '';
        $comment = trim($this->input->post('reply_discussion_comment'));
        $datestring = "%Y-%m-%d - %h:%i %a";
        $time = time();
        $date = mdate($datestring, $time);
        $user_id = $this->session->userdata('username');
        $ip_address = $this->input->ip_address();
        $insert_data = array(
            'commets_id' => $comments_id,
            'reply_user_id' => $user_id,
            'reply_reply_id' => $reply_com_id,
            'reply_commants' => $comment,
            'ip_address' => $ip_address);
        $this->load->model('comments');
        $this->comments->reply_comment_insert($insert_data);


    }

    //insert Reply comments
    public function delete_comments() {
        $this->load->model('comments');
        $this->comments->comment_delete();
    }

    private function isLogin() {
        if ($this->session->userdata('is_logged_in') != 1) {
            redirect('', 'refresh');
        }
        if ($this->session->userdata('group_id') != 'user') {
            redirect('', 'refresh');
        }
    }

    public function UserManual(){
         $this->load->view('HeaderBootstrap2');
         $this->load->view('NavUser');
         $this->load->view('usermanual_view');
         $this->load->view('footerUser');
    }
	
	//* Student Progress Module
	
	
	
	public function ViewStudProg(){
		
		  $this->load->view('HeaderBootstrap2');
         $this->load->view('NavUser');
         $this->load->view('ViewStudProg');
         $this->load->view('footerUser');
	}
	
}
