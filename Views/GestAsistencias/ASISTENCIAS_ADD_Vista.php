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
            <li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form action="../../Controllers/ASISTENCIAS_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_ADDD_ASIS?></legend>
			</div>

			<!-- Date input-->

			  <label class="col-xs-4 control-label" for="dia"><?=LABEL_DIA?></label>
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="dia" name="dia" type="date" class="form-control input-md" required>';
			  ?>
			  </div>

        <label class="col-xs-4 control-label" for="hora"><?=LABEL_HORA?></label>
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="hora" name="hora" type="time" class="form-control input-md" required>';
			  ?>
			  </div>

			<!-- Select Basic -->

      <label class="col-xs-4 control-label" for="dni"><?=LABEL_DNI?></label>
      <div class="col-xs-6">
        <select id="dni" name="dni" class="form-control" required="">
                      <?php

                        $aux = $_SESSION['dnis'];
                        foreach ($aux as $value) {
                          echo "<option value='".$value."'>".$value."</option>";
                        }
                      ?>
                                </select>
      </div>

      <label class="col-xs-4 control-label" for="cod"><?=LABEL_ACTIVIDAD?></label>
      <div class="col-xs-6">
        <select id="cod" name="cod" class="form-control" required="">
                      <?php

    			        						$aux = $_SESSION['actis'];
    													foreach ($aux as $value) {
    														echo "<option value='".$value."'>".$value."</option>";
    													}

                      ?>
                                </select>
      </div>

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
