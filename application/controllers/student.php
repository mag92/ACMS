<?php

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('userlogin2');
        $this->load->model('messages_model');
        $this->load->helper('URL');
        $this->load->model('announcements_model');
        $this->load->model('courses_model');
        //$this->load->library('mahana_messaging');
    }

    public function index() {
        $courses = $this->courses_model->getStudentCourses();
        $data['courses'] = $courses;
        $data['title'] = "Home";
        $this->load->view('student_header', $data);    
        $this->load->view('student', $data);
    }

    public function announcements() {
        $data['title'] = "Announcements";
        $data['announcements'] = $this->announcements_model->getStudentAnnouncements();
        $this->load->view('student_header', $data);
        $this->load->view('student_announcements', $data);
    }

    public function messages() {
        $messages = $this->messages_model->getMessagesfrom_Professor();
        $students = $this->userlogin2->loadStudents();
            $professors = $this->userlogin2->loadProfessors();
            $data['professors'] = $professors;
            $data['messages'] = $messages;
            $data['title'] = "Messages";
            
        if (!empty($this->input->post())) {
            $this->messages_model->sendMessage_Professor();
            $this->load->view('student_header', $data);
            $this->load->view('student_send_message', $data);
        } else {
            $this->load->view('student_header', $data);
            $this->load->view('student_send_message', $data);
        }
    }

    public function responses() {
        $messages = $this->messages_model->getMessagesfrom_Professor();
        $students = $this->userlogin2->loadStudents();
            $professors = $this->userlogin2->loadProfessors();
            $data['professors'] = $professors;
            $data['messages'] = $messages;
            $data['title'] = "Responses";
            $this->load->view('student_header', $data);
        $this->load->view('student_responses', $data);
    }

}
