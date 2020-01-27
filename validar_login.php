<?php 
	include("conexao.php"); 
	session_start();
	
	

	if ((isset($_POST['usuario'])) && (isset($_POST['senha']))) {
		$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
		$senha = md5(mysqli_real_escape_string($mysqli, $_POST['senha']));
		

		$sql = "SELECT * FROM usuario WHERE nome = '$usuario' AND senha = '$senha' LIMIT 1";
		$result = mysqli_query($mysqli, $sql);
		$resultado = mysqli_fetch_assoc($result);


		
		$con = $mysqli->query($sql) or die($mysqli->error);
		$dado = $con->fetch_array();
		$id = $dado["id"];
		$_SESSION['id']		=	$dado["id"];
		$_SESSION['nome']	=	$dado["nome"];
		$_SESSION['email']	=	$dado['email'];
		$_SESSION['tel']	=	$dado['tel'];
		$_SESSION['endereco']	=	$dado['endereco'];
		$_SESSION['senha']	=	$senha;

		if (empty($resultado)) {
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<script type="text/javascript">
					alert("Usuário ou senha invalida!");
					location.href="index.php";
				</script>			
			</body>
			</html>

			<?php
			
		}elseif (isset($resultado)) {
			header("Location: perfil_principal.php?user=$id");
		}
	}

 ?>