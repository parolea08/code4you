<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Live_class_model extends CI_Model { 
	
	function __construct(){
        parent::__construct();
    }



    function saveLiveClassToDatabase(){

        $arrayLive = array(

            'title'             => html_escape($this->input->post('title')),
            'meeting_id'        => $this->input->post('meeting_id'),
            'meeting_password'  => $this->input->post('meeting_password'),
            'class_id'          => html_escape($this->input->post('class_id')),
            'section_id'        => html_escape($this->input->post('section_id')),
            'date'              => strtotime($this->input->post('date')),
            'start_time'        => date("H:i", strtotime($this->input->post('start_time'))),
            'end_time'          => date("H:i", strtotime($this->input->post('end_time'))),
            'remarks'           => html_escape($this->input->post('remarks')),
            'created_by'        => $this->session->userdata('login_type').'-'.$this->session->userdata('login_user_id')

        );

        $this->db->insert('live_class', $arrayLive);
        $sendPhone = $this->input->post('send_notification_sms');
        $senddate  = $this->input->post('date');

        if($sendPhone == '1'){

            $students = $this->db->get_where('student', array('class_id' => $this->input->post('class_id')))->row();
            $student_parent_id = $students->parent_id;
            $parents = $this->db->get_where('parent', array('parent_id' => $student_parent_id))->result_array();
            $student_array = $this->db->get_where('student', array('class_id' => $students->class_id))->result_array();

            $message = $this->input->post('title').' ';
            $message .= get_phrase('on').' '. $senddate;

            foreach ($parents as $key => $parent){
                $recieverPhoneNumber = $parent['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }

            foreach ($student_array as $key => $student){
                $recieverPhoneNumber = $student['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }


        }

    }

    function editLiveClassInformation($param2){

        $arrayLive = array(

            'title'             => html_escape($this->input->post('title')),
            'meeting_id'        => $this->input->post('meeting_id'),
            'meeting_password'  => $this->input->post('meeting_password'),
            'class_id'          => html_escape($this->input->post('class_id')),
            'section_id'        => html_escape($this->input->post('section_id')),
            'date'              => strtotime($this->input->post('date')),
            'start_time'        => date("H:i", strtotime($this->input->post('start_time'))),
            'end_time'          => date("H:i", strtotime($this->input->post('end_time'))),
            'remarks'           => html_escape($this->input->post('remarks'))

        );
        
        $this->db->where('live_class_id', $param2);
        $this->db->update('live_class', $arrayLive);
        $sendPhone = $this->input->post('send_notification_sms');
        $senddate  = $this->input->post('date');

        if($sendPhone == '1'){

            $students = $this->db->get_where('student', array('class_id' => $this->input->post('class_id')))->row();
            $student_parent_id = $students->parent_id;
            $parents = $this->db->get_where('parent', array('parent_id' => $student_parent_id))->result_array();
            $student_array = $this->db->get_where('student', array('class_id' => $students->class_id))->result_array();

            $message = $this->input->post('title').' ';
            $message .= get_phrase('on').' '. $senddate;

            foreach ($parents as $key => $parent){
                $recieverPhoneNumber = $parent['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }

            foreach ($student_array as $key => $student){
                $recieverPhoneNumber = $student['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }
        }
    }

    function deleteLiveClassInformation($param2){
        $this->db->where('live_class_id', $param2);
        $this->db->delete('live_class');
    }



    function selectLiveClassInformationByUser(){
        $user_type_id = $this->session->userdata('login_type').'-'.$this->session->userdata('login_user_id');
        $sql = "select * from live_class where created_by ='".$user_type_id."' order by live_class_id asc";
        return $this->db->query($sql)->result_array();
    }

    function selectLiveClassByStudentClassId(){

        $student_class = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row()->class_id;
        $student_section = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->row()->section_id;
        $sql = "select * from live_class where class_id ='".$student_class."' and section_id = '".$student_section."' order by live_class_id asc";
        return $this->db->query($sql)->result_array();
    }







}