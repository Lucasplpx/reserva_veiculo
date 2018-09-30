<?php 
require 'index.php';
include 'model/Usuario.php';
$usuario = new Usuario();


if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $usuario = $usuario->getUsuario($id);

    if(empty($usuario['email'])){
        header("Location: listaUsuario.php");
        exit;
    }
    
}else{
    header("Location: listaUsuario.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilo.css" />
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>

    <title>Alterar Usuario</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <p class="text-center">
            <h1>Sistema Reserva Veículo</h1>
        </p>
    </nav>


    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link list-group-item-primary" href="listaUsuario.php">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link list-group-item-success" href="listaCliente.php">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link list-group-item-primary" href="listaVeiculo.php">Veiculos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link list-group-item-success" href="listaReserva.php">Reserva</a>
        </li>
    </ul>

    <div class="container">




        <h1>Alterar dados do Usuario</h1>


        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">

                <div class="card border-dark mb-3">


                    <div class="card-body">

                        <form action="aditar_submit.php" method="POST" name="formCadastro" id="formCadastro">

                            <input type="hidden" name="id" value="<?php echo $usuario['id']?>"/>

                            <div class="form-group">
                                <label for="nome">E-mail</label>
                                <input type="email" name="email"  value="<?php echo $usuario['email']?>" id="email" class="form-control" placeholder="Ex.: email@gmail.com">
                            </div>

                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" value="<?php echo $usuario['senha']?>" class="form-control" placeholder="Ex.: @102030">
                            </div>



                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark">Alterar</button>
                            </div>

                        </form>

                    </div>
                    <!-- fim .card-body -->
                    <div class="card-footer border-dark">
                        <center>
                            <small class="text-muted">&copy; PRV 2018</small>
                        </center>
                    </div>
                </div>





            </div>

</body>

</html>