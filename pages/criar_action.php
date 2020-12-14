<?php
session_start();
include '../server/config.php';
include '../models/Order.php';

$type = $_POST['type'];
$status = $_POST['status'];
$description = $_POST['description'];
$creator = $_SESSION['name-user'];


echo $type."<br>";
echo $status."<br>";
echo $description."<br>";
echo $creator."<br>";

$order = new Order();

$order->createOrder($type,$description,$status,$creator);

header("location: ./main.php");