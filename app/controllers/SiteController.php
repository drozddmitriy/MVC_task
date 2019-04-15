<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
{

    public function indexAction()
    {
        //$this->view->path = 'alternative way!';
        //$this->view->layout = 'alternative loyout!';
        $mas = [];
        $result = $this->model->getProjects();

        foreach ($result as $item) {
            $mas[] = $this->model->getTasks($item['id']);
        }

        $this->view->render('page', $result, $mas);
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->projectValidate($_POST)) {
                $this->view->message($this->model->error);
                $this->view->render('add');
                exit;
            }
            $this->model->addProject($_POST['project']);
            $this->view->message('Success! Project added!');
            $this->view->redirect('/');
        }
        $this->view->render('add');
    }

    public function updateAction()
    {
        if (!$this->model->isProjectExists($this->route['id'])) {
            $this->view->errorCode(404);
        }

        $vars = [
            'data' => $this->model->projectData($this->route['id'])[0],
        ];

        if (!empty($_POST)) {
            if (!$this->model->projectValidate($_POST)) {
                $this->view->message($this->model->error);
                $this->view->render('edit', $vars);
                exit;
            }
            $this->model->editProject($_POST, $this->route['id']);
            $this->view->message('Success! Project updated!');
            $this->view->redirect('/');
        }
        $this->view->render('edit', $vars);
    }

    public function deleteAction()
    {
        if (!$this->model->isProjectExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->deleteProject($this->route['id']);
        $this->view->message('Success! Project deleted!');
        $this->view->redirect('/');
    }
}