
<?php 
	include("conexao.php");

	session_start(); 
	$id_usuario = NULL;
	if (isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];
    $nome_usuario = $_SESSION['nome'];
	}



	$consulta = "SELECT * FROM animal WHERE dono = '$id_usuario' " ;
	$con = $mysqli->query($consulta) or die($mysqli->error); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

  	<link rel="stylesheet" href="css/theme.css" type="text/css">
  	<link rel="stylesheet" href="css/estilo.css" type="text/css">

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
		#barra_topo{
			display: block;
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
		
	<div class="container-fluid">
		<div><br><br><br><br>	
			<div class="div_menu_lateral">		
				<ul class="ul_menu">

					<li><center><img id="img_perfil" src="img/user.png"></center></li>					
					<li id="li_menu_nome" class="active"><h1><center><?php echo "$nome_usuario"?></center></h1></li>
					<a href="editar_perfil.php"><li id="li_menu"><font color="#20B2AA">Editar perfil</font></li></a>
					<a href="chat.php"><li id="li_menu"><font color="#20B2AA">Mensagens</font></li></a>
					<a href="cadastro_pet.php"><li id="li_menu"><font color="#20B2AA">Adicionar Pet</font></li></a>
				</ul>
			</div>
		</div>	

		<div style="margin-left:10%;padding:1px 16px;height:100%;">	
			<h3><center>Mensagens</center></h3>
			<div id="div_tabela" class="table-responsive">
				
			</div>	
		</div>

	<!-- script para esconder os icones da barra do topo -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 	 <!-- fim do script -->

</body>
</html>

<!-- Novo perfil-->
