<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Label {
	private $values; 
	public function __construct (){
    	$this->values = array(
			'wrong_pass' => 'Ви ввели неправильний пароль', 
			
			'epmty_name' => 'Ім\'я не може бути пустим',
			'epmty_phone' => 'Телефон не може бути пустим',	
			'epmty_email' => 'Email не може бути пустим',
			'epmty_pass' => 'Пароль не можу бути пустим',
			'short_login' => 'Ви ввели надто кородкий логін',
			'short_phone' => 'Телефон надто кородкий',
			'short_email' => 'Email надто короткий',
			'short_pass' => 'Пароль надто короткий',
			'busy_name' => 'Користувач з таким іменем вже зареєстрований',
			'wrong_captcha' => 'Код не вірний',
			'wrong_places' => 'Wrong places!!!'
			);
   	}
	
    public function get($name)
    {
		if (array_key_exists ($name, $this->values)) {
			return $this->values[$name];
		}
		return $name;
    }
}

?>