<?php

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->model('sportlaste_model');

        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );

        $query_result = $this -> sportlaste_model -> get_account_data($data['username']);
        $count = $query_result->num_rows();
        $row = $query_result->row();

        if ($count == 0) {              // sellenimelist kasutajanime ei leidu
            $result = "no account";
        } else {
            $password = $row->parool;
            if (password_verify($data["password"], $password))
            {
                $session_data = array(
                    "user_id" => $row->id,
                    "sports_id" => $row->spordiala_id
                );
                $this->session->set_userdata($session_data);
                $result = "success";
            } else {
                $result = "failure";
            }
        }

        $result_array = array (
            $result => 'outcome'
        );

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($result_array, array ($xml, 'addChild'));
        echo $xml->asXML();
    }


    public function registration()
    {
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'security'));

        $data = array(
            'kasutajanimi' => $this->input->post('username'),
            'eesnimi' => $this->input->post('firstname'),
            'perenimi' => $this->input->post('lastname'),
            'meil' => $this->input->post('meil'),
            'parool' => $this->input->post('password')
        );

        if ($this->usernameAvilable($data["kasutajanimi"])) {
            //teen xss tõrje
            $cleaned = $this->security->xss_clean($data);
            if ($cleaned == $data) {
                //kontrollin vormi sobivust ka serveris
                $this->form_validation->set_rules('username', 'Username', array('required', 'min_length[3]', 'max_length[30]'));
                $this->form_validation->set_rules('firstname', 'Name', array('required', 'min_length[2]', "max_length[30]"));
                $this->form_validation->set_rules('lastname', 'Last name', array('required', 'min_length[2]', "max_length[30]"));
                $this->form_validation->set_rules('meil', 'Mail', array('required', 'valid_email', "max_length[30]"));
                $this->form_validation->set_rules('password', 'Password', array('required', "min_length[6]", "max_length[256]"));

                if ($this->form_validation->run()) {
                    $this->load->model('sportlaste_model');

                    // räsistan parooli
                    $data["parool"] = password_hash($data["parool"], PASSWORD_BCRYPT);
                    $this->sportlaste_model->form_insert($data);
                    $outcome = "success";
                } else {
                    $outcome = "failed";
                }
            } else {
                $outcome = "xss problem";
            }
        } else {
            $outcome = "username in use";
        }


        $result_array = array (
            $outcome => 'outcome'
        );

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($result_array, array ($xml, 'addChild'));
        echo $xml->asXML();
    }

    private function usernameAvilable($username) {
        $this->load->model('sportlaste_model');

        $query_result = $this -> sportlaste_model -> get_account_availability($username);
        $count = count($query_result);
        if ($count == 0) {              // sellenimelist kasutajanime ei leidu
            return true;
        } else {
            return false;
        }
    }
}
