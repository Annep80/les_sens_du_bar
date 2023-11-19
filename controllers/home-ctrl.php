
<?php
require_once __DIR__ . '/../models/SliderPictures.php';

try {
    $sliderPictures = Slider::getAll();

} catch (\Throwable $th) {
    $error = $th->getMessage();

    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/home.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__.'/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';