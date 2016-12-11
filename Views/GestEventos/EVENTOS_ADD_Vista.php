<?php
session_start();
if(!isset($_SESSION['idioma']))
{
	session_destroy();
	header("Location: ../../index.php?logout=true");
}

if(isset($SESSION['connected']) && $_SESSION['connected']== false)
{
	header("Location: ../../index.php");
}

include('../../Interfaz/Cabecera.php');
?>

<ul class= "dropdown-menu" role = "menu" id= "contBandera">
            <li class = "glyphicon glyphicon-user" id="user"> <? $_SESSION["user"] ?> </li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <li class="contBandera"><a href="../../Controllers/EVENTOS_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/EVENTOS_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
               </ul>
            </div>
            </div>
            </div>


<?php 
include('../../Interfaz/BarraLateral.php');
?>

<div class="col-xs-1">
</div>

<div class="col-xs-8"><!-- calendario -->
	<form onsubmit="return comprobarDatosPerfil()" action="../../Controllers/EVENTOS_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->

          <legend><?=TITULO_ADD_EVENT?></legend>
			<!-- Text input-->
			  <div class="col-xs-6">
			  
			  <?php
			  echo '<input id="nombreEv" name="nombreEv" type="text" placeholder="'.EVENT_NAME_INPUT.'" class="form-control input-md" >';
			  echo '<input id="fechaEv" name="fechaEv" type="date" class="form-control input-md">';
			  echo '<input id="precioEv" name="precioEv" type="number" step= "0.01" placeholder="'.EVENT_PRICE_INPUT.'" class="form-control input-md" onBlur= "comprobarPrecio(this)" >';
			  echo '<input id="descripcionEv" name="descripcionEv" type="textarea" placeholder="'.EVENT_DESCRIPTION_INPUT.'" class="form-control input-md" >';

			  ?>
			  </div>

			  <div class="col-xs-7" id="CrearPerfButtons">
			   
			   <?php
			   echo '<input type="hidden" name="acc" value="Insertar" >';
			   echo '<input type="submit" value="'.ADD.'" class="btn">';
			   ?>
			  </div>


			

			
		</fieldset>
	</form>
</div>
</div>
</body>
</html>
