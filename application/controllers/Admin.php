<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	
	
	class Admin extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			
			$this->load->database();
			$this->load->library('session');
			//$this->load->model('aaplication_model');
			
			
			/*cache control*/
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
			$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			
		}
		
		//default function, redirects to login page if no admin logged in yet
		public function index() {
			
			if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
			if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
			
		}
		//Admin dashboard code to redirect to admin page if successfull login
		function dashboard (){
			
			if($this->session->userdata('admin_login') != 1) redirect(base_url(),  'refresh');
			
			$page_data['page_name'] = 'dashboard';
			$page_data['page_title'] = get_phrase('Admin Dashboard');
			$this->load->view('backend/index', $page_data);
			
		}
		
		function manage_profile($param1 = '', $param2 = '', $param3 = ''){
			
			if($this->session->userdata('admin_login') != 1) redirect(base_url(),  'refresh');
			if ($param1 == 'update') {
				
				$data['name']   =   $this->input->post('name');
				$data['email']  =   $this->input->post('email');
				
				$this->db->where('admin_id', $this->session->userdata('admin_id'));
				$this->db->update('admin', $data);
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/'.$this->session->userdata('admin_id').'.jpg');
				$this->session->set_flashdata('flash_message', get_phrase('Info Updated'));
				redirect(base_url() . 'admin/manage_profile', 'refresh');
				
				
				
			}
			
			
			
			if ($param1 == 'change_password')
			{
				//$data['password']   =   $this->input->post('password');
				$data['new_password']  =   sha1($this->input->post('new_password'));
				$data['confirm_new_password']  =   sha1($this->input->post('confirm_new_password'));
				
				//$current_password = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('admin_id')))->row()->password;
				
				if ( $data['new_password'] == $data['confirm_new_password'])
				{
					
					$this->db->where('admin_id',$this->session->userdata('admin_id'));
					$this->db->update('admin', array('password' => $data['new_password']));
					$this->session->set_flashdata('flash_message', get_phrase('Password Changed'));
				}
				else {
					
					$this->session->set_flashdata('flash_message', get_phrase('Type the same password'));
					
				}
				
				redirect(base_url() . 'admin/manage_profile', 'refresh');
			}
			
			
			
			
			$page_data['page_name'] = 'manage_profile';
			$page_data['page_title'] = get_phrase('Manage Profile');
			$page_data['edit_profile'] = $this->db->get_where('admin',array('admin_id'=>$this->session->userdata('admin_id')))->result_array();
			$this->load->view('backend/index', $page_data);
			
			
			
		}
		
		
		function enquiry_category($param1 = '', $param2 ='', $param3 =''){
			
			if($param1 == 'insert'){
				
				//$page_data['category']  =   $this->input->post('category');
				//$page_data['purpose']   =   $this->input->post('purpose');
				//$page_data['whom']      =   $this->input->post('whom');
				//$this->db->insert('enquiry_category', $page_data);
				
				$this->crud_model->enquiry_category();
				
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/enquiry_category', 'refresh');
			}
			
			if($param1 == 'update'){
				
				//$page_data['category']  =   $this->input->post('category');
				//$page_data['purpose']   =   $this->input->post('purpose');
				//$page_data['whom']      =   $this->input->post('whom');
				//$this->db->where('enquiry_category_id', $param2);
				//$this->db->update('enquiry_category', $page_data);
				
				$this->crud_model->update_category($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/enquiry_category', 'refresh');
				
			}
			
			if($param1 == 'delete'){
				
				//$this->db->where('enquiry_category_id', $param2);
				//$this->db->delete('enquiry_category');
				
				$this->crud_model->delete_category($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/enquiry_category', 'refresh');
				
			}
			
			$page_data['page_name']     = 'enquiry_category';
			$page_data['page_title']    = get_phrase('Manage Category');
			$page_data['enquiry_category']  = $this->db->get('enquiry_category')->result_array();
			$this->load->view('backend/index', $page_data);
			
		}
		
		function list_enquiry ($param1 = '', $param2 ='', $param3 =''){
			
			
			if($param1 == 'delete'){
				
				$this->db->where('enquiry_id', $param2);
				$this->db->delete('enquiry');
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/list_enquiry', 'refresh');
				
			}
			
			$page_data['page_name']     = 'list_enquiry';
			$page_data['page_title']    = get_phrase('All Enquiries');
			$page_data['select_enquiry']  = $this->db->get('enquiry')->result_array();
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		
		function club ($param1 = '', $param2 ='', $param3 =''){
			
			if($param1 == 'insert'){
				
				$page_data['club_name']  =   $this->input->post('club_name');
				$page_data['description']   =   $this->input->post('description');
				$page_data['date']      =   $this->input->post('date');
				
				$this->db->insert('club', $page_data);
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/club', 'refresh');
			}
			
			if($param1 == 'update'){
				
				$page_data['club_name']  =   $this->input->post('club_name');
				$page_data['description']   =   $this->input->post('description');
				$page_data['date']      =   $this->input->post('date');
				
				$this->db->where('club_id', $param2);
				$this->db->update('club', $page_data);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/club', 'refresh');
			}
			
			
			if($param1 == 'delete'){
				
				$this->db->where('club_id', $param2);
				$this->db->delete('club');
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/club', 'refresh');
				
			}
			
			
			$page_data['page_name']     = 'club';
			$page_data['page_title']    = get_phrase('Manage Club');
			$page_data['select_club']  = $this->db->get('club')->result_array();
			$this->load->view('backend/index', $page_data);
			
		}
		
		function circular($param1 = '', $param2 = '', $param3 = ''){
			
			if ($param1 == 'insert'){
				
				$this->crud_model->insert_circular();
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
				redirect(base_url(). 'admin/circular', 'refresh');
			}
			
			
			if($param1 == 'update'){
				
				$this->crud_model->update_circular($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
				redirect(base_url(). 'admin/circular', 'refresh');
				
			}
			
			
			if($param1 == 'delete'){
				$this->crud_model->delete_circular($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
				redirect(base_url(). 'admin/circular', 'refresh');
				
				
			}
			
			
			$page_data['page_name']         = 'circular';
			$page_data['page_title']        = get_phrase('Manage Circular');
			$page_data['select_circular']   = $this->db->get('circular')->result_array();
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		function parent($param1 = '', $param2 = '', $param3 = ''){
			
			if ($param1 == 'insert'){
				
				$this->crud_model->insert_parent();
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
				redirect(base_url(). 'admin/parent', 'refresh');
			}
			
			
			if($param1 == 'update'){
				
				$this->crud_model->update_parent($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
				redirect(base_url(). 'admin/parent', 'refresh');
				
			}
			
			
			if($param1 == 'delete'){
				$this->crud_model->delete_parent($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
				redirect(base_url(). 'admin/parent', 'refresh');
				
				
			}
			
			
			$page_data['page_name']         = 'parent';
			$page_data['page_title']        = get_phrase('Manage Parent');
			$page_data['select_parent']   = $this->db->get('parent')->result_array();
			$this->load->view('backend/index', $page_data);
			
			
		}
		
		
		function accountant($param1 = '', $param2 = '', $param3 = ''){
			
			if ($param1 == 'insert'){
				
				$this->crud_model->insert_accountant();
				
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
				redirect(base_url(). 'admin/accountant', 'refresh');
			}
			
			
			if($param1 == 'update'){
				
				$this->crud_model->update_accountant($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
				redirect(base_url(). 'admin/accountant', 'refresh');
				
			}
			
			if($param1 == 'delete'){
				$this->crud_model->delete_accountant($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
				redirect(base_url(). 'admin/accountant', 'refresh');
				
			}
			
			$page_data['page_name']         = 'accountant';
			$page_data['page_title']        = get_phrase('Manage Accountant');
			$page_data['select_accountant']   = $this->db->get('accountant')->result_array();
			$this->load->view('backend/index', $page_data);
		}
		
		
		
		function teacher ($param1 = '', $param2 ='', $param3 =''){
			
			if($param1 == 'insert'){
				$this->teacher_model->insertTeacherFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/teacher', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->teacher_model->updateTeacherFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/teacher', 'refresh');
			}
			
			
			if($param1 == 'delete'){
				$this->teacher_model->deleteTeacherFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/teacher', 'refresh');
				
			}
			
			$page_data['page_name']     = 'teacher';
			$page_data['page_title']    = get_phrase('Manage Teacher');
			$page_data['select_teacher']  = $this->db->get('teacher')->result_array();
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		
		
		function vacancy ($param1 = '', $param2 ='', $param3 =''){
			
			if($param1 == 'insert'){
				$this->vacancy_model->insertVacancyFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/vacancy', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->vacancy_model->updateVacancyFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/vacancy', 'refresh');
			}
			
			
			if($param1 == 'delete'){
				$this->vacancy_model->deleteVacancyFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/vacancy', 'refresh');
				
			}
			
			$page_data['page_name']     = 'vacancy';
			$page_data['page_title']    = get_phrase('Manage Vacancy');
			$page_data['select_vacancy']  = $this->db->get('vacancy')->result_array();
			$this->load->view('backend/index', $page_data);
			
		}
		
		function application ($param1 = 'applied', $param2 ='', $param3 =''){
			
			if($param1 == 'insert'){
				$this->application_model->insertApplicantFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/application', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->application_model->updateApplicantFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/application', 'refresh');
			}
			
			
			if($param1 == 'delete'){
				$this->application_model->deleteApplicantFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/application', 'refresh');
				
			}
			
			if($param1 != 'applied' && $param1 != 'on_review' && $param1 != 'interviewed' && $param1 != 'offered' && $param1 != 'hired' && $param1 != 'declined')
			$param1 ='applied';
			
			
			
			$page_data['status']        = $param1;
			$page_data['page_name']     = 'application';
			$page_data['page_title']    = get_phrase('Job Applicant');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		/***********  The function manages Leave  ***********************/
		function leave ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'update'){
				$this->leave_model->updateLeaveFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/leave', 'refresh');
			}
			
			
			if($param1 == 'delete'){
				$this->leave_model->deleteLeaveFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/leave', 'refresh');
				
			}
			
			
			$page_data['page_name']     = 'leave';
			$page_data['page_title']    = get_phrase('Manage Leave');
			$this->load->view('backend/index', $page_data);
			
		}
		
		/***********  The function manages Awards  ***********************/
		function award ($param1 = null, $param2 = null, $param3 = null){
			
			
			if($param1 == 'create'){
				$this->award_model->createAwardFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/award', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->award_model->updateAwardFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/award', 'refresh');
			}
			
			
			if($param1 == 'delete'){
				$this->award_model->deleteAwardFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/award', 'refresh');
				
			}
			
			$page_data['page_name']     = 'award';
			$page_data['page_title']    = get_phrase('Manage Award');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		function payroll(){
			
			$page_data['page_name']     = 'payroll_add';
			$page_data['page_title']    = get_phrase('Create Payslip');
			$this->load->view('backend/index', $page_data);
			
		}
		
		function get_employees($department_id = null)
		{
			$employees = $this->db->get_where('teacher', array('department_id' => $department_id))->result_array();
			foreach($employees as $key => $employees)
            echo '<option value="' . $employees['teacher_id'] . '">' . $employees['name'] . '</option>';
		}
		
		function payroll_selector()
		{
			
			$employee_id    = $this->input->post('employee_id');
			$month          = $this->input->post('month');
			$year           = $this->input->post('year');
			
			redirect(base_url() . 'admin/payroll_view/' . $employee_id . '/' . $month . '/' . $year, 'refresh');
		}
		
		function payroll_view( $employee_id = null, $month = null, $year = null)
		{
			
			$page_data['employee_id']   = $employee_id;
			$page_data['month']         = $month;
			$page_data['year']          = $year;
			$page_data['page_name']     = 'payroll_add_view';
			$page_data['page_title']    = get_phrase('Create Payslip');
			$this->load->view('backend/index', $page_data);
		}
		
		
		function create_payroll(){
			
			$this->payroll_model->insertPayrollFunction();
			$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
			redirect(base_url(). 'admin/payroll_list/filter2/'. $this->input->post('month').'/'. $this->input->post('year'), 'refresh');
		}
		
		
		/***********  The function manages AwPayroll List  ***********************/
		function payroll_list ($param1 = null, $param2 = null, $param3 = null, $param4 = null){
			
			if($param1 == 'mark_paid'){
				
				$data['status'] =  1;
				$this->db->update('payroll', $data, array('payroll_id' => $param2));
				
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/payroll_list/filter2/'. $param3.'/'. $param4, 'refresh');
			}
			
			if($param1 == 'filter'){
				$page_data['month'] = $this->input->post('month');
				$page_data['year'] = $this->input->post('year');
			}
			else{
				$page_data['month'] = date('n');
				$page_data['year'] = date('Y');
			}
			
			if($param1 == 'filter2'){
				
				$page_data['month'] = $param2;
				$page_data['year'] = $param3;
			}
			
			
			$page_data['page_name']     = 'payroll_list';
			$page_data['page_title']    = get_phrase('List Payroll');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		/***********  The function manages Class Information  ***********************/
		function classes ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->class_model->createClassFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/classes', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->class_model->updateClassFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/classes', 'refresh');
			}
			
			
			if($param1 == 'delete'){
				$this->class_model->deleteClassFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/classes', 'refresh');
				
			}
			
			$page_data['page_name']     = 'class';
			$page_data['page_title']    = get_phrase('Manage Class');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		/***********  The function manages Section  ***********************/
		function section ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->section_model->createSectionFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/section', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->section_model->updateSectionFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/section', 'refresh');
			}
			
			if($param1 == 'delete'){
				$this->section_model->deleteSectionFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/section', 'refresh');
			}
			
			$page_data['page_name']     = 'section';
			$page_data['page_title']    = get_phrase('Manage Section');
			$this->load->view('backend/index', $page_data);
		}
		
        function sections ($class_id = null){
			
            if($class_id == '')
            $class_id = $this->db->get('class')->first_row()->class_id;
            
            $page_data['page_name']     = 'section';
            $page_data['class_id']      = $class_id;
            $page_data['page_title']    = get_phrase('Manage Section');
            $this->load->view('backend/index', $page_data);
			
		}
		
		
		
		/***********  The function manages school timetable  ***********************/
		function class_routine ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->class_routine_model->createTimetableFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/listStudentTimetable', 'refresh');
			}
			
			if($param1 == 'update'){
				
				$this->class_routine_model->updateTimetableFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/listStudentTimetable', 'refresh');
			}
			
			if($param1 == 'delete'){
				
				$this->db->where('class_routine_id', $param2);
				$this->db->delete('class_routine');
				//$this->class_routine_model->deleteTimetableFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/listStudentTimetable', 'refresh');
			}
		}
		
		function listStudentTimetable(){
			
			$page_data['page_name']     = 'listStudentTimetable';
			$page_data['page_title']    = get_phrase('School Timetable');
			$this->load->view('backend/index', $page_data);
		}
		
		function class_routine_view(){
			
			$page_data['page_name']     = 'class_routine_view';
			$page_data['page_title']    = get_phrase('School Timetable');
			$this->load->view('backend/index', $page_data);
		}
		
		/*function class_routine_add(){
			
			$page_data['page_name']     = 'class_routine_add';
			$page_data['page_title']    = get_phrase('School Timetable');
			$this->load->view('backend/index', $page_data);
			}
			
		*/
		
		function get_class_section_subject($class_id){
			$page_data['class_id']  =   $class_id;
			$this->load->view('backend/admin/class_routine_section_subject_selector', $page_data);
			
		}
		
		function studentTimetableLoad($class_id){
			
			$page_data['class_id']  =   $class_id;
			$this->load->view('backend/admin/studentTimetableLoad', $page_data);
			
		}
		
		function class_routine_print_view($class_id, $section_id){
			
			$page_data['class_id']      =   $class_id;
			$page_data['section_id']    =   $section_id;
			$this->load->view('backend/admin/class_routine_print_view', $page_data);
		}
		
		
		function section_subject_edit($class_id, $class_routine_id){
			
			$page_data['class_id']          =   $class_id;
			$page_data['class_routine_id']  =   $class_routine_id;
			$this->load->view('backend/admin/class_routine_section_subject_edit', $page_data);
			
		}
		
		
		/***********  The function manages academic syllabus ***********************/
		function academic_syllabus ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->academic_model->createAcademicSyllabus();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/academic_syllabus', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->academic_model->updateAcademicSyllabus($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/academic_syllabus', 'refresh');
			}
			
			
			if($param1 == 'delete'){
				$this->academic_model->deleteAcademicSyllabus($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/academic_syllabus', 'refresh');
				
			}
			
			$page_data['page_name']     = 'academic_syllabus';
			$page_data['page_title']    = get_phrase('Academic Syllabus');
			$this->load->view('backend/index', $page_data);
			
		}
		
		function get_class_subject($class_id){
			$subjects = $this->db->get_where('subject', array('class_id' => $class_id))->result_array();
			foreach($subjects as $key => $subject)
			{
				echo '<option value="'.$subject['subject_id'].'">'.$subject['name'].'</option>';
			}
		}
		
		
		function download_academic_syllabus($academic_syllabus_code){
			$file_name = $this->db->get_where('academic_syllabus', array('academic_syllabus_code' => $academic_syllabus_code))->row()->file_name;
			$this->load->helper('download');
			$data = file_get_contents('uploads/syllabus' . $file_name);
			$name = $file_name;
			//force_download($name, $data);
		}
		
		function get_academic_syllabus ($class_id = null){
			
			if($class_id == '')
			$class_id = $this->db->get('class')->first_row()->class_id;
			
			$page_data['page_name']     = 'academic_syllabus';
			$page_data['class_id']      = $class_id;
			$page_data['page_title']    = get_phrase('Academic Syllabus');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		
		/***********  The function below add, update and delete student from students' table ***********************/
		function new_student ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->student_model->createNewStudent();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/student_information', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->student_model->updateNewStudent($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/student_information', 'refresh');
			}
			
			if($param1 == 'delete'){
				$this->student_model->deleteNewStudent($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/student_information', 'refresh');
				
			}
			
			$page_data['page_name']     = 'new_student';
			$page_data['page_title']    = get_phrase('Manage Student');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		function student_information(){
			
			$page_data['page_name']     = 'student_information';
			$page_data['page_title']    = get_phrase('Student Information');
			$this->load->view('backend/index', $page_data);
		}
		
		
		/**************************  search student function with ajax starts here   ***********************************/
		function getStudentClasswise($class_id){
			
			$page_data['class_id'] = $class_id;
			$this->load->view('backend/admin/showStudentClasswise', $page_data);
		}
		/**************************  search student function with ajax ends here   ***********************************/
		
		
		function edit_student($student_id){
			
			$page_data['student_id']      = $student_id;
			$page_data['page_name']     = 'edit_student';
			$page_data['page_title']    = get_phrase('Edit Student');
			$this->load->view('backend/index', $page_data);
		}
		
		function get_class_section($class_id){
			$sections = $this->db->get_where('section', array('class_id' => $class_id))->result_array();
            foreach($sections as $key => $section)
            {
                echo '<option value="'.$section['section_id'].'">'.$section['name'].'</option>';
			}
		}
		
		
		function resetStudentPassword ($student_id) {
			
			
			$password['password']               =   sha1($this->input->post('new_password'));
			$confirm_password['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
			
			
			if ($password['password'] == $confirm_password['confirm_new_password']) {
				
				$this->db->where('student_id', $student_id);
				$this->db->update('student', $password);
				$this->session->set_flashdata('flash_message', get_phrase('Password Changed'));
			}
			
			else{
				$this->session->set_flashdata('error_message', get_phrase('Type the same password'));
			}
			
			redirect(base_url() . 'admin/student_information', 'refresh');
			
			
		}
		
		
		function manage_attendance($date = null, $month= null, $year = null, $class_id = null, $section_id = null ){
			$active_sms_gateway = $this->db->get_where('sms_settings', array('type' => 'active_sms_gateway'))->row()->info;
			
			if ($_POST) {
				
				// Loop all the students of $class_id
				$students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
				foreach ($students as $key => $student) {
					$attendance_status = $this->input->post('status_' . $student['student_id']);
					$full_date = $year . "-" . $month . "-" . $date;
					$this->db->where('student_id', $student['student_id']);
					$this->db->where('date', $full_date);
					
					$this->db->update('attendance', array('status' => $attendance_status));
					
					if ($attendance_status == 2) 
					{
						if ($active_sms_gateway != '' || $active_sms_gateway != 'disabled') {
							$student_name   = $this->db->get_where('student' , array('student_id' => $student['student_id']))->row()->name;
							$parent_id      = $this->db->get_where('student' , array('student_id' => $student['student_id']))->row()->parent_id;
							$message        = 'Your child' . ' ' . $student_name . 'is absent today.';
							if($parent_id != null && $parent_id != 0){
								$recieverPhoneNumber = $this->db->get_where('parent' , array('parent_id' => $parent_id))->row()->phone;
								if($recieverPhoneNumber != '' || $recieverPhoneNumber != null){
									$this->sms_model->send_sms($message,$recieverPhoneNumber);
								}
								else{
									$this->session->set_flashdata('error_message' , get_phrase('Parent Phone Not Found'));
								}
							}
							else{
								$this->session->set_flashdata('error_message' , get_phrase('SMS Gateway Not Found'));
							}
						}
					}
				}
				
				$this->session->set_flashdata('flash_message', get_phrase('Sms Sent Successfully'));
				redirect(base_url() . 'admin/manage_attendance/' . $date . '/' . $month . '/' . $year . '/' . $class_id . '/' . $section_id, 'refresh');
			}
			
			$page_data['date'] = $date;
			$page_data['month'] = $month;
			$page_data['year'] = $year;
			$page_data['class_id'] = $class_id;
			$page_data['section_id'] = $section_id;
			$page_data['page_name'] = 'manage_attendance';
			$page_data['page_title'] = get_phrase('Manage Attendance');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		
		
		function attendance_selector(){
			$date = $this->input->post('timestamp');
			$date = date_create($date);
			$date = date_format($date, "d/m/Y");
			redirect(base_url(). 'admin/manage_attendance/' .$date. '/' . $this->input->post('class_id'). '/' . $this->input->post('section_id'), 'refresh');
		}
		
		
		
		function attendance_report($class_id = NULL, $section_id = NULL, $month = NULL, $year = NULL) {
			
			$active_sms_gateway = $this->db->get_where('sms_settings', array('type' => 'active_sms_gateway'))->row()->info;
			
			
			if ($_POST) {
				redirect(base_url() . 'admin/attendance_report/' . $class_id . '/' . $section_id . '/' . $month . '/' . $year, 'refresh');
			}
			
			$classes = $this->db->get('class')->result_array();
			foreach ($classes as $key => $class) {
				if (isset($class_id) && $class_id == $class['class_id'])
                $class_name = $class['name'];
			}
			
			$sections = $this->db->get('section')->result_array();
            foreach ($sections as $key => $section) {
                if (isset($section_id) && $section_id == $section['section_id'])
				$section_name = $section['name'];
			}
			
			$page_data['month'] = $month;
			$page_data['year'] = $year;
			$page_data['class_id'] = $class_id;
			$page_data['section_id'] = $section_id;
			$page_data['page_name'] = 'attendance_report';
			$page_data['page_title'] = "Attendance Report:" . $class_name . " Section " . $section_name;
			$this->load->view('backend/index', $page_data);
		}
		
		
		
		/******************** Load attendance with ajax code starts from here **********************/
		function loadAttendanceReport($class_id, $section_id, $month, $year)
		{
			$page_data['class_id'] 		= $class_id;					// get all class_id
			$page_data['section_id'] 	= $section_id;					// get all section_id
			$page_data['month'] 		= $month;						// get all month
			$page_data['year'] 			= $year;						// get all class year
			
			$this->load->view('backend/admin/loadAttendanceReport' , $page_data);
		}
		/******************** Load attendance with ajax code ends from here **********************/
		
		
		/******************** print attendance report **********************/
		function printAttendanceReport($class_id=NULL, $section_id=NULL, $month=NULL, $year=NULL)
		{
			$page_data['class_id'] 		= $class_id;					// get all class_id
			$page_data['section_id'] 	= $section_id;					// get all section_id
			$page_data['month'] 		= $month;						// get all month
			$page_data['year'] 			= $year;						// get all class year
			
			$page_data['page_name'] = 'printAttendanceReport';
			$page_data['page_title'] = "Attendance Report";
			$this->load->view('backend/index', $page_data);
		}
		/******************** /Ends here **********************/
		
		
		/***********  The function below add, update and delete exam question table ***********************/
		function examQuestion ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->exam_question_model->createexamQuestion();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/examQuestion', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->exam_question_model->updateexamQuestion($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/examQuestion', 'refresh');
			}
			
			if($param1 == 'delete'){
				$this->exam_question_model->deleteexamQuestion($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/examQuestion', 'refresh');
			}
			
			$page_data['page_name']     = 'examQuestion';
			$page_data['page_title']    = get_phrase('Exam Question');
			$this->load->view('backend/index', $page_data);
		}
		/***********  The function below add, update and delete exam question table ends here ***********************/
		
		
		/***********  The function below add, update and delete examination table ***********************/
		function createExamination ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->exam_model->createExamination();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/createExamination', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->exam_model->updateExamination($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/createExamination', 'refresh');
			}
			
			if($param1 == 'delete'){
				$this->exam_model->deleteExamination($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/createExamination', 'refresh');
			}
			
			$page_data['page_name']     = 'createExamination';
			$page_data['page_title']    = get_phrase('Create Exam');
			$this->load->view('backend/index', $page_data);
		}
		/***********  The function below add, update and delete examination table ends here ***********************/
		
		/***********  The function below add, update and delete student payment table ***********************/
		function student_payment ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'single_invoice'){
				$this->student_payment_model->createStudentSinglePaymentFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/student_invoice', 'refresh');
			}
			
			if($param1 == 'mass_invoice'){
				$this->student_payment_model->createStudentMassPaymentFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/student_invoice', 'refresh');
			}
			
			if($param1 == 'update_invoice'){
				$this->student_payment_model->updateStudentPaymentFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/student_invoice', 'refresh');
			}
			
			if($param1 == 'take_payment'){
				$this->student_payment_model->takeNewPaymentFromStudent($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/student_invoice', 'refresh');
			}
			
			
			if($param1 == 'delete_invoice'){
				$this->student_payment_model->deleteStudentPaymentFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/student_invoice', 'refresh');
			}
			
			$page_data['page_name']     = 'student_payment';
			$page_data['page_title']    = get_phrase('Student Payment');
			$this->load->view('backend/index', $page_data);
		}   
		/***********  / Student payment ends here ***********************/
		
		function get_class_student($class_id){
			$students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
            foreach($students as $key => $student)
            {
                echo '<option value="'.$student['student_id'].'">'.$student['name'].'</option>';
			}
		}
		
		
		function get_class_mass_student($class_id){
			
			$students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
			foreach($students as $key => $student)
			{
				echo '<div class="">
				<label><input type="checkbox" class="check" name="student_id[]" value="' . $student['student_id'] . '">' . '&nbsp;'. $student['name'] .'</label></div>';
			}
			
			echo '<br><button type ="button" class="btn btn-success btn-sm btn-rounded" onClick="select()">'.get_phrase('Select All').'</button>';
			echo '<button type ="button" class="btn btn-primary btn-sm btn-rounded" onClick="unselect()">'.get_phrase('Unselect All').'</button>';
		}
		
		function student_invoice(){
			
			$page_data['page_name']     = 'student_invoice';
			$page_data['page_title']    = get_phrase('Manage Invoice');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		/***********  The function below manages school event ***********************/
		function noticeboard ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->event_model->createNoticeboardFunction();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/noticeboard', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->event_model->updateNoticeboardFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/noticeboard', 'refresh');
			}
			
			if($param1 == 'delete'){
				$this->event_model->deleteNoticeboardFunction($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/noticeboard', 'refresh');
			}
			
			$page_data['page_name']     = 'noticeboard';
			$page_data['page_title']    = get_phrase('Events');
			
			$this->load->view('backend/index', $page_data);
		}
		/***********  The function that manages school events ends here ***********************/
		
		/***********  The function below manages school language ***********************/
		function manage_language ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'edit_phrase'){
				$page_data['edit_profile']  =   $param2;
			}
			
			if($param1 == 'add_language'){
				$this->language_model->createNewLanguage();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/manage_language', 'refresh');
			}
			
			if($param1 == 'add_phrase'){
				$this->language_model->createNewLanguagePhrase();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/manage_language', 'refresh');
			}
			
			if($param1 == 'delete_language'){
				$this->language_model->deleteLanguage($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/manage_language', 'refresh');
			}
			
			$page_data['page_name']     = 'manage_language';
			$page_data['page_title']    = get_phrase('Manage Language');
			$this->load->view('backend/index', $page_data);
		}
		/***********  The function that manages school language ends here ***********************/
		
		function updatePhraseWithAjax(){
			
			$checker['phrase_id']   =   $this->input->post('phraseId');
			$updater[$this->input->post('currentEditingLanguage')]  =   $this->input->post('updatedValue');
			
			$this->db->where('phrase_id', $checker['phrase_id'] );
			$this->db->update('language', $updater);
			
			echo $checker['phrase_id']. ' '. $this->input->post('currentEditingLanguage'). ' '. $this->input->post('updatedValue');
			
		}
		
		
		/***********  The function below manages new admin ***********************/
		function newAdministrator ($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'create'){
				$this->admin_model->createNewAdministrator();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/newAdministrator', 'refresh');
			}
			
			if($param1 == 'update'){
				$this->admin_model->updateAdministrator($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/newAdministrator', 'refresh');
			}
			
			if($param1 == 'delete'){
				$this->admin_model->deleteAdministrator($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/newAdministrator', 'refresh');
			}
			
			$page_data['page_name']     = 'newAdministrator';
			$page_data['page_title']    = get_phrase('New Administrator');
			$this->load->view('backend/index', $page_data);
		}
		/***********  The function that manages administrator ends here ***********************/
		
		function updateAdminRole($param2){
			$this->admin_model->updateAllDetailsForAdminRole($param2);
			$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
			redirect(base_url(). 'admin/newAdministrator', 'refresh');
		}
		
		function set_language($lang){
			$this->session->set_userdata('language', $lang);
			redirect(base_url(). 'admin', 'refresh');
			recache();
		}
		
		
		function websiteSetting($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'save_generalSetting'){
				$this->crud_model->save_into_school_website_table_model();
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/websiteSetting', 'refresh');
			}
			
			if($param1 == 'save_banner'){
				$this->crud_model->save_banner_into_banner_table_model();
				$this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
				redirect(base_url(). 'admin/websiteSetting', 'refresh');
			}
			
			if($param1 == 'update_status'){
				$this->crud_model->update_testimony_status($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
				redirect(base_url(). 'admin/websiteSetting', 'refresh');
			}
			
			if($param1 == 'delete'){
				$this->crud_model->delete_testimony_status($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
				redirect(base_url(). 'admin/websiteSetting', 'refresh');
			}
			
			$page_data['page_name']     =   'websiteSetting';
			$page_data['page_title']    = get_phrase('Website Settings');
			$this->load->view('backend/index', $page_data);
			
		}
		
		
		function chatRoomMessage(){
			
			$page_data['user_id'] = $this->input->post('user_id');
			$page_data['message'] = $this->input->post('chatSend');
			$sql = "select * from general_message order by general_message_id desc limit 1";
			$return_query = $this->db->query($sql)->row()->general_message_id + 1;
			$page_data['general_message_id'] = $return_query;
			$this->db->insert('general_message', $page_data);
			echo json_encode($page_data);
		}
		
		
		
		function live_class($param1 = null, $param2 = null, $param3 = null){
			
			if($param1 == 'add'){
				
				$this->live_class_model->saveLiveClassToDatabase();
				$this->session->set_flashdata('flash_message', get_phrase('Zoom live class successfuly created'));
				redirect(base_url() . 'admin/live_class/', 'refresh');
				
			}
			
			if($param1 == 'edit'){
				
				$this->live_class_model->editLiveClassInformation($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Zoom live class successfuly edited'));
				redirect(base_url() . 'admin/live_class/', 'refresh');
			}
			
			if($param1 == 'delete'){
				
				$this->live_class_model->deleteLiveClassInformation($param2);
				$this->session->set_flashdata('flash_message', get_phrase('Zoom live class successfuly deleted'));
				redirect(base_url() . 'admin/live_class/', 'refresh');
			}
			
			$page_data['page_name'] = 'live_class';
			$page_data['page_title'] = get_phrase('live_class');
			$this->load->view('backend/index', $page_data);
		}
		
		
		function edit_live_class($param1 = null, $param2 = null, $param3 = null){
			
			$page_data['live_class_id'] = $param1;
			$page_data['page_name'] = 'edit_live_class';
			$page_data['page_title'] = get_phrase('edit_live_class');
			$this->load->view('backend/index', $page_data);
		}
		
		
		function host_live_class($param1 = null, $param2 = null, $param3 = null){
			
			$page_data['live_class_id'] = $param1;
			$this->load->view('backend/host/host_live_class', $page_data);
		}
        
		
		
		
	}
