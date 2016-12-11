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
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <li class="contBandera"><a href="../../Controllers/CLIENTE_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/CLIENTE_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form action="../../Controllers/CLIENTE_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_ADD_CLIENTE?></legend>
			</div>

			<!-- Text input-->

			<label class="col-xs-4 control-label" for="nombre"><?=LABEL_NAME?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="nombre" name="nombre" type="text" placeholder="'.CAMPO_CLIENTE_NAME.'" class="form-control input-md" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="apellidos"><?=LABEL_SURNAME?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="apellidos" name="apellidos" type="text" placeholder="'.CAMPO_CLIENTE_SURNAME.'" class="form-control input-md" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="dni">DNI</label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="dni" name="dni" type="text" placeholder="'.CAMPO_USER_DNI.'" class="form-control input-md" onBlur="comprobarDNI(this)" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="fecha_nac"><?=LABEL_BIRTH?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="fecha_nac" name="fecha_nac" type="date" step="1" placeholder="AAAA-MM-DD"  class="form-control input-md"  required="">';
			  ?>
			  </div>

			   <!-- Text input-->

			  <label class="col-xs-4 control-label" for="email"><?=LABEL_EMAIL?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="email" name="email" type="text" placeholder="'.CAMPO_CLIEXT_EMAIL.'" class="form-control input-md" onBlur="comprobarEmail(this)" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="ciudad"><?=LABEL_CIUDAD?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="ciudad" name="ciudad" type="text" placeholder="'.CAMPO_CLIENTE_CIUDAD.'" class="form-control input-md"  required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="calle"><?=LABEL_CALLE?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="calle" name="calle" type="text" placeholder="'.CAMPO_CLIENTE_CALLE.'" class="form-control input-md"  required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="numero"><?=LABEL_NUMERO?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="numero" name="numero" type="text" placeholder="'.CAMPO_CLIENTE_NUMERO.'" class="form-control input-md" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="piso"><?=LABEL_PISO?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="piso" name="piso" type="text" placeholder="'.CAMPO_CLIENTE_PISO.'" class="form-control input-md" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="cp"><?=LABEL_CP?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="cp" name="cp" type="text" placeholder="'.CAMPO_CLIENTE_CP.'" class="form-control input-md" onBlur="comprobarCP(this)" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="profesion"><?=LABEL_PROFESION?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="profesion" name="profesion" type="text" placeholder="'.CAMPO_CLIENTE_PROFESION.'" class="form-control input-md" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="numcuenta_u"><?=LABEL_NUMCUENTA_U?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="numcuenta_u" name="numcuenta_u" type="text" placeholder="'.CAMPO_CLIENTE_NUMCUENTA_U.'" class="form-control input-md" onBlur="comprobarCuenta(this)" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="pagos_pend"><?=LABEL_PAGOS_PEND?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="pagos_pend" name="pagos_pend" type="text" placeholder="'.CAMPO_CLIENTE_PAGOS_PEND.'" class="form-control input-md" required="">';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="especial"><?=LABEL_ESPECIAL?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="especial" name="especial" type="checkbox" value="1" class="form-control input-md"> ';
			  ?>
			  </div>

			  <!-- Text input-->

			  <label class="col-xs-4 control-label" for="observaciones"><?=LABEL_OBSERVACIONES?></label>
				<div class="col-xs-6">
				<textarea style="resize:none" name="observaciones" maxlength="500"  cols="30" rows="5" class="form-control input-md"></textarea>
				</div>

			  <!-- Text input-->

			 <label class="col-xs-4 control-label" for="protec_datos"><?=LABEL_PROTEC_DATOS?></label>
				<div class="col-xs-6">
				<textarea style="resize:none" name="protec_datos" maxlength="500"  cols="30" rows="5" class="form-control input-md"></textarea>
				</div>



			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearClientButtons">
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