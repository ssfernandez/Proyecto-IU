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
$coddes=$_GET['coddes'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/DESCUENTO_Controller.php?idioma=esp&acc=Modificar&coddes='.$coddes.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/DESCUENTO_Controller.php?idioma=eng&acc=Modificar&coddes='.$coddes.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_DESCEDIT"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>

<div>
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_EDIT_DISCOUNT?></legend>
			</div>
		</fieldset>
		
	</div>

	<form action="../../Controllers/DESCUENTO_Controller.php" method="POST">
		<fieldset>
			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="coddes"><?=LABEL_COD_DISCOUNT?></label>  
			  <div class="col-xs-6">
			  <input type="text" name="coddes" placeholder="" class="form-control input-md" value="<?php $a=$_SESSION['datosModDis']; echo $a[0]; ?>" readonly="readonly" required>
			  </div>


			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="porcentaje"><?=LABEL_PORCE?></label>  
			  <div class="col-xs-6">
			  <input type="text" name="porcentaje" class="form-control input-md" value="<?php $a=$_SESSION['datosModDis']; echo $a[1]; ?>" required>
			    
			  </div>





			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="descuento"><?=LABEL_DISCOUNT?></label>  
			  <div class="col-xs-6">
			  <input type="text" name="descuento" class="form-control input-md" value="<?php $a=$_SESSION['datosModDis']; echo $a[2]; ?>">
			  </div>
				<div class="col-xs-6">
			  <label class="col-xs-4 control-label" for="activo" ><?=LABEL_ACTIVE?></label>
			  <input type="checkbox" name="activo" value="ACTIV" 
			  <?php
			  $a=$_SESSION['datosModDis'];
			  if($a[3]==1){
			  	echo 'checked="checked"';
			  }
			  ?>
			  >ACTIV
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