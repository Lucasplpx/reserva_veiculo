<?php
require 'index.php';
require 'config.php';
require 'model/Devolucao.php';

$devolucao = new Devolucao();

$lista = $devolucao->getDevolucao();

if(!empty($_POST['devolucao'])) {
    
    $id_reserva = $_POST['devolucao'];
    $pes = $_POST['pessoa'];
    $car = $_POST['carro'];

    $nomeCarro = $devolucao->getNomeCarro($car);
    $devolucao->adicionar($pes, $nomeCarro);
    $devolucao->excluirReserva($id_reserva);

    header("Location: index.html");

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

    <title>Devolução Veiculo</title>
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

        <h1>Devolução do Veiculo</h1>

    
        
        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">

                <div class="card border-dark mb-3">


                    <div class="card-body">

                        <form method="POST" name="formCadastro" id="formCadastro">


                            <div class="form-group">

                                <?php foreach($lista as $dado): ?>
                                    <input type="hidden" name="pessoa" value="<?php echo $dado['nome'];?>"/>
                                    <input type="hidden" name="carro" value="<?php echo $dado['id_carro'];?>"/>
                                <?php endforeach; ?>

                                <select class="custom-select" name="devolucao">
                                    <?php foreach($lista as $dado): ?>
                                        <option value="<?php echo $dado['id_r']; ?>" ><?php echo $dado['nome']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark">DESFAZER RESERVA</button>
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