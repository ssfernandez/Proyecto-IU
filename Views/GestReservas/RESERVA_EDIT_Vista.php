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
$idr=$_GET['idr'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/RESERVAS_Controller.php?idioma=esp&acc=Modificar&idr='.$idr.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/RESERVAS_Controller.php?idioma=eng&acc=Modificar&idr='.$idr.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_RESERVEDIT"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>

<div>
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_EDIT_RESERVA?></legend>
			</div>
		</fieldset>

	</div>

	<form onsubmit="return comprobarDatos()" action="../../Controllers/RESERVAS_Controller.php?idr=<?php $a=$_SESSION['datosModRes']; echo $a[0]; ?>" method="POST">
		<fieldset>
			<!-- Text input-->

			  <label class="col-xs-4 control-label" for="codigo"><?=LABEL_CODIGO?></label>
			  <div class="col-xs-6">
			  <input type="text" name="codigo" class="form-control input-md" readonly="readonly" value="<?php $a=$_SESSION['datosModRes']; echo $a[0]; ?>">
			  </div>

        <!-- Text input-->

          <label class="col-xs-4 control-label" for="usr"><?=FECHA_RESERVA?></label>
          <div class="col-xs-6">

          <input type="date" name="fecha" min="<?php echo $hoy; ?>" class="form-control input-md"  value="<?php $a=$_SESSION['datosModRes']; echo $a[1]; ?>">
          </div>

			<!-- Text input-->

			  <label class="col-xs-4 control-label" for="dni1"><?=DNI_RESERVA_USER?></label>
			  <div class="col-xs-6">
			  <input type="text" name="dni1" class="form-control input-md" value="<?php $a=$_SESSION['datosModRes']; echo $a[2]; ?>" onBlur="comprobarDNI(this)" required>

			  </div>


        <!-- Text input-->

        <label class="col-xs-4 control-label" for="codesp"><?=CODESP_RESERVA?></label>
        <div class="col-xs-6">
          <select id="codesp" name="codesp" class="form-control" required="">
                        <?php

                              $aux = $_SESSION['aulas'];
                          foreach ($aux as $value) {
                            echo "<option value='".$value."'>".$value."</option>";
                          }
                        ?>
                                  </select>
        </div>


          <!-- Text input-->

            <label class="col-xs-4 control-label" for="usr"><?=PRECIO_RESERVA?></label>
            <div class="col-xs-6">
            <input type="text" name="precio" class="form-control input-md"  value="<?php $a=$_SESSION['datosModRes']; echo $a[4]; ?>">
            </div>

            <!-- Text input-->

              <label class="col-xs-4 control-label" for="usr"><?=HORAI_RESERVA?></label>
              <div class="col-xs-6">
              <input type="text" name="horai" class="form-control input-md"  value="<?php $a=$_SESSION['datosModRes']; echo $a[5]; ?>">
              </div>

              <!-- Text input-->

                <label class="col-xs-4 control-label" for="usr"><?=HORAF_RESERVA?></label>
                <div class="col-xs-6">
                <input type="text" name="horaf" class="form-control input-md"  value="<?php $a=$_SESSION['datosModRes']; echo $a[6]; ?>">
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
