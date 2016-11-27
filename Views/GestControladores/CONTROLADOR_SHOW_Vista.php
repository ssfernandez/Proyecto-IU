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
	$am= $_GET['cnomb'];
	$con=$_SESSION['consulta'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=esp&acc=Consultar&cnomb='.$am.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=eng&acc=Consultar&cnomb='.$am.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_CONTRSHOW"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>
	<div>
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=TITULO_SHOW_CONTROLLER?></legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_CONTROLLER?></th>
                        <th id='textoConsultUser'><?=LABEL_ACTIONS?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        
						<tr>
						  	<?php  
						  	if (defined($am)) {
						  		echo "<td id='textoConsultUserxt' align='center'>".constant($am)."</td>";
						  	}else{
						  		echo "<td id='textoConsultUserxt' align='center'>".$am."</td>";
						  	}
						  	
						  	
						  	echo "<td id='textoConsultUserxt' align='center'>";

							foreach ($con as $value) {
								if (defined($am.$value)) {
									echo constant($am.$value) ."</br>";
								}else{
									echo $value."</br>";
								}
								
							}

						  	echo "</td>";
						  	?>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/CONTROLADORES_Controller.php?acc=Modificar&cnomb='.$am.'"></em></a>';
	                			echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/CONTROLADORES_Controller.php?acc=¿Borrar?&cnomb='.$am.'"></em></a>';
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

	
	