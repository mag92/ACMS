<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class userlogin2 extends CI_Model
{
    function login($emaila = NULL, $passworda = NULL)
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->db->select('id, email, name, password, year, department, type');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1)
        {
            $row = $query->row();
            if($row->type == "student")
            {
            
            $data = array(
                'id' => $row->id,
                'email' => $row->email,
                'name' => $row->name,
                'year' => $row->year,
                'dept' => $row->dept,
                'section' => $row->section,
                'loggedin' => TRUE,
                'usertype' => "student"
            );
            $this->session->unset_userdata('loggedin');
            $this->session->set_userdata($data);
            return 1;
            }
            elseif($row->type == "professor")
            {
                
            $data = array(
                'id' => $row->id,
                'email' => $row->email,
                'name' => $row->name,
                'year' => $row->year,
                'dept' => $row->dept,
                'section' => $row->section,
                'loggedin' => TRUE,
                'usertype' => "professor"
            );
            $this->session->unset_userdata('loggedin');
            $this->session->set_userdata($data);
            return 2;
            }
        }
	/*	
		$this->db->select('id, email, department, name, password');
        $this->db->from('professors');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1)
        {
            $row = $query->row();
            $data = array(
                'id' => $row->id,
                'email' => $row->email,
				'name' => $row->name,
                'deptartment' => $row->deptartment,
                'loggedin' => TRUE,
                'usertype' => "professor"
            );
            $this->session->unset_userdata('loggedin');
            $this->session->set_userdata($data);
            return 2;
        }
		
		*/
        else
        {
            return false;
        }
    }
    
    public function loadProfessors()
    {
        $query = $this->db->query('SELECT * FROM users WHERE type = "professor"');
        return $query->result();
    }
    
    public function loadStudents()
    {
        $query = $this->db->query('SELECT * FROM users WHERE type = "student"');
        return $query->result();
    }
    
    
    
    
    
    
    // app login
    
    
    function loginapp($email = NULL, $password = NULL)
    {
        //$email = $this->input->post('email');
        //$password = $this->input->post('password');
        
        $this->db->select('id, email, name, password, year, department, type');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1)
        {
            $row = $query->row();
            if($row->type == "student")
            {
            
            $data = array(
                'id' => $row->id,
                'email' => $row->email,
                'name' => $row->name,
                'year' => $row->year,
                'loggedin' => TRUE,
                'usertype' => "student"
            );
            $this->session->unset_userdata('loggedin');
            $this->session->set_userdata($data);
            return 1;
            }
            
    }
    }
}