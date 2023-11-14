<?php
require_once __DIR__ . '/../config/database.php';

class Cocktail
{
    private int $id_cocktail;
    private string $cocktails_pictures_name;
    private string $cocktail_name;
    private int $id_users;

    public function get_id_cocktail(): int
    {
        return $this->id_cocktail;
    }
    public function set_id_cocktail($id_cocktail)
    {
        $this->id_cocktail = $id_cocktail;
    }
    
    public function get_cocktails_pictures_name(): string
    {
        return $this->cocktails_pictures_name;
    }
    public function set_cocktails_pictures_name($cocktails_pictures_name)
    {
        $this->cocktails_pictures_name = $cocktails_pictures_name;
    }

    public function get_cocktail_name(): string
    {
        return $this->cocktail_name;
    }
    public function set_cocktail_name($cocktail_name)
    {
        $this->cocktail_name = $cocktail_name;
    }

    public function get_id_users(): int
    {
        return $this->id_users;
    }
    public function set_id_users($id_users)
    {
        $this->id_users = $id_users;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `cocktail` (`cocktails_pictures_name`, `cocktail_name`) VALUES (:cocktails_pictures_name, :cocktail_name)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':cocktails_pictures_name', $this->get_cocktails_pictures_name(), PDO::PARAM_STR);
        $stmt->bindValue(':cocktail_name', $this->get_cocktail_name(), PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }


}