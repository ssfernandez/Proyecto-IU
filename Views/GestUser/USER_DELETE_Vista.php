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
$usr=$_GET['usr'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=esp&acc=¿Borrar?&usr='.$usr.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=eng&acc=¿Borrar?&usr='.$usr.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_USRDELETE"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>
	<div>
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=DELETE_USER?></legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_NAME?></th>
                        <th id='textoConsultUser'>Dni</th>
                        <th id='textoConsultUser'><?=LABEL_PROFILE?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        <?php
		                	$aux=$_SESSION['datosUsr'];
						?>
						<tr>
						  	<?php  
						  	echo "<td id='textoConsultUserxt' align='center'>".$aux[0]."</td>";
						  	echo "<td id='textoConsultUserxt' align='center'>".$aux[1]."</td>";
						  	echo "<td id='textoConsultUserxt' align='center'>".$aux[2]."</td>";
						  	?>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn btn-danger glyphicon glyphicon-trash" href="../../Controllers/USER_Controller.php?acc=Borrar&usr='.$aux[0].'"></em></a>';
	                			echo '<a class="btn btn btn-info glyphicon glyphicon-home" href="../../Controllers/USER_Controller.php?acc=Cancelar&usr='.$aux[0].'"></em></a>';
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

	