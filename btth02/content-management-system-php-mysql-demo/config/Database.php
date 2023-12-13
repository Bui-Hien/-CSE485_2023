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
            $this->connection = new \PDO($dsn, $this->user, $this->pass);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // Xử lý lỗi kết nối theo nhu cầu của bạn, ví dụ:
            // Ghi log lỗi
            error_log("Database Connection Error: " . $e->getMessage());
            // Hoặc ném ngoại lệ để xử lý ở nơi sử dụng lớp Database
            throw new \Exception("Database Connection Error");
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}


?>