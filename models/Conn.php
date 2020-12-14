<?php

class Conn {
    var $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO ("mysql:host=localhost;dbname=cad-os","phpmyadmin", "201161");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'connection failed: '.$e->getMessage();
        }
    }
}