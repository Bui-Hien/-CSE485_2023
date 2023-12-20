<?php

namespace controllers;

use models\Questions;
use services\QuestionsService;

require_once APP_ROOT . '/baitap02/services/QuestionsService.php';
require_once APP_ROOT . '/baitap02/models/Questions.php';


class QuestionsController
{
    public function index()
    {
        $quesionsService = new QuestionsService();
        $rowquesions = $quesionsService->getRowQuestions();
        $page = 0;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $questions = $quesionsService->getQuestions($page * 10);
        require APP_ROOT . '/baitap02/views/question/index.php';
    }

    public function create()
    {
        require APP_ROOT . '/baitap02/views/question/create.php';
    }

    public function store()
    {
        $id = $_POST['id'];
        $quiz_id = $_POST['quiz_id'];
        $question_q = $_POST['question'];
        $currentDate = date("Y-m-d");
        $question = new Questions();
        $question->setId($id);
        $question->setQuizId($quiz_id);
        $question->setQuestion($question_q);
        $question->setCreatedAt($currentDate);
        $question->setUpdatedAt($currentDate);

        $questionsService = new QuestionsService();
        $questionsService->save($question);

        header('Location: index.php?controller=questions&action=index');
    }

    public function update()
    {
        $id = $_POST['id'];
        $quiz_id = $_POST['quiz_id'];
        $question_q = $_POST['question'];
        $currentDate = date("Y-m-d");
        $question = new Questions();
        $question->setId($id);
        $question->setQuizId($quiz_id);
        $question->setQuestion($question_q);
        $question->setUpdatedAt($currentDate);

        $questionsService = new QuestionsService();
        $questionsService->updateQuestion($question);
        header('Location: index.php?controller=questions&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $question = new Questions();
        $question->setId($id);
        $questionsService = new QuestionsService();
        $questionsService->deleteQuestion($question);
        header('Location: index.php?controller=questions&action=index');

    }

    public function edit()
    {
        $id = $_GET['id'];
        $question = new Questions();
        $question->setId($id);
        $questionsService = new QuestionsService();
        $resultQuestion = $questionsService->getQuestion($question);
        require APP_ROOT . '/baitap02/views/question/edit.php';
    }
}