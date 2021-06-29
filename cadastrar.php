<?php
	//Pegando os valores
	$descricao = isset($_POST['txtDescricao'])? $_POST['txtDescricao'] : '';
	$preco_venda = isset($_POST['txtPrecoVenda'])? $_POST['txtPrecoVenda'] : '';
	$qtd = isset($_POST['txtQtd'])? $_POST['txtQtd'] : '';
	$fabricacao = isset($_POST['txtFabricacao'])? $_POST['txtFabricacao'] : '';
	$validade = isset($_POST['txtValidade']) ? $_POST['txtValidade'] : '';
	$unidade = isset($_POST['txtUnidade']) ? $_POST['txtUnidade'] : '';
	$categoria = isset($_POST['txtCategoria']) ? $_POST['txtCategoria'] : '';
	
	// Connection String
	$strConn = 'mysql:host=localhost;dbname=db_teilor';

	try {
		$conexao = new PDO($strConn, 'root', '');
	} catch (PDOException $erro) {
		echo $erro->getMessage();
		exit;
	}

	// Definição da query
	$sql = 'insert into produtos(
							descricao, 
							preco_venda, 
							qtd_estoque, 
							fabricacao, 
							validade,
							unidade_medida,
							categoria) 
						values (
                            :descricao,
                            :preco_venda,
                            :qtd,
                            :fabricacao,
                            :validade,
                        	:unidade,
                        	:categoria)';
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':preco_venda', $preco_venda);
    $stmt->bindParam(':qtd', $qtd);
    $stmt->bindParam(':fabricacao', $fabricacao);
    $stmt->bindParam(':validade', $validade);
    $stmt->bindParam(':unidade', $unidade);
    $stmt->bindParam(':categoria', $categoria);

    if($stmt->execute()) {
    	echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    	echo "<script>window.location.href = 'cadastro.php'</script>";
    } else{
    	echo "<script>alert('Erro ao executar o comando SQL);</script>";
    }


