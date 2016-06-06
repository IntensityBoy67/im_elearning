<?php

class Admin extends CI_Controller {
 
    public function UpdateIside() {
        
                        $this->load->view('instructor/header_view');
      $this->load->view('instructor/navbar_view');
      $this->load->view('instructor/instructorbody_view2');
      $this->load->view('instructor/footer_view');
    } 
    
        public function UpdateIside2() {
					  
			$this->load->model('InstructorModel');
			$p = new InstructorModel();
			$p->Fname=$this->input->post('Fname');
			$p->Lname=$this->input->post('Lname');
			$p->Email=$this->input->post('Email');
			$p->Idnum=$this->input->post('Idnum');
			$p->ScheduleIn=$this->input->post('ScheduleIn');
			$p->ScheduleOut=$this->input->post('ScheduleOut');
			$p->Username=$this->input->post('Username');
			$p->Password= MD5($this->input->post('Password'));
			$p->Gender=$this->input->post('Gender');
			$p->Phonenumber=$this->input->post('Phonenumber');
			$p->question=$this->input->post('question');
			$p->answer=$this->input->post('answer');
			 $result=$p->updateInstrutor();
			if(!$result){
			echo mysqli_error($result);
			}
			else{   
			$mark=1; 
			$this->setSession($mark);
			}
    }
       
        
    
    public function viewID() {
          
       $this->load->view('HeaderBootstrap2');
       $this->load->view('emailcheck');
    } 
    
       public function checkID() {
          $this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Idnum=$this->input->post('Idnum');  
$data=array();
$data=$p->getOneviewA();
          if ($data==NULL){
               $data = $p->getOneview();
               if($data==NULL)
               {echo mysqli_error($data); }
          }
           $this->load->view('HeaderBootstrap2');
          $this->load->view('AnswerSecret',$data);  
          
       
    }
    
        public function resultID() {
          $this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Idnum=$this->input->post('Idnum');  
$p->question=$this->input->post('question');
$p->answer=$this->input->post('answer');
$result=$p->checkIDA();
          if ($result==NULL){
               $result=$p->checkIDI();
               if($result==NULL)
               {echo mysqli_error($result); }
               $data = array();
               $data = $p->getOneview(); 
          }
 $data = array();
 $data = $p->getOneviewA();
           $this->load->view('HeaderBootstrap2');
          $this->load->view('Changepass',$data);  
          
       
    }
    
         public function UpdatePass() {
			$this->load->model('InstructorModel');
			$p = new InstructorModel();
			$p->Idnum=$this->input->post('Idnum');  
			$p->Password=md5($this->input->post('Password'));
			$result=$p->UpdateAdmin();
					  if ($result==NULL){
						   $result=$p->updateInstrutor();
						   if($result==NULL)
						   {echo mysqli_error($result); }
					  }
          redirect('Admin/index', 'refresh'); 
          
       
    }
    

    
     public function validateLogin() {
		 
	//* Diri kay check if sakto ang Username and Password
		 
	//* Test Code: print_r($this->input->post());
	
	$this->load->model("InstructorModel");
	$p = new InstructorModel();
	
	
	
	if($this->input->post('Idnum') !== NULL){
		
		$idNum = $this->input->post('Idnum');
		$pass = MD5($this->input->post('Password'));
		
		
		if($p->checkInstructor($idNum, $pass) >= 1){	
		
			$data = $p->getInstructorInfo($idNum);
	
				  $sess_array = array(
                'Idnum' => $data['Idnum'],            
				'ScheduleIn' => $data['Vacant_Sched'],
 				'Email' => $data['Email'],
                'Password' => $data['Password'],
                'Fname' => $data['Fname'],
                'Lname' => $data['Lname'],
                'Gender' => $data['Gender'],
                'Phonenumber' => $data['Phonenumber'],
                'Username' => $data['Username'],
                'question' => $data['question'],
                'answer' => $data['answer'],
 				'is_logged_in' => 1, //indicator if logged in or not
				'log_type' => "Instructor"
		
                     );
					 
				$this->session->set_userdata($sess_array);
				
				redirect("instructor/main");
				
				
				
		}else if($p->checkAdmin($idNum, $pass) >= 1){
			
				$data = $p->getAdminInfo($idNum);

			  $sess_array = array(
                'Idnum' => $data['Idnum'],
				'Email' => $data['Email'],
                'Password' => $data['Password'],
                'Fname' => $data['Fname'],
                'Lname' => $data['Lname'],
                'Gender' => $data['Gender'],
                'Phonenumber' => $data['Phonenumber'],
                'Username' => $data['Username'],
                'question' => $data['question'],
                'answer' => $data['answer'],
                'privilege' => $data['privilege'],
 				'is_logged_in' => 1 , //indicator if logged in or not
				'log_type' => "Admin"

                     );
					 
					 
				
				$this->session->set_userdata($sess_array);
				
				$this->index();

		}else {
				
				
		$this->load->view('HeaderBootstrap2');
 		$this->load->view('loginAdmin', array('message'=> "Incorrect Login!"));
		 $this->load->view('footer');
		
		}
	}else $this->index(); 
  }
    
    

  public function index(){
	  
 	 
	  
   if($this->session->userdata('log_type')=== "Admin"){
	   
		$this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
		$this->load->view('IMAdminHome');
        $this->load->view('footer');
		
    }else if($this->session->userdata('log_type')==="Instructor") {
		// if logged in, mo-direct sa homepage...
		
		
          $this->load->view('instructor/header_view');
		  $this->load->view('instructor/navbar_view');
		  $this->load->view('instructor/instructorbody_view');
		  $this->load->view('instructor/footer_view');
        
        }
                
                
                
                else
    {
                   $this->load->view('HeaderBootstrap2');
             $this->load->view('loginAdmin'); //otherwise, login page
    }
  }
        
		
		
    public function logout()
  {       
    $this->session->sess_destroy();
    redirect ('Admin/index', 'refresh');
  }
        
		
        public function viewaddCourse()
  {
  $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
  $this->load->view('admin/newCourse');
        $this->load->view('footer');
  }
        
      
    
       public function newInstructor()
  {
  $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
  $this->load->view('AddInstructor'); 
        $this->load->view('footer');
  }
        
         public function newAdministrator()
  {
     if ($this->session->userdata('privilege')=='Full access') {
  $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
  $this->load->view('newAdmin');  
        $this->load->view('footer');
		
	 }else $this->index();
  }
        
        
        public function listAdmin() {
			
     if ($this->session->userdata('privilege')=='Full access') {
		 
        $this->load->model('InstructorModel');
		$teach_model= new InstructorModel();
		
 
		$data['admins']=	$teach_model->loadAdminActive();
		$data['admins_arch']= $teach_model->loadAdminArch();
		
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
        $this->load->view('Admin/listAdmin',$data);
        $this->load->view('footer');
		
	 }else $this->index();
	 
    } 
    
    
    public function viewAdmin()
  {
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Idnum=$this->input->get('Idnum');  
$data=array();
$data=$p->getOneviewA();
  $this->load->view('viewadmin',$data);  
        $this->load->view('footer');
  }
        
        
    
    public function viewCourse()
  {
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->courseID=$this->input->get('courseID');  
$data=array();
$data=$p->getOneviewC();
  $this->load->view('viewdetails2',$data);  
        $this->load->view('footer');
  }
        
      public function viewaddUser()
  {
  $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
  $this->load->view('newUser');
        $this->load->view('footer');
  }      
         public function loadcourses() {
          
        $this->load->model('InstructorModel');
		$teach_model = new InstructorModel();
        $data['courses']= $teach_model->loadCourses();
        $data['arch_courses']= $teach_model->loadArchCourses();
		
         $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
        $this->load->view('CourseTable',$data);
        $this->load->view('footer');
    } 
    
      public function InstructorTable() {
        $this->load->model('InstructorModel');
        $teach_model =  new InstructorModel();
        $data=array();
        $data['active_inst']= $teach_model->loadInstructors();
        $data['arch_inst']= $teach_model->loadArchInstructors();		
		
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
        $this->load->view('ListInstructors',$data);
        $this->load->view('footer');
    } 
    
    public function viewInstructor()
  {
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Idnum=$this->input->get('Idnum');  
$data=array();
$data=$p->getOneview();
  $this->load->view('admin/viewInstructors',$data); 
        $this->load->view('footer');
  }        
      
    public function viewStudInfo()
  {
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
$this->load->model('InstructorModel');
$p = new InstructorModel();

   
$data=array();
$data=$p->getStudInfo($this->input->get('Email'));


  $this->load->view('admin/viewStudInfo',$data); 
        $this->load->view('footer');
  }       
  
      public function UpdateStudInfo()
  {
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
$this->load->model('InstructorModel');
$p = new InstructorModel();

   
$data=array();
$data=$p->getStudInfo($this->input->get('Email'));


  $this->load->view('admin/UpdateStudInfo',$data); 
        $this->load->view('footer');
  }        
  
        
public function addInstructor() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Fname=$this->input->post('Fname');
$p->Lname=$this->input->post('Lname');
$p->Email=$this->input->post('Email');
$p->Idnum=$this->input->post('Idnum');
$p->Vacant_Sched = $this->input->post('Vacant_Sched');
$p->Username=$this->input->post('Username');
$p->Password= MD5($this->input->post('Password'));
$p->Gender=$this->input->post('Gender');
 $p->Phonenumber=$this->input->post('Phonenumber');
$p->flag=$this->input->post('flag');
$p->question=$this->input->post('question');
$p->answer=$this->input->post('answer');
 $result=$p->addinstructor();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/InstructorTable','refresh');
}
            
            
}

public function AddCourse() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->CourseName=$this->input->post('CourseName');
$p->courseID=$this->input->post('courseID');
$p->courseDescription=$this->input->post('courseDescription');
$p->category=$this->input->post('category');
$p->courseStatus=$this->input->post('courseStatus');
$p->courseType=$this->input->post('courseType');
$p->date_expired=$this->input->post('date_expired');
$p->price=($this->input->post('courseType') == 'free')? 0: $this->input->post('price');
$p->flag=$this->input->post('flag');


/*
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

*/




 $result=$p->addcourse();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/loadcourses','refresh');
}
}

public function addAdministrator() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Fname=$this->input->post('Fname');
$p->Lname=$this->input->post('Lname');
$p->Email=$this->input->post('Email');
$p->Idnum=$this->input->post('Idnum');
 $p->Username=$this->input->post('Username');
$p->Password=$this->input->post('Password');
$p->Gender=$this->input->post('Gender');
 $p->Phonenumber=$this->input->post('Phonenumber');
 $p->mobile_number=$this->input->post('mobile_number');
$p->flag=1;
$p->privilege="Editor";
$p->question=$this->input->post('question');
$p->answer=$this->input->post('answer');
 $result=$p->addadmin();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/AdminTable','refresh');
}
            
            
}

public function UpdateviewAdmin()
  {
         $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Idnum=$this->input->get('Idnum');  
$data=array();
$data=$p->getOneviewA();
  $this->load->view('UpdateAdmin',$data); 
        $this->load->view('footer');
  } 
        
        
        
        public function Updateviewcourse()
  {
         $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->courseID=$this->input->get('courseID');  
$data=array();
$data=$p->getOneviewC();

  $this->load->view('Updatecourse',$data);  
        $this->load->view('footer');
  } 
        
        
                  
        public function reactivate_form()
  {
	  
	  
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
		
		
		$this->load->model('InstructorModel');
		$p = new InstructorModel();


		$courseID= $this->input->get('courseID');


		$data['course_info']=$p->getCourseInfo($courseID);
		$data['avail_inst']= $p->loadInstructors()->result_array();

	 
		 

		  $this->load->view('reactivate_course',$data);  
		   $this->load->view('footer');
  
   
   
   
  } 
  
  
  public function reactivate()
  {
	  
	  
		$this->load->model('InstructorModel');
		$p = new InstructorModel();
		$upd_course['courseID']= $this->input->post('course_id');
 		$upd_course['date_expired']= $this->input->post('date_expired');
		$upd_course['flag']= 1;
	 
	   $p->reactive_course($upd_course);
	  
	  
	  
	redirect('Admin/loadcourses');
	  
   }   
   
   
   public function UpdateViewInstructors()
  {
         $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Idnum=$this->input->get('Idnum');  
$data=array();
$data=$p->getOneview();
  $this->load->view('UpdateViewInstructors',$data); 
        $this->load->view('footer');
  }        
        
        
 public function UpdateInfo() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Fname=$this->input->post('Fname');
$p->Lname=$this->input->post('Lname');
$p->Email=$this->input->post('Email');
$p->Idnum=$this->input->post('Idnum'); 
$p->Username=$this->input->post('Username');
$p->Password=$this->input->post('Password');
$p->Gender=$this->input->post('Gender');
 $p->Phonenumber=$this->input->post('Phonenumber');
$p->flag=$this->input->post('flag');
$p->question=$this->input->post('question');
$p->answer=$this->input->post('answer');
 $result=$p->updateInstrutor();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/InstructorTable','refresh');
}
            
            
}

 public function Update_StudInfo() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();
$data['Fname']=$this->input->post('Fname');
$data['Lname'] =$this->input->post('Lname');
$data['Email']=$this->input->post('Email');
$data['username']=$this->input->post('username');
$data['question']=$this->input->post('question');
$data['answer']=$this->input->post('answer');
  
 $result=$p->updateStud($data);
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/liststuds','refresh');
}
            
            
}
public function UpdateAdmin_Proc() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->Fname=$this->input->post('Fname');
$p->Lname=$this->input->post('Lname');
$p->Email=$this->input->post('Email');
$p->Idnum=$this->input->post('Idnum'); 
$p->Username=$this->input->post('Username');
$p->Password=$this->input->post('Password');
$p->Gender=$this->input->post('Gender');
 $p->Phonenumber=$this->input->post('Phonenumber');
 $p->question=$this->input->post('question');
$p->answer=$this->input->post('answer');
$p->admin_no=$this->input->post('admin_no');


 $result=$p->UpdateAdmin();
 
 if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/listAdmin','refresh');
}

}
 

public function UpdateInfoC() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->CourseName=$this->input->post('CourseName');
$p->courseID=$this->input->post('courseID');
$p->courseDescription=$this->input->post('courseDescription');
$p->category=$this->input->post('category');
$p->courseStatus=$this->input->post('courseStatus');
$p->courseType=$this->input->post('courseType');
$p->price=($this->input->post('courseType') == 'free')? 0: $this->input->post('price');
$p->flag=$this->input->post('flag');
 $result=$p->Updatecourse();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/loadcourses','refresh');
}
}



            

public function delete(){
     $this->load->model('InstructorModel');
     $p = new InstructorModel();
     $p->Idnum=$this->input->get('Idnum');
     $p->flag=2;
     $result=$p->delete();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/InstructorTable','refresh');
}
}

public function deleteadmin(){
     $this->load->model('InstructorModel');
     $p = new InstructorModel();
     $p->Idnum=$this->input->post('Idnum');
     $p->flag=$_POST['flag']=2;
     $p->date_deactivated= date("Y-m-d");
     $result=$p->deleteA();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/AdminTable','refresh');
}
}




public function deletecourse(){
     $this->load->model('InstructorModel');
     $p = new InstructorModel();
     $p->courseID=$this->input->get('courseID');
     $p->flag=2;
	 $p->date_expired = date("Y-m-d");
     $result=$p->deleteC();
	 
	 
	 
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/loadcourses','refresh');
}
}     


                 

public function del_inst_form(){
    
/*
	$this->load->model('InstructorModel');
     $p = new InstructorModel();
     $p->Idnum=$this->input->get('Idnum');
     $p->flag=2;
	 $p->date_added = date("Y-m-d");
     $result=$p->delete_inst();
	 
	 
	 
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/loadcourses','refresh');
}

*/

     $this->load->model('InstructorModel');
     $p = new InstructorModel();
	 
		$data['ass_courses']= $p->loadAssCourses($this->input->get('Idnum'));
	 	$data['inst_info']= $p->getInstructorInfo($this->input->get('Idnum'));
		$data['inst']= $p->loadInstructors($this->input->get('Idnum'))->result_array();
 
		$this->load->view('HeaderBootstrap');
        
		$this->load->view('Nav');
		$this->load->view('admin/del_inst_form',$data);
		
        $this->load->view('footer');
}  



public function search(){
    
    
    $data = array();
    $this->load->model('InstructorModel');
    $p = new InstructorModel;
    $search_name = $this->input->post('search_name');
    $data['user'] = $p->searchUser($search_name);
    $data['instructors'] = $p->searchInstructor($search_name);
    $data['course']= $p->searchCourse($search_name);
    $data['admin'] = $p->searchAdmin($search_name);
    $this->load->view('HeaderBootstrap');
    $this->load->view('Nav');
    $this->load->view('results1',  $data);
    $this->load->view('results2', $data);
    $this->load->view('results3', $data);
    $this->load->view('results4', $data);
    $this->load->view('footer');
}

public function addIntinCourse() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();

/*
$p->instruct_course_id=$this->input->post('instruct_course_id');
$p->course_id=$this->input->post('course_id');
$p->IdNum=$this->input->post('IdNum');
$p->date_instruct=$this->input->post('date_instruct');
$p->flag=$this->input->post('flag');
 $result=$p->addinstrucCourse();
 */

$course_id = $this->input->post('course_id');

$upd_course['IdNum']=$this->input->post('IdNum');

$upd_course['date_assigned']= date("Y-m-d");


$p->AssCourse($upd_course, $course_id);


/*
if(!$result){
echo mysqli_error($result);
}

else{

}
*/

redirect('Admin/viewAddInstructCourse','refresh');  


            
}

 public function viewAddInstructCourse()
  {
     
    $data=array();
    $this->load->model('InstructorModel');
    $p = new InstructorModel;
    $data['course']= $p->loadAssignments()->result_array();
    $data['instructors']= $p->loadInstructors()->result_array();
    $data['select_courses'] = $p->selectCourses();

 
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
  $this->load->view('admin/CourseAddInstructor',$data);
        $this->load->view('footer');
        
        
  }


public function deleteInstCourse(){
     $this->load->model('InstructorModel');
     $p = new InstructorModel();
     $p->instruct_course_id=$this->input->post('instruct_course_id');
     $p->flag=$_POST['flag']='2';
     $result=$p->deleteIC();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/viewAddInstructCourse','refresh');
}
}
/*
public function viewAddusers()
  {
     
   $data=array();
    $this->load->model('InstructorModel');
    $p = new InstructorModel;
    $data['course']= $p->selectCourse();
    $data['user']= $p->selectUser();
    $data['usercourse']= $p->selectStudentCourse();
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
  $this->load->view('CourseAddStudent',$data);
        $this->load->view('footer');
        
        
  }  
*/
  
public function enrollStud(){
		
	 
    $this->load->model('InstructorModel');
    $p = new InstructorModel;
    $data['course']= $p->selectCourse();
    $data['user']= $p->selectUser();
	    $data['enrollments']= $p->loadEnrollments();

 	
 	
        $this->load->view('HeaderBootstrap');
        $this->load->view('Nav');
  $this->load->view('CourseAddStudent',$data);
  
  
        $this->load->view('footer');
        
}


public function listStuds(){
    
	 $this->load->model('InstructorModel');
    $p = new InstructorModel;
    $this->load->view('HeaderBootstrap');
    $this->load->view('nav');
	$array['studs'] = $p->loadStuds();
	
    $this->load->view('admin/list_studs.php',$array);
    $this->load->view('footer');

}



public function viewalllectures(){
    $this->db->select('*');
    $this->db->from('course');
    $this->db->join('video_lectures', 'course.courseID=video_lectures.course');
    


    $query = $this->db->get();
    $result = $query->result_array();
    $array['lecture'] = $result;

    $this->load->view('HeaderBootstrap');
    $this->load->view('nav');
    $this->load->view('admin/viewalllectures_view.php',$array);
    $this->load->view('footer');

}

public function addStuinCourse() {
        
$this->load->model('InstructorModel');
$p = new InstructorModel();
$p->course_id=$this->input->post('course_id');
$p->Email=$this->input->post('Email');
$p->flag=$this->input->post('flag');
$r=array();
$r=$p->selectstuCourse();
 
 $result=$p->addStudstrucCourse();
if(!$result){
echo mysqli_error($result);

redirect('Admin/enrollStud');
}
else{
redirect('Admin/enrollStud');

}
            
            
}

public function deleteStudCourse(){
     $this->load->model('InstructorModel');
     $p = new InstructorModel();
     $p->user_course_id=$this->input->get('user_course_id');
     $p->flag = 2;
     $result=$p->deleteUC();
if(!$result){
echo mysqli_error($result);
}
else{
redirect('Admin/viewAddusers','refresh');
}
}
public function emailvalidate(){
            $this->load->model("InstructorModel");

            $p= new InstructorModel();



            echo $p->checkEmail($this->input->post('email'));

    }
    
    public function emailvalidate2(){
            $this->load->model("InstructorModel");

            $p= new InstructorModel();



            echo $p->checkEmail2($this->input->post('email'));

    }
    
    public function emailvalidate3(){
            $this->load->model("UserModel");

            $p= new UserModel();



            echo $p->checkEmail($this->input->post('email'));

    }
    
    
    public function IDvalidate(){
            $this->load->model("InstructorModel");

            $p= new InstructorModel();



            echo $p->checkIdnum($this->input->post('Idnum'));

    }
    
    public function IDvalidate2(){
            $this->load->model("InstructorModel");

            $p= new InstructorModel();



            echo $p->checkIdnum2($this->input->post('Idnum'));  

    }

public function uservalidate(){
            $this->load->model("UserModel");

            $p= new UserModel();



            echo $p->checkusername($this->input->post('username'));

    }

}

