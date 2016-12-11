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
	include '../Models/DESCUENTO_Model.php';
	
	
	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$desc = (isset($_REQUEST['descuento']) ? $_REQUEST['descuento']:"");
	$porc = (isset($_REQUEST['porcentaje']) ? $_REQUEST['porcentaje']:"");
	$coddes = (isset($_REQUEST['coddes']) ? $_REQUEST['coddes']:"");
	$acti = (isset($_REQUEST['activo']) ? $_REQUEST['activo']:"");

	$bdesc = (isset($_REQUEST['bdesc']) ? $_REQUEST['bdesc']:"");

	


	switch ($acc) {

		case 'Insertar': 
						if($coddes <> ''){
							$temp = new Descuento($desc,$porc,$coddes,$acti);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new Descuento($desc,$porc,$coddes,$acti);
							header("Location: ../Views/GestDescuento/DESCUENTO_ADD_Vista.php");
						}
						
			break;
		case '¿Borrar?': 
						$temp = new Descuento($desc,$porc,$coddes,$acti);
						$me = $temp->protoborrar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestDescuento/DESCUENTO_DELETE_Vista.php?coddes=$coddes");
						}
						break;

		case 'Borrar': 	$temp = new Descuento($desc,$porc,$coddes,$acti);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar':$temp = new Descuento($desc,$porc,$coddes,$acti);
						$temp->Consultar();
						 header("Location: ../Views/GestDescuento/DESCUENTO_SHOW_Vista.php?coddes=$coddes");
			break;
		case 'Modificar':
						if($porc==''){
							$temp = new Descuento($desc,$porc,$coddes,$acti);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestDescuento/DESCUENTO_EDIT_Vista.php?coddes=$coddes");
							}
						}else{
							$temp = new Descuento($desc,$porc,$coddes,$acti);
							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break; 
		case 'Buscar':
			
			$aux=array();
			$aux=listarDescuentos($bdesc);
			$_SESSION['bdesc']=$aux;
			 header("Location:../Views/GestDescuento/DESCUENTO_LIST_Vista.php");			
			break;
		default:
			$aux=array();
			$aux=listarDescuentos($bdesc);
			$_SESSION['bdesc']=$aux;
			 header("Location:../Views/GestDescuento/DESCUENTO_LIST_Vista.php");			
			break;
			

	}
