<?php
session_start();
include '../server/config.php';
include '../models/Order.php';

$type = filter_input( INPUT_POST, 'type',FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW );
$status = filter_input( INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
$description = filter_input( INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
$creator = $_SESSION['name-user'];

$order = new Order();

$order->createOrder($type,$description,$status,$creator);

header("location: ./main.php");