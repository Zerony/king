<?
	function is_access($context) {
		if (!isset($_SESSION['role']) || $_SESSION['role'] != ADMIN) {
			$context->load->view('access_forbidden');
			return false;
		}
		return true;
	}
?>