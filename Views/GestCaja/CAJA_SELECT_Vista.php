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
            <li class="contBandera"><a href="../../Controllers/CAJA_Controller.php?idioma=esp&acc=Buscar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/CAJA_Controller.php?idioma=eng&acc=Buscar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form  action="../../Controllers/CAJA_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->

			<legend><?=TITULO_ADD_CAJA?></legend>


			<!-- Text input-->

			  <label class="col-xs-4 control-label" for="caja"><?=LABEL_DIA?></label>
			  <div class="col-xs-6">
			  <input type="date" name="caja" placeholder="" class="form-control input-md" required>
			  </div>



			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">
			  <?php
			   echo '<input type="hidden" name="acc" value="Consultar" >';
			   echo '<input type="submit" value="'.ADD.'" class="btn">';
			   ?>
			  </div>

		</fieldset>
	</form>
</div>
</div>
</body>
</html>
