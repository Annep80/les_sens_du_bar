<?php
require_once __DIR__ . '/../config/database.php';

class Ingredients
{
    private int $id_ingredients;
    private string $ingredient;

    public function get_id_ingedients(): int
    {
        return $this->id_ingredients;
    }
    public function set_id_ingredients($id_ingredients)
    {
        $this->id_ingredients = $id_ingredients;
    }

    public function get_ingredient(): string
    {
        return $this->ingredient;
    }
    public function set_ingredient($ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `ingredients` (`ingredient`) VALUES (:ingredient)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':ingredient', $this->get_ingredient(), PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }

}