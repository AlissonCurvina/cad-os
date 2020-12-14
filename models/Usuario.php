<?php
require_once '../models/Conn.php';

class Usuario {

    public function login( $email, $password, $conn ) {
        $conn = new Conn();

        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $sql = $conn->pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("password", md5($password));
        $sql->execute();

        if( $sql->rowCount() > 0 ) {
            session_start();

            $res = $sql->fetch();
            
            $_SESSION['name-user'] = $res['name'];
            $_SESSION['id-user'] = $res['id'];
        
            return true;
        } else {
            return false;
        }
    }
}
