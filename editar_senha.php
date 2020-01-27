<?php 
include("conexao.php"); 
session_start();

if (isset($_SESSION['id'])) {
	$id_usuario = $_SESSION['id'];   
}


$senha_antiga = md5($_POST["senha_antiga"]);
$senha_nova = md5($_POST["senha_nova"]);

$consulta = "SELECT * FROM usuario WHERE id = '$id_usuario'";
$con = $mysqli->query($consulta) or die($mysqli->error);
$dado = $con->fetch_array();


$senha_antiga_bd = $dado["senha"];


if ($senha_antiga == $senha_antiga_bd) {
	

	

	$enviar_bd = "UPDATE usuario SET senha = '$senha_nova' WHERE id = '$id_usuario'";
	

	if($Senha_alterada = mysqli_query($mysqli,$enviar_bd)) {
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
				location.href="editar_perfil.php";
			</script>

			<?php

		}else{
			echo "";


		}
	}

	?>

	

	<script type='text/javascript'>
		alert('Senha antiga não conresponde a já cadastrada!')
		location.href='editar_perfil.php';
	</script>

</body>
</html>