<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Courses_model extends CI_Model{
    public function getStudentCourses()
    {
        $query = $this->db->query("select users.name, courses.name from students_has_courses "
                . "inner join users on students_has_courses.students_id = users.id "
                . "inner join courses on courses.id = students_has_courses.courses_id where users.id = {$_SESSION['id']}");
        return $query->result();            
    }
    
    public function getStudentsByCourse($id)
    {
        $query = $this->db->query("select users.name as student, courses.name from users "
                . "inner join students_has_courses on users.id = students_has_courses.students_id "
                . "inner join courses on students_has_courses.courses_id = courses.id where courses.id = $id");
        return $query->result();
    }
}