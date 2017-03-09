<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$title['title'] = 'Veebirakendus';
		$this->load->view('menu', $title);
		$this->load->view('main');
		$this->load->view('footer');
		
	}
	
	public function KKK()
	{
		$title['title'] = 'VRL - KKK';
		$this->load->view('menu', $title);	
		$this->load->view('KKK');
		$this->load->view('footer');

	}
	
	public function otsing()
	{
		$title['title'] = 'VRL - searchPage';
		$this->load->view('menu', $title);	
		$this->load->view('searchPage');
	}
	
	public function get_data() 
	{ 
		$this->load->model('sportlaste_model');

		$keyword = array('data' => $this->input->get('keyword'));		
		$data['results'] = $this->sportlaste_model->search($keyword["data"]);
		
        $title['title'] = 'VRL - searchPage';
		$this->load->view('menu', $title);	
		$this->load->view('searchPage', $data);
	}


}
