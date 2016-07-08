<?php

class Receiver extends CI_Controller
{
    public function index()
	{
        $this->load->model("finger");
	 $output = print_r($_GET, true);
    //echo "Hello.";
    file_put_contents("data2.txt", $output);
    
      //$this->finger->attend($output->StudentID, $output->FingerprintID);  
      $this->finger->attend($_GET["StudentID"], $_GET["FingerprintID"]);  
	
		
	}
}