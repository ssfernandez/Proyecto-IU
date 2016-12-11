<!DOCTYPE HTML>

<html>
<head>
	<title>Añadir Factura</title>
</head>
<body>
	<nav></nav>
	<form action="/Proyecto/Controllers/CONEXFACT_Controller.php" method="POST">
		 <table align="center">
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
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Insertar"></td>
			</tr>
		 </table>
	</form>
</body>
</html>
