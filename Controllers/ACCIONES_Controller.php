<?php
	session_start();
	//Comprobación del idioma seleccionado
	if (isset($_REQUEST['idioma']) && $_REQUEST['idioma']!=''){
	   $_SESSION["idioma"] = strtolower($_REQUEST['idioma']);
	}elseif(isset($_SESSION["idioma"]) &&$_SESSION["idioma"] == ""){
	   $_SESSION["idioma"] = "esp";
	}
	if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
			header("Location: ../index.php");
	}
	$idioma=$_SESSION['idioma'];
	include("../../Assets/languages/".$idioma.".php");
	include '../Models/ACCIONES_Model.php';
	

	$anomb= (isset($_REQUEST['anomb']) ? $_REQUEST['anomb'] : "");
	$cnomb= (isset($_REQUEST['cnomb']) ? $_REQUEST['cnomb'] : "");
	$_SESSION['contrdeacc']=$cnomb;
	$bacc= (isset($_REQUEST['bacc']) ? $_REQUEST['bacc'] : "");

	$marcado= (isset($_REQUEST['marcado']) ? $_REQUEST['marcado'] : "");
	$_SESSION['marcadoMod']=$marcado;

	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");
	$marcados=(isset($_REQUEST['control']) ? $_REQUEST['control'] : "");
	$_SESSION['marcados']=$marcados;
	
	



	switch ($acc) {

		case 'Insertar': 
						if($anomb <> ''){
							$temp = new Accion($anomb);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new Accion($anomb);
							$_SESSION['controladores']=$temp->listarControladores();
							header("Location: ../Views/GestAcciones/ACCIONES_ADD_Vista.php");
						}
						
			break;
		case '¿Borrar?': $temp = new Accion($anomb);
						$_SESSION['consulta']=$temp->sacarAcciones();
						 header("Location: ../Views/GestAcciones/ACCIONES_DELETE_Vista.php?anomb=$anomb&cnomb=$cnomb");

			break;
		case 'Borrar': $temp = new Accion($anomb);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new Accion($anomb);
						 $_SESSION['consulta']=$temp->sacarAcciones();
						 header("Location: ../Views/GestAcciones/ACCIONES_SHOW_Vista.php?anomb=$anomb&cnomb=$cnomb");
			break;
		case 'Modificar': $temp= new Accion($anomb);
							$me = $temp->protomodificar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$_SESSION['controlmarcado']=$cnomb;
							header("Location: ../Views/GestAcciones/ACCIONES_EDIT_Vista.php?anomb=$anomb&cnomb=$cnomb");
						}
							
			break; 
		case 'Modificar!': $temp= new Accion($anomb);
							$me=$temp->modificar();
							$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
			break;
		case 'Buscar':
			
			$aux=array();
			$aux=buscarAccion($bacc);
			$_SESSION['bacc']=$aux;
			header("Location:../Views/GestAcciones/ACCIONES_LIST_Vista.php");			
			break;
		default:
			
			$aux=array();
			$aux=buscarAccion($bacc);
			$_SESSION['bacc']=$aux;
			 header("Location:../Views/GestAcciones/ACCIONES_LIST_Vista.php");	
			break;
	}
