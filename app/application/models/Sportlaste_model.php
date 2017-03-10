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
		// hetkel leian ainult eesnimesid
        $query = $this->db->query('call leia_sportlane("' . $keyword . '")');
        return $query->result();
	}
}
