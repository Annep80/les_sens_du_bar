<?php
require_once __DIR__ . '/../models/User_register.php';


unset($_SESSION['users_register']);
session_regenerate_id();

setcookie(session_name(), '', time() - 3600, '/');

header('location: /../controllers/home-ctrl.php');
die;

