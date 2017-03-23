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

}
