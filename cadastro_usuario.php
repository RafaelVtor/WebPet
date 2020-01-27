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

}

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Pessoas</title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/theme.css" type="text/css"> 
  <link rel="stylesheet" href="css/theme.css" type="w3/css"> 
  <link rel="stylesheet" href="css/wizard/style.css" type="text/css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


  <style>
  #perfil_pet{
    width: 40%;       
    margin-left: auto;
    margin-right: auto;
    min-width: 300px;
  } 
  .w3-input{
    height: 45px;
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




<br><br>
<div class="container" style="width: 45%; min-width: 350px; position: center; margin: auto;">
 <h3><b>Cadastre-se:</b></h3>
 É necessario se cadastrar para adicionar animais a nossa galeria.
 <div class="perfil_pet" >
   <form method="POST" class="w3-container w3-card-4">
    

    <label class="w3-text-green"><b>Nome:</b></label>
    <input class="w3-input w3-border" type="text" name="nome" required>


    <label class="w3-text-green"><b>E-mail:</b></label>
    <input class="w3-input w3-border " type="email" name="email" required> 


    <label class="w3-text-green"><b>Telefone:</b></label>
    <input class="w3-input w3-border" type="int" name="tel" required>
    

    <label class="w3-text-green"><b>Endereço:</b></label>
    <input class="w3-input w3-border" type="text" name="ender" required>


    <label class="w3-text-green"><b>Senha:</b></label>
    <input class="w3-input w3-border" type="password" name="senha"  required>
    <br>
    <input type="submit" name="Enviar" value="Cadastre-se" class="w3-btn w3-green" style="width: 180px; margin: initial;"><br>
    <a href="index.php" class="txt2 hov1" style="color: darkgreen;">
     Voltar
   </a>
<p>
   

 </form>  
</div> 
</div>
<br><br>




<?php 



/*----------------------------------------------Salvar dados nas variaveis--------------------------------------------------*/


if (isset($_POST['Enviar'])) {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $tel = $_POST["tel"];
  $ender = $_POST["ender"];
  $senha = md5($_POST["senha"]);



  /*Enviar para o banco de dados*/
  $enviar_bd = "INSERT INTO usuario (nome, email, tel, endereco, senha) values ('$nome','$email','$tel', '$ender', '$senha')";

  $bd_enviado=mysqli_query($mysqli, $enviar_bd);




  ?>

  <script>
   alert("Cadastro feito com sucesso! \n Você poderar fazer o login na tela inicial");
   location.href="index.php";
 </script>		


<?php	} ?>


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