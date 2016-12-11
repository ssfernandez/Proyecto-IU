<!DOCTYPE HTML>

<html>
<head>
	<title>Añadir Servicio</title>
</head>
<body>
	<nav></nav>
	<form action="/Proyecto/Controllers/CONEXSERV_Controller.php" method="POST">
		 <table align="center">
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
	</form>
</body>
</html>