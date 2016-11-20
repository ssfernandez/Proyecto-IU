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
	include '../Models/CONTROLADORES_Model.php';
	

	$cnomb= (isset($_REQUEST['cnomb']) ? $_REQUEST['cnomb'] : "");
	$bcont= (isset($_REQUEST['bcont']) ? $_REQUEST['bcont'] : "");
	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");
	$marcados=(isset($_REQUEST['accion']) ? $_REQUEST['accion'] : "");
	$_SESSION['marcados']=$marcados;
	
	



	switch ($acc) {

		case 'Insertar': 
						if($cnomb <> ''){
							$temp = new Controlador($cnomb);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new Controlador($cnomb);
							header("Location: ../Views/GestControladores/CONTROLADOR_ADD_Vista.php");
						}
						
			break;
		case '¿Borrar?': $temp = new Controlador($cnomb);
						$_SESSION['consulta']=$temp->sacarAcciones();
						 header("Location: ../Views/GestControladores/CONTROLADOR_DELETE_Vista.php?cnomb=$cnomb");

			break;
		case 'Borrar': $temp = new Controlador($cnomb);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new Controlador($cnomb);
						 $_SESSION['consulta']=$temp->sacarAcciones();
						 header("Location: ../Views/GestControladores/CONTROLADOR_SHOW_Vista.php?cnomb=$cnomb");
			break;
		case 'Modificar': $temp= new Controlador($cnomb);
							$me = $temp->protomodificar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$_SESSION['consulta']=$temp->sacarAcciones();
							header("Location: ../Views/GestControladores/CONTROLADOR_EDIT_Vista.php?cnomb=$cnomb");
						}
							
			break; 
		case 'Modificar!': $temp= new Controlador($cnomb);
							$me=$temp->modificar();
							$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
			break;
		case 'Buscar':
			
			$aux=array();
			$aux=buscarControlador($bcont);
			$_SESSION['bcont']=$aux;
			 header("Location:../Views/GestControladores/CONTROLADOR_LIST_Vista.php");			
			break;
		default:
			
			$aux=array();
			$aux=buscarControlador($bcont);
			$_SESSION['bcont']=$aux;
			 header("Location:../Views/GestControladores/CONTROLADOR_LIST_Vista.php");	
			break;
	}
