<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('login');
    }

    public function auth_user()
    {
        auth_user($this, $this->config->base_url());
        return;
    }

    public function create_session($user_record){
        create_session($user_record, $this);
    }
}
