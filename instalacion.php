<?php
$servername = "localhost";
$username = "root";
$password = "iu";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE iu";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$mysqli = new mysqli("localhost", "root", "iu", "iu");

if ($mysqli->connect_errno) {
	echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$queries = explode(';', file_get_contents("./bd.sql"));
foreach($queries as $query)
{
	if($query != '')
	{
	  $mysqli->query($query); // Asumo un objeto conexión que ejecuta consultas
	}
}

$mysqli->close();
$conn->close();
?>