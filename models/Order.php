<?php
require_once '../models/Conn.php';

class Order {    
    public function list() {
        $conn = new Conn();

        $sql = "SELECT * FROM os";
        $sql = $conn->pdo->prepare($sql);
        $sql->execute();

        if( $sql->rowCount() > 0 ) {
            $data = $sql->fetchALL(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    public function createOrder($type,$description,$status,$creator) {
        $conn = new Conn();

        $sql = "INSERT INTO os (type,description, creation_user, update_user, status) VALUES ( '$type', '$description', '$creator', '$creator', '$status')";
        $sql = $conn->pdo->prepare($sql);
        $sql->execute();
    }

    public function deleteOrder( $id ) {
        $conn = new Conn();

        $sql = "DELETE FROM os WHERE id= '$id' ";
        $sql = $conn->pdo->prepare($sql);
        $sql->execute();
    }

    public function listById( $id ) {
        $conn = new Conn();

        $sql = "SELECT * FROM os WHERE id = '$id'";
        $sql = $conn->pdo->prepare($sql);
        $sql->execute();

        if( $sql->rowCount() > 0 ) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    public function updateOrder( $id_os, $update_user, $update_content, $update_status ) {
        $conn = new Conn();

        $sql = "INSERT INTO os_updates ( id_os, update_user, update_content, update_status ) VALUES ( '$id_os', '$update_user', '$update_content', '$update_status' )";
        $sql = $conn->pdo->prepare($sql);
        $sql->execute();
    }

    public function updateStatus( $id_os, $update_status ) {
        $conn = new Conn();

        $sql = "UPDATE os SET status = '$update_status' WHERE id = '$id_os' ";
        $sql = $conn->pdo->prepare($sql);
        $sql->execute();
    }

    public function listUpdates( $id_os ) {
        $conn = new Conn();

        $sql = "SELECT * FROM os_updates WHERE id_os= '$id_os' ";
        $sql = $conn->pdo->prepare($sql);
        $sql->execute();

        if( $sql->rowCount() > 0 ) {
            $data = $sql->fetchALL(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}