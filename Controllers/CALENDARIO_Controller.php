<?php
session_start();
if(!isset($_SESSION['idioma']) ){
    session_destroy();
    header("Location: ../index.php?logout=true");
  }


//Comprobación del idioma seleccionado
if (isset($_REQUEST['idioma']) && $_REQUEST['idioma']!=''){
   $_SESSION["idioma"] = strtolower($_REQUEST['idioma']);
}elseif(isset($_SESSION["idioma"]) && $_SESSION["idioma"] == ""){
   $_SESSION["idioma"] = "esp";
}
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
			header("Location: ../index.php");
}


include '../Views/Interfaz/CALENDARIO_LIST_Vista.php';
include '../Models/CALENDARIO_Model.php';

$action=(isset($_REQUEST['action']) ? $_REQUEST['action']:"");
$aux=(isset($_REQUEST['var']) ? $_REQUEST['var']:"");

$activ=(isset($_REQUEST['activ']) ? $_REQUEST['activ']:"");
$activAnt=(isset($_REQUEST['activAnt']) ? $_REQUEST['activAnt']:"");
$hiniAnt=(isset($_REQUEST['hiniAnt']) ? $_REQUEST['hiniAnt']:"");
$hfinAnt=(isset($_REQUEST['hfinAnt']) ? $_REQUEST['hfinAnt']:"");
//recogida de datos del modificar

$dia=(isset($_REQUEST['dia']) ? $_REQUEST['dia']:"");
$hini=(isset($_REQUEST['hini']) ? $_REQUEST['hini']:"");
$hfin=(isset($_REQUEST['hfin']) ? $_REQUEST['hfin']:"");
$dni=(isset($_REQUEST['dni']) ? $_REQUEST['dni']:"");
$horasCal=(isset($_REQUEST['horasCal']) ? $_REQUEST['horasCal']:"");
$sala=(isset($_REQUEST['sala']) ? $_REQUEST['sala']:"");

$hAnt=array();
array_push($hAnt, $hiniAnt);
array_push($hAnt, $hfinAnt);
$_SESSION['hAnt']=$hAnt;
if ($horasCal!="") {
	$h=explode("-", $horasCal);
	$hini=$h[0];
	$hfin=$h[1];
}




switch ($action) {
	case '<':
		$Calendario = new Calendario($dia,$hini,$hfin,$dni,$activ);	//subtituir por select de bd
		$tramoCalendario=$Calendario->getTramoHorario();
		$com = date("Y/m/d", strtotime("$aux -1 week"));
		$iniciosemana=inicioSem($com);
		$datosCalendario=array();
		for ($i=0; $i < 7; $i++) {

			if($i==0){
					$datosCalendario[$i] = $Calendario->getDatosDia($iniciosemana,$i);
			}else{
				$dia=date("Y/m/d", strtotime("$iniciosemana +1 day"));
				$datosCalendario[$i] = $Calendario->getDatosDia($dia,$i);
			}
		}
		$main = new CALENDARIO_View($tramoCalendario,$com,$datosCalendario);
		$main->getView();
		break;
	case '>':
		$Calendario = new Calendario($dia,$hini,$hfin,$dni,$activ);	//subtituir por select de bd
		$tramoCalendario=$Calendario->getTramoHorario();
		$com = date("Y/m/d", strtotime("$aux +1 week"));
		$iniciosemana=inicioSem($com);
		$datosCalendario=array();
		for ($i=0; $i < 7; $i++) {

			if($i==0){
				$datosCalendario[$i] = $Calendario->getDatosDia($iniciosemana,$i);
			}else{
				$dia=date("Y/m/d", strtotime("$iniciosemana +1 day"));
				$datosCalendario[$i] = $Calendario->getDatosDia($dia,$i);
			}

		}
		$main = new CALENDARIO_View($tramoCalendario,$com,$datosCalendario);
		$main->getView();
		break;
	case 'Actividades':
	case 'Activities':
		$_SESSION["calendario"]="Actividades";
		$Calendario = new Calendario($dia,$hini,$hfin,$dni,$activ);	//subtituir por select de bd
		$tramoCalendario=$Calendario->getTramoHorario();
		$iniciosemana=inicioSem($aux);
		$datosCalendario=array();
		for ($i=0; $i < 7; $i++) {

			if($i==0){
				$datosCalendario[$i] = $Calendario->getDatosDia($iniciosemana,$i);
			}else{
				$dia=date("Y/m/d", strtotime("$iniciosemana +1 day"));
				$datosCalendario[$i] = $Calendario->getDatosDia($dia,$i);
			}

		}
		$main = new CALENDARIO_View($tramoCalendario,$aux,$datosCalendario);
		$main->getView();
		break;
	case 'Salas':
	case 'Rooms':
		$_SESSION["calendario"]="Salas";
		$Calendario = new Calendario($dia,$hini,$hfin,$dni,$activ);	//subtituir por select de bd
		$tramoCalendario=$Calendario->getTramoHorario();
		$iniciosemana=inicioSem($aux);
		$datosCalendario=array();
		for ($i=0; $i < 7; $i++) {

			if($i==0){
				$datosCalendario[$i] = $Calendario->getDatosDia($iniciosemana,$i);
			}else{
				$dia=date("Y/m/d", strtotime("$iniciosemana +1 day"));
				$datosCalendario[$i] = $Calendario->getDatosDia($dia,$i);
			}

		}
		$main = new CALENDARIO_View($tramoCalendario,$aux,$datosCalendario);
		$main->getView();
		break;
	case 'GEST_USRADD':
		header("Location: ./USER_Controller.php?acc=Insertar");
		break;
	case 'GEST_USRSELECT':
		header("Location: ./USER_Controller.php?acc=Buscar");
		break;
	case 'GEST_PERFADD':
		header("Location: ./PERFIL_Controller.php?acc=Insertar");
		break;
	case 'GEST_PERFSELECT':
		header("Location: ./PERFIL_Controller.php?acc=Buscar");
		break;
	case 'GEST_CONTRADD':
		header("Location: ./CONTROLADORES_Controller.php?acc=Insertar");
		break;
	case 'GEST_CONTRSELECT':
		header("Location: ./CONTROLADORES_Controller.php?acc=Buscar");
		break;
	case 'GEST_ACIONCONTRADD':
		header("Location: ./ACCIONES_Controller.php?acc=Insertar");
		break;
	case 'GEST_ACIONCONTRSELECT':
		header("Location: ./ACCIONES_Controller.php?acc=Buscar");
		break;
	case 'GEST_CLIEXTADD':
		header("Location: ./CLIEXT_Controller.php?acc=Insertar");
		break;
	case 'GEST_CLIEXTSELECT':
		header("Location: ./CLIEXT_Controller.php?acc=Buscar");
		break;

	case 'GEST_RESERVADDE':
		header("Location: ./RESERVAS_Controller.php?acc=Insertar");
		break;

	case 'GEST_RESERVADDA':
		header("Location: ./RESERVAS2_Controller.php?acc=Insertar");
		break;

	case 'GEST_RESERVSELECT':
		header("Location: ./RESERVAS_Controller.php?acc=Buscar");
		break;

	case 'GEST_RESERVSELECTA':
       header("Location: ./RESERVAS2_Controller.php?acc=Buscar");
	   break;

    case 'GEST_HORARIOADD':
		header("Location: ./HORARIOS_Controller.php?acc=Insertar");
		break;

    case 'GEST_HORARIOSELECT':
       header("Location: ./HORARIOS_Controller.php?acc=Buscar");
       break;

	case 'GEST_TRABAJADD':
		header("Location: ./TRABAJADORES_Controller.php?acc=Insertar");
		break;

	case 'GEST_TRABAJSELECT':
		header("Location: ./TRABAJADORES_Controller.php?acc=Buscar");
		break;

	case 'GEST_CATEGADD':
		header("Location: ./CATEGORIAS_Controller.php?acc=Insertar");
		break;
	case 'GEST_CATEGSELECT':
		header("Location: ./CATEGORIAS_Controller.php?acc=Buscar");
		break;
	case 'GEST_CLIADD':
		header("Location: ./CLIENTE_Controller.php?acc=Insertar");
		break;
	case 'GEST_CLISELECT':
		header("Location: ./CLIENTE_Controller.php?acc=Buscar");
		break;
	case 'GEST_NOTIFADD':
		header("Location: ./NOTIF_Controller.php?acc=Crear");
		break;
	case 'GEST_CAJAADDC':
	    header("Location: ./CAJA_Controller.php?acc=Insertar");
        break;
	case 'GEST_CAJASELECTM':
	    header("Location: ./CAJA_Controller.php?acc=Buscar");
	    break;
	case 'GEST_ASISTSELECTAV':
	    header("Location: ./ASISTENCIAS_Controller.php?acc=BuscarAv");
	    break;
	case 'GEST_ASISTSELECTAS':
	    header("Location: ./ASISTENCIAS_Controller.php?acc=Buscar");
	    break;
	case 'GEST_ASISTADDAS':
	    header("Location: ./ASISTENCIAS_Controller.php?acc=Insertar");
	    break;
	case 'GEST_ESPADD' :
	    header("Location: ./ESPACIOS_Controller.php?acc=Insertar");
	    break;
	case 'GEST_ESPSELECT' :
	    header("Location: ./ESPACIOS_Controller.php?acc=Buscar");
	    break;
	case 'GEST_EVENTADD' :
	    header("Location: ./EVENTOS_Controller.php?acc=Insertar");
	    break;
	case 'GEST_EVENTSELECT' :
	    header("Location: ./EVENTOS_Controller.php?acc=Buscar");
	    break;
	case 'GEST_FACTADD':
		header("Location: ../Views/GestFact/FormFact.php");
		break;
	case 'GEST_SERVADD':
		header("Location: ../Views/GestServ/GestServ.php");
		break;
	case 'GEST_FACTSELECT':
		header("Location: ../Views/GestFact/BotonSelectFact.php");
		break;
	case 'GEST_SERVSELECT':
		header("Location: ../Views/GestServ/BotonSelectServ.php");
		break;
	case 'GEST_DESCADD':
		header("Location: ./DESCUENTO_Controller.php?acc=Insertar");
		break;
	case 'GEST_DESCSELECT':
		header("Location: ./DESCUENTO_Controller.php?acc=Buscar");
		break;
	case 'Consultar':
		$Calendario = new Calendario($dia,$hini,$hfin,$dni,$activ);
		$_SESSION['consultaCalendario']=$Calendario->buscarActividad();
		header("Location: ../Views/Interfaz/CALENDARIO_SHOW_Vista.php?activ=$activ&hini=$hini&hfin=$hfin");
		break;
	case 'Modificar':
		if($dia==''){
					$temp = new Calendario($dia,$hini,$hfin,$dni,$activ);
					$auxMod=$temp->protomodificar();
					if(!is_array($auxMod)){
						$_SESSION['mensaje']=$auxMod;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
					}else{
						header("Location: ../Views/Interfaz/CALENDARIO_EDIT_Vista.php?activ=$activ&hini=$hini&hfin=$hfin");
					}
				}else{
					$temp = new Calendario($dia,$hini,$hfin,$dni,$activAnt);
					$_SESSION['mensaje']=$temp->modificar();
					header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
				}
			break;

default:
		$cal = new Calendario($dia,$hini,$hfin,$dni,$activ);	//subtituir por select de bd
		$tramoCalendario=$cal->getTramoHorario();
		$com = date('Y/m/d');
		$iniciosemana=inicioSem($com);
		$datosCalendario=array();
		for ($i=0; $i < 7; $i++) {

			if($i==0){
					$datosCalendario[$i] = $cal->getDatosDia($iniciosemana,$i);
			}else{
				$dia=date("Y/m/d", strtotime("$iniciosemana +1 day"));
				$datosCalendario[$i] = $cal->getDatosDia($dia,$i);
			}

			}
		$main = new CALENDARIO_View($tramoCalendario,$com,$datosCalendario);
		$main->getView();
		break;
}

function inicioSem($valor){
      $diarecibido =$valor;

      $diasemana = strtotime($diarecibido);

      switch (date('w', $diasemana)){

        case 0: $titleday ="Domingo"; $menos=6;

          $iniciosemana = date("Y/m/d", strtotime("$diarecibido -$menos day"));

          break;

        case 1: $titleday ="Lunes"; $menos=1;

          $iniciosemana = $diarecibido;

          break;

        case 2: $titleday ="Martes"; $menos=1;

          $iniciosemana = date("Y/m/d", strtotime("$diarecibido -$menos day"));

          break;

        case 3: $titleday ="Miercoles"; $menos=2;

          $iniciosemana = date("Y/m/d", strtotime("$diarecibido -$menos day"));

          break;

        case 4: $titleday ="Jueves"; $menos=3;

          $iniciosemana = date("Y/m/d", strtotime("$diarecibido -$menos day"));

          break;

        case 5: $titleday ="Viernes"; $menos=4;

          $iniciosemana = date("Y/m/d", strtotime("$diarecibido -$menos day"));

          break;

        case 6: $titleday ="Sabado"; $menos=5;

          $iniciosemana = date("Y/m/d", strtotime("$diarecibido -$menos day"));

          break;

        }
      return $iniciosemana;
    }

?>
