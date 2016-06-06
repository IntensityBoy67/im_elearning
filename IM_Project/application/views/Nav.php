<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
   <img src="../../img/logo entry2.png" class="img-responsive" alt="brand">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('Admin/index') ?>">Home</a></li>
          

          <li class="dropdown">

          <ul class="dropdown-menu">
		 
		 
            <li><a href="<?php echo site_url('Admin/listAdmin') ?>">Admin</a></li>   
		   
            <li><a href="<?php echo site_url('Admin/InstructorTable') ?>">Instructors</a></li>
            
            <li><a href="<?php echo site_url('IM/loadusers') ?>">Students</a></li>
          </ul>
        </li>
   
        
        <li class="dropdown">
          <a href="viewAddusers" class="dropdown-toggle" data-toggle="dropdown">Assignments<b class="caret"></b></a>
         <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('Admin/viewAddInstructCourse') ?>">Instructor Assignment</a></li>		 
  			
          </ul>
        </li>
  <li class="dropdown">
          <a href="viewAddusers" class="dropdown-toggle" data-toggle="dropdown">Instructors<b class="caret"></b></a>
         <ul class="dropdown-menu">
		 
             <li><a href="<?php echo site_url('Admin/newInstructor') ?>">Add Instructor</a></li>
             <li><a href="<?php echo site_url('Admin/InstructorTable') ?>">List of Instructors</a></li>
 			
          </ul>
        </li>

		  <li class="dropdown">
          <a href="viewAddusers" class="dropdown-toggle" data-toggle="dropdown">Courses<b class="caret"></b></a>
         <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('Admin/viewaddCourse') ?>"> Add Course</a></li>
            <li><a href="<?php echo site_url('Admin/loadcourses') ?>">List of Courses</a></li>
 		
 			
          </ul>
        </li>

		
		
       <li class="dropdown">
          <a href="viewAddusers" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a>
         <ul class="dropdown-menu">
		             <li><a href="<?php echo site_url('Admin/enrollStud') ?>">Enroll Student</a></li>

            <li><a href="<?php echo site_url('Admin/listStuds') ?>">List of Students</a></li>
 		
 			
          </ul>
        </li>
		
		<?php  if ($this->session->userdata('privilege')=='Full access') { ?> 
          <li class="dropdown">
          <a href="viewAddusers" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
         <ul class="dropdown-menu">
		 
 <li><a href="<?php echo site_url('Admin/newAdministrator') ?>">Add Admin</a></li>
 
            <li><a href="<?php echo site_url('Admin/listAdmin') ?>">List of Admins</a></li>
 		
 			
          </ul>
        </li>
		
		<?php  } ?>
        <div class="navbar-form navbar-left form-group has-info has-feedback">
            <?php echo form_open('Admin/search'); ?> 
            <input type="text" class="form-control" placeholder="Search" name="search_name">
           <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>  Search</button>
           <?php echo form_close(); ?>     
        </div>
    
         <li class="dropdown"  >
          <a href="#s" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('Username')?> <b class="caret"></b></a>
         <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('Admin/logout'); ?>">Log out</a></li>
          </ul>
        </li>
     
         </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

