<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class App extends CI_Controller
{
        public function __construct() {
        parent::__construct();
        $this->load->model('userlogin2');
        $this->load->helper('file');
        $this->load->model('app_model');
        }
        
    public function index()
    {
        
    }
    
    //FORM
    public function login()
    {
        
        if (($this->input->post()))
        {
            $text =  file_get_contents('php://input');
            file_put_contents("log.txt", $text);
            //$arr = json_decode($text);

                $result = $this->userlogin2->loginapp($this->input->post('email'), $this->input->post('password'));
                if ($result == 1)
                {
                    $token = md5(uniqid(rand()));
                    $login = array("access_token" => $token, "id" => $_SESSION['id']);
                    echo json_encode($login);
                    
                    //logged in
                    
                    $this->app_model->insert_access_token($_SESSION['id'], $token);
            
                }
                elseif ($result == 2)
                {
                    echo "error";
                }
                else {
                    echo "error";
                }           
        }
    }
    
    public function fcm()
    {
        

        
        if (($this->input->post())) {
            $req = file_get_contents('php://input');
        file_put_contents("fcm_token.txt", $req);

        file_put_contents("fcm_post.txt", $_POST['Token']);
        
        
            $token = $this->input->post('Token');
            $id = $this->input->post('id');
            $this->app_model->insert_fcm_token($id, $token);
        } elseif ($result == 2) {
            echo "error";
        } else {
            echo "error";
        }
    }
    
    
    //JSON
//    public function login2()
//    {       
//        header('Content-Type: application/json');
//        if (($this->input->post()))
//        {
//            $text =  file_get_contents('php://input');
//            file_put_contents("log.txt", $text);
//            $arr = json_decode($text);
//
//                $result = $this->userlogin2->loginapp($arr->email, $arr->password);
//                if ($result == 1)
//                {
//                    $token = md5(uniqid(rand()));
//                    $login = array("access_token" => $token, "id" => $_SESSION['id']);
//                    echo json_encode($login);
//                    
//                    //logged in
//                    
//                    $this->app_model->insert_access_token($_SESSION['id'], $token);
//            
//                }
//                elseif ($result == 2)
//                {
//                    echo "error";
//                }
//                else {
//                    echo "error";
//                }           
//        }
//    }
    
    public function messages()
    {
          $messages = $this->app_model->getAllMessages();   
          //print_r($messages[0]);
          echo json_encode($messages);
    }
}