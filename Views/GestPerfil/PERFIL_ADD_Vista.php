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
            <li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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
	<form onsubmit="return comprobarDatosPerfil()" action="../../Controllers/PERFIL_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=TITULO_ADD_PROFILE?></legend>
			

			<!-- Text input-->
			
			  <label class="col-xs-2 control-label" for="perfil"><?=LABEL_PROFILE?></label>  
			  <div class="col-xs-6">
			  
			  <?php
			  echo '<input id="perfil" name="perfil" type="text" placeholder="'.CAMPO_PROFILE_NAME.'" class="form-control input-md" onBlur="comprobarUsuario(this)" required="">';
			  ?>
			  </div>


		<label class="col-xs-10 control-label" for="nombre" id="cajaContrPerf"><?=LABEL_ACTIONS?></label> 
		<div class="col-xs-8" >
			<ul class="list-group">
			<?php
				$aux=$_SESSION['contracc'];
				$controladores=array();

			

				for ($i=0; $i < sizeof($aux); $i+=2){ 
					if(!in_array($aux[$i],$controladores)){
						if (defined($aux[$i])) {
							echo "<li class='list-group-item'><input type='hidden' name='controlador' value='".$aux[$i]."'><strong>".constant($aux[$i])."</strong></li>";
						}else{
							echo "<li class='list-group-item'><input type='hidden' name='controlador' value='".$aux[$i]."'><strong>".$aux[$i]."</strong></li>";
						}
						if (defined($aux[$i].$aux[$i+1])) {
							echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".constant($aux[$i].$aux[$i+1])."</label></li>";
						}else{
							echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".$aux[$i+1]."</label></li>";
						}
						
						array_push($controladores, $aux[$i]);
					}else{
						
						if (defined($aux[$i].$aux[$i+1])) {
							echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".constant($aux[$i].$aux[$i+1])."</label></li>";
						}else{
							echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".$aux[$i+1]."</label></li>";
						}
					}
					
				}

				?>
				</ul>
         </div>
          <!-- /Gestion de usuarios -->


			  <div class="col-xs-7" id="CrearPerfButtons">
			   
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
