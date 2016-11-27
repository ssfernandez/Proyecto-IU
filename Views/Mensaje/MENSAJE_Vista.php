<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
// Cargamos el fichero de idioma. Por defecto español.
if (isset($_REQUEST['idioma']) && $_REQUEST['idioma']!=''){
     $_SESSION["idioma"] = strtolower($_REQUEST['idioma']);
}elseif(isset($_SESSION["idioma"]) &&$_SESSION["idioma"] == ""){
   $_SESSION["idioma"] = "esp";
}
$idioma=$_SESSION['idioma'];
include("../../Assets/languages/".$idioma.".php");
    ?>
<!-- nav bar -->
<html>
 <head>
            <link rel="stylesheet" type="text/css" href="../../Assets/css/style.css" />
            <link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap-theme.css">
            <link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap-theme.min.css">
            <link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap-select.css">
            <link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap-select.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
            <script type="text/javascript" src="../../Assets/js/bootstrap.js"></script>
            <script type="text/javascript" src="../../Assets/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../../Assets/js/bootstrap-select.js"></script>
            <script type="text/javascript" src="../../Assets/js/bootstrap-select.min.js"></script>
            <script type="text/javascript" src="../../Assets/js/npm.js"></script>
            <script type="text/javascript" src="../../Assets/js/jquery.min.js"></script>
            <script type="text/javascript" src="../../Assets/js/jquery-3.1.1.min.js"></script>
            <script type="text/javascript" src="../../Assets/js/funciones_onblur.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
                
          </head>
          <body>
            <!-- Header -->
            <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
              
                <div class="navbar-header" id="logo">
                  <a class="navbar-brand" href="../../Controllers/HORARIO_Controller.php"><?=LOGO?></a>
                </div>
                
                <div class="btn-group" id="options">
                  <a class="btn glyphicon glyphicon-lock" href="../../index.php?logout=true" type="button" id="logout"><?=LOGOUT?></a>
                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" id="desplegable">
                          <span class="caret"></span>
                          <span class="sr-only"></span>
                  </button>
?>

<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <li class="contBandera"><a href="./MENSAJE_Vista.php?idioma=esp"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="./MENSAJE_Vista.php?idioma=eng"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
          </ul>
        </div>
          
        
      </div><!-- /container -->
    </div>
    <!-- /Header -->
  <?php
    include('../../Interfaz/BarraLateral.php');
?>
<div class="col-xs-1">
</div>

<div class="col-xs-8"><!-- mensaje -->
<?php
if (defined($_SESSION["mensaje"])) {
                  echo '<h1 class="form-signin-heading ">'.constant($_SESSION["mensaje"]).'</h1>';
                  
                  
                }else{
                  echo '<h1 class="form-signin-heading ">'.$_SESSION["mensaje"].'</h1>';
                }
?>

  <?php

    //header('refresh 3;url=../../index.php');
  ?>
  
</div>
</div>
</body>
</html>



