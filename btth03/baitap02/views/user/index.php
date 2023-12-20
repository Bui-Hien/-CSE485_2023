<?php
if (!isset($users)) {
    $users = [];
}
if (!isset($rowUser)) {
    $rowUser = 0;
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
    <h3 class="text-center text-uppercase text-success mt-5">Manager Users</h3>
    <a href="<?php echo textdomain('index.php?controller=quizzes&action=create') ?>" class="btn btn-success">Add User</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col" class="text-center">Edit</th>
            <th scope="col" class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <th scope="row"><?php echo $user->getId() ?></th>
                <td><?php echo $user->getName() ?></td>
                <td><?php echo $user->getEmail() ?></td>
                <td><?php echo $user->getCreatedAt() ?></td>
                <td><?php echo $user->getUpdatedAt() ?></td>
                <td class="text-center"><a
                            href="index.php?controller=users&action=edit&id=<?php echo $user->getId() ?>"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                <td class="text-center">
                    <a href="index.php?controller=users&action=delete&id=<?php echo $user->getId() ?>">
                        <i class="fa-regular fa-trash-can"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    if ($rowUser > 1) { ?>
        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 0; $i < $rowUser; $i++): ?>
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