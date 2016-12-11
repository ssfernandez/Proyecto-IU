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
            <li class="contBandera"><a href="../../Controllers/NOTIF_Controller.php?idioma=esp"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/NOTIF_Controller.php?idioma=eng"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form method="POST" action="../../Controllers/NOTIF_Controller.php">
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
				<legend><?=TITULO_NOTIF?></legend>
			</div>

			
				
				<label class="col-xs-4 control-label" for="email"><?=LABEL_EMAIL?></label>				
				<div class="col-xs-6">
				<input type="text" name="email" maxlength="80" class="form-control input-md" onBlur="comprobarEmail(this)" required="">
				</div>
				
				<label class="col-xs-4 control-label" for="subject"><?=LABEL_SUBJECT?></label>
				<div class="col-xs-6">				
				<input type="text" name="last_name" maxlength="50" class="form-control input-md">
				</div>
				
				<label class="col-xs-4 control-label" for="content"><?=LABEL_CONTENT?></label>
				<div class="col-xs-6">
				<textarea style="resize:none" name="comments" maxlength="500"  cols="30" rows="5" class="form-control input-md" required=""></textarea>
				</div>

				<label class="col-xs-4 control-label" for="singlebutton" ></label>
			    <div class="col-xs-4" id="CrearUsrButtons">
			    <?php
			   	 echo '<input type="hidden" name="acc" value="Enviar" >';
			     echo '<input type="submit" value="'.SEND.'" class="btn">';
			    ?>
				</td>
			</tr>
			</table>
		</fieldset>
	</form>
</div>
</body>
</html>

