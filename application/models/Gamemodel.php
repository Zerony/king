<?php
class Gamemodel extends CI_Model 
{
	public function __construct ()
	{
    	parent::__construct ();

   	}
	
	public function get_all_games ()
	{
		$query = "SELECT g.id, g.name, g.createddate, gp.family, gp.totalpoints, gp.id as gpid, gp.userid, u.name as username
					FROM Game as g
					INNER JOIN GamePlayer as gp ON g.id = gp.gameid
					INNER JOIN User as u ON u.id = gp.userid
					Where gp.place =1
					ORDER BY g.createddate DESC ";
					
		$res = $this->db->query($query);
		$game_data = $res->result();
		if (count($game_data) == 0) 
		{
			return false;
		}

		return $game_data; 
	}
	
	public function get_game ($gameid)
	{
		$query = "SELECT g.id, g.name, g.createddate, g.description, gp.family, gp.totalpoints,gp.place, gp.userid, u.name as username
					FROM Game as g
					INNER JOIN GamePlayer as gp ON g.id = gp.gameid
					INNER JOIN User as u ON u.id = gp.userid
					WHERE g.id=? ";
		$data = array($gameid); 
		$res = $this->db->query($query, $data);
		$game_data = $res->result_array();
		if (count($game_data) == 0) 
		{
			return false;
		}
		
		return $game_data; 
	}
	
	public function get_all_familly_names ()
	{
		$familys = 	array('Baratheon', 'Greyjoy', 'Lannsiter', 'Martell', 'Stark', 'Tyrell'); 
		return $familys; 
	}
	
	public function create_game($date, $name, $description, $users_in_game)
	{
		$data = array(
        'CreatedDate' => $date,
        'Name' => $name,
        'Description' => $description
		);
				
		$res = $this->db->insert('Game', $data);
			
		$game_id = $this->db->insert_id();
		foreach($users_in_game as $value) {
			$value->GameId = $game_id;
		}
		$this->db->insert_batch('GamePlayer', $users_in_game);
		return $game_id; 
	}
}
?>