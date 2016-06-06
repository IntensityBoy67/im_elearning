<style type="text/css">
nav{
  height: 69px;
  background-color: #0080BC !important;
}

.headnav:hover{
  background-color: #005983 !important;
}

</style>

<nav class="navbar navbar-findcond navbar-fixed-top" >

    <div class="container">
    <div class="navbar-header">
      <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <br>
      <a  style="color:#fff;" class="navbar-brand headnav" href="<?php echo site_url('IM/index') ?>">Integrated Maritime</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">



      <ul class="nav navbar-nav navbar-right">



        
      <li ><a class= "headnav " style="color:#fff;" href="<?php echo site_url('IM/myCourse') ?>" ><br> 
        <span class="glyphicon glyphicon-book"></span>  My Courses</a>
      </li>      
      <li><a class= "headnav" style="color:#fff;" href="<?php echo site_url('IM/courseEnroll') ?>" ><br>
        <span class="glyphicon glyphicon-file"></span>
        Course Offered</a></li>
      <li><a class= "headnav" style="color:#fff;" href="<?php echo site_url('IM/quizresults')?>" ><br>
        <span class="glyphicon glyphicon-list-alt"></span>
        Quiz Taken</a></li>
      <li><a class= "headnav" style="color:#fff;" href="<?php echo site_url('IM/stud_prog')?>" ><br>
        <span class="glyphicon glyphicon-signal"></span>
       Course Progress</a></li>

      <li><a class= "headnav" style="color:#fff;" href="<?php echo site_url('IM/stud_eval')?>" ><br>
        <span class="glyphicon glyphicon-ok"></span>
        Student Evaluation</a></li>

        

        
        <li class="dropdown">
          <a href="#" style="color:#fff;" class="dropdown-toggle headnav" data-toggle="dropdown" role="button" aria-expanded="false"><br>Student <span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
          <ul class="dropdown-menu"  role="menu">

            <li><a class= "headnav"  href="<?php echo site_url('IM/UpdateViewUser') ?>">Edit Account</a></li>
             <li><a class= "headnav" href="<?php echo site_url('IM/UserManual')?>">User Manual</a></li>
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
     


