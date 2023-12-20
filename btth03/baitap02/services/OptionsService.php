<?php

namespace services;

use database\Database;
use models\Options;

class OptionsService
{
    public function getQuestions($offset)
    {
        $database = new Database();
        $conn = $database->getConnect();

        if ($conn !== null) {
            try {
                $sql = "SELECT * FROM options LIMIT 10 OFFSET :offset;";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
                $stmt->execute();

                $options = [];
                while (($row = $stmt->fetch())) {
                    $option = new Options();
                    $option->setId($row['id']);
                    $option->setQuestionId($row['question_id']);
                    $option->setOption($row['options']);
                    $option->setCreatedAt($row['created_at']);
                    $option->setUpdatedAt($row['updated_at']);
                    $options[] = $option;
                }
                return $options;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return [];
            }
        } else {
            error_log("Database connection failed.");
            return [];
        }
    }

    public function getOption(Options $option)
    {
        $database = new Database();
        $conn = $database->getConnect();

        if ($conn !== null) {
            try {
                $sql = "SELECT * FROM options where id=:id";
                $stmt = $conn->prepare($sql);
                $id = $option->getId();
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->fetch();
                $option = new Options();
                $option->setId($result['id']);
                $option->setQuestionId($result['question_id']);
                $option->setOption($result['options']);
                $option->setCreatedAt($result['created_at']);
                $option->setUpdatedAt($result['created_at']);
                return $option;
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