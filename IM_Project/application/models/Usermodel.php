<?php

class UserModel extends CI_Model{

public function checkIDU()
  {
    $this->db->where('Email', $this->Email);
    $this->db->where('question', $this->question);
                $this->db->where('answer', $this->answer);
    $query = $this->db->get('user');
    return $query->num_rows();
  }   

        
public function checkUser()
  {
    $this->db->where('username', $this->username);
    $this->db->where('password', $this->password);
    $query = $this->db->get('user');
    return $query->num_rows();
  }
  
  public function getCourseInfo($course_id) {
        $query = $this->db->get_where('course', array('courseID' => $course_id));
        return $query->row_array();
    }
	  
  public function getAnnInfo($ann_id) {
        $query = $this->db->get_where('announcement', array('announcement_id' => $ann_id));
        return $query->row_array();
    }
	
  public function getLecInfo($lec_id) {
        $query = $this->db->get_where('video_lectures', array('lec_video_id' => $lec_id));
        return $query->row_array();
    }

   public function loadStudEval($username) {
	   
	   
	   $this->db->select('
	   
	   
	   `user_course`.`course_id` AS `course_id`
		
		
		
	   ');

	   $this->db->from('quiz_taken');
	   
	   $this->db->join('user_course', '`user_course`.`course_id`= `quiz_taken`.`course_id`', 'right');

	   $this->db->where('`user_course`.`username`', $username);

	   $this->db->group_by('`quiz_taken`.`c`');
	   
	   $this->db->order_by('`user_course`.`course_id`');
	  
	   
        $query=$this->db->get();
		
        return $query->result_array();
    }
 
public function checkCourse($course_id, $username)
  {
    $this->db->where('username', $username);
    $this->db->where('course_id', $course_id);
	$this->db->where('flag', 1);
    $query = $this->db->get('user_course');
    return $query->num_rows();
  }

    public function checkEmail($email)
  {
    $this->db->where('Email', $email);
    $query = $this->db->get('user');
    return $query->num_rows();
  }

public function checkUserExist()
  {
    $this->db->where('username', $this->username);
    $this->db->or_where('Email', $this->Email);
    $query = $this->db->get('user');
    return $query->row_array();
  }

public function count_lecs_by_course($course_id)
  {
     $this->db->where('course', $course_id);
    $query = $this->db->get('video_lectures');
    return $query->num_rows();
  }
  
  
  public function count_quiz_by_course($course_id)
  {
     $this->db->where('course_id', $course_id);
    $query = $this->db->get('quiz');
    return $query->num_rows();
  }
  
  
  public function count_lecs_views_by_course($username, $course_id)
  {
      $this->db->where('username', $username);

    $this->db->where('course_id', $course_id);
    $query = $this->db->get('lec_view');
    return $query->num_rows();
	
  }
    public function count_lecs_views($username, $lec_id)
  {
      $this->db->where('username', $username);

    $this->db->where('video_lec_Id', $lec_id);
    $query = $this->db->get('lec_view');
    return $query->num_rows();
	
  }
  
   public function islec_viewed($lec_id, $username)
  {
	  
    $this->db->where('video_lec_id', $lec_id);
    $this->db->where('username', $username);	
	
    $query = $this->db->get('lec_view');
    return $query->num_rows();
	
  } 
  
     public function get_lec_viewed($lec_id, $username)
  {
	  
    $this->db->where('video_lec_id', $lec_id);
    $this->db->where('username', $username);	
	
    $query = $this->db->get('lec_view');
    return $query->row_array();
	
  } 
  
  
public function loadLecturesFromCourse($course_id) {
    $this->db->order_by('lec_video_id');
        $query=$this->db->get_where('video_lectures', array('course'=>$course_id));
        return $query->result_array();
    }

public function loadEnrolledCourses($email_stud) {

		$this->db->order_by('user_course_id', 'desc');
		$this->db->from("course");
		
		$this->db->join('user_course', 'user_course.course_id = course.courseID');
        $this->db->where('Email', $email_stud);
		$this->db->where('user_course.flag', 1);
		$query= $this->db->get();
		
        return $query->result_array();
		
    }


      public function loadchoices($quest_id) {
        $query=$this->db->get_where('quiz_mult_choices', array('quest_id'=>$quest_id));
        return $query->result_array();
      }

  public function getUserInformation()
  {
    $query = $this->db->get_where('user',array('username' => $this->username));
    return $query->row_array();
  }

  public function getUserInformationbyUsername($username)
  {
    $query = $this->db->get_where('user',array('username' => $username));
    return $query->row_array();
  }
         public function checkUserEmail($email) {
		
        $query = $this->db->get_where('user', array('Email' => $email));
        return $query->num_rows();
		
    }
        
        
         public function LoadCoursesuser($course_id) {
$query=$this->db->get_where('course', array('courseID'=>$course_id));
return $query->row_array();
    }
     public function selectLectures() {
      $query=$this->db->get_where('video_lectures',array('course'=>$this->courseID));
return $query->result_array();
    }
    
    
public function addUser(){  
$query=$this->db->insert('user',$this);
return $query;
}

public function load_quiztaken($quiz_id, $username){

			$query=$this->db->get_where('quiz_taken', array('quiz_taken_user_id'=>$username,'quiz_id'=>$quiz_id));

			return $query->row_array();

	}

public function get_totscore_bycourse($course_id){

			$this->db->select("SUM(quiz_total_score) AS `course_max_scores` ");
			
			$query=$this->db->get_where('quiz', array('course_id'=>$course_id));

			return $query->row_array();

	}
	

	
public function count_quiz_course_passed($username, $course_id){
	
			$this->db->select("COUNT(quiz_taken_id) AS `count_passed` ");
			
			$query=$this->db->get_where('quiz_taken', array('quiz_taken_mark'=>1, 'quiz_taken_id'=>$username,'course_id'=>$course_id));

			return $query->row_array();

	}
	
	public function get_totscore_bystud($username,$course_id){ 

			$this->db->select("SUM(quiz_tot_score) AS tot_score");
			
			$query=$this->db->get_where('quiz_taken', array('course_id'=>$course_id,'quiz_taken_user_id'=>$username));

			return $query->row_array();

	}
	
public function InsertAns($data){
$query=$this->db->insert('quiz_quest_stud_answers',$data);
return $query;
}

public function InsertQuizTaken($data){
$query=$this->db->insert('quiz_taken',$data);
return $this->db->insert_id();
}


public function getOneviewU(){
$query=$this->db->get_where('user',array('Email'=>$this->Email));
return $query->row_array();
}  



public function loadUserAnnouncements($username) {
		
		$this->db->select("*");
	
		$this->db->from("announcement");
		
		$this->db->join("user_course", "announcement.courseID = user_course.course_id");
		
		$this->db->where('user_course.flag', 1);
	
	
		$this->db->where('username', $username);
		
        $query=$this->db->get();
		
        return $query->result_array();
		
    }
public function loadUser() {
        $query=$this->db->get('user');
        return $query;
    }
public function loadQuizInfo($quiz_id) {
         $query=$this->db->get_where('quiz', array('quiz_id'=> $quiz_id));
        return $query->row_array();
    }
	
public function loadQuizTaken($quiz_id, $username) {
         $query=$this->db->get_where('quiz_taken', array('quiz_id'=> $quiz_id, 'quiz_taken_user_id' => $username));
        return $query->row_array();
    }
	
public function getQuizByLec($lec_id, $username) {
         $query=$this->db->get_where('quiz_taken', array('lec_video_id'=> $lec_id, 'quiz_taken_user_id' => $username));
        return $query->row_array();
    }
	
	
public function loadQuizTaken_Lists($username){

		$this->db->select("*");
		$this->db->from("quiz_taken");
		
		$this->db->join("quiz", "quiz.quiz_id = quiz_taken.quiz_id");
		$this->db->join("video_lectures", "video_lectures.lec_video_id = quiz.lec_video_id");

		
        $this->db->where('quiz_taken_user_id', $username);

		
       $query=$this->db->get();
		 
        return $query->result_array();
		
    }
		
public function loadQuizTaken_Lists_ByCourse($username, $course){

		$this->db->select("*");
		$this->db->from("quiz");
		
		$this->db->join("quiz_taken", "quiz.quiz_id = quiz_taken.quiz_id", 'left');
 
		
        $this->db->where('quiz_taken_user_id', $username);
        $this->db->where('`quiz_taken`.`course_id', $course);

		
       $query=$this->db->get();
		 
        return $query->result_array();
		
    }
	
	
	public function count_quiz_taken($username, $course){
		
		
				$this->db->where('quiz_taken_user_id', $username);
				$this->db->where('course_id', $course);

				
				$query=$this->db->get("quiz_taken");
				
		        return $query->num_rows();

	}
	
	
	public function count_quizzes_by_lecture($lec_id){
		
				$this->db->where('lec_video_id', $lec_id);

				$query=$this->db->get("quiz");
	   
	   
		        return $query->num_rows();

	}	
	
public function load_progress($username){

		$this->db->select("courseID,  
		courseName, 
		user_course.date_enrolled AS date_enrolled, 
		user_course.last_access AS last_access, 
		MONTH(course.date_expired) - MONTH(course.Date_release) AS month_duration, 
		YEAR(course.date_expired) - YEAR(Date_release) AS year_duration");
		
		$this->db->from("course");
		
	//*	$this->db->join("lec_view", " course.courseID= lec_view.course_id");
		
		$this->db->join("user_course", "user_course.course_id = course.courseID");
				
	//*	$this->db->join("video_lectures", "video_lectures.course = course.courseID");

		
        $this->db->where('user_course.username', $username);
		$this->db->where('user_course.flag', 1);
		$this->db->group_by("courseID");

		
       $query=$this->db->get();
		 
        return $query->result_array();
		
    }

public function insertNotif($notif_array){  

$query=$this->db->insert('nodification',$notif_array);

return $this->db->insert_id();

}

public function insertLecView($lec_view_data){  

$query=$this->db->insert('lec_view',$lec_view_data);

return $this->db->insert_id();

}

public function check_lec_view($username, $video_lec_id){  


     $this->db->where('video_lec_Id', $video_lec_id);
	 $this->db->where('username',  $username);
	 
    $query = $this->db->get('lec_view');
	
	
return $query->num_rows();

}


  public function loadQuizzesByStud($stud_id) {

    $query=$this->db->get_where('quiz_taken', array('quiz_taken_user_id'=> $stud_id));
    return $query->result_array();

    }

 public function loadQuests($quiz_id) {

    $query=$this->db->get_where('quiz_questions', array('quiz_id'=> $quiz_id));
    return $query->result_array();

    }


 public function loadQuestAns($quest_id, $stud_id) {

    $query=$this->db->get_where('quiz_quest_stud_answers', array('quiz_quest_id'=> $quest_id, 'quiz_ans_createdby_id'=>$stud_id));
    return $query->row_array();

    }
	
	
public function sum_quiz_ans_pts($quiz_id){
	
		 $this->db->select_sum('quiz_ans_pts');
		 
		$this->db->where('quiz_ans_ischeck', 1);
		$this->db->where('quiz_taken_id', $quiz_id);


		$query= $this->db->get('quiz_quest_stud_answers');
		
		
		return $query->result();
		
				
	
}

public function updateQuizTaken($quiz_taken_id, $upd_quiztaken){

$this->db->where('quiz_taken_id', $quiz_taken_id);

 $query=$this->db->update('quiz_taken',$upd_quiztaken);
 

} 

public function updateUser(){

$this->db->where('Email',$this->Email);
$query=$this->db->update('user',$this);
return $query;
} 

public function updateUserCourse($username, $course_id){

$this->db->where('username',$username);
$this->db->where('course_id',$course_id);

$query=$this->db->update('user_course', array('last_access'=>date("Y-m-d")));

return $query;
} 

  public function deleteU(){    
$this->db->where('Email',$this->Email);
$query=$this->db->update('user',$this); 
return $query;

 }
 
   public function LoadCourses() {
        $query=$this->db->get('course');
        return $query;
    }


    public function GetTeachinfo($teach_id) {
        $query=$this->db->get_where('instructors', array('Idnum'=> $teach_id));
        return $query->row_array();
    }
    

}

