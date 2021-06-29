<?php
	// Verificando se existe uma sessão aberta
	// Se existir redireciona para o sistema.php, 
	// impedindo o usuário de fazer 2 ou mais logins ao mesmo tempo
	session_start();
	if (isset($_SESSION['logado']) && $_SESSION['logado']) {
		header('LOCATION: sistema.php');
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="utf-8">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap-utilities.min.css">

	<style type="text/css">
		.container {
			margin: 5%;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="col-4 mx-auto">
			<h2 class="mb-3">Login</h2>
			<form method="POST" action="login.php">
				<div class="row g-3">
					<div class="col-sm-12">
						<label class="form-label" for="">Usuário:</label>
						<input class="form-control form-control-lg" placeholder="Digite aqui" type="text" name="txtUsuario" id="txtUsuario" required>
					</div>
					<div class="col-sm-12">
						<label class="form-label" for="">Senha:</label>
						<input class="form-control form-control-lg" placeholder="Digite aqui" type="password" name="txtSenha" id="txtSenha" required>
					</div>

					<hr class="my-4">

					<div class="col-12 d-grid gap-2">
						<button class="btn btn-primary btn-lg w-100" type="submit">Entrar</button>
						<button class="btn btn-secondary btn-lg w-100" type="reset">Cancelar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- JS -->
	<!-- JQuery -->
	<script src="vendor/jquery-3.6.0/jquery-3.6.0.min.js" type="text/javascript"></script>

	<!-- Bootstrap -->
	<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.bootstrap.esm.min.js" type="text/javascript"></script>

	<?php
		// Preenchimento das credências de login.
		// Conforme opção LEMBRE-ME
		if (isset($_COOKIE['usuario']) && isset($_COOKIE['senha'])) {
			$usuario 	= $_COOKIE['usuario'];
			$senha 		= $_COOKIE['senha'];

			echo "<script>
				// JQuery
				$('#txtUsuario').val('{$usuario}');
				


				// JS puro
				var elemento = document.querySelector('#txtSenha');
				elemento.value = '{$senha}';

				var checkboxe = document.querySelector('#chkLembreMe');
				checkboxe.setAttribute('checked', true);
			</script>";
		}
	?>
</body>
</html>