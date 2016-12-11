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
$ocup= $_GET['ocup'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CATEGORIAS_Controller.php?idioma=esp&acc=Consultar&ocup='.$ocup.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CATEGORIAS_Controller.php?idioma=eng&acc=Consultar&ocup='.$ocup.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_TRABAJSHOW"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>
	<div>
		<fieldset>
		<!-- Form Name -->
		
			<legend><?=TITULO_SHOW_TRABAJ?></legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaTrabajadores">
          	<tbody >
                <?php
                	$aux=$_SESSION['consulta'];
				?>
				

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>DNI</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[0]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_NAME."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[1]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_APELLIDOS."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[2]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_CIUDAD."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[3]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_CALLE."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[4]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_NUMERO."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[5]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_PISO."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[6]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_CP."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[7]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_EMAIL."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[8]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_FNAC."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[9]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_OBS."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[10]."</td>";
					?>

				</tr>


				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_OCUP."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[11]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_SUELDO."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[12]."€</td>";
					?>

				</tr>

				<?php
				if($ocup=='Monitor'){

				?>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_NUMCUENTA."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[13]."</td>";
					?>
				
				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_FOTO."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[14]."</td>";
					?>

				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_CONTRATO."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[15]."</td>";
					?>

				</tr>

				<?php
				}elseif($ocup=='Fisio'){
				?>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_NUMCUENTA."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[13]."</td>";
					?>
				
				</tr>

				<tr>
				  	
				  	<?php  
				  	echo "<td id='textoConsultTrabajadoresxt' align='center'><b>".LABEL_NUMLICENCIA."</b></td>";
					echo "<td id='textoConsultTrabajadoresxt' align='center'>".$aux[14]."</td>";
					?>

				</tr>

				<?php
				}
				?>

				<tr>
					<?php  
				  	echo "<td id='textoConsultTrabajxt' align='center'><b>Opciones</b></td>";
				  	?>
				  	<td align="center">
				  	<?php
            			echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/TRABAJADORES_Controller.php?acc=¿Modificar?&dni='.$aux[0].'&ocup='.$ocup.'"></em></a>';
            			echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/TRABAJADORES_Controller.php?acc=¿Borrar?&dni='.$aux[0].'&ocup='.$ocup.'"></em></a>';
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

	