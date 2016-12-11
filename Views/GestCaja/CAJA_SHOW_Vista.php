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
		                	$caja=$_GET['caja'];//puse caja
						?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php              //AQUI CAMBIE LO VERDE Y PUSE CAJA
            echo '<li class="contBandera"><a href="../../Controllers/CAJA_Controller.php?idioma=esp&acc=Consultar&caja='.$caja.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CAJA_Controller.php?idioma=eng&acc=Consultar&caja='.$caja.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_CAJASELECTM"){ //AQUI PUSE CAJASHOW
			$aceptado=true;
		}
	}
	if($aceptado){
    $descripcion=$_SESSION["consulta"];
		?>
	<div>
		<fieldset>
		<!-- Form Name -->

			<legend><?=TITULO_SHOW_CAJA?></legend>

		</fieldset>

	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_DIA?></th>
                        <th id='textoConsultUser'><?=LABEL_DESCRIPCION?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr>
              	</thead>
              	<tbody >


						<tr>
							<td id='textoConsultUserxt' align='center'><?=$caja?></td>
							       <td id='textoConsultUserxt' align='center'><?php
                     if (count($descripcion)>0) {
                        echo $descripcion[0];
                     }
                     else{
                       echo LABEL_NOCAJA;
                     }
                     ?></td>
						  	<td align="center" >
						  	<?php
                      if (count($descripcion)>0){
	                			echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/CAJA_Controller.php?acc=¿Borrar?&caja='.$caja.'"></em></a>';
                      }
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
