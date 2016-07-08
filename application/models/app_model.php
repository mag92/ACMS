<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class App_model extends CI_Model
{
    
    public function insert_access_token($uid = NULL, $token = NULL)
    {
        $check = $this->db->query("SELECT * FROM user_accesstoken WHERE uid = $uid");
        if ($check->num_rows() > 0)
        {
            $this->db->query("UPDATE user_accesstoken SET token = \"$token\" WHERE uid = $uid");
        }
        else
            $this->db->query("INSERT INTO user_accesstoken (uid, token) VALUES ($uid, \"$token\")");
    }
    
    
    //insert FCM token
    public function insert_fcm_token($uid, $token)
    {
        $this->db->query("INSERT INTO user_fcmtoken (uid, token) VALUES ($uid, \"$token\")");
    }
    
    //get messages by token
    
    public function getAllMessages() {

        $token = $this->input->get('access_token');
        $get = $this->db->query("SELECT body, receiver, name as creator, timestamp as date FROM messages "
                . "INNER JOIN messages_users ON messages.id = messages_users.id "
                . "INNER JOIN users ON users.id = messages_users.sender  "
                . "inner join user_accesstoken on messages_users.receiver = user_accesstoken.uid where user_accesstoken.token = \"$token\" Order by timestamp desc");
        foreach ($get->result() as $x)
        {
            $x->date = $this->nicetime($x->date);
        }
        
        foreach ($get->result() as $x)
        {
            $x->creator = "Dr. ".$x->creator;
        }
        return $get->result();
    }
    

    // Nicetime
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