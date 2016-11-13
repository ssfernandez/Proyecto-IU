<?php
include '../Views/CALENDARIO_SHOW_Vista.php';
include('../Models/CALENDARIO_Model.php');

error_reporting (0);
$horario = array('10','11','12','13','14','15','16','17','18','19','20','21','22');	//subtituir por select de bd

$action=$_GET['action'];
$nomUser=$_GET['userName'];
$permUser=$_GET['permissions'];
$valor=$_GET['acc'];
$aux=$_GET['var'];
if(!isset($valor)){
$com = date('Y-m-d');
	}
else if($valor=="ant"){
	$com = date("Y-m-d", strtotime("$aux -1 week"));
}
else if($valor="sig"){
	$com = date("Y-m-d", strtotime("$aux +1 week"));
}

switch ($action) {
	case 'añadir usuario':
		# code...
		break;
	case 'consultar usuarios':
		# code...
		break;
	case 'añadir perfil':
		# code...
		break;
	case 'consultar perfiles':
		# code...
		break;
	case 'español':
		# code...
		break;
	case 'gallego':
		# code...
		break;
	case 'ingles':
		# code...
		break;
	
	default:
		$main = new Main_View($nomUser,$permUser,$horario,$com);
		$main->getView();
		break;
}



?>