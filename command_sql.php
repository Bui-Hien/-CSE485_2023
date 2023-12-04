<?php

namespace conn;

use PDOException;

class Command_sql
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAllArticles()
    {
        try {
            $pdo = $this->db->getPDO();
            $stmt = $pdo->prepare("SELECT * FROM baiviet");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching articles: " . $e->getMessage());
            return [];
        }
    }

    public function getOneArticles($id)
    {
        try {
            $pdo = $this->db->getPDO();
            $stmt = $pdo->prepare("SELECT * FROM baiviet WHERE ma_bviet = :article_id");

            $stmt->bindParam(':article_id', $id);

            $stmt->execute();

            return $data = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function deleteArticle($id)
    {
        try {
            $pdo = $this->db->getPDO();
            $stmt = $pdo->prepare("DELETE FROM baiviet WHERE ma_bviet = :article_id");
            $stmt->bindParam(':article_id', $id);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("Error deleting article: " . $e->getMessage());
            return 0;
        }
    }

    public function updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh)
    {
        try {
            $pdo = $this->db->getPDO();
            $sql = "UPDATE baiviet
                SET
                    tieude = :tieude,
                    ten_bhat = :ten_bhat,
                    ma_tloai = :ma_tloai,
                    tomtat = :tomtat,
                    noidung = :noidung,
                    ma_tgia = :ma_tgia,
                    ngayviet = :ngayviet,
                    hinhanh = :hinhanh
                WHERE ma_bviet = :ma_bviet";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':tieude', $tieude);
            $stmt->bindParam(':ten_bhat', $ten_bhat);
            $stmt->bindParam(':ma_tloai', $ma_tloai);
            $stmt->bindParam(':tomtat', $tomtat);
            $stmt->bindParam(':noidung', $noidung);
            $stmt->bindParam(':ma_tgia', $ma_tgia);
            $stmt->bindParam(':ngayviet', $ngayviet);
            $stmt->bindParam(':hinhanh', $hinhanh);
            $stmt->bindParam(':ma_bviet', $ma_bviet);

            // Execute the query
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header("Location: article.php");
                exit();
            } else {
                header("Location: error_page.php");
                exit();
            }
        } catch (PDOException $e) {
            error_log("Error updating article: " . $e->getMessage());
            header("Location: error_page.php");
            exit();
        }
    }

    public function insertArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh)
    {
        try {
            $pdo = $this->db->getPDO();
            $stmt = $pdo->query("SELECT max(ma_bviet) as ma_bviet  FROM baiviet");
            $ma_bviet = $stmt->fetchAll();

            $sql = "INSERT INTO baiviet
                (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
                VALUES
                (:ma_bviet, :tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh)";

            // Prepare the SQL statement
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':tieude', $tieude);
            $stmt->bindParam(':ten_bhat', $ten_bhat);
            $stmt->bindParam(':ma_tloai', $ma_tloai);
            $stmt->bindParam(':tomtat', $tomtat);
            $stmt->bindParam(':noidung', $noidung);
            $stmt->bindParam(':ma_tgia', $ma_tgia);
            $stmt->bindParam(':ngayviet', $ngayviet);
            $stmt->bindParam(':hinhanh', $hinhanh);
            $vars = $ma_bviet[0]['ma_bviet'] + 1;
            $stmt->bindParam(':ma_bviet', $vars);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header("Location: article.php");
                exit();
            } else {
                header("Location: error_page.php");
                exit();
            }
        } catch (PDOException $e) {
            error_log("Error inserting article: " . $e->getMessage());
            header("Location: error_page.php");
            exit();
        }
    }

    public function loggin($user, $pass)
    {
        try {
            $pdo = $this->db->getPDO();
            $sql = "SELECT * FROM users WHERE (username = :user OR email= :email)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':email', $user);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $pass_saved = $row['pass'];
                if (password_verify($pass, $pass_saved)) {
                    header("Location:admin/index.php");
                } else {
                    $error = "Password invalid";
                    header("Location:login.php?error=$error");
                }
            } else {
                $error = "Username not found";
                header("Location:login.php?error=$error");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
