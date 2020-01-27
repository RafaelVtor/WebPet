<!DOCTYPE html>

<?php 

include("conexao.php"); 

session_start();
  
  //Pegando o id do usuario para navegar entre as paginas logado.
 //(isset($_GET['user'])) ? $id_usuario = $_GET['user'] : $id_usuario = null
  $id_usuario = NULL;
  if (isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];    
       
  

  $sql = "SELECT * FROM usuario WHERE id = '$id_usuario'";
  $con = $mysqli->query($sql) or die($mysqli->error);
  $dado = $con->fetch_array();
  //$nome_usuario = $dado["nome"];
  $nome_usuario = $_SESSION['nome'];
  $id_usuario = $_SESSION['id'];
  //pega o id do animal pela URL
  (isset($_GET['id_pet'])) ?  $id_animal = $_GET['id_pet'] : $id_animal = null;
  

  $sql2 = "SELECT * FROM animal WHERE id = '$id_animal'";
  $con = $mysqli->query($sql2) or die($mysqli->error);
  $dado_pet = $con->fetch_array();
  $pet_nome=$dado_pet['nome'];

  }
	
?>

<html>
<head>
	<title>Perfil do Animal</title>

	<meta charset="utf-8">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

  	<link rel="stylesheet" href="css/theme.css" type="text/css">
  	<link rel="stylesheet" href="css/estilo.css" type="text/css">

  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/theme.css" type="text/css"> 

    <style>
    	.container{
  		
  		padding: 30px;
  		width: 620px;
  		height: 600px;
  		margin-top: 40px;  		
  		
  		margin-left: auto;
  		margin-right: auto;
  		margin-bottom: 30px;
  		border-radius: 10px;
  	}
  	.w3-container{
  		padding: 30px;
  		width: 620px;
  		height: 500px;
  		margin-top: 40px;  		
  		
  		margin-left: auto;
  		margin-right: auto;
  		margin-bottom: 30px;
  		border-radius: 10px;

  	}

  	#perfil_pet{
  		font-size: larger;  		

  	}
  	textarea{
  		width: 80%;
      height: 60%;
  	}
  	.botao{
  		font-size: small;
  	}
  	.link_perfil{
        color: white;
      }
      
    </style>

</head>
<body>
	
	<!-- Inicio da Barra -->

	<nav class="navbar navbar-expand-md bg-primary navbar-dark" id="barra_superior">
    <div class="container-fluid" id="navbar-brand">
      <a href="inicio.php"><img class="img-fluid d-block" src="img/home.png" width="50px"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"> </span> 
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa d-inline fa-lg fa-bookmark-o"></i> Informações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa d-inline fa-lg fa-envelope-o"></i> Contacts</a>
          </li>
        </ul>


        <?php if ($id_usuario == NULL) { 

          echo "<a class='btn navbar-btn btn-primary ml-2 text-white' href='login.php'><i class='fa d-inline fa-lg fa-user-circle-o'></i> login</a>"; 
          }    
         else { 
         echo "<a class='link_perfil' href='perfil_principal.php'>Olá &nbsp $nome_usuario</a>";
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

<!-- Fim da Barra -->



	<?php

		$consulta = "SELECT * FROM animal WHERE id = '$id_animal'";
		$con = $mysqli->query($consulta) or die($mysqli->error);
		$dado = $con->fetch_array();
		$nome_pet=$dado['nome'];

		



		$consulta = "SELECT u.nome, u.id FROM usuario u JOIN animal a ON u.id = a.dono WHERE a.id = '$id_animal'";
		$con = $mysqli->query($consulta) or die($mysqli->error);
		$dado1 = $con->fetch_array();
    $voce_id=$dado1['id'];
		$voce_nome=$dado1['nome'];


		
	?>
	<div class="container">
		<div id="perfil_pet">
			<h3><b>Envie sua mensagens</b></h3>
			<form class="w3-container w3-card-4" method="POST" action="enviar.php">
				<label class="w3-text-green"><b>De: <?php echo $nome_usuario; ?> </b></label><br>
				
				
				<label class="w3-text-green"><b>Para: <?php echo  $voce_nome; ?> </b></label><br>

				<label class="w3-text-green"><b>Interessado em: <?php echo $nome_pet; ?></b></label><br>	

        <input type="hidden" name="voce_id" value="<?php echo  $voce_id ?>">
        <input type="hidden" name="animal_id" value="<?php echo $id_animal ?>">

				
				<textarea name="mensagem" placeholder="Escreva aqui e entre em contado com o dono de <?php echo $nome_pet ?>" row="4" cols="50"></textarea></br>				

				<input type="hidden" name="acao" value="enviado">
				<button class="w3-btn w3-blue-grey">Enviar</button>
        <a href="perfil_animal.php?animal=<?php echo $id_animal ?>" class="w3-btn w3-blue-grey">Voltar</a>
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>