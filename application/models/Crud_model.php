<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	
	
	class Crud_model extends CI_Model {
		
		function __construct() {
			parent::__construct();
			
			
			
		}
		
		//type (teacher, student etc)
		function get_type_name_by_id($type, $type_id = '', $field = 'name') 
		{
			$this->db->where($type . '_id', $type_id);
			$query = $this->db->get($type);
			$result = $query->result_array();
			foreach ($result as $row)
			return $row[$field];
		}
		
		function get_general_messages(){
			$query = $this->db->query("SELECT * FROM general_message ORDER BY general_message_id asc");
			return $query->result_array();
		}
		
		function get_image_url($type = '', $id = '') {
			if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
			else
            $image_url = base_url() . 'uploads/user.jpg';
			
			return $image_url;
			
		}
		
		function get_subject_name_by_id ($subject_id){
			$query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
            return $query->name;
		}
		
		
		function enquiry_category()
	{
	
	$page_data['category']  =   $this->input->post('category');
	$page_data['purpose']   =   $this->input->post('purpose');
	$page_data['whom']      =   $this->input->post('whom');
	$this->db->insert('enquiry_category', $page_data);
	
	
	}
	
	
	function update_category($param2)
	{
	
	$page_data['category']  =   $this->input->post('category');
	$page_data['purpose']   =   $this->input->post('purpose');
	$page_data['whom']      =   $this->input->post('whom');
	$this->db->where('enquiry_category_id', $param2);
	$this->db->update('enquiry_category', $page_data);
	
	
	}
	
	
	function delete_category($param2)
	{
	
	$this->db->where('enquiry_category_id', $param2);
	$this->db->delete('enquiry_category');
	
	
	}
	
	
	
	function insert_circular(){
	
	$page_data['title']         =   $this->input->post('title');
	$page_data['reference']     =   $this->input->post('reference');
	$page_data['content']       =   $this->input->post('content');
	$page_data['date']          =   $this->input->post('date');
	
	$this->db->insert('circular', $page_data);
	
	}
	
	
	function update_circular($param2){
	$page_data['title']         =   $this->input->post('title');
	$page_data['reference']     =   $this->input->post('reference');
	$page_data['content']       =   $this->input->post('content');
	$page_data['date']          =   $this->input->post('date');
	
	$this->db->where('circular_id', $param2);
	$this->db->update('circular', $page_data);
	}
	
	
	function delete_circular($param2){
	$this->db->where('circular_id', $param2);
	$this->db->delete('circular');
	}
	
	
	
	
	function insert_parent(){
	
	$page_data = array(
	'name' => $this->input->post('name'),
	'email' => $this->input->post('email'),
	'password' => sha1($this->input->post('password')),
	'phone' => $this->input->post('phone'),
	'address' => $this->input->post('address'),
	'profession' => $this->input->post('profession'),
	);
	
	$this->db->insert('parent', $page_data);
	}
	
	
	function update_parent($param2){
	$page_data = array(
	'name' => $this->input->post('name'),
	'email' => $this->input->post('email'),
	'phone' => $this->input->post('phone'),
	'address' => $this->input->post('address'),
	'profession' => $this->input->post('profession'),
	);
	
	$this->db->where('parent_id', $param2);
	$this->db->update('parent', $page_data);
	}
	
	function delete_parent($param2){
	$this->db->where('parent_id', $param2);
	$this->db->delete('parent');
	}
	
	
	
	function insert_accountant(){
	$page_data = array(		// array data that postulate the input fileds
	'name' 				=> $this->input->post('name'),
	'accountant_number' 	=> $this->input->post('accountant_number'),
	'birthday' 			=> $this->input->post('birthday'),
	'sex' 				=> $this->input->post('sex'),
	'address' 			=> $this->input->post('address'),
	'phone' 			=> $this->input->post('phone'),
	
	'facebook' 			=> $this->input->post('facebook'),
	'twitter' 			=> $this->input->post('twitter'),
	'googleplus' 		=> $this->input->post('googleplus'),
	'linkedin' 			=> $this->input->post('linkedin'),
	'qualification' 	=> $this->input->post('qualification'),
	'marital_status'	=> $this->input->post('marital_status'),
	'password' 			=> sha1($this->input->post('password'))
	);
	
	$page_data['file_name'] = $_FILES["file_name"]["name"];
	$page_data['email'] = $this->input->post('email');
	$check_email = $this->db->get_where('accountant', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
	if($check_email != null) 
	{
	$this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
	redirect(base_url() . 'admin/accountant/', 'refresh');
	}
	else
	{
	$this->db->insert('accountant', $page_data);
	$accountant_id = $this->db->insert_id();
	
	move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/accountant_image/" . $_FILES["file_name"]["name"]);	// upload files, which we can downoload
	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $accountant_id.'.jpg');			// image with user ID, image of user
	//$this->email_model->account_opening_email('accountant', $data['email']); //Send email to receipient email adddrress upon account opening
	}
	}
	
	
	
	
	function update_accountant($param2){
	$page_data = array(			// array starts from here
	'name'				=> $this->input->post('name'),
	'birthday'			=> $this->input->post('birthday'),
	'sex' 				=> $this->input->post('sex'),
	'address' 			=> $this->input->post('address'),
	'phone' 			=> $this->input->post('phone'),
	
	'email' 			=> $this->input->post('email'),
	'facebook' 			=> $this->input->post('facebook'),
	'twitter' 			=> $this->input->post('twitter'),
	'googleplus' 		=> $this->input->post('googleplus'),
	'linkedin' 			=> $this->input->post('linkedin'),
	'qualification' 	=> $this->input->post('qualification'),
	'marital_status' 	=> $this->input->post('marital_status')
	);
	
	$this->db->where('accountant_id', $param2);
	$this->db->update('accountant', $page_data);
	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $param2.'.jpg');       
	redirect(base_url() . 'admin/accountant/', 'refresh');
	}
	
	function delete_accountant($param2){
	$this->db->where('accountant_id', $param2);
	$this->db->delete('accountant');
	}
	
	function update_settings(){
	//we update description from database
	$data['description'] = $this->input->post('system_name');
	$this->db->where('type', 'system_name');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('system_title');
	$this->db->where('type', 'system_title');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('address');
	$this->db->where('type', 'address');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('phone');
	$this->db->where('type', 'phone');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('paypal_email');
	$this->db->where('type', 'paypal_email');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('currency');
	$this->db->where('type', 'currency');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('system_email');
	$this->db->where('type', 'system_email');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('language');
	$this->db->where('type', 'language');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('text_align');
	$this->db->where('type', 'text_align');
	$this->db->update('settings', $data);
	
	//dominant colour
	//$data['description'] = $this->input->post('skin_colour');
	//$this->db->where('type', 'skin_colour');
	//$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('footer');
	$this->db->where('type', 'footer');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('running_session'); //running_session from form
	$this->db->where('type', 'session'); //session to database
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('zoom_api_key');
	$this->db->where('type', 'zoom_api_key');
	$this->db->update('settings', $data);
	
	$data['description'] = $this->input->post('zoom_api_secret_key');
	$this->db->where('type', 'zoom_api_secret_key');
	$this->db->update('settings', $data);
	
	}
	
	
	
	function system_logo(){
	
	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
	}
	
	function update_theme(){
	
	$data['description']    =   $this->input->post('skin_colour');
	$this->db->where('type', 'skin_colour');
	$this->db->update('settings', $data);
	}
	
	function get_settings($type){
	$get_settings = $this->db->get_where('settings', array('type' => $type))->row()->description;
	return $get_settings;
	}
	
	function paypal_settings(){
	$paypal_info = array();
	
	$paypal['paypal_active']    = html_escape($this->input->post('paypal_active'));
	$paypal['paypal_mode']         = html_escape($this->input->post('paypal_mode'));
	$paypal['sandbox_client_id']       = html_escape($this->input->post('sandbox_client_id'));
	$paypal['production_client_id']       = html_escape($this->input->post('production_client_id'));
	
	array_push($paypal_info, $paypal);
	
	$data['description'] = json_encode($paypal_info);
	$this->db->where('type', 'paypal_setting');
	$this->db->update('settings', $data);
	
	
	}
	
	function get_class_name ($class_id){
	$query = $this->db->get_where('class', array('class_id' => $class_id));
	$result = $query->result_array();
	foreach ($result as $key => $row)
	return $row['name'];
	
	}
	
	
	/**** Function to select all students from student's table ****/
	function list_all_student_and_order_with_student_id(){
	
	$data = array();
	$sql = "select * from student order by student_id desc limit 0, 5";
	$all_student_selected = $this->db->query($sql)->result_array();
	
	foreach($all_student_selected as $key => $selected_students_from_student_table){
	$student_id = $selected_students_from_student_table['student_id'];
	$face_file = 'uploads/student_image/'. $student_id . '.jpg';
	if(!file_exists($face_file)){
	$face_file = 'uploads/student_image/default_image.jpg/';
	}
	$selected_students_from_student_table['face_file'] = base_url() . $face_file;
	array_push($data, $selected_students_from_student_table);
	}
	return $data;
	}
	
	/**** Function to select all teachers from teacher's table ****/
	function list_all_teacher_and_order_with_teacher_id(){
	
	$data = array();
	$sql = "select * from teacher order by teacher_id desc limit 0, 5";
	$all_teacher_selected = $this->db->query($sql)->result_array();
	
	foreach($all_teacher_selected as $key => $selected_teachers_from_teacher_table){
	$teacher_id = $selected_teachers_from_teacher_table['teacher_id'];
	$face_file = 'uploads/teacher_image/'. $teacher_id . '.jpg';
	if(!file_exists($face_file)){
	$face_file = 'uploads/teacher_image/default_image.jpg/';
	}
	
	$selected_teachers_from_teacher_table['face_file'] = base_url() . $face_file;
	array_push($data, $selected_teachers_from_teacher_table);
	}
	
	return $data;
	}
	
	function get_teachers() {
	$query = $this->db->get('teacher');
	return $query->result_array();
	}
	
	
	function get_students($class_id){
	$query = $this->db->get_where('student', array('class_id' => $class_id));
	return $query->result_array();
	}
	
	function get_invoice_info() {
	$query = $this->db->get('invoice');
	return $query->result_array();
	}
	
	function save_into_school_website_table_model(){
	
	$data['description']    =   $this->input->post('about_us');
	$this->db->where('type', 'about_us');
	$this->db->update('website_settings', $data);
	
	$data['description']    =   $this->input->post('video_link');
	$this->db->where('type', 'video_link');
	$this->db->update('website_settings', $data);
	
	$data['description']    =   $this->input->post('mission');
	$this->db->where('type', 'mission');
	$this->db->update('website_settings', $data);
	
	$data['description']    =   $this->input->post('vission');
	$this->db->where('type', 'vission');
	$this->db->update('website_settings', $data);
	
	$data['description']    =   $this->input->post('goal');
	$this->db->where('type', 'goal');
	$this->db->update('website_settings', $data);
	
	$data['description']    =   $this->input->post('testimony_message');
	$this->db->where('type', 'testimony_message');
	$this->db->update('website_settings', $data);
	
	$data['description']    =   $this->input->post('map_code');
	$this->db->where('type', 'map_code');
	$this->db->update('website_settings', $data);
	
	$data['description']    =   $this->input->post('facebook_link_code');
	$this->db->where('type', 'facebook_link_code');
	$this->db->update('website_settings', $data);
	
	$data['description']    =   $this->input->post('contact_message');
	$this->db->where('type', 'contact_message');
	$this->db->update('website_settings', $data);
	}
	
	function save_banner_into_banner_table_model(){
	$page_data['banner_image'] = $_FILES["banner_image"]["name"];
	$page_data['banner_text'] = $this->input->post('banner_text');
	$this->db->insert('banner_table', $page_data);
	move_uploaded_file($_FILES['banner_image']['tmp_name'], 'uploads/banner_image/' . $_FILES["banner_image"]["name"]);            
	
	}
	
	function update_testimony_status($param2){
	
	$page_data['status'] = $this->input->post('status');
	
	$this->db->where('testimony_id', $param2);
	$this->db->update('testimony_table', $page_data);
	
	}
	
	function delete_testimony_status($param2){
	
	$this->db->where('testimony_id', $param2);
	$this->db->delete('testimony_table');
	}
	
	
	
	
	
	
	}	
	
	
		