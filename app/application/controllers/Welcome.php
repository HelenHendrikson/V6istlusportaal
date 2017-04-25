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

        if (array_key_exists('usernames', $_POST)) {
            $users = $_POST['usernames'];           //these are the users, that the coach selected before clicking "submit"
        //print_r($users);
        }

        $keyword = array('data' => $this->input->post('keyword'));

        if ($keyword["data"] != "") {
            $cleaned = $this->security->xss_clean($keyword);
            if ($cleaned != $keyword) {
                redirect("welcome");
            }
            $results['results'] = $this->sportlaste_model->search($keyword["data"]);
            $results['sportsmen'] = $this->sportlaste_model->get_sportsmen($this->session->userdata("user_id"));
            $_SESSION['results'] = $results;
            //print_r($_SESSION['results']);

            $data['worked'] = array();

            foreach ($results['results'] as $result) {
                $found = false;
                foreach ($results['sportsmen'] as $sportsman) {
                    if ($result->id == $sportsman->sportlase_id) {
                        $found = true;
                        break;
                    }
                }
                if ($found){
                    array_push($data['worked'], array($result->id, $result->kasutajanimi, 1));
                } else {
                    array_push($data['worked'], array($result->id, $result->kasutajanimi, 0));
                }
            }
            //print_r($data);


            $title['title'] = $this->lang->line('voistlused');
            $this->load->view('menu', $title);
            $this->load->view('searchPage', $data);
        }
        else {
            if (!empty($users)){
                echo $this->session->userdata("user_id");
                unset($_SESSION['results']);
            }
            $title['title'] = 'VRL - searchPage';
            $this->load->view('menu', $title);
            $this->load->view('searchPage');
            $this->load->view('footer');
        }
	}
	
	public function annetused(){
		$title['title'] = 'annetused';
		$this->load->view('menu', $title);
		$this->load->view('annetused');
		$this->load->view('footer');
	}
	
	public function makseKatkestatud(){
		$title['title'] = 'makseKatkestatud';
		$this->load->view('menu', $title);
		$this->load->view('makseKatkestatud');
		$this->load->view('footer');
	}
	
	public function receive(){
		$title['title'] = 'receive';
		$this->load->view('menu', $title);
		$this->load->view('receive');
		$this->load->view('footer');
	}
	
	public function sitemap(){
		$title['title'] = 'sitemap';
		$this->load->view('menu', $title);
		$this->load->view('sitemap');
		$this->load->view('footer');
	}

}
