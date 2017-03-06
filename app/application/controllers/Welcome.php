<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
	
	public function login()
	{
		$title['title'] = 'VRL -login';
		$this->load->view('menu',$title);
		$this->load->view('login');
	}
}
