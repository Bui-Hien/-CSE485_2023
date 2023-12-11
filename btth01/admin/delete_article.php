<?php
session_start();
if (!isset($_SESSION['isLogined'])) { //Neu chua co the
    header("Location:../login.php"); //Quay ra khai bao
    exit(1);
}
?>
<?php
require_once '../Database.php';
require_once '../command_sql.php';
$db = new \Database();
$command_sql = new \Command_sql($db);
if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    $result = $command_sql->deleteArticle($idToDelete);

    if ($result > 0) {
        header("Location: article.php");
        exit();
    } else {
        echo "Deletion failed";
        exit();
    }
}
?>
