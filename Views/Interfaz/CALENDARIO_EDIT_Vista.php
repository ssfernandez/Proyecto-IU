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
$activ=$_GET['activ'];
$hini=$_GET['hini'];
$hfin=$_GET['hfin'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CALENDARIO_Controller.php?idioma=esp&action=Modificar&activ='.$activ.'&hini='.$hini.'&hfin='.$hfin.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CALENDARIO_Controller.php?idioma=eng&action=Modificar&activ='.$activ.'&hini='.$hini.'&hfin='.$hfin.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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

<div class="col-xs-8"><!-- calendario -->

<?php
	$permisos=$_SESSION["autorizacion"];
	$aceptado=false;
	for ($i=0; $i < sizeof($permisos); $i+=2){
		$cadena=$permisos[$i].$permisos[$i+1];
		if($cadena=="GEST_CALENDARIOEDIT"){
			$aceptado=true;
		}
	}
	if($aceptado){
		echo '<form action="../../Controllers/CALENDARIO_Controller.php" method="POST">';
		$monitores=$_SESSION['moni_activ_cal'];
		$datos=$_SESSION['data_activ_cal'];
		$horas=$_SESSION['horas_activ_cal'];

		?>
		<fieldset>
			<!-- Form Name -->
				
				<legend><?=TITULO_EDIT_CALENDARIO?></legend>
				

				<!-- Text input-->
				<?php
				  echo "<input hidden='hidden' name='activAnt' value='".$activ."'>";
				  echo "<input hidden='hidden' name='hiniAnt' value='".$hini."'>";
				  echo "<input hidden='hidden' name='hfinAnt' value='".$hfin."'>";
				  echo "<label class='col-xs-4 control-label' for='activ'>".LABEL_NAME_ACTIV."</label>";
				  echo "<div class='col-xs-6'>";
				  echo "<input readonly='readonly' name='activ' type='text' placeholder='".$datos[0]."' value='".$datos[0]."' class='form-control input-md' >";
				  echo "</div>";

				  echo "<label class='col-xs-4 control-label' for='sala'>".LABEL_NAME_ESP."</label>";
				  echo "<div class='col-xs-6'>";
				  echo "<input readonly='readonly'  name='sala' type='text' placeholder='".$datos[1]."' value='".$datos[1]."' class='form-control input-md' >";
				  echo "</div>";

				  echo "<label class='col-xs-4 control-label' for='dia'>".DAY."</label>";
				  echo "<div class='col-xs-6'>";
				  echo "<select name='dia' class='form-control' class='form-control required=''>";
				  echo "<option value='".$datos[2]."'>".$datos[2]."</option>";
				  if($datos[2] != 'lunes'){
				  	echo "<option value='lunes'>lunes</option>";
				  }
				  if($datos[2] != 'martes'){
				  	echo "<option value='martes'>martes</option>";
				  }
				  if($datos[2] != 'miercoles'){
				  	echo "<option value='miercoles'>miercoles</option>";
				  }
				  if($datos[2] != 'jueves'){
				  	echo "<option value='jueves'>jueves</option>";
				  }
				  if($datos[2] != 'viernes'){
				  	echo "<option value='viernes'>viernes</option>";
				  }
				  if($datos[2] != 'sabado'){
				  	echo "<option value='sabado'>sabado</option>";
				  }
				  if($datos[2] != 'domingo'){
				  	echo "<option value='domingo'>domingo</option>";
				  }
				  echo "</select>";
				  echo "</div>";

				  echo "<label class='col-xs-4 control-label' for='horasCal'>".TIME_CAL."</label>";
				  echo "<div class='col-xs-6'>";
				  echo "<select name='horasCal' class='form-control' class='form-control required=''>";
				  echo "<option value='".$datos[3]."-".$datos[4]."'>".$datos[3]."-".$datos[4]."</option>";
				  foreach ($horas as $value) {
				  	if($value != $datos[3]."-".$datos[4]){
				  		echo "<option value='".$value."'>".$value."</option>";
				  	}
				  	
				  }
				  echo "</select>";
				  echo "</div>";

				  

				  echo "<label class='col-xs-4 control-label' for='dni'>".MONIT_EDIT_CAL."</label>";
				  echo "<div class='col-xs-6'>";
				  echo "<select name='dni' class='form-control' class='form-control required=''>";
				  echo "<option value='".$datos[5]."'>".$datos[6]."-".$datos[5]."</option>";
				  for ($i=0; $i < count($monitores); $i+=2) { 
				  	if($datos[5] != $monitores[$i+1])
				  	echo "<option value='".$monitores[$i+1]."'>".$monitores[$i]."-".$monitores[$i+1]."</option>";
				  }
				  echo "</select>";
				  echo "</div>";
				 ?>

				 

				  <div class="col-xs-7" id="CrearPerfButtons">
				 <?php
				   echo '<input type="hidden" name="action" value="Modificar" >';
				   echo '<input type="submit" value="'.MODIFICAR.'" class="btn" >';
				   ?>
				  </div>


				

				
			</fieldset>
		</form>
		<?php

	}else{
		echo '<h1 class="form-signin-heading ">'.ERR_PERM.'</h1>';
	}

?>

	
	
		
		
			
	</div>
	
</body>
</html>