
<?php 
include("conexao.php");

session_start(); 
$id_usuario = NULL;
if (isset($_SESSION['id'])) {
	$id_usuario = $_SESSION['id'];
	$nome_usuario = $_SESSION['nome'];
	$tel_usuario = $_SESSION['tel'];
	$email_usuario = $_SESSION['email'];


$consulta1 = "SELECT * FROM usuario WHERE id = '$id_usuario'";
$con1 = $mysqli->query($consulta1) or die($mysqli->error); 
$dado1 = $con1->fetch_array();



$consulta = "SELECT * FROM animal WHERE dono = '$id_usuario' " ;
$con = $mysqli->query($consulta) or die($mysqli->error); 

$num_de_animais = mysqli_num_rows($con);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/theme.css" type="text/css"> 
	<link rel="stylesheet" href="css/w3.css" type="text/css"> 
	<link rel="stylesheet" href="css/wizard/style.css" type="text/css">


	<style>
	body {
		margin: 0;
	}
	.ul_menu {
		list-style-type: none;
		margin: 0;
		padding: 0;
		width: 25%;
		background-color: #f1f1f1;
		position: fixed;
		height: 100%;
		overflow: auto;
		border-radius: 10px;
	}

	#li_menu {
		display: block;
		color: #000;
		padding: 8px 16px;
		text-decoration: none;
	}     

	#li_menu:hover:not(.active)  {
		background-color: #555;
		color: white;
		border-radius: 5px;
	}
	li a.active {
		background-color: #4CAF50;
		color: white;
		border-radius: 5px;
	}		
	#li_menu_nome{
		background-color: #008B8B;
		padding: 2px;
		margin-top: 2px;
		border-radius: 5px;
	}

	#img_perfil{
		width: 150px;			
	}
	.navbar{
		position: fixed;
		width: 100%;
		margin-top: 0px;        
	}
	.link_perfil{
		color: white;
	}
	.table-responsive{
		width: 60%;
		margin-left: 25%; 
	}
	html,body,h1,h2,h3,h4,h5,h6 {
		font-family: "Roboto", sans-serif
	}	
	.w3-content{
		margin-top: 200px;
		font-size:  
	}
	.w3-bar{
		margin-left: -100px;
		border-top: inset;
	}
	letra1{
		color: red;
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
<!-- --------------teste novo layout------------- -->

<!-- Page Container -->
<br><br>
<div class="w3-content w3-margin-top" style="max-width:1400px;">
	<!-- The Grid -->
	<div class="w3-row-padding">
		<!-- Left Column -->
		<div class="w3-third">

			<div class="w3-white w3-text-grey w3-card-4">
				<div  style="background-color: #DCDCDC">
					<center><img src="img/user.png" style="width:50%" alt="Avatar"></center>
					<div class="w3-display-bottomleft w3-container w3-text-black">
						<h2></h2>
					</div>
				</div><br>
				<div class="w3-container">
					<p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo "$nome_usuario"?></p>

					<p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $dado1['email']; ?></p>
					<p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $dado1['tel']; ?></p>
					<hr>

					<a href="editar_perfil.php"><p class="w3-large"><b><i class="fa fa-edit fa-fw w3-margin-right w3-text-teal"></i>Editar dados</b></p></a>
					<p>Quantidade de animais: <b><?php echo "$num_de_animais"; ?></b>

						<a href="cadastro_pet.php">
							<div class="w3-light-grey w3-round-xlarge w3-small" style="width: 75%">
								<div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:100%">
									<div class="w3-center w3-text-white">Adicionar</div>
								</div>
							</div>
						</a>
						<p></p>          
						<div class="w3-light-grey w3-round-xlarge w3-small" style="width: 75%">
							<a href="perfil_principal.php"><div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:100%">Lista de animais</div></a>
						</div> 
						<p></p>          
						<div class="w3-light-grey w3-round-xlarge w3-small" style="width: 75%">
							<a href="mensagens.php"><div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:100%">Mensagens</div></a>
						</div>

						<br>
					</div>
				</div><br>
			</div>

			<!-- End Left Column -->




			<!-- -------------fim do teste ---------- -->



			<div class="container-fluid">



				<div class="w3-twothird" >	
					<div  class=" w3-card w3-white " style="width: 100%">

						<div>	

							<br><h3><M><center>Mensagens</center></M></h3><br>



							<?php
			// Buscando mensagens no banco de dados
							$consulta = "SELECT * FROM mensagens WHERE id_para = '$id_usuario' ORDER BY id DESC";
							$con = $mysqli->query($consulta) or die($mysqli->error);
							while ($dado = $con->fetch_array()) {
								$id_msg = $dado['id'];
								$id_de=$dado['id_de'];
								$nome_user= $dado['nome'];	
								$email=$dado['email'];
								$id_animal=$dado['id_animal'];
								$mensagem=$dado['mensagem'];

				//sql para buscar os nomes nas mensagens
								$consulta1 = "SELECT * FROM usuario WHERE id = '$id_de'";
								$con1 = $mysqli->query($consulta1) or die($mysqli->error);
								$dado1 = $con1->fetch_array();
								$dado_de_nome=$dado1['nome'];

								$consulta2 = "SELECT * FROM animal WHERE id = '$id_animal'";
								$con2 = $mysqli->query($consulta2) or die($mysqli->error);
								$dado2 = $con2->fetch_array();
								$dado_nome_animal=$dado2['nome'];

								if ($dado["email"] == NULL) {

									?>

									<div class="table-responsive" style="width: 90%; margin-left:10%;">
										<ul class="w3-ul w3-card-4" style="width: 100%" >
											<li class="w3-bar">
												<div style="margin-left: 10%">
													<a class="w3-bar-item w3-xlarge w3-right" href="deletar_msg.php?msg=<?php echo $id_msg ?>"><img width="25px;" src="img/icon/rubbish.png"></a>
													<a class="w3-bar-item w3-xlarge w3-right" href="resposta.php?animal=<?php echo $id_animal ?>&eu=<?php echo $id_usuario ?>&para=<?php echo $id_de ?>"><img width="25px;" src="img/icon/forward.png"></a>
													<img src="img/perfil.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
												</div>
												<div class="w3-bar-item">
													<span class="w3-large">De: <?php echo $dado_de_nome ?><br>
														<letra> Sobre:<letra1> <?php echo $dado_nome_animal; ?></letra1></letra></span><br>
														<span style="color: #20B2AA">Mensagen:<br><?php echo $mensagem; ?></span>

													</div>
												</li>
											</ul>

										</div>	
									<?php } else{
										?>

										<div class="table-responsive"  style="width: 90%; margin-left:100px;">
											<ul class="w3-ul w3-card-4" style="width: 100%">
												<li class="w3-bar">
													<div style="margin-left: 10%">
														<a class="w3-bar-item w3-xlarge w3-right" href="deletar_msg.php?msg=<?php echo $id_msg ?>"><img width="25px;" src="img/icon/rubbish.png"></a>

														<img src="img/perfil.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
													</div>
													<div class="w3-bar-item">
														<span class="w3-large">De: <?php echo $nome_user; ?><br>
															E-mail: <?php echo $email; ?><br>
															<letra> Sobre:<letra1> <?php echo $dado_nome_animal; ?></letra1></letra></span><br>
															<span>Mensagen:<br><?php echo $mensagem; ?></span>

														</div>
													</li>
												</ul>
											</div>	
										<?php  } }?>
									</div>

								</div>
							</div>

	<!-- script para esconder os icones da barra do topo -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- fim do script -->



</body>
</html>

<?php } ?>
