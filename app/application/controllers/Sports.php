<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sports extends CI_Controller
{

    public function archery($voistluse_id = null)
    {
        $this->load->model('sportlaste_model');

        if ($voistluse_id != null) {
            $data['voistluse_info'] = $this->sportlaste_model->get_competition_info($voistluse_id);
            $data['võistlejad'] = $this -> sportlaste_model -> get_competition_competitors($voistluse_id);
            $data['count'] = $this -> sportlaste_model -> get_competition_competitors_count($voistluse_id);
        }
        $data['voistlused'] = $this->sportlaste_model->get_competitions(1);
        $data['id'] = 1;
        $title['title'] = $this->lang->line('vibu');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function swimming()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(2);
        $data['id'] = 2;
        $title['title'] = $this->lang->line('ujumine');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function tennis()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(3);
        $data['id'] = 3;
        $title['title'] = $this->lang->line('tennis');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function weightlifting()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(4);
        $data['id'] = 4;
        $title['title'] = $this->lang->line('tõstmine');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function fencing()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(5);
        $data['id'] = 5;
        $title['title'] = $this->lang->line('vehklemine');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function rhythmic_gymnastics()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(6);
        $data['id'] = 6;
        $title['title'] = $this->lang->line('iluvõimlemine');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function sport_of_athletics()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(7);
        $data['id'] = 7;
        $title['title'] = $this->lang->line('kergejõustik');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function cycling()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(8);
        $data['id'] = 8;
        $title['title'] = $this->lang->line('rattasõit');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');

    }


    public function saa_voistluse_info($voistluse_id) {
        $this->load->model('sportlaste_model');

        $this->data['voistluse_info'] = $this->sportlaste_model->get_competition_info($voistluse_id);
        $this->data['võistlejad'] = $this -> sportlaste_model -> get_competition_competitors($voistluse_id);
        $this->data['count'] = $this -> sportlaste_model -> get_competition_competitors_count($voistluse_id);
        $alaID = $this -> sportlaste_model -> get_sports_id($voistluse_id);
        if ($alaID[0]["spordiala_id"] == $this->session->userdata("sports_id")) {
            $this->data['alatreener'] = true;
        } else {
            $this->data['alatreener'] = false;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data));
    }
}