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
							$auxCli=$_SESSION['cli_activ_cal'];
		                	$aux=$_SESSION['consultaCalendario'];
		                	$activ=$_GET['activ'];
		                	$hini=$_GET['hini'];
		                	$hfin=$_GET['hfin'];
						?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CALENDARIO_Controller.php?idioma=esp&action=Consultar&activ='.$activ.'&hini='.$hini.'&hfin='.$hfin.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CALENDARIO_Controller.php?idioma=eng&action=Consultar&activ='.$activ.'&hini='.$hini.'&hfin='.$hfin.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_CALENDARIOSHOW"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>
	<div>
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=TITULO_SHOW_CALENDARIO?></legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_NAME_ACTIV?></th>
                        <th id='textoConsultUser'><?=LABEL_NAME_ESP?></th>
                        <th id='textoConsultUser'><?=DAY?></th>
                        <th id='textoConsultUser'><?=TIME_INIC?></th>
                        <th id='textoConsultUser'><?=TIME_FIN?></th>
                        <th id='textoConsultUser'>DNI</th>
                        <th id='textoConsultUser'><?=LABEL_NAME?></th>

                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        <?php
								for ($i=0; $i < count($aux); $i+=7) { 
						echo '<tr>';
							
									echo "<td id='textoConsultUserxt' align='center'>".$aux[$i]."</td>";
									echo "<td id='textoConsultUserxt' align='center'>".$aux[$i+1]."</td>";
									echo "<td id='textoConsultUserxt' align='center'>".$aux[$i+2]."</td>";
									echo "<td id='textoConsultUserxt' align='center'>".$aux[$i+3]."</td>";
									echo "<td id='textoConsultUserxt' align='center'>".$aux[$i+4]."</td>";
									echo "<td id='textoConsultUserxt' align='center'>".$aux[$i+5]."</td>";
									echo "<td id='textoConsultUserxt' align='center'>".$aux[$i+6]."</td>";
						  	echo '<td align="center" >';
						  	
	                			echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/CALENDARIO_Controller.php?action=Modificar&activ='.$activ.'&hini='.$aux[$i+3].'&hfin='.$aux[$i+4].'"></em></a>';
	                			
	            			echo '</td>';
						echo '</tr><br>	';
					}
					
						?>		    
                 </tbody>
            </table>
    </div>

    <div class="col-xs-5">
    <br>
            <legend><?=CLI_AP_CAL?></legend>

            <table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_NAME?></th>
                    </tr> 
              	</thead>
              	<tbody >
              		<?php
              			foreach ($auxCli as $value) {
              				echo '<tr>';
	              				echo "<td id='textoConsultUserxt' align='center'>".$value."</td>";
	              			echo '</tr>';
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

	