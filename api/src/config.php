<?php

	try {
		$db_name = getenv('DB_NAME');
		$db_host = getenv('DB_HOSTNAME');
		$db_user = getenv('DB_ADMIN');
		$db_passwd = getenv('DB_ADMIN_PASSWD');

		$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

		$db = new PDO($dsn, $db_user, $db_passwd, [
		  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]);
		} catch (PDOException $error) {
			die("Database connection failed " . $error->getMessage());
	}

?>
