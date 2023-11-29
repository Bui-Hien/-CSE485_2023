<?php
$host = 'mariadb';
$port = "3306";
$db = 'BTTH01_CSE485_ex.sql';
$user = 'root';
$pass = 'your_password';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// Your initial code setting up the connection and options remains the same

try {
    if (
        isset($_POST['ma_bviet']) &&
        isset($_POST['tieude']) &&
        isset($_POST['ten_bhat']) &&
        isset($_POST['ma_tloai']) &&
        isset($_POST['tomtat']) &&
        isset($_POST['noidung']) &&
        isset($_POST['ma_tgia']) &&
        isset($_POST['ngayviet']) &&
        isset($_POST['hinhanh'])
    ) {
        $pdo = new PDO($dsn, $user, $pass, $options);
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
        $stmt->bindParam(':tieude', $_POST['tieude']);
        $stmt->bindParam(':ten_bhat', $_POST['ten_bhat']);
        $stmt->bindParam(':ma_tloai', $_POST['ma_tloai']);
        $stmt->bindParam(':tomtat', $_POST['tomtat']);
        $stmt->bindParam(':noidung', $_POST['noidung']);
        $stmt->bindParam(':ma_tgia', $_POST['ma_tgia']);
        $stmt->bindParam(':ngayviet', $_POST['ngayviet']);
        $stmt->bindParam(':hinhanh', $_POST['hinhanh']);
        $stmt->bindParam(':ma_bviet', $_POST['ma_bviet']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: article.php");
            exit(); // Stop further execution
        } else {
            header("Location: error_page.php");
            exit(); // Stop further execution
        }
    }

    if (
        !isset($_POST['ma_bviet']) &&
        isset($_POST['tieude']) &&
        isset($_POST['ten_bhat']) &&
        isset($_POST['ma_tloai']) &&
        isset($_POST['tomtat']) &&
        isset($_POST['noidung']) &&
        isset($_POST['ma_tgia']) &&
        isset($_POST['ngayviet']) &&
        isset($_POST['hinhanh'])
    ) {
        $pdo = new PDO($dsn, $user, $pass, $options);


        $stmt = $pdo->query("SELECT COUNT(ma_bviet) as ma_bviet  FROM baiviet");

        $ma_bviet = $stmt->fetchAll();




        $sql = "INSERT INTO baiviet
            (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
            VALUES
            (:ma_bviet, :tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh)";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':tieude', $_POST['tieude']);
        $stmt->bindParam(':ten_bhat', $_POST['ten_bhat']);
        $stmt->bindParam(':ma_tloai', $_POST['ma_tloai']);
        $stmt->bindParam(':tomtat', $_POST['tomtat']);
        $stmt->bindParam(':noidung', $_POST['noidung']);
        $stmt->bindParam(':ma_tgia', $_POST['ma_tgia']);
        $stmt->bindParam(':ngayviet', $_POST['ngayviet']);
        $stmt->bindParam(':hinhanh', $_POST['hinhanh']);
        $vars = $ma_bviet[0]['ma_bviet'] + 1;
        $stmt->bindParam(':ma_bviet', $vars);

        // Execute the insert statement
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: article.php");
            exit(); // Stop further execution
        } else {
            header("Location: error_page.php");
            exit(); // Stop further execution
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
