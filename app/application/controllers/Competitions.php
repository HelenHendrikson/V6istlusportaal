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
        }
    }
}