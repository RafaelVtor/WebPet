<?php 
session_start(); 
$id_usuario = NULL;
if (isset($_SESSION['id'])) {
  $id_usuario = $_SESSION['id'];
  $nome_usuario = $_SESSION['nome'];

}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inicio</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="Login_v19/css/main.css">
  <link rel="stylesheet" type="text/css" href="Login_v19/css/util.css">
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" href="css/wizard/style.css" type="text/css">

  <style>
  .link_perfil{
    color: white;
  }
  .input100{
    font-size: 15px;
  }
  .login100-form-btn{
    background-color: #12bbad;
  }
  .login100-form-title {
    font-size: 25px;
  }
  .bt-voltar{
    display: block;
    font-family: OpenSans-Regular;
    font-size: 15px;
    color: #555555;
    line-height: 1.2;
    text-align: center;
    background-color: #12bbad; 
    color: white;
    width: 100px;

  }
</style>

</head>
<body id="body_login">

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
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mais</a>
              <div class="dropdown-menu navbar-dark bg-primary">
                <a class="dropdown-item" href="examples.html">Style Examples</a>
                <a class="dropdown-item" href="three-column.html">Three Column</a>
                <a class="dropdown-item" href="one-column.html">Contato</a>
                <a class="dropdown-item"  href="text.html">Informações</a>
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

            echo "<a class='btn btn-secondary my-2 my-sm-0' href='login.php'>Entrar <i class='fa d-inline fa-lg fa-user-circle-o' ></i></a>"; 
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
if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>




<!-- testanto o novo login -->

<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
      <form class="login100-form validate-form" method="POST" action="validar_login.php">
        <span class="login100-form-title p-b-33">
          Logue-se para gerenciar seu pets 
        </span>

        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <input class="input100" type="text" name="usuario" placeholder="Digite seu usuário">
          <span class="focus-input100-1"></span>
          <span class="focus-input100-2"></span>
        </div>

        <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
          <input class="input100" type="password" name="senha" placeholder="Digite sua senha">
          <span class="focus-input100-1"></span>
          <span class="focus-input100-2"></span>
        </div>

        <div class="container-login100-form-btn m-t-20">
          <button class="login100-form-btn">
            Entrar
          </button>
        </div>

        <div class="text-center p-t-45 p-b-4">          

          <a href="index.php" class="txt2 hov1">
           Voltar
         </a>
       </div>

       

       <div class="text-center">
        <span class="txt1">
         Não é cadastrado?
       </span>

       <a href="cadastro_usuario.php" class="txt2 hov1">
        Cadastre-se!
      </a>
    </div>
  </form>
</div>
</div>
</div>


<!-- script para esconder os icones da barra do topo -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- fim do script -->

<!-- ------- Footer ------------- -->


<footer class="footer">
  <div class="footer-lists">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <ul>
            <li><h4>Frameworks</h4></li><br>
            <li><a href="#">Bootstrap</a></li>
          </ul>
        </div>
        <div class="col-sm">
          <ul>
            <li><h4>Tecnologias</h4></li>
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">PHP</a></li>
            <li><a href="#">MySQL</a></li>
            <li><a href="#">Cras dictum</a></li>
          </ul>
        </div>   
        <div class="col-sm">
          <h4>Objetivo</h4>
          <p>O objetivo deste projeto é facilitar o ato de adoção de animais, servindo como um intermediário entre pessoas que têm interesse em adoção de pets.</p>          
        </div>
        <div class="col-sm">
          <ul>
            <li><h4>Contato</h4></li>
            <li><a href="#">rafaelvitor_as@hotmail.com </a></li>
            <li><a href="#">rafaelvitor.as@gmail.com</a></li>
            <li><a href="#">(71) 8611-6917</a></li>           
          </ul>
          <p class="social-icons">
            <a href="https://www.facebook.com/RafaelVtor"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="https://www.youtube.com/channel/UCKiDiDdZi0vtief2_noJTQQ"><i class="fa fa-youtube fa-2x"></i></a>
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