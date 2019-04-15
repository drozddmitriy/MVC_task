<?php

namespace app\models;

use app\core\Model;

class Task extends Model
{
    public $error;

    public function addtaskTask($var)
    {
        $name = strip_tags($var['taskname']);
        $params = [
            'name' => $name,
            'status' => 0,
            'id_project' => $var['id_project'],
            'account_id' => $_SESSION['account']['id'],
        ];
        $result = $this->db->query('INSERT INTO tasks (text, status, id_project, account_id) VALUES (:name, :status, :id_project, :account_id)',
            $params);
        return $result;
    }

    public function deltaskTask($id)
    {
        $params = [
            'id' => $id,
        ];
        $result = $this->db->query('DELETE FROM tasks WHERE id = :id', $params);
        return $result;
    }

    public function uptaskTask($task, $id)
    {
        $text = strip_tags($task['taskname']);
        $params = [
            'id' => $id,
            'text' => $text,
        ];
        $this->db->query('UPDATE tasks SET text = :text WHERE id = :id', $params);
    }

    public function tasksData($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM tasks WHERE id = :id', $params);
    }

    public function setstatusTask($value)
    {
        $params = [
            'id' => $value['id'],
            'status' => $value['status'],
        ];
        $this->db->query('UPDATE tasks SET status = :status WHERE id = :id', $params);
    }
    public function setdateTask($value)
    {
        $params = [
            'id' => $value['id'],
            'date' => $value['date'],
        ];
        $this->db->query('UPDATE tasks SET date = :date WHERE id = :id', $params);
    }

    public function isTaskExists($id)
    {
        $params = [
            'id' => $id,
        ];
        $var = $this->db->row('SELECT * FROM tasks WHERE id = :id', $params);
        if (empty($var) or $_SESSION['account']['id'] != $var[0]['account_id']) {
            return false;
        }
        return true;
    }

    public function taskValidate($task)
    {
        $Taskname = iconv_strlen($task['taskname']);
        if ($Taskname == "") {
            $this->error = 'Название обязательно для заполнения';
            return false;
        } elseif ($Taskname < 3 or $Taskname > 100) {
            $this->error = 'Поле должно содержать от 3 до 100 символов';
            return false;
        }
        return true;
    }

}