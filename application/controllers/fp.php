<?php

class FP extends CI_Controller
{
    public function index()
	{
	$this->load->helper('file');
	$get = $this->input->get();
	$get = json_encode($get);	    
	echo "Hi...\n";
        
        print_r($this->input->get());
		write_file('./data.txt', $get, 'a+');
		write_file('./data.txt', "\r\n", 'a+');
	
        $post = $this->input->post();
        echo "Hi...\n";
        
        print_r($this->input->post());
		write_file('./data.txt', $post, 'a+');
		write_file('./data.txt', "\r\n", 'a+');
        
	}
}