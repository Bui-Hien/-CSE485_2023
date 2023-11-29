<?php
if (isset($_GET['id'])) {
    $article_id = $_GET['id'];

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
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);

        $stmt = $pdo->prepare("DELETE FROM baiviet WHERE ma_bviet = :article_id");

        $stmt->bindParam(':article_id', $article_id);

        $stmt->execute();

        // No need to fetch data after deletion

        if ($stmt->rowCount() > 0) {
            header("Location: article.php");
            exit(); // Stop further execution
        } else {
            header("Location: error_page.php");
            exit(); // Stop further execution
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
