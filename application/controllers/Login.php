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
        auth_user($this);
//        $this->load->model('Usermodel');
//        $username = trim($_POST['username']);
//        $password = trim($_POST['password']);
//        $is_authorized = $this->Usermodel->authorization($username, $password);
//
//        if ($is_authorized) {
//            $this->create_session($is_authorized);
//            echo 1;
//            return;
//        }
//        echo $this->label->get('wrong_pass');
        return;
    }

    public function create_session($user_record){
        create_session($user_record, $this);
//        $ses_data = array(
//            'login' => $user_record['name'],
//            'email' => $user_record['email'],
//            'role' => $user_record['role'],
//            'phone' => $user_record['phone']
//        );
//
//        $this->session->set_userdata($ses_data);
    }
}
