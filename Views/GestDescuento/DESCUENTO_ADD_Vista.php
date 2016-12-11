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
            <li class="contBandera"><a href="../../Controllers/DESCUENTO_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/DESCUENTO_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form action="../../Controllers/DESCUENTO_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=TITULO_ADD_DISCOUNT?></legend>
			
			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="coddes"><?=LABEL_COD_DISCOUNT?></label>  
			  <div class="col-xs-6">
			  <input type="text" name="coddes" placeholder="" class="form-control input-md" onblur="comprobarDescuento(this)" required>
			  </div>

			<!-- Text input-->

			<label class="col-xs-4 control-label" for="porcentaje"><?=LABEL_PORCE?></label>  
			  <div class="col-xs-6">
			  <input type="number" name="porcentaje" min="0" max="30" step="0.5" placeholder="" class="form-control input-md" required>
			  </div>
			

			<!-- Text input-->

			  <label class="col-xs-4 control-label" for="descuento"><?=LABEL_DISCOUNT?></label>  
			  <div class="col-xs-6">
			  <input type="text" name="descuento" placeholder="" onblur="comprobarDescuento(this)" class="form-control input-md" required>
			  </div>

			  <label class="col-xs-4 control-label" for="activo" ><?=LABEL_ACTIVE?></label>
			  <div class="col-xs-6">
			  <input type="checkbox" name="activo" value="ACTIV">ACTIV</br>
				</div>
			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">
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
