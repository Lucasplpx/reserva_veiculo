<?php
require 'index.php';
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);
$carros = new Carros($pdo);

if(!empty($_POST['carro'])) {
	$carro = addslashes($_POST['carro']);
	$data_inicio = addslashes($_POST['data_inicio']);
	$data_fim = addslashes($_POST['data_fim']);
	$pessoa = addslashes($_POST['pessoa']);


	if($reservas->verificarDisponibilidade($carro, $data_inicio, $data_fim)) {
		$reservas->reservar($carro, $data_inicio, $data_fim, $pessoa);
		header("Location: index.html");
		exit;
	} else {
		echo "Este carro já está reservado neste período.";
	}


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

    <title>Reservar Veiculo</title>
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




        <h1>Reservar Veiculo</h1>


        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">

                <div class="card border-dark mb-3">


                    <div class="card-body">

                        <form method="POST" name="formCadastro" id="formCadastro">

                            <div class="form-group">
                                <label for="marca">Carro</label>

								<select class="custom-select" name="carro">
									<?php
									$lista = $carros->getCarros();

									foreach($lista as $carro):
										?>
										<option value="<?php echo $carro['id']; ?>"><?php echo $carro['marca']; ?></option>
										<?php
									endforeach;
									?>
								</select>

                            </div>


							
							<div class="form-group">
                                <label for="datai">Data de Inicio</label>
                                <input type="date" name="data_inicio" id="datai" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="datad">Data de Devolução</label>
                                <input type="date" name="data_fim" id="datad" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="pe">Nome da Pessoa</label>
                                <input type="text" name="pessoa" id="pe" class="form-control" placeholder="Ex.: GYT">
							</div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark">Reservar</button>
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