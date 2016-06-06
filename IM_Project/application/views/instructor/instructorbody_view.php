
<br>
<br>
<br>
<br>
<div style="padding-top:50px;" class="container" id="in-body">
      <div class="row">
     
        <div >
   
   
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $this->session->userdata('Fname'); ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information table-hover">
                    <tbody>
 
                      <tr>
                        <td>Username:</td>
                        <td><?php echo $this->session->userdata('Username'); ?></td>
                      </tr>
                    
                  
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td><?php echo $this->session->userdata('Gender'); ?></td>
                      </tr>
                      <tr>
                        <td>First name</td>
                        <td><?php echo $this->session->userdata('Fname'); ?></td>
                      </tr>
                      <tr>
                        <td>Last name</td>
                        <td><?php echo $this->session->userdata('Lname'); ?></td>
                      </tr>
                      <tr>
                        <td>ID number</td>
                        <td><?php echo $this->session->userdata('Idnum'); ?></td>
                        
                       </tr> 
                        <tr>
                        <td>Email</td>
                        <td><?php echo $this->session->userdata('Email'); ?></td>
                        
                       </tr> 

                        <tr>
                        <td>Contact number</td>
                        <td><?php echo $this->session->userdata('Phonenumber'); ?>
                        </td>

                        <tr>
                        <td>Schedule</td>
                        <td><?php echo $this->session->userdata('ScheduleIn'); ?> <?php echo$this->session->userdata('ScheduleOut'); ?>
                        </td>
                           
                      </tr>

                  
                     
                      <tr>
                        <td> 
                               <a href= "UpdateInfoForm" class='btn btn-primary'>Edit Account</a>
                            
                        </td>
                        <td>
                          
                        </td>
                        
                           
                      </tr>

                    </tbody>
                  </table>
                  
             
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>