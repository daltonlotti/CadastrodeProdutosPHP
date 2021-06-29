<?php
    // Verificando se não existir a sessão logado e ela não estiver TRUE
    // Reencaminha o usuário de volta para o login
	session_start();
	if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
		header('LOCATION: index.php');
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema</title>
	<style type="text/css">
		#linkSair {
			cursor: pointer;
		}

	</style>

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap-utilities.min.css">

</head>
<body>
		<ul class="nav">
		  <li class="nav-item">
		    	<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Bem vindo ao Sistema!</a>
		  </li>	
		  <li class="nav-item">
		    <a class="nav-link active" aria-current="page" href="cadastro.php">Cadastrar Produtos</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="listagem.php">Listagem dos produtos</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" onclick="sair()" id="linkSair">Sair do Sistema</a>
		  </li>
		</ul>

	<script type="text/javascript">
		function sair() {
			var resposta = confirm('Deseja realmente sair do sistema?');

			if (resposta) {
				window.location.href = 'logout.php';
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