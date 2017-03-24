<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Useringame {
	public $UserId; 
	public $Family;
	public $Place;
	public $TotalPoints;
	public $GameId; 
	function __construct() {

    }
	
	static function create($userId, $family, $place, $points)
    {
        $instance = new self();
		$instance->UserId = $userId;
		$instance->Family = $family;
		$instance->Place = $place;
		$instance->TotalPoints = $points;
        return $instance;
    }
}

