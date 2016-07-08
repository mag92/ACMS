<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Announcements extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('userlogin2');
        $this->load->model('messages_model');
        $this->load->model('announcements_model');
    }







    
    
    public function index()
    {
        //$this->load->model('announcements');

        if ($_SESSION['usertype'] == 'professor')
        {
            $courses = $this->announcements_model->getCourses();
            $data['courses'] = $courses;
            $data['previous_announcements'] = $this->announcements_model->getAnnouncementsByProf();
            //print_r($data);
            //if ($data['previous_announcements'])
              //  $data['timeelapsed'] = $this->nicetime($data['previous_announcements'][0]->datetime);
            $this->load->view('professor_announcements', $data);
        }
        
    }
    
    public function post()
    {
        $course = $this->input->post('course');
        $message = $this->input->post('message');
        
        $this->load->model('announcements_model');
        if ($this->announcements_model->post($course, $message))
            redirect ('announcements');
        //else echo "error";
        
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('announcements');
        redirect('announcements');
    }
    
    
    
    
    
    
    
    
    
}