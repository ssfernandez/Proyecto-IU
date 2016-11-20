<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
$usr= $_GET['usr'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=esp&acc=Consultar&usr='.$usr.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=eng&acc=Consultar&usr='.$usr.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		
			<legend><?=TITULO_SHOW_USER?></legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_USER?></th>
                        <th id='textoConsultUser'>Dni</th>
                        <th id='textoConsultUser'><?=LABEL_PROFILE?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        <?php
		                	$aux=$_SESSION['consulta'];
						?>
						<tr>
						  	<?php  
						  	echo "<td id='textoConsultUserxt' align='center'>".$aux[0]."</td>";
						  	echo "<td id='textoConsultUserxt' align='center'>".$aux[1]."</td>";
						  	echo "<td id='textoConsultUserxt' align='center'>".$aux[2]."</td>";
						  	?>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/USER_Controller.php?acc=Modificar&usr='.$aux[0].'"></em></a>';
	                			echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/USER_Controller.php?acc=¿Borrar?&usr='.$aux[0].'"></em></a>';
	                		?>
	            			</td>
						</tr>			    
                 </tbody>
            </table>
		</div>
		
		</body>
		</html>

	