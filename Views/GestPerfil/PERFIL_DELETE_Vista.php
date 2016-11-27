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
<?php
		                	$aux=$_SESSION['contraccShow'];
		                	$perfil=$_GET['perfil'];
						?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=esp&acc=¿Borrar?&perfil='.$perfil.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=eng&acc=¿Borrar?&perfil='.$perfil.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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

<div class="col-xs-8"><!-- 8 -->
<?php

	$comp=$_SESSION["autorizacion"];
	$aceptado=false;
	for ($i=0; $i < sizeof($comp); $i+=2){
		$cadena=$comp[$i].$comp[$i+1];
		if($cadena=="GEST_PERFDELETE"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>
	<div>
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=DELETE_PROFILE?></legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_PROFILE?></th>
                        <th id='textoConsultUser'><?=LABEL_ACTIONS?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        
						<tr>
							<td id='textoConsultUserxt' align='center'><?=$perfil?></td>
							<td >
						  	<?php  
						  	$controladores=array();
				
							for ($i=0; $i < sizeof($aux); $i+=2){ 
								if(!in_array($aux[$i],$controladores)){
									if (defined($aux[$i])) {
										echo "<strong >".constant($aux[$i])."</strong><br>";
									}else{
										echo "<strong >".$aux[$i]."</strong><br>";
									}
									
									if (defined($aux[$i].$aux[$i+1])) {
										echo "<span id='tituloAccPerf'>".constant($aux[$i].$aux[$i+1])."</span><br>";
									}else{
										echo "<span id='tituloAccPerf'>".$aux[$i+1]."</span><br>";
									}
									

									array_push($controladores, $aux[$i]);
								}else{
									if (defined($aux[$i].$aux[$i+1])) {
										echo "<span id='tituloAccPerf'>".constant($aux[$i].$aux[$i+1])."</span><br>";
									}else{
										echo "<span id='tituloAccPerf'>".$aux[$i+1]."</span><br>";
									}
								}
								
							}
						  	?>
						  	</td>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn-danger glyphicon glyphicon-trash" href="../../Controllers/PERFIL_Controller.php?acc=Borrar&perfil='.$perfil.'"></em></a>';
	                			echo '<a class="btn btn-info glyphicon glyphicon-home" href="../../Controllers/PERFIL_Controller.php?acc=Cancelar"></em></a>';
	                		?>
	            			</td>
						</tr>			    
                 </tbody>
            </table>
            <?php
}else{
	echo '<h1 class="form-signin-heading ">'.ERR_PERM.'</h1>';
}
?>
		</div>
		
		</body>
		</html>

	