<?php
include '../server/config.php';
include '../models/Order.php';

$id = $_POST['id'];

if( isset($id) ) {
    $order = new Order();

    $order->deleteOrder( $id );
}

header("location: main.php");