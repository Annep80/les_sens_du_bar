<?php
require_once __DIR__ . '/../config/database.php';

class Slider
{
    private int $id_slider;
    private string $pictures_name;

    /**
     * @return int
     */
    public function getId_slider(): int
    {
        return $this->id_slider;
    }
    public function setId_slider(int $id_slider)
    {
        $this->id_slider = $id_slider;
    }


    /**
     * @return string
     */
    public  function getpictures_name(): string
    {
        return $this->pictures_name;
    }
    public function setpictures_name(string $pictures_name)
    {
        $this->pictures_name = $pictures_name;
    }

    /**
     * @return bool
     */
    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `slider` (`pictures_name`) VALUES (:pictures_name)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':pictures_name', $this->getpictures_name(), PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }

    public static function getAll()
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `slider`;';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * @param mixed $id_slider
     * 
     * @return object
     */
    public static function get($id_slider): object
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `slider` WHERE `id_slider` = :id_slider';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_slider', $id_slider, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    /**
     * @param int $id_slider
     * 
     * @return bool
     */
    public static function delete(int $id_slider): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `slider` WHERE `id_slider` = :id_slider';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_slider', $id_slider, PDO::PARAM_INT);
        $stmt->execute();
        return (bool)$stmt->rowCount();
    }
}
