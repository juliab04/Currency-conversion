<?php

namespace Controllers;
use Models\User;

class UserController
{
    public function registration()
    {
        if (!empty($_POST)) {
            $errors = $this->validate($_POST);

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($errors)) {

                $password = password_hash($password, PASSWORD_DEFAULT);
                $user = new User($name, $email, $password);
                $user->addUsers();

                session_start();
            }
            header('Location: /main');
        }

        require_once './../public/Views/registration.phtml';

    }

    private function validate(array $userData): array
    {
        $result = [];
        if (isset($userData['name'])) {
            $name = $userData['name'];
            if (empty($name)) {
                $result['name'] = 'Поле Username не может быть пустым';
            }
            if (strlen($name) < 2) {
                $result['name'] = 'Поле Username должно быть не менее двух символов';
            }

        } else {
            $result['name'] = 'Поле Username не заполнено';
        }

        if (isset($userData['email'])) {
            $email = $userData['email'];
            if (empty($email)) {
                $result['email'] = 'Поле E-mail не может быть пустым';
            }
            if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
                $result['email'] = 'Email некорректен';
            }

            $emailData = User::getByEmail($email);

            if (!empty($emailData)) {
                $result['email'] = 'Пользователь с таким email уже существует';

            }
        } else {
            $result['email'] = 'Поле E-mail не заполнено';
        }

        if (isset($userData['password'])) {
            $password = $userData["password"];
            if (empty($password)) {
                $result['password'] = 'Поле Password не может быть пустым';
            }
            if (strlen($password) < 3 or strlen($password) > 15) {
                $result['password'] = 'Пароль должен состоять не менее чем из 3 символов и не более чем из 15';
            }
        } else {
            $result['password'] = 'Поле Password не заполнено';
        }

        if ($userData['password'] !== $userData['confirm-password']) {
            $result['confirm-password'] = 'Пароли не совпадают';
        }
        return $result;
    }

    public function login()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = User::getByEmail($email);

            if (password_verify($password, $result->getPassword())) {
                session_start();

                $_SESSION['user_id'] = $result->getId();
            }

            if ($result !== null) {
                header('Location: /main');
            } else {
                echo 'Неверный логин или пароль';
            }

        }

        require_once './../public/Views/login.phtml';
    }

    public function logout()
    {
        session_start();
        session_destroy();

        header('Location: /login');
    }
}