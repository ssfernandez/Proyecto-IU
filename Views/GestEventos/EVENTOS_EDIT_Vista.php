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
$nombreEv=$_GET['nombreEv'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/EVENTOS_Controller.php?idioma=esp&acc=Modificar&nombreEv='.$nombreEv.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/EVENTOS_Controller.php?idioma=eng&acc=Modificar&nombreEv='.$nombreEv.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_EVENTEDIT"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>

<div>
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_EDIT_EVENT?></legend>
			</div>
		</fieldset>
		
	</div>

	<form onsubmit="return comprobarDatos()" action="../../Controllers/EVENTOS_Controller.php" method="POST">
		<fieldset>
			<!-- Text input-->
			  <label class="col-xs-4 control-label" for="nombreEv"><?=EVENT_NAME_INPUT?></label>  
			  <div class="col-xs-6">
			  <input type="text" name="nombreEv" class="form-control input-md" readonly="readonly" value="<?php $a=$_SESSION['eventMod']; echo $a[0]; ?>">
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="precioEv"><?=EVENT_PRICE_INPUT?></label>  
			  <div class="col-xs-6">
			  <input type="number"  step="0.01" name="precioEv" class="form-control input-md" value="<?php $a=$_SESSION['eventMod']; echo $a[1]; ?>"
			  onBlur="comprobarPrecio(this)" required>
			    
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="fechaEv"><?=DATE_INPUT?></label>  
			  <div class="col-xs-6">
			  <input type="date" name="fechaEv" class="form-control input-md" value="<?php $a=$_SESSION['eventMod']; echo $a[2]; ?>">
			    
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="descripcionEv"><?=EVENT_DESCRIPTION_INPUT?></label>  
			  <div class="col-xs-6">
			  <input type="text" name="descripcionEv" class="form-control input-md" value="<?php $a=$_SESSION['eventMod']; echo $a[3]; ?>" >
			    
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