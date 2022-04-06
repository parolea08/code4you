<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	
	
	class Login extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			
			if ( $this->load->database() === FALSE )
			{
				$this->load->databaserepl();}
			$this->load->library('session');
		}
		
		//***************** The function below redirects to logged in user area
		public function index() {
			
			if ($this->session->userdata('admin_login')== 1) redirect (base_url(). 'admin/dashboard'); 
			if ($this->session->userdata('teacher_login')== 1) redirect (base_url(). 'teacher/dashboard');
			if ($this->session->userdata('student_login')== 1) redirect (base_url(). 'student/dashboard'); 
			if ($this->session->userdata('parent_login')== 1) redirect (base_url(). 'parent/dashboard');
			$this->load->view('backend/login');
		}
		//***************** / The function below redirects to logged in user area
		
		//********************************** the function below validating user login request 
		function check_login() {
			
			$login_check_model = $this->login_model->loginFunctionForAllUsers();
			$login_user = $this->session->userdata('login_type');
			if(!$login_check_model){
				// Here, if the above conditions are not meant, the user will be redirected to login page again.
				$this->session->set_flashdata('error_message', get_phrase('Wrong email or password'));
				redirect(base_url() . 'login', 'refresh');
			}
			if($login_user == 'admin') {
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
				redirect(base_url() . 'admin/dashboard', 'refresh');
			}
			if($login_user == 'student') {
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
				redirect(base_url() . 'student/dashboard', 'refresh');
			}
			
			if($login_user == 'teacher') {
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
				redirect(base_url() . 'teacher/dashboard', 'refresh');
			}
			
			
			if($login_user == 'parent') {
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
				redirect(base_url() . 'parents/dashboard', 'refresh');
			}
			
			
		}
		
		
		
		function logout(){
			$login_user = $this->session->userdata('login_type');
			if($login_user == 'admin'){
				$this->login_model->logout_model_for_admin();
			}
			if($login_user == 'student'){
				$this->login_model->logout_model_for_student();
			}
			if($login_user == 'parent'){
				$this->login_model->logout_model_for_parent();
			}
			if($login_user == 'teacher'){
				$this->login_model->logout_model_for_teacher();
			}
			$this->session->sess_destroy();
			redirect('website', 'refresh');
			
			
		}
		
		
		
	}
