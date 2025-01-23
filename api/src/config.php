<?php

require_once "./database.php";

$db = new Database();

if ($argc == 2 && $argv[1] == "initdb") {
	$db->connect();
	$db->init();
	die("Database initiliazed\n");
}

$db->connect();

require_once "./post/post.controller.php";

?>
