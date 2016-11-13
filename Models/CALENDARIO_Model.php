<?php


function mesydia($valor){

$mes = substr($valor,5,+2);

$dia = substr($valor,8,+2);

switch ($mes){

case '01': $titulomes ="Ene"; 
		break;

case '02': $titulomes ="Feb"; 
		break;

case '03': $titulomes ="Mar"; 
		break;

case '04': $titulomes ="Abr"; 
		break;

case '05': $titulomes ="May"; 
		break;

case '06': $titulomes ="Jun"; 
		break;

case '07': $titulomes ="Jul"; 
		break;

case '08': $titulomes ="Ago"; 
		break;

case '09': $titulomes ="Sep"; 
		break;

case '10': $titulomes ="Oct"; 
		break;

case '11': $titulomes ="Nov"; 
		break;

case '12': $titulomes ="Dic"; 
		break;

}

return $titulomes.', '.$dia;

}

//jddayofweek(jd,mode)

function inicioSem($valor){
$diarecibido =$valor;

$diasemana = strtotime($diarecibido);

switch (date('w', $diasemana)){

case 0: $titleday ="Domingo"; $menos=6;

$iniciosemana = date("Y-m-d", strtotime("$diarecibido -$menos day"));

break;

case 1: $titleday ="Lunes"; $menos=1;

$iniciosemana = $diarecibido;

break;

case 2: $titleday ="Martes"; $menos=1;

$iniciosemana = date("Y-m-d", strtotime("$diarecibido -$menos day"));

break;

case 3: $titleday ="Miercoles"; $menos=2;

$iniciosemana = date("Y-m-d", strtotime("$diarecibido -$menos day"));

break;

case 4: $titleday ="Jueves"; $menos=3;

$iniciosemana = date("Y-m-d", strtotime("$diarecibido -$menos day"));

break;

case 5: $titleday ="Viernes"; $menos=4;

$iniciosemana = date("Y-m-d", strtotime("$diarecibido -$menos day"));

break;

case 6: $titleday ="Sabado"; $menos=5;

$iniciosemana = date("Y-m-d", strtotime("$diarecibido -$menos day"));

break;

}
return $iniciosemana;
}


function titulos($valor){
$leRet = array();
for($i=0; $i<7; $i++){
$iniciosemana = inicioSem($valor);
$mostrable =date("Y-m-d", strtotime("$iniciosemana +$i day"));

$titleday=mesydia($mostrable);

array_push($leRet, $titleday);

		}
return $leRet;
}

?>