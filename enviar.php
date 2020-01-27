<?php 
include("conexao.php");

session_start(); 
$id_usuario = NULL;
if (isset($_SESSION['id'])) {
	$id_usuario = $_SESSION['id'];
	$nome_usuario = $_SESSION['nome'];
	$eu = $_SESSION['nome'];

	$nome_pet=$_POST['animal_id'];
	$voce=$_POST['voce_id'];
	$mensagem=$_POST['mensagem'];

	echo "$voce,$nome_pet,$eu";

	$enviar_bd = "INSERT INTO mensagens (id_de, id_para, mensagem, id_animal) values ('$id_usuario','$voce','$mensagem', '$nome_pet')";



	if ($bd_enviado=mysqli_query($mysqli, $enviar_bd)){



		?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title></title>
		</head>
		<body>
			<script>
				alert("mensagem enviada com sucesso");
				location.href="perfil_principal.php";
			</script>
		</body>
		</html>

	<?php } 
}
else{

	$nome_user = $_POST["nome_user"];
	$email = $_POST["email"];


	$nome_pet=$_POST['animal_id'];
	$voce=$_POST['voce_id'];
	$mensagem=$_POST['mensagem'];

	echo "$voce,$nome_pet,$eu";

	$enviar_bd = "INSERT INTO mensagens (nome,email, id_para, mensagem, id_animal) values ('$nome_user','$email','$voce','$mensagem', '$nome_pet')";

	if ($bd_enviado=mysqli_query($mysqli, $enviar_bd)){
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title></title>
		</head>
		<body>
			<script>
				alert("mensagem enviada com sucesso");
				location.href="index.php";
			</script>
		</body>
		</html>

		<?php 		
	}
}
?>


