<?php

namespace controllers;
require_once APP_ROOT . '/baitap02/services/UsersService.php';
require_once APP_ROOT . '/baitap02/models/Users.php';

use conn\User;
use models\Users;
use services\UsersService;

class UsersController
{
    public function index()
    {
        $usersService = new UsersService();
        $rowUser = $usersService->getRowUser();
        $page = 0;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $users = $usersService->getUsers($page * 10);
        require APP_ROOT . '/baitap02/views/user/index.php';
    }

    public function create()
    {
        require APP_ROOT . '/baitap02/views/user/create.php';
    }

    public function store()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = new Users();
        $user->setId($id);
        $user->setName($name);
        $user->setEmail($email);
        $userServivce = new UsersService();
        $userServivce->save($user);
        header('Location: index.php?controller=users&action=index');
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $currentDate = date("Y-m-d");
        $user = new Users();
        $user->setId($id);
        $user->setName($name);
        $user->setEmail($email);
        $user->setUpdatedAt($currentDate);

        $userService = new UsersService();
        $userService->updateUser($user);
        header('Location: index.php?controller=users&action=index');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $user = new Users();
        $user->setId($id);
        $userServivce = new UsersService();
        $userServivce->deleteUser($user);
        header('Location: index.php?controller=users&action=index');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = new Users();
        $user->setId($id);
        $usersService = new UsersService();
        $resultQuize = $usersService->getUser($user);
        require APP_ROOT . '/baitap02/views/user/edit.php';
    }
}
