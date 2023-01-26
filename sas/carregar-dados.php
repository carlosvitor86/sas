<?php
require_once("../conexao.php");
$id_usuario = $_POST['id_usu'];

//Traz os dados do usuário logado
$query = $pdo->query("select * from usuarios where id = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg >0) {
    echo $res[0]['nome'].'-*'.$res[0]['nivel'].'-*'.$res[0]['foto'].'-*'.$res[0]['email'].'-*'.$res[0]['telefone'].'-*'.$res[0]['cpf'].'-*'.$res[0]['senha'].'-*'.$res[0]['endereco'];
}
?>