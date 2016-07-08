<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Buses extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        
    }
    public function index()
    {
        $this->load->model('buses_model');
        $data['title'] = "Buses";
        $data['stations'] = $this->buses_model->getStations();
        if ($_SESSION['usertype'] == "student")
            $this->load->view('student_header', $data);
        else
            $this->load->view('professor_header', $data);
        $this->load->view('buses', $data);
    }
    
    public function getBus($id)
    {
        //echo $id;
        $this->load->model('buses_model');
        $station = $id;
        $buses = $this->buses_model->getBuses($station);
        $numbuses = $this->buses_model->getNumBuses($station);
        //echo $buses;
            echo '<table class="table table-striped table-bordered">
                    <thead style="text-align:center">
                        <tr>
                            <th style="text-align:center">Bus no.</th>
                            <th style="text-align:center">Will Reach you at</th>
                        </tr>
                    </thead>
                    <tbody>';
            if ($numbuses[0]->num == 0)
                echo '<h5>There are no available buses.';
            elseif ($numbuses[0]->num == 1)
                echo '<h4>There is only one bus available.';
            else
                echo '<h4>There are '. $numbuses[0]->num .' buses available.';
        foreach ($buses as $bus)
        {
            echo "      <tr>
                            <td>$bus->bus_code</td>
                            <td>$bus->arrival_time</td>
                        </tr>";
                
        }
        echo '</table>';
    }
}