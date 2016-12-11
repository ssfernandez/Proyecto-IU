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
$dni= $_GET['dni'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CLIENTE_Controller.php?idioma=esp&acc=Consultar&dni='.$dni.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CLIENTE_Controller.php?idioma=eng&acc=Consultar&dni='.$dni.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
		if($cadena=="GEST_CLISHOW"){
			$aceptado=true;
		}
	}
	if($aceptado){
		$aux=$_SESSION['consulta'];
		?>


        <div class="form-group">
        <legend><?=TITULO_SHOW_CLIENTE?></legend></div>


        <label class="col-xs-4 control-label" for="nombre"><?=LABEL_NAME?></label>  
        <div class="col-xs-6">
        <input type="text" name="nombre" class="form-control input-md" readonly="readonly" value="<?php echo $aux[0]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="apellidos"><?=LABEL_SURNAME?></label>  
        <div class="col-xs-6">
        <input type="text" name="apellidos" class="form-control input-md" readonly="readonly" value="<?php echo $aux[1]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="dni">DNI</label>  
        <div class="col-xs-6">
        <input type="text" name="dni" class="form-control input-md" readonly="readonly" value="<?php echo $aux[2]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="fecha_nac"><?=LABEL_BIRTH?></label>  
        <div class="col-xs-6">
        <input type="date" name="fecha_nac" class="form-control input-md" readonly="readonly" value="<?php echo $aux[3]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="email"><?=LABEL_EMAIL?></label>  
        <div class="col-xs-6">
        <input type="date" name="email" class="form-control input-md" readonly="readonly" value="<?php echo $aux[4]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="ciudad"><?=LABEL_CIUDAD?></label>  
        <div class="col-xs-6">
        <input type="date" name="ciudad" class="form-control input-md" readonly="readonly" value="<?php echo $aux[5]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="calle"><?=LABEL_CALLE?></label>  
        <div class="col-xs-6">
        <input type="date" name="calle" class="form-control input-md" readonly="readonly" value="<?php echo $aux[6]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="numero"><?=LABEL_NUMERO?></label>  
        <div class="col-xs-6">
        <input type="date" name="numero" class="form-control input-md" readonly="readonly" value="<?php echo $aux[7]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="piso"><?=LABEL_PISO?></label>  
        <div class="col-xs-6">
        <input type="date" name="piso" class="form-control input-md" readonly="readonly" value="<?php echo $aux[8]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="cp"><?=LABEL_CP?></label>  
        <div class="col-xs-6">
        <input type="date" name="cp" class="form-control input-md" readonly="readonly" value="<?php echo $aux[9]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="profesion"><?=LABEL_PROFESION?></label>  
        <div class="col-xs-6">
        <input type="date" name="profesion" class="form-control input-md" readonly="readonly" value="<?php echo $aux[11]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="numcuenta_u"><?=LABEL_NUMCUENTA_U?></label>  
        <div class="col-xs-6">
        <input type="date" name="numcuenta_u" class="form-control input-md" readonly="readonly" value="<?php echo $aux[12]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="pagos_pend"><?=LABEL_PAGOS_PEND?></label>  
        <div class="col-xs-6">
        <input type="date" name="pagos_pend" class="form-control input-md" readonly="readonly" value="<?php echo $aux[13]; ?>">
        </div>

        <label class="col-xs-4 control-label" for="especial"><?=LABEL_ESPECIAL?></label>  
        <div class="col-xs-6">
        <input type="date" name="especial" class="form-control input-md" readonly="readonly" value="
            <?php 
                if($aux[14] == 1){
                    echo "Sí";
                }else{
                    echo "No";
                }
            ?>">
        </div>

        <label class="col-xs-4 control-label" for="observaciones"><?=LABEL_OBSERVACIONES?></label>  
        <div class="col-xs-6">
        <input  type="date" name="observaciones" class="form-control input-md" readonly="readonly" value="<?php echo $aux[10]; ?>">
        
        </div>

        <label class="col-xs-4 control-label" for="protec_datos"><?=LABEL_PROTEC_DATOS?></label>  
        <div class="col-xs-6">
        <input  type="date" name="protec_datos" class="form-control input-md" readonly="readonly" value="<?php echo $aux[15]; ?>">
        
        </div>

        <label class="col-xs-4 control-label" for="singlebutton" ></label>
        <div class="col-xs-4" id="CrearClientButtons">
        <?php
    		echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/CLIENTE_Controller.php?acc=Modificar&dni='.$aux[2].'"></em></a>';
    		echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/CLIENTE_Controller.php?acc=¿Borrar?&dni='.$aux[2].'"></em></a>';
	    ?>
        </div>
    </div>

<?php
    }else{
    	echo '<h1 class="form-signin-heading ">'.ERR_PERM.'</h1>';
    }
?>


