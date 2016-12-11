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


	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$email = (isset($_REQUEST['email']) ? $_REQUEST['email'] : "");
	$subject = (isset($_REQUEST['subject']) ? $_REQUEST['subject'] : "");
	$content = (isset($_REQUEST['content']) ? $_REQUEST['content'] : "");
	$headers = 'From: Moovett';



	switch($acc){

		case 'Crear':
			header("Location: ../Views/GestNotificaciones/NOTIF_SEND_View.php");
			break;

		case 'Enviar':
			mail($email, $subject, $content, $headers);
			$_SESSION['mensaje']='MAIL_SENT';
			header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
			break;

	}


?>