<?php 
	include("conexao.php"); 
	session_start();

	if (isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];   
	}


	$id_pet=	$_GET['id_pet'];
	$nome = 	$_POST["pet_nome"];
	$tipo = 	$_POST["pet_tipo"];
	$idade =	$_POST["pet_idade"];
	$vacinas =	$_POST["pet_vacinas"];
	$obs = 		$_POST["pet_obs"];

	/*  ----------------------------tratando a imagem salva--------------------------*/



			$pet_foto = $_FILES['pet_foto']['nome'];
			//Pasta onde a imagem será salvas.
			$_UP['pasta'] = 'foto_pet/';

			//Tamanho da imagem em bytes.
			$_UP['tamanho'] = 1024*1024*100; //5mb

			//Array de extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

			//renomeiar
			$_UP['renomeiar'] = true;

			//Array de tipos de erros em upload do PHP
			$_UP['erros'] [0] = 'Não houve erro';
			$_UP['erros'] [1] = 'O arquivo é maior que o limite PHP';
			$_UP['erros'] [2] = 'O arquivo é maior que o limite e tamnho especifico HTML';
			$_UP['erros'] [3] = 'O upload foi feito parcialmente';
			$_UP['erros'] [4] = 'Não foi feito o upload do arquivo';

			//Verifica de ouve algum erro de upload
			if ($_FILES['pet_foto']['error'] != 0) {
				die("Não foi possivel fazer o upload da imagem, erro: <br />" . $_UP['erros'] [$_FILES['pet_foto']['error']]);
				exit;
			}
			//Verifica a extensão do arquivo.
			$extensao = strtolower(end(explode('.', $_FILES['pet_foto']['nome'])));
			if (array_search($extensao, $_UP['extensoes']) === false) {
				echo "
					
						alert(\" A extensão da imagem é invalida!\");
					</script>
				";
			}
			//verifica se deve trocar o nome do arquivo
			if ($_UP['renomeiar'] == true) {
				//Criar um nome de arquivo baseado no UNIX TIMESTAMP atual e com a extensão .jpg
				$nome_final = time().'.jpg';
			}else{
				//Mantem o nome original
				$nome_final = $_FILES['pet_foto']['nome'];
			}
			//veriica se é possivel salvar o arquivo na pasta escolhida
			if (move_uploaded_file($_FILES['pet_foto']['tmp_name'], $_UP['pasta'] . $nome_final)) {				//Upload execultado com sucesso

				

				$pet_enviar = "UPDATE animal SET nome='$nome', tipo='$tipo', idade='$idade',vacinas='$vacinas' obs='$obs', foto='$nome_final' WHERE id = '$id_pet'";

				//$pet_enviar = "INSERT INTO animal (nome, tipo, idade, vacinas, obs, foto, dono) VALUES ('$pet_nome', '$pet_tipo', '$pet_idade', '$pet_vacinas', '$pet_obs','$nome_final','$id_usuario')";
				$pet_enviado = mysqli_query($mysqli,$pet_enviar);		

				echo "
					
					<script type=\"text/javascript\">
						alert(\" Dados alterados com sucesso!\");
					</script>
				";
			}
		


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
		// location.href="perfil_principal.php";
	</script>
	

</body>
</html>
	
	
