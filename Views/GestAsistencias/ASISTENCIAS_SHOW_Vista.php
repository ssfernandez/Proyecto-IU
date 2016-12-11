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
						?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=esp&acc=BuscarAs&dia='.$dia.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=eng&acc=BuscarAs&dia='.$dia.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_ASISTSELECTAS"){
			$aceptado=true;
		}
	}
	if($aceptado){
    $asis=$_SESSION['asistencias'];
		?>
	<div>
		<fieldset>
		<!-- Form Name -->

			<legend><?=TITULO_SHOW_ASIS?></legend>

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

                  <?php
                  if (count($asis)==0) {
                  ?>
                    <tr>
        							<td id='textoConsultUserxt' align='center'><?=$dia?></td>
        							       <td id='textoConsultUserxt' align='center'><?php

                               echo LABEL_NOASIS;

                             ?></td>

        						</tr>
                    <?php
                  }
                  ?>
                  <?php
                  if (count($asis)>0){
                    for ($i=0; $i < sizeof($asis) ; $i=$i+6) {
                      ?>
                      <tr>
          							       <?php
                               echo "<td id='textoConsultUserxt'>".$asis[$i]."</td>";

                               echo "<td id='textoConsultUserxt'>".$asis[$i+1]."</td>";

     											  	 echo "<td id='textoConsultUserxt'>".$asis[$i+2]."</td>";

                               echo "<td id='textoConsultUserxt'>".$asis[$i+3]."</td>";

                               echo "<td id='textoConsultUserxt'>".$asis[$i+4]."</td>";

                               echo "<td id='textoConsultUserxt'>".$asis[$i+5]."</td>";


                               ?>

                               <td align="center" >
               						  	 <?php
                               echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/ASISTENCIAS_Controller.php?acc=Modificar&dia='.$asis[$i].'&hora='.$asis[$i+1].'&cod='.$asis[$i+2].'&nom='.$asis[$i+3].'&ape='.$asis[$i+4].'"></em></a>';
                               echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/ASISTENCIAS_Controller.php?acc=¿Borrar?&dia='.$asis[$i].'&hora='.$asis[$i+1].'&cod='.$asis[$i+2].'&nom='.$asis[$i+3].'&ape='.$asis[$i+4].'"></em></a>';
               	                ?>
               	            	</td>
                      </tr>
                      <?php
                    }
                  }
                  ?>



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
