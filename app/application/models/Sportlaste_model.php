<?php

class Sportlaste_model extends CI_Model{
	
	
	function __construct() 
	{
		parent::__construct();
	}
	
	
	public function form_insert($data)
	{
        $this->db->query('call lisa_sportlane("' . $data['kasutajanimi'] . '", "' .  $data['eesnimi']. '", "' . $data['perenimi']
            . '", "' . $data['meil'] . '", "' . $data['parool'] . '")');
    }

    function add_competition($data)
    {
        $this->db->query('call lisa_voistlus("' . $data['name'] . '", "' .  $data['date'] . '", "' . $data['distance']
            . '", "' .  $data['sports_id'] . '")');
    }

	public function search($keyword)
	{
		// hetkel leian ainult eesnimesid
        $query = $this->db->query('call leia_sportlane("' . $keyword . '")');
        return $query->result();
    }

    public function get_sportsmen($keyword)
	{
		// hetkel leian ainult eesnimesid
        $query = $this->db->query('call leia_treeneri_sportlased("' . $keyword . '")');
        return $query->result();
    }

	public function get_competitions($sports_id)
	{
        $query = $this->db->query('call leia_voistlused(' . $sports_id .')');
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

    public function get_account_data($username)
    {
        $query = $this->db->query('call get_account_data("' . $username . '")');
        return $query;
    }

    public function get_account_availability($username)
    {
        $query = $this->db->query('call kas_kasutaja_olemas("' . $username . '")');
        return $query->result();
    }

    public function connect_trainer_and_sportsman($trainer_id, $sportsman_id) {
        $this->db->query('call lisa_treenerile_sportlane(' . $trainer_id . ', ' . $sportsman_id . ')');
    }

    public function disconnect_trainer_and_sportsman($trainer_id, $sportsman_id) {
        $this->db->query('call eemalda_treenerilt_sportlane(' . $trainer_id . ', ' . $sportsman_id . ')');
    }

    public function get_sports_id($voistluse_id) {
	    $query = $this->db->query('call saa_ala_id(' . $voistluse_id . ')');
	    return $query->result_array();
    }
}
