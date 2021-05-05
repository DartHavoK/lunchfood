<!DOCTYPE html>
  <html>
      
      
      
      <?php 
        require'header.php';
        require'conexion.php';
          
        $sql_unidades=" SELECT * FROM `unidad` ";
        $resultado = mysqli_query($link,$sql_unidades) or die(mysqli_error($link));
      
        $sql_proveedores=" SELECT * FROM `proveedor` WHERE `des_proveedor` NOT LIKE 'Ninguno';";
        $resultado_proveedores = mysqli_query($link,$sql_proveedores) or die(mysqli_error($link));

        $sql_ultimoid=" SELECT MAX(id_empaque) AS id_empaque FROM `enpaque` ";
        $ultimo_id = mysqli_query($link,$sql_ultimoid);
        $id = mysqli_fetch_assoc($ultimo_id);
      ?>
    
      
    <div class="container">
    <h2>Ingresar nuevo empaque</h2>
        
    <form id="ingredientes" name="ingredientes" action="anadir_empaque.php" method="post">
    <div class="row" style="visibility: hidden;">
    <div class="col m12 s12" >
        <input type="number" value="<?php echo $id['id_empaque']+1; ?>" id="ultimo_id" name="ultimo_id" readonly>
    </div>
    </div>
    <div class="row">
    <div class="input-field col m6 s12">
      <input id="nombreempque" name="nombreempque" type="text" class="validate" required>
      <label class="active" for="first_name2">Nombre del empaque</label>
    </div>
    <!--<div class="input-field col m6 s12">
      <input id="codigo" name="codigo" type="text" class="validate" required>
      <label class="active" for="first_name2">Codigo del empaque</label>
    </div>-->
    </div>
    <div class="row">
    <div class="input-field col m6 s12">
      <input id="capacidad" name="capacidad" type="text" class="validate" required>
      <label class="active" for="first_name2">Capacidad</label>
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
    <div class="input-field col m6 s12">
        <input id="cantidad" name="cantidad" type="number" class="validate" onKeyUp="Suma()" step="any" required>
        <label class="active" for="first_name2">Cantidad presentacion</label>
    </div>
    
    
    </div>
    <div class="row">
    <div class="input-field col m6 s12 center">
        <input id="ppresentacion" name="ppresentacion" type="number" class="validate" onKeyUp="Suma()" step="any" required>
        <label class="active" for="first_name2">Precio de presentacion</label>
    </div>
        
        
    <div class="input-field col m6 s12 center">
        <input id="punitario" name="punitario" type="number" value="0" readonly step="any">
        <label class="active" for="first_name2">Precio unitario</label>
    </div>
        
    </div>  
    <div class="row">
        <div class="input-field col m6 s12">
        <select id="proveedor" name="proveedor" class="browser-default" required>
      <option value="" disabled selected>Proveedores</option>
    <?php
			while($row2 = mysqli_fetch_array($resultado_proveedores)):
			
		?>
      <option value="<?php echo $row2['id_proveedor'] ?>" ><?php echo $row2['des_proveedor']; ?></option>
            
    <?php
				endwhile;
            ?>
    </select>
    </div> 
    <div class="input-field col m6 s12">
          <textarea id="notas" name="notas" class="materialize-textarea" data-length="250"></textarea>
          <label for="textarea1">Notas</label>
</div>
    </div>
    </form> 
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="ingredientes" value="choose">Subir empaque
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="col s6">
                <a href="empaques.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
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