<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	
	class Send_email_message_model extends CI_Model { 
		
		function __construct()
		{
			parent::__construct();
		}
		
		
		function sendMessageEmail(){
			
			$page_data['email_subject'] =   html_escape($this->input->post('email_subject'));
			$page_data['message']       =   html_escape($this->input->post('message'));
			
			
			
			// Declare varriables for sending email to single  user
			$studentsingle      =    html_escape($this->input->post('student'));
			$teachersingle      =    html_escape($this->input->post('teacher'));
			$adminsingle        =    html_escape($this->input->post('admin'));
			$parentsingle        =    html_escape($this->input->post('parent'));
			
			
			$accountantsingle   =    html_escape($this->input->post('accountant'));
			
			// ends here.....
			
			// Declare varriables for sending email to all  users
			$student_email      =    html_escape($this->input->post('student_email'));
			$teacher_email      =    html_escape($this->input->post('teacher_email'));
			$admin_email        =    html_escape($this->input->post('admin_email'));
			$parent_email        =    html_escape($this->input->post('parent_email'));
			
			
			$accountant_email   =    html_escape($this->input->post('accountant_email'));
			
			$send_date          =    date('Y-d-m');
			// ends here.....
			
			
			//******************** Sending email message to all users starts here  ***********/
			
			if($student_email == 1){
				// email sending configurations
				$sudents     =   $this->db->get('student')->result_array();
				$message    =   $page_data['email_subject'];
				$message    =   $page_data['message'] . ' ';
				$message    .=  get_phrase('on') . ' ' .$send_date;
				
				foreach ($students as $key => $student){
					$receiverEmail  =   $student['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			if($teacher_email == 1){
				// email sending configurations
				$teachers   =   $this->db->get('teacher')->result_array();
				$message    =   $page_data['email_subject'];
				$message    =   $page_data['message'] . ' ';
				$message    .=  get_phrase('on') . ' ' .$send_date;
				
				foreach ($teachers as $key => $teacher){
					$receiverEmail  =   $teacher['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			if ($admin_email == 1) {
				// email sending configurations
				$admins     = $this->db->get('admin')->result_array();
				$message    = $data['email_subject'] . ' ';
				$message    = $data['message'] . ' ';
				$message    .= get_phrase('on') . ' ' . $send_date;
				
				foreach ($admins as $key => $admin) {
					$receiverEmail = $admin['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			if ($parent_email == 1) {
				// email sending configurations
				$parents     = $this->db->get('parent')->result_array();
				$message    = $data['email_subject'] . ' ';
				$message    = $data['message'] . ' ';
				$message    .= get_phrase('on') . ' ' . $send_date;
				
				foreach ($parents as $key => $parent) {
					$receiverEmail = $parent['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			
			
			if ($accountant_email == 1) {
				// email sending configurations
				$accountants= $this->db->get('accountant')->result_array();
				$message    = $data['email_subject'] . ' ';
				$message    = $data['message'] . ' ';
				$message    .= get_phrase('on') . ' ' . $send_date;
				
				foreach ($accountants as $key => $accountant) {
					$receiverEmail = $accountant['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			
			
			//******************** / Sending email message to all users ends here  ***********/
			
			
			//******************** Sending email message to single user starts here  ***********/
			if($studentsingle != null || $studentsingle != ''){
				$message    = $data['email_subject'] . ' ';
				$message    = $data['message'] . ' ';
				$message    .= get_phrase('on') . ' ' . $send_date;
				
				foreach($studentsingle as $key => $student){
					$receiverEmail = $student['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			if($teachersingle != null || $teachersingle != ''){
				$message    = $data['email_subject'] . ' ';
				$message    = $data['message'] . ' ';
				$message    .= get_phrase('on') . ' ' . $send_date;
				
				foreach($teachersingle as $key => $teacher){
					$receiverEmail = $teacher['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			if($adminsingle != null || $adminsingle != ''){
				$message    = $data['email_subject'] . ' ';
				$message    = $data['message'] . ' ';
				$message    .= get_phrase('on') . ' ' . $send_date;
				
				foreach($adminsingle as $key => $admin){
					$receiverEmail = $admin['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			if($parentsingle != null || $parentsingle != ''){
				$message    = $data['email_subject'] . ' ';
				$message    = $data['message'] . ' ';
				$message    .= get_phrase('on') . ' ' . $send_date;
				
				foreach($parentsingle as $key => $parent){
					$receiverEmail = $parent['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			
			
			if($accountantsingle != null || $accountantsingle != ''){
				$message    = $data['email_subject'] . ' ';
				$message    = $data['message'] . ' ';
				$message    .= get_phrase('on') . ' ' . $send_date;
				
				foreach($accountantsingle as $key => $accountant){
					$receiverEmail = $accountant['email'];
					$this->email_model->send_email($message, $receiverEmail);
				}
			}
			
			
			
			
			
			//******************** Sending email message to single user ends here  ***********/
			
			
			
			
			
			
		}
		
		
		
	}	