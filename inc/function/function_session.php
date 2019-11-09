<?php 

	function set_session($session_name,$session_value){
		return $_SESSION[$session_name] = $session_value;
	}

	function get_session($session_name){
		return $_SESSION[$session_name];
	}

	
	

 ?>