<?php

class Sportlaste_model extends CI_Model{
	
	
	function __construct() 
	{
		parent::__construct();
	}
	
	
	function form_insert($data)
	{
		// Inserting in Table(students) of Database(college)
		$this->db->insert('sportlane', $data);
	}
	
	public function search($keyword)
	{
		$this->db->like('eesnimi',$keyword);
        $query = $this->db->get('sportlane');
        return $query->result();
	}
}
?>
