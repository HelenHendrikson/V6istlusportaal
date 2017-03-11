<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajutine extends CI_Controller {
		
	public function register_form($message = null)
	{
		$title['title'] = 'ajutiselt';
		$this->load->view('menu', $title);	
		$this->load->view('ajutine_registreerimine', $message);
	}


    public function data_submitted()
    {
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');

        $data = array(
            'kasutajanimi' => $this->input->post('kasutajanimi'),
            'eesnimi' => $this->input->post('eesnimi'),
            'perenimi' => $this->input->post('perenimi'),
            'meil' => $this->input->post('meil'),
            'parool' => $this->input->post('parool'),
        );

        //teen xss tõrje
        $cleaned = $this -> security -> xss_clean($data);
        if ($cleaned == $data)
        {
            //kontrollin vormi sobivust
            $this->form_validation->set_rules('kasutajanimi', 'Kasutajanimi', array('required', 'min_length[3]', 'max_length[30]'));
            $this->form_validation->set_rules('eesnimi', 'Eesnimi', array('required', "max_length[30]"));
            $this->form_validation->set_rules('perenimi', 'Perenimi', array('required', "max_length[30]"));
            $this->form_validation->set_rules('meil', 'Meil', array('required', "valid_email", "max_length[50]"));
            $this->form_validation->set_rules('parool', 'Parool', array('required', "min_length[6]", "max_length[256"));
            $this->form_validation->set_rules('parooli_kinnitus', 'Parooli_kinnitus', array('required', "matches[parool]"));

            if ($this->form_validation->run()) {
                $this->load->model('sportlaste_model');

                // räsistan parooli
                $data["parool"] = password_hash($data["parool"], PASSWORD_BCRYPT);

                $this->sportlaste_model->form_insert($data);
                redirect("welcome");
            }
        }
        redirect("ajutine/register_form");
    }
}



