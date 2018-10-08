<?php 
require 'index.php';
include 'model/Veiculo.php';
$veiculo = new Veiculo();


if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $veiculo = $veiculo->getVeiculo($id);

    if(empty($veiculo['modelo'])){
        header("Location: listaVeiculo.php");
        exit;
    }
    
}else{
    header("Location: listaVeiculo.php");
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

    <title>Cadastro Veiculo</title>
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




       
        <h1>Alterar dados do Veiculo</h1>


        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">

                <div class="card border-dark mb-3">


                    <div class="card-body">

                        <form action="aditar_submit_veiculo.php"  method="POST" name="formCadastro" id="formCadastro">

                            <input type="hidden" name="id" value="<?php echo $veiculo['id']?>"/>

                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" value="<?php echo $veiculo['marca']?>" class="form-control" placeholder="Ex.: YYYTT">
                            </div>

                            <div class="form-group">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" value="<?php echo $veiculo['modelo']?>" class="form-control" placeholder="Ex.: GYT">
                            </div>

                            <div class="form-group">
                                <label for="cor">Cor</label>
                                <input type="text" name="cor" id="cor" value="<?php echo $veiculo['cor']?>" class="form-control" placeholder="Ex.: Black">
                            </div>

                            <div class="form-group">
                                <label for="ano">Ano do Veiculo</label>
                                <input type="number"  value="<?php echo $veiculo['ano']?>" min="2000" max="2022" name="ano" id="ano" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="chassi">Chassi</label>
                                <input type="text" name="chassi" id="chassi" value="<?php echo $veiculo['chassi']?>" class="form-control" placeholder="Ex.: 9BW ZZZ377 VT 004251">
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