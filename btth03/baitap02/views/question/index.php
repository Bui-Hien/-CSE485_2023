<?php
if (!isset($questions)) {
    $questions = [];
}
if (!isset($rowquesions)) {
    $rowquesions = 0;
}
if (!isset($page)) {
    $page = 0;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <h3 class="text-center text-uppercase text-success mt-5">Manager quizzes</h3>
    <a href="<?php echo textdomain('index.php?controller=questions&action=create') ?>" class="btn btn-success">Add
        question</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Quiz id</th>
            <th scope="col">Question</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($questions as $question): ?>
            <tr>
                <th scope="row"><?php echo $question->getId() ?></th>
                <td><?php echo $question->getQuizId() ?></td>
                <td><?php echo $question->getQuestion() ?></td>
                <td><?php echo $question->getCreatedAt() ?></td>
                <td><?php echo $question->getUpdatedAt() ?></td>
                <td class="text-center"><a
                            href="index.php?controller=questions&action=edit&id=<?php echo $question->getId() ?>"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                <td class="text-center">
                    <a href="index.php?controller=questions&action=delete&id=<?php echo $question->getId() ?>">
                        <i class="fa-regular fa-trash-can"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    if ($rowquesions > 1) { ?>
        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 0; $i < $rowquesions; $i++): ?>
                        <li class="<?php echo "page-item " . (($page == $i) ? "active" : ""); ?>" <?php echo ($page == $i) ? 'aria-current="page"' : ""; ?>>
                            <a class="page-link"
                               href="<?php echo textdomain("/patientapp/public/index.php?page={$i}") ?>"><?php echo $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>