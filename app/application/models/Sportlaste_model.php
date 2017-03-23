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

	public function get_competitions()
	{
        $query = $this->db->query('call leia_voistlused()');
        return $query->result();
	}

    public function get_competition_info($voistluse_id)
    {
        $query = $this->db->query('call võistluse_info(' . $voistluse_id . ')');
        return $query->result_array();
    }

    public function get_competition_competitors($voistluse_id)
    {
        $query = $this->db->query('call leia_võistlusel_osalejad(' . $voistluse_id . ')');
        return $query->result_array();
    }

    public function get_competition_competitors_count($voistluse_id)
    {
        $query = $this->db->query('call leia_võistlusel_osalejate_arv(' . $voistluse_id . ')');
        return $query->result_array();
    }

    public function get_account_password($username)
    {
        $query = $this->db->query('call get_password("' . $username . '")');
        return $query->result();
    }

}
