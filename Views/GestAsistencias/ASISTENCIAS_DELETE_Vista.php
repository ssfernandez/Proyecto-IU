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
		                	$dia=$_GET['dia'];
                      $hora=$_GET['hora'];
                      $cod=$_GET['cod'];
                      $nom=$_GET['nom'];
                      $ape=$_GET['ape'];
						?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php              //AQUI CAMBIE LO VERDE Y PUSE CAJA
            echo '<li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=esp&acc=ConsultarAs&dia='.$dia.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=eng&acc=ConsultarAs&dia='.$dia.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_CAJASELECTM"){
			$aceptado=true;
		}
	}
	if($aceptado){
    $asis = array();
    $asis=$_SESSION['consulta'];
		?>
	<div>
		<fieldset>
		<!-- Form Name -->

			<legend><?=BORRAR_CONFIRMACION_ASIS?></legend>

		</fieldset>

	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_DIA?></th>
                        <th id='textoConsultUser'><?=LABEL_HORA?></th>
                        <th id='textoConsultUser'><?=LABEL_ACTIVIDAD?></th>
                        <th id='textoConsultUser'><?=LABEL_NAME?></th>
                        <th id='textoConsultUser'><?=LABEL_APELLIDOS?></th>
                        <th id='textoConsultUser'><?=TITULO_SHOW_AS?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr>
              	</thead>
              	<tbody >


						<tr>
							       <?php
                     if (count($asis)>0) {
                       echo "<td id='textoConsultUserxt'>".$asis[0]."</td>";

                       echo "<td id='textoConsultUserxt'>".$asis[1]."</td>";

                       echo "<td id='textoConsultUserxt'>".$asis[2]."</td>";

                       echo "<td id='textoConsultUserxt'>".$asis[3]."</td>";

                       echo "<td id='textoConsultUserxt'>".$asis[4]."</td>";

                       echo "<td id='textoConsultUserxt'>".$asis[5]."</td>";

                     }
                     else{
                       $no = 'No hay asistencias ';
                       echo "<td id='textoConsultUserxt'>".$no."</td>";
                     }
                     ?>
						  	<td align="center" >
						  	<?php
	                			     echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/ASISTENCIAS_Controller.php?acc=Borrar&dia='.$asis[0].'&hora='.$asis[1].'&cod='.$asis[2].'&nom='.$asis[3].'&ape='.$asis[4].'"></em></a>';

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
