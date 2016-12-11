<?php
session_start();
if(!isset($_SESSION['idioma']) ){
    session_destroy();
    header("Location: ../../index.php?logout=true");
  }
$hoy=date('Y-m-d');


if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <li class="contBandera"><a href="../../Controllers/HORARIOS_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/HORARIOS_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form onsubmit="return comprobarDatos()" action="../../Controllers/HORARIOS_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_ADD_HORARIO?></legend>
			</div>




        <!-- Text input-->

          <label class="col-xs-4 control-label" for="precio"><?=HORAI_RESERVA?></label>
          <div class="col-xs-6">
          <?php
          echo '<input id="horai" name="horai" type="text" placeholder="'.CAMPO_RESERVA_HORAI.'" class="form-control input-md" >';
           ?>
          </div>

          <label class="col-xs-4 control-label" for="precio"><?=HORAF_RESERVA?></label>
          <div class="col-xs-6">
          <?php
          echo '<input id="horaf" name="horaf" type="text" placeholder="'.CAMPO_RESERVA_HORAF.'" class="form-control input-md" onBlur="formHora(this)" required="">';
           ?>
          </div>





			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">
			  <?php
			   echo '<input type="hidden" name="acc" value="Insertar" >';
			   echo '<input type="submit" value="'.ADD.'" class="btn">';
			   //echo '<input type="reset" value="'.LIMPIAR.'" class="btn" id="resetUsrAdd">';
			   ?>
			  </div>

		</fieldset>
	</form>
</div>
</div>
</body>
</html>
