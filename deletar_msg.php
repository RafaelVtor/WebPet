<?php 
include("conexao.php"); 
session_start();

if (isset($_SESSION['id'])) {
	$id_usuario = $_SESSION['id'];   
}
$msg=	$_GET['msg'];

if (isset($msg)&& $msg==$_GET['msg']) {
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

		var validar = confirm('Deseja excluir essa mensagem?');
		if (validar==true ) {
			<?php 
			$enviar_bd="DELETE FROM mensagens WHERE id='$msg'";
			$bd_enviado=mysqli_query($mysqli, $enviar_bd);
			?>
			alert("Mensagem excluida com sucesso");
			location.href="perfil_principal.php";
		}else{
			location.href="perfil_principal.php";
		}


	</script>
</body>
</html>