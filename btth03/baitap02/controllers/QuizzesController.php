<?php

namespace controllers;

use services\QuizzesService;

require_once APP_ROOT . '/baitap02/services/QuizzesService.php';

class QuizzesController
{
    public function index()
    {
        $quizzesService = new QuizzesService();
        $rowquizzes = $quizzesService->getRowQuizzes();
        $page = 0;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $quizzesService->updateQuizzes(1, 1, "Quiz1");
        $quizzes = $quizzesService->getQuizzes($page * 10);
        include APP_ROOT . '/baitap02/views/quizze/index.php';
    }

    public function delete()
    {
        include APP_ROOT . '/baitap02/views/quizze/delete.php';
        $quizzesService = new QuizzesService();
        $quizzesService->deleteQuizzes($_GET['id']);
    }

}