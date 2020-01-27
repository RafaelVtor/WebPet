<?php 

include("conexao.php"); 

session_start(); 
	$id_usuario = NULL;
	if (isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];
    $nome_usuario = $_SESSION['nome'];	
	
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/theme.css" type="text/css"> 
  <link rel="stylesheet" href="css/theme.css" type="w3/css"> 
  <link rel="stylesheet" href="css/wizard/style.css" type="text/css">

  	 <style>
  	
  	#perfil_pet{
    width: 40%;       
    margin-left: auto;
    margin-right: auto;
    min-width: 300px;
  }	
  .w3-bar-item{
    font-size: larger;

  }
  .w3-green{
    width: 90%;
    margin-left: 5%;
  }
  body{
    object-position: center;
  }
  .mySlides {
    display:none;
  }
  .w3-circle{
    width: 250px;
    height: 250px;
    /*object-fit: contain; */
    object-fit: cover;
  }
  #card_foto{
    padding: 10px;
  }
  .card_foto_interna{
   margin-top: 0px;
   margin-bottom: 0px;
   width: 25%;
   float: left;
   padding: 5px;
   padding-top: 0px;

 }
 .w3-row-padding{
  width: 90%;
  margin-left: 8%;

}
.w3-third{
  margin-top: 25px;
}
.rodape{
  margin-top: 10px solid;
  margin: auto;
  border-top: solid;
}
.panel-group{
  width: 200px;
}
.list-group-item{
  color:  #20B2AA;
}
.padded-box{
  width: 90%;
  margin-left: 10%;
}
#btn {
 margin-bottom: 8px;
}
  	
  </style>

</head>
<body>

<!-- Inicio da Barra -->

    <nav class="navbar navbar-expand-md  navbar-dark" id="barra_superior">
      <div class="container-fluid" id="navbar-brand">
        <!--    <a href="inicio.php"><img class="img-fluid d-block" src="img/home1.png" width="45px"></a>  -->




        <!--  --------------------Main navigation-----------------  -->
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary">
          <div class="container">

            <!-- Company name shown on mobile -->
            <a class="navbar-brand" href="#"><span>Web</span>Pet</a>

            <!-- Mobile menu toggle -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main navigation items -->
            <div class="collapse navbar-collapse" id="mainNavbar">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sites relacionados</a>
                  <div class="dropdown-menu navbar-dark bg-primary">
                    <a class="dropdown-item" href="http://www.abpabahia.org.br/">ABPA - Bahia</a>
                    <a class="dropdown-item" href="https://www.bayerpet.com.br/pet-lover/adote-amigo/home/">BayerPet</a>
                    <a class="dropdown-item" href="https://www.procure1amigo.com.br/default.aspx?cc=536&cn=ba-salvador">Procure 1 Amigo</a>

                    
                  </div>
                </li>


                <li class="nav-item">
                  <a class="nav-link" href="lista_animais_2.php?pet=cao">Cães</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="lista_animais_2.php?pet=gato">Gatos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="lista_animais_2.php?pet=outro">Outros</a>
                </li>
              </ul>

              <!-- teste de login -->

              <?php if ($id_usuario == NULL) { 

                echo "<button type='button' class='btn btn-secondary my-2 my-sm-0' id='myBtn' >Entrar <i class='fa d-inline fa-lg fa-user-circle-o' ></i></botton>"; 
              }    
              else { 
               echo "<a class='btn btn-secondary my-2 my-sm-0' href='perfil_principal.php'>Olá &nbsp $nome_usuario</a>";
               echo " <ul class='navbar-nav'>";
               echo "   <li class='nav-item'>";
               echo " <a class='nav-link' href='sair.php'>Sair</a>";
               echo "   </li>";
               echo "</ul>";

             }
             ?>                  

           </div>



         </div>
       </nav>

    <!--    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"> </span> 
    </button>  -->

  </div>
</nav>

<!-- Fim da Barra -->

	<br>
	<div class="container">
		<p><div id="perfil_pet"><p>
			<h3><b>Cadastre o seu Pet</b></h3>
			<form class="w3-container w3-card-4" method="POST" enctype="multipart/form-data">
				<label class="w3-text-green"><b>Nome:</b></label>
				<input type="text" class="w3-input w3-border" name="pet_nome" ><p>

				<p><label class="w3-text-green"><b>Tipo :</b></label>	 
				<input type="radio" name="pet_tipo" value="cao">Cão 
					 <input type="radio" name="pet_tipo" value="gato">Gato
					 <input type="radio" name="pet_tipo" value="outro">Outro<p>

				<label class="w3-text-green"><b>Idade:</b></label>
				<input type="int" class="w3-input w3-border" name="pet_idade"><p>

				<label class="w3-text-green"><b>Vacinas: </b></label>
				<input type="text" class="w3-input w3-border" name="pet_vacinas"><p>

				<label class="w3-text-green" ><b>Observações: </b></label><p>
				<textarea name="pet_obs" style=" width:470px; height: 150px;"></textarea></br>

				<label class="w3-text-green"><b>Foto: </b></label>
				<input type="file" class="w3-input w3-border botao" name="pet_foto"><p>

				<input type="hidden" name="acao" value="enviado">
				<button class="w3-btn w3-blue-grey">Enviar</button>
				<a href="perfil_principal.php" class="w3-btn w3-blue-grey">Voltar</a>
			</form>
		</div>
	</div>

		<?php
		if (isset($_POST['acao']) && $_POST['acao'] =='enviado') {
		
			

			//pegando o ID do animal salvo
			

			

			/*  ----------------------------tratando a imagem salva--------------------------*/



			$pet_foto = $_FILES['pet_foto']['name'];
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
			//if ($_FILES[pet_foto]['error'] != 0) {
				//die("Não foi possivel fazer o upload da imagem, erro: <br />" . $_UP['erros'] [$_FILES['pet_foto']['error']]);
				//exit;
			//}
			//Verifica a extensão do arquivo.
			$extensao = strtolower(end(explode('.', $_FILES['pet_foto']['name'])));
			if (array_search($extensao, $_UP['extensoes']) == false) {
			echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RV-TCC/sistema/cadastro_pet.php?link=10'>
					<script >
						alert(' A extensão da imagem é invalida!');
					</script>
				"; 
			}
			//verifica se deve trocar o nome do arquivo
			if ($_UP['renomeiar'] == true) {
				//Criar um nome de arquivo baseado no UNIX TIMESTAMP atual e com a extensão .jpg
				$nome_final = time().'.jpg';
			}else{
				//Mantem o nome original
				$nome_final = $_FILES['pet_foto']['name'];
			}
			//veriica se é possivel salvar o arquivo na pasta escolhida
			if (move_uploaded_file($_FILES['pet_foto']['tmp_name'], $_UP['pasta'] . $nome_final)) {
				//Upload execultado com sucesso


				$pet_nome = $_POST['pet_nome'];
				$pet_tipo = $_POST['pet_tipo'];
				$pet_idade = $_POST['pet_idade'];
				$pet_vacinas = $_POST['pet_vacinas'];
				$pet_obs = $_POST['pet_obs'];

       
          
        

				$pet_enviar = "INSERT INTO animal (nome, tipo, idade, vacinas, obs, foto, dono) VALUES ('$pet_nome', '$pet_tipo', '$pet_idade', '$pet_vacinas', '$pet_obs','$nome_final','$id_usuario')";
				$pet_enviado = mysqli_query($mysqli,$pet_enviar);		
     

				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RV-TCC/sistema/cadastro_pet.php'>
					<script type=\"text/javascript\">
						alert(\" Arquivo salvo com sucesso!\");
						location.href='perfil_principal.php';
					</script>

				";

			}
		}
	?>
	<br>
	<!-- script para esconder os icones da barra do topo -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 	 <!-- fim do script -->

<!-- ------- Footer ------------- -->


<footer class="footer">
  <div class="footer-lists">
    <div class="container">
      <div class="row" style="margin-left: 10%;">
        
        <div class="col-sm">
          <ul>
            <li><h2 style="color: white;">Tecnologias</h2></li>
            <li>HTML</li>
            <li>CSS</li>
            <li>PHP</li>
            <li>MySQL</li>
            
          </ul>
        </div>   
        <div class="col-sm">
         <h2 style="color: white;">Objetivo</h2>
         <p>O objetivo deste projeto é facilitar o ato de adoção de animais, servindo como um intermediário entre pessoas que têm interesse em adoção de pets.</p>          
       </div>
       <div class="col-sm">
        <ul>
          <li><h2 style="color: white;">Contato</h2></li>
          <li>web_pet@hotmail.com</li>
          <li>rafaelvitor_as@hotmail.com</li>
          <li>(71) 8611-6917</li>           
        </ul><br>
        <p class="social-icons">
          <a href="https://www.facebook.com/RafaelVtor"><i class="fa fa-facebook fa-2x"></i></a>
          <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
          <a href="https://www.youtube.com"><i class="fa fa-youtube fa-2x"></i></a>
          <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
        </p>
        
      </div>
    </div>
  </div>
</div>


<div class="footer-bottom">
  <p class="text-center">todos os direitos reservados ao site WebPet 2018.</p>
  <p class="text-center"><a href="#">Voltar para o topo</a></p>
</div>

</footer>

</body>
</html>

<?php } ?>


