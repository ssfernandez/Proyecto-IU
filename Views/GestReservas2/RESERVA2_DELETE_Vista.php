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
$idr=$_GET['idr'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/RESERVAS2_Controller.php?idioma=esp&acc=¿Borrar?&idr='.$idr.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/RESERVAS2_Controller.php?idioma=eng&acc=¿Borrar?&idr='.$idr.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_RESERVDELETE2"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>
	<div>
		<fieldset>
		<!-- Form Name -->

			<legend><?=DELETE_RESERVA?></legend>

		</fieldset>

	</div>
	<div class="col-xs-15">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaReservas">
              	<thead>
                    <tr>
                      <th id='textoConsultReserv'><?=LABEL_CODIGO?></th>
                      <th id='textoConsultReserv'><?=FECHA_RESERVA?></th>
                      <th id='textoConsultReserv'><?=DNI_RESERVA_USER?></th>
                      <th id='textoConsultReserv'><?=CODACT_RESERVA?></th>

                        <th><em class="fa fa-cog"></em></th>
                    </tr>
              	</thead>
              	<tbody >
                        <?php
		                	$aux=$_SESSION['consulta'];
						?>
						<tr>
						  	<?php
                echo "<td id='textoConsultReserv' align='center'>".$aux[3]."</td>";
						  	echo "<td id='textoConsultReserv' align='center'>".$aux[0]."</td>";
						  	echo "<td id='textoConsultReserv' align='center'>".$aux[1]."</td>";
                echo "<td id='textoConsultReserv' align='center'>".$aux[2]."</td>";


						  	?>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn btn-danger glyphicon glyphicon-trash" href="../../Controllers/RESERVAS2_Controller.php?acc=Borrar&idr='.$idr.'"></em></a>';
	                			echo '<a class="btn btn btn-info glyphicon glyphicon-home" href="../../Controllers/RESERVAS2_Controller.php?acc=Cancelar&idr='.$idr.'"></em></a>';
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
