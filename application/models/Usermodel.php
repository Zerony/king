<?php
class Usermodel extends CI_Model {
	public function __construct (){
    	parent::__construct ();

   	}
	
	function get_all_users() {
		$qGetAll = "SELECT id, name, photo FROM user";
		$res = $this->db->query($qGetAll);
		$userData = $res->result_array();
		if (count($userData) == 0) {
			return false;
		}
		return $userData;
	}
	
	function search_user($username) {
		$query = "SELECT id, name FROM user where name Like N?";
		$res = $this->db->query($query, array('%'.$username.'%'));
		$userData = $res->result();
		if (count($userData) == 0) {
			return false;
		}
		foreach ($userData as $row)
		{
				$row->id = intval($row->id);
				//echo $row->body;
		}
		return $userData;
	}
	
	function authorization($name, $pass) {
		$query = "SELECT id, name, pass, role, email, phone FROM user WHERE name = N?";
		
		$res = $this->db->query($query, array($name));
		$userData = $res->result_array();
		if (count($userData) == 0) {
			return false;
		}
		$user_record = $userData[0];
		$hash = password_hash($pass, PASSWORD_DEFAULT);
		if (password_verify($pass, $user_record['pass'])) {
			return $user_record;
		}
		return false;
	}
	
	function register ($userinfo) {
		if (empty ($userinfo['name'])) {
			throw new UsermodelException ($this->label->get('epmty_name'));	
		}
		if (empty ($userinfo['phone'])) {
			throw new UsermodelException ($this->label->get('epmty_phone'));	
		}
		if (empty ($userinfo['email'])) {
			throw new UsermodelException ($this->label->get('epmty_email'));	
		}
		if (empty ($userinfo['pass'])) {
			throw new UsermodelException ($this->label->get('epmty_pass'));	
		}
		
		if (strlen($userinfo['name'])<3) {
			throw new UsermodelException ($this->label->get('short_login'));	
		}
		if (strlen($userinfo['phone'])<TOTAL_GOT_USERS) {
			throw new UsermodelException ($this->label->get('short_phone'));	
		}
		if (strlen($userinfo['email'])<TOTAL_GOT_USERS) {
			throw new UsermodelException ($this->label->get('short_email'));	
		}
		if (strlen($userinfo['pass'])<TOTAL_GOT_USERS) {
			throw new UsermodelException ($this->label->get('short_pass'));	
		}
		$query_for_duplicate = "SELECT 
								IF( COUNT( id ) =1,
											TRUE , 
											FALSE ) AS duplicate 
								FROM  user
								WHERE Name = N?
								";
								
		$res = $this->db->query($query_for_duplicate, array($userinfo['name']));
		$userData = $res->row(0);;
		if ($userData->duplicate) {
			throw new UsermodelException ($this->label->get('busy_name'));	
		}
		$query_to_insert = "INSERT INTO `User` (
			`Name` ,
			`Pass` ,
			`Phone`,
			`Email`
		)
		VALUES (
			N?, 
			N?,  
			N?,
			?
		);";
		$res = $this->db->query($query_to_insert, array(
			$userinfo['name'], 
			password_hash($userinfo['pass'], PASSWORD_DEFAULT), 
			$userinfo['phone'],
			$userinfo['email']
			));

		echo password_hash($userinfo['pass'], PASSWORD_DEFAULT);
		return $res; 
	}
}

class UsermodelException extends Exception
{
    // Переопределим исключение так, что параметр message станет обязательным
    public function __construct($message, $code = 0, Exception $previous = null) {
        // некоторый код 
    
        // убедитесь, что все передаваемые параметры верны
        parent::__construct($message, $code, $previous);
    }

    // Переопределим строковое представление объекта.
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "Мы можем определять новые методы в наследуемом классе\n";
    }
}
?>