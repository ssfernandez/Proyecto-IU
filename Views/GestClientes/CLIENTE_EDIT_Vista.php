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
$dni=$_GET['dni'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CLIENTE_Controller.php?idioma=esp&acc=Modificar&dni='.$dni.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CLIENTE_Controller.php?idioma=eng&acc=Modificar&dni='.$dni.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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

<div class="col-xs-8"><!-- col8 -->
<?php

    $comp=$_SESSION["autorizacion"];
    $aceptado=false;
    for ($i=0; $i < sizeof($comp); $i+=2){
        $cadena=$comp[$i].$comp[$i+1];
        if($cadena=="GEST_CLIEDIT"){
            $aceptado=true;
        }
  }
    if($aceptado){
        $data=$_SESSION['datosModCliente'];
?>

<div>
    <fieldset>
    <!-- Form Name -->
        <div class="form-group">
        <legend><?=TITULO_EDIT_CLIENTE?></legend>
        </div>

    </fieldset> 
</div>

  <form onsubmit="return comprobarDatos()" action="../../Controllers/CLIENTE_Controller.php" method="POST">
    <fieldset>

       <!-- Text input-->

      <label class="col-xs-4 control-label" for="nombre"><?=LABEL_NAME?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="nombre" name="nombre" type="text" value="'.$data[1].'" class="form-control input-md"  required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="apellidos"><?=LABEL_SURNAME?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="apellidos" name="apellidos" type="text" value="'.$data[2].'" class="form-control input-md" onBlur="comprobarNombre(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="dni">DNI</label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="dni" name="dniMod" type="text" value="'.$data[12].'" class="form-control input-md" onBlur="comprobarDNI(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="fecha_nac"><?=LABEL_BIRTH?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="fecha_nac" name="fecha_nac" type="date" step="1" min="1900-01-01" max="2016-12-31" value="'.$data[3].'"  class="form-control input-md" onBlur="comprobarEmail(this)" required="">';
        ?>
        </div>

         <!-- Text input-->

        <label class="col-xs-4 control-label" for="email"><?=LABEL_EMAIL?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="email" name="email" type="text" value="'.$data[9].'" class="form-control input-md" onBlur="comprobarEmail(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="ciudad"><?=LABEL_CIUDAD?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="ciudad" name="ciudad" type="text" value="'.$data[7].'" class="form-control input-md" onBlur="comprobarNombre(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="calle"><?=LABEL_CALLE?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="calle" name="calle" type="text" value="'.$data[4].'" class="form-control input-md" onBlur="comprobarNombre(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="numero"><?=LABEL_NUMERO?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="numero" name="numero" type="text" value="'.$data[5].'" class="form-control input-md">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="piso"><?=LABEL_PISO?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="piso" name="piso" type="text" value="'.$data[6].'" class="form-control input-md">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="cp"><?=LABEL_CP?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="cp" name="cp" type="text" value="'.$data[8].'" class="form-control input-md" onBlur="comprobarCP(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="profesion"><?=LABEL_PROFESION?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="profesion" name="profesion" type="text" value="'.$data[13].'" class="form-control input-md" onBlur="comprobarNombre(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="numcuenta_u"><?=LABEL_NUMCUENTA_U?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="numcuenta_u" name="numcuenta_u" type="text" value="'.$data[15].'" class="form-control input-md" onBlur="comprobarCuenta(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="pagos_pend"><?=LABEL_PAGOS_PEND?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="pagos_pend" name="pagos_pend" type="text" value="'.$data[14].'" class="form-control input-md" onBlur="comprobarCuenta(this)" required="">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="especial"><?=LABEL_ESPECIAL?></label>  
        <div class="col-xs-6">
        <?php
              echo '<input id="especial" name="especial" type="checkbox" value="1" class="form-control input-md"> ';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="observaciones"><?=LABEL_OBSERVACIONES?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="observaciones" name="observaciones" type="text" value="'.$data[10].'" class="form-control input-md">';
        ?>
        </div>

        <!-- Text input-->

        <label class="col-xs-4 control-label" for="protec_datos"><?=LABEL_PROTEC_DATOS?></label>  
        <div class="col-xs-6">
        <?php
        echo '<input id="protec_datos" name="protec_datos" type="text" value="'.$data[16].'" class="form-control input-md">';
        ?>
        </div>

        <label class="col-xs-4 control-label" for="singlebutton" ></label>
        <div class="col-xs-4" id="CrearClientButtons">
        <?php
         echo '<input type="hidden" name="acc" value="Modificar" >';
         echo '<input type="submit" value="'.MODIFICAR.'" class="btn">';
         ?>
        </div>

    </fieldset>
    <?php
}else{
  echo '<h1 class="form-signin-heading ">'.ERR_PERM.'</h1>';
}
?>
  </form>



  
</body>
</html>







