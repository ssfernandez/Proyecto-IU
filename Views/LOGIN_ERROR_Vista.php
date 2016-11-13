<?php

class ErrLogUser{

function __construct(){
	
}

function getError(){
?>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link rel="stylesheet" type="text/css" href="Assets/css/styleLogin.css">
			<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap-theme.css">
			<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap-theme.min.css">
		</head> 

		<body>
			<div class="container">

				    <form class="form-signin" action = "../index.html"  method="post" >
						<h1 class="form-signin-heading ">Usuario incorrecto</h1>
						<input type="submit" class="btn btn-lg btn-primary btn-block" placeholder="submit" >
						
					</form>

				</div>
			
				
		</body>
	</html>
<?php
} //fin metodo render

}
?>