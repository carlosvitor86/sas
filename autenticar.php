<?php
@session_start();
require_once("conexao.php");

$login = $_POST['login'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);


$query = $pdo->prepare("select * from usuarios where (email = :login or cpf = :login) and senha_crip = :senha_crip");
$query->bindValue(":login","$login");
$query->bindValue(":senha_crip","$senha_crip");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$total_reg = @count($res);

if ( $total_reg > 0) {
    
    $id = $res[0]['id'];
    $nivel = $res[0]['nivel'];   
    //armazenar no storage o id
    echo "<script>localStorage.setItem('id_usu','$id')</script>";
    echo "<script>localStorage.setItem('nivel_usu','$nivel')</script>";
 
    if ($res[0]['ativo'] != 'Sim') {
        echo '<script>alert("Usuário inativo contate o Administrador")</script>';
        echo '<script>window.location="index.php"</script>';
        exit();
    }

    if ($nivel == 'SAS' ) {
        echo '<script>window.location="sas"</script>';
    } else {
        echo '<script>window.location="sistema"</script>';
    }
    
} else {
    echo '<script>alert("Dados Incorretos")</script>';
    echo '<script>window.location="index.php"</script>';
    exit();
}

?>