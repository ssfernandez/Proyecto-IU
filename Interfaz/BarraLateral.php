 <!-- Main -->

  <div class="col-md-2 ">
    <?php
    $controladores=array();
    $acciones=$_SESSION['menu'];

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
              echo "<li class='list-group-item'><a href='../../Controllers/HORARIO_Controller.php?action=".$acciones[$i].$acciones[$i+1]."' id='optionsBarrIzq'>".constant($acciones[$i].$acciones[$i+1])."</a></li>";
            }else{
              echo "<li class='list-group-item'><a href='../../Controllers/HORARIO_Controller.php?action=".$acciones[$i].$acciones[$i+1]."' id='optionsBarrIzq'>".$acciones[$i+1]."</a></li>";
            }
            array_push($controladores, $acciones[$i]);
        }else{
            if (defined($acciones[$i].$acciones[$i+1])) {
              echo "<li class='list-group-item'><a href='../../Controllers/HORARIO_Controller.php?action=".$acciones[$i].$acciones[$i+1]."' id='optionsBarrIzq'>".constant($acciones[$i].$acciones[$i+1])."</a></li>";
            }else{
              echo "<li class='list-group-item'><a href='../../Controllers/HORARIO_Controller.php?action=".$acciones[$i].$acciones[$i+1]."' id='optionsBarrIzq'>".$acciones[$i+1]."</a></li>";
            }
              
            
        }
    }
    echo '</ul>
              </div>
            </div>
            ';
  
      
        ?>
    
  </div><!-- /col-2 -->
