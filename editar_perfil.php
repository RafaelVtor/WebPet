<!DOCTYPE html>
<?php 
include("conexao.php"); 

session_start(); 
$id_usuario = NULL;
if (isset($_SESSION['id'])) {
  $id_usuario = $_SESSION['id'];
  $nome_usuario = $_SESSION['nome'];

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Perfil</title>

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


<!-- carregando dados -->
<?php  
$velho_id	=	$_SESSION['id'];
$velho_nome	=	$_SESSION['nome'];
$velho_email=	$_SESSION['email'];
$velho_tel	=	$_SESSION['tel'];
$velho_endereco=$_SESSION['endereco'];
$velho_senha=	$_SESSION['senha'];
?>


<div class="container">
  <div id="perfil_pet"><br>
   <h3><b>Edite seus dados pessoais</b></h3>
   Obs:Altere somente os campos que vc deseja modificar! 
   <form class="w3-container w3-card-4" method="POST" action="editar.php?n=1" style="height: 520px; ">

    <label class="w3-text-green"><b>Nome</b></label>
    <input class="w3-input w3-border" type="text" name="nome" value="<?php echo $velho_nome ?>">		

    <label class="w3-text-green"><b>E-mail</b></label>
    <input class="w3-input w3-border" type="text" name="email" value ="<?php echo $velho_email ?>">

    <label class="w3-text-green"><b>Telefone</b></label>
    <input class="w3-input w3-border" type="text" name="tel" value="<?php echo $velho_tel ?>">

    <label class="w3-text-green"><b>Endereço</b></label>
    <input class="w3-input w3-border" type="text" name="ender" value="<?php echo $velho_endereco ?>">

    <label class="w3-text-green"><b>Senha</b></label><br>
    <button type="button" class="btn" data-toggle="modal" data-target="#myModal">Alterar Senha</button><br>
   <!-- <input class="w3-input w3-border" type="password" name="senha"> -->

    <br>

    <input type="hidden" name="acao" value="enviado">
    <button id="alterar" class="w3-btn w3-blue-grey">Alterar</button>
    <a href="perfil_principal.php" class="w3-btn w3-blue-grey">Voltar</a>

  </form>
</div>
</div>
<br>
<br>



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <form  method="POST" action="editar_senha.php">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Altere sua senha</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
       
      <div class="modal-body">

       
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="senha_antiga">Senha antiga</label>
              <input type="password" name="senha_antiga" id="senha_antiga" class="form-control">
            </div>
            <div class="col-md-12">
              <label for="senha_nova form-group">Nova senha</label>
              <input type="password" name="senha_nova" id="senha_nova" onkeyup="checarSenha()" class="form-control">
            </div>
            <div class="col-md-12 form-group">
              <label for="senha_confirmar">Confirmar senha</label>
              <input type="password" name="senha_confirmar" id="senha_confirmar" onkeyup="checarSenha()" class="form-control">
            </div>
            <div class="col-md-12">
             <div id="divcheck">               
             </div>
            </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-style: hidden; border-radius: 5px;">Fechar</button>
        <button type="submit" class="btn btn-primary" id="enviarsenha" disabled style="background-color: #32CD32; border-style: hidden; border-radius: 5px;">Salvar</button>
      </div>       
    </div>
  </div>
  </div>
</form>
 
</div>


<!-- script para erificar se senhas digitadas são iguais -->

<script>
  $(document).ready(function(){
    $("#senha_nova").keyup(checkPasswordMatch);
    $("#senha_confirmar").keyup(checkPasswordMatch);
  });
  function checarSenha(){
    var password = $("#senha_nova").val();
    var confirmPassword = $("#senha_confirmar").val();

    if (password != confirmPassword || (password=='' || ''== confirmPassword)) {
      $("#divcheck").html("<span style='color:red'> Senhas não conferem!<span>");
      document.getElementById("enviarsenha").disabled = true;
    } else {
      $("#divcheck").html("<span style='color:green'> Senhas iguais!<span>");
      document.getElementById("enviarsenha").disabled = false;
    }
  }
</script>



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

<?php }
 ?>