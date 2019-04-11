<?php

namespace app\controllers;

use app\core\Controller;

class TaskController extends Controller
{
    public function addtaskAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->taskValidate($_POST)) {
                $this->view->message($this->model->error);
                $this->view->redirect('/');
                exit;
            }

            $this->model->addtaskTask($_POST);
            $this->view->redirect('/');
        }
    }

    public function deltaskAction()
    {
        if (!$this->model->isTaskExists($this->route['id'])) {
            $this->view->errorCode(404);
        }

        $this->model->deltaskTask($this->route['id']);
        $this->view->redirect('/');
    }

    public function uptaskAction()
    {
        if (!$this->model->isTaskExists($this->route['id'])) {
            $this->view->errorCode(404);
        }

        $vars = [
            'data' => $this->model->tasksData($this->route['id'])[0],
        ];

        if (!empty($_POST)) {
            if (!$this->model->taskValidate($_POST)) {
                $this->view->message($this->model->error);
                $this->view->render('edit', $vars);
                exit;
            }
            $this->model->uptaskTask($_POST, $this->route['id']);
            $this->view->message('Success! Task updated!');
            $this->view->redirect('/');
        }

        $this->view->render('edit', $vars);
    }

    public function setstatusAction()
    {
        if (!$this->model->isTaskExists($this->route['id'])) {
            $this->view->errorCode(404);
            exit;
        }
        if (!empty($_POST)) {
            $this->model->setstatusTask($_POST);
            echo json_encode('Completed!');
            exit;
        }
    }

    public function setdateAction()
    {
        if (!$this->model->isTaskExists($this->route['id'])) {
            $this->view->errorCode(404);
            exit;
        }
        if (!empty($_POST)) {
            $this->model->setdateTask($_POST);
            echo json_encode('Set Deadline!');
            exit;
        }
    }


}
