<?php 
include("conexao.php"); 
session_start();

if (isset($_SESSION['id'])) {
	$id_usuario = $_SESSION['id'];   
}
$id_pet=	$_GET['animal'];

if (isset($id_pet)&& $id_pet==$_GET['animal']) {
	# code...
}

//$enviar_bd="DELETE FROM animal WHERE id='$id_pet'";
//$bd_enviado=mysqli_query($mysqli, $enviar_bd);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script>

		var validar = confirm('Deseja excluir os dados desse animal?');
		if (validar!=true ) {
			<?php 
			$enviar_bd="DELETE FROM animal WHERE id='$id_pet'";
			$bd_enviado=mysqli_query($mysqli, $enviar_bd);			
			?>
			alert("Animal excluido com sucesso");
			location.href="perfil_principal.php";
		}else{
			location.href="perfil_principal.php";
		}


	</script>
</body>
</html>