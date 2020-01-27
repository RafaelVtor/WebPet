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
  //buscando os animais no banco de dados
$consulta = "SELECT * FROM animal";
$con = $mysqli->query($consulta) or die($mysqli->error);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/theme.css" type="text/css"> 
  <link rel="stylesheet" href="css/w3.css" type="text/css"> 
  <link rel="stylesheet" href="css/wizard/style.css" type="text/css">




  <!-- <link rel="stylesheet" type="text/css" href="bootstrap-4/css/bootstrap.css"> -->

  <style>
  .link_perfil{
    color: white;
  }
  #barra_superior{
    background-color: #12bbad;
  }
  #barra_meio{
    margin-left: 40%;
    margin-right: 30%;
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
.modal-header, h4, .close {
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
  <div style="min-height: 1800px">



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

<div class="w3-green w3-row w3-bar w3-large" style="border-top-left-radius: 20px; border-top-right-radius: 20px;"> 

  <div id="barra_meio" style="font-size: 20px;">
    Não compre, adote!
  </div>

</div>

<div>
  <div class="w3-content w3-section" style="max-width:90%">
    <img class="mySlides w3-hover-opacity" src="img/adote_3.png" style="width:100%">
    <!-- <img class="mySlides w3-grayscale-min w3-hover-opacity" src="img/pet_2.jpg" style="width:100%"> -->

  </div>

  <br><h2 class="w3-center"><b>Encontre um companheiro:</b></h2><br>
  <div class="padded-box row">

    <?php while ($dado = $con->fetch_array()) { ?>
      <?php $foto = $dado["foto"]; ?>
      <div class="col-md-4">
        <div class="card-body">
         <img  class="w3-circle" style="border-width: 2px; border-style: solid;" src="<?php echo "foto_pet/$foto"?>">  
         <div class="w3-card" style="width: 280px" >
          <center>     
           <p class="card-text"><h5 style="padding: 3px;"><b>&nbsp&nbsp<?php echo $dado["nome"]; ?></b></h5>
            <h5 style="padding: 3px;"><b>&nbsp&nbsp<?php echo $dado["idade"]; ?>&nbsp&nbspanos</b></h5><p>
              <a href="perfil_animal.php?animal=<?php echo $dado['id']; ?>" id="btn" class="btn btn-secondary" style="border-radius: 5px;">Perfil completo</a>   </p>    </p></center>
            </div>
          </div>
        </div>  
      <?php } ?>

    </div>


    <!-- Script para o carousel das imagens -->

    <script>
      var myIndex = 0;
      carousel();

      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
       }
       myIndex++;
       if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // troca imagem a cada 2 segundos
  }
</script>



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
       <h4><span class="glyphicon glyphicon-lock"></span> Entrar</h4>
       <button type="button" class="close" data-dismiss="modal" >&times;</button>
       
     </div>
     <div class="modal-body" style="padding:40px 50px;">
      <form method="POST" action="validar_login.php">
        <div class="form-group">
          <label for="usrname"><span class="glyphicon glyphicon-user"></span> Nome</label>
          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
          <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
        </div>            
        <input type="submit" class="btn btn-success btn-block" value="Entrar" style="border-radius: 5px;">
      </form>
    </div>
    <div class="modal-footer">
      <p>Não é cadastrado? <a href="cadastro_usuario.php">Cadastre-se</a></p><br>
      <button type="submit" class="btn btn-danger btn-default pull-left" style="border-radius: 5px;" data-dismiss="modal"><span class="glyphicon glyphicon-remove"> Cancelar</span></button>
      
      
    </div>
  </div>
  
</div>
</div> 
</div>

<script>
  $(document).ready(function(){
    $("#myBtn").click(function(){
      $("#myModal").modal();
    });
  });
</script>

<!-- fim do modal -->



<!-- script para esconder os icones da barra do topo -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- fim do script -->


</div>


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