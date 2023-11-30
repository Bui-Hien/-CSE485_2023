<?php
require("commandSql.php");
if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    $result = deleteArticle($idToDelete);

    if ($result > 0) {
        header("Location: article.php");
        exit();
    } else {
        echo "Deletion failed";
        exit();
    }
}
?>
