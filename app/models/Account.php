<?php

namespace app\models;

use app\core\Model;

class Account extends Model
{
    public function validate($input, $post)
    {
        $rules = [
            'login' => [
                'pattern' => '#^[a-z0-9]{3,15}$#',
                'message' => 'Логин указан неверно (разрешены только латинские буквы и цифры от 3 до 15 символов',
            ],
            'password' => [
                'pattern' => '#^[a-z0-9]{6,10}$#',
                'message' => 'Пароль указан неверно (разрешены только латинские буквы и цифры от 6 до 10 символов',
            ],
        ];
        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }
        }
        return true;
    }

    public function register($post)
    {

        $params = [
            'login' => $post['login'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
        ];
        $this->db->query('INSERT INTO accounts(login, password) VALUES (:login, :password)', $params);
    }

    public function login($login)
    {
        $params = [
            'login' => $login,
        ];
        $data = $this->db->row('SELECT * FROM accounts WHERE login = :login', $params);
        $_SESSION['account'] = $data[0];

    }

    public function checkData($login, $password)
    {
        $params = [
            'login' => $login,
        ];
        $hash = $this->db->column('SELECT password FROM accounts WHERE login = :login', $params);
        if (!$hash or !password_verify($password, $hash)) {
            return false;
        }
        return true;
    }

    public function checkLoginExists($login) {
        $params = [
            'login' => $login,
        ];
        if ($this->db->column('SELECT id FROM accounts WHERE login = :login', $params)) {
            $this->error = 'Этот логин уже используется';
            return false;
        }
        return true;
    }
}
