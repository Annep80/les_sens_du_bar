<?php
require_once __DIR__ . ('/../../models/Cocktail.php');
require_once __DIR__ . ('/../../helpers/FlashMessage.php');
require_once __DIR__ . ('/../../config/const.php');




session_start();

try {
    $cocktails = Cocktail::getAll();
    $id_cocktail = intval(filter_input(INPUT_GET, 'id_cocktail', FILTER_SANITIZE_NUMBER_INT));
    $action = filter_input(INPUT_GET, 'action',FILTER_SANITIZE_SPECIAL_CHARS);
    $delete = filter_input(INPUT_GET, 'delete',FILTER_SANITIZE_SPECIAL_CHARS);
    $update = filter_input(INPUT_GET,'update',FILTER_SANITIZE_SPECIAL_CHARS);


    switch($action){

        case 'delete':
            $isDeleted = (int)Cocktail::delete($id_cocktail);
            if (!$cocktails) {
                FlashMessage::set('Le cocktail n\'existe pas!', ERROR);
                break;
            }
            if($isDeleted){ 
            
                @unlink(__DIR__ . '/public/uploads/cocktail/' . $cocktail->pictures_name);
                
                FlashMessage::set('La suppression s\'est bien déroulée!', SUCCESS); 

            }
            else{
                FlashMessage::set('La suppression n\'a pas été effectuée', ERROR); 
            }
        header ('location: /controllers/dashboard/list_cocktail_ctrl.php?delete='.$isDeleted);
        
            break;
        default:

            break;
        }

    

} catch (\Throwable $th) {
    $error = $th->getMessage();
    
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    die;
}



include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/list_cocktail.php';
include __DIR__ . '/../../views/templates/footer.php'; 

