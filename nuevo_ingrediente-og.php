<!DOCTYPE html>
  <html>
      
      
      
      <?php 
        require'header.php';
        require'conexion.php';
          
        $sql_unidades=" SELECT * FROM `unidad` WHERE `id_unidad` BETWEEN 1 AND 5 ";
        $resultado = mysqli_query($link,$sql_unidades) or die(mysqli_error($link));
      ?>
    
      
    <div class="container">
    <h2>Ingresar nuevo ingrediente</h2>
        
    <form id="ingredientes" name="ingredientes" action="Subir_ingredientes.php" method="post">
    <div class="row">
    <div class="input-field col m6 s12">
      <input id="nombre_ingrediente" name="nombre_ingrediente" type="text" class="validate" required>
      <label class="active" for="first_name2">Nombre del ingrediente</label>
    </div>
    <div class="input-field col m6 s12">
      <input id="codigo" name="codigo" type="text" class="validate" required>
      <label class="active" for="first_name2">Codigo del ingrediente</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col m6 s12">
        <input id="cantidad" name="cantidad" type="number" class="validate" onKeyUp="Suma()" step="any" required>
        <label class="active" for="first_name2">Cantidad</label>
    </div>
    <div class="input-field col m6 s12">
        <select id="unidad" name="unidad" class="browser-default" required>
      <option value="" disabled selected>Unidad de medida</option>
    <?php
			while($row = mysqli_fetch_array($resultado)):
			
		?>
      <option value="<?php echo $row['id_unidad'] ?>" ><?php echo $row['des_unidad']; ?></option>
            
    <?php
				endwhile;
            ?>
    </select>
    </div> 
    
    </div>
    <div class="row">
    <div class="input-field col m6 s12 center">
        <input id="ppresentacion" step="any" name="ppresentacion" type="number" class="validate" onKeyUp="Suma()" required>
        <label class="active" for="first_name2">Precio de presentacion</label>
    </div>
        
        
    <div class="input-field col m6 s12 center">
        <input id="punitario" name="punitario" type="number" value="0" readonly step="any">
        <label class="active" for="first_name2">Precio unitario</label>
    </div>
        
    </div>    
    </form> 
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="ingredientes" value="choose">Subir ingrediente
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="col s6">
                <a href="ingredientes.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
            </div>
        </div>
            
    </div>
    </div>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
            $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                    }
                    });
                    });
        </script>
        
        <script>
        //Función que realiza la suma
            function Suma() {
                var ingreso1 = document.ingredientes.cantidad.value;
                var ingreso2 = document.ingredientes.ppresentacion.value;
            try{
        //Calculamos el número escrito:
            ingreso1 = (isNaN(parseFloat(ingreso1)))? 0 : parseFloat(ingreso1);
            ingreso2 = (isNaN(parseFloat(ingreso2)))? 0 : parseFloat(ingreso2);
            document.ingredientes.punitario.value = ingreso2/ingreso1;
            }
        //Si se produce un error no hacemos nada
            catch(e) {}
            }
</script>
    </body>
  </html>