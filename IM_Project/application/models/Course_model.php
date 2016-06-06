<?php

 class Course_model extends CI_Model{

 /*	public function get_course() {

 		$query = $this->db->get('course');
 		return $query->result();

 	}

 } */

public function get_course() {
	
				//* $this->db->where('flag', 1);
                $query = $this->db->get_where('course',array('flag' => 1, 'date_expired >='=> date("Y-m-d"), 'IdNum !=' => "NULL"));   //*Filter not to display expired courses  
 		return $query->result();

 	}
        
            public function get_tableUC() {
            $query = $this->db->get_where('user_course',array('Email' => $this->session->userdata('Email')));
             
 		return $query->result();

 	}

        public function get_courseOfUser($data2) {
            foreach($data2 as $data3){
            $query = $this->db->get_where('course',array('courseID' => $data3->course_id));
            return $query->result();
            get_courseOfUser($data2);}
      
 	}
        

 } 
 

?>