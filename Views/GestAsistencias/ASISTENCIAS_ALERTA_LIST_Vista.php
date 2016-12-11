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
            <li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=esp&acc=BuscarAv"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/ASISTENCIAS_Controller.php?idioma=eng&acc=BuscarAv"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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
		<form action="../../Controllers/ASISTENCIAS_Controller.php" method="POST">
			<fieldset>
			<!-- Form Name -->

				<legend><?=TITULO_SELECT_ASISTENCIA?></legend>


				<!-- Text input-->

				  <label class="col-xs-1 control-label" for="av"><?=FILTER?></label>
				  <div class="col-xs-3">
				  <input id="av" name="av" type="date" placeholder="" class="form-control input-xs" >
				  </div>
				  <div class="col-xs-1" id="ConsultarUsrButtons">
				   <?php
				   echo '<input type="hidden" name="acc" value="BuscarAv" >';
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
                        <th id='textoConsultUser'><?=LABEL_DIA?></th>
                        <th id='textoConsultUser'><?=LABEL_HORA?></th>
                        <th id='textoConsultUser'><?=LABEL_ACTIVIDAD?></th>
                        <th id='textoConsultUser'><?=LABEL_NAME?></th>
                        <th id='textoConsultUser'><?=LABEL_APELLIDOS?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr>
              	</thead>
              	<tbody >
                        <?php
                   			$ax=$_SESSION['busq'];

                for ($i=0; $i < sizeof($ax) ; $i=$i+5) {
                  ?>
                  <tr>

                           <?php

                           echo "<td id='textoConsultUserxt'>".$ax[$i]."</td>";

                           echo "<td id='textoConsultUserxt'>".$ax[$i+1]."</td>";

                           echo "<td id='textoConsultUserxt'>".$ax[$i+2]."</td>";

                           echo "<td id='textoConsultUserxt'>".$ax[$i+3]."</td>";

                           echo "<td id='textoConsultUserxt'>".$ax[$i+4]."</td>";

                           ?>

                           <td align="center" >
                           <?php
                           echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/ASISTENCIAS_Controller.php?acc=Modificar&dia='.$ax[$i].'&hora='.$ax[$i+1].'&cod='.$ax[$i+2].'&nom='.$ax[$i+3].'&ape='.$ax[$i+4].'"></em></a>';
                           echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/ASISTENCIAS_Controller.php?acc=¿Borrar?&dia='.$ax[$i].'&hora='.$ax[$i+1].'&cod='.$ax[$i+2].'&nom='.$ax[$i+3].'&ape='.$ax[$i+4].'"></em></a>';
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
