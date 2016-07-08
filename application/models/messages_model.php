<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Messages_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        
    }
    public function sendMessage_Professor() {
        if (!empty($this->input->post('professor')))
             $professor = $this->input->post('professor');
         else {
            $professor = $this->input->post('messageid');
         }
        $message = $this->input->post('message');
        $sender = $_SESSION['id'];

        $full_msg = array(
            'subject' => 'Subject',
            'body' => $message,
            'timestamp' => NULL
        );


        $data = array(
            'sender' => $sender,
            'receiver' => $professor,
            'status' => 0
        );
        $this->db->trans_start();
        $this->db->query("INSERT INTO messages (subject, body, timestamp, direction)
  VALUES('Subject', '$message', NULL, 'stp')");
        $this->db->query("INSERT INTO messages_users (id, sender, receiver, status) 
  VALUES(LAST_INSERT_ID(), '$sender' ,'$professor', 0)");
        $this->db->trans_complete();
        
        //echo "HELLOOOO";
        
        $ch = curl_init();
            $fields2 =array(
                    "to" => "f4jR3yGea3g:APA91bGCXcMd17sfDQ22p0t8sDuqJhH2t4CSaBuP5Di_A7yrn8W2cBXBQdyBuR9iu6cALtr1Oabc1Jk6XuwQ0iwdMzkMWY-RY4AGwDJzH3C7P91n_uJxgzrk9OgdzahRa8WfZ02j20cZ",
                    "notification" => array(
                        "title" => "New message",
                    "text" => "$message",
                        "sound" => "surprise.mp3"
                    
            ));
            echo json_encode($fields2);
            
            curl_setopt($ch, CURLOPT_URL,"https://fcm.googleapis.com/fcm/send");
            curl_setopt($ch,CURLOPT_HTTPHEADER,array(
                'Authorization:key=AIzaSyDc3Fusbq1GIyl3w-CoQf5-LLAISdezqxw',
                'Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            
            curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($fields2));


            // in real life you should use something like:
            // curl_setopt($ch, CURLOPT_POSTFIELDS, 
            //          http_build_query(array('postvar1' => 'value1')));

            // receive server response ...
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec ($ch);
            $err = curl_error($ch);
            curl_close ($ch);  
            if ($err)
                echo $err;
        return true;
    }

    
    
    public function sendMessage_Professor2($reply_to) {
        // get names
        //$query = $this->db->query('select * from messages inner join messages_users on messages_users.id = messages.id inner join users on users.name = messages_users.sender_name');
        //$x = $query->result();
        $reply_to = $this->input->post('messageid');
        $message = $this->input->post('message');
        $sender = $_SESSION['name'];
        
        
        $this->db->trans_start();
        $this->db->query("INSERT INTO messages (subject, body, timestamp, direction)
  VALUES('Subject', '$message', NULL, 'pts')");
        $this->db->query("INSERT INTO messages_users (id, sender, receiver, status, sender_name, receiver_name) 
  VALUES(LAST_INSERT_ID(), null ,null, 0, '$sender', '$reply_to')");
        $this->db->trans_complete();
        return true;
    }
    
    
    
    
    public function getMessagesfrom_Professor() {

        $receiver = $sender = $_SESSION['name'];
        
        $query = $this->db->query("SELECT * FROM messages INNER JOIN messages_users ON messages.id = messages_users.id "
                . "INNER JOIN users ON users.id = messages_users.sender WHERE messages_users.receiver = {$_SESSION['id']}");
        foreach ($query->result() as $x)
        {
            $x->timestamp = $this->nicetime($x->timestamp);
        }
        return $query->result();
    }
    
    public function getMessagesfrom_Professor2() {

        $receiver = $sender = $_SESSION['name'];
        
        $query = $this->db->query("select * from messages inner join messages_users on messages_users.id = messages.id where messages_users.receiver_name = \"{$_SESSION['name']}\"");
        foreach ($query->result() as $x)
        {
            $x->timestamp = $this->nicetime($x->timestamp);
        }
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
