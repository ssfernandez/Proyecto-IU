<?php
	class Main_View{

		private $userName;
    private $userPerm;
    private $datos; 
    private $horario;
    private $inicio;

  function __construct($userName,$userPerm,$horario,$inicio){
    $this->userName = $userName;
    $this->userPerm = $userPerm;
    $this->horario = $horario;
    $this->inicio = $inicio;
  }
		

		function getView(){?>
		<!-- nav bar -->
      <html>
        <head>
        	<link rel="stylesheet" type="text/css" href="../Assets/css/style.css" />
        	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.css">
        	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
        	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap-theme.css">
        	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap-theme.min.css">
        	<script type="text/javascript" src="../Assets/js/bootstrap.js"></script>
        	<script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
        	<script type="text/javascript" src="../Assets/js/npm.js"></script>
        	
        	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        				
        </head>
        <body>
          <!-- Header -->
          <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
            
              <div class="navbar-header" id="logo">
                <a class="navbar-brand" href="../Controllers/CALENDARIO_Controller.php">Moovett</a>
              </div>
              
                <ul class="nav navbar-nav navbar-right" id="options">
                  
                  <li class="contBandera"><IMG SRC="../Assets/img/bespanha.gif" class="bandera"></a></li>
                  <li class="contBandera"><IMG SRC="../Assets/img/bgalega.png" class="bandera"></a></li>
                  <li class="contBandera"><IMG SRC="../Assets/img/buk.gif" class="bandera"></a></li>
                  <li><a href="../index.html"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
                </ul>
              
            </div><!-- /container -->
          </div>
          <!-- /Header -->

          <!-- Main -->
          <div class="row">
              <div class="col-md-2 ">
                <div class="barraIzq">
                <!-- Left column -->   
                  <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse1">Gestion de Usuarios</a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="#" id="optionsBarrIzq">Crear Nuevo Usuario</li>
                          <li class="list-group-item"><a href="#" id="optionsBarrIzq">Consultar Usuarios</li>
                          <li class="list-group-item"><a href="#" id="optionsBarrIzq">Eliminar Usuarios</li>
                        </ul>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse2">Gestion de Perfiles</a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="#" id="optionsBarrIzq">Crear Nuevo Perfil</li>
                          <li class="list-group-item"><a href="#" id="optionsBarrIzq">Consultar Perfiles</li>
                          <li class="list-group-item"><a href="#" id="optionsBarrIzq">Eliminar Perfiles</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            	</div><!-- /col-2 -->
              
            	<div class="col-md-10"><!-- calendario -->
            			<div >
                    <?php
                      include '../Models/CALENDAR_Model.php';
                    ?>
                      <div > <!-- div de muestra de datos.... titulos y datos --> 
                        <form action="../Controllers/CALENDARIO_Controller.php" method="GET" class="divAntSig">
                        <input class="ant btn" type="submit" name="acc" value="ant">
                        <input class="sig btn" type="submit" name="acc" value="sig">
                        <input type="hidden" name="var" value="<?php echo $this->inicio ?>">
                        </form>
                          <?php
                            $this->datos = array(array('2016-11-03','13','boddyjump'),array('2016-11-05','16','tae chi'));
                            $titulos = titulos($this->inicio);
                          ?>

                          <table class="table table-bordered" id="tabla" width="100%" border = 1>
                            <!-- Fila de titulos -->
                            <tr>

                              <td align='center' class="ColIzq">
                                <form action="../Controllers/CALENDARIO_Controller.php" method="GET">
                                  <input class="select btn " type="submit" name="Select" value="Actividades/Salas">
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

                       </div> <!-- fin de div de muestra de datos -->

                    </div><!-- /calendario -->

                    <table class="table table-bordered" id="tabla" width="100%" border = 1>
                    <tr>
                      <td>Monitor 1</td>
                      <td>Monitor 2</td>
                      <td>Monitor 3</td>
                      <td>Monitor 4</td>
                      <td>Monitor 5</td>
                    </tr>

                    </table>
                    
                  </div><!-- /col-10 -->  

          </div>
          <!-- /Main -->

        </body>

      </html>

			<?php
		}
	}
?>