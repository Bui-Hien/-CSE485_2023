<?php
try {

    //sửa
    $conn = new PDO(dsn: "mysql:host=localhost;dbname=btth01_cse485_ex.sql", username: "root", password: "");
    if (isset($_POST['txtCatId']) && isset($_POST['txtCatName'])) {
       
        $ma_tl = $_POST['txtCatId'];
        $ten_tl = $_POST['txtCatName'];
        $sql_update = "UPDATE theloai SET ten_tloai = '$ten_tl' WHERE ma_tloai = '$ma_tl'";
        $stmt = $conn->prepare($sql_update);
        $stmt->execute();

    }
   if (isset($_POST['add'])) // thêm
    {
        $ten_tl = $_POST['txtCatName'];
        $sql_add_cat = "INSERT INTO theloai (ten_tloai) VALUES (:ten_tl)";
        $stmt = $conn->prepare($sql_add_cat);
        $stmt->bindParam(':ten_tl', $ten_tl, PDO::PARAM_STR);
        $stmt->execute();
    }
    if (!isset($_POST['delete'])) // Xoá
    { 
        $ma_tl = $_GET['id'];
        $sql_delete = "DELETE FROM theloai WHERE ma_tloai = :ma_tl";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bindParam(':ma_tl', $ma_tl, PDO::PARAM_INT);
        $stmt->execute();
    }
    header("Location: category.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
