<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gotadmin extends CI_Controller
{

    public function index()
    {
        is_access();
        $this->load->model('Gamemodel');
        $this->Gamemodel->getAllGames();
        $data = array(
            'name' => $this->session->userdata('login'),
            'games' => $this->Gamemodel->getAllGames(),
        );

        $this->load->view('admin_header', $data);
        $this->load->view('gotadminallgames');
        $this->load->view('admin_footer');

    }

    public function creategame()
    {
        is_access();
        $this->load->model('Gamemodel');
        $data = array(
            'name' => $this->session->userdata('login'),
            'familys' => $this->Gamemodel->getAllFamillyNames()
        );
        $this->load->view('admin_header', $data);
        $this->load->view('gotadminmodify');
        $this->load->view('admin_footer');
    }

    public function seeusers()
    {
        is_access();
        $this->load->model('Usermodel');
        $allUsers = $this->Usermodel->getAllUsers();
        $data = array(
            'name' => $this->session->userdata('login'),
            'allUsers' => $allUsers,
        );

        $this->load->view('admin_header', $data);
        $this->load->view('allUsers');
        $this->load->view('admin_footer');
    }

    public function editgame($gameid)
    {
        is_access();
        $this->load->model('Gamemodel');
        $data = array(
            'name' => $this->session->userdata('login'),
            'familys' => $this->Gamemodel->getAllFamillyNames(),
            'gameid' => $gameid,
			'gamedata' => $this->Gamemodel->getGame($gameid)
        );
		$this->load->view('admin_header', $data);
		$this->load->view('gotadminmodify', $data);
		$this->load->view('admin_footer');
	}

    public function searchuser()
    {
        is_access();
        $user_model = $this->load->model('Usermodel');
        $users = $this->Usermodel->search_user($_GET["q"]);
        $json_response = json_encode($users);
        echo $json_response;
    }

    public function savegame()
    {
        is_access();
        $familys = $this->getasarray('family');
        $users = $this->getasarray('user');
        $totalpoints = $this->getasarray('totalpoints');
        $places = $this->getasarray('place');
        array_unique($places);
        if (count(array_unique($places)) != count($places)) {
            echo $this->label->get('wrong_places');
            return;
        }
        $users_in_game = array();
        for ($i = 0; $i < TOTAL_GOT_USERS; $i++) {
            $itemuser = Useringame::create($users[$i], $familys[$i], $places[$i], $totalpoints[$i]);
            $users_in_game[] = $itemuser;
        }

        $this->load->model('Gamemodel');
        $createdgame = $this->Gamemodel->creategame($_POST['date'], $_POST['name'], $_POST['description'], $users_in_game);
        echo json_encode($createdgame);

    }

    private function getasarray($key)
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