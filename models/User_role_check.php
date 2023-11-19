<?php
require_once __DIR__ . '/../config/database.php';

class UserRoleChecker {
    
    public static function hasAdminRole() {

        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['users_register'])) {
            $user = $_SESSION['users_register'];

            // Vérifier si l'utilisateur a l'id_role égal à 1 (id_role de l'administrateur)
            if (isset($user['id_roles']) && $user['id_roles'] == 1) {
                return true; // L'utilisateur a le rôle d'administrateur
            }
        }else{
            return false; // L'utilisateur n'a pas le rôle d'administrateur
        }

        
    }
}

// Exemple d'utilisation
if (UserRoleChecker::hasAdminRole()) {
    echo "L'utilisateur a le rôle d'administrateur.";
} else {
    echo "L'utilisateur n'a pas le rôle d'administrateur.";
}

?>