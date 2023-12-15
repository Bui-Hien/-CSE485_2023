<?php

namespace services;

use db\Database;
use models\Quizzes;

require_once APP_ROOT . '/baitap02/models/Quizzes.php';


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
                    $quizze = new Quizzes($row['id'], $row['lesson_id'], $row['title'], $row['created_at'], $row['updated_at']);
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

    public function createQuizzes($id, $lesson_id, $title)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "INSERT INTO `quizzes`(`id`, `lesson_id`, `title`, `created_at`, `updated_at`) VALUES (:id,:lesson_id,:title, '2023-01-02', '2023-01-02')";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':lesson_id', $lesson_id);
            $stmt->bindParam(':title', $title);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }

    public function updateQuizzes($id, $lesson_id, $title)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "UPDATE `quizzes` SET `lesson_id`=:lesson_id,`title`=:title WHERE `id`=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':lesson_id', $lesson_id);
            $stmt->bindParam(':title', $title);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }

    public function deleteQuizzes($id)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "DELETE FROM `quizzes` WHERE id= :id;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "row" . $stmt->rowCount();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }

}