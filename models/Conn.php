<?php


class Conn {
    var $pdo;
    
    public function __construct() {
        try {
            include '../server/config.php';
            $this->pdo = new PDO ("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'connection failed: '.$e->getMessage();
        }
    }
}