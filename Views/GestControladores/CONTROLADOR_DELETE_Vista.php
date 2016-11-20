<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
$am= $_GET['cnomb'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=esp&acc=¿Borrar?&cnomb='.$am.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=eng&acc=¿Borrar?&cnomb='.$am.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
	<div>
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=DELETE_CONTROLLER?></legend>
			
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
                        <?php
		                	$am=$_GET['cnomb'];
		                	$con=$_SESSION['consulta'];

						?>
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
	                			echo '<a class="btn btn btn-danger glyphicon glyphicon-trash" href="../../Controllers/CONTROLADORES_Controller.php?acc=Borrar&cnomb='.$am.'"></em></a>';
	                			echo '<a class="btn btn btn-info glyphicon glyphicon-home" href="../../Controllers/CONTROLADORES_Controller.php?acc=Cancelar"></em></a>';
	                		?>
	            			</td>
						</tr>			    
                 </tbody>
            </table>
		</div>
		
		</body>
		</html>

	