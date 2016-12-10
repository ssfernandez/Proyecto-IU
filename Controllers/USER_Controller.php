0<?php
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
	include '../Models/USER_Model.php';

	
	
	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$usr=(isset($_REQUEST['usr']) ? $_REQUEST['usr']:"");
	$pass = (isset($_REQUEST['password1']) ? $_REQUEST['password1']:"");
	$dni = (isset($_REQUEST['dni']) ? $_REQUEST['dni']:"");
	$perf = (isset($_REQUEST['perfil']) ? $_REQUEST['perfil']:"");

	$busr = (isset($_REQUEST['busr']) ? $_REQUEST['busr'] : "");
	
	



	switch ($acc) {

		case 'Insertar': 
						if($usr <> ''){
							$temp = new User($usr,$pass,$dni,$perf);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new User($usr,$pass,$dni,$perf);
							$temp->protoinsertar();
							header("Location: ../Views/GestUser/USER_ADD_Vista.php");
						}
						
			break;
		case '¿Borrar?': 
						$temp = new User($usr,$pass,$dni,$perf);
						$me = $temp->protoborrar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}elseif($usr==$_SESSION['user']){
							$_SESSION['mensaje']='DONT_DELETE_USR_OWN';
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}elseif($usr=="admin"){
							$_SESSION['mensaje']='DONT_DELETE_USR_ADMIN';
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestUser/USER_DELETE_Vista.php?usr=$usr");
						}
						
						
						break;

		case 'Borrar': $temp = new User($usr,$pass,$dni,$perf);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new User($usr,"",$dni,$perf);
						 $_SESSION['consulta']=$temp->ConsultarU();
						 header("Location: ../Views/GestUser/USER_SHOW_Vista.php?usr=$usr");
			break;
		case 'Modificar':
						if($perf==''){
							$temp = new User($usr,$pass,$dni,$perf);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestUser/USER_EDIT_Vista.php?usr=$usr");
							}
						}else{
							$temp = new User($usr,$pass,$dni,$perf);
							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break; 
		case 'Buscar':
			
			$aux=array();
			$aux=buscarUsuarios($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestUser/USER_LIST_Vista.php");			
			break;
		default:
			
			$aux=array();
			$aux=buscarUsuarios($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestUser/USER_LIST_Vista.php");			
			break;
	}
