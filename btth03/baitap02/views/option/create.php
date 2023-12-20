<!DOCTYPE html>
<html>
<head>
    <title>Create Quesions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="container mx-auto">
<h1>Create Quesions</h1>

<form method="post" action="index.php?controller=questions&action=store">
    <div class="form-group">
        <label for="id">Id:</label>
        <input class="form-control" type="number" name="id" id="id" required/>
    </div>

    <div class="form-group">
        <label for="quiz_id">Quiz id:</label>
        <input class="form-control" type="number" name="quiz_id" id="quiz_id" required/>
    </div>

    <div class="form-group">
        <label for="question">Question:</label>
        <textarea class="form-control" name="question" id="question" required></textarea>
    </div>
    <input class="mt-2 btn bg-success" type="submit" value="Submit">
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
