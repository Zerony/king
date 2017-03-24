<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
               'name' => $this->session->userdata('login'), 
			   'publickey' => get_public_key()
        );
		$this->load->view('header', $data);
		$this->load->view('main_page', $data);
		$this->load->view('footer');
		$hash = password_hash("Grenada12", PASSWORD_DEFAULT);
		//echo "*".$hash."*";
	}
	
	public function auth_user()
  	{
		$user_model = $this->load->model('Usermodel');
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$is_authorized = $this->Usermodel->authorization($username, $password);
		
		if ($is_authorized) {
			$this->create_session($is_authorized);
			echo 1;
			return; 
		} 
		echo $this->label->get('wrong_pass');
		return; 
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
		
		
		$user_model = $this->load->model('Usermodel');
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
		$ses_data = array(
                'login' => $user_record['name'],
				'email' => $user_record['email'],
				'role' => $user_record['role'],
				'phone' => $user_record['phone']
            );

        $this->session->set_userdata($ses_data);
	}
	
	
	
	public function ajax_logout()
    {
        $logout = $_POST['logout'];

        if($logout) {
			session_destroy();
            //$this->session->unset_userdata('login');
        }
    }
}
