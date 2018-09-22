<?php 
require 'index.php';
require 'config.php';
include 'model/Reserva.php';
require 'classes/carros.class.php';

$carros = new Carros($pdo);
$reserva = new Reserva();


if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $reserva = $reserva->getReserva($id);

    if(empty($reserva['id'])){
        header("Location: listaReserva.php");
        exit;
    }
    
}else{
    header("Location: listaReserva.php");
    exit;
}

?>

<h1>Alterar dados da Reserva</h1>


<form action="aditar_submit_reserva.php" method="post">

    <input type="hidden" name="id" value="<?php echo $reserva['id'];?>"/>

    
    Carro:<br/>
	<select name="id_carro">
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
	<input type="date" name="data_inicio" value="<?php echo $reserva['data_inicio'];?>" /><br/><br/>

	Data de fim:<br/>
	<input type="date" name="data_fim" value="<?php echo $reserva['data_fim'];?>" /><br/><br/>

	Nome da pessoa:<br/>
	<input type="text" name="pessoa" value="<?php echo $reserva['pessoa'];?>" /><br/><br/>

	<input type="submit" value="Alterar Dados" />

</form>