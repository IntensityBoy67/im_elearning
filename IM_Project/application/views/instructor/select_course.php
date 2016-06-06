<style type="text/css">.entry:not(:first-of-type)
    {
        margin-top: 10px;
    }

    .glyphicon
    {
        font-size: 12px;
    }
    #filehere{
        width:  500px;
    }
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    #ju{
        border: solid 2px #2F7EC1;


    }
    .well{

        width: 80%;
        margin: 0 auto;
        background-color: #fff;

    }
    .required{
        color:red;
    }
    #lectable{
        background-color: #fff;
    }
</style>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css" />

<script>

$("document").ready(function(){
	
		$("#table_lec").dataTable();
	
});

</script>
<div style="margin-top:8%;"></div>
<div class="container">




    <div class="container">
        <div class="row well">
            <div class="jumbotron" id="ju" style="text-align:center;color:#2F7EC1;">

                <h1>Select a Course</h1>
	</div>
                                            <br>
										  
										  <table id = "table_lec" class= " datatable1 table table-bordered">
										  <thead>
										  <tr>
											<th>Course Id</th>
											<th>Course Name</th>
											<th>No. of Lectures</th>
											<th>Date Assigned</th>
											<th>Action</th>
											
											
 											</thead>
											
											
											<tbody>
											<?php 
											$this->load->model('InstructorModel');
											$p = new InstructorModel();
											
											foreach($courses as $row) { 
											
																				
											
											?>
											<tr>
											<td><?php echo $row['courseID']; ?>
											<td><?php echo $row['CourseName']; ?>
											<td><?php echo $p->count_lecs($row['courseID']); ?>
											<td><?php 
												$php_date= strtotime($row['date_assigned']);
			 
			echo date("M d, Y", $php_date);
											 ?>
											<td><?php echo "<a href= 'addlectures?course_id=". $row['courseID'] ."'>Add Lecture</a>"; ?>
											<?php }?>
											</tbody>
											
										  </table>
										  

                           
                                      </div>
                                  </div>
                              </div>
           </div>
        </div>
      </div>
    </div>
 </div>
                       
                   






</body>



