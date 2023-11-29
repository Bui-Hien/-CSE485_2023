<?php
try {
    $conn = new PDO(dsn: "mysql:host=localhost;dbname=booksmanagementsystem", username: "root", password: "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>