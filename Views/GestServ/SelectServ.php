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

?> 
<html> 
<head> 
<title>Titulo</title> 
</head> 
<body> 

<table border="2px"> 
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<?php
$contador = 0; 
$contador2 = 0;
  while($rs=mysql_fetch_array($sql)) {
   if($contador == 0){
	   echo "<tr>" 
         ."<td>ID Servicio</td>" 
         ."<td>tipo</td>"  
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
</table>
 </form>

</body> 
</html>
<?php
print "<pre>";
echo "<a href='http://192.168.113.128/Proyecto/Views/GestServ/BotonSelectServ.php?action=GEST_EVENTADD'>Volver</a>";
print "</pre>";

?>