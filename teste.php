<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/theme.css" type="text/css"> 
  <link rel="stylesheet" href="css/theme.css" type="w3/css"> 
  <link rel="stylesheet" href="css/wizard/style.css" type="text/css">
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

</body>
</html>