<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->validate(['login', 'password'], $_POST)) {
                $this->view->messagejs('error', $this->model->error);
            } elseif (!$this->model->checkData($_POST['login'], $_POST['password'])) {
                $this->view->messagejs('error', 'Логин или пароль указан неверно');
            }
            $this->model->login($_POST['login']);
            $this->view->location('/');
        }
        $this->view->render('login');
    }

    public function registerAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->validate(['login', 'password'], $_POST)) {
                $this->view->messagejs('error', $this->model->error);
            } elseif (!$this->model->checkLoginExists($_POST['login'])) {
                $this->view->messagejs('error', $this->model->error);
            }
            $this->model->register($_POST);
            $this->view->location('login');
        }
        $this->view->render('register');
    }

    public function logoutAction()
    {
        unset($_SESSION['account']);
        $this->view->redirect('login');
    }
}
