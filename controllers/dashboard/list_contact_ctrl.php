<?php
require_once __DIR__ . ('/../../models/Contact.php');
require_once __DIR__ . ('/../../helpers/FlashMessage.php');
require_once __DIR__ . ('/../../config/const.php');






try {
    $contacts = Contact::getAll();
    
} catch (\Throwable $th) {
    $error = $th->getMessage();
    
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    die;
}



include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/list_contact.php';
include __DIR__ . '/../../views/templates/footer.php'; 
