<?php

namespace services;

use conn\User;
use database\Database;
use models\Users;

require_once APP_ROOT . '/baitap02/models/Users.php';
require_once APP_ROOT . '/baitap02/config/Database.php';
class UsersService
{
    public function getUsers($offset)
    {
        $database = new Database();
        $conn = $database->getConnect();

        if ($conn !== null) {
            try {
                $sql = "SELECT * FROM users LIMIT 10 OFFSET :offset;";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
                $stmt->execute();

                $uers = [];
                while (($row = $stmt->fetch())) {
                    $user = new Users();
                    $user->setId($row['id']);
                    $user->setName($row['name']);
                    $user->setEmail($row['email']);
                    $uers[] = $user;
                }
                return $uers;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return [];
            }
        } else {
            error_log("Database connection failed.");
            return [];
        }
    }


    public function getUser(Users $user)
    {
        $database = new Database();
        $conn = $database->getConnect();

        if ($conn !== null) {
            try {
                $sql = "SELECT * FROM user where id=:id";
                $stmt = $conn->prepare($sql);
                $id = $user->getId();
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->fetch();
                $user = new Users();
                $user->setId($result['id']);
                $user->setName($result['name']);
                $user->setEmail($result['email']);
                return $user;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return [];
            }
        } else {
            error_log("Database connection failed.");
            return [];
        }
    }


    public function getRowUser()
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "SELECT * FROM `users` WHERE 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return ceil($stmt->rowCount() / 10);
        } else {
            return $row = 0;
        }
    }

    public function save(Users $user)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            try {
                $sql = "INSERT INTO `users`(`id`, `name`, `email`) VALUES (:id,:name,:email)";
                $stmt = $conn->prepare($sql);

                $id = $user->getId();
                $name = $user->getName();
                $email = $user->getEmail();


                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                return $stmt->rowCount() > 0 ? true : false;
            } catch (\PDOException $exception) {
            }
        } else {
            return false;
        }
    }

    public function updateUser(Users $user)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $currentDate = date('Y-m-d');

            $sql = "UPDATE `users` SET `id`=:idUser,`name`=:nameUser, `updated_at`=:updated_at WHERE `id`=:id";
            $stmt = $conn->prepare($sql);
            $id = $user->getId();
            $stmt->bindParam(':idUser', $id);
            $name = $user->getname();
            $stmt->bindParam(':nameUser', $name);
            $email = $user->getEmail();
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':updated_at', $currentDate);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }

    public function deleteUser(Users $user)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "DELETE FROM `users` WHERE id= :id;";
            $stmt = $conn->prepare($sql);
            $id = $user->getId();
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }
}