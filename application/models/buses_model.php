<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Buses_model extends CI_Model
{
    public function getBuses($station)
    {
        //$query = $this->db->query("select id")
        //return $station;
        $query = $this->db->query("select * from buses inner join bus_stations on bus_stations.id = buses.station where buses.station = $station");
        return $query->result();
    }
    
    public function getStations()
    {
        $query = $this->db->query("select * from bus_stations");
        return $query->result();
    }
    
    public function getNumBuses($station)
    {
        $query = $this->db->query("select count(*) as num from buses inner join bus_stations on bus_stations.id = buses.station where buses.station = $station");
        return $query->result();
    }
}