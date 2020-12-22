<?php
include '../server/config.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);

if(!$email && !$password) {
    header('location: ../index.php');
    exit;
    
} else {
    require '../models/Usuario.php';

    $user = new Usuario();

    $res = $user->login( $email, $password);

    if( $res == true ) {
        $_SESSION['name-user'];
        header('location: ./main.php');
    } else {
        header('location: ../index.php');
    }
}