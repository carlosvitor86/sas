<?php
require_once("conexao.php");
$senha = '123';
$senha_crip = md5($senha);

//Criar um usuário caso não tenha nenhum super adm SAS
$query = $pdo->query("select * from usuarios where nivel = 'SAS'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if ($total_reg == 0){
    $pdo->query("insert into usuarios set empresa = '0', nome = 'Administrador SAS', email = 'carlosvitor86@gmail.com', senha = '$senha', senha_crip = '$senha_crip', ativo = 'Sim', foto = 'sem_foto.jpg', nivel = 'SAS' ");
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Sistema SAS</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Include the above in your HEAD tag -->

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="icon" type="image/x-icon" href="img/Logo Quadrada.png">
</head>

<body>
    <div class="main">
        <div class="container">
            <center>
                <div class="logo-mobile">
                    <img src="img/logo Alice Store.png" width="100">
                    <br>
                    <br>
                    <br>
                </div>
                <div class="middle">
                    <div id="login">

                        <form action="autenticar.php" method="post">

                            <fieldset class="clearfix">

                                <p><span class="fa fa-user"></span>
                                <input type="text" name="login" Placeholder="Email ou CPF" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                                <p><span class="fa fa-lock"></span>
                                <input type="password" name="senha" Placeholder="Senha" required></p> <!-- JS because of IE support; better: placeholder="Password" -->

                                <div>
                                    <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Recuperar Senha ?</a></span>
                                    <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Login"></span>
                                </div>

                            </fieldset>
                            <div class="clearfix"></div>
                        </form>

                        <div class="clearfix"></div>

                    </div> <!-- end login -->
                    <div class="logo">
                        <span class="texto-logo">
                            <img src="img/logo Alice Store.png" width="150">
                        </span>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </center>
        </div>

    </div>
</body>

</html>
