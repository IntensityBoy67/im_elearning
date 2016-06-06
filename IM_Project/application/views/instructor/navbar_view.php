<style type="text/css">
nav{
  height: 69px;
  background-color: #0080BC !important;
}

.headnav:hover{
  background-color: #005983 !important;
	
  }

</style>


</style>

<nav class="navbar navbar-findcond navbar-fixed-top"  >

    <div class="container">
		<div class="navbar-header">
			<button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<br>
			<a style="color:#fff;" class="navbar-brand headnav" href="<?php echo site_url('instructor/main') ?>">Integrated Maritime</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">



			<ul class="nav navbar-nav navbar-right">
<!-- course materials -->

<li class="dropdown">
					<a href="#" style="color:#fff;" class="dropdown-toggle headnav" data-toggle="dropdown" role="button" aria-expanded="false"><br>Lectures</span><span class="caret"></span></a>
					<ul class="dropdown-menu"  role="menu">

						<li><a class="headnav"  href="<?php echo site_url('instructor/select_course')?>">Add Lectures</a></li>
						<li><a class= "headnav"  href="<?php echo site_url('instructor/list_lects')?>">List of Lectures</a></li>
						

						<!--<li><a href="<?php echo site_url('instructor/addquiz')?>">Add quiz</a></li>-->
						<!--<li><a href="<?php echo site_url('instructor/addlectures') ?>">List of Lectures</a></li> -->
						
						
					</ul>
				</li>


				<li class="dropdown">
					<a href="#" style="color: #fff;" class="dropdown-toggle headnav" data-toggle="dropdown" role="button" aria-expanded="false"><br>Quiz</span><span class="caret"></span></a>
					<ul class="dropdown-menu"  role="menu">

						<li><a class= "headnav"  href="<?php echo site_url('instructor/quizmodule')?>">Add Quiz</a></li>
						<li><a class= "headnav" href="<?php echo site_url('instructor/list_quizzes')?>">List of Quizzes</a></li>
						
						<!-- <li><a class= "headnav" href="<?php echo site_url('instructor/quizmodule')?>">List of Recently Taken Quiz</a></li> -->

						<!--<li><a href="<?php echo site_url('instructor/addquiz')?>">Add quiz</a></li>-->
						<!--<li><a href="<?php echo site_url('instructor/addlectures') ?>">List of Quizzes</a></li> -->
						
						
					</ul>
				</li>

<!-- end of course materials -->				
<!-- announcement -->
				<li class="dropdown">
					<a href="#" style="color:#fff;" class="dropdown-toggle headnav" data-toggle="dropdown" role="button" aria-expanded="false"><br>Announcement</span><span class="caret"></span></a>
					<ul class="dropdown-menu"  role="menu">
						<li>

						<a class= "headnav" type="submit" href="<?php echo site_url('instructor/announcement')?>"><input type="hidden"  name="Idnum"  value="<?php echo $this->session->userdata('Idnum'); ?>" readonly />
						Post Announcements</a>	
						
						</li>

						<li>
						<a class= "headnav" type="submit" href="<?php echo site_url('instructor/announcement')?>"><input type="hidden"  name="Idnum"  value="<?php echo $this->session->userdata('Idnum'); ?>" readonly />
						List of Announcements</a>	
						
						</li>
					</ul>
					

				</li>
<!-- end of announcement -->

				<li><a class= "headnav" style="color:#fff;" href="<?php echo site_url('instructor/courselist') ?>" ><br>My Assigned Courses</a></li>
			

				

				
				<li class="dropdown">
				
					<a href="#" style="color:#fff;" class="dropdown-toggle headnav" data-toggle="dropdown" role="button" aria-expanded="false"><br>Instructor <span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
					<ul class="dropdown-menu"  role="menu">

						<li><a class= "headnav" href="updateInfoForm">Edit Account</a></li>

						<li><a class= "headnav" href="<?php echo site_url('IM/logout'); ?>">Log out</a></li>
						
					</ul>
				</li>
			</ul>
			<!--<form class="navbar-form navbar-right search-form" role="search">
				<input type="text" class="form-control btn-lg" placeholder="Search" /> 
				<button class="btn btn-info "> <i class="glyphicon glyphicon-search"></i></button>
			</form> -->
		</div>
	</div>
</nav>