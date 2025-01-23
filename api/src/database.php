<?php

/**
 * Class representing the database
 * @method connect
 * @method init
 * @method execute_query
 * */
class Database {
	private string $host;
	private string $name;
	private string $user;
	private string $passwd;
	public PDO $con;

	public function __construct() {
		$this->host = getenv("DB_HOSTNAME");
		$this->name = getenv("DB_NAME");
		$this->user = getenv("DB_ADMIN");
		$this->passwd = getenv("DB_ADMIN_PASSWD");
	}

	/**
	 * Connect to the database
	 * */
	public function connect(): void {
		$dsn = "mysql:host=$this->host;dbname=$this->name;charset=utf8mb4";

		try {
			$this->con = new PDO($dsn, $this->user, $this->passwd, [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			]);
		} catch (PDOException $error) {
			die("Database connection failed " . $error->getMessage() . "\n");
		}
	}
	
	/**
	 * Initiliaze the database with sql script
	 * */
	public function init(): void {
		$script = file_get_contents("./init.sql");

		$this->connect();
		try {
			$this->con->exec($script);
		} catch (PDOException $error) {
			die("Database initilization error " . $error->getMessage() . "\n");
		}
	}

    /**
	 * Execute given query with parameters and return the result
     * @param string $query the query to be executed
     * @param array $args arguments for the query
     * @param boolean $one indicate if the function should fetch only one rows
     * @return array array of returned rows
     */
    public function execute_query($query, $args, $one=true): array {
		try {
			$sth = $this->con->prepare($query);

			$sth->execute($args);
			if ($one) {
				return [$sth->fetch()];
			} else {
				return $sth->fetchAll();
			}
		} catch (PDOException $error) {
			throw $error;
		}
	}
}

?>
