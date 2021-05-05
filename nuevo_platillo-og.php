<!DOCTYPE html>
<script src="js/jquery-3.3.1.js"></script>
       
    
    <?php 
        require('header.php'); 
        require('conexion.php');

        
        
        $sql_ingredientes="SELECT `codigo`,`cantidad`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario`,ingredientes.id_ingredientes,unidad.des_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad ORDER BY ingredientes.id_ingredientes ";
        $resultado = mysqli_query($link,$sql_ingredientes) or die(mysqli_error($link));

        $id_platillo="";

    ?>
    </head>

    <body>
       
        
    <div class="container">
    <h2>Ingresar nuevo platillo</h2>
        
    <form id="platillos" method="post" action="datosplatillo.php">
    <div class="row">
    <div class="input-field col m6 s12">
      <input id="nombreingrediente" name="nombreingrediente" type="text" class="validate" required>
      <label class="active" for="first_name2">Nombre del platillo</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col s6">
      <input id="porciones" name="porciones" type="number" class="validate" required>
      <label class="active" for="first_name2">Porciones</label>
    </div>
    <div class="input-field col s5">
      <input id="tiempopreparacion" name="tiempopreparacion" type="number" class="validate" required>
      <label class="active" for="first_name2">Tiempo de preparacion</label>
    </div>
    <div class="input-field col s1">
      <p>Minutos</p>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <textarea id="instructivo" name="instructivo" class="materialize-textarea" required></textarea>
          <label for="textarea1">Instrucciones para preparar</label>
        </div>
      </div>
    </div>
    
    </form> 
    
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="platillos">Subir platillo
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="col s6">
                <a href="index.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
            </div>
        </div>
        
        
        
    </div>
        </div>
        
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.min.js"></script>
        
    </body>
  </html>