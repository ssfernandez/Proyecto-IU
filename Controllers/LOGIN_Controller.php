<?php
include('../Models/USUARIOS_Model.php');
include('../Views/LOGIN_ERROR_Vista.php');
include('../Views/CALENDARIO_SHOW_Vista.php');

// Includes de vistas
function get_data_form(){
	
	$usr = $_REQUEST['user'];
	$passwd = $_REQUEST['passwd'];

	//Comprobamos que el usuario existe en la bd y creamos un usuario nuevo con el nombre, contraseña y permisos de este
	$user = new User($usr, $passwd, "");
	return $user;

}
	

if (!isset($_REQUEST['user'])){
	$_REQUEST['user'] = '';

}else{
	$user = get_data_form();
	$check = $user->checkUser();
	if($check)
{		//Añadimos los permisos al usuario conectando con la bd
		$user->addPermissions();
		$userName=$user->getUser();
		$permissions=$user->getPermissions();
		//Lanzamos el controlador del calendario, con el nombre de usuario y los permisos de este
		header("Location: ./CALENDARIO_Controller.php?userName=$userName&permissions=$permissions");
		
	}else{
		//Lanzamos una vista de error
		$error = new ErrLogUser($check);
		$error->getError();

	}
}


?>