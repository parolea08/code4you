<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	
	
	class System_setting extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			
			$this->load->database();
			$this->load->library('session');
			
		}
		
		
		public function index() {
			
			if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
			if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
			
		}
		
		function system_settings($param1 = '', $param2 = '', $param3 = ''){
			
			if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');	
			//we recieve do_update from system_settings (backend,admin)
			if ($param1 == 'do_update'){
				
				
				$this->crud_model->update_settings();
				
				$this->session->set_flashdata('flash_message', get_phrase('Data Updated'));
				redirect(base_url(). 'system_setting/system_settings', 'refresh');
				
			}
			//upload logo
			
			if ($param1 == 'upload_logo') {
				$this->crud_model->system_logo();
				$this->session->set_flashdata('flash_message', get_phrase('Logo Uploaded'));
				redirect(base_url() . 'system_setting/system_settings', 'refresh');
				//move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
				//$this->session->set_flashdata('flash_message', get_phrase('Logo Uploaded'));
				//redirect(base_url() . 'system_setting/system_settings', 'refresh');
				
			}
			
			
			
			if ($param1 == 'themeSettings') {
				$this->crud_model->update_theme();
				$this->session->set_flashdata('flash_message', get_phrase('Theme Selected'));
				redirect(base_url() . 'system_setting/system_settings', 'refresh');
				
			}
			
			$page_data['page_name'] = 'system_settings';
			$page_data['page_title'] = get_phrase('System Settings');
			$this->load->view('backend/index', $page_data);
			
			
		}
		
	}		