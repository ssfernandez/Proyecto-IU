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
	include '../Models/CLIEXT_Model.php';

	
	
	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$nom=(isset($_REQUEST['nom']) ? $_REQUEST['nom']:"");
	$email = (isset($_REQUEST['email']) ? $_REQUEST['email']:"");
	$dni = (isset($_REQUEST['dni']) ? $_REQUEST['dni']:"");

	$dniMod = (isset($_REQUEST['dniMod']) ? $_REQUEST['dniMod']:"");
	

	$bnom = (isset($_REQUEST['bnom']) ? $_REQUEST['bnom'] : "");
	
	



	switch ($acc) {

		case 'Insertar': 
						if($nom <> ''){
							$temp = new CliExt($email,$dni,$nom);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestCliExt/CLIEXT_ADD_Vista.php");
						}
						
			break;
		case '¿Borrar?': $temp = new CliExt($email,$dni,$nom);
						$_SESSION['consulta']=$temp->ConsultarCliExt();
						 header("Location: ../Views/GestCliExt/CLIEXT_DELETE_Vista.php?dni=$dni");
			break;

		case 'Borrar': $temp = new CliExt($email,$dni,$nom);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new CliExt($email,$dni,$nom);
						 $_SESSION['consulta']=$temp->ConsultarCliExt();
						 header("Location: ../Views/GestCliExt/CLIEXT_SHOW_Vista.php?dni=$dni");
			break;
		case 'Modificar':
						if($dniMod==''){
							$temp = new CliExt($email,$dni,$nom);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestCliExt/CLIEXT_EDIT_Vista.php?dni=$dni");
							}
						}else{
							$temp = new CliExt($email,$dniMod,$nom);
							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break; 
		case 'Buscar':
			$aux=array();
			$aux=buscarClientesExternos($bnom);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestCliExt/CLIEXT_LIST_Vista.php");			
			break;
		default:
			$aux=array();
			$aux=buscarClientesExternos($bnom);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestCliExt/CLIEXT_LIST_Vista.php");			
			break;
	}
