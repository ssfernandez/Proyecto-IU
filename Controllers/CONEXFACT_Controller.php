<?php
		//Conexion con la base de datos
		$link = mysql_connect("localhost","root","iu") or die ("<h2> No se encuentra el servidor</h2>");;
		$db = mysql_select_db("iu2016_grupo6",$link) or die("<h2> Error de conexion</h2>");
		
		//obtenemos valores del formulario
		
		$dni=$_POST['dniFactura'];
		$fecha = $_POST['fechaFactura'];
		$cuantia = $_POST['cuantiaFactura'];
		$nombre = $_POST ['nombreFactura'];
		$nuevafecha=date('Y-m-d',strtotime($fecha));
		$req =(strlen($dni)*strlen($nuevafecha)*strlen($cuantia)*strlen($nombre)) or die("no se hecho correctamente");
			
		mysql_query("INSERT INTO  iu2016_grupo6.Facturas VALUES ('','$dni','$nuevafecha','$cuantia','$nombre')",$link)or die("<h2> No se encuentra el servidor</h2>");
		
		echo
			'<h2>Completado con exito </h2>';
			echo "<a href='http://192.168.113.128/Proyecto/Controllers/CALENDARIO_Controller.php?action=GEST_EVENTADD'>Volver</a>";
?>