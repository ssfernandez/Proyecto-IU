<?php
session_start();
if(!isset($_SESSION['idioma']) ){
    session_destroy();
    header("Location: ../index.php?logout=true");
  }


//Comprobación del idioma seleccionado
if (isset($_REQUEST['idioma']) && $_REQUEST['idioma']!=''){
   $_SESSION["idioma"] = strtolower($_REQUEST['idioma']);
}elseif(isset($_SESSION["idioma"]) && $_SESSION["idioma"] == ""){
   $_SESSION["idioma"] = "esp";
}
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
			header("Location: ../index.php");
}


include '../Views/Interfaz/HORARIO_SHOW_Vista.php';
include '../Models/HORARIO_Model.php';

$action=(isset($_REQUEST['action']) ? $_REQUEST['action']:"");

switch ($action) {
	case 'GEST_USRADD':
		header("Location: ./USER_Controller.php?acc=Insertar");
		break;
	case 'GEST_USRSELECT':
		header("Location: ./USER_Controller.php?acc=Buscar");
		break;
	case 'GEST_PERFADD':
		header("Location: ./PERFIL_Controller.php?acc=Insertar");
		break;
	case 'GEST_PERFSELECT':
		header("Location: ./PERFIL_Controller.php?acc=Buscar");
		break;
	case 'GEST_CONTRADD':
		header("Location: ./CONTROLADORES_Controller.php?acc=Insertar");
		break;
	case 'GEST_CONTRSELECT':
		header("Location: ./CONTROLADORES_Controller.php?acc=Buscar");
		break;
	case 'GEST_ACIONCONTRADD':
		header("Location: ./ACCIONES_Controller.php?acc=Insertar");
		break;
	case 'GEST_ACIONCONTRSELECT':
		header("Location: ./ACCIONES_Controller.php?acc=Buscar");
		break;
default:
		$horario = new Horario();	//subtituir por select de bd
		$tramoHorario=$horario->getTramoHorario();
		
		$valor=(isset($_REQUEST['acc']) ? $_REQUEST['acc']:"");
		$aux=(isset($_REQUEST['var']) ? $_REQUEST['var']:"");

		if(!isset($valor)){
		$com = date('Y-m-d');
			}
		else if($valor=="<"){
			$com = date("Y-m-d", strtotime("$aux -1 week"));
		}
		else if($valor=">"){
			$com = date("Y-m-d", strtotime("$aux +1 week"));
		}

		
		$main = new HORARIO_View($tramoHorario,$com);
		$main->getView();
		break;
}



?>