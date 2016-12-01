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
$am= $_GET['cnomb'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=esp&acc=Modificar&cnomb='.$am.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=eng&acc=Modificar&cnomb='.$am.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_CONTREDIT"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>

<div>
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_EDIT_CONTROLLER?></legend>
			</div>
		</fieldset>
		
	</div>
	<?php
		$a=$_GET['cnomb'];
	?>

	<form action="../../Controllers/CONTROLADORES_Controller.php" method="POST">
		<fieldset>
			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="usr"><?=LABEL_CONTROLLER?></label>  
			  <div class="col-xs-6">
			  <input type="text" readonly="readonly" name="cnomb" class="form-control input-md"  value="<?php  echo $a; ?>">
			  </div>
		

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="usr"><?=LABEL_ACTIONS?></label>  
			  <div class="col-xs-6 ">
			  <?php
				$mostper=$_SESSION['acciones'];
				$abc = $_SESSION['consulta'];
				foreach ($mostper as $value) {
					$au="<br><label><input type='checkbox' name='accion[]' value='".$value."' ";
					if(in_array($value,$abc)){
						$au.= "checked='checked'";
					}
					$au.=">".$value;
					echo $au.'</label>';
				}
				
				?>
			  </div>
			
			

		
			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">
			    <?php
			   echo '<input type="hidden" name="acc" value="Modificar!" >';
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