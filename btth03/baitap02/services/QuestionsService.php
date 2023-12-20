<?php

namespace services;
require_once APP_ROOT . '/baitap02/models/Questions.php';
require_once APP_ROOT . '/baitap02/config/Database.php';

use database\Database;
use models\Questions;

class QuestionsService
{
    public function getQuestions($offset)
    {
        $database = new Database();
        $conn = $database->getConnect();

        if ($conn !== null) {
            try {
                $sql = "SELECT * FROM questions LIMIT 10 OFFSET :offset;";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
                $stmt->execute();

                $questions = [];
                while (($row = $stmt->fetch())) {
                    $question = new Questions();
                    $question->setId($row['id']);
                    $question->setQuizId($row['quiz_id']);
                    $question->setQuestion($row['question']);
                    $question->setCreatedAt($row['created_at']);
                    $question->setUpdatedAt($row['updated_at']);
                    $questions[] = $question;
                }
                return $questions;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return [];
            }
        } else {
            error_log("Database connection failed.");
            return [];
        }
    }

    public function getQuestion(Questions $question)
    {
        $database = new Database();
        $conn = $database->getConnect();

        if ($conn !== null) {
            try {
                $sql = "SELECT * FROM questions where id=:id";
                $stmt = $conn->prepare($sql);
                $id = $question->getId();
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->fetch();
                $question = new Questions();
                $question->setId($result['id']);
                $question->setQuizId($result['quiz_id']);
                $question->setQuestion($result['question']);
                $question->setCreatedAt($result['created_at']);
                $question->setUpdatedAt($result['created_at']);
                return $question;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return [];
            }
        } else {
            error_log("Database connection failed.");
            return [];
        }
    }


    public function getRowQuestions()
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "SELECT * FROM `questions` WHERE 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return ceil($stmt->rowCount() / 10);
        } else {
            return $row = 0;
        }
    }

    public function save(Questions $question)
    {

        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            try {
                $sql = "INSERT INTO `questions`(`id`, `quiz_id`, `question`, `created_at`, `updated_at`) VALUES (:id,:quiz_id,:question,:created_at, :updated_at)";
                $stmt = $conn->prepare($sql);


                $id = $question->getId();
                $quizId = $question->getQuizId();
                $question_q = $question->getQuestion();
                $updatedAt = $question->getUpdatedAt();
                $createdAt = $question->getCreatedAt();

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':quiz_id', $quizId);
                $stmt->bindParam(':question', $question_q);
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

    public function updateQuestion(Questions $question)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {

            $sql = "UPDATE `questions` SET `quiz_id`=:quiz_id,`question`=:question, `updated_at`=:updated_at WHERE `id`=:id";
            $stmt = $conn->prepare($sql);

            $id = $question->getId();
            $quizId = $question->getQuizId();
            $updatedAt = $question->getUpdatedAt();
            $question_q = $question->getQuestion();

            $stmt->bindParam(':question', $question_q);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':quiz_id', $quizId);
            $stmt->bindParam(':updated_at', $updatedAt);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }

    public function deleteQuestion(Questions $question)
    {
        $database = new Database();
        $conn = $database->getConnect();
        if (!$conn == null) {
            $sql = "DELETE FROM `questions` WHERE id= :id;";
            $stmt = $conn->prepare($sql);
            $id = $question->getId();
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? true : false;
        } else {
            return false;
        }
    }
}