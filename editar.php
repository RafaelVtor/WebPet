<?php 
	include("conexao.php"); 
	session_start();

	if (isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];   
	}



	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$ender = $_POST["ender"];
	$senha = $_POST["senha"];
	

	
					
					
	$bd_enviado=mysqli_query($mysqli, $enviar_bd);

	$enviar_bd = "UPDATE usuario SET nome ='$nome', email = '$email', tel = '$tel', endereco = '$ender' WHERE id = '$id_usuario'";					
					
	$bd_enviado=mysqli_query($mysqli, $enviar_bd);


	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>alerta</title>
	  <meta charset="utf-8">
	
</head>
<body>
	<script type="text/javascript">
		alert("Atualização feita com sucesso!")
		 location.href="perfil_principal.php";
	</script>
	

</body>
</html>
	
	
