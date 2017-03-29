<?php

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->model('sportlaste_model');

        $data = array(
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass'),
        );

        $result = $this -> sportlaste_model -> get_account_password($data['username']);
        echo $result;
        $password = $result[0]->parool;


        if (password_verify($data["password"], $password))
        {
            // Sisselogimine õnnestus
            redirect("welcome");
        }
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


        $test_array = array (
            $outcome => 'outcome'
        );

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($test_array, array ($xml, 'addChild'));
        echo $xml->asXML();
    }
}
