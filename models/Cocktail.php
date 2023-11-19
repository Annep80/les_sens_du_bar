<?php
require_once __DIR__ . '/../config/database.php';

class Cocktail
{
    private int $id_cocktail;
    private string $pictures_name;
    private string $name;
    private string $ingredients;
    private string $stages;
    private int $id_users;

    public function get_id_cocktail(): int
    {
        return $this->id_cocktail;
    }
    public function set_id_cocktail($id_cocktail)
    {
        $this->id_cocktail = $id_cocktail;
    }

    public function get_pictures_name(): string
    {
        return $this->pictures_name;
    }
    public function set_pictures_name($pictures_name)
    {
        $this->pictures_name = $pictures_name;
    }

    public function get_name(): string
    {
        return $this->name;
    }
    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_id_users(): int
    {
        return $this->id_users;
    }
    public function set_id_users($id_users)
    {
        $this->id_users = $id_users;
    }

    public function get_ingredients(): string
    {
        return $this->ingredients;
    }
    public function set_ingredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function get_stages(): string
    {
        return $this->stages;
    }
    public function set_stages($stages)
    {
        $this->stages = $stages;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `cocktail` (`pictures_name`, `name`, `ingredients`, `stages` ) VALUES (:pictures_name, :name, :ingredients, :stages);';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':pictures_name', $this->get_pictures_name(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $this->get_name(), PDO::PARAM_STR);
        $stmt->bindValue(':ingredients', $this->get_ingredients(), PDO::PARAM_STR);
        $stmt->bindValue(':stages', $this->get_stages(), PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }

    public static function getAll(): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `cocktail`;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $cocktail = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $cocktail;
    }

    public static function archived(int $id_cocktail): bool
    {
        $pdo = Database::connect();
        // requête SQL pour mettre à jour la colonne created_at
        $sql = 'UPDATE `cocktail` SET `deleted_at` = NOW() WHERE `id_cocktail` = :id_cocktail;';
        $stmt = $pdo->prepare($sql);
        // Binder la valeur à la requête
        $stmt->bindValue(':id_cocktail', $id_cocktail, PDO::PARAM_INT);
        // Exécuter la requête SQL
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function moveCocktailToArchives(): array
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `cocktail` 
        WHERE `cocktail`.`deleted_at` IS NOT NULL;';
        $stmt = $pdo->query($sql);
        $archivedcocktail = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $archivedcocktail;
    }

    public static function restor(int $id_cocktail): bool
    {
        $pdo = Database::connect();
        // requête SQL pour mettre à jour la colonne created_at
        $sql = 'UPDATE `cocktail` SET `deleted_at` = NULL WHERE `id_cocktail` = :id_cocktail;';
        $stmt = $pdo->prepare($sql);
        // Binder la valeur à la requête
        $stmt->bindValue(':id_cocktail', $id_cocktail, PDO::PARAM_INT);
        // Exécuter la requête SQL
        $result = $stmt->execute();
        // Retourner un booléen indiquant le succès (true) ou l'échec (false) de la mise à jour
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return true;
        } else {
            return false;
        }
    }
    public  function update(): bool
    {
        // Création d'une variable recevant un objet issu de la classe PDO 
        $pdo = Database::connect();

        // Requête contenant un marqueur nominatif
        $sql = 'UPDATE `cocktail` SET 
                    `pictures_name` = :pictures_name,
                    `name` = :name,
                    `ingredients` = :ingredients,
                    `stages` = :stages
                    WHERE `id_cocktail` = :id_cocktail;';

        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);

        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':pictures_name', $this->get_pictures_name(),PDO::PARAM_STR);
        $sth->bindValue(':name', $this->get_name(),PDO::PARAM_STR);
        $sth->bindValue(':ingredients', $this->get_ingredients(),PDO::PARAM_STR);
        $sth->bindValue(':stages', $this->get_stages(),PDO::PARAM_STR);
        $sth->bindValue(':id_cocktail', $this->get_id_cocktail(),PDO::PARAM_STR);

        // Appel aà la méthode rowCount permettant de savoir combien d'enregistrements ont été affectés
        // par la dernière requête (fonctionnel uniquement sur insert, update, ou delete. PAS SUR SELECT!!)
        if (!$sth->execute()) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la mise à jour de la catégorie');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }


    public static function delete(int $id_cocktail): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `cocktail` WHERE `id_cocktail` = :id_cocktail;';
        $stmt = $pdo->prepare($sql);
        // Liez les paramètres
        $stmt->bindValue(':id_cocktail', $id_cocktail, PDO::PARAM_INT);
        // Exécutez la requête
        $stmt->execute();
        return (bool)$stmt->rowCount();
    }

    public static function get(int $id): object|false
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `cocktail`
                
                WHERE `id_cocktail` = :id_cocktail';

        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);

        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':id_cocktail', $id);

        // Exécution de la requête
        $sth->execute();
        $data = $sth->fetch();
        // On teste si data est vide.
        if (!$data) {
            return false;
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return $data;
        }
    }
}
