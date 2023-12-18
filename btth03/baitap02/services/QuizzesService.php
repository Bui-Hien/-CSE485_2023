<?php

namespace services;

use database\Database;
use models\Quizzes;

require_once APP_ROOT . '/baitap02/models/Quizzes.php';
require_once APP_ROOT . '/baitap02/config/Database.php';


class QuizzesService
{

    public function getQuizzes($offset)
    {
        $database = new Database();
        $conn = $database->getConnect();

        if ($conn !== null) {
            try {
                $sql = "SELECT * FROM quizzes LIMIT 10 OFFSET :offset;";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
                $stmt->execute();

                $quizzes = [];
                while (($row = $stmt->fetch())) {
                    $quizze = new Quizzes();
                    $quizze->setId($row['id']);
                    $quizze->setLessonId($row['lesson_id']);
                    $quizze->setTitle($row['title']);
                    $quizze->setCreatedAt($row['created_at']);
                    $quizze->setUpdatedAt($row['updated_at']);
                    $quizzes[] = $quizze;
                }
                return $quizzes;
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

            $sql = "UPDATE `quizzes` SET `lesson_id`=:lesson_id,`title`=:title, `updated_at`=:updated_at WHERE `id`=:id";
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

    public function deleteQuizzes(Quizzes $quizze)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "DELETE FROM `quizzes` WHERE id= :id;";
            $stmt = $conn->prepare($sql);
            $id = $quizze->getId();
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }

}