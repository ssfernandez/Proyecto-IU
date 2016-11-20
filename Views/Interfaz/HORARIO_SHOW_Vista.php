<?php
   include '../Models/USUARIOS_Model.php';

	class HORARIO_View{

    private $datos; 
    private $horario=array();
    private $inicio;
    private $usuario;
   
    

    function __construct($horario,$inicio){
      $this->horario = $horario;
      $this->inicio = $inicio;
      $this->usuario= new User($_SESSION["user"],$_SESSION["passwd"],$_SESSION["dni"],$_SESSION["perfil"]);
    }
		

  	function getView(){
       
        
// Cargamos el fichero de idioma. Por defecto español.
$idioma=$_SESSION['idioma'];
include("../Assets/languages/".$idioma.".php");
    ?>
<!-- nav bar -->
<html>
 <head>
            <link rel="stylesheet" type="text/css" href="../Assets/css/style.css" />
            <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap-theme.css">
            <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap-theme.min.css">
            <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap-select.css">
            <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap-select.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
            <script type="text/javascript" src="../Assets/js/bootstrap.js"></script>
            <script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../Assets/js/bootstrap-select.js"></script>
            <script type="text/javascript" src="../Assets/js/bootstrap-select.min.js"></script>
            <script type="text/javascript" src="../Assets/js/npm.js"></script>
            <script type="text/javascript" src="../Assets/js/jquery.min.js"></script>
            <script type="text/javascript" src="../Assets/js/jquery-3.1.1.min.js"></script>
            <script type="text/javascript" src="../Assets/js/funciones_onblur.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
                
  </head>
  <body>
            <!-- Header -->
            <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
              
                <div class="navbar-header" id="logo">
                  <a class="navbar-brand" href="../Controllers/HORARIO_Controller.php"><?=LOGO?></a>
                </div>
                
                <div class="btn-group" id="options">
                  <a class="btn glyphicon glyphicon-lock" href="../index.php?logout=true" type="button" id="logout"><?=LOGOUT?></a>
                  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" id="desplegable">
                          <span class="caret"></span>
                          <span class="sr-only"></span>
                  </button>

        <ul class="dropdown-menu" role="menu" id="contBandera">
                    <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
                    <li id="idioma"><?=IDIOMA?>: </li>
                    <li class="contBandera"><a href="../Controllers/HORARIO_Controller.php?idioma=esp"><IMG SRC="../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
                    <li class="contBandera"><a href="../Controllers/HORARIO_Controller.php?idioma=eng"><IMG SRC="../Assets/img/buk.gif" class="bandera"> Eng </a></li>
                  </ul>
                </div>
              </div><!-- /Header -->
            
            
          <!-- Main -->

  <div class="col-md-2 ">
    

  
      
        <div class="panel panel-default"><!-- Gestion de usuarios -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestUsr"><?=GEST_USR?></a>
            </h4>
          </div>
          <div id="gestUsr" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><a href="../Controllers/HORARIO_Controller.php?action=addU" id="optionsBarrIzq"><?=GEST_USRADD?></li>
              <li class="list-group-item"><a href="../Controllers/HORARIO_Controller.php?action=consultU" id="optionsBarrIzq"><?=GEST_USRSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de usuarios -->

        <div class="panel panel-default"><!-- Gestion de perfiles -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestPerf"><?=GEST_PERF?></a>
            </h4>
          </div>
          <div id="gestPerf" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><a href="../Controllers/HORARIO_Controller.php?action=addP" id="optionsBarrIzq"><?=GEST_PERFADD?></li>
              <li class="list-group-item"><a href="../Controllers/HORARIO_Controller.php?action=consultP" id="optionsBarrIzq"><?=GEST_PERFSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de perfiles -->

        <div class="panel panel-default"><!-- Gestion de controladores -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestContr"><?=GEST_CONTR?></a>
            </h4>
          </div>
          <div id="gestContr" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><a href="../Controllers/HORARIO_Controller.php?action=addC" id="optionsBarrIzq"><?=GEST_CONTRADD?></li>
              <li class="list-group-item"><a href="../Controllers/HORARIO_Controller.php?action=consultC" id="optionsBarrIzq"><?=GEST_CONTRSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de controladores -->

        <div class="panel panel-default"><!-- Gestion de acciones de controladores -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestAccContr"><?=GEST_ACIONCONTR?></a>
            </h4>
          </div>
          <div id="gestAccContr" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><a href="../Controllers/HORARIO_Controller.php?action=addA" id="optionsBarrIzq"><?=GEST_ACIONCONTRADD?></li>
              <li class="list-group-item"><a href="../Controllers/HORARIO_Controller.php?action=consultA" id="optionsBarrIzq"><?=GEST_ACIONCONTRSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de acciones de controladores -->

        <div class="panel panel-default"><!-- Gestion de trabajadores -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestTrabaj"><?=GEST_TRABAJ?></a>
            </h4>
          </div>
          <div id="gestTrabaj" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_TRABAJADD?></li>
              <li class="list-group-item"><?=GEST_TRABAJSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de trabajadores -->

        <div class="panel panel-default"><!-- Gestion de clientes -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestCli"><?=GEST_CLI?></a>
            </h4>
          </div>
          <div id="gestCli" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_CLIADD?></li>
              <li class="list-group-item"><?=GEST_CLISELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de clientes -->

        <div class="panel panel-default"><!-- Gestion de clientes externos -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestCliExt"><?=GEST_CLIEXT?></a>
            </h4>
          </div>
          <div id="gestCliExt" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_CLIEXTADD?></li>
              <li class="list-group-item"><?=GEST_CLIEXTSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de clientes externos -->

        <div class="panel panel-default"><!-- Gestion de fisioterapeuta -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestFisio"><?=GEST_FISIO?></a>
            </h4>
          </div>
          <div id="gestFisio" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_FISIOADDH?></li>
              <li class="list-group-item"><?=GEST_FISIOSELECTH?></li>
              <li class="list-group-item"><?=GEST_FISIOADDR?></li>
              <li class="list-group-item"><?=GEST_FISIOSELECTR?></li>
            </ul>
          </div>
        </div><!-- /Gestion de fisioterapeuta -->

        <div class="panel panel-default"><!-- Gestion de lesiones -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestLesiones"><?=GEST_LESION?></a>
            </h4>
          </div>
          <div id="gestLesiones" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_LESIONADD?></li>
              <li class="list-group-item"><?=GEST_LESIONSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de lesiones -->

        <div class="panel panel-default"><!-- Gestion de notificaciones -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestNotif"><?=GEST_NOTIF?></a>
            </h4>
          </div>
          <div id="gestNotif" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_NOTIFADD?></li>
            </ul>
          </div>
        </div><!-- /Gestion de notificaciones -->

        <div class="panel panel-default"><!-- Gestion de horarios -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestHorarios"><?=GEST_HORARIO?></a>
            </h4>
          </div>
          <div id="gestHorarios" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_HORARIOADD?></li>
              <li class="list-group-item"><?=GEST_HORARIOSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de horarios -->

        <div class="panel panel-default"><!-- Gestion de categorias -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestCateg"><?=GEST_CATEG?></a>
            </h4>
          </div>
          <div id="gestCateg" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_CATEGADD?></li>
              <li class="list-group-item"><?=GEST_CATEGSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de categorias -->

        <div class="panel panel-default"><!-- Gestion de actividades -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestActiv"><?=GEST_ACTIV?></a>
            </h4>
          </div>
          <div id="gestActiv" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_ACTIVADD?></li>
              <li class="list-group-item"><?=GEST_ACTIVSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de actividades -->

        <div class="panel panel-default"><!-- Gestion de espacios -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestEsp"><?=GEST_ESP?></a>
            </h4>
          </div>
          <div id="gestEsp" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_ESPADD?></li>
              <li class="list-group-item"><?=GEST_ESPSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de espacios -->

        <div class="panel panel-default"><!-- Gestion de eventos -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestEventos"><?=GEST_EVENT?></a>
            </h4>
          </div>
          <div id="gestEventos" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_EVENTADD?></li>
              <li class="list-group-item"><?=GEST_EVENTSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de eventos -->

        <div class="panel panel-default"><!-- Gestion de servicios -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestServic"><?=GEST_SERV?></a>
            </h4>
          </div>
          <div id="gestServic" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_SERVADD?></li>
              <li class="list-group-item"><?=GEST_SERVSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de servicios -->

        <div class="panel panel-default"><!-- Gestion de reservas -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestReservas"><?=GEST_RESERV?></a>
            </h4>
          </div>
          <div id="gestReservas" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_RESERVADD?></li>
              <li class="list-group-item"><?=GEST_RESERVSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de reservas -->

        <div class="panel panel-default"><!-- Gestion de descuentos -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestDesc"><?=GEST_DESC?></a>
            </h4>
          </div>
          <div id="gestDesc" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_DESCADD?></li>
              <li class="list-group-item"><?=GEST_DESCSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de descuentos -->

        <div class="panel panel-default"><!-- Gestion de pagos -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestPagos"><?=GEST_PAGO?></a>
            </h4>
          </div>
          <div id="gestPagos" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_PAGOADD?></li>
              <li class="list-group-item"><?=GEST_PAGOSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de pagos -->

        <div class="panel panel-default"><!-- Gestion de caja -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestCaja"><?=GEST_CAJA?></a>
            </h4>
          </div>
          <div id="gestCaja" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_CAJAADDE?></li>
              <li class="list-group-item"><?=GEST_CAJAADDR?></li>
              <li class="list-group-item"><?=GEST_CAJAADDC?></li>
              <li class="list-group-item"><?=GEST_CAJASELECTC?></li>
              <li class="list-group-item"><?=GEST_CAJASELECTM?></li>
            </ul>
          </div>
        </div><!-- /Gestion de caja -->

        <div class="panel panel-default"><!-- Gestion de facturas -->
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#gestFact"><?=GEST_FACT?></a>
            </h4>
          </div>
          <div id="gestFact" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><?=GEST_FACTADD?></li>
              <li class="list-group-item"><?=GEST_FACTSELECT?></li>
            </ul>
          </div>
        </div><!-- /Gestion de facturas -->

    
    
  </div><!-- /col-2 -->



            
                  
            			<div class="col-xs-1">
                  </div>
                    
                  <div class="col-xs-8"> <!-- div de muestra de datos.... titulos y datos --> 
                        
                        <form action="../Controllers/HORARIO_Controller.php" method="GET" class="divAntSig">
                        <input class="ant btn" type="submit" name="acc" value=<?=BUT_ANT?>>
                        <input class="sig btn" type="submit" name="acc" value=<?=BUT_SIG?>>
                        <input type="hidden" name="var" value="<?php echo $this->inicio ?>">
                        </form>

                          <?php
                            //$this->datos = array(array('2016-11-03','13','boddyjump'),array('2016-11-05','16','tae chi'));
                            $titulos = $this->titulos($this->inicio);
                          ?>
                        
                          <table class="table table-bordered" id="tabla" width="100%" border = 1>
                            <!-- Fila de titulos -->
                            <tr>

                              <td align='center' class="ColIzq">
                                <form action="../Controllers/HORARIO_Controller.php" method="GET">
                                  <input class="select btn " type="submit" name="Select" value=<?=SELEC?>>
                                </form>
                              </td>

                              <?php
                                 $cont =0;
                                 foreach($titulos as $titulo){
                              ?>

                              <th class="fecha">
                                <?php
                                    echo $titulo;
                                ?>
                              </th>

                              <?php
                                }
                              ?>

                            </tr><!-- /Fila de titulos -->


                            <?php
                              $long = count($this->horario);
                              while ($cont < $long) {

                            ?>
                            <!-- Columnas con fechas -->
                            <tr>
                              <td class="horas">
                                <?php
                                  echo $this->horario[$cont];
                                ?>
                              </td>

                              <?php
                                for($i=0;$i<7;$i++){
                                //foreach($datos as $dato){

                              ?>

                              <td >
                                <?php
                                    //echo $dato['2'];
                                ?>
                              </td>

                              <?php
                                }
                              ?>

                            </tr>

                            <?php
                                $cont++;
                              }
                            ?>

                          </table>

                       

                    
                      <?php
                      include('../Interfaz/BarraInferior.php');
                    
                      ?>
                    </div> <!-- fin de div de muestra de datos -->
                    <div class="col-xs-1">
                    </div>
                 

          
          <!-- /Main -->

        </body>

      </html>

  			<?php
  	}

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
        $iniciosemana = $this->inicioSem($valor);
        $mostrable =date("Y-m-d", strtotime("$iniciosemana +$i day"));

        $titleday=$this->mesydia($mostrable);

        array_push($leRet, $titleday);

      }

      return $leRet;
    }
	}
?>