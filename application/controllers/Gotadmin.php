<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gotadmin extends CI_Controller
{

    public function index()
    {
        if (!is_access($this)) {
            return;
        }
        $this->load->model('Gamemodel');
        $data = array(
            'name' => $this->session->userdata('login'),
            'games' => $this->Gamemodel->get_all_games(),
        );

        $this->load->view('admin_header', $data);
        $this->load->view('got_admin_all_games');
        $this->load->view('admin_footer');

    }

    public function createGame()
    {
        if (!is_access($this)) {
            return;
        }
        $this->load->model('Gamemodel');
        $data = array(
            'name' => $this->session->userdata('login'),
            'familys' => $this->Gamemodel->get_all_familly_names()
        );
        $this->load->view('admin_header', $data);
        $this->load->view('got_admin_modify');
        $this->load->view('admin_footer');
    }

    public function users()
    {
        if (!is_access($this)) {
            return;
        }
        $this->load->model('Usermodel');
        $allUsers = $this->Usermodel->get_all_users();
        $data = array(
            'name' => $this->session->userdata('login'),
            'allUsers' => $allUsers,
        );

        $this->load->view('admin_header', $data);
        $this->load->view('all_users');
        $this->load->view('admin_footer');
    }

    public function editgame($gameid)
    {
        if (!is_access($this)) {
            return;
        }
        $this->load->model('Gamemodel');
        $data = array(
            'name' => $this->session->userdata('login'),
            'familys' => $this->Gamemodel->get_all_familly_names(),
            'gameid' => $gameid,
			'gamedata' => $this->Gamemodel->get_game($gameid)
        );
		$this->load->view('admin_header', $data);
		$this->load->view('got_admin_modify', $data);
		$this->load->view('admin_footer');
	}

    public function searchUser()
    {
        if (!is_access($this)) {
            return;
        }
        $this->load->model('Usermodel');
        $users = $this->Usermodel->search_user($_GET["q"]);
        $json_response = json_encode($users);
        echo $json_response;
    }

    public function saveGame()
    {
        if (!is_access($this)) {
            return;
        }
        try {
            $users_in_game = $this->prepare_game_data();
        } catch (Exception $e) {
            echo $e->getMessage();
            return;
        }
        $this->load->model('Gamemodel');
        $created_game_id = $this->Gamemodel->create_game($_POST['date'], $_POST['name'], $_POST['description'], $users_in_game);

        $data = array(
            'game_id' => $created_game_id,
            'redirect_to' => $this->config->base_url()."Gotadmin"
        );
        $this->load->view('game_created', $data);

    }

    public function logout() {
        logout($this, true);
    }

    private function prepare_game_data() {
        $familys = $this->get_as_array('family');
        $users = $this->get_as_array('user');
        $total_points = $this->get_as_array('totalpoints');
        $places = $this->get_as_array('place');
        array_unique($places);
        if (count(array_unique($places)) != count($places)) {
            throw new Exception($this->label->get('wrong_places'));
        }
        $users_in_game = array();
        for ($i = 0; $i < TOTAL_GOT_USERS; $i++) {
            $item_user = Useringame::create($users[$i], $familys[$i], $places[$i], $total_points[$i]);
            $users_in_game[] = $item_user;
        }
        return $users_in_game;
    }

    private function get_as_array($key)
    {
        $result = array();
        for ($i = 0; $i < TOTAL_GOT_USERS; $i++) {
            if (isset($_POST[$key . $i]))
                $result[] = $_POST[$key . $i];
        }
        return $result;
    }
}

?>