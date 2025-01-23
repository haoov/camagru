<?php

require_once "../config.php";

class userModel {
	private PDO $db;

	function __construct($db) {
		$this->db = $db;
	}

	function getUserById($id) {
	}
}

?>
