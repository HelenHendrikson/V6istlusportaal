<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajutine extends CI_Controller {
<<<<<<< HEAD

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
	public function registreerimine()
=======
	
	
	function __construct() 
	{
		parent::__construct();
	}
		
	public function register_form($message = null)
>>>>>>> b9072c5384a7512c35e3081482cbff69f2c869e4
	{
		$title['title'] = 'ajutiselt';
		$this->load->view('menu', $title);	
		$this->load->view('ajutine_registreerimine', $message);
	}
	
<<<<<<< HEAD
=======
	
	public function data_submitted() 
	{
		$data = array(
		'kasutajanimi' => $this->input->post('kasutajanimi'),
		'eesnimi' => $this->input->post('eesnimi'),
		'perenimi' => $this->input->post('perenimi'),
		'meil' => $this->input->post('meil'),
		'parool' => $this->input->post('parool'),
		'parooli_kinnitus' => $this->input->post('parooli_kinnitus')
		);
		//echo $data['kasutajanimi'];
		//echo $data['eesnimi'];
		//echo $data['perenimi'];
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//kontrollin vormi sobivust
        $this->form_validation->set_rules('kasutajanimi', 'Kasutajanimi', array('required', 'min_length[3]', 'max_length[30]'));
        $this->form_validation->set_rules('eesnimi', 'Eesnimi', array('required', "max_length[30]"));
        $this->form_validation->set_rules('perenimi', 'Perenimi', array('required', "max_length[30]"));
        $this->form_validation->set_rules('meil', 'Meil', array('required', "valid_email", "max_length[50]"));
        $this->form_validation->set_rules('parool', 'Parool', array('required', "min_length[6]"));
        $this->form_validation->set_rules('parooli_kinnitus', 'Parooli_kinnitus', array('required', "matches[parool]"));
		
		if ($this->form_validation->run())
		{
			unset($data["parooli_kinnitus"]);   //eemaldan kinnituse parooli enne adnmebaasi info laadimist
			$this->load->model('sportlaste_model');
			$this->sportlaste_model->form_insert($data);
			redirect("welcome");
		}
        else
		{
			redirect("ajutine/register_form");
        }
		
	}
>>>>>>> b9072c5384a7512c35e3081482cbff69f2c869e4
}



