<?php
include '../server/config.php';
include '../models/Order.php';

$id = $_GET['id'];

$order = new Order();

$order->deleteOrder( $id );

header("location: main.php");