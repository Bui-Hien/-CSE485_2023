<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
</head>
<body>
<h1>Edit Article</h1>

<form method="post" action="index.php?controller=article&action=update">
    <input type="hidden" name="id" value="<?php echo 1; ?>">

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo 1; ?>" required>

    <label for="content">Content:</label>
    <textarea name="content" id="content" required><?php echo 1; ?></textarea>

    <input type="submit" value="Update">
</form>
</body>
</html>
