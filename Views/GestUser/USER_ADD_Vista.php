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
            <li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form onsubmit="return comprobarDatos()" action="../../Controllers/USER_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_ADD_USER?></legend>
			</div>

			<!-- Text input-->
		
			  <label class="col-xs-4 control-label" for="usr"><?=LABEL_USER?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="usr" name="usr" type="text" placeholder="'.CAMPO_USER_USER.'" class="form-control input-md" onBlur="comprobarUsuario(this)" required="">';
			  ?>
			  </div>
			

			<!-- Text input-->
		
			  <label class="col-xs-4 control-label" for="password1"><?=PASS_ADD_USER?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="password1" name="password1" type="password" placeholder="'.CAMPO_USER_PASS.'" class="form-control input-md" onBlur="comprobarContraseña(this)" required="">';
			   ?>
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="password2"><?=REPASS_ADD_USER?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="password2" name="password2" type="password" placeholder="'.CAMPO_USER_REPASS.'" class="form-control input-md" onBlur="comprobarIgualdad()" required="">';
			   ?>
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="dni">DNI</label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="dni" name="dni" type="text" placeholder="'.CAMPO_USER_DNI.'" class="form-control input-md"  onBlur="comprobarDNI(this)" required="">';
			   ?>
			  </div>
			
			<!-- Select Basic -->
		
			  <label class="col-xs-4 control-label" for="perfil"><?=LABEL_PROFILE?></label>
			  <div class="col-xs-6">
			    <select id="perfil" name="perfil" class="form-control" required="">
			        					<?php
			        								$aux = $_SESSION['perfiles'];
													foreach ($aux as $value) {
														echo "<option value='".$value."'>".$value."</option>";
													}
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
