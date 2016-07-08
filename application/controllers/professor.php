<?php

class Professor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('userlogin2');
        $this->load->model('messages_model');
        $this->load->model('announcements_model');
        $this->load->model('courses_model');
        //$this->load->library('curl');
    }

    public function index() {
        $this->load->helper('URL');
        $students = $this->userlogin2->loadStudents();
        $courses = $this->announcements_model->getCourses();
        $data['students'] = $students;
        $data['courses'] = $courses;
        
        $this->load->view('professor', $data);
    }
    
    public function getStudentsByCourse($id)
    {
        //echo $id;
        $students = $this->courses_model->getStudentsByCourse($id);
        //print_r($students);
        echo '<h6 class="my_hint" style="text-align:center; color:#ff5151; display:none">Scroll left and right in both names and attendance fields</h6>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="attendance_table" style="z-index:20;position:relative ;">
            <table class="table table-bordered table-hover responsive">
                <thead style="text-align:center">
                    <tr>
                        <th style="text-align:center">Name</th>
                        <th style="text-align:center">no.</th>
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center">15/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">4/1</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">25/1</th>
                        <th style="text-align:center">7/2</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">Total</th>
                    </tr>
                </thead>
                <tbody style="font-size:11px;">
                    ';
                    foreach ($students as $student)
                    {
                        
                        echo '
                    <tr>
                        <td>'.$student->student.'</td>
                        <td>1</td>
                        <td>x12e</td>
                        <td><span class="glyphicon glyphicon-ok"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td>1/10 (10%)</td>
                    </tr>
                            ';
                    }
                         
                    

echo ' 
            </table>
        </div>

       
';      
    }

    public function messages() {
        $messages = $this->messages_model->getMessagesfrom_Professor();
        $students = $this->userlogin2->loadStudents();
            $professors = $this->userlogin2->loadProfessors();
            //$data['professors'] = $professors;
            $data['messages'] = $messages;
            
        if (!empty($this->input->post())) {
            $reply_to = $this->input->post('sender_name');
            // curl post to FCM
            
            
            $this->messages_model->sendMessage_Professor();
            
            $ch = curl_init();
            $fields = array(
              'to' =>  'c96avGORW48:APA91bGEzrTmdTGLIoJLQq2kKkLfPnTfvbUtMB26Xyqq48DKDUtR_0H7J5IM-WPxiWjJJ_CB9Y1ofZbDS4aC0za4mVPLIMQ7vqREBggNJMv5hJ8XMRp0zmyrZLinhkl81fPl01TXhU7S' 
            ,
                'notification' => "title");
            
            $fields2 =' 
                {
                    "to" : "c96avGORW48:APA91bGEzrTmdTGLIoJLQq2kKkLfPnTfvbUtMB26Xyqq48DKDUtR_0H7J5IM-WPxiWjJJ_CB9Y1ofZbDS4aC0za4mVPLIMQ7vqREBggNJMv5hJ8XMRp0zmyrZLinhkl81fPl01TXhU7S",
                    "notification" : {
                    "title" : "testing",
                    "text" : "hello"
                        }
                    }
                ';
            curl_setopt($ch, CURLOPT_URL,"https://fcm.googleapis.com/fcm/send");
            curl_setopt($ch,CURLOPT_HTTPHEADER,array(
                'Authorization: key=AIzaSyDc3Fusbq1GIyl3w-CoQf5-LLAISdezqxw',
                'Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$fields2);


            // in real life you should use something like:
            // curl_setopt($ch, CURLOPT_POSTFIELDS, 
            //          http_build_query(array('postvar1' => 'value1')));

            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec ($ch);

            curl_close ($ch);

            
            
            //-----------
            $this->load->view('professor_messages', $data);
        } else {
            
            $this->load->view('professor_messages', $data);
        }
    }

    public function responses() {

}


    public function announcements()
    {
        redirect('announcements');
        $this->load->model('announcements_model');

        
        $courses = $this->announcements_model->getCourses();
        $data['courses'] = $courses;
        
        $this->load->view('professor_announcements', $data);
    }
}