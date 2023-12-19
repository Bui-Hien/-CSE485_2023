<?php

namespace services;

use conn\User;
use database\Database;
use models\Quizzes;

require_once APP_ROOT . '/baitap02/models/Users.php';
require_once APP_ROOT . '/baitap02/config/Database.php';
class UsersService
{
    public function getQuizzes($offset)
    {
        $database = new Database();
        $conn = $database->getConnect();

        if ($conn !== null) {
            try {
                $sql = "SELECT * FROM us LIMIT 10 OFFSET :offset;";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
                $stmt->execute();

                $uers = [];
                while (($row = $stmt->fetch())) {
                    $user = new Quizzes();
                    $user->setId($row['id']);
                    $user->setLessonId($row['lesson_id']);
                    $user->setTitle($row['title']);
                    $user->setCreatedAt($row['created_at']);
                    $user->setUpdatedAt($row['updated_at']);
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


    public function getQuizze(User $user)
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
                $quizze = new Quizzes();
                $quizze->setId($result['id']);
                $quizze->setLessonId($result['lesson_id']);
                $quizze->setTitle($result['title']);
                $quizze->setCreatedAt($result['created_at']);
                $quizze->setUpdatedAt($result['updated_at']);
                return $quizze;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return [];
            }
        } else {
            error_log("Database connection failed.");
            return [];
        }
    }


    public function getRowQuizzes()
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "SELECT * FROM `quizzes` WHERE 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return ceil($stmt->rowCount() / 10);
        } else {
            return $row = 0;
        }
    }

    public function save(Quizzes $quizze)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            try {
                $sql = "INSERT INTO `quizzes`(`id`, `lesson_id`, `title`, `created_at`, `updated_at`) VALUES (:id,:lesson_id,:title, :created_at, :updated_at)";
                $stmt = $conn->prepare($sql);

                $id = $quizze->getId();
                $lessonId = $quizze->getLessonId();
                $title = $quizze->getTitle();
                $createdAt = $quizze->getCreatedAt();
                $updatedAt = $quizze->getUpdatedAt();

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':lesson_id', $lessonId);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':created_at', $createdAt);
                $stmt->bindParam(':updated_at', $updatedAt);
                $stmt->execute();
                return $stmt->rowCount() > 0 ? true : false;
            } catch (\PDOException $exception) {
            }
        } else {
            return false;
        }
    }

    public function updateQuizzes(Quizzes $quizze)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $currentDate = date('Y-m-d');

            $sql = "UPDATE `users` SET `userid`=:lesson_id,`title`=:title, `updated_at`=:updated_at WHERE `id`=:id";
            $stmt = $conn->prepare($sql);
            $id = $quizze->getId();
            $stmt->bindParam(':id', $id);
            $lessonId = $quizze->getLessonId();
            $stmt->bindParam(':lesson_id', $lessonId);
            $title = $quizze->getTitle();
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':updated_at', $currentDate);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }
}