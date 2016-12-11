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
	include '../Models/HORARIOS_Model.php';



	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");



	$horai = (isset($_REQUEST['horai']) ? $_REQUEST['horai']:"");
	$horaf= (isset($_REQUEST['horaf']) ? $_REQUEST['horaf']:"");


	$busr = (isset($_REQUEST['busr']) ? $_REQUEST['busr'] : "");
	$idr = (isset($_REQUEST['idr']) ? $_REQUEST['idr'] : "");





	$_SESSION['idr']=$idr;










	switch ($acc) {

		case 'Insertar':
						if($horai <> ''){
						$temp = new Horarios($horai,$horaf);
						$_SESSION['mensaje']=$temp->insertar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

						}else{
							$temp = new Horarios($horai,$horaf);
							//$temp->protoinsertar();
							header("Location: ../Views/GestHorarios/HORARIOS_ADD_Vista.php");
						}

			break;
		case '¿Borrar?':
						$temp = new Horarios( $horai,$horaf);
						
						header("Location: ../Views/GestHorarios/HORARIOS_DELETE_Vista.php?idr=$idr");

						break;

		case 'Borrar': 	$temp = new Horarios( $horai,$horaf);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new Horarios($horai,$horaf);

						 $_SESSION['consulta']=$temp->ConsultarH();
						 header("Location: ../Views/GestHorarios/HORARIOS_SHOW_Vista.php?idr=$idr");
			break;
		case 'Modificar':
						if($horai==''){
							$temp = new Horarios($horai,$horaf);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestHorarios/HORARIOS_EDIT_Vista.php?idr=$idr");
							}
						}else{
					 			$temp = new Horarios($horai,$horaf);

						$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break;
		case 'Buscar':

			$aux=array();
			$aux=buscarHorarios($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestHorarios/HORARIOS_LIST_Vista.php");
			break;
		default:

			$aux=array();
			$aux=buscarHorarios($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestHorarios/HORARIOS_LIST_Vista.php");
			break;
	}
