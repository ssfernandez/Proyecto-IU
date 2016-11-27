<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link rel="stylesheet" type="text/css" href="Assets/css/styleLogin.css">
			<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap-theme.css">
			<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap-theme.min.css">
		</head>
		<body class="align" background="./Assets/img/fondo.jpg">
		  <div id="fullscreen_bg" class="">
			<div class="container">
			    <form class="form-signin" action = "./process.php"  method="post" >
					<h1 class="form-signin-heading"><IMG SRC="./Assets/img/logo.png" class="logo"></h1>
					<input type="text" class="form-control" name="usrname" placeholder="Nombre del usuario root" onBlur="comprobarUsuario(this)">
					<input type="password" class="form-control" name="pass" placeholder="Contraseña" onBlur="comprobarContraseña(this)">
					<input type="submit" class="btn btn-lg btn-primary btn-block" placeholder="submit" value="Entrar">
				</form>
			</div>
		</body>	
	</html>