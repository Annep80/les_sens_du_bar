<?php
require_once __DIR__ . '/../config/database.php';

class User
{
    private string $firstname;
    private string $lastname;
    private string $phone;
    private string $mail;
    private string $password;
    private string $confirm;




    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function setLastname($lastname)
    {
        $this->firstname = $lastname;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getMail(): string
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->phone = $mail;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->phone = $password;
    }

    public function getConfirm(): string
    {
        return $this->confirm;
    }
    public function setConfirm($confirm)
    {
        $this->phone = $confirm;
    }
}