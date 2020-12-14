<?php
include '../server/config.php';

$email = $_POST['email'];
$password = $_POST['password'];

if($email && $password) {
    require '../models/Usuario.php';

    $user = new Usuario();

    $res = $user->login( $email, $password, $conn );

    if( $res == true ) {
        $_SESSION['name-user'];
        header('location: ./main.php');
    } else {
        header('location: ../index.php');
    }
} else {
    header('location: ../index.php');
}


