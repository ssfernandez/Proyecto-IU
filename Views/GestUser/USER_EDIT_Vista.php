<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
$usr=$_GET['usr'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=esp&acc=Modificar&usr='.$usr.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=eng&acc=Modificar&usr='.$usr.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
			<legend><?=TITULO_EDIT_USER?></legend>
			</div>
		</fieldset>
		
	</div>

	<form action="../../Controllers/USER_Controller.php" method="POST">
		<fieldset>
			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="usr"><?=LABEL_USER?></label>  
			  <div class="col-xs-6">
			  <input type="text" name="usr" class="form-control input-md" readonly="readonly" value="<?php $a=$_SESSION['datosModUsr']; echo $a[0]; ?>">
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="password1"><?=PASS_ADD_USER?></label>  
			  <div class="col-xs-6">
			  <input type="password" name="password1" class="form-control input-md" value="<?php $a=$_SESSION['datosModUsr']; echo $a[1]; ?>" onBlur="comprobarContraseña(this)" required>
			    
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="password2"><?=REPASS_ADD_USER?></label>  
			  <div class="col-xs-6">
			  <input type="password" name="password2" class="form-control input-md" value="<?php $a=$_SESSION['datosModUsr']; echo $a[1]; ?>" onBlur="comprobarIgualdad()" required>
			    
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="dni">DNI</label>  
			  <div class="col-xs-6">
			  <input type="text" name="dni" class="form-control input-md" value="<?php $a=$_SESSION['datosModUsr']; echo $a[2]; ?>" onBlur="comprobarDNI(this)" required>
			    
			  </div>
			
			<!-- Select Basic -->
			
			  <label class="col-xs-4 control-label" for="perfil"><?=TITULO_ADD_USER?></label>
			  <div class="col-xs-6">
			    <select id="perfil" name="perfil" class="form-control" value="<?php $a=$_SESSION['datosModUsr']; echo $a[3]; ?>" required="">
			    	<option value="<?php $a=$_SESSION['datosModUsr']; echo $a[3]; ?>"><?php echo $a[3]; ?></option>
			        					<?php
			        								$aux = $_SESSION['permisos'];
													foreach ($aux as $value) {
														echo "<option value='".$value."'>".$value."</option>";
													}
												?>
			                            </select>
			  </div>
			  
			

			
			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">
			   
			   <?php
			   echo '<input type="submit" name="acc" value="Modificar" class="btn">';
			   echo '<input type="reset" value="'.LIMPIAR.'" class="btn" id="resetUsrAdd">';
			   ?>
			  </div>
			
		</fieldset>
	</form>



	
</body>
</html>