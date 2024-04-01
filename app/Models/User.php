<?php

namespace Models;

use Services\ConnectionFactory;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function addUsers()
    {
        $statement = ConnectionFactory::create()->prepare("insert into users(name, email, password) values (:name, :email, :password)");
        $statement->execute(['name' => $this->name, 'email' => $this->email, 'password' => $this->password]);

    }

    public static function getByEmail(string $email): User|null
    {
        $statement = ConnectionFactory::create()->prepare("SELECT * FROM users WHERE email = :email");
        $statement->execute(['email' => $email]);

        $result = $statement->fetch();
        if (empty($result)) {
            return null;
        }
        $user = new User($result['name'], $result['email'], $result['password']);
        $user->setId($result['id']);

        return $user;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}