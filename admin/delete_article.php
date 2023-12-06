<?php
session_start();
if (!isset($_SESSION['isLogined'])) { //Neu chua co the
    header("Location:../login.php"); //Quay ra khai bao
    exit(1);
}
?>
<?php
require_once '../Database.php';
require_once '../Command_sql.php';
$db = new \conn\Database();
$command_sql = new \conn\Command_sql($db);
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
