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
	include '../Models/CATEGORIA_Model.php';


	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$categ = (isset($_REQUEST['categ']) ? $_REQUEST['categ']:"");
	$catmod = (isset($_REQUEST['catmod']) ? $_REQUEST['catmod']:"");

	$bcateg = (isset($_REQUEST['bcateg']) ? $_REQUEST['bcateg'] : "");


	switch ($acc) {

		case 'Insertar': 
						if($categ <> ''){
							$temp = new Categoria($categ);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestCategoria/CATEGORIA_ADD_Vista.php");
						}
						
			break;
		case '¿Borrar?': 
						$temp = new Categoria ($categ);
						$me = $temp->protoborrar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestCategoria/CATEGORIA_DELETE_Vista.php?categ=$categ");
						}
						break;

		case 'Borrar': $temp = new Categoria($categ);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new Categoria($categ);
						 $_SESSION['consultacat']=$temp->ConsultarCateg();
						 $_SESSION['consultaact']=$temp->ConsultarAct();
						 header("Location: ../Views/GestCategoria/CATEGORIA_SHOW_Vista.php?categ=$categ");
			break;
		case 'Modificar':
						if($catmod==''){
							$temp = new Categoria ($categ);
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
			break; 
		case 'Buscar':
			$aux=array();
			$aux=buscarCategorias($bcateg);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestCategoria/CATEGORIA_LIST_Vista.php");			
			break;
		default:
			
			$aux=array();
			$aux=buscarCategorias($bcateg);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestCategoria/CATEGORIA_LIST_Vista.php");			
			break;
	}