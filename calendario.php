<?php
	
?>
<table class="table table-dark" >
	<tr>
		<th scope="col">Dom</th>
		<th scope="col">Seg</th>
		<th scope="col">Ter</th>
		<th scope="col">Qua</th>
		<th scope="col">Qui</th>
		<th scope="col">Sex</th>
		<th scope="col">Sab</th>
	</tr>
	<?php for($l=0;$l<$linhas;$l++): ?>
		<tr>
			<?php for($q=0;$q<7;$q++): ?>
			<?php
			$t = strtotime(($q+($l*7)).' days', strtotime($data_inicio));
			$w = date('Y-m-d', $t);
			?>
			<td><?php
			echo date('d/m', $t)."<br/><br/>";
			$w = strtotime($w);
			foreach($lista as $item) {
				$dr_inicio = strtotime($item['data_inicio']);
				$dr_fim = strtotime($item['data_fim']);

				if( $w >= $dr_inicio && $w <= $dr_fim ) {
					echo $clientes->getNomeCliente($item['pessoa'])." (". $reservas->getNomeCarro($item['id_carro'])   .")    <a class='badge badge-success' href=editaReserva.php?id=".$item['id']. "> Editar </a>  ||  <a class='badge badge-danger' href=excluirReserva.php?id=".$item['id']. "> Excluir </a>  <br/>";
	
				}

			}

			?></td>
			<?php endfor; ?>
		</tr>
	<?php endfor; ?>
</table>


