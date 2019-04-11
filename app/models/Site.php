<?php

namespace app\models;

use app\core\Model;

class Site extends Model
{
    public $error;

    public function getProjects()
    {
        $result = $this->db->row('SELECT * FROM project');
        return $result;
    }

    public function getTasks($id_project)
    {
        $params = [
            'id' => $id_project,
        ];
        $result = $this->db->row('SELECT * FROM tasks WHERE id_project = :id', $params);
        return $result;
    }

    public function projectData($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM project WHERE id = :id', $params);
    }


    public function addProject($var)
    {
        $params = [
            'name' => $var,
            'account_id' => $_SESSION['account']['id'],
        ];
        $result = $this->db->query('INSERT INTO project(name, account_id) VALUES (:name, :account_id)', $params);
        return $result;
    }

    public function editProject($project, $id)
    {
        $params = [
            'id' => $id,
            'name' => $project['project'],
        ];
        $this->db->query('UPDATE project SET name = :name WHERE id = :id', $params);
    }

    public function deleteProject($id)
    {
        $params = [
            'id' => $id,
        ];
        $result = $this->db->query('DELETE FROM project WHERE id = :id', $params);
        return $result;
    }

    public function isProjectExists($id)
    {
        $params = [
            'id' => $id,
        ];
        $var = $this->db->row('SELECT * FROM project WHERE id = :id', $params);
        if (empty($var) or $_SESSION['account']['id'] != $var[0]['account_id']) {
            return false;
        }
        return true;
    }

    public function projectValidate($project)
    {
        $Projectname = iconv_strlen($project['project']);
        if ($Projectname == "") {
            $this->error = 'Название обязательно для заполнения';
            return false;
        } elseif ($Projectname < 3 or $Projectname > 50) {
            $this->error = 'Название должно содержать от 3 до 50 символов';
            return false;
        }
        return true;
    }
}
