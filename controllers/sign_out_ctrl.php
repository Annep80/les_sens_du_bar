<?php
require_once __DIR__ . '/../models/User_register.php';


unset($_SESSION['client']);
session_regenerate_id();

header('location: /../controllers/home-ctrl.php');
die;

