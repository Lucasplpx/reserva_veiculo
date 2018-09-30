<?php

session_start();

if(isset($_POST['email']) && !empty($_POST['email'])){
    #conexao banco
    require 'config.php';

    #recebendo os dados do formulario
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "SELECT * FROM usuario WHERE email = :email and senha = :senha";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->execute();

    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
        $id = $dado['id']; 
        #Adicionando Ip
        $ip = $_SERVER['REMOTE_ADDR'];

        #Adicionando a sessão
        $_SESSION['lg'] = $id;

        $sql = "UPDATE usuario SET ip = :ip WHERE id = :id ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":ip", $ip);
        $sql->bindValue(":id", $id);
        $sql->execute();

        header("Location: index.php");
        exit;

    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
   
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/css/estilo.css"/>
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>

    <title>Login - SRV</title>
</head>
<body>

<div class="container">


    <div class="row" style="margin-bottom: 40px;">
        <div class="col-sm-4"></div>

            <div class="col-sm-4">
                <img src="assets/img/user01.jpg" class="rounded float-middle" alt="Responsive image">
            </div>
            <div class="col-sm-4"></div>
    </div>


        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">

                <div class="card border-dark mb-3">
                    <div class="card-header bg-transparent border-dark">
                        <center>
                            <span>Login</span>
                        </center>
                    </div>

                    <div class="card-body">
            
                        <form method="post">

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ex.: adm@gmail.com">
                            </div>


                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="password" name="senha" placeholder="Ex.: teste">
                            </div>

                            <div class="text-center">
                                <input class="btn btn-outline-dark" type="submit" value="Entrar" />
                            </div>

                        </form>
                    </div>
    

</div>

</body>
</html>