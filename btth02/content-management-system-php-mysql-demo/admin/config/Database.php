<?php

namespace conn;
class Database
{
    private $host = 'mariadb';
    private $port = '3306';
    private $db = 'phpzag_demo';
    private $user = 'root';
    private $pass = 'your_password';
    private $connection = null;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db}";
        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

?>