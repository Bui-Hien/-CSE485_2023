<?php

namespace services;

use conn\Database;
require_once APP_ROOT .'/wamp64/www/CSE/-CSE485_2023/btth03/baitap02/config/Database.php';
class LessonsService
{
    public function __construct(){
        $database = new Database();
        $connect = $database->getConnect();
    }

    public function getAllStudents(){
        
    }
}