<!DOCTYPE html>
<html>
<head>
    <title>Edit Quizzes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="container mx-auto">
<h1>Create Article</h1>
<?php
if (!isset($resultQuize)) {
    $resultQuize = [];
} ?>
<form method="post" action="index.php?controller=quizzes&action=update">
    <div class="form-group d-none">
        <label for="id">Id:</label>
        <input type="number" name="id" id="id" value="<?php echo $resultQuize->getId() ?>" required/>
    </div>
    <div class="form-group">
        <label for="lession_id">Lession id:</label>
        <input class="form-control" type="number" name="lession_id" id="lession_id"
               value="<?php echo $resultQuize->getLessonId() ?>" required/>
    </div>
    <div class="form-group">
        <label for="title">Title:</label>
        <textarea class="form-control" name="title" id="title"
                  required><?php echo $resultQuize->getTitle() ?></textarea>
    </div>
    <input class="mt-2 btn bg-success" type="submit" value="Submit">
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
