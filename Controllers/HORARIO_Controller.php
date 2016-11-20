<?php
session_start();
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
	case 'addU':
		header("Location: ./USER_Controller.php?acc=Insertar");
		break;
	case 'consultU':
		header("Location: ./USER_Controller.php?acc=Buscar");
		break;
	case 'addP':
		header("Location: ./PERFIL_Controller.php?acc=Insertar");
		break;
	case 'consultP':
		header("Location: ./PERFIL_Controller.php?acc=Buscar");
		break;
	case 'addC':
		header("Location: ./CONTROLADORES_Controller.php?acc=Insertar");
		break;
	case 'consultC':
		header("Location: ./CONTROLADORES_Controller.php?acc=Buscar");
		break;
	case 'addA':
		header("Location: ./ACCIONES_Controller.php?acc=Insertar");
		break;
	case 'consultA':
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
		else if($valor=="ant"){
			$com = date("Y-m-d", strtotime("$aux -1 week"));
		}
		else if($valor="sig"){
			$com = date("Y-m-d", strtotime("$aux +1 week"));
		}

		$main = new HORARIO_View($tramoHorario,$com);
		$main->getView();
		break;
}



?>