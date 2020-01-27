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
}
  //pega o id do animal pela URL
(isset($_GET['animal'])) ?  $id_animal = $_GET['animal'] : $id_animal = null;


$sql2 = "SELECT * FROM animal WHERE id = '$id_animal'";
$con = $mysqli->query($sql2) or die($mysqli->error);
$dado_pet = $con->fetch_array();



$consulta = "SELECT * FROM animal WHERE id = '$id_animal'";
$con = $mysqli->query($consulta) or die($mysqli->error);
$dado = $con->fetch_array();
$nome_pet=$dado['nome'];





$consulta = "SELECT u.nome, u.id, u.email, u.tel FROM usuario u JOIN animal a ON u.id = a.dono WHERE a.id = '$id_animal'";
$con = $mysqli->query($consulta) or die($mysqli->error);
$dado1 = $con->fetch_array();
$voce_id=$dado1['id'];
$voce_nome=$dado1['nome'];
$voce_email=$dado1['email'];
$voce_tel=$dado1['tel'];







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

<div class="w3">
 <img class="d-block img-fluid w-100" src="img/adote1.jpg">
</div>
<br><br>
 <h3 style=" width: 60%; color: black; margin-left: 10%;">Informações sobre:&nbsp&nbsp<b><?php echo $dado['nome']; ?></b></h3>

<?php

$consulta = "SELECT * FROM animal WHERE id = '$id_animal'";
$con = $mysqli->query($consulta) or die($mysqli->error);
$dado = $con->fetch_array()
?>
<div id="corpo">

  <dir class="w3-row" style="width: 85%; margin-left: 10%; height: -100px; border-bottom: ridge; border-top: ridge; padding-top: 25px; padding-bottom: 25px;">
    <div class="w3-col w3-container m4 l3 ">
    <div style="height: 280px;"><?php $foto = $dado["foto"]; ?>
   <img id="img" src="<?php echo "foto_pet/$foto" ?>" ></div>
  </div>
  <div class="w3-col w3-container m8 l9">  
    <table id="table_lista">
     <tr>
      <td><b>Nome:</b></td>
      <td><?php echo $dado['nome'] ?></td>          
    </tr>       
    <tr>          
     <td><b>Tipo:</b></td>
     <td><?php echo $dado["tipo"]; ?></td>          
   </tr> 
   <tr>         
     <td><b>Idade:</b></td>
     <td><?php echo $dado["idade"]; ?></td>         
   </tr> 
   <tr>         
     <td><b>Vacinas:</b></td>
     <td><?php echo $dado["vacinas"]; ?></td>         
   </tr> 
   <tr>         
     <td><b>Observações:</b></td>
     <td><?php echo $dado["obs"]; ?></td>         
   </tr> 
   <tr>         
     <td><b>Informações do dono:</b></td>              
   </tr> 
   <tr>         
     <td><b>Nome:</b></td>
     <td><?php echo $dado1["nome"]; ?></td>         
   </tr> 
   <tr>         
     <td><b>Tel:</b></td>
     <td><?php echo $dado1["tel"]; ?></td>         
   </tr> 
   <tr>         
     <td><b>E-mail:</b></td>
     <td><?php echo $dado1["email"]; ?></td>         
   </tr> 
 </table> 

  </div>
  <br><br>
  
  
</dir>
<center><h4>Se interessou? Escreva uma mensagem ao dono demostrando seu interesse em adotar o animal.</h4></center><p><br>
<br>



 <?php if (isset($_SESSION['id'])) { ?>


  <div id="perfil_pet" style="margin-top: -50px;">
    

   <form class="w3-container w3-card-4" method="POST" action="enviar.php?id_pet=<?php echo $id_animal ?>">
    <label class="w3-text"><b id="font_b">De: <?php echo $nome_usuario; ?> </b></label><br>


    <label class="w3-text"><b id="font_b">Para: <?php echo  $voce_nome; ?> </b></label><br>

    <label class="w3-text"><b id="font_b">Interessado em: <?php echo $nome_pet; ?></b></label><br>  

    <input type="hidden" name="voce_id" value="<?php echo  $voce_id ?>">
    <input type="hidden" name="animal_id" value="<?php echo $id_animal ?>">


    <textarea id="msg"name="mensagem" style="width: 100%;" placeholder="Escreva aqui e entre em contado com o dono de <?php echo $nome_pet ?>" row="4" cols="50"></textarea></br>        

    <input type="hidden" name="acao" value="enviado">
    <button class="w3-btn w3-green">Enviar</button>
    <a href="lista_animais_2.php?pet=<?php echo $dado['tipo'] ?> " class="w3-btn w3-blue-grey">Voltar</a>
  </form>
</div>
<?php } else { ?>


  <div id="perfil_pet" style="margin-top: -50px;" ><br>

   <form class="w3-container w3-card-4" method="POST" action="enviar.php?id_pet=<?php echo $id_animal ?>" style="height: 450px;"><br>
    <label class="w3-text"><b id="font_b">De: </b></label>
    <input type="text" name="nome_user">
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label class="w3-text"><b id="font_b">E-mail: </b></label>
    <input type="text" name="email" style="width: 25%;"><br>


    <label class="w3-text"><b id="font_b">Para o dono: <?php echo  $voce_nome; ?> </b></label><br>
    <label class="w3-text"><b id="font_b">Interessado em: <?php echo $nome_pet; ?></b></label><br>  

    <input type="hidden" name="voce_id" value="<?php echo  $voce_id ?>">
    <input type="hidden" name="animal_id" value="<?php echo $id_animal ?>">


    <textarea id="msg" name="mensagem" style="width: 98%;" placeholder="Escreva aqui e entre em contado com o dono de <?php echo $nome_pet ?>"></textarea></br><br>        

    <input type="hidden" name="acao" value="enviado">
    <button class="w3-btn w3-green"><b>Enviar</b></button>
    <a href="lista_animais_2.php?pet=<?php echo $dado['tipo'] ?> " class="w3-btn w3-blue-grey">Voltar</a>
  </form><br>

<?php } ?>



</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<br>
<br>
<br>

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