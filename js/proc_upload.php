<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php 
	


/*  ----------------------------tratando a imagem salva--------------------------*/

	$pet_foto = $_FILES['pet_foto']['nome'];
	//Parta onde a imagem será salvas.
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
	if ($_FILES[pet_foto]['error'] != 0) {
		die("Não foi possivel fazer o upload da imagem, erro: <br />" . $_UP['erros'] [$_FILES['pet_foto']['error']]);
		exit;
	}
	//Verifica a extensão do arquivo.
	$extensao = strtolower(end(explode('.', $_FILES['pet_foto']['nome'])));
	if (array_search($extensao, $_UP['extensoes']) === false) {
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RV-TCC/sistema/cadastro_pet.php'>
			<script type=\"text/javascript\">
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
	if (move_uploaded_file($_FILES['pet_foto']['tmp_name'], $_UP['pasta'] . $nome_final)) {
		//Upload execultado com sucesso
		$query = mysqli_query($mysqli, "INSERT INTO foto_animal (nome) VALUES ('$nome_final') ")

		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RV-TCC/sistema/cadastro_pet.php'>
			<script type=\"text/javascript\">
				alert(\" Arquivo salvo com sucesso!\");
			</script>
		";
	}


 ?>
 </body>
</html>