<!DOCTYPE html>
<html>
<head>
    <title>Edit Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="container mx-auto">
<h1>Edit Question</h1>
<?php
if (!isset($resultQuestion)) {
    $resultQuestion = [];
} ?>
<form method="post" action="index.php?controller=questions&action=update">
    <div class="form-group d-none">
        <label for="id">Id:</label>
        <input type="number" name="id" id="id" value="<?php echo $resultQuestion->getId() ?>" required/>
    </div>
    <div class="form-group">
        <label for="quiz_id">Quizzes id:</label>
        <input class="form-control" type="number" name="quiz_id" id="quiz_id"
               value="<?php echo $resultQuestion->getQuizId() ?>" required/>
    </div>
    <div class="form-group">
        <label for="question">Question</label>
        <textarea class="form-control" name="question" id="question"
                  required><?php echo $resultQuestion->getQuestion() ?></textarea>
    </div>
    <input class="mt-2 btn bg-success" type="submit" value="Submit">
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
