<?php
session_start();
include('../Models/USUARIOS_Model.php');
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
			header("Location: ../index.php");
}


// Includes de vistas
function get_data_form(){
	
	$usr = $_REQUEST['user'];
	$passwd = $_REQUEST['passwd'];

	//Comprobamos que el usuario existe en la bd y creamos un usuario nuevo con el nombre, contraseña y permisos de este
	$user = new User($usr, $passwd, "","");
	return $user;

}
	

if (!isset($_REQUEST['user'])){
	$_REQUEST['user'] = '';

}else{
	$user = get_data_form();
	$check = $user->checkUser();
	if($check){	//Añadimos los permisos al usuario conectando con la bd

		$result = $user->addPerfil();
		if($result == ""){
			$_SESSION["idioma"] = "esp";
			$_SESSION["connected"] = "true";
			$_SESSION["user"]=$user->getUser();
			$_SESSION["passwd"]=$user->getPasswd();
			$_SESSION["dni"]=$user->getDni();
			$_SESSION["perfil"]=$user->getPerfil();
			//Lanzamos el controlador del calendario, con el nombre de usuario y los permisos de este
			header("Location: ./HORARIO_Controller.php");
		}else{
			header("Location: ../Views/Login/BD_ERROR_Vista.php");
		}
		
		
	}elseif($check == 'Error en la consulta sobre la base de datos'){
		header("Location: ../Views/Login/BD_ERROR_Vista.php");

	}else{
		//Lanzamos una vista de error
		header("Location: ../Views/Login/LOGIN_ERROR_Vista.php");
	}
}


?>