<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajutine extends CI_Controller {
	
	
	function __construct() 
	{
		parent::__construct();
	}
		
	public function register_form()
	{
		$title['title'] = 'ajutiselt';
		$this->load->view('menu', $title);	
		$this->load->view('ajutine_registreerimine');
	}
	
	
	public function data_submitted() 
	{
		$data = array(
		'kasutajanimi' => $this->input->post('kasutajanimi'),
		'eesnimi' => $this->input->post('eesnimi'),
		'perenimi' => $this->input->post('perenimi'),
		'meil' => $this->input->post('meiliaadress'),
		'parool' => $this->input->post('parool')
		);
		
		// Show submitted data on view page again.
		//$this->load->view("menu", $data);
		//$this->load->view("ajutine_registreerimine", $data);
		//echo $data['kasutajanimi'];
		//echo $data['eesnimi'];
		//echo $data['perenimi'];
		
		$this->load->model('sportlaste_model');
		$this->sportlaste_model->form_insert($data);
		//Loading View
	}
}


