<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
$perfil=$_GET['perfil'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=esp&acc=Modificar&perfil='.$perfil.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=eng&acc=Modificar&perfil='.$perfil.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
            ?>
          </ul>
        </div>
          
        
      </div><!-- /container -->
    </div>
    <!-- /Header -->
  <?php
    include('../../Interfaz/BarraLateral.php');
    $perf=$_GET['perfil'];
?>
<div class="col-xs-1">
</div>

<div class="col-xs-8"><!-- calendario -->
<?php
	echo '<form action="../../Controllers/PERFIL_Controller.php?perfilA='.$perf.'" method="POST">';
	?>
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=TITULO_EDIT_PROFILE?></legend>
			

			<!-- Text input-->
			<?php
			  echo "<label class='col-xs-2 control-label' for='perfilM'>".LABEL_NAME."</label>";
			  echo "<div class='col-xs-6'>";
			  echo "<input id='perfilM' name='perfilM' type='text' placeholder='".$perf."' value='".$perf."' class='form-control input-md' onBlur='comprobarUsuario(this)' required=''>";
			  echo "</div>";
			 ?>


		<label class="col-xs-10 control-label" for="nombre" id="cajaContrPerf"><?=LABEL_ACTIONS?></label> 
		<div class="col-xs-8" >
			<ul class="list-group">
			<?php
				$tiene=$_SESSION['datosPerfil'];
				$aux=$_SESSION['datosTotales'];
				$controladores=array();

				
				for ($i=0; $i < sizeof($aux); $i+=2){ 
					$string=$aux[$i]."/".$aux[$i+1];
						//hacer un bucle comprobando primero la gestion y luego la accion
						if(!in_array($aux[$i], $controladores)){
							if (defined($aux[$i])) {
								echo "<li class='list-group-item'><input type='hidden' name='controlador' value='".$aux[$i]."'><strong>".constant($aux[$i])."</strong></li>";
							}else{
								echo "<li class='list-group-item'><input type='hidden' name='controlador' value='".$aux[$i]."'><strong>".$aux[$i]."</strong></li>";
							}
							if(in_array($string, $tiene)){
								if (defined($aux[$i].$aux[$i+1])) {
									echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' checked='checked' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".constant($aux[$i].$aux[$i+1])."</label></li>";
								}else{
									echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' checked='checked' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".$aux[$i+1]."</label></li>";
								}
								
							}else{
								if (defined($aux[$i].$aux[$i+1])) {
									echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".constant($aux[$i].$aux[$i+1])."</label></li>";
								}else{
									echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".$aux[$i+1]."</label></li>";
								}
								
							}
							array_push($controladores, $aux[$i]);
					}else{
						if(in_array($string, $tiene)){
							if (defined($aux[$i].$aux[$i+1])) {
								echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' checked='checked' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".constant($aux[$i].$aux[$i+1])."</label></li>";
							}else{
								echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' checked='checked' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".$aux[$i+1]."</label></li>";
							}
								
							}else{
								if (defined($aux[$i].$aux[$i+1])) {
									echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".constant($aux[$i].$aux[$i+1])."</label></li>";
								}else{
									echo "<li class='list-group-item'><label id='labelPerf'><input type='checkbox' name='accion[]' value='".$aux[$i]."/".$aux[$i+1]."'> ".$aux[$i+1]."</label></li>";
								}
								
							}
					}
				}

				?>
				</ul>
         </div>
          <!-- /Gestion de usuarios -->


			  <div class="col-xs-7" id="CrearPerfButtons">
			   <input type="submit" name="acc" value="Modificar" class="btn">
			   <input type="reset" value="Limpiar" class="btn" id="resetPerfAdd">
			  </div>


			

			
		</fieldset>
	</form>
</div>
	
</body>
</html>