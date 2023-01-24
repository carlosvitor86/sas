<?php
$banco = "sasbd";
$usuario = "root";
$senha = "";
$servidor = "localhost";

date_default_timezone_set('America/Belem');

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", "$usuario", "$senha");
} catch (Exception $e) {
    echo 'Erro nos dados de conexão com o banco de dados! <br>'.$e;
}

?>