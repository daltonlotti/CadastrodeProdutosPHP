<?php
	$id = isset($_GET['id']) ? $_GET['id'] : '';

	if (empty($id)) {
		echo "<script>alert('Produto não encontrado!')</script>";
		echo "<script>window.location.href = 'listagem.php'</script>";
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
	
	$sql = 'DELETE 
			FROM produtos
			WHERE id_produto=:id';
	$stmt = $conexao->prepare($sql);
	$stmt->bindParam(':id', $id);

	if ($stmt->execute()) {
		echo "<script>alert('Produto excluído com sucesso!')</script>";
	} else {
		echo "<script>alert('Não foi possível excluir!')</script>";
	}

	echo "<script>window.location.href = 'listagem.php'</script>";