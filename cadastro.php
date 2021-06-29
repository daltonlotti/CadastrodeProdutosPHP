<?php
	$id = isset($_GET['id']) ? $_GET['id'] : '';

	if (!empty($id)) {
		$strConn = 'mysql:host=localhost;dbname=db_teilor';
		$db_usuario = 'root';
		$db_senha = '';

		try {
			$conexao = new PDO($strConn, $db_usuario, $db_senha);
		} catch (PDOException $erro) {
			echo $erro->getMessage();
			exit;
		}

		$sql = 'SELECT * 
				FROM produtos 
				WHERE id_produto=:id';
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$dados = $stmt->fetch(PDO::FETCH_ASSOC); 
	}

	// Definindo o ACTION do formulário
	$action = empty($id) ? 'cadastrar.php' : 'alterar.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Produtos</title>
	<meta charset="utf-8">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap-utilities.min.css">
</head>
<body>
	<form method="POST" <?php echo "action='{$action}'"?>>
		<input type="hidden" name="txtId" id="txtId">
		<ul class="nav">
		  <li class="nav-item">
		    	<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Cadastre seu produto!</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link active" aria-current="page" href="sistema.php">Voltar</a>
		  </li>	
		 </ul>
		<div class="mb-3">
		  <label for="formGroupExampleInput" class="form-label">Descrição:</label>
		  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Descrição do produto" name="txtDescricao" id="txtDescricao">
		</div>
		<div class="mb-3">
		  <label for="formGroupExampleInput2" class="form-label">Preço de venda</label>
		  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite o preço de venda" name="txtPrecoVenda" id="txtPrecoVenda">
		</div>
		<div class="mb-3">
		  <label for="formGroupExampleInput2" class="form-label">Quantidade:</label>
		  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a quantidade" name="txtQtd" id="txtQtd">
		</div>
		<div class="mb-3">
		  <label for="formGroupExampleInput2" class="form-label">Fabricação:</label>
		  <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Digite a fabricação" name="txtFabricacao" id="txtFabricacao">
		</div>
		<div class="mb-3">
		  <label for="formGroupExampleInput2" class="form-label">Validade:</label>
		  <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Digite a validade" name="txtValidade" id="txtValidade">
		</div>
		<div class="mb-3">
		  <label for="formGroupExampleInput2" class="form-label">Unidade de Medida:</label>
		  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a unidade de medida" name="txtUnidade" id="txtUnidade">
		</div>
		<div class="mb-3">
		  <label for="formGroupExampleInput2" class="form-label">Categoria:</label>
		  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Digite a categoria" name="txtCategoria" id="txtCategoria">
		</div>

		<div class="btn-group" role="group" aria-label="Basic outlined example">
		  <button type="submit" class="btn btn-outline-secondary" id="btnSubmit">Cadastrar</button>
		</div>
		<div class="btn-group" role="group" aria-label="Basic outlined example">
		  <button type="reset" class="btn btn-outline-secondary">Limpar</button>
		</div>
		<script type="text/javascript"></script>
		<!-- JS -->
		<!-- JQuery -->
		<script src="vendor/jquery-3.6.0/jquery-3.6.0.min.js" type="text/javascript"></script>

		<?php
		if (isset($dados)) {
			echo "<script type='text/javascript'>
				document.querySelector('#btnSubmit').innerHTML = 'Alterar';
				document.querySelector('#txtId').value = '{$dados['id_produto']}';
				document.querySelector('#txtDescricao').value = '{$dados['descricao']}';
				document.querySelector('#txtPrecoVenda').value = '{$dados['preco_venda']}';
				document.querySelector('#txtQtd').value = '{$dados['qtd_estoque']}';
				document.querySelector('#txtFabricacao').value = '{$dados['fabricacao']}';
				document.querySelector('#txtValidade').value = '{$dados['validade']}';
				document.querySelector('#txtUnidade').value = '{$dados['unidade_medida']}';
				document.querySelector('#txtCategoria').value = '{$dados['categoria']}';
			</script>";
		}
	?>

		<!-- Bootstrap -->
		<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
		<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.bootstrap.esm.min.js" type="text/javascript"></script>
	</form>
</body>
</html>