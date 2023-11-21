<?php
require_once __DIR__ . '/../models/User_register.php';

session_start();  // Start the session

try {
    // Check if the user is logged in
    if (!isset($_SESSION['users_register']['id_users'])) {
        // User is not logged in, redirect to the login page
        header('Location: /../controllers/signIn-ctrl.php');
        exit;  // Ensure that no further code is executed after the redirect
    } else {
        // User is logged in, retrieve user data
        $id_users = $_SESSION['users_register']['id_users'];
        $userArray = User_register::get($id_users);

        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
        $update = filter_input(INPUT_GET, 'update', FILTER_SANITIZE_SPECIAL_CHARS);
    }
} catch (Throwable $th) {
    $error = $th->getMessage();
    // Log the error or display an error message to the user
}

include __DIR__ . '/../views/templates/header.php';

// Check if user is logged in (added check to avoid displaying content if redirecting)
if (isset($_SESSION['users_register']['id_users'])) {
    include __DIR__ . '/../views/user_space.php';
} else {
    // User is not logged in, so include login form or relevant content
    include __DIR__ . '/../views/login_form.php';
}

include __DIR__ . '/../views/templates/footer.php';