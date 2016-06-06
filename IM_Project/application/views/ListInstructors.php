<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
   <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
</head>
<div class="col-lg-8">
  <div class="inner cover">
          <div class="jumbotron" style="background-color: #337ab7; border-radius: 4px;">
          <h1><span class="glyphicon glyphicon-list"></span> List of Instructors</h1>  
         </div>
            <p class="lead">Welcome to the List of Instructors. This is where the you control Instructor accounts. If you need help, please do go to the help page for more information.</p>
          </div>


<div class="col-lg-12" style="background-color: #fff; border-radius: 4px;">  


       	<h4><p class= "text text-success">Choose List:<select id = "course_list_sel" style ="color:black;">
	
	<option value = "open">Active Instructors</option>
	<option value = "arch">Deactivated Instructors</option>

	
	</select></p></h4>
  <div class="table-responsive" id = "normal_lists">
  
  	
	

            <table id="datatables datatables_open" class="table table-hover" style="color:#111;">
              <thead>
              <br>
                <tr> 
                      <th>ID Number</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 
  <?php foreach($active_inst->result() as $datas){
	  
      if($datas->flag==1){ ?> 
	  
	  
                <tr <?php if($this->input->get('inst_id') !== NULL && $this->input->get('inst_id') == $datas->Idnum) { ?> style = "background-color: yellow;" <?php } ?>>
                   <td><?php echo ($datas->Idnum); ?></td>
                  <td><?php echo ($datas->Fname); ?></td>
                   <td><?php echo ($datas->Lname); ?></td>

					
				  <td><a href= "<?php echo 'viewInstructor?Idnum='.$datas->Idnum; ?>" class="btn btn-info"><span class="glyphicon glyphicon-info-sign">View</span></button>

                 <a href= "<?php echo 'UpdateViewInstructors?Idnum='.$datas->Idnum; ?>" class="btn btn-default"><span class="glyphicon glyphicon-info-sign">Edit</span></button>
				 
                 <a href= "<?php echo 'sendChangePass?Idnum='.$datas->Idnum; ?>" class="btn btn-default"><span class="glyphicon glyphicon-primary-send">Send Change Pass</span></button>

				  
                  </tr>
  <?php }}?>              
               
                      
              </tbody>
            
            </table>

             <script type="text/javascript">
              $(document).ready(function() {
                  $('#tables').DataTable();
              } );

           </script>
            <br>
           
          </div>
 

       
  <div class="table-responsive" id = "arch_lists">
  
  
            <table id="datatables datatables_arch" class="table table-hover" style="color:#111;">
              <thead>
              <br>
                <tr> 
				
                    <th>ID Number</th>
                   <th>First Name</th>
                   <th>Last Name</th>
				  <th>Deactivated Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 
  <?php foreach($arch_inst->result() as $datas){
	  
      if($datas->flag==2){ ?> 
	  
	  
                <tr>
                 
                  <td><?php echo ($datas->Fname); ?></td>
                   <td><?php echo ($datas->Lname); ?></td>
                    <td><?php echo ($datas->Idnum); ?></td>
                    <td><?php
				    
			$php_date= strtotime($datas->date_added);
			 
			echo date("M d, Y", $php_date);
			  ?></td>

					
				  <td><a href= "<?php echo 'reactivate_inst?Idnum='.$datas->Idnum; ?>" class="btn btn-success"><span class="glyphicon glyphicon-info-sign">Re- Activate</span></button>

 
				  
                  </tr>
  <?php }}?>              
               
                      
              </tbody>
            
            </table>

             <script type="text/javascript">
              $(document).ready(function() {
                  $('#tables').DataTable();
              } );

           </script>
            <br>
           
          </div>
        </div> 


<div class="col-sm-12" style="height:30px;">
 
</div>

        </div>

<script type="text/javascript">
$(document).ready(function() {
	
    $('#datatables_open, #datatables_arch').DataTable();
 
	$("#arch_lists").hide();

	
	$("#course_list_sel").change(
	
			function(){

 		
		if($(this).val() == "open"){
			
				$("#normal_lists").show();
				$("#arch_lists").hide();

		}else if($(this).val() == "arch"){
			
				$("#normal_lists").hide();
				$("#arch_lists").show();

		}
	
});
	
});

</script>

<div class="col-lg-4">
 <div class="panel" style="background-color: #222;">
  <div class="panel-heading" style="background-color: #337ab7;"><h2>Option</h2></div>
   <div class="panel-body">

   <a href="newInstructor" role="button" class="btn btn-info btn-block btn-lg">Create New Instructor</a>






   </div>
  </div>
</div>

