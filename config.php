<?php
global $pdo;
try {
//Verificação se não está setada a sessão
if(!isset($_SESSION)) {
    session_start();
}

//Configurações do banco de dados
$db_name = 'portfolio';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
//Conexão com o banco
$pdo = new PDO("mysql:dbname=".$db_name.";localhost=".$db_host, $db_user, $db_pass);
}

//Erro de banco
catch(PDOException $e) {
    echo "Ops, deu erro! ".$e -> getMessage();
}
?>