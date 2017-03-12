<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$title['title'] = 'Avaleht';
		$this->load->view('menu', $title);
		$this->load->view('main');
		$this->load->view('footer');
		
	}
	
	public function voistlused()
	{
        $this->load->model('sportlaste_model');

        $voistluse_id = $this->input->get('võistlused');
        if ($voistluse_id != "") {
            $data['voistluse_info'] = $this->sportlaste_model->get_competition_info($voistluse_id);
            $data['võistlejad'] = $this -> sportlaste_model -> get_competition_competitors($voistluse_id);
            $data['count'] = $this -> sportlaste_model -> get_competition_competitors_count($voistluse_id);
        }
        $data['voistlused'] = $this->sportlaste_model->get_competitions();
        $title['title'] = $this->lang->line('voistlused');

		$this->load->view('menu', $title);
		$this->load->view('treenerRegabSportlastvaade', $data);
		$this->load->view('footer');
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
            $title['title'] = 'VRL - searchPage';
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
