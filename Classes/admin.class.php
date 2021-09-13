<?php
require './config.php';

class Admin {
    public function login($email, $senha) {
        global $pdo;
        $sql = $pdo -> prepare("SELECT id FROM admin WHERE email = :email AND senha = :senha");
        $sql -> bindValue(":email", $email);
        $sql -> bindValue(":senha", $senha);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $dados = $sql -> fetch();
            $_SESSION['login'] = $dados['id'];
            return true;
        } else {
            return false;
        }
    }
}
?>