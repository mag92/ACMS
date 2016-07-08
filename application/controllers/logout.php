<?php

class logout extends CI_Controller {
public function index()
{
		$this->load->helper('URL');
		$this->session->sess_destroy();
		redirect('login');

}
}
