<!DOCTYPE html>

       
    
    <?php 
        require('header.php'); 
        require('conexion.php');
        
        $id_plato=$_GET['id'];

        $sql_datos="SELECT `nombre_platillo`,`categoria_platillo`,`porciones`,`tiempo_preparacion`,`instr` FROM `platillo` WHERE `id_platillo`='$id_plato' ";
        $get_dato_platillo = mysqli_query($link,$sql_datos);
        $platillo = mysqli_fetch_assoc($get_dato_platillo);

    ?>
    </head>

    <body>
       
        
    <div class="container">
      <?php if ($platillo['categoria_platillo'] == 1) {
        echo "<h2>Actualizar Entradas</h2>";
      }else if ($platillo['categoria_platillo'] == 2) {
        echo "<h2>Actualizar Platillos</h2>";
      }else {
        echo "<h2>Actualizar Guarniciones</h2>";
      }
        ?>
    
        
    <form id="platillos" method="post" action="update_platillo.php" enctype="multipart/form-data">
    <div class="row" style="visibility: hidden;">
      <div class="col m12 s12" >
          <input type="number" value="<?php echo $platillo['categoria_platillo']; ?>" id="categoria" name="categoria" readonly>
      </div>
    </div>

    <div class="row">
    <div class="input-field col m6 s12">
      <input id="nombreingrediente" name="nombreingrediente" type="text" class="validate" value="<?php echo $platillo['nombre_platillo']; ?>" required>
      <label class="active" for="first_name2">Nombre del platillo</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col s6">
      <input id="porciones" name="porciones" type="number" class="validate" value="<?php echo $platillo['porciones']; ?>" required>
      <label class="active" for="first_name2">Porciones</label>
    </div>
    <div class="input-field col s5">
      <input id="tiempopreparacion" name="tiempopreparacion" type="number" class="validate" value="<?php echo $platillo['tiempo_preparacion']; ?>" required>
      <label class="active" for="first_name2">Tiempo de preparacion</label>
    </div>
    <div class="input-field col s1">
      <p>Minutos</p>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <textarea id="instructivo" name="instructivo" class="materialize-textarea" required><?php echo $platillo['instr']; ?></textarea>
          <label for="textarea1">Instrucciones para preparar</label>
        </div>
      </div>
    </div>
    <div class="form-group">
          <label for="archivo" class="col-sm-2 control-label">Archivo</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="archivo" name="archivo">
            
            <?php
            $id_imagen = $id_plato; 
              $path = "foto_platillos/".$id_imagen;
              if(file_exists($path)){
                $directorio = opendir($path);
                while ($archivo = readdir($directorio))
                {
                  if (!is_dir($archivo)){
                    echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";

                    echo "<img src='foto_platillos/$id_imagen/$archivo' width='300' />";
                    
                    echo "<a href='#' class='delete' title='Eliminar archivo' ><i class='material-icons'>delete</i></a></div>";
                    
                  }
                }
              }
              
            ?>
            
          </div>
        </div>
        <div class="row" style="visibility: hidden;">
        <div class="col m4 s12" >
            <input type="number" value="<?php echo $id_plato ?>" id="id" name="id" readonly>
        </div>
        </div>

    
    </form> 
    
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="platillos">Editar platillo
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