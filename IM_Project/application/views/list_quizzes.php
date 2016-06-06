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
 
<div style="margin-top:8%;"></div>
<div class="container">




    <div class="container">
        <div class="row well">
            <div class="jumbotron" id="ju" style="text-align:center;color:#2F7EC1;">

                <h1> List of Uploaded Quizzes</h1>
	</div>
                                            <br>
										  <?php if(!empty($quizzes)){ ?>
											  
										  <table id = "table_lec" class= " datatable1 table table-bordered">
										  <thead>
										  <tr>
											<th>Quiz Id</th>
											<th>Quiz Name</th>
											<th>Number of Questions</th>
											<th>Total Points</th>											
											<th>Passing Percentage</th>
											<th>Date Created</th>

											
 											</thead>
											
											
											<tbody>
											<?php foreach($quizzes as $row) { ?>
											
											<tr>
											<td><?php echo $row['quiz_id']; ?></td>
											<td><?php echo $row['quiz_name']; ?></td>
											<td><?php echo $row['quiz_num_quest']; ?></td>
											<td><?php echo $row['quiz_total_score']; ?></td>
											<td><?php echo $row['quiz_pass_percent']."%"; ?></td>
											<td><?php echo $row['quiz_date_createdby']; ?></td>
 											
											<?php } ?>
											
											</tbody>
											
										  </table>
										  <?php }else echo "No Quizzes Available..."; ?>

                           
                                      </div>
                                  </div>
                              </div>
           </div>
        </div>
      </div>
    </div>
 </div>
                       
                   






</body>



