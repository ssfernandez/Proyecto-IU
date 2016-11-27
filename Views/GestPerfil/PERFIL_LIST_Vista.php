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
            <li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=esp&acc=Buscar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=eng&acc=Buscar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

<div class="col-xs-8"><!-- 8 -->
	<div>
		<form action="../../Controllers/PERFIL_Controller.php" method="POST">
			<fieldset>
			<!-- Form Name -->
				
				<legend><?=TITULO_SELECT_PROFILE?></legend>
				

				<!-- Text input-->
				
				  <label class="col-xs-1 control-label" for="bperf"><?=FILTER?></label>  
				  <div class="col-xs-3">
				  <input id="bperf" name="bperf" type="text" placeholder="" class="form-control input-xs" >
				  </div>
				  <div class="col-xs-1" id="ConsultarUsrButtons">
				   <?php
				   echo '<input type="hidden" name="acc" value="Buscar" >';
			   	   echo '<input type="submit" value="'.BUSCAR.'" class="btn">';
				   ?>
				  </div>
				
			</fieldset>
		</form>
	</div>
	

	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_NAME?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        <?php
                   			$ax=$_SESSION['busq'];

							foreach ($ax as $value) {
 
							 	?>
							  <tr>
							  	<?php  
							  	echo "<td id='textoConsultUserxt' align='center'>".$value."</td>";
							  	?>
							  	<td align="center" >
							  	<?php
                        			echo '<a class="btn btn-default glyphicon glyphicon-list-alt" href="../../Controllers/PERFIL_Controller.php?acc=Consultar&perfil='.$value.'"></a>'
                        		?>
                    			</td>
							  </tr>
							  <?php
							}
                   			?>
                    
                 </tbody>
            </table>
		</div>
	</div><!-- /8 -->
</body>
</html>
