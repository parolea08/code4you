<div class="row" align="center">
	<div class="col-sm-12">
		<div class="panel panel-info">
			
			<div class="panel-wrapper collapse in" aria-expanded="true">
				<div class="panel-body">
					<div class="printableArea">
						<div align="center">
							<img src="<?php echo base_url();?>uploads/logo.png" width="60px" height="60px" class="img-circle"><br/>
							<span style="text-align:center; font-size:25px"><?php echo $system_name;?></span><br/>
							<span style="text-align:center; font-size:15px"><?php echo $system_address;?></span>
						</div>
						<br>
						<?php 
							$classes    =   $this->db->get('class')->result_array();
							foreach ($classes as $key => $class) {
								if(isset($class_id) && $class_id==$class['class_id']) $class_name = $class['name'];
							}
							$sections    =   $this->db->get('section')->result_array();
							foreach ($sections as $key => $section) {
								if(isset($section_id) && $section_id==$section['section_id']) $section_name = $section['name'];
							}
						?>
						<?php
							$full_date = "5"."-".$month."-".$year;
							$full_date = date_create($full_date);
						$full_date = date_format($full_date,"F, Y");?>
						<h4 style="color: #696969;">Class <?php echo $class_name; ?> : Section <?php echo $section_name; ?><br><?php echo $full_date; ?></h4>                     
						<table cellpadding="0" cellspacing="0" border="0" class="table">
							<thead>
								<tr>
									<td style="text-align: left;">Students<i class="fa fa-down-thin"></i>| Date:</td>
									<?php
										$days = date("t",mktime(0,0,0,$month,1,$year)); 
										for ($i=0; $i < $days; $i++) { 
										?>
										<td style="text-align: center;"><?php echo ($i+1);?></td>   
										<?php 
										}
									;?>
								</tr>
							</thead>
							<tbody>
								<?php 
									//STUDENTS ATTENDANCE
									$students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
									foreach($students as $key => $student)
									{
									?>
									<tr class="gradeA">
										<td align="left"><!--<img src="<?php //echo $this->crud_model->get_image_url('student', $student['student_id']);?>" class="img-circle" width="30px" height="30px">--><?php echo $student['name'];?></td>
										<?php 
											for ($i=1; $i <= $days; $i++) {
												$full_date = $year."-".$month."/".$i;
												$verify_data  =  array('student_id' => $student['student_id'], 'date' => $full_date);
												$attendance = $this->db->get_where('attendance' , $verify_data)->row();
												$status     = $attendance->status;
											?>
											<td style="text-align: center;">
												
												<?php if ($status == "1"):?>
												<h9 style="color:green">P</h9>
												<?php endif;?>
												
												<?php if ($status == "2"):?>
												<h9 style="color:red">A</h9>
												<?php endif;?>
												
												<?php if ($status == "3"):?>
												<h9 style="color:grey">L</h9>
												<?php endif;?>
												
												
												
											</td>    
											<?php 
											}
										;?>
									</tr>
									<?php
									}
								;?>
							</tbody>
						</table>
						<hr>
						<div align="center">
							<strong>KEYS: </strong>
							<?php echo get_phrase('Present');?>&nbsp;-&nbsp; P &nbsp;&nbsp;
							<?php echo get_phrase('Absent');?>&nbsp;-&nbsp;A&nbsp;&nbsp;
							
							<?php echo get_phrase('Late');?>&nbsp;-&nbsp; L&nbsp;&nbsp;
							
						</div>
					</div>
					
					<br>
					<button id ="print" class="btn btn-info btn-sm btn-rounded btn-block"><i class="fa fa-print"></i> Print</button>
					
				</div>
			</div>
		</div>
	</div>
</div>