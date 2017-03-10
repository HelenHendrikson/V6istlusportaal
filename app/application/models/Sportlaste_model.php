<?php

class Sportlaste_model extends CI_Model{
	
	
	function __construct() 
	{
		parent::__construct();
	}
	
	
	function form_insert($data)
	{
        $this->db->query('call lisa_sportlane("' . $data['kasutajanimi'] . '", "' .  $data['eesnimi']. '", "' . $data['perenimi']
            . '", "' . $data['meil'] . '", "' . $data['parool'] . '")');
    }
	
	public function search($keyword)
	{
		//$this->db->like('eesnimi',$keyword);
        //$query = $this->db->get('sportlane');
        $query = $this->db->query(
            "verificacion_fechas '".$keyword);
        return $query->result();
	}
}
