<?php
global $connection;
require_once("pdo_connect.php");
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
    $insertComments = "INSERT INTO comment (parent_id, comment, sender) VALUES (:parent_id, :comment, :sender)";
    $statement = $connection->prepare($insertComments);

    // Bind parameters to the prepared statement
    $statement->bindParam(':parent_id', $_POST["commentId"]);
    $statement->bindParam(':comment', $_POST["comment"]);
    $statement->bindParam(':sender', $_POST["name"]);

    $statement->execute();

    $message = '<label class="text-success">Comment posted Successfully.</label>';
    $status = array(
        'error'  => 0,
        'message' => $message
    );
} else {
    $message = '<label class="text-danger">Error: Comment not posted.</label>';
    $status = array(
        'error'  => 1,
        'message' => $message
    );
}
echo json_encode($status);
?>
