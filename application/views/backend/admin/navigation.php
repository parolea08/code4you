<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse slimscrollsidebar">
		<ul class="nav" id="side-menu">
			<li class="sidebar-search hidden-sm hidden-md hidden-lg">
				<!-- input-group -->
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
						<button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
					</span> </div>
					<!-- /input-group -->
			</li>
			<li class="user-pro">
				
				<?php
					$key = $this->session->userdata('login_type') . '_id';
					$face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
					if (!file_exists($face_file)) {
						$face_file = 'uploads/default.jpg';                                 
					}
				?>
				
				<a href="#" class="waves-effect"><img src="<?php echo base_url() . $face_file;?>" alt="user-img" class="img-circle"> <span class="hide-menu">
					
					<?php 
						$account_type   =   $this->session->userdata('login_type');
						$account_id     =   $account_type.'_id';
						$name           =   $this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id), 'name');
						echo $name;
					?>
					
					
				<span class="fa arrow"></span></span>
				
				</a>
				<ul class="nav nav-second-level">
					<li>
						<?php if($account_type == 'parent'):?>	
					<a href="<?php echo base_url();?>parents/manage_profile"><i class="ti-user"></i> Edit Profile</a></li>
					<?php endif; ?>
					
					<?php if($account_type != 'parent'):?>	
				<a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/manage_profile"><i class="ti-user"></i> Edit Profile</a></li>
				<?php endif; ?>
				
				

					<li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
				</ul>
			</li>
			<!-- <li class="nav-small-cap m-t-10">--- Main Menu</li> -->
			<li> <a href="<?php echo base_url();?>admin/dashboard" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Dashboard');?></span></a> </li>
			
			
			<li class="<?php if ($page_name == 'live_class') echo 'active';?>"> 
						
						<a href="<?php echo base_url();?>admin/live_class">
							<i class="fa fa-camera p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('Online_Classes');?></span>
						</a>
						
					</li>
			
			
			
			
			<li class="staff"> <a href="javascript:void(0);" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-angle-double-right p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('Manage_Employees');?><span class="fa arrow"></span></span></a>
				
				<ul class=" nav nav-second-level<?php
					if ($page_name == 'teacher' ||
                    //$page_name == 'librarian'|| 
					//$page_name == 'hrm'||
                    $page_name == 'accountant'
                    //$page_name == 'hostel'
					)
					echo 'opened active';
					?> ">
					
					
					
					
					<li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
						<a href="<?php echo base_url(); ?>admin/teacher">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('teachers'); ?></span>
						</a>
					</li>
					
                    
					
					<li class="<?php if ($page_name == 'accountant') echo 'active'; ?> ">
						<a href="<?php echo base_url(); ?>admin/accountant">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('accountants'); ?></span>
						</a>
					</li>
					
					
					
				</ul>
			</li>
			
			
			<li class="student"> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-users p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_students');?><span class="fa arrow"></span></span></a>
				
				<ul class=" nav nav-second-level<?php
					if ($page_name == 'new_student' ||
                    $page_name == 'student_information' ||
					$page_name == 'clubActivity' ||
                    $page_name == 'view_student'  )
					echo 'opened active has-sub';
					?> ">
					
					
					
                    <li class="<?php if ($page_name == 'new_student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/new_student">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('admission_form'); ?></span>
						</a>
					</li>
					
					
                    
					<li class="<?php if ($page_name == 'student_information' ||  $page_name == 'view_student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_information">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('list_students'); ?></span>
						</a>
					</li>
					
					
					
					<li class="<?php if ($page_name == 'clubActivity') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>activity/clubActivity">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('Student_Activity'); ?></span>
						</a>
					</li>
								
					
					
				</ul>
			</li>
			
			
			
			<li class="attendance"> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-hospital-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_attendance');?><span class="fa arrow"></span></span></a>
				
				<ul class=" nav nav-second-level<?php
					if ($page_name == 'manage_attendance' || 
                    $page_name == 'attendance_report')
					echo 'opened active';
					?>">
					
					
                    <li class="<?php if ($page_name == 'manage_attendance') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/manage_attendance/<?php echo date("d/m/Y"); ?>">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('mark_attendance'); ?></span>
						</a>
					</li>
					
					
                    <li class="<?php if ($page_name == 'attendance_report') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/attendance_report">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('view_attendance'); ?></span>
						</a>
					</li>
					
					
					
				</ul>
			</li>
			
			
			
			
			<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-download p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('download_page');?><span class="fa arrow"></span></span></a>
				
				<ul class=" nav nav-second-level<?php
					if ($page_name == 'assignment' ||
                    $page_name == 'study_material')
					echo 'opened active';
					?> ">
					
					
					<li class="<?php if ($page_name == 'assignment') echo 'active'; ?>">
						<a href="<?php echo base_url(); ?>assignment/assignment">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('assignments'); ?></span>
						</a>
					</li>
					
					
					
					<li class="<?php if ($page_name == 'study_material') echo 'active'; ?> ">
						<a href="<?php echo base_url(); ?>studymaterial/study_material">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('study_materials'); ?></span>
						</a>
					</li>
					
					
				</ul>
			</li>
			
			
			<li class=" <?php if($page_name == 'parent')echo 'active';?>">
				<a href="<?php echo base_url();?>admin/parent" >
                    <i class="fa fa-users p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('manage_parents');?></span>
				</a>    
			</li>
			
			
			
			<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-university p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('class_information');?><span class="fa arrow"></span></span></a>
				
				<ul class=" nav nav-second-level<?php
					if ($page_name == 'class' ||
                    $page_name == 'section' ||
                    $page_name == 'class_routine')
					echo 'opened active';
					?>">
					
					
					
					<li class="<?php if ($page_name == 'class') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/classes">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('manage_classes'); ?></span>
						</a>
					</li>
					
					
                    <li class="<?php if ($page_name == 'section') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/section">
							<i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('manage_sections'); ?></span>
						</a>
					</li>   
                    
                    
                    <li class="<?php if ($page_name == 'class_routine_view' ) echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/class_routine_view/">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('Add_Timetable'); ?> </span>
						</a>
					</li>
                    
					<li class="<?php if ($page_name == 'class_routine_view' ) echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/listStudentTimetable/">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('List_Timetable'); ?> </span>
						</a>
					</li>
					
					<li class="<?php if ($page_name == 'club') echo 'active';?>"> 
						
						<a href="<?php echo base_url();?>admin/club">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('Club');?></span>
						</a>
						
					</li>
					
					
					
					<li class="<?php if ($page_name == 'academic_syllabus') echo 'active';?>"> 
						
						<a href="<?php echo base_url();?>admin/academic_syllabus">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('Academic_Syllabus');?></span>
						</a>
						
					</li>
					
					<li class="<?php if ($page_name == 'subject') echo 'active'; ?>">
				<a href="<?php echo base_url(); ?>subject/subject/">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_subjects'); ?></span>
				</a>
			</li>

					
					
				</ul>
			</li>
			
			
			
			
			
			
			
			
			
			<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-book p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_exams');?><span class="fa arrow"></span></span></a>
				
				<ul class=" nav nav-second-level<?php
					if ($page_name == 'createExamination' ||
                    $page_name == 'examquestion')
					echo 'opened active';
					?>">
                    
					
                    <li class="<?php if ($page_name == 'examquestion') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/examquestion">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('question_paper'); ?></span>
						</a>
					</li>
					
                    <li class="<?php if ($page_name == 'createExamination') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/createExamination">
							<i class="fa fa-angle-double-right p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('Add_Exam'); ?></span>
						</a>
					</li>

				</ul>
			</li>
			
			
			
			
			
			<li class="collect_fee"> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-paypal p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('fee_collection');?><span class="fa arrow"></span></span></a>
				
				<ul class=" nav nav-second-level<?php
					if ($page_name == 'income' ||
					$page_name == 'student_payment'||
					$page_name == 'student_invoice')
					echo 'opened active';
					?>">
					
					<li class="<?php if ($page_name == 'student_payment') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_payment">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('collect_fees'); ?></span>
						</a>
					</li>
					
					
                    
					
                    
					<li class="<?php if ($page_name == 'student_invoice') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_invoice">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('manage_invoice'); ?></span>
						</a>
					</li>
					
                    
					
				</ul>
			</li>
			
			
			
			<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-credit-card p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('human_resources');?><span class="fa arrow"></span></span></a>
				
				<ul class=" nav nav-second-level<?php
					if ($page_name == 'vacancy'|| 
					$page_name == 'award'||
					$page_name == 'application'||
					$page_name == 'leave'||
					$page_name == 'create_payslip'||
                    $page_name == 'payroll_list')
					echo 'opened active';
					?>">
					

                    
					<li> <a href="#" class="waves-effect"<i data-icon="&#xe006;"></i> <span class="hide-menu"><i class="fa fa-university p-r-10"></i><?php echo get_phrase('recruitment');?><span class="fa arrow"></span></span></a>
					<ul class=" nav nav-second-level">
						
						<li class="<?php if ($page_name == 'vacancy') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>admin/vacancy">
								<i class="fa fa-angle-double-right p-r-10"></i>
								<span class="hide-menu"><?php echo get_phrase('vacancies'); ?></span>
							</a>
						</li>
						
						<li class="<?php if ($page_name == 'application') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>admin/application">
								<i class="fa fa-angle-double-right p-r-10"></i>
								<span class="hide-menu"><?php echo get_phrase('applications'); ?></span>
							</a>
						</li>
						
					</ul>
				</li>
				
				
				<li class="<?php if ($page_name == 'leave') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/leave">
                        <i class="fa fa-angle-double-right p-r-10"></i>
						<span class="hide-menu"><?php echo get_phrase('leave'); ?></span>
					</a>
				</li>
				
				
				<li> <a href="#" class="waves-effect"<i data-icon="&#xe006;"></i> <span class="hide-menu"><i class="fa fa-university p-r-10"></i><?php echo get_phrase('payroll');?><span class="fa arrow"></span></span></a>
				<ul class=" nav nav-second-level">
					
                    <li class="<?php if ($page_name == 'create_payslip') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/payroll">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('add_payslip'); ?></span>
						</a>
					</li>
                    
					<li class="<?php if ($page_name == 'payroll_list') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/payroll_list">
							<i class="fa fa-angle-double-right p-r-10"></i>
							<span class="hide-menu"><?php echo get_phrase('list_payroll'); ?></span>
						</a>
					</li>
					
				</ul>
			</li>
			
			
			
			<li class="<?php if ($page_name == 'award') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>admin/award">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_award'); ?></span>
				</a>
			</li>
			
		</ul>
	</li>
	
	
	<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-fax p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('expenses');?><span class="fa arrow"></span></span></a>
        
		<ul class=" nav nav-second-level<?php
            if ($page_name == 'expense' ||
			$page_name == 'expense_category' )
			echo 'opened active';
            ?> ">
			
			<li class="<?php if ($page_name == 'expense') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>expense/expense">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('expense'); ?></span>
				</a>
			</li>
			
			
			
			<li class="<?php if ($page_name == 'expense_category') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>expense/expense_category">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('expense_category'); ?></span>
				</a>
			</li>
			
		</ul>
	</li>
	
	
	
	
	
	<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-envelope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('communications');?><span class="fa arrow"></span></span></a>
        
		<ul class=" nav nav-second-level<?php
            if ($page_name == 'noticeboard' ||
			$page_name == 'sendEmailMessage')
			echo 'opened active';
            ?>">
			
			<li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/noticeboard">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_events'); ?></span>
				</a>
			</li>
			
			
			
			
			<li class="<?php if ($page_name == 'sendEmailMessage') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>emailmessage/sendEmailMessage">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('Send Email Message'); ?></span>
				</a>
			</li>
            
			
			
		</ul>
	</li>
	
	
	
	
	
	<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-gears p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('system_settings');?><span class="fa arrow"></span></span></a>
        
		<ul class=" nav nav-second-level<?php
            if ($page_name == 'system_settings' ||
			$page_name == 'manage_language' ||
			$page_name == 'sms_settings')
			echo 'opened active';
            ?>">  
			
			
			<li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>system_setting/system_settings">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('general_settings'); ?></span>
				</a>
			</li>
			
			
			
			<li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>smssetting/sms_settings">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_sms_api'); ?></span>
				</a>
			</li>
			

			
			
			<li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>admin/manage_language">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_language'); ?></span>
				</a>
			</li>
			

			
			<li class="<?php if ($page_name == 'paymentSetting') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>payment/paymentSetting">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('Payment_Settings'); ?></span>
				</a>
			</li>
			
			
			<li class="<?php if ($page_name == 'websiteSetting') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>admin/websiteSetting">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('Website_Settings'); ?></span>
				</a>
			</li>
			
		</ul>
	</li>
	
	
	<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('generate_reports');?><span class="fa arrow"></span></span></a>
        
		<ul class=" nav nav-second-level">  
			
			<li class="<?php if ($page_name == 'studentPaymentReport') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>report/studentPaymentReport">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('student_payments'); ?></span>
				</a>
			</li>
			

			<li class="<?php if ($page_name == 'classAttendanceReport') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>report/classAttendanceReport">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('Attendance_Report'); ?></span>
				</a>
			</li>
			
			<li class="<?php if ($page_name == 'examMarkReport') echo 'active'; ?> ">
				<a href="<?php echo base_url(); ?>report/examMarkReport">
					<i class="fa fa-angle-double-right p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('Exam_Mark_Report'); ?></span>
				</a>
			</li>


			
			
		</ul>
	</li>
	


		
		
		<li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
		<a href="<?php echo base_url(); ?>admin/manage_profile">
		<i class="fa fa-gears p-r-10"></i>
		<span class="hide-menu"><?php echo get_phrase('manage_profile'); ?></span>
		</a>
		</li>
		
		
		
		<li class="">
		<a href="<?php echo base_url(); ?>login/logout">
		<i class="fa fa-sign-out p-r-10"></i>
		<span class="hide-menu"><?php echo get_phrase('Logout'); ?></span>
		</a>
		</li>
		
		
		
		
		</ul>
		</div>
		</div>
		<!-- Left navbar-header end -->						