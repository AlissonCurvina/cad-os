<?php
session_start();

//Verifica se o tem algum usuário já logado e o envia para a tela principal, caso não tenha, redireciona novamente para a tela de login.
if(!$_SESSION['id-user'] == '') {
    header('location: ./pages/main.php');
    exit;
} else {
header('location: ./pages/login.php');
}