<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Announcements_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        
    }

    public function getCourses()
    {
        $query = $this->db->query("select * from courses"); 
        return $query->result();
    }
    
    public function post($course, $message)
    {
        $data = array(
          'id' => NULL,
            'body' => $message,
            'receiver_course' => $course,
            'prof_id' => $_SESSION['id']
        );
        $query = $this->db->insert('announcements', $data);
        if($query)
            return true;
        return false;
        
    }
    
    public function getAnnouncementsByProf()
    {
        $query = $this->db->query("select announcements.id, receiver_course, body, prof_id, datetime, name, code from announcements inner join courses on courses.id = receiver_course where prof_id = {$_SESSION['id']} order by datetime desc");
        //$query->result()->datetime = $this->nicetime($query->datetime);
        //$query->result()[0]->id = 4;
        
        foreach ($query->result() as $x)
        {
            $x->datetime = $this->nicetime($x->datetime);
        }
        return $query->result();
    }
    
    public function getStudentAnnouncements()
    {
        $query = $this->db->query("select announcements.datetime, users.name, users.id, announcements.body, announcements.receiver_course, courses.name as coursename from announcements "
                . "inner join courses on courses.id = announcements.receiver_course "
                . "inner join students_has_courses on students_has_courses.courses_id = announcements.receiver_course "
                . "inner join users on users.id = students_has_courses.students_id where users.id = {$_SESSION['id']} order by datetime desc");
        foreach ($query->result() as $x)
        {
            $x->datetime = $this->nicetime($x->datetime);
        }
        return $query->result();
        return $query->result();        
    }
    
    
    
    public function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}

}