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

/*
$dia=$_GET['dia'];
$hora=$_GET['hora'];
$cod=$_GET['cod'];
$nom=$_GET['nom'];
$ape=$_GET['ape'];
*/
$di = (isset($_REQUEST['dia']) ? $_REQUEST['dia']:"");
$dia = substr($di, 2, -2);
$hor = (isset($_REQUEST['hora']) ? $_REQUEST['hora']:"");
$hora = substr($hor, 2, -2);
$co = (isset($_REQUEST['cod']) ? $_REQUEST['cod']:"");
$cod = substr($co, 2, -2);
$no = (isset($_REQUEST['nom']) ? $_REQUEST['nom']:"");
$nom = substr($no, 2, -2);
$ap = (isset($_REQUEST['ape']) ? $_REQUEST['ape']:"");
$ape = substr($ap, 2, -2);


?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=esp&acc=Modificar&dia='.$dia.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=eng&acc=Modificar&dia='.$dia.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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

<div>
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_EDIT_ASIS?></legend>
			</div>
		</fieldset>

	</div>

	<form onsubmit="return comprobarDatos()" action="../../Controllers/ASISTENCIAS_Controller.php" method="POST">
		<fieldset>
			<!-- Text input-->

			  <label class="col-xs-4 control-label" for="dia"><?=LABEL_DIA?></label>
			  <div class="col-xs-6">
			  <input type="text" name="dia" class="form-control input-md" readonly="readonly" value="<?php  echo $dia; ?>">
			  </div>

        <!-- Text input-->

  			  <label class="col-xs-4 control-label" for="hora"><?=LABEL_HORA?></label>
  			  <div class="col-xs-6">
  			  <input type="text" name="hora" class="form-control input-md" readonly="readonly" value="<?php echo $hora; ?>"  required>

  			  </div>


			<!-- Text input-->

			  <label class="col-xs-4 control-label" for="cod"><?=LABEL_ACTIVIDAD?></label>
			  <div class="col-xs-6">
			  <input type="text" name="cod" class="form-control input-md" readonly="readonly" value="<?php  echo $cod; ?> " required>

			  </div>

        <!-- Text input-->

  			  <label class="col-xs-4 control-label" for="nom"><?=LABEL_NAME?></label>
  			  <div class="col-xs-6">
  			  <input type="text" name="nom" class="form-control input-md" readonly="readonly" value="<?php echo $nom; ?>"  required>

  			  </div>

          <!-- Text input-->

    			  <label class="col-xs-4 control-label" for="ape"><?=LABEL_APELLIDOS?></label>
    			  <div class="col-xs-6">
    			  <input type="text" name="ape" class="form-control input-md" readonly="readonly" value="<?php echo $ape; ?>"  required>

    			  </div>

			<!-- Select Basic -->

			  <label class="col-xs-4 control-label" for="asis"><?=LABEL_ASISTENCIA?></label>
			  <div class="col-xs-6">
          <select id="asis" name="asis" class="form-control" required="">
			        					<?php

														echo "<option value='1'>1</option>";
                            echo "<option value='0'>0</option>";

												?>
			                            </select>
			  </div>




			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">

			   <?php
			   echo '<input type="hidden" name="acc" value="Modificar" >';
			   echo '<input type="submit" value="'.MODIFICAR.'" class="btn" >';
			   ?>
			  </div>

		</fieldset>

	</form>




</body>
</html>
