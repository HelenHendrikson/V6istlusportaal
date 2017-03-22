<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$title['title'] = $this->lang->line('avaleht');
		$this->load->view('menu', $title);
		$this->load->view('main');
		$this->load->view('footer');
		
	}


	public function voistlused()
	{
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions();
        $title['title'] = $this->lang->line('voistlused');

		$this->load->view('menu', $title);
		$this->load->view('treenerRegabSportlastvaade', $data);
		$this->load->view('footer');
	}


	public function saa_voistluse_info($voistluse_id) {
        $this->load->model('sportlaste_model');

        $this->data['voistluse_info'] = $this->sportlaste_model->get_competition_info($voistluse_id);
        $this->data['võistlejad'] = $this -> sportlaste_model -> get_competition_competitors($voistluse_id);
        $this->data['count'] = $this -> sportlaste_model -> get_competition_competitors_count($voistluse_id);
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data));
    }


    public function sendRegistrationDataToDatabase()
    {
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');

        $test_array = array (
            'bla' => 'blub',
            'foo' => 'bar',
            'another_array' => array (
                'stack' => 'overflow',
            ),
        );
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($test_array, array ($xml, 'addChild'));
        echo $xml->asXML();


        /*
        $data = array(
            'kasutajanimi' => $this->input->post('kasutajanimi'),
            'eesnimi' => $this->input->post('eesnimi'),
            'perenimi' => $this->input->post('perenimi'),
            'meil' => $this->input->post('meil'),
            'parool' => $this->input->post('parool')
        );

                //teen xss tõrje
                $cleaned = $this->security->xss_clean($data);
                if ($cleaned == $data) {
                    //kontrollin vormi sobivust
                    $this->form_validation->set_rules('kasutajanimi', 'Kasutajanimi', array('required', 'min_length[3]', 'max_length[30]'));
                    $this->form_validation->set_rules('eesnimi', 'Eesnimi', array('required', "max_length[30]"));
                    $this->form_validation->set_rules('perenimi', 'Perenimi', array('required', "max_length[30]"));
                    $this->form_validation->set_rules('meil', 'Meil', array('required', "valid_email", "max_length[50]"));
                    $this->form_validation->set_rules('parool', 'Parool', array('required', "min_length[6]", "max_length[256]"));
                    $this->form_validation->set_rules('parooli_kinnitus', 'Parooli_kinnitus', array('required', "matches[parool]"));

                    if ($this->form_validation->run()) {
                        $this->load->model('sportlaste_model');

                        // räsistan parooli
                        $data["parool"] = password_hash($data["parool"], PASSWORD_BCRYPT);

                        $this->sportlaste_model->form_insert($data);
                        redirect("welcome");
                    }
                }*/
    }


	public function otsing()
	{
        $this->load->model('sportlaste_model');
        $this->load->helper("security");

        $keyword = array('data' => $this->input->get('keyword'));
        if ($keyword["data"] != "")
        {
            $cleaned = $this->security->xss_clean($keyword);
            if ($cleaned != $keyword)
            {
                redirect("welcome");
            }
            $data['results'] = $this->sportlaste_model->search($keyword["data"]);
            $title['title'] = $this->lang->line('voistlused');
            $this->load->view('menu', $title);
            $this->load->view('searchPage', $data);
        }
        else
        {

            $title['title'] = 'VRL - searchPage';
            $this->load->view('menu', $title);
            $this->load->view('searchPage');
        }

	}


	public function info()
    {
        $keyword = array('data' => $this->input->get('keyword'));
    }

}
