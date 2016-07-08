<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Finger extends CI_Model
{
    public function attend($student_id = NULL, $finger_id = NULL)
    {
        $this->db->query("INSERT INTO attendance (student_id, finger_id, datetime)
  VALUES($student_id, $finger_id, NULL)");
    }
    
    public function getattend()
    {
        $q = $this->db->query("SELECT name, finger_id, datetime FROM attendance INNER JOIN users oN users.id = attendance.student_id");
        return $q->result();
    }
}