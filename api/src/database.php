<?php

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
     * @param string $query
     * @param array $args
     * @param boolean $one
     * @return array
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
