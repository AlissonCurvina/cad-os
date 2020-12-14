<?php
session_start();
include '../models/Order.php';

$data = file_get_contents('php://input');
$id = json_decode($data);
$list = new Order();
$data = $list->listById( $id->id_os );
$update = new Order();
$updates = $update->listUpdates( $id->id_os );

$res = new stdClass();
$res->os = $data;
$res->updates = $updates;

print_r(json_encode($res));
?>
