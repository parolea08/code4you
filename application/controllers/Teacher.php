<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Teacher extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                                //Load Databse Class
                $this->load->library('session');					    //Load library for session
               // $this->load->model('vacancy_model');

    }

     /*teacher dashboard code to redirect to teacher page if successfull login** */
     function dashboard() {
        if ($this->session->userdata('teacher_login') != 1) redirect(base_url(), 'refresh');
       	$page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('Teacher Dashboard');
        $this->load->view('backend/index', $page_data);
    }
	/******************* / teacher dashboard code to redirect to teacher page if successfull login** */

    function manage_profile($param1 = null, $param2 = null, $param3 = null){
        if ($this->session->userdata('teacher_login') != 1) redirect(base_url(), 'refresh');
        if ($param1 == 'update') {
    
    
            $data['name']   =   $this->input->post('name');
            $data['email']  =   $this->input->post('email');
    
            $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
            $this->db->update('teacher', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $this->session->userdata('teacher_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('Info Updated'));
            redirect(base_url() . 'teacher/manage_profile', 'refresh');
           
        }
    
        if ($param1 == 'change_password') {
            $data['new_password']           =   sha1($this->input->post('new_password'));
            $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
    
            if ($data['new_password'] == $data['confirm_new_password']) {
               
               $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
               $this->db->update('teacher', array('password' => $data['new_password']));
               $this->session->set_flashdata('flash_message', get_phrase('Password Changed'));
            }
    
            else{
                $this->session->set_flashdata('error_message', get_phrase('Type the same password'));
            }
            redirect(base_url() . 'teacher/manage_profile', 'refresh');
        }
    
            $page_data['page_name']     = 'manage_profile';
            $page_data['page_title']    = get_phrase('Manage Profile');
            $page_data['edit_profile']  = $this->db->get_where('teacher', array('teacher_id' => $this->session->userdata('teacher_id')))->result_array();
            $this->load->view('backend/index', $page_data);
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
                                    $this->sms_model->send_sms($message, $recieverPhoneNumber);
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
        
                $this->session->set_flashdata('flash_message', get_phrase('Updated Successfully'));
                redirect(base_url() . 'teacher/manage_attendance/' . $date . '/' . $month . '/' . $year . '/' . $class_id . '/' . $section_id, 'refresh');
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
            redirect(base_url(). 'teacher/manage_attendance/' .$date. '/' . $this->input->post('class_id'). '/' . $this->input->post('section_id'), 'refresh');
        }
    
    
        function attendance_report($class_id = NULL, $section_id = NULL, $month = NULL, $year = NULL) {
            
            $active_sms_gateway = $this->db->get_where('sms_settings', array('type' => 'active_sms_gateway'))->row()->info;
            
            
            if ($_POST) {
            redirect(base_url() . 'teacher/attendance_report/' . $class_id . '/' . $section_id . '/' . $month . '/' . $year, 'refresh');
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
            $page_data['page_title'] = "Attendance Report:" . $class_name . " : Section " . $section_name;
            $this->load->view('backend/index', $page_data);
        }
    
    
        /******************** Load attendance with ajax code starts from here **********************/
        function loadAttendanceReport($class_id, $section_id, $month, $year)
        {
            $page_data['class_id'] 		= $class_id;					// get all class_id
            $page_data['section_id'] 	= $section_id;					// get all section_id
            $page_data['month'] 		= $month;						// get all month
            $page_data['year'] 			= $year;						// get all class year
            
            $this->load->view('backend/teacher/loadAttendanceReport' , $page_data);
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


   





}