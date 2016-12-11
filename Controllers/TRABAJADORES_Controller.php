<?php
	session_start();
	//Comprobación del idioma seleccionado
	if (isset($_REQUEST['idioma']) && $_REQUEST['idioma']!=''){
	   $_SESSION["idioma"] = strtolower($_REQUEST['idioma']);
	}elseif(isset($_SESSION["idioma"]) && $_SESSION["idioma"] == ""){
	   $_SESSION["idioma"] = "esp";
	}
	if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
			header("Location: ../index.php");
	}
	$idioma=$_SESSION['idioma'];
	include("../../Assets/languages/".$idioma.".php");
	include '../Models/TRABAJADORES_Model.php';


	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");


	$apellidos = (isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos']:"");
	$calle = (isset($_REQUEST['calle']) ? $_REQUEST['calle']:"");
	$ciudad = (isset($_REQUEST['ciudad']) ? $_REQUEST['ciudad']:"");
	$cp = (isset($_REQUEST['cp']) ? $_REQUEST['cp']:"");
	$email = (isset($_REQUEST['email']) ? $_REQUEST['email']:"");
	$fechanac = (isset($_REQUEST['fechanac']) ? $_REQUEST['fechanac']:"");
	$nombre = (isset($_REQUEST['nombre']) ? $_REQUEST['nombre']:"");
	$numdir = (isset($_REQUEST['numdir']) ? $_REQUEST['numdir']:"");
	$obs = (isset($_REQUEST['obs']) ? $_REQUEST['obs']:"");
	$piso = (isset($_REQUEST['piso']) ? $_REQUEST['piso']:"");
	$dni = (isset($_REQUEST['dni']) ? $_REQUEST['dni']:"");
	$ocup = (isset($_REQUEST['ocup']) ? $_REQUEST['ocup']:"");
	$sueldo = (isset($_REQUEST['sueldo']) ? $_REQUEST['sueldo'] : "");
	$contrato = (isset($_REQUEST['contrato']) ? $_REQUEST['contrato'] : "");
	$foto = (isset($_REQUEST['foto']) ? $_REQUEST['foto'] : "");
	$numcuenta = (isset($_REQUEST['numcuenta']) ? $_REQUEST['numcuenta'] : "");
	$numlicencia = (isset($_REQUEST['numlicencia']) ? $_REQUEST['numlicencia'] : "");

	$btrab = (isset($_REQUEST['btrab']) ? $_REQUEST['btrab'] : "");

	$auxocup = (isset($_REQUEST['auxocup']) ? $_REQUEST['auxocup']:"");
	$dninuevo = (isset($_REQUEST['dninuevo']) ? $_REQUEST['dninuevo']:"");



	switch ($acc) {

		case 'Insertar': 
						if($ocup == 'Monitor'){
							if($numcuenta == ""){
								$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
								$_SESSION['mensaje']=$temp->insertartrabajador();
								header("Location: ../Views/GestTrabajadores/TRABAJADOR_ADD_Vista.php?ocup=Monitor&dni=".$dni."&sueldo=".$sueldo);
							}else{
								$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
								$_SESSION['mensaje']=$temp->insertarmonitor($contrato,$foto,$numcuenta);
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}
						}elseif($ocup == 'Fisio'){
							if($numlicencia==""){
								$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
								$_SESSION['trab']=$temp->insertartrabajador();
								header("Location: ../Views/GestTrabajadores/TRABAJADOR_ADD_Vista.php?ocup=Fisio&dni=".$dni."&sueldo=".$sueldo);
							}else{
								$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
								$_SESSION['mensaje']=$temp->insertarfisio($numcuenta,$numlicencia);
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}
						}
						elseif($ocup=='Otro'){
							if($auxocup==""){
								$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
								$_SESSION['trab']=$temp->insertartrabajador();
								header("Location: ../Views/GestTrabajadores/TRABAJADOR_ADD_Vista.php?ocup=Otro&dni=".$dni );
							}else{
								$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$auxocup,$sueldo);
								$_SESSION['mensaje']=$temp->insertarocupacion();
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}
						}
						else{
							header("Location: ../Views/GestTrabajadores/TRABAJADOR_ADD_Vista.php?ocup=".$ocup );
							break;
						}
						
			break;


		case '¿Borrar?': 
						$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
						$me = $temp->protoborrar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestTrabajadores/TRABAJADOR_DELETE_Vista.php?ocup=".$ocup );
						}
						
						break;

		case 'Borrar':  $temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': 
						$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
						 $_SESSION['consulta']=$temp->ConsultarTrab($ocup);
						 header("Location: ../Views/GestTrabajadores/TRABAJADOR_SHOW_Vista.php?ocup=".$ocup );
			break;

		case '¿Modificar?': 
						$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
						$me = $temp->protomodificar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestTrabajadores/TRABAJADOR_EDIT_Vista.php?ocup=".$ocup."&dni=".$dni );
						}
						
						break;
		case 'Modificar':  $temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
						$_SESSION['mensaje']=$temp->modificar($dninuevo,$contrato,$foto,$numcuenta,$numlicencia);
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;

		/*case 'Modificar':
						if($catmod==''){
							$temp = new Trabajadores($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestCategoria/CATEGORIA_EDIT_Vista.php?categ=$categ");
							}
						}else{
							$auxcat=$_SESSION['datosModCat'];
							$temp = new Categoria($auxcat[0]);
							$_SESSION['mensaje']=$temp->modificar($catmod);
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break; */
		case 'Buscar':
			
			$aux=array();
			$aux=buscarTrabajadores($btrab);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestTrabajadores/TRABAJADOR_LIST_Vista.php");			
			break;
		default:
			
			$aux=array();
			$aux=buscarTrabajadores($btrab);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestTrabajadores/TRABAJADOR_LIST_Vista.php");			
			break;			
			break;
	}
