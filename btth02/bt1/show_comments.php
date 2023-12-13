<?php
// Include your PDO database connection file (replace db_connect.php with your actual file)
global $connection;
require_once("pdo_connect.php");

// Prepare the SQL query using placeholders to prevent SQL injection
$commentQuery = "SELECT id, parent_id, comment, sender, date FROM comment WHERE parent_id = :parent_id ORDER BY id DESC";
$statement = $connection->prepare($commentQuery);
$statement->bindParam(':parent_id', $parent_id); // Bind parameters to prevent SQL injection

// Set the parent_id parameter for the main comments (parent_id = 0)
$parent_id = 0;

// Execute the query
$statement->execute();

// Fetch comments
$commentsResult = $statement->fetchAll();

// Initialize comment HTML
$commentHTML = '';

// Iterate through the comments
foreach ($commentsResult as $comment) {
    $commentHTML .= '
		<form>
            <div class="panel panel-primary">
            <div class="panel-heading">By <b>' . $comment["sender"] . '</b> on <i>' . $comment["date"] . '</i></div>
            <div class="panel-body">' . $comment["comment"] . '</div>
            <div class="panel-footer" type="submit" align="right"><button type="button" class="btn btn-primary reply" id="' . $comment["id"] . '">Reply</button></div>
            </div> 
        </form>';

    // Fetch and append reply comments
    $commentHTML .= getCommentReply($connection, $comment["id"]);
}

// Output the comments HTML
echo $commentHTML;

// Function to fetch reply comments (replace this with your actual function)
function getCommentReply($connection, $parent_id)
{
    return "hien";
}

?>
