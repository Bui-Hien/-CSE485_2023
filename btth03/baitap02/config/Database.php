<?php

namespace database;


use PDO;
use PDOException;

class Database
{
    private $host = DB_HOST;
    private $port = DB_PORT;
    private $dbname = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname}", $this->username, $this->password);
        } catch (PDOException $e) {
            $this->conn = null;
        }
    }

    public function getConnect()
    {
        return $this->conn;
    }
}

?>