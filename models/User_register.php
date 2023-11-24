<?php
require_once __DIR__ . '/../config/database.php';

class User_register
{
    private int $id_users;
    private string $firstname;
    private string $lastname;
    private DateTime $birthday;
    private string $phone;
    private string $address;
    private string $zipcode;
    private string $city;
    private string $mail;
    private string $password;
    private string $confirm;
    private int $id_roles;


    /**
     * @return int
     */
    public function get_id_users(): int
    {
        return $this->id_users;
    }

    public function set_id_users($id_users)
    {
        $this->id_users = $id_users;
    }

    /**
     * @return string
     */
    public function get_firstname(): string
    {
        return $this->firstname;
    }
    public function set_firstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function get_lastname(): string
    {
        return $this->lastname;
    }
    public function set_lastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return DateTime
     */
    public function get_birthday(): DateTime
    {
        return $this->birthday;
    }
    public function set_birthday($birthday)
    {
        $this->birthday = new DateTime($birthday);
    }


    /**
     * @return string
     */
    public function get_phone(): string
    {
        return $this->phone;
    }
    public function set_phone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function get_address(): string
    {
        return $this->address;
    }
    public function set_address($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function get_zipcode(): string
    {
        return $this->zipcode;
    }
    public function set_zipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function get_city(): string
    {
        return $this->city;
    }
    public function set_city($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function get_mail(): string
    {
        return $this->mail;
    }
    public function set_mail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function get_password(): string
    {
        return $this->password;
    }
    public function set_password($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function get_confirm(): string
    {
        return $this->confirm;
    }
    public function set_confirm($confirm)
    {
        $this->confirm = $confirm;
    }

    /**
     * @return int
     */
    public function get_id_roles(): int
    {
        return $this->id_roles;
    }
    public function set_id_roles($id_roles)
    {
        $this->id_roles = $id_roles;
    }

    /**
     * @return bool
     */
    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `users_register` (`firstname`, `lastname`, `birthday`, `phone`, `address`, `zipcode`,`city`, `mail`, `password`, `confirm` ) VALUES (:firstname, :lastname,:birthday, :phone,:address, :zipcode, :city, :mail, :password, :confirm )';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':firstname', $this->get_firstname(), PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $this->get_lastname(), PDO::PARAM_STR);
        $stmt->bindValue(':birthday', $this->get_birthday()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->get_phone(), PDO::PARAM_STR);
        $stmt->bindValue(':address', $this->get_address(), PDO::PARAM_STR);
        $stmt->bindValue(':zipcode', $this->get_zipcode(), PDO::PARAM_STR);
        $stmt->bindValue(':city', $this->get_city(), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $this->get_mail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->get_password(), PDO::PARAM_STR);
        $stmt->bindValue(':confirm', $this->get_confirm(), PDO::PARAM_STR);
        $stmt->execute();
        // Récupérez l'ID auto-incrémenté de la dernière insertion
        $lastInsertedID = $pdo->lastInsertId();
        return (int) $lastInsertedID;
    }

    /**
     * @return [type]
     */
    public static function getAll()
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `users_register`;';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * @param mixed $mail
     * 
     * @return [type]
     */
    public static function get_userByEmail($mail)
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `users_register` WHERE `mail` = :mail LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the user as an associative array
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    /**
     * @param mixed $id_users
     * 
     * @return [type]
     */
    public static function get($id_users)
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM users_register WHERE id_users = :id_users';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_users', $id_users, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    /**
     * @return bool
     */
    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `users_register` SET 
        `firstname` = :firstname,
        `lastname` = :lastname,
        `phone` = :phone,
        `mail` = :mail,
        `address` = :address,
        `zipcode` = :zipcode,
        `city` = :city,
        WHERE `id_users` = :id_users;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':firstname', $this->get_firstname());
        $sth->bindValue(':lastname', $this->get_lastname());
        $sth->bindValue(':phone', $this->get_phone());
        $sth->bindValue(':mail', $this->get_mail());
        $sth->bindValue(':address', $this->get_address());
        $sth->bindValue(':zipcode', $this->get_zipcode());
        $sth->bindValue(':city', $this->get_city());

        if (!$sth->execute()) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la mise à jour');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }
}
