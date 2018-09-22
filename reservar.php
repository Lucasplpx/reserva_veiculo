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
<h1>Adicionar Reserva</h1>

<form method="POST">
	Carro:<br/>
	<select name="carro">
		<?php
		$lista = $carros->getCarros();

		foreach($lista as $carro):
			?>
			<option value="<?php echo $carro['id']; ?>"><?php echo $carro['marca']; ?></option>
			<?php
		endforeach;
		?>
	</select><br/><br/>

	Data de início:<br/>
	<input type="date" name="data_inicio" /><br/><br/>

	Data de fim:<br/>
	<input type="date" name="data_fim" /><br/><br/>

	Nome da pessoa:<br/>
	<input type="text" name="pessoa" /><br/><br/>

	<input type="submit" value="Reservar" />
</form>

<hr/>
<br/> <br/>

<a href="index.html">Página Inicial</a>