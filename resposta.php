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
  (isset($_GET['animal'])) ?  $id_animal = $_GET['animal'] : $id_animal = null;
  $para_id=$_GET['para'];
  

  $sql2 = "SELECT * FROM animal WHERE id = '$id_animal'";
  $con = $mysqli->query($sql2) or die($mysqli->error);
  $dado_pet = $con->fetch_array();
  $pet_nome=$dado_pet['nome'];


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
  <link rel="stylesheet" href="css/wizard/style.css" type="text/css">

  <style>
  #div_bloco_foto{
    margin-top: 35px;
    margin-left: 30px;        
  }
  td{
    font-size: large; 

  }
  #corpo{
    margin-top: 40px;
  }

}
#table_lista{
  width: 60%;  
  margin-left: 5%;      
}
#div_bloco_foto{
  border-color: #5F9EA0;
  border-style: groove;
  border-width: 5px;
  width: 261px;
}
.link_perfil{
  color: white;
}
#div_bloco_pesquisa{
  width: 30%;

}
#perfil_pet{
  width: 80%;  
  margin-left: 12%;
}
#font_b{
  font-size: 20px;
}
.w3-container{
  height: 370px;
}
#msg{
  width: 640px;
  height: 150px;
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
.row2 {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}
#img{
  width: 250px ;
  height: 250px;
  object-fit: cover;
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
.modal-header, .close {
  background-color: #5cb85c;
  color:white !important;
  text-align: center;
  font-size: 30px;
}
.modal-footer {
  background-color: #f9f9f9;
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


<?php

$consulta = "SELECT * FROM animal WHERE id = '$id_animal'";
$con = $mysqli->query($consulta) or die($mysqli->error);
$dado = $con->fetch_array();
$nome_pet=$dado['nome'];
$foto = $dado['foto'];





$consulta = "SELECT * FROM usuario  WHERE id = '$para_id'";
$con = $mysqli->query($consulta) or die($mysqli->error);
$dado1 = $con->fetch_array();
$voce_id=$dado1['id'];
$voce_nome=$dado1['nome'];



?>
<br>
<div class="container">
  <div id="perfil_pet">
    <center><h3><b>Envie sua mensagens</b></h3></center>
    <form class="w3-container w3-card-4" style="width: 65%; height: 550px; margin-left: 17%;" method="POST" action="enviar.php"><br>

      <table>
        <thead>
          <tr>
            <td>
            <label class="w3-text-green" style="font-size: 20px;"><b>De: <?php echo $nome_usuario; ?> </b></label><br>
            
            <label class="w3-text-green" style="font-size: 20px;"><b>Para: <?php echo  $voce_nome; ?> </b></label><br>
            
            <label class="w3-text-green" style="font-size: 20px;"><b>Interessado em: <?php echo $nome_pet; ?></b></label>
            </td>
          </tr>
          <tr>
            <center><img style="border-style: solid;" src="foto_pet/<?php echo $foto?>" width="200px" height="200px" ></center>
         </tr>
       </thead>
     </table>
    

     <input type="hidden" name="voce_id" value="<?php echo  $voce_id ?>">
     <input type="hidden" name="animal_id" value="<?php echo $id_animal ?>">


     <textarea name="mensagem" style="width: 100%; height: 90px;" placeholder="Escreva aqui e entre em contado com o dono de <?php echo $nome_pet ?>" row="4" cols="50"></textarea></br>        

     <input type="hidden" name="acao" value="enviado">
     <button class="w3-btn w3-green">Enviar</button>
     <a href="mensagens.php" class="w3-btn w3-blue-grey">Voltar</a>      
   </form>

 </div>
</div>
<br>
<br>

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

<?php } ?>