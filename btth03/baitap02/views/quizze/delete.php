<?php

use services\QuizzesService;


if (isset($_GET['id']) && !empty($_GET['id'])) {
    echo $_GET['id'];
    // Create an instance of QuizzesService
    $quizzesService = new QuizzesService();

    // Delete the quiz with the provided ID
    $quizzesService->deleteQuizzes($_GET['id']);
}

?>