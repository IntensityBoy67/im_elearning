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
          <h1><span class="glyphicon glyphicon-list"></span>Adminstrator Information</h1>  
         </div>
            <p class="lead">Welcome to the Master list of Administrators. This is where the you control administrator accounts. If you need help, please do go to the help page for more information.</p>
          </div>

<div class="col-lg-12" style="background-color: #fff; border-radius: 4px;">         
  <div class="table-responsive">
    <br>
            <table id="example" class="table table-hover" style="color:#111;">
              <thead>
              
                <tr> 
                 
                   <th>1st Name</th>
                   <th>Last Name</th>
                  <th>ID Number</th>
                  <th>View details</th>
                </tr>
              </thead>
              <tbody>
                 
  <?php 
  


  foreach($prod->result() as $datas){
      if($datas->flag=='1'){
         
          
          ?>                   
                <tr>
                 
                  
                  <td><?php echo ($datas->Fname); ?></td>
                   <td><?php echo ($datas->Lname); ?></td>
                    <td><?php echo ($datas->Idnum); ?></td>
                  <?php echo form_open('Admin/viewAdmin');?>  
                  <input class="form-control" type="hidden" name="Idnum" value="<?php echo $datas->Idnum; ?>"/>  
                  <td><button class="btn btn-default"><span class="glyphicon glyphicon-info-sign"></span></button></td>
                  <?php echo form_close();?>  
                </tr>
  <?php }}?>              
               
                      
              </tbody>
            </table>
            <br>
            <script type="text/javascript">
              $(document).ready(function() {
                  $('#example').DataTable();
              } );

    </script>

          </div>
        </div> 



<div class="col-sm-12" style="height:30px;">
 
</div>

        </div>

<div class="col-lg-4">
 <div class="panel" style="background-color: #222;">
  <div class="panel-heading" style="background-color: #337ab7;"><h2>Option</h2></div>
   <div class="panel-body">

   <a href="newAdministrator" role="button" class="btn btn-info btn-block btn-lg">Create New Administrator</a>

   </div>
  </div>
</div>



