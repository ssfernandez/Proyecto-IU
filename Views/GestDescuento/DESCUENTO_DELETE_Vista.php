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
$des=$_GET['descuento'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphdescuentoicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/DESCUENTO_Controller.php?idioma=esp&acc=¿Borrar?&descuento='.$des.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/DESCUENTO_Controller.php?idioma=eng&acc=¿Borrar?&descuento='.$des.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_DESCDELETE"){
			$aceptado=true;
		}
	}
	if($aceptado){
		?>
	<div>
		<fieldset>
		<!-- Form Name -->
			
			<legend><?=DELETE_USER?></legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultDiscount'><?=LABEL_COD_DISCOUNT?></th>
                    	<th id='textoConsultDiscount'><?=LABEL_PORCE?></th>
                        <th id='textoConsultDiscount'><?=LABEL_DISCOUNT?></th>
                        <th id='textoConsultDiscount'><?=LABEL_ACTIVE?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        <?php
		                	$aux=$_SESSION['datosDesB'];
						?>
						<tr>
						  	<?php  
						  	echo "<td id='textoConsultDiscountxt' align='center'>".$aux[0]."</td>";
						  	echo "<td id='textoConsultDiscountxt' align='center'>".$aux[1]."</td>";
							echo "<td id='textoConsultDiscountxt' align='center'>".$aux[2]."</td>";
						  	echo "<td id='textoConsultDiscountxt' align='center'>".$aux[3]."</td>";
						  	?>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn btn-danger glyphicon glyphicon-trash" href="../../Controllers/DESCUENTO_Controller.php?acc=Borrar&coddes='.$aux[0].'"></em></a>';
	                			echo '<a class="btn btn btn-info glyphicon glyphicon-home" href="../../Controllers/DESCUENTO_Controller.php?acc=Cancelar&coddes='.$aux[0].'"></em></a>';
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

	