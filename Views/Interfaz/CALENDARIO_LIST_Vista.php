<?php
   

	class CALENDARIO_View{

    private $datosCalendario=array(); 
    private $horario=array();
    private $inicio;

   
    

    function __construct($horario,$inicio,$datosCalendario){
      $this->horario = $horario;
      $this->inicio = $inicio;
      $this->datosCalendario = $datosCalendario;
      
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
            
                
  </head>
  <body>
            <!-- Header -->
            <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
              
                <div class="navbar-header" id="logo">
                  <a class="navbar-brand" href="../Controllers/CALENDARIO_Controller.php"><?=LOGO?></a>
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
                    <li class="contBandera"><a href="../Controllers/CALENDARIO_Controller.php?idioma=esp"><IMG SRC="../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
                    <li class="contBandera"><a href="../Controllers/CALENDARIO_Controller.php?idioma=eng"><IMG SRC="../Assets/img/buk.gif" class="bandera"> Eng </a></li>
                  </ul>
                </div>
              </div><!-- /Header -->
            
            
          <!-- Main -->

  <div class="col-md-2 ">

    <?php
    $controladores=array();
    $acciones=$_SESSION["menu"];

    for ($i=0; $i < sizeof($acciones); $i+=2){
      if(!in_array($acciones[$i], $controladores)){
        if ($i!=0) {
          echo '</ul>
              </div>
            </div>
            ';
        }
        echo '<div class="panel panel-default">
              <div class="panel-heading">
              <h4 class="panel-title">';

            if (defined($acciones[$i])) {
              echo "<a data-toggle='collapse' href='#".$acciones[$i]."'>".constant($acciones[$i])."</a>";
            }else{
              echo "<a data-toggle='collapse' href='#".$acciones[$i]."'>".$acciones[$i]."</a>";
            }
            echo '</h4>
                </div>
                <div id="'.$acciones[$i].'" class="panel-collapse collapse">
                  <ul class="list-group">';
            if (defined($acciones[$i].$acciones[$i+1])) {
              echo "<li class='list-group-item'><a href='../Controllers/CALENDARIO_Controller.php?action=".$acciones[$i].$acciones[$i+1]."' id='optionsBarrIzq'>".constant($acciones[$i].$acciones[$i+1])."</a></li>";
            }else{
              echo "<li class='list-group-item'><a href='../Controllers/CALENDARIO_Controller.php?action=".$acciones[$i].$acciones[$i+1]."' id='optionsBarrIzq'>".$acciones[$i+1]."</a></li>";
            }
            array_push($controladores, $acciones[$i]);
        }else{
            if (defined($acciones[$i].$acciones[$i+1])) {
              echo "<li class='list-group-item'><a href='../Controllers/CALENDARIO_Controller.php?action=".$acciones[$i].$acciones[$i+1]."' id='optionsBarrIzq'>".constant($acciones[$i].$acciones[$i+1])."</a></li>";
            }else{
              echo "<li class='list-group-item'><a href='../Controllers/CALENDARIO_Controller.php?action=".$acciones[$i].$acciones[$i+1]."' id='optionsBarrIzq'>".$acciones[$i+1]."</a></li>";
            }
              
            
        }
    }
    echo '</ul>
              </div>
            </div>
            ';

    
    ?>
    
  </div><!-- /col-2 -->



            
                  
            			<div class="col-xs-1">
                  </div>
                    
                  <div class="col-xs-8"> <!-- div de muestra de datos.... titulos y datos --> 
                        
                        <form action="../Controllers/CALENDARIO_Controller.php" method="GET" class="divAntSig">
                        <input class="ant btn" type="submit" name="action" value="<">
                        <input class="sig btn" type="submit" name="action" value=">">
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
                                <form action="../Controllers/CALENDARIO_Controller.php" method="GET">
                                  <input class="select btn " type="submit" name="action" value=<?=ACTIV?>>
                                  <input class="select btn " type="submit" name="action" value=<?=SALAS?>>
                                  <input type="hidden" name="var" value="<?php echo $this->inicio ?>">
                                </form>
                              </td>

                              <?php
                                 $cont =0;
                                 $dias = 0;
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
                                foreach ($this->datosCalendario as $key ) {
                                  echo "<td >";
                                  for ($z=0; $z < (count($key)); $z+=6) {
                                    $comp = $key[$z+3]."-".$key[$z+4];
                                    if($comp == $this->horario[$cont]){
                                      if($_SESSION["calendario"]=="Actividades"){
                                        if(isset($key[$z])){
                                          echo "<a id='colorRefCalendario' href='../Controllers/CALENDARIO_Controller.php?action=Consultar&activ=".$key[$z+5]."&hini=".$key[$z+3]."&hfin=".$key[$z+4]."'>".$key[$z]."</a><br>";
                                        }
                                      }elseif($_SESSION["calendario"]=="Salas"){
                                        if(isset($key[$z])){
                                          echo $key[$z+1]."<br>";
                                        }
                                      }
                                    }
                                  }//for
                                  echo "</td>";
                                }//foreach
                                
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

    

    function titulos($valor){
      $leRet = array();

      for($i=0; $i<7; $i++){
        $iniciosemana = inicioSem($valor);
        $mostrable =date("Y/m/d", strtotime("$iniciosemana +$i day"));

        $titleday=$this->mesydia($mostrable);

        array_push($leRet, $titleday);

      }

      return $leRet;
    }
	}
?>