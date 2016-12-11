<?php
$servername = "localhost";
$username = "root";
$password = "iu";
$dbname = "iu2016_grupo6";


function conectarse($servername,$username,$password,$dbname){ 
   $link=mysql_connect($servername,$username,$password) or die (mysql_error()); 
   mysql_select_db($dbname,$link) or die (mysql_error()); 
   return $link; 
} 

$link=conectarse($servername,$username,$password,$dbname);  

//Cambio de sentencia; 
$sql = "SELECT * FROM iu2016_grupo6.Servicios";
$sql = mysql_query($sql, $link);
$sql3 = "SELECT * FROM iu2016_grupo6.Servicios";
$sql3 = mysql_query($sql3, $link);
?> 
<table border="2px"> 
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<?php
$contador = 0; 

  while($rs=mysql_fetch_array($sql)) {
   if($contador == 0){
	   echo "<tr>" 
         ."<td>ID Servicio</td>" 
         ."<td>Tipo</td>" 
		 ."<td>Fecha</td>"
		 ."<td>Comentarios</td>"
         ."</tr>";
		 $contador++;
   }
  
    echo "<tr>" 
         ."<td>".$rs['id_servicio']."</td>" 
         ."<td>".$rs['tipo']."</td>" 
		 ."<td>".$rs['fecha']."</td>"
		 ."<td>".$rs['comentarios']."</td>" 
         ."</tr><br>"; 
  }
 
?> 

<html> 
<head> 
<title>Titulo</title> 
</head> 
<body> 

<table border="2px" <table align="center">> 
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<select name="fact"> 
<?php

  while($rs=mysql_fetch_array($sql3)) {
  
  
    echo 
         '<option value="'.$rs["id_servicio"].'">"'.$rs["tipo"].'"</option><br>';
		 
         
		 
  }

?>
</select> 
		 <table align="center">
		 <tr>
				<td>Selecciona la tabla y introduce los datos nuevos </td>
			</tr>
			<tr>
			
				<td>tipo : </td>
				<td><input type="text" name="tipoServicio" size="30" maxlength="100"></td>
			</tr>
			<tr>
				<td>fecha: </td>
				<td><input type="text" name="fechaServicio" placeholder="AAAA-MM-DD" size="30" maxlength="100"></td>
			</tr>
			<tr>

				<td>comentarios: </td>
				<td><input type="text" name="comentariosServicio" size="30" maxlength="1000"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Insertar"></td>
			</tr>
		 </table>
<input  type = "submit" name = "submit" value="Modificar"/>

<html>
<body>
<?php
	try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(isset($_POST['submit'])){
	$id_borrarserv=$_POST['serv'];
	$tipo=$_POST['tipoServicio'];
	$fecha=$_POST['fechaServicio'];
	$comentario=$_POST['comentarioServicio'];
	$sql2 = $conn->prepare("UPDATE `Servicios` SET `tipo`=:tipo,`fecha`=:fecha,`comentario`=:comentario WHERE id_factura=:id");
    $sql2->bindParam(':tipo',$tipo);
	$sql2->bindParam(':id',$id_borrarserv);
	$sql2->bindParam(':fecha',$fecha);
	$sql2->bindParam(':comentario',$comentario);
    $sql2 -> execute();
	
	}}
	
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
		
}
$conn = null;
$numero = [];
?>
<?php
  print "<pre>";
  echo "<a href='http://192.168.113.128/Proyecto/Views/GestServ/BotonSelectServ.php?action=GEST_EVENTADD'>Volver</a>";
  print "</pre>";

?>