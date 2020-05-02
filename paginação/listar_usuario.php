<?php

//calcular o inicio visualização
$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$resultado_usuario = ["row_num" => 12];

$dados_banco = [
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],
	["id" => "1", "nome" => "foi", "email" => "akdasj@alksd.com"],

];
//Verificar se encontrou resultado na tabela "usuarios"
if ($resultado_usuario && ($resultado_usuario["row_num"] != 0)) {
?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>E-mail</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row_usuario = $dados_banco) {
			?>
				<tr>
					<th><?php echo $row_usuario['id']; ?></th>
					<td><?php echo $row_usuario['nome']; ?></td>
					<td><?php echo $row_usuario['email']; ?></td>
				</tr>
			<?php
			} ?>
		</tbody>
	</table>
<?php
	//Paginação - Somar a quantidade de usuários
	$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
	// $resultado_pg = mysqli_query($conn, $result_pg);
	// $row_pg = mysqli_fetch_assoc($resultado_pg);

	$row_pg = ["num_result" => 12];
	//Quantidade de pagina
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

	//Limitar os link antes depois
	$max_links = 2;

	echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if ($pag_ant >= 1) {
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		}
	}
	echo '<li class="page-item active">';
	echo '<span class="page-link">';
	echo "$pagina";
	echo '</span>';
	echo '</li>';

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if ($pag_dep <= $quantidade_pg) {
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
} else {
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
