<?php 
require 'index.php';
include 'model/Cliente.php';
$cliente = new Cliente();


if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $cliente = $cliente->getCliente($id);

    if(empty($cliente['cpf'])){
        header("Location: listaCliente.php");
        exit;
    }
    
}else{
    header("Location: listaCliente.php");
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

    <title>Cliente Cadastro</title>
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




        <h1>Alterar dados do Cliente</h1>


        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">

                <div class="card border-dark mb-3">


                    <div class="card-body">

                        <form action="aditar_submit_cliente.php" method="POST" name="formCadastro" id="formCadastro">

                            <input type="hidden" name="id" value="<?php echo $cliente['id']?>"/>

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome"  value="<?php echo $cliente['nome']?>" class="form-control" placeholder="Ex.: Jao Silva">
                            </div>

                            <div class="form-group">
                                <label for="idade">Idade</label>
                                <input type="number" name="idade" id="idade" value="<?php echo $cliente['idade']?>" class="form-control" placeholder="Ex.: 100">
                            </div>

                            <div class="form-group">
                                <label for="cpf">Cpf</label>
                                <input type="text" name="cpf" id="cpf" value="<?php echo $cliente['cpf']?>" class="form-control" placeholder="Ex.: 987.123.899-73">
                            </div>

                            <div class="form-group">
                                <label for="dataNascimento">Data de Nascimento</label>
                                <input type="date" name="dataNascimento"  value="<?php echo $cliente['data_nascimento']?>" id="dataNascimento" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <textarea class="form-control" name="endereco" value="<?php echo $cliente['endereco']?>"  id="endereco" placeholder="Ex.: Setor: x , Rua: y , Qd: t , Lt: v" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tel">Nº Telefone</label>
                                <input type="text" name="tel" value="<?php echo $cliente['telefone']?>" id="tel" class="form-control" placeholder="Ex.: (62) 7070-7070">
                            </div>

                            <div class="form-group">
                                <label for="cel">Nº Celular</label>
                                <input type="text" name="cel" value="<?php echo $cliente['celular']?>" id="cel" class="form-control" placeholder="Ex.: (62) 9 5060-8010">
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