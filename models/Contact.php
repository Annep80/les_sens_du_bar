<?php

require_once __DIR__ . '/../config/database.php';

class Contact
{
    private int $id_contact;
    private string $firstname;
    private string $lastname;
    private string $phone;
    private string $email;
    private string $message;



    public function get_id_contact(): int
    {
        return $this->id_contact;
    }
    public function set_id_contact($id_contact)
    {
        $this->id_contact = $id_contact;
    }

    public function get_firstname(): string
    {
        return $this->firstname;
    }
    public function set_firstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function get_lastname(): string
    {
        return $this->lastname;
    }
    public function set_lastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function get_phone(): string
    {
        return $this->phone;
    }
    public function set_phone($phone)
    {
        $this->phone = $phone;
    }

    public function get_email(): string
    {
        return $this->email;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }

    public function get_message(): string
    {
        return $this->message;
    }
    public function set_message($message)
    {
        $this->message = $message;
    }


    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `contact` (`firstname`, `lastname`, `phone`, `email`, `message` ) VALUES (:firstname, :lastname, :phone, :email, :message);';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':firstname', $this->get_firstname(), PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $this->get_lastname(), PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->get_phone(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->get_email(), PDO::PARAM_STR);
        $stmt->bindValue(':message', $this->get_message(), PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }

    public static function getAll(): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `contact`;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $contact = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $contact;
    }
}
