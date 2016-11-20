<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=esp&acc=Buscar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=eng&acc=Buscar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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
		<form action="../../Controllers/CONTROLADORES_Controller.php" method="POST">
			<fieldset>
			<!-- Form Name -->
			
				<legend><?=TITULO_SELECT_CONTROLLER?></legend>
				

				<!-- Text input-->
			
				  <label class="col-xs-1 control-label" for="bcont"><?=FILTER?></label>  
				  <div class="col-xs-3">
				  <input id="bcont" name="bcont" type="text" placeholder="" class="form-control input-xs" >
				  </div>
				  <div class="col-xs-1" id="ConsultarUsrButtons">
				   <input type="submit" name="acc" value="Buscar" class="btn">
				  </div>
				
			</fieldset>
		</form>
	</div>
	

	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'><?=LABEL_CONTROLLERS?></th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        <?php
		                           			$ax=$_SESSION['bcont'];

											for ($i=0; $i < sizeof($ax) ; $i++) { 
											 	?>
											  <tr>
											  	<?php  
											  	if (defined($ax[$i])) {
											  		echo "<td id='textoConsultUserxt'>".constant($ax[$i])."</td>";
											  	}else{
											  		echo "<td id='textoConsultUserxt'>".$ax[$i]."</td>";
											  	}
											  	
											  	?>
											  	<td align="center" >
											  	<?php
			                            			echo '<a class="btn btn-default glyphicon glyphicon-list-alt" href="../../Controllers/CONTROLADORES_Controller.php?acc=Consultar&cnomb='.$ax[$i].'"></em></a>'
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
