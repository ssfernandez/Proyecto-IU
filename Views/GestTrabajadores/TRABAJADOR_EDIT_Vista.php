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
$ocup=$_GET['ocup'];
$dni=(isset($_REQUEST['dni']) ? $_REQUEST['dni']:"");
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/TRABAJADORES_Controller.php?idioma=esp&acc=¿Modificar?&ocup='.$ocup.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/TRABAJADORES_Controller.php?idioma=eng&acc=¿Modificar?&ocup='.$ocup.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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

	$aux=$_SESSION['consulta'];
	$comp=$_SESSION["autorizacion"];
	$aceptado=false;
	for ($i=0; $i < sizeof($comp); $i+=2){
		$cadena=$comp[$i].$comp[$i+1];
		if($cadena=="GEST_TRABAJEDIT"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>

<div>
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_EDIT_TRABAJ?></legend>
			</div>
		</fieldset>
		
	</div>

	<form onsubmit="return comprobarDatos()" action="../../Controllers/TRABAJADORES_Controller.php" method="POST">
		<fieldset>
			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="dninuevo">DNI</label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="dninuevo" name="dninuevo" type="text" placeholder="'.CAMPO_TRABAJ_DNI.'" class="form-control input-md"  onBlur="comprobarDNI(this)" value="'.$aux[0].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="nombre"><?=LABEL_NAME?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="nombre" name="nombre" type="text" placeholder="'.CAMPO_TRABAJ_NOMBRE.'" class="form-control input-md" onBlur="comprobarNombre(this)" value="'.$aux[1].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="apellidos"><?=LABEL_APELLIDOS?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="apellidos" name="apellidos" type="text" placeholder="'.CAMPO_TRABAJ_APELLIDOS.'" class="form-control input-md" value="'.$aux[2].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="ciudad"><?=LABEL_CIUDAD?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="ciudad" name="ciudad" type="text" placeholder="'.CAMPO_TRABAJ_CIUDAD.'" class="form-control input-md" value="'.$aux[3].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="calle"><?=LABEL_CALLE?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="calle" name="calle" type="text" placeholder="'.CAMPO_TRABAJ_CALLE.'" class="form-control input-md" value="'.$aux[4].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="numdir"><?=LABEL_NUMERO?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="numdir" name="numdir" type="text" placeholder="'.CAMPO_TRABAJ_NUMERO.'" class="form-control input-md" value="'.$aux[5].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="piso"><?=LABEL_PISO?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="piso" name="piso" type="text" placeholder="'.CAMPO_TRABAJ_PISO.'" class="form-control input-md" value="'.$aux[6].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="co"><?=LABEL_CP?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="cp" name="cp" type="number" placeholder="'.CAMPO_TRABAJ_CP.'" class="form-control input-md"  onBlur="comprobarCP(this)" value="'.$aux[7].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="email"><?=LABEL_EMAIL?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="email" name="email" type="email" placeholder="'.CAMPO_TRABAJ_EMAIL.'" class="form-control input-md"  onBlur="comprobarEmail(this)" value="'.$aux[8].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="fechanac"><?=LABEL_FNAC?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="fechanac" name="fechanac" type="date" placeholder="'.CAMPO_TRABAJ_FNAC.'" class="form-control input-md" value="'.$aux[9].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="obs"><?=LABEL_OBS?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="obs" name="obs" type="text" placeholder="'.CAMPO_TRABAJ_OBS.'" class="form-control input-md" value="'.$aux[10].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="ocup"><?=LABEL_OCUP?></label>
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="ocup" name="ocup" type="texto" placeholder="'.CAMPO_TRABAJ_OCUP.'" class="form-control input-md" readonly="readonly" value="'.$aux[11].'" required="">';
			  ?>
			  </div>			  

			  <label class="col-xs-4 control-label" for="sueldo"><?=LABEL_SUELDO?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="sueldo" name="sueldo" type="number" placeholder="'.CAMPO_TRABAJ_SUELDO.'" class="form-control input-md" value="'.$aux[12].'" required="">';
			  ?>
			  </div>			
		

			  <?php
			  if($ocup=='Monitor'){
			  ?>

			  <label class="col-xs-4 control-label" for="numcuenta"><?=LABEL_NUMCUENTA?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="numcuenta" name="numcuenta" type="text" placeholder="'.CAMPO_TRABAJ_NUMCUENTA.'" class="form-control input-md" onBlur="comprobarCuenta(this)" value="'.$aux[13].'" required="">';
			  ?>
			  </div>
			  

			  <label class="col-xs-4 control-label" for="foto"><?=LABEL_FOTO?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="foto" name="foto" type="file" class="form-control input-md" value="'.$aux[14].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="contrato"><?=LABEL_CONTRATO?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="contrato" name="contrato" type="file" class="form-control input-md" value="'.$aux[15].'" required="">';
			  ?>
			  </div>



			  <?php	
			  }else if($ocup=='Fisio'){
			  ?>

			  <label class="col-xs-4 control-label" for="numcuenta"><?=LABEL_NUMCUENTA?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="numcuenta" name="numcuenta" type="text" placeholder="'.CAMPO_TRABAJ_NUMCUENTA.'" class="form-control input-md" onBlur="comprobarCuenta(this)" value="'.$aux[13].'" required="">';
			  ?>
			  </div>

			  <label class="col-xs-4 control-label" for="numlicencia"><?=LABEL_NUMLICENCIA?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="numlicencia" name="numlicencia" type="text" placeholder="'.CAMPO_TRABAJ_NUMLICENCIA.'" class="form-control input-md" value="'.$aux[14].'" required="">';
			  ?>
			  </div>

			  

			  <?php
			  }
			  ?>
			
			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearTrabButtons">
			  <?php
			   echo '<input type="hidden" name="dni" value="'.$dni.'" >';
			   echo '<input type="hidden" name="acc" value="Modificar" >';
			   echo '<input type="submit" value="'.MODIFICAR.'" class="btn">';
			   ?>
			  </div>
			
		</fieldset>
	</form>
		<?php
}else{
	echo '<h1 class="form-signin-heading ">'.ERR_PERM.'</h1>';
}
?>
</body>
</html>