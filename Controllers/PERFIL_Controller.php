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

	include '../Models/PERFIL_Model.php';
	
	
	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$perf = (isset($_REQUEST['perfil']) ? $_REQUEST['perfil']:"");
	$perfM = (isset($_REQUEST['perfilM']) ? $_REQUEST['perfilM']:"");
	$perfA = (isset($_REQUEST['perfilA']) ? $_REQUEST['perfilA']:"");
	$_SESSION['perfilAntiguo']=$perfA;

	$bperf = (isset($_REQUEST['bperf']) ? $_REQUEST['bperf'] : "");

	$accion = (isset($_REQUEST['accion']) ? $_REQUEST['accion'] : "");
	$_SESSION['accionInsert']=$accion;
	$controlador = (isset($_REQUEST['controlador']) ? $_REQUEST['controlador'] : "");



	switch ($acc) {

		case 'Insertar': 
						if($perf <> ''){
							$temp = new Perfil($perf);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new Perfil($perf);
							$temp->protoinsertar();
							header("Location: ../Views/GestPerfil/PERFIL_ADD_Vista.php");
						}
						
			break;
		case '¿Borrar?': 
						$temp = new Perfil($perf);
						$me = $temp->protoborrar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestPerfil/PERFIL_DELETE_Vista.php?perfil=$perf");
						}
						break;

		case 'Borrar': 	$temp = new Perfil($perf);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar':$temp = new Perfil($perf);
						 $_SESSION['contraccShow']=$temp->buscarControladoresAcciones();
						 header("Location: ../Views/GestPerfil/PERFIL_SHOW_Vista.php?perfil=$perf");
			break;
		case 'Modificar':
						if($perf<>''){
							$temp = new Perfil($perf);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestPerfil/PERFIL_EDIT_Vista.php?perfil=$perf");
							}
						}else{
							$temp = new Perfil($perfM);
							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break; 
		case 'Buscar':
			
			$aux=array();
			$aux=listarPerfiles($bperf);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestPerfil/PERFIL_LIST_Vista.php");			
			break;
		default:
			
			$aux=array();
			$aux=listarPerfiles($bperf);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestPerfil/PERFIL_LIST_Vista.php");			
			break;
	}
