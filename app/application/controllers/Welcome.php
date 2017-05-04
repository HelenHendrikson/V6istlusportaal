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
        if ($this->session->userdata("sports_id") != null) {   // et igaüks url-i muutes ei saaks sellele lehele ligi
            $this->load->model('sportlaste_model');
            $this->load->helper(array("security", "otsingu_helper"));

            if (array_key_exists('usernames', $_POST)) {
                trainerSubmitedSportsmen($this->sportlaste_model, $this->session->userdata("user_id"));
            }

            $keyword = array('data' => $this->input->post('keyword'));

            if ($keyword["data"] != "") {
                $cleaned = $this->security->xss_clean($keyword);
                if ($cleaned != $keyword) {
                    redirect("welcome");
                }
                $results['results'] = $this->sportlaste_model->search($keyword["data"]);
                $results['sportsmen'] = $this->sportlaste_model->get_sportsmen($this->session->userdata("user_id"));

                $data = get_trainer_search_data($results);

                $title['title'] = $this->lang->line('voistlused');
                $this->load->view('menu', $title);
                $this->load->view('searchPage', $data);
            } else {
                $title['title'] = 'VRL - searchPage';
                $this->load->view('menu', $title);
                $this->load->view('searchPage');
                $this->load->view('footer');
            }
        }
	}
	
	public function annetused()
    {
		$title['title'] = 'annetused';
		$this->load->view('menu', $title);
		$this->load->view('annetused');
		$this->load->view('footer');
	}
	
	public function makseKatkestatud()
    {
		$title['title'] = 'makseKatkestatud';
		$this->load->view('menu', $title);
		$this->load->view('makseKatkestatud');
		$this->load->view('footer');
	}
	
	public function receive()
    {
		$title['title'] = 'receive';
		$this->load->view('menu', $title);
		$this->load->view('receive');
		$this->load->view('footer');
	}
	
	public function sitemap()
    {
		$title['title'] = 'sitemap';
		$this->load->view('menu', $title);
		$this->load->view('sitemap');
		$this->load->view('footer');
	}

	public function admin()
    {
        if ($this->session->userdata("sports_id") == 9) {   // tagan ligipääsu lehele ainult adminil
            $title['title'] = 'treeneriteks tegemine';
            $this->load->view('menu', $title);
            $this->load->view('treeneriteHaldamine');
            $this->load->view('footer');
        }
    }
}


