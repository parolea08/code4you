<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	
	class Login_model extends CI_Model { 
		
		function __construct()
		{
			parent::__construct();
		}
		
		function loginFunctionForAllUsers (){
			
			
			$email = $this->input->post('email');			
			$password = $this->input->post('password');	
			$credential = array('email' => $email, 'password' => sha1($password));	
			
			$query = $this->db->get_where('admin', $credential);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				
				$this->session->set_userdata('login_type', 'admin');
				$this->session->set_userdata('admin_login', '1');
				$this->session->set_userdata('admin_id', $row->admin_id);
				$this->session->set_userdata('login_user_id', $row->admin_id);
				$this->session->set_userdata('name', $row->name);
				
				return  $this->db->set('login_status', ('1'))
				->where('admin_id', $this->session->userdata('admin_id'))
				->update('admin');
				
			}
			
			$query = $this->db->get_where('teacher', $credential);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				
				$this->session->set_userdata('login_type', 'teacher');
				$this->session->set_userdata('teacher_login', '1');
				$this->session->set_userdata('teacher_id', $row->teacher_id);
				$this->session->set_userdata('login_user_id', $row->teacher_id);
				$this->session->set_userdata('name', $row->name);
				
				return  $this->db->set('login_status', ('1'))
				->where('teacher_id', $this->session->userdata('teacher_id'))
				->update('teacher');
			}
			
			
			
			$query = $this->db->get_where('student', $credential);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				
				$this->session->set_userdata('login_type', 'student');
				$this->session->set_userdata('student_login', '1');
				$this->session->set_userdata('student_id', $row->student_id);
				$this->session->set_userdata('login_user_id', $row->student_id);
				$this->session->set_userdata('name', $row->name);
				
				return  $this->db->set('login_status', ('1'))
				->where('student_id', $this->session->userdata('student_id'))
				->update('student');
			}
			
			
			$query = $this->db->get_where('parent', $credential);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				
				$this->session->set_userdata('login_type', 'parent');
				$this->session->set_userdata('parent_login', '1');
				$this->session->set_userdata('parent_id', $row->parent_id);
				$this->session->set_userdata('login_user_id', $row->parent_id);
				$this->session->set_userdata('name', $row->name);
				
				return  $this->db->set('login_status', ('1'))
				->where('parent_id', $this->session->userdata('parent_id'))
				->update('parent');
			}
			
		}
		
		
		
		function logout_model_for_admin(){
			return  $this->db->set('login_status', ('0'))
			->where('admin_id', $this->session->userdata('admin_id'))
			->update('admin');
		}
		
		
		
		function logout_model_for_teacher(){
			return  $this->db->set('login_status', ('0'))
			->where('teacher_id', $this->session->userdata('teacher_id'))
			->update('teacher');
		}
		
		
		function logout_model_for_student(){
			return  $this->db->set('login_status', ('0'))
			->where('student_id', $this->session->userdata('student_id'))
			->update('student');
		}
		
		function logout_model_for_parent(){
			return  $this->db->set('login_status', ('0'))
			->where('parent_id', $this->session->userdata('parent_id'))
			->update('parent');
		}
		
		
		
		
	}
