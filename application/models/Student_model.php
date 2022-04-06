<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


 


    //  the function below insert into student table
    function createNewStudent(){

        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'birthday'      => html_escape($this->input->post('birthday')),
            'age'           => html_escape($this->input->post('age')),
            'place_birth'   => html_escape($this->input->post('place_birth')),
            'sex'           => html_escape($this->input->post('sex')),
            'm_tongue'      => html_escape($this->input->post('m_tongue')),
            'address'       => html_escape($this->input->post('address')),
            'city'          => html_escape($this->input->post('city')),
            'country'       => html_escape($this->input->post('country')),
            'nationality'   => html_escape($this->input->post('nationality')),
            'phone'         => html_escape($this->input->post('phone')),
            'email'         => html_escape($this->input->post('email')),
			'physical_h'    => html_escape($this->input->post('physical_h')),
            'password'      => sha1($this->input->post('password')),
            'class_id'      => html_escape($this->input->post('class_id')),
            'section_id'    => html_escape($this->input->post('section_id')),
            'parent_id'     => html_escape($this->input->post('parent_id')),
            'roll'          => html_escape($this->input->post('roll')),
            'session'       => html_escape($this->input->post('session'))
        );
        
  
    $this->db->insert('student', $page_data);
    $student_id = $this->db->insert_id();
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');			// image with user ID

    }


    //the function below update student
    function updateNewStudent($param2){
        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'birthday'      => html_escape($this->input->post('birthday')),
            'age'           => html_escape($this->input->post('age')),
            'place_birth'   => html_escape($this->input->post('place_birth')),
            'sex'           => html_escape($this->input->post('sex')),
            'm_tongue'      => html_escape($this->input->post('m_tongue')),
            'address'       => html_escape($this->input->post('address')),
            'city'          => html_escape($this->input->post('city')),
            'country'       => html_escape($this->input->post('country')),
            'nationality'   => html_escape($this->input->post('nationality')),
            'phone'         => html_escape($this->input->post('phone')),
            'email'         => html_escape($this->input->post('email')),
			'physical_h'    => html_escape($this->input->post('physical_h')),
            'password'      => sha1($this->input->post('password')),
            'class_id'      => html_escape($this->input->post('class_id')),
            'section_id'    => html_escape($this->input->post('section_id')),
            'parent_id'     => html_escape($this->input->post('parent_id'))
	    );
        $this->db->where('student_id', $param2);
        $this->db->update('student', $page_data);
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param2.'.jpg'); 
		

    }

    // the function below deletes from student table
    function deleteNewStudent($param2){
        $this->db->where('student_id', $param2);
        $this->db->delete('student');
    }

	


	
	
}

