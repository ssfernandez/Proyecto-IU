<?php
session_start();
if(!isset($_SESSION['idioma']) ){
    session_destroy();
    header("Location: ../../index.php?logout=true");
  }


if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
$dni=$_GET['dni'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CLIEXT_Controller.php?idioma=esp&acc=Modificar&dni='.$dni.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CLIEXT_Controller.php?idioma=eng&acc=Modificar&dni='.$dni.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
            ?>
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

<div class="col-xs-8"><!-- col8 -->
<?php

	$comp=$_SESSION["autorizacion"];
	$aceptado=false;
	for ($i=0; $i < sizeof($comp); $i+=2){
		$cadena=$comp[$i].$comp[$i+1];
		if($cadena=="GEST_CLIEXTEDIT"){
			$aceptado=true;
		}
	}
	if($aceptado){
		$data=$_SESSION['datosModCliExt'];
		?>

<div>
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_EDIT_CLIEXT?></legend>
			</div>
		</fieldset>
		
	</div>

	<form onsubmit="return comprobarDatos()" action="../../Controllers/CLIEXT_Controller.php" method="POST">
		<fieldset>
			
			<!-- Text input-->
		
			  <label class="col-xs-4 control-label" for="nom"><?=LABEL_NAME?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="nom" name="nom" type="text" value="'.$data[2].'" class="form-control input-md" required="">';
			  ?>
			  </div>

			  <!-- Text input-->
		
			  <label class="col-xs-4 control-label" for="email"><?=LABEL_EMAIL?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="email" name="email" type="email" value="'.$data[0].'" class="form-control input-md" required="">';
			  ?>
			  </div>

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="dni">DNI</label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="dni" name="dniMod" type="text" value="'.$data[1].'" class="form-control input-md"  onBlur="comprobarDNI(this)" required="">';
			   ?>
			  </div>
			  
			

			
			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">
			   
			   <?php
			   echo '<input type="hidden" name="acc" value="Modificar" >';
			   echo '<input type="submit" value="'.MODIFICAR.'" class="btn" >';
			   ?>
			  </div>
			
		</fieldset>
		<?php
}else{
	echo '<h1 class="form-signin-heading ">'.ERR_PERM.'</h1>';
}
?>
	</form>



	
</body>
</html>