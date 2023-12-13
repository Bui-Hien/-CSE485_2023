<?php

namespace conn;
class Articles
{

    private $postTable = 'cms_posts';
    private $categoryTable = 'cms_category';
    private $userTable = 'cms_user';
    private $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database;
    }

    public function getArticles()
    {
        $query = '';
        if ($this->id) {
            $query = " AND p.id = :id"; // Sử dụng prepared statement để tránh SQL injection
        }

        $sqlQuery = "
        SELECT p.id, p.title, p.message, p.category_id, u.first_name, u.last_name, p.status, p.created, p.updated, c.name as category
        FROM " . $this->postTable . " p
        LEFT JOIN " . $this->categoryTable . " c ON c.id = p.category_id
        LEFT JOIN " . $this->userTable . " u ON u.id = p.userid
        WHERE p.status ='published' $query ORDER BY p.id DESC";

        $stmt = $this->conn->getConnection()->prepare($sqlQuery);

        if ($this->id) {
            $stmt->bindParam(':id', $this->id); // Bind giá trị của $this->id vào prepared statement
        }

        $stmt->execute();
        $result = $stmt->fetchAll(); // Lấy tất cả các hàng kết quả

        return $result;
    }


    function formatMessage($string, $wordsreturned)
    {
        $retval = $string;  //  Just in case of a problem
        $array = explode(" ", $string);
        /*  Already short enough, return the whole thing*/
        if (count($array) <= $wordsreturned) {
            $retval = $string;
        } /*  Need to chop of some words*/
        else {
            array_splice($array, $wordsreturned);
            $retval = implode(" ", $array) . " ...";
        }
        return $retval;
    }

    public function totalPost()
    {
        $sqlQuery = "SELECT * FROM " . $this->postTable;
        $stmt = $this->conn->getConnection()->prepare($sqlQuery);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}

?>