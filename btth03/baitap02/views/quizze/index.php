<?php
if (!isset($quizzes)) {
    $quizzes = [];
}
if (!isset($rowquizzes)) {
    $rowquizzes = 0;
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
    <title>Manager quizzes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <h3 class="text-center text-uppercase text-success mt-5">Manager quizzes</h3>
    <a href="<?php echo textdomain('/btth01/btth03/baitap02/views/quizze/add.php') ?>" class="btn btn-success">Add
        quizzes</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Lesson id</th>
            <th scope="col">Title</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($quizzes as $quizze): ?>
            <tr>
                <th scope="row"><?php echo $quizze->getId() ?></th>
                <td><?php echo $quizze->getLessonId() ?></td>
                <td><?php echo $quizze->getTitle() ?></td>
                <td><?php echo $quizze->getCreatedAt() ?></td>
                <td><?php echo $quizze->getUpdatedAt() ?></td>
                <td class="text-center"><a
                            href="
                <?php echo textdomain("/btth01/btth03/baitap02/views/quizze/edit.php?id={$quizze->getId()}") ?>"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                <td class="text-center"><a
                            href="
                <?php echo textdomain("/btth01/btth03/baitap02/views/quizze/delete.php?id={$quizze->getId()}") ?>"><i
                                class="fa-regular fa-trash-can"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    if ($rowquizzes > 1) { ?>
        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 0; $i < $rowquizzes; $i++): ?>
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