<?php

class InstructorModel extends CI_Model {
	
	 public function checkInstructor($Idnum, $pass)
  {
	  
    $this->db->where('Idnum', $Idnum);
    $this->db->where('Password', $pass);	
	
    $query = $this->db->get('instructors');
    return $query->num_rows();
  } 
  
	 public function checkAdmin($Idnum, $pass)
  {
	  
    $this->db->where('Idnum', $Idnum);
    $this->db->where('Password', $pass);	
	
    $query = $this->db->get('admin');
    return $query->num_rows();
	
  }   
  
 public function islec_viewed($lec_id, $username)
  {
	  
    $this->db->where('video_lec_id', $lec_id);
    $this->db->where('username', $username);	
	
    $query = $this->db->get('lec_view');
    return $query->num_rows();
	
  } 


 public function loadAdminActive() {

        $query = $this->db->get_where('admin', array('flag'=>1, 'privilege'=>'Editor'));
        return $query->result_array();
    }
	
    public function loadAdminArch() {

        $query = $this->db->get_where('admin', array('flag'=>2));
        return $query->result_array();
    }
	
    public function delete_inst() {
        $this->db->where('Idnum', $this->Idnum);
        $query = $this->db->update('instructors', $this);
        return $query;
    }
	
	  public function archiveInstructor($idNum) {
		  
        $this->db->where('Idnum', $idNum);
		
        $query = $this->db->update('instructors', array('flag'=>2));
        
		return $query;
    }
	
	  public function reactivate_inst($idNum) {
		  
        $this->db->where('Idnum', $idNum);
		
        $query = $this->db->update('instructors', array('flag'=>1));
        
		return $query;
    }
	
    public function reactive_courses($upd_course, $idNum) {
		
        $this->db->where('IdNum', $idNum);

       $this->db->or_where('date_expired <', date("Y-m-d"));
	   
        $query = $this->db->update('course', $upd_course);
		
        return $query;
    }
	
    public function loadArchCourses() {
		
        $this->db->where('date_expired <', date("Y-m-d"));
        $query = $this->db->get('course');
        return $query;
    }

    public function loadArchInstructors() {
 
        $this->db->where('flag', 2);
        $query = $this->db->get('instructors');
        return $query;
        
    }
	
 public function checkIdnum2($Idnum)
  {
    $this->db->where('Idnum', $Idnum);
    $query = $this->db->get('instructors');
    return $query->num_rows();
  }    
  
    public function checkIdnum($Idnum)
  {
    $this->db->where('Idnum', $Idnum);
    $query = $this->db->get('admin');
    return $query->num_rows();
  }    
    
    
    
 public function checkEmail($email)
  {
    $this->db->where('Email', $email);
    $query = $this->db->get('admin');
    return $query->num_rows();
  }
  public function checkEmail2($email)
  {
    $this->db->where('Email', $email);
    $query = $this->db->get('instructors');
    return $query->num_rows();
  }

    public function checkIDA() {
        $this->db->where('Idnum', $this->Idnum);
        $this->db->where('question', $this->question);
        $this->db->where('answer', $this->answer);
        $query = $this->db->get('admin');
        return $query->num_rows();
    }

   public function loadAssCourses($teach_id) {
        $query=$this->db->get_where('course', array('IdNum'=> $teach_id, 'flag'=>1));
        return $query->result_array();
    }

public function loadLecturesFromCourse($course_id) {

        $this->db->order_by('lec_video_id');
		
				
		$this->db->where('course', $course_id);
		
		
        $query=$this->db->get('video_lectures');
        return $query->result_array();

		}

public function loadLecturesByQuiz($course_id) {

        $this->db->order_by('lec_video_id');
		
		$this->db->where('`lec_video_id` NOT IN (SELECT lec_video_id FROM quiz)',  NULL, FALSE);
		
		$this->db->where('course', $course_id);
		
		
        $query=$this->db->get('video_lectures');
        return $query->result_array();

		}


public function insertQuizInfo($quiz_info){  

	$query=$this->db->insert('quiz',$quiz_info);
	return $this->db->insert_id();

}


public function insertNotif($notif_array){  

$query=$this->db->insert('nodification',$notif_array);

return $this->db->insert_id();

}

    public function insertQuestion($question_info){  

    $query=$this->db->insert('quiz_questions',$question_info);

    }

   public function loadQuests($quiz_id) {

    $query=$this->db->get_where('quiz_questions', array('quiz_id'=> $quiz_id));
    return $query->result_array();

    }

   public function loadLecsbyInstructor($lec_id) {
	$this->db->order_by("lec_video_id", "DESC");
	
    $query=$this->db->get_where('video_lectures', array('Idnum'=> $lec_id));
    return $query->result_array();

    }
	
  public function loadQuizInfo($quiz_id) {

    $query=$this->db->get_where('quiz', array('quiz_id'=> $quiz_id));
    return $query->row_array();

    }

	
  public function getQuizbyLec($lec_video_id) {

    $query=$this->db->get_where('quiz', array('lec_video_id'=> $lec_video_id, 'flag'=>1));
    return $query->row_array();

    }
	
		
  public function loadLecInfo($lec_id) {

    $query=$this->db->get_where('video_lectures', array('lec_video_id'=> $lec_id));
    return $query->row_array();


    }
	
public function sum_quiz($quiz_id){
	
	
		
		$this->db->select_sum('quiz_pts');

		$this->db->where('quiz_id', $quiz_id);
		
		$this->db->from('quiz_questions');
		
		
		$query= $this->db->get();
		
		
		return $query->result();
		
				
	
}
	
public function sum_quiz_ans_pts($quiz_taken_id){
	
	
		$this->db->where('quiz_ans_ischeck', 1);
		$this->db->where('quiz_taken_id', $quiz_taken_id);
		
	
		
		
		$this->db->select_sum('quiz_ans_pts');


		$query= $this->db->get('quiz_quest_stud_answers');
		
		
		return $query->result();
		
				
	
}

public function updateQuizTaken($upd_quiztaken){

$this->db->where('quiz_taken_id', $upd_quiztaken['quiz_taken_id']);

$query=$this->db->update('quiz_taken',$upd_quiztaken);

return $query;
} 

  public function loadQuizzes($lec_id) {

    $query=$this->db->get_where('quiz', array('lec_video_id'=> $lec_id, 'flag'=> 1));
    return $query->result_array();

    }
	
  public function loadArchQuizzes($lec_id) {

    $query=$this->db->get_where('quiz', array('lec_video_id'=> $lec_id, 'flag'=>2));
	
    return $query->result_array();

    }
	
  public function loadQuizTaken($quiz_id) {

    $query=$this->db->get_where('quiz_taken', array('quiz_id'=> $quiz_id));
    
	return $query->result_array();

    }
	
  public function loadQuizzesbyInstructor($inst_id) {

    $query=$this->db->get_where('quiz', array('quiz_createdby_id'=> $inst_id));
    return $query->result_array();

    }

    public function checkIDI() {
        $this->db->where('Idnum', $this->Idnum);
        $this->db->where('question', $this->question);
        $this->db->where('answer', $this->answer);
        $query = $this->db->get('instructors');
        return $query->num_rows();
    }

	
	    public function check_quiztaken($quiz_id, $username) {
        $this->db->where('quiz_taken_user_id', $username);
        $this->db->where('quiz_id', $quiz_id);

        $query = $this->db->get('quiz_taken');
        return $query->num_rows();
    }

     public function count_lecs($course_id) {
	 
	 
        $this->db->where('course', $course_id);
        $query = $this->db->get('video_lectures');

		  
        return $query->num_rows();

    }
	
     public function count_enrollees($course_id) {
	 
	 
        
		$this->db->where('course_id', $course_id);
		
        $query = $this->db->get('user_course');

		  
        return $query->num_rows();

    }
	
     public function stud_count_lecs($username, $course_id) {
	 
	 
        $this->db->where('username', $username);
		$this->db->where('course_id', $course_id);
		
        $query = $this->db->get('lec_view');

		  
        return $query->num_rows();

    }
	public function loadcourse_ranking() {
	 
 
        $query = $this->db->get('course_ranking');

        return $query->result_array();

    }
	
		
  public function get_quest_answer($quiz_quest_id) {
	  
	  
        $this->db->where('quiz_quest_id', $quiz_quest_id);
        //$this->db->where('Email', $Email);
		
        $query = $this->db->get('quiz_quest_stud_answers');

        return $query->row_array();

    }

	
  public function count_courses($Email) {
	  
	  
        $this->db->where('Email', $Email);
		$this->db->where('flag', 1);
		
        $query = $this->db->get('user_course');

        return $query->num_rows();

    }

     public function count_studs_by_course($course_id) {

        $this->db->where('course_id', $course_id);
$this->db->where('flag', 1);
        $query = $this->db->get('user_course');

        return $query->num_rows();

    }
    public function getlectures() {
        $query = $this->db->get_where('lectures', array('lecture_title'));
        return $query->result();
    }

    public function checkUserlogA() {
        $this->db->where('Idnum', $this->Idnum);
        $this->db->where('Password', $this->Password);
        $query = $this->db->get('admin');
        return $query->num_rows();
    }

    public function checkUserlogI() {
        $this->db->where('Idnum', $this->Idnum);
        $this->db->where('Password', $this->Password);
        $query = $this->db->get('instructors');
        return $query->num_rows();
    }

    public function loadInstructors() {
 
        $this->db->where('flag', 1);
        $query = $this->db->get('instructors');
        return $query;
        
    }
    public function loadStuds() {
 
        $this->db->where('flag', 1);
        $query = $this->db->get('user');
        return $query->result_array();
        
    }


    public function loadCourses() {
		
        $this->db->where('date_expired >=', date("Y-m-d"));
        $this->db->where('date_Release <=', date("Y-m-d"));		
        //* $this->db->where('flag ', 1);
		
		 $query = $this->db->get('course');
		
		
        return $query;
    }

    public function loadAssignments() {
        
        $this->db->where('flag ', 1);
		$this->db->where_not_in('IdNum', array('NULL'));
		
        $query = $this->db->get('course');
        return $query;
    }

	
    public function selectCourses() {

        $this->db->where('IdNum',"NULL");
        $this->db->where('flag', 1);
 
        $query = $this->db->get('course');
		
        return $query->result_array();
    }

 public function loadEnrolledStuds($course_id) {

        $this->db->where('course_id', $course_id);
		$this->db->where('flag', 1);
        $query = $this->db->get('user_course');
        return $query->result_array();
    }
	
 public function loadEnrolledStudsInfo($course_id) {

 	    $this->db->select("*");
		
		$this->db->from('user_course');
		
	    $this->db->join('user', 'user_course.username= user.username');

		
		
        $this->db->where('course_id', $course_id);
		
        $this->db->order_by('user.Lname', 'ASC');
		

        $query = $this->db->get();
        return $query->result_array();
    }

 public function loadEnrollments() {

    
      	 
		$this->db->select('course.CourseName as CourseName, user.Email as Email, user_course_id, user_course.username AS `username`, date_enrolled');
		$this->db->from('user_course');
		$this->db->join('course', 'course.courseID = user_course.course_id');
		$this->db->join('user', 'user.Email = user_course.Email');
		$this->db->where('user_course.flag', 1);
		$this->db->order_by('user_course.date_enrolled', "DESC");
	
         $query = $this->db->get();
         return $query->result_array();
    }
	
	
	
    public function loadAdmin() {

        $query = $this->db->get_where('admin', array('flag'=>2, 'privilege'=>'Editor'));
        return $query->result_array();
    }

    public function getInstructorInfo($idnum) {
		
        $query = $this->db->get_where('instructors', array('Idnum' => $idnum));
        return $query->row_array();
		
    }
	    public function getAdminInfo($idnum) {
		
        $query = $this->db->get_where('admin', array('Idnum' => $idnum));
        return $query->row_array();
		
    }
	
	
    public function getOneviewA() {
        $query = $this->db->get_where('admin', array('Idnum' => $this->Idnum));
        return $query->row_array();
    }

    public function getOneviewC() {
        $query = $this->db->get_where('course', array('courseID' => $this->courseID));
        return $query->row_array();
    }

  public function getCourseInfo($course_id) {
        $query = $this->db->get_where('course', array('courseID' => $course_id));
        return $query->row_array();
    }
	 
	
  public function getInstInfo($teach_id) {
        $query = $this->db->get_where('instructors', array('Idnum' => $teach_id));
        return $query->row_array();
    }

 public function getCommentInfo($comment_id) {
        $query = $this->db->get_where('comments', array('comments_id' => $comment_id));
        return $query->row_array();
    }

    public function loadNotifsCourse($course_id){
        $this->db->order_by('nodification_id', 'DESC');
          $query = $this->db->get_where('nodification', array('nodification_to'=> $course_id, 'notif_to_table'=>'course'));

            return $query->result_array();

    }
	    public function loadLastUpdCourse($course_id){
        $this->db->order_by('nodification_id', 'DESC');
		
          $query = $this->db->get_where('nodification', array('nodification_to'=> $course_id, 'notif_to_table'=>'course', 'notif_type !='=> '2'));

            return $query->row_array();

    }

    public function getStudInfo($stud_email) {

        $query = $this->db->get_where('user', array('Email' => $stud_email));
        return $query->row_array();
    }

 public function getLecInfo($lec_id) {
        $query = $this->db->get_where('video_lectures', array('lec_video_id' => $lec_id));
        return $query->row_array();
    }


    public function getOneview() {
        $query = $this->db->get_where('instructors', array('Idnum' => $this->Idnum));
        return $query->row_array();
    }

    public function updateInstrutor($username) {
        $this->db->where('username', $username);
        $query = $this->db->update('instructors', $this);
        return $query;
    }
	
    public function updateStud($data) {
		
        $this->db->where('Email', $data['Email']);
        $query = $this->db->update('user', $data);
        return $query;
    }
	
    public function UpdateAdmin() {
        $this->db->where('admin_no', $this->admin_no);
        $query = $this->db->update('admin', $this);
        return $query;
    }

    public function Updatecourse() {
        $this->db->where('courseID', $this->courseID);
        $query = $this->db->update('course', $this);
        return $query;
    }

      public function AssCourse($upd_course, $course_id) {
        $this->db->where('courseID', $course_id);
        $query = $this->db->update('course', $upd_course);
        return $query;
    }

   public function UpdateQuiz($quiz_id, $upd_data) {
        $this->db->where('quiz_id', $quiz_id);
        $query = $this->db->update('quiz', $upd_data);
        return $query;
    }

	
	  public function UpdateArchQuiz($quiz_id, $lec_video_id) {
		  
        $this->db->where_not_in('quiz_id', $quiz_id);
        $this->db->where('lec_video_id', $lec_video_id);
        $query = $this->db->update('quiz', array('flag'=>2));
		
        return $query;
    }
	
   public function deleteUC(){    

   $this->db->where('user_course_id',$this->user_course_id);
$this->db->where('flag', 1);
$query=$this->db->update('user_course',$this); 
return $query;

 } 

    public function delete() {
        $this->db->where('Idnum', $this->Idnum);
        $query = $this->db->update('instructors', $this);
        return $query;
    }

    public function deleteA() {
        $this->db->where('Idnum', $this->Idnum);
        $query = $this->db->update('admin', $this);
        return $query;
    }

    public function deleteC() {
        $this->db->where('courseID', $this->courseID);
        $query = $this->db->update('course', $this);
        return $query;
    }

    public function addinstructor() {
        $query = $this->db->insert('instructors', $this);
        return $query;
    }

    public function addadmin() {
        $query = $this->db->insert('admin', $this);
        return $query;
    }

    public function InsertAns($data){

        $query=$this->db->insert('quiz_quest_stud_answers',$data);
        return $query;
}


    public function addcourse() {
        $query = $this->db->insert('course', $this);
        return $query;
    }

    public function searchUser($search_name) {
        $this->db->like('username', $search_name);
        $this->db->or_like('Fname', $search_name);
        $this->db->or_like('Lname', $search_name);
        $this->db->or_like('Email', $search_name);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function searchInstructor($search_name) {
        $this->db->like('Username', $search_name);
        $this->db->or_like('Fname', $search_name);
        $this->db->or_like('Lname', $search_name);
        $this->db->or_like('Email', $search_name);
        $this->db->or_like('Idnum', $search_name);
        $query = $this->db->get('instructors');
        return $query->result();
    }

    public function searchCourse($search_name) {
        $this->db->like('CourseName', $search_name);
        $this->db->or_like('courseID', $search_name);
        $query = $this->db->get('course');
        return $query->result();
    }

    public function searchAdmin($search_name) {
        $this->db->like('Username', $search_name);
        $this->db->or_like('Fname', $search_name);
        $this->db->or_like('Lname', $search_name);
        $this->db->or_like('Email', $search_name);
        $this->db->or_like('Idnum', $search_name);
        $query = $this->db->get('admin');
        return $query->result();
    }

    public function selectCourse() {
        $query = $this->db->get_where('course', array('courseID'));
        return $query->result();
    }

    public function selectstuCourse()
    {
        $query=$this->db->get_where('course',array('courseID'=>$this->course_id));
        return $query->result();


    }

    public function selectUser() {
		
		
		  $this->db->where('flag',1);

        $query = $this->db->get('user');
        return $query->result();
    }

    public function selectStudentCourse() {
        $query = $this->db->get('user_course');
		$this->db->where('flag', 1);
		
        return $query->result();
    }

    public function selectInstructor() {
        $query = $this->db->get_where('instructors', array('Idnum'));
        return $query->result();
    }

    public function addinstrucCourse() {
        $query = $this->db->insert('instruct_course', $this);
        return $query;
    }

       public function addStudstrucCourse()
    {
        $query=$this->db->insert('user_course',$this);
		
                 return $query;


    }
    public function selectInstructorCourse() {
        $query = $this->db->get_where('instruct_course', array('instruct_course_id'));
        return $query->result();
    }

    public function searchLikeCourse($search_name) {
        $this->db->like('course_id', $search_name);
        $query = $this->db->get('instruct_course');
        return $query->result();
    }

    public function deleteIC() {
        $this->db->where('instruct_course_id', $this->instruct_course_id);
        $query = $this->db->update('instruct_course', $this);
        return $query;
    }

       public function selectInstructorCourseAssigned($Idnum)
    {
        
        $this->db->like('IdNum', $Idnum);
                $query = $this->db->get('instruct_course');
        return $query->result();


    }

    public function addinstrucAnn() {
        /*
        $nodifys = $this->db->select('Email')->distinct()->where('course_id', $this->courseID)->get('user_course')->result();
        if ($nodifys) {
            foreach ($nodifys as $key => $nodify) {
                $nodification[$key]['nodification_to'] = $nodify->Email;
                $nodification[$key]['nodification_for'] = $this->courseID;
                $nodification[$key]['nodification_content'] = 'New Announcement';
            }
        }

        $nod = $this->db->insert_batch('nodification', $nodification);

        */
        
        $query = $this->db->insert('announcement', $this);
        return $this->db->insert_id();
    }
    
    public function updateinstrucAnn() {

        $nodifys = $this->db->select('Email')->distinct()->where('course_id', $this->courseID)->get('user_course')->result();
        if ($nodifys) {
            foreach ($nodifys as $key => $nodify) {
                $nodification[$key]['nodification_to'] = $nodify->Email;
                $nodification[$key]['nodification_for'] = $this->courseID;
                $nodification[$key]['nodification_content'] = 'Announcement was update';
            }
            $nod = $this->db->insert_batch('nodification', $nodification);
        }
        $this->db->where('announcement_id', $this->input->post('update_id'));
        $query = $this->db->update('announcement', $this);
        return $query;
    }

    public function getallann() {


        $query = $this->db->get('announcement');
        return $query->result();
    }

    public function get_announcement($article_id = false) {
        if ($article_id != false) {
            return $this->db->select('*')
                            ->from('announcement')                            
                            ->where('announcement_id', $article_id)
                            ->where('announcement.flag', 1)
                            ->order_by('announcement.announcement_id', 'DESC')
                            ->get()->row();
        }
        return false;
    }

     public function deleteAnn(){    
$this->db->where('announcement_id',$this->announcement_id);
$query=$this->db->update('announcement',$this); 
return $query;

 }

}
