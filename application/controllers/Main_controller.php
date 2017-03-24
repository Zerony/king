<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	public function index()
	{
		$data = array(
               'name' => $this->session->userdata('login'), 
			   'publickey' => get_public_key()
        );
		$this->load->view('header', $data);
		$this->load->view('main_page', $data);
		$this->load->view('footer');
	}
	
	public function auth_user()
  	{
		auth_user($this, $this->config->base_url());
  	}
	
	public function register_user()
  	{

		 $privatekey = get_private_key ();
		 $resp = recaptcha_check_answer ($privatekey,
										$_SERVER["REMOTE_ADDR"],
										$_POST["recaptcha_challenge_field"],
										$_POST["recaptcha_response_field"]);
		
		if (!$resp->is_valid) {
			// What happens when the CAPTCHA was entered incorrectly
			echo $this->label->get('wrong_captcha');
			return;
		} 
		
		
		$this->load->model('Usermodel');
		$user_info = array(
			'name' => trim($_POST['name']),
    		'pass' => trim($_POST['pass']),
			'phone' => trim($_POST['phone']),
			'email' => trim($_POST['email']),
		); 
		try {
			$this->Usermodel->register($user_info);
			$ses_data = array(
                'Name' => trim($_POST['name']),
				'Email' => trim($_POST['email']),
				'Role' => 'User',
				'Phone' => trim($_POST['phone'])
            );
			$this->create_session($ses_data);
		} catch (Exception $e) {
			echo "".$e->getMessage();
			return;
		}
		echo 1;
		return;
						
	}
	
	public function create_session($user_record){
		create_session($user_record, $this);
	}

	public function ajax_logout()
    {
		logout($this, $_POST['logout']);
    }
}
