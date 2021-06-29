<?php
	// Pegando os valores e validando
	$produto['id'] 	= isset($_POST['txtId']) ? $_POST['txtId'] : '';
	$produto['descricao'] 	= isset($_POST['txtDescricao']) ? $_POST['txtDescricao'] : '';			
	$produto['preco_venda']	= isset($_POST['txtPrecoVenda']) ? $_POST['txtPrecoVenda'] : '';
	$produto['qtd_estoque']	= isset($_POST['txtQtd']) ? $_POST['txtQtd'] : '';
	$produto['fabricacao']	= isset($_POST['txtFabricacao']) ? $_POST['txtFabricacao'] : '';
	$produto['validade'] 	= isset($_POST['txtValidade']) ? $_POST['txtValidade'] : '';
	$produto['unidade_medida'] 	= isset($_POST['txtUnidade']) ? $_POST['txtUnidade'] : '';
	$produto['categoria'] 	= isset($_POST['txtCategoria']) ? $_POST['txtCategoria'] : '';


	if (in_array('', $produto)) {
		echo "<script>alert('Existe algum campo em branco. Verifique!');</script>";
		echo "<script>window.location.href = 'cadastro.php';</script>";
		exit;
	}

	$strConn 	= 'mysql:host=localhost;dbname=db_teilor';
	$db_usuario = 'root';
	$db_senha	= '';

	try {
		$conexao = new PDO($strConn, $db_usuario, $db_senha);
	} catch (PDOexception $erro) {
		echo $erro->getMessage();
		exit;
	}

	$sql = 'UPDATE produtos
			SET descricao=:descricao,
			preco_venda=:preco_venda,
			qtd_estoque=:qtd,
			fabricacao=:fabricacao,
			validade=:validade,
			unidade_medida=:unidade,
			categoria=:categoria
			WHERE id_produto=:id';
	$stmt = $conexao->prepare($sql);
	$stmt->bindParam(':descricao', $produto['descricao']);
    $stmt->bindParam(':preco_venda', $produto['preco_venda']);
    $stmt->bindParam(':qtd', $produto['qtd_estoque']);
    $stmt->bindParam(':fabricacao', $produto['fabricacao']);
    $stmt->bindParam(':validade', $produto['validade']);
    $stmt->bindParam(':unidade', $produto['unidade_medida']);
    $stmt->bindParam(':categoria', $produto['categoria']);
    $stmt->bindParam(':id', $produto['id']);

	if ($stmt->execute()) {
		echo "<script>alert('Produto alterado com sucesso!');</script>";
	} else {
		echo "<script>alert('Não foi possível alterar!');</script>";
	}

	echo "<script>window.location.href = 'listagem.php'</script>";