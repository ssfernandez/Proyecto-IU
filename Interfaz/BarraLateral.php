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
              <li class="list-group-item"><a href="../../Controllers/HORARIO_Controller.php?action=addU" id="optionsBarrIzq"><?=GEST_USRADD?></li>
              <li class="list-group-item"><a href="../../Controllers/HORARIO_Controller.php?action=consultU" id="optionsBarrIzq"><?=GEST_USRSELECT?></li>
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
              <li class="list-group-item"><a href="../../Controllers/HORARIO_Controller.php?action=addP" id="optionsBarrIzq"><?=GEST_PERFADD?></li>
              <li class="list-group-item"><a href="../../Controllers/HORARIO_Controller.php?action=consultP" id="optionsBarrIzq"><?=GEST_PERFSELECT?></li>
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
              <li class="list-group-item"><a href="../../Controllers/HORARIO_Controller.php?action=addC" id="optionsBarrIzq"><?=GEST_CONTRADD?></li>
              <li class="list-group-item"><a href="../../Controllers/HORARIO_Controller.php?action=consultC" id="optionsBarrIzq"><?=GEST_CONTRSELECT?></li>
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
              <li class="list-group-item"><a href="../../Controllers/HORARIO_Controller.php?action=addA" id="optionsBarrIzq"><?=GEST_ACIONCONTRADD?></li>
              <li class="list-group-item"><a href="../../Controllers/HORARIO_Controller.php?action=consultA" id="optionsBarrIzq"><?=GEST_ACIONCONTRSELECT?></li>
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
