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


<div class="col-lg-12" style="background-color: #fff; border-radius: 4px;">
    <h1 style="color:#111;">Users Result</h1>    
  <div class="table-responsive">
            <table id="example" class="table table-hover" style="color:#111;">
              <thead>
              <br>
                <tr> 
                
                   <th>1st Name</th>
                   <th>Last Name</th>
                  <th>Email</th>
                  <th>View details</th>
                </tr>
              </thead>
              <tbody>
<?php
if($user != NULL)
{                   
   foreach($user as $data1){
    
      if($data1->flag=='1'){?> 
                <tr>
                 
                  <td><?php echo ($data1->Fname); ?></td>
                   <td><?php echo ($data1->Lname); ?></td>
                    <td><?php echo ($data1->Email); ?></td>
                  <?php echo form_open('IM/viewUser');?>  
                  <input class="form-control" type="hidden" name="Email" value="<?php echo $data1->Email; ?>"/>  
                  <td><button class="btn btn-default"><span class="glyphicon glyphicon-info-sign"></span></button></td>
                  <?php echo form_close();?>  
                </tr>
      <?php }}} else {?> <tr><td><?php echo "No results found"; ?></td></tr> <?php } ?>
          
          
            
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
