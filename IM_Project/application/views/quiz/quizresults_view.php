


<div style="height: 50px;"></div>
<div class="container">


		<section class="wrapper">
			<div class="row">
				<div clas="col-md-12">
				<h2><b>Quiz Results</b> </h2> <br>
				
	<p>*Sorted from Latest to Oldest</p>
	           <div class="table-responsive">
			   
			   <?php if(!empty($quiz_taken_lists)){ ?>
					<table id="example" class="table table-condensed table-bordered table-responsive">
						<thead style="background-color:#0080BC;">
							<tr>
								<th style="color:#fff;">Quiz Name</th>
								<th style="color:#fff;">Course ID</th>
								<th style="color:#fff;">Date Taken</th>
								<th style="color:#fff;">Points</th>
								<th style="color:#fff;">Remark</th>
							</tr>

						</thead>
						<tbody>
						
						<?php 
						
 
						foreach($quiz_taken_lists as $row){ ?>
						
						
							<tr>
				<td><a href= "<?php echo 'ViewQuiz?quiz_id='.$row['quiz_id']; ?>"><?php echo $row['lec_title']; ?></a></td>
				<td><?php echo  $row['course']; ?></td>
				<td><?php 	$php_date= strtotime($row['quiz_taken_date']);
			 
			echo date("M d, Y", $php_date);
			
			?></td>
				<td><?php 
				
				
				echo $row['quiz_tot_score'];

				//echo "(".$row['quiz_pass_percent']."%)"; 
				
				?>
				
				</td>
									
				<td><?php 
				
				if($row['quiz_max_scores'] >= 1){
				
					if(round($row['quiz_tot_score']/$row['quiz_max_scores'] * 100) >= $row['quiz_pass_percent'])
			
						echo "<span class= 'text text-success'>Passed</span>";
					
					else
						echo "<span class= 'text text-danger'>Failed</span>";

			
				}else 
						echo "<span class= 'text text-danger'>Failed</span>";
				?>
				
				
  				<!-- <td><p class= 'label label-danger'><?php ($row['quiz_tot_score']/$row['quiz_max_scores']) >= ($row['quiz_tot_score']/$row['quiz_max_scores'])/$row['quiz_pass_percent']; ?></th> -->
				
				
							</tr>	
							
		<?php 		} 
		
			   ?>
			   
							</tr>	
						</tbody>
						
			
<?php }else echo "No Quiz Results!"; ?>
					</table>
                    <script type="text/javascript">
                            $(document).ready(function() {
                                $('#example').DataTable();
                            } );

                    </script>
                 </div>   
				</div>

			</div>

		</section>




</div>