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
	include("../Assets/languages/".$idioma.".php");
	include '../Models/CLIENTE_Model.php';



	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$especial = (isset($_REQUEST['especial']) ? $_REQUEST['especial'] : "");
	$numcuenta_u = (isset($_REQUEST['numcuenta_u']) ? $_REQUEST['numcuenta_u'] : "");
	$pagos_pend = (isset($_REQUEST['pagos_pend']) ? $_REQUEST['pagos_pend'] : "");
	$profesion = (isset($_REQUEST['profesion']) ? $_REQUEST['profesion'] : "");
	$protec_datos = (isset($_REQUEST['protec_datos']) ? $_REQUEST['protec_datos'] : "");

	$apellidos = (isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : "");
	$calle = (isset($_REQUEST['calle']) ? $_REQUEST['calle'] : "");
	$ciudad = (isset($_REQUEST['ciudad']) ? $_REQUEST['ciudad'] : "");
	$cp = (isset($_REQUEST['cp']) ? $_REQUEST['cp'] : "");
	$dni = (isset($_REQUEST['dni']) ? $_REQUEST['dni'] : "");
	$email = (isset($_REQUEST['email']) ? $_REQUEST['email'] : "");
	$fecha_nac = (isset($_REQUEST['fecha_nac']) ? $_REQUEST['fecha_nac'] : "");
	$nombre = (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "");
	$numero = (isset($_REQUEST['numero']) ? $_REQUEST['numero'] : "");
	$observaciones = (isset($_REQUEST['observaciones']) ? $_REQUEST['observaciones'] : "");
	$piso = (isset($_REQUEST['piso']) ? $_REQUEST['piso'] : "");
	$borrado = (isset($_REQUEST['borrado']) ? $_REQUEST['borrado'] : "");
	

	$bnom = (isset($_REQUEST['bnom']) ? $_REQUEST['bnom'] : "");

	$dniMod = (isset($_REQUEST['dniMod']) ? $_REQUEST['dniMod']:"");

	

	switch($acc){

		case 'Insertar':
			if($dni <> ''){
				$temp = new Cliente($especial, $numcuenta_u, $pagos_pend, $profesion, $protec_datos, $apellidos, $calle, $ciudad, $cp, $dni, $email, $fecha_nac, $nombre, $numero, $observaciones, $piso, $borrado);
				$_SESSION['mensaje']=$temp->insertar();
				header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
			}else{
				header("Location: ../Views/GestClientes/CLIENTE_ADD_Vista.php");
			}
			break;

		case '¿Borrar?':
			$temp = new Cliente($especial, $numcuenta_u, $pagos_pend, $profesion, $protec_datos, $apellidos, $calle, $ciudad, $cp, $dni, $email, $fecha_nac, $nombre, $numero, $observaciones, $piso, $borrado);
			$_SESSION['consulta']=$temp->ConsultarCliente();
			header("Location: ../Views/GestClientes/CLIENTE_DELETE_Vista.php?dni=$dni");	
			break;

		case 'Borrar': 
			$temp = new Cliente($especial, $numcuenta_u, $pagos_pend, $profesion, $protec_datos, $apellidos, $calle, $ciudad, $cp, $dni, $email, $fecha_nac, $nombre, $numero, $observaciones, $piso, $borrado);
			$_SESSION['mensaje']=$temp->borrar();
			header('Location: ../Views/Mensaje/MENSAJE_Vista.php');		
			break;

		case 'Consultar': 
			$temp = new Cliente($especial, $numcuenta_u, $pagos_pend, $profesion, $protec_datos, $apellidos, $calle, $ciudad, $cp, $dni, $email, $fecha_nac, $nombre, $numero, $observaciones, $piso, $borrado);
		    $_SESSION['consulta']=$temp->ConsultarCliente();
		    header("Location: ../Views/GestClientes/CLIENTE_SHOW_Vista.php?dni=$dni");
			break;

		case 'Modificar':
			if($dniMod==''){
				$temp = new Cliente($especial, $numcuenta_u, $pagos_pend, $profesion, $protec_datos, $apellidos, $calle, $ciudad, $cp, $dni, $email, $fecha_nac, $nombre, $numero, $observaciones, $piso, $borrado);
				$auxMod=$temp->protomodificar();
				if($auxMod <> ''){
					$_SESSION['mensaje']=$auxMod;
					header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
				}else{
				header("Location: ../Views/GestClientes/CLIENTE_EDIT_Vista.php?dni=$dni");
				}
			}else{
				$temp = new Cliente($especial, $numcuenta_u, $pagos_pend, $profesion, $protec_datos, $apellidos, $calle, $ciudad, $cp, $dniMod, $email, $fecha_nac, $nombre, $numero, $observaciones, $piso, $borrado);
				$_SESSION['mensaje']=$temp->modificar();
				header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
			}
			break; 

		case 'Buscar':
			$aux=array();
			$aux=buscarClientes($bnom);
			$_SESSION['busq']=$aux;
			header("Location:../Views/GestClientes/CLIENTE_LIST_Vista.php");	
			break;

		

		default:
			$aux=array();
			$aux=buscarClientes($bnom);
			$_SESSION['busq']=$aux;
			header("Location:../Views/GestClientes/CLIENTE_LIST_Vista.php");	
			break;	

	}


?>