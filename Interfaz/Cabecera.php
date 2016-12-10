<?php
// Cargamos el fichero de idioma. Por defecto español.
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
            
            		
          </head>
          <body>
            <!-- Header -->
            <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
              
                <div class="navbar-header" id="logo">
                  <a class="navbar-brand" href="../../Controllers/CALENDARIO_Controller.php"><?=LOGO?></a>
                </div>
                
                <div class="btn-group" id="options">
                  <a class="btn glyphicon glyphicon-lock" href="../../index.php?logout=true" type="button" id="logout"><?=LOGOUT?></a>
                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" id="desplegable">
                          <span class="caret"></span>
                          <span class="sr-only"></span>
                  </button>
                
                  
</html>