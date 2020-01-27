<?php 
session_start(); 
$id_usuario = NULL;
if (isset($_SESSION['id'])) {
	$id_usuario = $_SESSION['id'];
	$nome_usuario = $_SESSION['nome'];
}


include("conexao.php");

	//Pegando o id do usuario e o tipo de animal da url.
(isset($_GET['pet'])) ? $t_pet = $_GET['pet'] : $t_pet = null;



$sql = "SELECT * FROM usuario WHERE id = '$id_usuario'";
$con = $mysqli->query($sql) or die($mysqli->error);
$dado = $con->fetch_array();
	  //$nome_usuario = $dado["nome"];
	  //termina de pegar os dados da url.

$consulta = "SELECT * FROM animal";
$con = $mysqli->query($consulta) or die($mysqli->error);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Animais</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

	<link rel="stylesheet" href="css/theme.css" type="text/css">
	<link rel="stylesheet" href="css/estilo.css" type="text/css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/theme.css" type="text/css"> 

	<style>
	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}
	#barra_meio{
    margin-left: 40%;
    margin-right: 30%;
  }
	.link_perfil{
		color: white;
	}

	.w3-bar-item{
		font-size: larger;

	}
	.w3-green{
		width: 90%;
		margin-left: 5%;
	}
	.w3-row-padding{
		width: 90%;
		margin-left: 8%;

	}
	.w3-third{
		margin-top: 25px;
	}
	
  #barra_superior{
    background-color: #12bbad;
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

	<div class="w3">
		<img class="d-block img-fluid w-100" src="img/adote1.jpg">
	</div>

	<div class="w3-green w3-row w3-bar w3-large"> 

		<div id="barra_meio">
			<a class="w3-bar-item w3-button w3-mobile" href="lista_animais.php?pet=cao" >Cães</a>


			<a class="w3-bar-item w3-button w3-mobile" href="lista_animais.php?pet=gato">Gatos</a>


			<a class="w3-bar-item w3-button w3-mobile" href="lista_animais.php?pet=outro" >Outros</a>
		</div>

	</div>



	<div id="div_bloco_pesquisa" >
		<div id="div_lista_nome"><h2>Animais disponiveis para adoção</h2></div>
		<p>Aqui você poderar pesquisar o animais disponiveis, por idade ou raça:</p>
		
		
		<form method="POST">Selecione pelo tipo de animal:
			<select name = tipo_animal>
				<option></option>
				<option value="cao">Cão</option>
				<option value="gato">Gato</option>
				<option value="outro">Outro</option>
			</select></p>
			<input type="hidden" name="acao" value="enviado">			
			<input type="submit" value="pesquisar">
		</form>



		<?php

		if (isset($_POST['acao']) && $_POST['acao'] =='enviado') {

			$pesquisar = $_POST['tipo_animal'];	


			$result_busca = "SELECT * FROM animal WHERE tipo = '$pesquisar' ";	
			$query_id = mysqli_query($mysqli, $result_busca);
			$num_de_animais = mysqli_num_rows($query_id);
	
		$consulta = "SELECT * FROM animal WHERE tipo = '$pesquisar'";
		$con = $mysqli->query($consulta) or die($mysqli->error);


	echo "Total de animais :" . $num_de_animais;		
	?>
<div id="div_lista">
		<table id="table_lista">
			<tr>
				<th>Foto</th>
				<th>Nome</th>
				<th>Tipo</th>
				<th>idade</th>
			</tr>
			<?php while ($dado = $con->fetch_array()) { ?>
				<tr>
					<?php $id_pet = $dado["id"]; ?>
					<?php $foto = $dado["foto"]; ?>
					<td><a href="#"><img src="<?php echo "foto_pet/$foto" ?>" width="80px" height="80px"></a></td>
					<td><?php echo $dado["nome"]; ?></td>
					<td><?php echo $dado["tipo"]; ?></td>
					<td><?php echo $dado["idade"];?></td>
					<td>
						<a href="perfil_animal.php?animal=$id_pet">
							<form action="perfil_animal.php">
								<input type="hidden" name="animal" value="<?php echo $id_pet; ?>">
								<input type="submit" name="editar" value="Perfil">
							</form>
						</a>
					</td>			        
				</tr>    

			<?php } ?>
		</table>
		</div>
<?php	} else {?>

	<?php
	$result_busca = "SELECT * FROM animal WHERE tipo = '$t_pet' ";	
	$query_id = mysqli_query($mysqli, $result_busca);
	$num_de_animais = mysqli_num_rows($query_id);


	$consulta = "SELECT * FROM animal WHERE tipo = '$t_pet'";
	$con = $mysqli->query($consulta) or die($mysqli->error);


	echo "Total de animais :" . $num_de_animais;
	?>	
	<div id="div_lista">
		<table id="table_lista">
			<tr>
				<th>Foto</th>
				<th>Nome</th>
				<th>Tipo</th>
				<th>idade</th>
			</tr>
			<?php while ($dado = $con->fetch_array()) { ?>
				<tr>
					<?php $id_pet = $dado["id"]; ?>
					<?php $foto = $dado["foto"]; ?>
					<td><a href="#"><img src="<?php echo "foto_pet/$foto" ?>" width="80px" height="80px"></a></td>
					<td><?php echo $dado["nome"]; ?></td>
					<td><?php echo $dado["tipo"]; ?></td>
					<td><?php echo $dado["idade"];?></td>
					<td>
						<a href="perfil_animal.php?animal=$id_pet">
							<form action="perfil_animal.php">
								<input type="hidden" name="animal" value="<?php echo $id_pet; ?>">
								<input type="submit" name="editar" value="Perfil">
							</form>
						</a>
					</td>			        
				</tr>    

			<?php } } ?>
		</table>
		</div>
	</div>

	<!-- script para esconder os icones da barra do topo -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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