<?php
session_start();
include '../partials/head.php';
include '../partials/header.php';
include '../models/Order.php';

$id_os = filter_input(INPUT_POST,'id-os', FILTER_VALIDATE_INT);
$update_status = filter_input(INPUT_POST,'status', FILTER_SANITIZE_SPECIAL_CHARS);
$update_content = filter_input(INPUT_POST,'update-content', FILTER_SANITIZE_SPECIAL_CHARS);
$update_user = $_SESSION['name-user'];

if( $update_status == "Fechada" ) {
    header('location: ../index.php');
    exit;
}

$order = new Order();
$order->updateOrder( $id_os, $update_user, $update_content, $update_status );

if ( $update_status == "Fechada") {
    $order->updateStatus( $id_os, $update_status );
}

header('location: ./update_os.php?id='.$id_os);