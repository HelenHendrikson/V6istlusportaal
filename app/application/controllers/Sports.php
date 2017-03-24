<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sports extends CI_Controller
{

    public function archery()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(1);
        $title['title'] = $this->lang->line('vibu');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function swimming()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(2);
        $title['title'] = $this->lang->line('ujumine');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function tennis()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(3);
        $title['title'] = $this->lang->line('tennis');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function weightlifting()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(4);
        $title['title'] = $this->lang->line('tõstmine');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function fencing()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(5);
        $title['title'] = $this->lang->line('vehklemine');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function rhythmic_gymnastics()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(6);
        $title['title'] = $this->lang->line('iluvõimlemine');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function sport_of_athletics()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(7);
        $title['title'] = $this->lang->line('kergejõustik');

        $this->load->view('menu', $title);
        $this->load->view('treenerRegabSportlastvaade', $data);
        $this->load->view('footer');
    }

    public function cycling()
    {
        $this->load->model('sportlaste_model');

        $data['voistlused'] = $this->sportlaste_model->get_competitions(8);
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
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data));
    }
}