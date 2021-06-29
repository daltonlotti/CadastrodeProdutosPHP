<?php
	// Connection String
	$strConn = 'mysql:host=localhost;dbname=db_teilor';
	$db_usuario = 'root';
	$db_senha = '';

	try {
		$conexao = new pdo($strConn, $db_usuario, $db_senha);

	} catch (PDOException $erro) {
		echo $erro->getMessage();
		exit;
	}

	$sql = 'SELECT * FROM produtos';
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Produtos</title>
	<meta charset="utf-8">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap-utilities.min.css">
</head>
<body>
	<ul class="nav">
		  <li class="nav-item">
		    	<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Listagem dos produtos!</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link active" aria-current="page" href="sistema.php">Voltar</a>
		  </li>	
	</ul>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Descrição</th>
				<th>Preço de Venda</th>
				<th>Quantidade</th>
				<th>Fabricação</th>
				<th>Validade</th>
				<th>Unidade de Medida</th>
				<th>Categoria</th>
				<th>Funções</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($produtos as $linha) {
					echo "
						  <tr>
						  	 <td>{$linha['id_produto']}</td>
						  	 <td>{$linha['descricao']}</td>
						  	 <td>{$linha['preco_venda']}</td>
							<td>{$linha['qtd_estoque']}</td>";
					echo  "<td>". date('d/m/Y', strtotime($linha['fabricacao'])) ."</td>";
					echo  "<td>". date('d/m/Y', strtotime($linha['validade'])) ."</td>
						   <td>{$linha['unidade_medida']}</td>	
						   <td>{$linha['categoria']}</td>
						   <td>
						   	<a href='cadastro.php?id={$linha['id_produto']}'>Editar</a>
						   	<a href='#' onClick='excluir({$linha['id_produto']})'>Excluir</a>
						   </td>  
						  </tr>";
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="9"><?php  echo 'Total: '.count($produtos); ?></td>
			</tr>
		</tfoot>
	</table>
		<script type="text/javascript">
		
		function excluir(idParam) {
			var resposta = confirm('Tem certeza que deseja excluir?');
			if (resposta) {
				window.location.href = 'excluir.php?id=' + idParam;
			}
		}
	</script>

	<!-- JS -->
		<!-- JQuery -->
		<script src="vendor/jquery-3.6.0/jquery-3.6.0.min.js" type="text/javascript"></script>

		<!-- Bootstrap -->
		<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
		<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.bootstrap.esm.min.js" type="text/javascript"></script>

</body>
</html>