<!DOCTYPE html>
<script src="js/jquery-3.3.1.js"></script>
       
    
    <?php 
        require('header.php'); 
        require('conexion.php');

        
        $sql_unidades=" SELECT * FROM `unidad` WHERE `id_unidad` BETWEEN 1 AND 10 ";
        $result = mysqli_query($link,$sql_unidades) or die(mysqli_error($link));

        $sql_ingredientes="SELECT `codigo`,`cantidad`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario`,ingredientes.id_ingredientes,unidad.des_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad ORDER BY ingredientes.id_ingredientes ";
        $resultado = mysqli_query($link,$sql_ingredientes) or die(mysqli_error($link));

        $id_platillo="";

    ?>
    </head>

    <body>
       
        
    <div class="container">
    <h2>Ingresar nueva guarnición</h2>
        
    <form id="platillos" method="post" action="datosguarnicion.php" enctype="multipart/form-data">
    <div class="row">
      <div class="input-field col m6 s12">
        <input id="nombreingrediente" name="nombreingrediente" type="text" class="validate" required>
        <label class="active" for="first_name2">Nombre de la guarnición</label>
      </div>
    </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="porciones" name="porciones" type="number" class="validate" required>
          <label class="active" for="first_name2">Porciones</label>
        </div>
        <div class="input-field col s4">
          <input id="t_porcion" name="t_porcion" type="number" class="validate" required>
          <label class="active" for="first_name2">Indicar tamaño de porción a servir</label>
                   
          <select id="unidad" name="unidad" class="browser-default" required>
            <?php
              while($row = mysqli_fetch_array($result)):

              ?>
              <option value="<?php echo $row['id_unidad'] ?>" ><?php echo $row['des_unidad']; ?></option>
                  
              <?php
              endwhile;
            ?>
          </select>   
          </div > 
        <div class="input-field col s4">
          <input id="tiempopreparacion" name="tiempopreparacion" type="number" class="validate" required>
          <label class="active" for="first_name2">Tiempo de preparacion (minutos)</label>
        </div >      
    </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="instructivo" name="instructivo" class="materialize-textarea" required></textarea>
          <label for="textarea1">Instrucciones para la preparación</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="instructivo_empaquetado" name="instructivo_empaquetado" class="materialize-textarea" required></textarea>
          <label for="textarea2">Instrucciones para el empaquetado</label>
        </div>
      </div>
      <div class="row"><!--Para subir imagenes-->
        <div class="input-field col s12">
          Subir imágen:
            <input name="archivo"  id="archivo" name="archivo" type="file" accept="image/*" />
             
        </div>
      </div>
    </div>
    
    </form> 

    
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="platillos">Subir guarnición
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="col s6">
                <a href="javascript:history.back(-1);" title="Ir la página anterior" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
            </div>
        </div>
        
        
        
    </div>
        </div>
        
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.min.js"></script>
        
    </body>
  </html>