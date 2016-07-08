<?php

class Login extends CI_Controller {
	public function index()
	{
		$this->load->helper('URL');
        if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==1) && ($_SESSION['usertype'] == 'student'))
        {
            redirect('student');
        }
		elseif (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==1) && ($_SESSION['usertype'] == 'professor'))
        {
            redirect('professor');
        }
        else
        {
        // Not logged in
            
            $this->load->model('userlogin2');
            
            // if logged in as user
            
            if (!empty($this->input->post()))
            {
                if (empty($this->input->post('email')) || (empty($this->input->post('password'))))
                {
                    echo "Fields cannot be empty";
                    return false;
                }
                $result = $this->userlogin2->login();
                if ($result == 1)
                {
                    redirect ('student');
                    //echo "Hi.";
                }
                elseif ($result == 2)
                {
                    redirect('professor');
                }
            }
            // if logged in as a professor
            if (!empty($this->input->post('stafflogin')))
            {
                if (empty($this->input->post('email')) || (empty($this->input->post('password'))))
                {
                    echo "Fields cannot be empty";
                    return false;
                }
                
                $result = $this->userlogin->placeLogin();
                if ($result)
                {
                    redirect ('staff');
                }
                else
                {
                    $this->load->view('errorlogin');
                }
            }
            
            else
            {
                $this->load->view('login2');
            }
        }
	}
}