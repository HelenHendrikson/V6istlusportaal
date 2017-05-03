<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Competitions extends CI_Controller
{

    public function __construct() {
        parent::__construct();
    }


    function new_comp() {
        $this->load->model('sportlaste_model');
        $this->load->helper(array('url', 'security'));

        $data = array(
            'name' => $this->input->post('name'),
            'date' => $this->input->post('date'),
            'distance' => $this->input->post('distance'),
            'sports_id' => $this->input->post('sports_id'),
        );

        $cleaned = $this->security->xss_clean($data);
        if ($cleaned == $data) {
            $this->sportlaste_model->add_competition($data);

            $this->result = "ok";
            $this->output->set_content_type('application/json')->set_output(json_encode($this->result));
        } else {
            $this->result = "fail";
            $this->output->set_content_type('application/json')->set_output(json_encode($this->result));
        }
    }

    function comp_info_for_trainer() {
        $this->load->model('sportlaste_model');

        $voistluse_id = $this->input->post('voistlus');

        $this->data['trainer_sportsmen'] = $this->sportlaste_model->get_trainer_sportsmen_with_names($this->session->userdata("user_id"));
        $this->data['registered_sportsmen'] = $this->sportlaste_model->get_competition_competitors_Id($voistluse_id);

        $this->output->set_content_type('application/json')->set_output(json_encode($this->data));
    }

    public function eemalda_voistlus($voistluse_id)
    {
        $this->load->model('sportlaste_model');
        $this->sportlaste_model->remove_competition($voistluse_id);
        $this->output->set_content_type('application/json')->set_output(json_encode(1));    //lihtsalt tagastan midagi et anda märku, et minu tegevus on lõppenud
    }
}
