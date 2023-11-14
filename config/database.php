<?php
require_once __DIR__ . '/const.php';

class Database
{
    private static $pdo;

    public static function connect()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO(DSN, USER, PASSWORD);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                //  message de réussite de la connexion 
            } catch (PDOException $error) {
                // En cas d'erreur de connexion, afficher l'erreur
                die('Erreur : ' . $error->getMessage());
            }
            
        }
        return self::$pdo;
    }
}
// On essaie de se connecter
