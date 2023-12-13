<?php

namespace conn;

class conn
{
    private $host = 'mariadb';
    private $port = "3306";
    private $db = 'BTTH01_CSE485_ex.sql';
    private $user = 'root';
    private $pass = 'your_password';
    private $charset = 'utf8mb4';
    private $dsn = null;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db};charset={$this->charset}";
        try {
            $this->dsn = new PDO($dsn, $this->user, $this->pass, $this->options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

