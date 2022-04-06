<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
             <div class="panel-heading"> <i class="fa fa-envelope"></i>&nbsp;<?php echo get_phrase('Send Email Message');?></div>
                  <div class="panel-wrapper collapse in" aria-expanded="true">
                       <div class="panel-body table-responsive">	
							<div class="row panel-body">
								<div class="col-sm-9">


			<!----CREATION FORM STARTS---->
											<?php echo form_open(base_url() . 'emailmessage/sendEmailMessage/create' , 
											array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
										<div class="form-group">
											<label class="col-md-12" for="example-text"><?php echo get_phrase('Message Subject');?></label>
												<div class="col-sm-12">
												<input type=text class="form-control" name="email_subject"/ required>
											</div>
										</div>
										
									   <div class="form-group">
											<label class="col-md-12" for="example-text"><?php echo get_phrase('Content');?></label>
												<div class="col-sm-12">
												<textarea type=text name="message" id="word_count" class=" form-control" rows="11"  
												placeholder="<?php echo get_phrase('Content');?>" required></textarea>                    
												</div>
										</div>
								   			<?php echo get_phrase('Total words');?> : <span id="display_count">0</span> <?php echo get_phrase('words');?>.              
                				</div>                
	
			<!----CREATION FORM ENDS-->
		
	<div class="col-sm-3" style="background:#cccccc">	
					<div class="form-group">
						<label class="col-md-12" for="example-text"><?php echo get_phrase('Message To:');?></label>
                    		<div class="col-sm-12">
								<select class="form-control" id="showForm" onchange = "ShowHideDiv()">
									<option value="alluser"><?php echo get_phrase('All Users');?></option>
									<option value="student"><?php echo get_phrase('Student');?></option>
									<option value="admin"><?php echo get_phrase('Admin');?></option>
									<option value="parent"><?php echo get_phrase('Parent');?></option>
									<option value="teacher"><?php echo get_phrase('Teacher');?></option>
									
									
									
									<option value="accountant"><?php echo get_phrase('Accountant');?></option>
									
								</select>
							
                    		</div>
               		</div>
				
					<div class="form-group">
						<div class="col-sm-12">
										<div id="alluser" style="display: block">
										<p><input type="checkbox"  class="js-switch" id="notify" value="1"  name="student_email" data-color="#e625ea" />&nbsp;&nbsp;<?php echo get_phrase('Student');?></p>
										<p><input type="checkbox"  class="js-switch" id="notify" value="1"  name="admin_email" data-color="#e625ea" />&nbsp;&nbsp;<?php echo get_phrase('Admin');?></p>
										<p><input type="checkbox"  class="js-switch" id="notify" value="1"  name="teacher_email" data-color="#e625ea" />&nbsp;&nbsp;<?php echo get_phrase('Teacher');?></p>
										<p><input type="checkbox"  class="js-switch" id="notify" value="1"  name="parent_email" data-color="#e625ea" />&nbsp;&nbsp;<?php echo get_phrase('Parent');?></p>
										
										<p><input type="checkbox"  class="js-switch" id="notify" value="1"  name="accountant_email" data-color="#e625ea" />&nbsp;&nbsp;<?php echo get_phrase('Accountant');?></p>
										
						</div>
				 
					<div id="student" style="display: none">
								 <select name="student[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose User" style="border:1px dotted red">
										<optgroup label="<?php echo get_phrase('List Students');?>">
										<hr>
										<?php
										$student = $this->db->get('student')->result_array();
										foreach($student as $row):
									?>
									<option value="<?php echo $row['email'];?>"><?php echo $row['name'];?></option>
										<?php endforeach;?>
									</optgroup>
								  
								  </select>
					</div>
					
					<div id="admin" style="display: none">
						<select name="admin[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose User" style="border:1px dotted red">
						   <optgroup label="<?php echo get_phrase('List Admins');?>">
							<hr>
							<?php
							$admin = $this->db->get('admin')->result_array();
							foreach($admin as $row):
							?>
						<option value="<?php echo $row['email'];?>"><?php echo $row['name'];?></option>
						<?php endforeach;?>
						   
						  </optgroup>   
						 </select>
					</div>
					
				<div id="teacher" style="display: none">
						<select name="teacher[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose User" style="border:1px dotted red">
							 <optgroup label="<?php echo get_phrase('List Teachers');?>">
							<hr>
							<?php
							$teacher = $this->db->get('teacher')->result_array();
							foreach($teacher as $row):
						?>
						<option value="<?php echo $row['email'];?>"><?php echo $row['name'];?></option>
							<?php endforeach;?>
							 </optgroup>
						</select>
			</div>
			
			
			<div id="parent" style="display: none">
						<select name="parent[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose User" style="border:1px dotted red">
							 <optgroup label="<?php echo get_phrase('List Parents');?>">
							<hr>
							<?php
							$parent = $this->db->get('parent')->result_array();
							foreach($parent as $row):
						?>
						<option value="<?php echo $row['email'];?>"><?php echo $row['name'];?></option>
							<?php endforeach;?>
							 </optgroup>
						</select>
			</div>
			
			
				
				<div id="accountant" style="display: none">
				<select name="accountant[]" class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose User" style="border:1px dotted red">
												<optgroup label="<?php echo get_phrase('List Accountants');?>">
												<hr>
										<?php
										$student = $this->db->get('accountant')->result_array();
										foreach($student as $row):
									?>
									<option value="<?php echo $row['email'];?>"><?php echo $row['name'];?></option>
										<?php endforeach;?>
									   
									</optgroup>
											  
				</select>
				</div>
			

				</div>
			</div>
		</div>
	</div>
		<div class="form-group">
       <button type="submit" class="btn btn-block btn-info btn-rounded btn-sm" id="blockbtn5"> &nbsp;&nbsp;<?php echo get_phrase('Send Emails');?></button>
	   </div>  
		
	</form>  					
								
				</div>
			</div>
		</div>
	</div>
</div>
			
            <!----TABLE LISTING ENDS--->
            
<script type="text/javascript">
    function ShowHideDiv() {
        var showForm 	= document.getElementById("showForm");
        var alluser 	= document.getElementById("alluser");
		var student 	= document.getElementById("student");
        var admin 		= document.getElementById("admin");
        var admin 		= document.getElementById("admin");
        var teacher 	= document.getElementById("teacher");
		var parent 	= document.getElementById("parent");
       
		
        var accountant 	= document.getElementById("accountant");
        
        alluser.style.display 		= showForm.value == "alluser" ? "block" : "none";
		student.style.display 		= showForm.value == "student" ? "block" : "none";
        admin.style.display 		= showForm.value == "admin" ? "block" : "none";
        teacher.style.display 		= showForm.value == "teacher" ? "block" : "none";
		parent.style.display 		= showForm.value == "parent" ? "block" : "none";
       
		
        accountant.style.display 	= showForm.value == "accountant" ? "block" : "none";
       
    }
</script>
<script>
$(document).ready(function()
{
    var wordCounts = {};
    $("#word_count").keyup(function() {
        var matches = this.value.match(/\b/g);
        wordCounts[this.id] = matches ? matches.length / 2 : 0;
        var finalCount = 0;
        $.each(wordCounts, function(k, v) {
            finalCount += v;
        });
        $('#display_count').html(finalCount);
        am_cal(finalCount);
    }).keyup();
 }); 
 </script>
 
<!--<script>
 inputs = document.querySelectorAll('[type="text"]'),
    knapp = document.querySelector('#blockbtn5')
knapp.disabled = true

for (i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('input',() => {
    let values = []
    inputs.forEach(v => values.push(v.value))
    knapp.disabled = values.includes('')
  })
}
 </script>-->