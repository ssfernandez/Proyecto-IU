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
	include ("../Assets/languages/".$idioma.".php");
	include '../Models/ESPACIOS_Model.php';

	
	
	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$aforo = (isset($_REQUEST['aforo']) ? $_REQUEST['aforo']:"");
	$nombreEs = (isset($_REQUEST['nombreEs']) ? $_REQUEST['nombreEs'] : "");
	$cod = (isset($_REQUEST['cod']) ? $_REQUEST['cod'] : "");
	$tipo = (isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "");
	

	$bSpace = (isset($_REQUEST['bSpace']) ? $_REQUEST['bSpace'] : "");

		switch ($acc) {

		case 'Insertar': 
						if($cod <> ''){
							$temp = new Space($nombreEs,$aforo,$cod,$tipo);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new Space($nombreEs,$aforo,$cod,$tipo);
							$temp->protoinsertar();
							header("Location: ../Views/GestEspacios/ESPACIOS_ADD_Vista.php");
						}
						
			break;
			case 'Buscar':
			$w = new Space($nombreEs,$aforo,$cod,$tipo);
				$aux=array();
				$aux= $w->buscarEspacios($bSpace);
				$_SESSION['espacios']=$aux;
				 header("Location:../Views/GestEspacios/ESPACIOS_LIST_Vista.php");		
			break;
		case '¿Borrar?': 
						$temp = new Space($nombreEs,$aforo,$cod,$tipo);
						$me = $temp->protoborrar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
						else{
							header("Location: ../Views/GestEspacios/ESPACIOS_DELETE_Vista.php?cod=$cod");
						}
						
						
						break;

		case 'Borrar': $temp = new Space($nombreEs,$aforo,$cod,$tipo);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new Space($nombreEs,$aforo,$cod,$tipo);
						 $_SESSION['consulta']=$temp->ConsultarEs();
						 header("Location: ../Views/GestEspacios/ESPACIOS_SHOW_Vista.php?cod=$cod");
			break;
		case 'Modificar':
						if($nombreEs==''){
							$temp = new Space($nombreEs,$aforo,$cod,$tipo);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestEspacios/ESPACIOS_EDIT_Vista.php?cod=$cod");
							}
						}else{
							$temp = new Space($nombreEs,$aforo,$cod,$tipo);
							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break; 
		
		default:
			
			$aux=array();
			$w = new Space($nombreEs,$aforo,$cod,$tipo);
			$aux= $w->buscarEspacios($bSpace);
			$_SESSION['espacios']=$aux;
			 header("Location:../Views/GestEspacios/ESPACIOS_LIST_Vista.php");			
			break;
	}
	?>
