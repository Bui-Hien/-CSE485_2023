<?php

namespace controllers;

require_once APP_ROOT . '/baitap02/services/QuizzesService.php';
require_once APP_ROOT . '/baitap02/models/Quizzes.php';

use models\Quizzes;
use services\QuizzesService;


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
        $quizzes = $quizzesService->getQuizzes($page * 10);
        require APP_ROOT . '/baitap02/views/quizze/index.php';
    }

    public function create()
    {
        require APP_ROOT . '/baitap02/views/quizze/create.php';
    }

    public function store()
    {
        $id = $_POST['id'];
        $lesson_id = $_POST['lession_id'];
        $title = $_POST['title'];
        $currentDate = date('Y-m-d');
        $quizee = new Quizzes();
        $quizee->setId($id);
        $quizee->setLessonId($lesson_id);
        $quizee->setTitle($title);
        $quizee->setCreatedAt($currentDate);
        $quizee->setUpdatedAt($currentDate);

        $quizeesServivce = new QuizzesService();
        $quizeesServivce->save($quizee);
        if ($quizeesServivce->save($quizee)){
            header('Location: index.php?controller=quizzes&action=index');
        }else{
            header('Location: index.php?controller=quizzes&action=create?error=error');

        }
    }


}