<?php
require_once __DIR__ . '/../../models/SliderPictures.php';

try {

    $sliderPictures = Slider::getAll();
    // $delete = intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT));
    
    
} catch (\Throwable $th) {
    $error = $th->getMessage();

    include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
    include __DIR__ . '/../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
    die;
}


include __DIR__ . '/../../views/dashboard/templates/dashboard_header.php';
include __DIR__ . '/../../views/dashboard/list_pictures_slider.php';
include __DIR__ . '/../../views/templates/footer.php';
