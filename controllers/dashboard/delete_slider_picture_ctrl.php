<?php
require_once __DIR__.'/../../config/const.php';
require_once __DIR__ . '/../../models/SliderPictures.php';


try {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_slider = intval(filter_input(INPUT_GET, 'id_slider', FILTER_SANITIZE_NUMBER_INT));
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT); 
    $errors = [];

   $isDeleted = (int)Slider::delete($id_slider);
   if($isDeleted){
    @unlink(DIR.'/../../public/uploads/slider/'.$sliderPictures->slider_pictures_name);
   }
    
    header('location: /../../controllers/dashboard/list_pictures_slider_ctrl.php');
    die; 
} catch (\Throwable $th) {
    $error = $th->getMessage();
    var_dump($th);

    include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
    include __DIR__ . '/../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}

include __DIR__.'/../../views/dashboard/templates/dashboard_header.php';
include __DIR__.'/../../views/dashboard/list_pictures_slider.php';
include __DIR__.'/../../views/templates/footer.php';