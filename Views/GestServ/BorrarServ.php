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
$sql2 = "SELECT * FROM iu2016_grupo6.Servicios";
$sql2 = mysql_query($sql2, $link);
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

<table border="2px"> 
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<select name="fact"> 
<?php

  while($rs=mysql_fetch_array($sql2)) {
  
  
    echo 
         '<option value="'.$rs["id_servicio"].'">"'.$rs["tipo"].'"</option><br>';
		 
         
		 
  }

?>

</select> 
<input  type = "submit" name = "submit" value="Borrar"/>

<?php
	try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(isset($_POST['submit'])){
	$id_borrarserv=$_POST['serv'];
	$sql2 = $conn->prepare("DELETE FROM iu2016_grupo6.Servicios WHERE id_servicio =:id");
    $sql2->bindParam(':id',$id_borrarserv);
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