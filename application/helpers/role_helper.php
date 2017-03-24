<?
	function is_access() {
		if (!isset($_SESSION['role']) || $_SESSION['role'] != ADMIN) {
			exit ('No access to page');	
		}
	}
?>