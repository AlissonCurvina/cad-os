<?php
session_start();
include '../partials/head.php';
include '../partials/header.php';
include '../models/Order.php';

$id_os = $_POST['id'];
$update_status = $_POST['status'];
$update_content = $_POST['update-content'];
$update_user = $_SESSION['name-user'];

$order = new Order();
$order->updateOrder( $id_os, $update_user, $update_content, $update_status );