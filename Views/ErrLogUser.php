<?php

class ErrLogUser{

private $msj; 
private $volver;

function __construct($msj, $volver){
	$this->msj = $msj;
	$this->volver = $volver;	
}

function getError(){
?>
<html>
	<head>
		<meta charset="UTF-8">
	</head> 

	<body>
		<div>
			<p>
				<h2>
					<?php
					echo $this->msj;
					?>
				</h2>
			</p>
			<p>
				<h3>
					<?php
					echo "<a href='".$this->volver."'> Volver al login</a><br>";
					?>
				</h3>
			</p>

		</div>
	</body>
</html>
<?php
} //fin metodo render

}
