<!DOCTYPE html>
<html>
<head>
    <title>Create Article</title>
</head>
<body>
<h1>Create Article</h1>

<form method="post" action="index.php?controller=quizzes&action=store">
    <label for="id">Id:</label>
    <input type="number" name="id" id="id" required/>

    <label for="lession_id">Lession id:</label>
    <input type="number" name="lession_id" id="lession_id" required/>

    <label for="title">Title:</label>
    <textarea name="title" id="title" required></textarea>

    <input type="submit" value="Create">
</form>
</body>
</html>
