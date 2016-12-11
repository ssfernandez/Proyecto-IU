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
$categ= $_GET['categ'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CATEGORIAS_Controller.php?idioma=esp&acc=Consultar&categ='.$categ.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CATEGORIAS_Controller.php?idioma=eng&acc=Consultar&categ='.$categ.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_CATEGSHOW"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>
	<div>
		<fieldset>
		<!-- Form Name -->
		
			<legend><?=TITULO_SHOW_CATEG?></legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaCategorias">
              	<thead>
                    <tr>
                        <th id='textoConsultCategorias'><?=LABEL_CATEGORIA?></th>
                        <th id='textoConsultCategorias'><?=LABEL_ACTIVIDADES?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        <?php
		                	$aux=$_SESSION['consultacat'];
		                	$auxact=$_SESSION['consultaact'];
						?>
						<tr>
						  	<?php  

						  	echo "<td id='textoConsultCategoriasxt' align='center'>".$aux[0]."</td>";
							echo "<td id='textoConsultCategoriasxt' align='center'>";

						  	for ($i=0; $i<sizeof($auxact); $i=$i+1){ 
						  		echo $auxact[$i]."</br>";
						  	}
							?>
							</td>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/CATEGORIAS_Controller.php?acc=Modificar&categ='.$aux[0].'"></em></a>';
	                			echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/CATEGORIAS_Controller.php?acc=¿Borrar?&categ='.$aux[0].'"></em></a>';
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

	