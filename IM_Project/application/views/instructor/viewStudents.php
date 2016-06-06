

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<br>
<br>
<br>
<br>

<div class="panel panel-default">
  <div class="panel-heading">
  <h1 class="panel-title"><center><span class="glyphicon glyphicon-list"></span>         Your Students</h1></center>
  </div>

<div style="padding-top:50px;" class="container" id="in-body">
      <div class="row">
     
        <div class="panel-body">
   
  
  <?php $example='0';
  foreach($instruct_course as $data1){
      if($data1->IdNum==$this->session->userdata('Idnum')&&$data1->flag=='1'){    $example++;?>       
       
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"> <?php echo ($data1->course_id); 

              ?> &nbsp;

    <?php  if ($data1->course_id!=NULL) {
          foreach($course as $data2){
      if ($data2->courseID==$data1->course_id && $data2->flag=='1') {
            echo ($data2->courseType);
            echo ($data2->CourseName);
 
            }      
            
              }
      } ?>

    </h3>
            </div>
            <div class="panel-body">
              <div class="row" style="padding: 0 20px 0 20px;">

                <table class="table table-hover" id='<?php  echo ($example);  ?>'>
                  <thead>
                    <tr>
                      <th style="width: 35%;">Username</th>
                      <th>Email</th>
                      <th>First name</th>
                      <th>Last name</th>
                     
                    </tr>
                  </thead>
                  <tbody>
 <?php 
  foreach($user_course as $data3){
      if($data3->flag=='1'){
 foreach($user as $data4){            
 if ($data4->flag!='2'&&($data3->Email)==($data4->Email)&&($data1->course_id)==($data3->course_id)) {
                    ?>


                    <tr>
                      <td><?php  echo ($data4->username); ?></td>
                      <td><?php  echo ($data4->Email); ?></td>
                      <td><?php echo ($data4->Fname); ?></td>
                       <td><?php echo ($data4->Lname); ?></td>
                    </tr>


<?php }
                  }
                }
                  } ?> 

                  </tbody>
                </table>
              


               


              <div class=" col-md-9 col-lg-9 "> 
                  
                  
             
                </div>
              </div>
            </div>
             
                   
<?php for($example;$example!=0;$example--) { ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#($example)').DataTable();
} );

</script>
<?php } ?>
          </div>





<?php } 


}

?>









        </div>
      </div>
    </div>
  </div>