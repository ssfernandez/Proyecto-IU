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
$sql = "SELECT * FROM iu2016_grupo6.Facturas";
$sql = mysql_query($sql, $link);
$sql3 = "SELECT * FROM iu2016_grupo6.Facturas";
$sql3 = mysql_query($sql3, $link);
?> 
<table border="2px"> 
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<?php
$contador = 0; 

  while($rs=mysql_fetch_array($sql)) {
   if($contador == 0){
	   echo "<tr>" 
         ."<td>ID Factura</td>" 
         ."<td>Nombre</td>" 
         ."<td>Cuantia</td>" 
		 ."<td>Fecha</td>"
		 ."<td>DNI</td>"
         ."</tr>";
		 $contador++;
   }
  
    echo "<tr>" 
         ."<td>".$rs['id_factura']."</td>" 
         ."<td>".$rs['nombre']."</td>" 
         ."<td>".$rs['cuantia']."</td>" 
		 ."<td>".$rs['fecha']."</td>"
		 ."<td>".$rs['dni']."</td>" 
         ."</tr><br>"; 
  }
 
?> 

<html> 
<head> 
<title>Titulo</title> 
</head> 
<body> 

<table border="2px"> 
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<select name="fact"> 
<?php

  while($rs=mysql_fetch_array($sql3)) {
  
  
    echo 
         '<option value="'.$rs["id_factura"].'">"'.$rs["nombre"].'"</option><br>';
		 
         
		 
  }

?>
</select> 
<table align="center">
			<tr>
				<td>Selecciona la tabla y introduce los datos nuevos </td>
			</tr>
			<tr>	
				<td>DNI: </td>
				<td><input type="text" name="dniFactura" placeholder="nnnnnnnnL" size="30" maxlength="100"></td>
			</tr>
			<tr>
				<td>Fecha: </td>
				<td><input type="text" name="fechaFactura" placeholder="AAAA-MM-DD" size="30" maxlength="100"></td>
			</tr>
			<tr>
				<td>Cuantia: </td>
				<td><input type="text" name="cuantiaFactura" size="30" maxlength="100"></td>
			</tr>
			<tr>
				<td>Nombre: </td>
				<td><input type="text" name="nombreFactura" size="30" maxlength="100"></td>
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
	$id_borrarfact=$_POST['fact'];
	$dni=$_POST['dniFactura'];
	$fecha=$_POST['fechaFactura'];
	$cuantia=$_POST['cuantiaFactura'];
	$nombre=$_POST['nombreFactura'];
	$sql2 = $conn->prepare("UPDATE `Facturas` SET `dni`=:dni,`fecha`=:fecha,`cuantia`=:cuantia,`nombre`=:nombre WHERE id_factura=:id");
    $sql2->bindParam(':dni',$dni);
	$sql2->bindParam(':id',$id_borrarfact);
	$sql2->bindParam(':fecha',$fecha);
	$sql2->bindParam(':cuantia',$cuantia);
	$sql2->bindParam(':nombre',$nombre);
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
  echo "<a href='http://192.168.113.128/Proyecto/Views/GestFact/BotonSelectFact.php?action=GEST_EVENTADD'>Volver</a>";
  print "</pre>";

?>
